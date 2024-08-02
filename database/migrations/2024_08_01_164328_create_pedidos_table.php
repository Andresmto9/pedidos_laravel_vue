<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador principal del pedido.');
            $table->unsignedInteger('usua_id')->nullable(false)->comment('Campo para registrar id de la persona que realiza el pedido.');
            $table->unsignedInteger('prod_id')->nullable(false)->comment('Campo para registrar id del producto asociado al producto.');
            $table->decimal('pedido_valor_unitario', 15, 2)->nullable(false)->comment('Campo para registrar el valor unitario del pedido.');
            $table->float('pedido_cantidad')->nullable(false)->comment('Campo para registrar la cantidad de productos del pedido.');
            $table->decimal('pedido_precio_subtotal', 15, 2)->nullable(false)->comment('Campo para registrar el sub total del pedido.');
            $table->float('pedido_iva')->nullable(false)->comment('Campo para registrar el valor del iva aplicado al pedido.');
            $table->decimal('pedido_precio_total', 15, 2)->nullable(false)->comment('Campo para registrar el total del pedido.');
            $table->smallInteger('estado')->default(0)->nullable(false)->comment('Campo para registrar el estado del pedido (0. Iniciado = 1. finalziado).');
            $table->dateTime('created_at')->timestamps()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Campo por defecto de laravel para registrar la fecha de actualización del registro.');
            $table->dateTime('updated_at')->timestamps()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Campo por defecto de laravel para registrar la fecha de creación del registro.');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('usua_id')->references('id')->on('usuarios')->onDelete('cascade');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('prod_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
