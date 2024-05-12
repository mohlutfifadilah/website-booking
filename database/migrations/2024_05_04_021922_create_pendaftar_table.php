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
            $table->string('kode_pendaki', 6)->nullable();
            $table->string('nama')->nullable();
            $table->integer('usia')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('no_telepon_darurat')->nullable();
            $table->string('alamat')->nullable();
            $table->date('tanggal_naik')->nullable();
            $table->date('tanggal_turun')->nullable();
            $table->integer('status')->nullable();
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
