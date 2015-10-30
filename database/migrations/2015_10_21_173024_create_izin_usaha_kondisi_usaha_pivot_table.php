<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIzinUsahaKondisiUsahaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin_usaha_kondisi_usaha', function (Blueprint $table) {
            $table->integer('izin_usaha_id')->unsigned()->index();
            $table->foreign('izin_usaha_id')->references('id')->on('izin_usahas')->onDelete('cascade');
            $table->integer('kondisi_usaha_id')->unsigned()->index();
            $table->foreign('kondisi_usaha_id')->references('id')->on('kondisi_usahas')->onDelete('cascade');
            $table->string('value');
            $table->primary(['izin_usaha_id', 'kondisi_usaha_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('izin_usaha_kondisi_usaha');
    }
}
