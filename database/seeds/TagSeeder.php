<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tag::create([
        	'tag' => 'PHP'
        ]);
        \App\Tag::create([
        	'tag' => 'C++'
        ]);
        \App\Tag::create([
        	'tag' => 'Laravel'
        ]);
        \App\Tag::create([
        	'tag' => 'Programming'
        ]);
        \App\Tag::create([
        	'tag' => 'Coding'
        ]); 
    }
}
