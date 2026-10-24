<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pemerintahan',
                'slug' => 'pemerintahan',
                'description' => 'Informasi kegiatan dan kebijakan pemerintahan.',
                'status_aktif' => 1,
            ],
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'description' => 'Informasi pendidikan dan kegiatan sekolah.',
                'status_aktif' => 1,
            ],
            [
                'name' => 'Pelayanan Publik',
                'slug' => 'pelayanan-publik',
                'description' => 'Informasi pelayanan kepada masyarakat.',
                'status_aktif' => 1,
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
                'description' => 'Informasi kesehatan dan layanan kesehatan.',
                'status_aktif' => 1,
            ],
            [
                'name' => 'Infrastruktur',
                'slug' => 'infrastruktur',
                'description' => 'Informasi pembangunan dan infrastruktur daerah.',
                'status_aktif' => 1,
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'status_aktif' => $category['status_aktif'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
