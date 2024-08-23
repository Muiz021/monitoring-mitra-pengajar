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
            $table->unsignedBigInteger('pelajar_id')->after('program_id');
            $table->foreign('pelajar_id')->references('id')->on('pelajars')->onDelete('cascade')->onUpdate('cascade');
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
