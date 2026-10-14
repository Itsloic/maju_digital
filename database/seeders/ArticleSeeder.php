<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'category_slug' => 'pemerintahan',
                'title' => 'Pemerintah Daerah Tingkatkan Kualitas Pelayanan Publik',
                'slug' => 'peningkatan-kualitas-pelayanan-publik',
                'excerpt' => 'Informasi mengenai upaya peningkatan kualitas pelayanan publik.',
                'content' => 'Ini adalah berita contoh untuk pengujian website Maju Digital. Ganti dengan berita resmi yang sudah diverifikasi sebelum website dipublikasikan.',
                'is_featured' => true,
            ],
            [
                'category_slug' => 'pembangunan',
                'title' => 'Pembangunan Infrastruktur Daerah',
                'slug' => 'pembangunan-infrastruktur-daerah',
                'excerpt' => 'Informasi mengenai pembangunan infrastruktur daerah.',
                'content' => 'Ini adalah berita contoh mengenai pembangunan infrastruktur untuk pengujian website Maju Digital.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pendidikan',
                'title' => 'Informasi Pendidikan untuk Masyarakat',
                'slug' => 'informasi-pendidikan-masyarakat',
                'excerpt' => 'Informasi dan perkembangan di bidang pendidikan.',
                'content' => 'Ini adalah berita contoh mengenai pendidikan untuk pengujian website Maju Digital.',
                'is_featured' => false,
            ],
        ];

        foreach ($articles as $item) {
            $category = Category::where(
                'slug',
                $item['category_slug']
            )->firstOrFail();

            Article::firstOrCreate(
                ['slug' => $item['slug']],
                [
                    'category_id' => $category->id,
                    'title' => $item['title'],
                    'excerpt' => $item['excerpt'],
                    'content' => $item['content'],
                    'image' => null,
                    'status' => 'published',
                    'is_featured' => $item['is_featured'],
                    'published_at' => now(),
                ]
            );
        }
    }
}
