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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pendaki', 6)->nullable();
            $table->integer('id_kewarganegaraan')->nullable();
            $table->integer('id_identitas')->nullable();
            $table->text('foto_identitas')->nullable();
            $table->string('nama_lengkap');
            $table->string('nomor_identitas')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('usia')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('is_verified')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('lama')->nullable();
            $table->string('jangka')->nullable();
            $table->string('status')->nullable();
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
