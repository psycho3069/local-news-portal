<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            SettingSeeder::class,
            AdminUserSeeder::class,
            ArticleSeeder::class,
            PhotoGallerySeeder::class,
            VideoGallerySeeder::class,
            ContactSeeder::class,
            MenuSeeder::class,
            AdvertisementSeeder::class,
            PageSeeder::class,
        ]);
    }
}
