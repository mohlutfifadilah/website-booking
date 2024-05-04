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
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_pendaki')->nullable();
            $table->string('nama');
            $table->integer('usia');
            $table->integer('no_telepon');;
            $table->integer('no_telepon_darurat');;
            $table->string('alamat');
            $table->date('tanggal_naik');
            $table->date('tanggal_turun');
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
        Schema::dropIfExists('pendaftar');
    }
};
