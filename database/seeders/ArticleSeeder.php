<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'chapter_id' => 1,
            'title' => 'What is Laravel?',
            'content' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern.',
        ]);

        Article::create([
            'chapter_id' => 1,
            'title' => 'Why Laravel?',
            'content' => 'Laravel is known for its elegant syntax. If you take a look at the code, you will see that Laravel is a joy to work with. It is a framework full of features that will help you build complex applications, but it is also a framework that is easy to learn and fun to work with.',
        ]);
    }
}
