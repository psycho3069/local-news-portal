<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'News Narayanganj', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_name_bn', 'value' => 'নিউজ নারায়ণগঞ্জ', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'নারায়ণগঞ্জের সংবাদ সারথি', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'আমাদের সীমাবদ্ধতা অনেক, তবুও সত্য লেখার চেষ্টা অবিরাম। খবর এবং খবরের পিছনের ঘটনা জানুন। আমাদের সঙ্গে থাকুন, আপনাদের সঙ্গেই রাখুন।', 'type' => 'textarea', 'group' => 'general'],
            ['key' => 'contact_phone', 'value' => '+৮৮০-১৭১১-১২৩৪৫৬', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'info@newsnarayanganj.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'নারায়ণগঞ্জ, ঢাকা, বাংলাদেশ', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/newsnarayanganj24', 'type' => 'text', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/newsnarayanganj', 'type' => 'text', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com/newsnarayanganj', 'type' => 'text', 'group' => 'social'],
            ['key' => 'google_analytics', 'value' => 'G-JE2HJTT1DN', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'meta_keywords', 'value' => 'নারায়ণগঞ্জ, সংবাদ, খবর, বাংলাদেশ, রাজনীতি, খেলাধুলা', 'type' => 'text', 'group' => 'seo'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
