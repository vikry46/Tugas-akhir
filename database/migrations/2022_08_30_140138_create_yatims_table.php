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
        Schema::create('yatims', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->unsignedBigInteger('id_pengurus');
            $table->string('pemasukan')->nullable();
            $table->string('pengeluaran')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('id_pengurus')->references('id')->on('penguruses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yatims');
    }
};
