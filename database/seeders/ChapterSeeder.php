<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chapter::create([
            'course_id' => 1,
            'title' => 'Introduction to Laravel',
            'video_url' => 'https://www.youtube.com/embed/rIfdg_Ot-LI?si=4x-_l_C9IKOHBGq9',
        ]);

        Chapter::create([
            'course_id' => 1,
            'title' => 'Routing in Laravel',
            'video_url' => 'https://www.youtube.com/embed/rIfdg_Ot-LI?si=4x-_l_C9IKOHBGq9',
        ]);

        Chapter::create([
            'course_id' => 2,
            'title' => 'Introduction to PHP',
            'video_url' => 'https://www.youtube.com/embed/rIfdg_Ot-LI?si=4x-_l_C9IKOHBGq9',
        ]);
    }
}
