<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\Category::create([
        	'name' => 'Wordpress'
        ]);
        $user = App\Category::create([
        	'name' => 'Laravel'
        ]);
        $user = App\Category::create([
        	'name' => 'PHP'
        ]);
        $user = App\Category::create([
        	'name' => 'Java'
        ]);
        $user = App\Category::create([
        	'name' => 'Javascript'
        ]);
        $user = App\Category::create([
        	'name' => 'C++'
        ]);
        $user = App\Category::create([
        	'name' => 'Python'
        ]);
        $user = App\Category::create([
        	'name' => 'Perl'
        ]);
        $user = App\Category::create([
        	'name' => 'Swift'
        ]);
        $user = App\Category::create([
        	'name' => 'CSS3'
        ]);
        $user = App\Category::create([
        	'name' => 'HTML5'
        ]);
        $user = App\Category::create([
        	'name' => 'AJAX'
        ]);
        $user = App\Category::create([
        	'name' => 'Node.JS'
        ]);
        $user = App\Category::create([
        	'name' => 'Programming'
        ]);
        
    }
}
