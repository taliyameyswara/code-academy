<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create([
            'chapter_id' => 1,
        ]);

        Quiz::create([
            'chapter_id' => 2,
        ]);

        Quiz::create([
            'chapter_id' => 3,
        ]);
    }
}
