<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pemerintahan',
                'slug' => 'pemerintahan',
                'description' => 'Informasi kegiatan dan kebijakan pemerintahan.',
            ],
            [
                'name' => 'Pelayanan Publik',
                'slug' => 'pelayanan-publik',
                'description' => 'Informasi pelayanan kepada masyarakat.',
            ],
            [
                'name' => 'Pembangunan',
                'slug' => 'pembangunan',
                'description' => 'Informasi pembangunan dan infrastruktur daerah.',
            ],
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'description' => 'Informasi pendidikan dan kegiatan sekolah.',
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
                'description' => 'Informasi kesehatan dan layanan kesehatan.',
            ],
            [
                'name' => 'Ekonomi',
                'slug' => 'ekonomi',
                'description' => 'Informasi ekonomi dan perkembangan UMKM.',
            ],
            [
                'name' => 'Lingkungan',
                'slug' => 'lingkungan',
                'description' => 'Informasi lingkungan dan kebersihan daerah.',
            ],
            [
                'name' => 'Pengumuman',
                'slug' => 'pengumuman',
                'description' => 'Pengumuman resmi untuk masyarakat.',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                ]
            );
        }
    }
}
