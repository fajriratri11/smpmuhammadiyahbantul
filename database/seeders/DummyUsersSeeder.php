<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nisn' => '0001',
                'password' => bcrypt('12345'),
                'role' => 'admin',
                'email' => 'adminbk@sekolah.id',
            ],
            
            [
                'nisn' => '0004',
                'password' => bcrypt('1235678'),
                'role' => 'siswa',
                'email' => 'siswa@sekolah.id',
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
