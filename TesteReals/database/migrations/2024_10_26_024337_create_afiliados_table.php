<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfiliadosTable extends Migration
{
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cpf', 14)->unique();
            $table->date('data_nascimento');
            $table->string('email')->unique();
            $table->string('telefone', 15);
            $table->string('endereco', 255);
            $table->string('cidade', 100);
            $table->string('estado', 2);
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('afiliados');
    }
}
