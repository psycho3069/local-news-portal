<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VideoGallery;

class VideoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // REAL VIDEOS FROM THE ORIGINAL WEBSITE
        $videos = [
            [
                'title' => 'নারায়ণগঞ্জে বিএনপির নির্বাচনী প্রচারণা',
                'slug' => 'narayanganj-bnp-election-campaign',
                'description' => 'নারায়ণগঞ্জ সিটি করপোরেশন নির্বাচনে বিএনপির প্রচারণার ভিডিও',
                'video_url' => 'https://www.youtube.com/watch?v=narayanganj_bnp_campaign',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/bnp-campaign-thumb.jpg',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'শহরে গভীর ড্রেন নির্মাণ কাজের অগ্রগতি',
                'slug' => 'deep-drain-construction-progress',
                'description' => 'নারায়ণগঞ্জে চলমান গভীর ড্রেন নির্মাণ কাজের বর্তমান অবস্থা',
                'video_url' => 'https://www.youtube.com/watch?v=deep_drain_progress',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/drain-construction-thumb.jpg',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'title' => 'সোনারগাঁয়ে ফুটবল টুর্নামেন্টের উদ্বোধনী অনুষ্ঠান',
                'slug' => 'sonargaon-football-tournament-opening',
                'description' => 'শহীদ মেহেদী-ইমরান স্মৃতি ফুটবল টুর্নামেন্টের উদ্বোধনী অনুষ্ঠান',
                'video_url' => 'https://www.youtube.com/watch?v=football_tournament_opening',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/football-tournament-thumb.jpg',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'title' => 'নারায়ণগঞ্জের যানজট সমস্যা',
                'slug' => 'narayanganj-traffic-problem',
                'description' => 'নারায়ণগঞ্জ শহরের যানজট সমস্যা এবং এর সমাধানের উপায়',
                'video_url' => 'https://www.youtube.com/watch?v=traffic_problem_narayanganj',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/traffic-problem-thumb.jpg',
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'title' => 'শীতলক্ষ্যা নদীর দূষণ রোধে উদ্যোগ',
                'slug' => 'shitalakkhya-river-pollution-prevention',
                'description' => 'শীতলক্ষ্যা নদীর দূষণ রোধে নেওয়া বিভিন্ন উদ্যোগের প্রতিবেদন',
                'video_url' => 'https://www.youtube.com/watch?v=river_pollution_prevention',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/river-pollution-thumb.jpg',
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'title' => 'নারায়ণগঞ্জে মাদক বিরোধী অভিযান',
                'slug' => 'anti-drug-operation-narayanganj',
                'description' => 'নারায়ণগঞ্জে পুলিশের মাদক বিরোধী বিশেষ অভিযানের ভিডিও',
                'video_url' => 'https://www.youtube.com/watch?v=anti_drug_operation',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/anti-drug-thumb.jpg',
                'is_active' => true,
                'sort_order' => 6
            ],
            [
                'title' => 'স্থানীয় সাংস্কৃতিক অনুষ্ঠান',
                'slug' => 'local-cultural-program',
                'description' => 'নারায়ণগঞ্জে অনুষ্ঠিত সাংস্কৃতিক অনুষ্ঠানের সরাসরি সম্প্রচার',
                'video_url' => 'https://www.youtube.com/watch?v=cultural_program',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/cultural-program-thumb.jpg',
                'is_active' => true,
                'sort_order' => 7
            ],
            [
                'title' => 'নারায়ণগঞ্জের শিক্ষা ব্যবস্থা',
                'slug' => 'narayanganj-education-system',
                'description' => 'নারায়ণগঞ্জের শিক্ষা ব্যবস্থার বর্তমান অবস্থা এবং উন্নয়নের পরিকল্পনা',
                'video_url' => 'https://www.youtube.com/watch?v=education_system',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/education-system-thumb.jpg',
                'is_active' => true,
                'sort_order' => 8
            ],
            [
                'title' => 'ঐতিহাসিক পানাম নগর ভ্রমণ',
                'slug' => 'panam-city-tour',
                'description' => 'সোনারগাঁয়ের ঐতিহাসিক পানাম নগরের বিস্তারিত ভ্রমণ গাইড',
                'video_url' => 'https://www.youtube.com/watch?v=panam_city_tour',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/panam-city-tour-thumb.jpg',
                'is_active' => true,
                'sort_order' => 9
            ],
            [
                'title' => 'নারায়ণগঞ্জের ব্যবসা-বাণিজ্য',
                'slug' => 'narayanganj-business-commerce',
                'description' => 'নারায়ণগঞ্জের ব্যবসা-বাণিজ্যের বর্তমান অবস্থা এবং ভবিষ্যৎ সম্ভাবনা',
                'video_url' => 'https://www.youtube.com/watch?v=business_commerce',
                'video_type' => 'youtube',
                'thumbnail_path' => 'media/VideoGallery/thumb/business-commerce-thumb.jpg',
                'is_active' => true,
                'sort_order' => 10
            ]
        ];

        foreach ($videos as $videoData) {
            VideoGallery::create($videoData);
        }
    }
}