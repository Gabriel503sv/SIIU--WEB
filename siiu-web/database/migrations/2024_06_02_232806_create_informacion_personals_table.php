<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_personals', function (Blueprint $table) {
            $table->id();
            $table->string('apellidos');
            $table->string('nombres');
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('dui')->nullable();
            $table->string('nacionalidad');
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });

        Schema::create('informacion_personal', function (Blueprint $table) {
            $table->id();
            $table->string('apellidos');
            $table->string('nombres');
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('dui')->nullable();
            $table->string('nacionalidad');
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacion_personals');
    }
}
