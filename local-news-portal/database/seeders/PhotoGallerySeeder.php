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
        // Sample photos
        $photos = [
            [
                'title' => 'নারায়ণগঞ্জ শহরের দৃশ্য',
                'slug' => 'narayanganj-city-view',
                'description' => 'নারায়ণগঞ্জ শহরের সুন্দর দৃশ্য',
                'image_path' => 'media/common/newsnarayanganj24.jpg',
                'thumbnail_path' => 'media/common/newsnarayanganj24.jpg',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'স্থানীয় অনুষ্ঠান',
                'slug' => 'local-event',
                'description' => 'স্থানীয় একটি সাংস্কৃতিক অনুষ্ঠানের ছবি',
                'image_path' => 'media/common/newsnarayanganj24.jpg',
                'thumbnail_path' => 'media/common/newsnarayanganj24.jpg',
                'is_active' => true,
                'sort_order' => 2
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
