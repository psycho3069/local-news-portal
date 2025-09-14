<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // MAIN NAVIGATION MENU ITEMS FROM THE ORIGINAL WEBSITE
        $menuItems = [
            [
                'title' => 'প্রচ্ছদ',
                'title_en' => 'Home',
                'url' => '/',
                'type' => 'route',
                'parent_id' => null,
                'sort_order' => 1,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'রাজনীতি',
                'title_en' => 'Politics',
                'url' => '/category/politics',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 2,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'মহানগর',
                'title_en' => 'City',
                'url' => '/category/mohanogor',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 3,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'খেলাধুলা',
                'title_en' => 'Sports',
                'url' => '/category/sports',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 4,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'অর্থনীতি',
                'title_en' => 'Economy',
                'url' => '/category/economy',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 5,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'স্বাস্থ্য',
                'title_en' => 'Health',
                'url' => '/category/health',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 6,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'ক্যাম্পাস',
                'title_en' => 'Campus',
                'url' => '/category/campus',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 7,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'ফিচার',
                'title_en' => 'Features',
                'url' => '/category/features',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 8,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'আইন ও আদালত',
                'title_en' => 'Law & Court',
                'url' => '/category/law-and-court',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 9,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'ধর্ম',
                'title_en' => 'Religion',
                'url' => '/category/religion',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 10,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'আমি আমার',
                'title_en' => 'Me & Mine',
                'url' => '/category/me-mine',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 11,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'এক্সক্লুসিভ',
                'title_en' => 'Exclusive',
                'url' => '/category/exclusive',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 12,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'সপ্তাহের আলোচিত',
                'title_en' => 'Featured of the Week',
                'url' => '/category/featured-of-the-week',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 13,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'মতামত',
                'title_en' => 'Opinion',
                'url' => '/category/opinion',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 14,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'সংগঠন',
                'title_en' => 'Organization',
                'url' => '/category/organization',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 15,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'শহরের বাইরে',
                'title_en' => 'Out of City',
                'url' => '/category/out-of-city',
                'type' => 'category',
                'parent_id' => null,
                'sort_order' => 16,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'ফটো গ্যালারি',
                'title_en' => 'Photo Gallery',
                'url' => '/photo-gallery',
                'type' => 'page',
                'parent_id' => null,
                'sort_order' => 17,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'ভিডিও গ্যালারি',
                'title_en' => 'Video Gallery',
                'url' => '/video-gallery',
                'type' => 'page',
                'parent_id' => null,
                'sort_order' => 18,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'যোগাযোগ',
                'title_en' => 'Contact',
                'url' => '/contact',
                'type' => 'page',
                'parent_id' => null,
                'sort_order' => 19,
                'is_active' => true,
                'target' => '_self'
            ],
            [
                'title' => 'আমাদের সম্পর্কে',
                'title_en' => 'About Us',
                'url' => '/about',
                'type' => 'page',
                'parent_id' => null,
                'sort_order' => 20,
                'is_active' => true,
                'target' => '_self'
            ]
        ];

        foreach ($menuItems as $menuData) {
            Menu::create($menuData);
        }
    }
}