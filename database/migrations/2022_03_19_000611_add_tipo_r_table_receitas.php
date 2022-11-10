<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoRTableReceitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receitas', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo');
            $table->foreign('tipo')->references('id')->on('tipo_receitas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receitas', function (Blueprint $table) {
            //
        });
    }
}
