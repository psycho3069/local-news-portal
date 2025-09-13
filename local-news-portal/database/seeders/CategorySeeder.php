<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Politics', 'name_bn' => 'রাজনীতি', 'slug' => 'politics', 'sort_order' => 1],
            ['name' => 'Mohanogor', 'name_bn' => 'মহানগর', 'slug' => 'mohanogor', 'sort_order' => 2],
            ['name' => 'Out of City', 'name_bn' => 'শহরের বাইরে', 'slug' => 'out-of-city', 'sort_order' => 3],
            ['name' => 'Organization', 'name_bn' => 'সংগঠন', 'slug' => 'organization', 'sort_order' => 4],
            ['name' => 'Sports', 'name_bn' => 'খেলাধুলা', 'slug' => 'sports', 'sort_order' => 5],
            ['name' => 'Economy', 'name_bn' => 'অর্থনীতি', 'slug' => 'economy', 'sort_order' => 6],
            ['name' => 'Health', 'name_bn' => 'স্বাস্থ্য', 'slug' => 'health', 'sort_order' => 7],
            ['name' => 'Campus', 'name_bn' => 'শিক্ষাঙ্গন', 'slug' => 'campus', 'sort_order' => 8],
            ['name' => 'Features', 'name_bn' => 'ফিচার', 'slug' => 'features', 'sort_order' => 9],
            ['name' => 'Law and Court', 'name_bn' => 'আইন আদালত', 'slug' => 'law-and-court', 'sort_order' => 10],
            ['name' => 'Religion', 'name_bn' => 'ধর্ম', 'slug' => 'religion', 'sort_order' => 11],
            ['name' => 'Me Mine', 'name_bn' => 'আমার আমি', 'slug' => 'me-mine', 'sort_order' => 12],
            ['name' => 'Exclusive', 'name_bn' => 'এক্সক্লুসিভ', 'slug' => 'exclusive', 'sort_order' => 13],
            ['name' => 'Featured of the Week', 'name_bn' => 'সপ্তাহের আলোচিত', 'slug' => 'featured-of-the-week', 'sort_order' => 14],
            ['name' => 'Opinion', 'name_bn' => 'মন্তব্য', 'slug' => 'opinion', 'sort_order' => 15],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
