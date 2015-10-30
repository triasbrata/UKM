<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SplitMediaOnline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kondisi_usahas', function (Blueprint $table) {
            if (Schema::hasColumn('kondisi_usahas','twitter')) $table->dropColumn('twitter');
            if (Schema::hasColumn('kondisi_usahas','facebook')) $table->dropColumn('facebook');
            if (Schema::hasColumn('kondisi_usahas','line')) $table->dropColumn('line');
            if (Schema::hasColumn('kondisi_usahas','instagram')) $table->dropColumn('instagram');
            if (Schema::hasColumn('kondisi_usahas','website')) $table->dropColumn('website');
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
            if ( !Schema::hasColumn('kondisi_usahas','twitter') ) $table->string('twitter',30);
            if ( !Schema::hasColumn('kondisi_usahas','facebook') ) $table->string('facebook',30);
            if ( !Schema::hasColumn('kondisi_usahas','line') ) $table->string('line',30);
            if ( !Schema::hasColumn('kondisi_usahas','instagram') ) $table->string('instagram',30);
            if ( !Schema::hasColumn('kondisi_usahas','website') ) $table->string('website',30);
        });
    }
}
