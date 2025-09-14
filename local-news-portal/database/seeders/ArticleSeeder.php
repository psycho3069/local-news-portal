<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        
        $sampleArticles = [
            [
                'title' => 'শহরে গভীর ড্রেন নির্মাণ কাজে ধীরগতি',
                'slug' => 'shahore-gobhir-drain-nirman-kaje-dhirogoti',
                'excerpt' => 'নারায়ণগঞ্জে জলাবদ্ধতা নিরসনে গভীর ড্রেন নির্মাণ কাজ চলমান থাকলেও নির্মাণ কাজ ধীরগতিতে চলছে বলে অভিযোগ উঠেছে।',
                'content' => 'নারায়ণগঞ্জে জলাবদ্ধতা নিরসনে গভীর ড্রেন নির্মাণ কাজ চলমান থাকলেও নির্মাণ কাজ ধীরগতিতে চলছে বলে অভিযোগ উঠেছে। শহরের অন্যতম প্রধান সড়কের একাধিক স্থানে গত ৮ মাস ধরে একযোগে ডীপ ড্রেন নির্মাণ কাজ চলমান থাকায় এবং সড়কের পাশে নির্মাণ সামগ্রী স্তূপ করে রাখায় যানবাহন চলাচলে চরম ভোগান্তি পোহাতে হচ্ছে নগরবাসীকে।',
                'category_slug' => 'mohanogor',
                'is_featured' => true,
                'featured_image' => 'media/imgAll/2022July/15-20250820162546.jpg'
            ],
            [
                'title' => 'বিএনপির পাশে ওসমানদের দোসর',
                'slug' => 'bnp-pashe-osmander-doshor',
                'excerpt' => 'নারায়ণগঞ্জ সিটি করপোরেশন নির্বাচনে বিএনপির পাশে দাঁড়িয়েছেন ওসমান পরিবারের সদস্যরা।',
                'content' => 'নারায়ণগঞ্জ সিটি করপোরেশন নির্বাচনে বিএনপির পাশে দাঁড়িয়েছেন ওসমান পরিবারের সদস্যরা। স্থানীয় রাজনীতিতে এই পরিবর্তন নিয়ে ব্যাপক আলোচনা হচ্ছে। রাজনৈতিক বিশ্লেষকরা মনে করছেন এটি একটি গুরুত্বপূর্ণ রাজনৈতিক পরিবর্তনের ইঙ্গিত।',
                'category_slug' => 'politics',
                'is_featured' => true,
                'featured_image' => 'media/imgAll/2022July/SM/14-20250820163123.jpg'
            ],
            [
                'title' => 'ঢাকা-নারায়ণগঞ্জ রুটে ভাড়া ৫০ টাকা থেকে ৫৫ টাকা',
                'slug' => 'dhaka-narayanganj-route-vara-50-taka-theke-55-taka',
                'excerpt' => 'ঢাকা-নারায়ণগঞ্জ রুটে বাস ভাড়া ৫ টাকা বৃদ্ধি পেয়েছে। এখন থেকে যাত্রীদের ৫৫ টাকা ভাড়া দিতে হবে।',
                'content' => 'ঢাকা-নারায়ণগঞ্জ রুটে বাস ভাড়া ৫ টাকা বৃদ্ধি পেয়েছে। এখন থেকে যাত্রীদের ৫৫ টাকা ভাড়া দিতে হবে। জ্বালানি তেলের দাম বৃদ্ধির কারণে এই সিদ্ধান্ত নেওয়া হয়েছে বলে জানিয়েছেন পরিবহন মালিক সমিতির নেতারা।',
                'category_slug' => 'mohanogor',
                'is_featured' => true,
                'featured_image' => 'media/imgAll/2022July/SM/15-20250820143648.jpg'
            ],
            [
                'title' => 'সোনারগাঁয়ে শহীদ মেহেদী-ইমরান স্মৃতি ফুটবল টুর্নামেন্টের উদ্বোধন',
                'slug' => 'sonargaon-shahid-mehedi-imran-smriti-football-tournament-udbodhon',
                'excerpt' => 'সোনারগাঁয়ে শহীদ মেহেদী-ইমরান স্মৃতি ফুটবল টুর্নামেন্টের উদ্বোধন হয়েছে।',
                'content' => 'সোনারগাঁয়ে শহীদ মেহেদী-ইমরান স্মৃতি ফুটবল টুর্নামেন্টের উদ্বোধন হয়েছে। এই টুর্নামেন্টে স্থানীয় ১৬টি দল অংশগ্রহণ করবে। টুর্নামেন্টটি চলবে আগামী ১৫ দিন।',
                'category_slug' => 'sports',
                'is_featured' => false,
                'featured_image' => 'media/imgAll/2022July/SM/12-20250820154509.jpg'
            ],
            [
                'title' => 'চুলা ও পাইপে লুকানো ১৫ হাজার ইয়াবা উদ্ধার',
                'slug' => 'chula-o-pipe-lukano-15-hajar-yaba-uddhar',
                'excerpt' => 'চুলা ও পাইপের ভেতরে লুকিয়ে রাখা ১৫ হাজার পিস ইয়াবা উদ্ধার করেছে পুলিশ।',
                'content' => 'চুলা ও পাইপের ভেতরে লুকিয়ে রাখা ১৫ হাজার পিস ইয়াবা উদ্ধার করেছে পুলিশ। এই অভিযানে একজনকে গ্রেফতার করা হয়েছে। গ্রেফতারকৃত ব্যক্তি একটি মাদক চক্রের সদস্য বলে জানা গেছে।',
                'category_slug' => 'out-of-city',
                'is_featured' => false,
                'featured_image' => 'media/imgAll/2022July/SM/13-20250820153936.jpg'
            ]
        ];

        // Add more sample articles for better testing
        $additionalArticles = [
            [
                'title' => 'পেশাদার গাড়ি চালকদের জন্য বিশেষ প্রশিক্ষণ কর্মশালা',
                'slug' => 'peshadar-gari-chalokder-bishesh-proshikkhon',
                'excerpt' => 'নারায়ণগঞ্জে পেশাদার গাড়ি চালকদের জন্য বিশেষ প্রশিক্ষণ কর্মশালার আয়োজন করা হয়েছে।',
                'content' => 'নারায়ণগঞ্জে পেশাদার গাড়ি চালকদের জন্য বিশেষ প্রশিক্ষণ কর্মশালার আয়োজন করা হয়েছে। এই কর্মশালায় নিরাপদ গাড়ি চালানোর নিয়ম-কানুন এবং যানবাহন রক্ষণাবেক্ষণের বিষয়ে প্রশিক্ষণ দেওয়া হবে।',
                'category_slug' => 'mohanogor',
                'is_featured' => true,
                'featured_image' => 'media/imgAll/2022July/SM/16-20250820142558.jpg'
            ],
            [
                'title' => 'বাস ভাড়া বৃদ্ধির প্রতিবাদ জানিয়েছেন খোরশেদ',
                'slug' => 'bus-vara-briddhi-protibad-khorshed',
                'excerpt' => 'বাস ভাড়া বৃদ্ধির বিরুদ্ধে প্রতিবাদ জানিয়েছেন স্থানীয় নেতা খোরশেদ আলম।',
                'content' => 'বাস ভাড়া বৃদ্ধির বিরুদ্ধে প্রতিবাদ জানিয়েছেন স্থানীয় নেতা খোরশেদ আলম। তিনি বলেন, সাধারণ মানুষের উপর এই অতিরিক্ত চাপ অন্যায়।',
                'category_slug' => 'mohanogor',
                'is_featured' => true,
                'featured_image' => 'media/imgAll/2022July/SM/16-20250820151505.jpg'
            ],
            [
                'title' => 'বিদ্রোহী প্যানেলের চাপে বিএনপি, ফুরফুরে জামায়াত',
                'slug' => 'bidrohi-panel-chape-bnp-jamayat',
                'excerpt' => 'স্থানীয় নির্বাচনে বিদ্রোহী প্যানেলের চাপে পড়েছে বিএনপি।',
                'content' => 'স্থানীয় নির্বাচনে বিদ্রোহী প্যানেলের চাপে পড়েছে বিএনপি। জামায়াতে ইসলামীও এই পরিস্থিতিতে দ্বিধাগ্রস্ত।',
                'category_slug' => 'politics',
                'is_featured' => true,
                'featured_image' => 'media/imgAll/2022July/SM/16-20250819160742.jpg'
            ],
            [
                'title' => 'রিয়া গোপ স্টেডিয়াম: ময়লা ফেলা নিষিদ্ধ স্থানে আবর্জনার স্তূপ',
                'slug' => 'ria-gop-stadium-moyла-abojona',
                'excerpt' => 'রিয়া গোপ স্টেডিয়ামের আশেপাশে ময়লা ফেলা নিষিদ্ধ হলেও সেখানে আবর্জনার স্তূপ।',
                'content' => 'রিয়া গোপ স্টেডিয়ামের আশেপাশে ময়লা ফেলা নিষিদ্ধ হলেও সেখানে আবর্জনার স্তূপ দেখা যাচ্ছে। স্থানীয়রা এই বিষয়ে কর্তৃপক্ষের দৃষ্টি আকর্ষণ করেছেন।',
                'category_slug' => 'out-of-city',
                'is_featured' => false,
                'featured_image' => 'media/imgAll/2022July/SM/16-20250819161334.jpg'
            ]
        ];

        $allArticles = array_merge($sampleArticles, $additionalArticles);

        foreach ($allArticles as $articleData) {
            $category = $categories->where('slug', $articleData['category_slug'])->first();
            
            if ($category) {
                Article::create([
                    'title' => $articleData['title'],
                    'slug' => $articleData['slug'],
                    'excerpt' => $articleData['excerpt'],
                    'content' => $articleData['content'],
                    'category_id' => $category->id,
                    'is_featured' => $articleData['is_featured'],
                    'is_published' => true,
                    'featured_image' => $articleData['featured_image'],
                    'published_at' => Carbon::now()->subHours(rand(1, 48)),
                    'views' => rand(50, 500)
                ]);
            }
        }
    }
}
