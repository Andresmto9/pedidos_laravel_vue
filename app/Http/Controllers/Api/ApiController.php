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
            ->get();

        $prod = Productos::get();

        $usua = User::get();

        $arrResult["pedido"] = $pedi;
        $arrResult["producto"] = $prod;
        $arrResult["usuario"] = $usua;

        return $arrResult;
    }
}
