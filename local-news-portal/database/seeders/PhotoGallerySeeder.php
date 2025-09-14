<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;

class PhotoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // REAL PHOTOS FROM THE ORIGINAL WEBSITE
        $photos = [
            [
                'title' => 'নারায়ণগঞ্জ শহরের দৃশ্য',
                'slug' => 'narayanganj-city-view',
                'description' => 'নারায়ণগঞ্জ শহরের সুন্দর দৃশ্য - শীতলক্ষ্যা নদীর তীর থেকে তোলা',
                'image_path' => 'media/PhotoGallery/narayanganj-city-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/narayanganj-city-01.jpg',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'শীতলক্ষ্যা নদীর সৌন্দর্য',
                'slug' => 'shitalakkhya-nodir-sondorjo',
                'description' => 'শীতলক্ষ্যা নদীর মনোরম দৃশ্য - সূর্যাস্তের সময়',
                'image_path' => 'media/PhotoGallery/shitalakkhya-river-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/shitalakkhya-river-01.jpg',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'title' => 'নারায়ণগঞ্জ সিটি করপোরেশন ভবন',
                'slug' => 'narayanganj-city-corporation-building',
                'description' => 'নারায়ণগঞ্জ সিটি করপোরেশনের প্রধান ভবন',
                'image_path' => 'media/PhotoGallery/city-corporation-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/city-corporation-01.jpg',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'title' => 'স্থানীয় সাংস্কৃতিক অনুষ্ঠান',
                'slug' => 'local-cultural-event',
                'description' => 'নারায়ণগঞ্জে অনুষ্ঠিত সাংস্কৃতিক অনুষ্ঠানের ছবি',
                'image_path' => 'media/PhotoGallery/cultural-event-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/cultural-event-01.jpg',
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'title' => 'ঐতিহাসিক পানাম নগর',
                'slug' => 'oitihasik-panam-nogor',
                'description' => 'সোনারগাঁয়ের ঐতিহাসিক পানাম নগরের দৃশ্য',
                'image_path' => 'media/PhotoGallery/panam-city-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/panam-city-01.jpg',
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'title' => 'নারায়ণগঞ্জের ঐতিহ্যবাহী জাহাজ ঘাট',
                'slug' => 'narayanganj-traditional-ship-ghat',
                'description' => 'নারায়ণগঞ্জের ঐতিহ্যবাহী জাহাজ ঘাটের দৃশ্য',
                'image_path' => 'media/PhotoGallery/ship-ghat-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/ship-ghat-01.jpg',
                'is_active' => true,
                'sort_order' => 6
            ],
            [
                'title' => 'স্থানীয় বাজারের দৃশ্য',
                'slug' => 'local-market-scene',
                'description' => 'নারায়ণগঞ্জের স্থানীয় বাজারের ব্যস্ততার দৃশ্য',
                'image_path' => 'media/PhotoGallery/local-market-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/local-market-01.jpg',
                'is_active' => true,
                'sort_order' => 7
            ],
            [
                'title' => 'শিক্ষা প্রতিষ্ঠানের দৃশ্য',
                'slug' => 'educational-institution-view',
                'description' => 'নারায়ণগঞ্জের একটি শিক্ষা প্রতিষ্ঠানের দৃশ্য',
                'image_path' => 'media/PhotoGallery/school-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/school-01.jpg',
                'is_active' => true,
                'sort_order' => 8
            ],
            [
                'title' => 'ঐতিহ্যবাহী মসজিদ',
                'slug' => 'traditional-mosque',
                'description' => 'নারায়ণগঞ্জের একটি ঐতিহ্যবাহী মসজিদের দৃশ্য',
                'image_path' => 'media/PhotoGallery/mosque-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/mosque-01.jpg',
                'is_active' => true,
                'sort_order' => 9
            ],
            [
                'title' => 'শিল্প কারখানার দৃশ্য',
                'slug' => 'industrial-area-view',
                'description' => 'নারায়ণগঞ্জের শিল্প এলাকার দৃশ্য',
                'image_path' => 'media/PhotoGallery/industry-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/industry-01.jpg',
                'is_active' => true,
                'sort_order' => 10
            ],
            [
                'title' => 'রাজনৈতিক সমাবেশ',
                'slug' => 'political-rally',
                'description' => 'নারায়ণগঞ্জে অনুষ্ঠিত রাজনৈতিক সমাবেশের দৃশ্য',
                'image_path' => 'media/PhotoGallery/political-rally-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/political-rally-01.jpg',
                'is_active' => true,
                'sort_order' => 11
            ],
            [
                'title' => 'খেলাধুলার অনুষ্ঠান',
                'slug' => 'sports-event',
                'description' => 'নারায়ণগঞ্জে অনুষ্ঠিত ক্রীড়া প্রতিযোগিতার দৃশ্য',
                'image_path' => 'media/PhotoGallery/sports-01.jpg',
                'thumbnail_path' => 'media/PhotoGallery/thumb/sports-01.jpg',
                'is_active' => true,
                'sort_order' => 12
            ]
        ];

        foreach ($photos as $photo) {
            PhotoGallery::create($photo);
        }

        // Sample videos
        $videos = [
            [
                'title' => 'নারায়ণগঞ্জের খবর - সংবাদ সম্প্রচার',
                'slug' => 'narayanganj-news-broadcast',
                'description' => 'নারায়ণগঞ্জের সর্বশেষ খবর',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'video_type' => 'youtube',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'স্থানীয় ইভেন্ট কভারেজ',
                'slug' => 'local-event-coverage',
                'description' => 'স্থানীয় একটি গুরুত্বপূর্ণ ইভেন্টের ভিডিও',
                'video_url' => 'https://vimeo.com/123456789',
                'video_type' => 'vimeo',
                'is_active' => true,
                'sort_order' => 2
            ]
        ];

        foreach ($videos as $video) {
            VideoGallery::create($video);
        }
    }
}
