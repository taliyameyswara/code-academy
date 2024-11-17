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
            'content' => 'This chapter covers the basics of Laravel.',
            'video_url' => 'https://www.youtube.com/watch?v=example1',
        ]);

        Chapter::create([
            'course_id' => 1,
            'title' => 'Routing in Laravel',
            'content' => 'Learn about routing in Laravel.',
            'video_url' => 'https://www.youtube.com/watch?v=example2',
        ]);

        Chapter::create([
            'course_id' => 2,
            'title' => 'Introduction to PHP',
            'content' => 'This chapter covers PHP basics.',
            'video_url' => 'https://www.youtube.com/watch?v=example3',
        ]);
    }
}
