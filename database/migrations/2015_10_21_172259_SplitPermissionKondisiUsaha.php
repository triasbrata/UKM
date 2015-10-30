<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SplitPermissionKondisiUsaha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kondisi_usahas', function (Blueprint $table) {
            $table->dropColumn('pirt');
            $table->dropColumn('mn');
            $table->dropColumn('halal');
            $table->dropColumn('iso');
            $table->dropColumn('lain_lain');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kondisi_usahas', function (Blueprint $table) {
            $table->string('pirt',50);
            $table->string('mn',50);
            $table->string('halal',50);
            $table->string('iso',50);
            $table->string('lain_lain',50);
        });
    }
}
