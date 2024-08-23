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
            $table->unsignedBigInteger('mitra_id')->index('kinerja_mitra_to_mitra')->after('id');
            $table->unsignedBigInteger('program_id')->index('kinerja_mitra_to_program')->after('mitra_id');
            $table->foreign('mitra_id')->references('id')->on('mitra')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('program_id')->references('id')->on('program')->onDelete('cascade')->onUpdate('cascade');

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
            $table->dropForeign('kinerja_mitra_to_mitra');
            $table->dropForeign('kinerja_mitra_to_program');
        });
    }
};
