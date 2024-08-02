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
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador principal del producto.');
            $table->text('producto_descripcion', 50)->nullable(false)->comment('Campo para registrar la descripción del producto.');
            $table->decimal('producto_valor', 15, 2)->nullable(false)->comment('Campo para registrar la descripción del producto.');
            $table->dateTime('created_at')->timestamps()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Campo por defecto de laravel para registrar la fecha de actualización del registro.');
            $table->dateTime('updated_at')->timestamps()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Campo por defecto de laravel para registrar la fecha de creación del registro.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
