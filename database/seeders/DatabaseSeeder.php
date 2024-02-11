<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\FontBank::create([
        //     'name' => 'Roboto'
        // ]);

         \App\Models\SlideConfig::create([
             'bible_image_background' => 1,
             'bible_video_background' => 1,
             'type' => 'image',
             'bg_color' => 'rgba(0, 0, 0, 0.6)',
             'bible_font' => '1'
         ]);
    }
}
