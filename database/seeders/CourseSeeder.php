<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Learn Laravel Basics',
            'description' => 'A beginner course to learn the basics of Laravel.',
        ]);

        Course::create([
            'title' => 'Mastering PHP',
            'description' => 'An advanced course to master PHP programming.',
        ]);
    }
}
