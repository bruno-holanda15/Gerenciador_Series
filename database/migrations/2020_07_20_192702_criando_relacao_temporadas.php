<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoRelacaoTemporadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temporadas', function(Blueprint $table){
         
            $table->unsignedBigInteger('serie_id');
            $table->foreign('serie_id')
            ->references('id')
            ->on('series');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temporadas', function(Blueprint $table){
            $table->dropForeign('serie_id');
            
        });
    }
}
