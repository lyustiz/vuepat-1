<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTablesLang extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        
        //users a usuarios
        Schema::rename('users', 'usuario');
        Schema::table('usuario', function (Blueprint $table) {
            $table->renameColumn('name', 'nombre');
            $table->renameColumn('email', 'correo');
            $table->renameColumn('password', 'contraseña');
            $table->renameColumn('created_at', 'creado_en');
            $table->renameColumn('updated_at', 'actualizado_en');
        });

        //password_reset cambios_contraseña
        Schema::rename('password_resets', 'cambio_contraseña');
        Schema::table('cambios_contraseña', function (Blueprint $table) {
            $table->renameColumn('email', 'correo');
            $table->renameColumn('created_at', 'creado_en');
        });

        //crear tabla roles
        Schema::create('rol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->boolean('activo');
        });

        //crear tabla roles_usuario
        Schema::create('rol_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->integer('rol_id');
            $table->timestamps();
        });

        //renombrar timestamps roles_usuario
        Schema::table('rol_usuario', function (Blueprint $table) {
            $table->renameColumn('created_at', 'creado_en');
            $table->renameColumn('updated_at', 'actualizado_en');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //rollback user table 
        Schema::rename('usuarios', 'users');
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('nombre', 'name');
            $table->renameColumn('correo', 'email');
            $table->renameColumn('contraseña', 'password');
        });

        //rollback password table
        Schema::rename('cambios_contraseña', 'password_resets');
        Schema::table('password_resets', function (Blueprint $table) {
            $table->renameColumn('correo', 'email');
            $table->renameColumn('creado en', 'created_at');
        });

        //drop table roles
        Schema::dropIfExists('roles');

        //drop table roles_usuario
        Schema::dropIfExists('roles_usuario');
    }

    
}
