<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            //relacionamento 1 para N
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
                        
        });
        
        //relacionamento com produtos
        Schema::table('produtos', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //relacionamento com produtos_detalhes
        Schema::table('produtos_detalhes', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover relacionamento com produtos_detalhes
        Schema::table('produtos_detalhes', function (Blueprint $table){
            //remover fk
            $table->dropForeign('produtos_detalhes_unidade_id_foreign'); //[tabela]_[coluna]_foreign
            //remover coluna
            $table->dorpColumn('unidade_id');
        });
        //remover relacionamento com produtos
        Schema::table('produtos', function (Blueprint $table){
            //remover fk
            $table->dropForeign('produtos_unidade_id_foreign'); //[tabela]_[coluna]_foreign
            //remover coluna
            $table->dorpColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
