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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('tgl');
            $table->string('nama');
            $table->unsignedBigInteger('id_jenis_kegiatan');
            $table->unsignedBigInteger('id_lacon');
            $table->unsignedBigInteger('id_penceramah');
            $table->unsignedBigInteger('id_pengurus');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('id_lacon')->references('id')->on('lacons');
            $table->foreign('id_penceramah')->references('id')->on('lacons');
            $table->foreign('id_pengurus')->references('id')->on('penguruses');
            $table->foreign('id_jenis_kegiatan')->references('id')->on('jeniskegiatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
};
