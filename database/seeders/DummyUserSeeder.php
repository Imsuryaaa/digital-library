<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'wildan',
                'nama_lengkap' => 'Wildan Khalid Wijaya',
                'alamat' => 'Muncul',
                'no_telp' => '087876542516',
                'email' => 'wildan123@gmail.com',
                'level' => 'peminjam',
                'password' => bcrypt('peminjam12345')
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
