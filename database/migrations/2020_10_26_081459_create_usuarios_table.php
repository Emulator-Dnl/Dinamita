<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained();

            //$table->string('nombre', 100);
            //$table->string('apellido', 100);
            $table->string('curp', 100)->unique();
            $table->foreignId('sucursal_id');//no sé porqué no me permite hacerle el constraint
            $table->string('certificado', 150);
            $table->string('registro', 100)->unique();
            //$table->string('correo', 100)->unique();
            $table->boolean('administrador');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
