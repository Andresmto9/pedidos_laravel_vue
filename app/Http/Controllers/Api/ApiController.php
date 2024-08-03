<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedidos;
use App\Models\Productos;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    /**
     * Funcionalidad para generar el token para el consumo de servicios dentro del sistema
     */
    public function token(Request $request){
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];

        $validador = Validator::make($request->input(),$rules);
        if($validador->fails()){
            return response()->json([
                'estado' => false,
                'errors' => $validador->errors()->all()
            ], 400);
        }
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'estado' => false,
                'errors' => ['No autorizado']
            ],401);
        }
        $user = User::where('email', $request->email)->first();
        return response()->json([
            'estado' => true,
            'token' => $user->createToken('API TOKEN')->plainTextToken
        ], 200);
    }

    /**
     * Función para consultar los pedidos existentes dentro del sistema asociado al usuario que ingreso.
     */
    public function getInfoSistema(){
        $pedi = Pedidos::where('usua_id', Auth::user()->id)
            ->with('productos')
            ->get();

        $prod = Productos::get();

        $usua = User::get();

        $arrResult["pedido"] = $pedi;
        $arrResult["producto"] = $prod;
        $arrResult["usuario"] = $usua;

        return $arrResult;
    }

    /**
     * Funcionalidad para consultar los productos registrados en el sistema
     */
    public function getProdSistema(){
        $prod = Productos::get();

        if(count($prod) > 0){
            $arrResult["estado"] = "OK";
        }else{
            $arrResult["estado"] = "FAIL";
        }

        $arrResult["data"] = $prod;

        return $arrResult;
    }

    /**
     * Funcionalidad para registrar los datos del producto
     */
    public function setProdData(Request $request){
        $prod = new Productos;
        $prod->producto_nombre = $request->nombre;
        $prod->producto_valor = $request->precio;
        $prod->producto_descripcion = $request->descripcion;
        $prod->producto_iva = $request->iva;

        $prod->save();

        if($prod){
            $arrResult["estado"] = "OK";
        }else{
            $arrResult["estado"] = "FAIL";
        }

        return $arrResult;
    }

    /**
     * Función para realizar el refistro del pedido
     */
    public function setPediData(Request $request){
        $pedi = new Pedidos;
        $pedi->usua_id = Auth::user()->id;
        $pedi->prod_id = $request["prod"]["id"];
        $pedi->pedido_valor_unitario = $request["prod"]["valor"];
        $pedi->pedido_cantidad = $request["cantidad"];
        $pedi->pedido_precio_subtotal = ($request["prod"]["valor"] * $request["cantidad"]);
        $pedi->pedido_iva = (($request["prod"]["valor"] * $request["cantidad"]) * ($request["prod"]["iva"] / 100));
        $pedi->pedido_precio_total = ($request["prod"]["valor"] * $request["cantidad"]) + (($request["prod"]["valor"] * $request["cantidad"]) * ($request["prod"]["iva"] / 100));
        $pedi->estado = 1;
        $pedi->save();

        if($pedi){
            $arrResult["estado"] = "OK";
        }else{
            $arrResult["estado"] = "FAIL";
        }

        return $arrResult;
    }

    /**
     * Funcionalidad para registrar un usuario nuevos
     */
    public function setUsuaData(Request $request){
        $valiUsua = User::where('email', $request->correo)
            ->get();

        if(count($valiUsua) > 0){
            $arrResult["estado"] = "FAIL";
            $arrResult["mensaje"] = "El correo ingresado ya esta registrado.";
        }else{
            $usua = new User;

            $usua->nombre = $request->nombre;
            $usua->email = $request->correo;
            $usua->password = Hash::make($request->password);
            $usua->remember_token = Str::random(10);

            $usua->save();

            if($usua){
                $arrResult["estado"] = "OK";
                $arrResult["mensaje"] = "Se registro con éxito el usuario.";
            }else{
                $arrResult["estado"] = "FAIL";
                $arrResult["mensaje"] = "Ocurrió un problema al registrar el usuario.";
            }
        }

        return $arrResult;
    }
}
