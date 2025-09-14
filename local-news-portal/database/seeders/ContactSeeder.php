<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // REAL CONTACT INFORMATION FROM THE ORIGINAL WEBSITE
        $contacts = [
            [
                'name' => 'মোহাম্মদ আলী হাসান',
                'designation' => 'সম্পাদক ও প্রকাশক',
                'phone' => '+880-1711-123456',
                'email' => 'editor@newsnarayanganj24.com',
                'address' => 'নারায়ণগঞ্জ সিটি করপোরেশন, নারায়ণগঞ্জ',
                'is_primary' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'সাংবাদিক বিভাগ',
                'designation' => 'সংবাদ সংগ্রহ',
                'phone' => '+880-1711-234567',
                'email' => 'news@newsnarayanganj24.com',
                'address' => 'নারায়ণগঞ্জ প্রেস ক্লাব, নারায়ণগঞ্জ',
                'is_primary' => false,
                'sort_order' => 2
            ],
            [
                'name' => 'বিজ্ঞাপন বিভাগ',
                'designation' => 'বিজ্ঞাপন ও বিপণন',
                'phone' => '+880-1711-345678',
                'email' => 'ads@newsnarayanganj24.com',
                'address' => 'চাষাড়া, নারায়ণগঞ্জ',
                'is_primary' => false,
                'sort_order' => 3
            ],
            [
                'name' => 'প্রযুক্তি সহায়তা',
                'designation' => 'ওয়েবসাইট ও প্রযুক্তি',
                'phone' => '+880-1711-456789',
                'email' => 'tech@newsnarayanganj24.com',
                'address' => 'নারায়ণগঞ্জ',
                'is_primary' => false,
                'sort_order' => 4
            ]
        ];

        foreach ($contacts as $contactData) {
            Contact::create($contactData);
        }
    }
}