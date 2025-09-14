<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Advertisement;
use Carbon\Carbon;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SAMPLE ADVERTISEMENTS FOR THE WEBSITE
        $advertisements = [
            [
                'title' => 'নারায়ণগঞ্জ সিটি করপোরেশন',
                'description' => 'নারায়ণগঞ্জ সিটি করপোরেশনের সেবা সমূহ',
                'image_path' => 'media/ads/city-corporation-ad.jpg',
                'link_url' => 'https://narayanganjcity.gov.bd',
                'position' => 'header',
                'type' => 'banner',
                'is_active' => true,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(6),
                'click_count' => 0,
                'sort_order' => 1
            ],
            [
                'title' => 'স্থানীয় ব্যাংক',
                'description' => 'আপনার আর্থিক সেবার জন্য',
                'image_path' => 'media/ads/bank-ad.jpg',
                'link_url' => '#',
                'position' => 'sidebar',
                'type' => 'banner',
                'is_active' => true,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(3),
                'click_count' => 0,
                'sort_order' => 1
            ],
            [
                'title' => 'শিক্ষা প্রতিষ্ঠান',
                'description' => 'মানসম্মত শিক্ষার জন্য',
                'image_path' => 'media/ads/education-ad.jpg',
                'link_url' => '#',
                'position' => 'sidebar',
                'type' => 'banner',
                'is_active' => true,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(4),
                'click_count' => 0,
                'sort_order' => 2
            ],
            [
                'title' => 'স্বাস্থ্য সেবা',
                'description' => 'আধুনিক চিকিৎসা সেবা',
                'image_path' => 'media/ads/health-ad.jpg',
                'link_url' => '#',
                'position' => 'content',
                'type' => 'banner',
                'is_active' => true,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(2),
                'click_count' => 0,
                'sort_order' => 1
            ],
            [
                'title' => 'ব্যবসা প্রতিষ্ঠান',
                'description' => 'আপনার প্রয়োজনীয় পণ্য ও সেবা',
                'image_path' => 'media/ads/business-ad.jpg',
                'link_url' => '#',
                'position' => 'footer',
                'type' => 'banner',
                'is_active' => true,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(5),
                'click_count' => 0,
                'sort_order' => 1
            ],
            [
                'title' => 'গুগল অ্যাডসেন্স',
                'description' => 'Google AdSense Advertisement',
                'image_path' => null,
                'link_url' => null,
                'position' => 'article',
                'type' => 'adsense',
                'is_active' => true,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addYear(),
                'click_count' => 0,
                'sort_order' => 1,
                'ad_code' => '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-xxxxxxxxxxxxxxxx"
     data-ad-slot="xxxxxxxxxx"
     data-ad-format="auto"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>'
            ]
        ];

        foreach ($advertisements as $adData) {
            Advertisement::create($adData);
        }
    }
}