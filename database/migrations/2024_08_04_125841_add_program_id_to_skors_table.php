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
        Schema::table('skors', function (Blueprint $table) {
            $table->unsignedBigInteger('program_id')->after('mitra_id');
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
        Schema::table('skors', function (Blueprint $table) {
            //
        });
    }
};
