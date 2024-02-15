<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guru;
use App\Models\Industri;
use App\Models\Kelas;
use App\Models\Monitoring;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'level' => 'admin',
        ]);

        User::create([
            'username' => 'siswa',
            'password' => bcrypt('54321'),
            'level' => 'siswa',
        ]);

        User::create([
            'username' => 'pemonitoring',
            'password' => bcrypt('12121'),
            'level' => 'guru',
        ]);

        User::create([
            'username' => 'industri',
            'password' => bcrypt('123456'),
            'level' => 'industri',
        ]);

        
        Kelas::create([
            'kelas' => 'XII RPL-1'
        ]);
        
        Siswa::create([
            'nisn' => '612345',
            'nama' => 'Aqilah',
            'nohp' => '083826238485',
            'alamat' => 'kp.sangegeng',
            'id_user' => 2,
            'id_kelas' => 1
        ]);

        Guru::create([
            'nama_guru' => 'hamidah',
            'nohp_guru' => '087654328123',
            'id_user' => 3,
        ]);

        Industri::create([
            'nama_industri' => 'Industri',
            'pemilik_industri' => 'Elsa',
            'alamat_industri' => 'Tasikmalaya',
            'nohp_industri' => '087654328123',
            'id_user' => 4
        ]);

        Monitoring::create([
            'nisn' => '612345',
            'id_industri' => 1,
            'id_guru' => 1
        ]);
    }
}
