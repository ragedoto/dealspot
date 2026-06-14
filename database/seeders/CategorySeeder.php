<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Steam' => ['Top Up', 'Accounts', 'Keys', 'Gifts'],
            'Discord' => ['Nitro', 'Server Boosts', 'Servers', 'Accounts'],
            'Telegram' => ['Accounts', 'Channels', 'Members', 'Telegram Stars'],
            'Instagram' => ['Accounts', 'Followers', 'Likes', 'Ads'],
            'TikTok' => ['Accounts', 'Followers', 'Likes', 'Views'],
            'YouTube' => ['Channels', 'Subscribers', 'Views', 'Monetization'],
            'Twitch' => ['Accounts', 'Followers', 'Subscribers', 'Views'],
            'Spotify' => ['Premium', 'Accounts'],
            'Netflix' => ['Subscriptions', 'Accounts'],
            'ChatGPT' => ['Plus', 'Accounts'],
            'Other Services' => [],
        ];

        foreach ($categories as $parentName => $children) {
            $parent = Category::create([
                'name' => $parentName,
                'slug' => str($parentName)->slug(),
                'parent_id' => null,
            ]);

            foreach ($children as $childName) {
                Category::create([
                    'name' => $childName,
                    'slug' => str($parentName . ' ' . $childName)->slug(),
                    'parent_id' => $parent->id,
                ]);
            }
        }
    }
}