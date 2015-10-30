<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubKategoriProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kategori_produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategori_produk_id')->unsigned();
            $table->foreign('kategori_produk_id')->references('id')->on('kategori_produks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('label');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_kategori_produks');
    }
}
