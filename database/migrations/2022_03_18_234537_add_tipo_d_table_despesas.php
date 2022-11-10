<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoDTableDespesas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('despesas', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo');
            $table->foreign('tipo')->references('id')->on('tipo_despesas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('despesas', function (Blueprint $table) {
            //
        });
    }
}
