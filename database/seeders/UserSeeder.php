<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // Administrator (Level 1) - 1 user
            [
                'name' => 'Hendra Gunawan',
                'email' => 'hendra.gunawan@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'administrator',
                'level_id' => 1,
            ],
            // Editor (Level 2) - 2 users
            [
                'name' => 'Siti Marlina',
                'email' => 'siti.marlina@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'editor',
                'level_id' => 2,
            ],
            [
                'name' => 'Maya Anggraini',
                'email' => 'maya.anggraini@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'editor',
                'level_id' => 2,
            ],
            // Penulis (Level 3) - 7 users
            [
                'name' => 'Rina Wulandari',
                'email' => 'rina.wulandari@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'penulis',
                'level_id' => 3,
            ],
            [
                'name' => 'Dedi Hartono',
                'email' => 'dedi.hartono@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'penulis',
                'level_id' => 3,
            ],
            [
                'name' => 'Dewi Kartika',
                'email' => 'dewi.kartika@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'penulis',
                'level_id' => 3,
            ],
            [
                'name' => 'Eko Susilo',
                'email' => 'eko.susilo@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'penulis',
                'level_id' => 3,
            ],
            [
                'name' => 'Wahyu Nugroho',
                'email' => 'wahyu.nugroho@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'penulis',
                'level_id' => 3,
            ],
            [
                'name' => 'Agus Prasetyo',
                'email' => 'agus.prasetyo@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'penulis',
                'level_id' => 3,
            ],
            [
                'name' => 'Bambang Setiawan',
                'email' => 'bambang.setiawan@majudigital.go.id',
                'password' => Hash::make('MajuDigital#2026'), // MajuDigital#2026
                'role' => 'penulis',
                'level_id' => 3,
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'role' => $user['role'],
                    'level_id' => $user['level_id'],
                    'email_verified_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}