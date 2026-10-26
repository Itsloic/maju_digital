<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            [
                'id_level' => 1,
                'nama_level' => 'Administrator',
                'keterangan' => 'Hak akses penuh pengelolaan sistem dan seluruh konten.',
            ],
            [
                'id_level' => 2,
                'nama_level' => 'Editor',
                'keterangan' => 'Hak akses pengelolaan, penyuntingan, dan publikasi artikel.',
            ],
            [
                'id_level' => 3,
                'nama_level' => 'Penulis',
                'keterangan' => 'Hak akses penulisan dan pengiriman draf artikel.',
            ],
            [
                'id_level' => 4,
                'nama_level' => 'Masyarakat',
                'keterangan' => 'Hak akses umum untuk pembaca dan pengaju pengaduan.',
            ],
        ];

        foreach ($levels as $level) {
            DB::table('levels')->updateOrInsert(
                ['id_level' => $level['id_level']],
                [
                    'nama_level' => $level['nama_level'],
                    'keterangan' => $level['keterangan'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
