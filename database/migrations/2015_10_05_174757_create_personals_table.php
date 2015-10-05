<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit_usaha_id')->unsigned();
            $table->foreign('unit_usaha_id')->references('id')->on('unit_usahas')->onDelete('restrict')->onUpdate('cascade');
            $table->string('name',50);
            $table->string('no_ktp',50);
            $table->enum('jenis_kelamin',["m","w"]);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('Agama'['islam','katolik','protestant','hindu','budha','kong wu chu']);
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
        Schema::drop('personals');
    }
}