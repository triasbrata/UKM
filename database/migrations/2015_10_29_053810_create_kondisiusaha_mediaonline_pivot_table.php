<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKondisiusahaMediaonlinePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisi_usaha_media_online', function (Blueprint $table) {
            $table->integer('kondisi_usaha_id')->unsigned()->index();
            $table->foreign('kondisi_usaha_id')->references('id')->on('kondisi_usahas')->onDelete('cascade');
            $table->string('value');
            $table->integer('media_online_id')->unsigned()->index();
            $table->foreign('media_online_id')->references('id')->on('media_onlines')->onDelete('cascade');
            // $table->primary(['kondisi_usaha_id', 'media_online_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kondisi_usaha_media_online');
    }
}
