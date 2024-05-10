<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::create([
            'nama_lengkap' => 'Admin',
            'email' => 'admin@booking.com',
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);

        \App\Models\Kewarganegaraan::create([
            'jenis_kewarganegaraan' => 'WNI',
        ]);

        \App\Models\Kewarganegaraan::create([
            'jenis_kewarganegaraan' => 'WNA',
        ]);

        \App\Models\Identitas::create([
            'jenis_identitas' => 'KTP',
        ]);

        \App\Models\Identitas::create([
            'jenis_identitas' => 'SIM',
        ]);

        \App\Models\Identitas::create([
            'jenis_identitas' => 'Kartu Pelajar',
        ]);

        \App\Models\Identitas::create([
            'jenis_identitas' => 'Passport',
        ]);

        \App\Models\Identitas::create([
            'jenis_identitas' => 'Kitas',
        ]);

    }
}
