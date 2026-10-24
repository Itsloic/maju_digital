<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LevelSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            ArtikelSeeder::class,
            ComplaintCategorySeeder::class,
        ]);
    }
}