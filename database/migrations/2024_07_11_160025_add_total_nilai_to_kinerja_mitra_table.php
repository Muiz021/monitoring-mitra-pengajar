<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kinerja_mitra', function (Blueprint $table) {
            $table->integer('total_nilai')->after('sikap_dan_etika_kerja')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kinerja_mitra', function (Blueprint $table) {
            $table->dropColumn('sikap_dan_etika_kerja');
        });
    }
};
