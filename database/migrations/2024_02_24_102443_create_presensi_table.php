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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id')->index('fk_presensi_to_program');
            $table->foreign('program_id')->references('id')->on('program')->onDelete('cascade')->onUpdate('cascade');
            $table->mediumText('gambar')->nullable();
            $table->enum('status', ['hadir', 'tidak hadir'])->nullable();
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
        Schema::dropIfExists('presensi');
    }
};
