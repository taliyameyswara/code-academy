<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'quiz_id' => 1,
            'question' => 'What is Laravel?',
            'option_a' => 'A programming language',
            'option_b' => 'A PHP framework',
            'option_c' => 'A database',
            'option_d' => 'A web server',
            'correct_option' => 'b',
        ]);

        Question::create([
            'quiz_id' => 2,
            'question' => 'What is the purpose of routing in Laravel?',
            'option_a' => 'To connect views and controllers',
            'option_b' => 'To manage databases',
            'option_c' => 'To generate reports',
            'option_d' => 'To style the website',
            'correct_option' => 'a',
        ]);

        Question::create([
            'quiz_id' => 3,
            'question' => 'What does PHP stand for?',
            'option_a' => 'Personal Home Page',
            'option_b' => 'Private Home Page',
            'option_c' => 'Public Home Page',
            'option_d' => 'Programming Home Page',
            'correct_option' => 'a',
        ]);
    }
}
