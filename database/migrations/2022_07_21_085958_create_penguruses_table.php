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
        Schema::create('penguruses', function (Blueprint $table) {
            $table->id();
            $table->string('kode',20);
            $table->unsignedBigInteger('id_jabatan');
            $table->string('nama',50);
            $table->enum('jk',['Laki-laki','Perempuan']);
            $table->string('umur',10);
            $table->string('no_hp',20);
            $table->string('image')->nullable(); 
            $table->timestamps();

            $table->foreign('id_jabatan')->references('id')->on('jabatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penguruses');
    }
};
