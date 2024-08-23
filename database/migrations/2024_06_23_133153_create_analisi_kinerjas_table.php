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
        Schema::create('kinerja_mitra', function (Blueprint $table) {
            $table->id();
            $table->integer('kompetensi_kerja')->nullable();
            $table->integer('komunikasi_kerja')->nullable();
            $table->integer('inisiatif_kerja')->nullable();
            $table->integer('kualitas_kerja')->nullable();
            $table->integer('sikap_dan_etika_kerja')->nullable();
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
        Schema::dropIfExists('analisi_kinerjas');
    }
};
