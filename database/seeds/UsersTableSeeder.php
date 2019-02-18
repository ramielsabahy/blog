<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        	'name' => 'Rami Mohamed',
        	'email' => 'ramyelsabahy95@gmail.com',
        	'password' => bcrypt('01010589447'),
            'admin' => 1
        ]);
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1509914640aboud.jpg',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'facebook' => 'https://www.facebook.com',
            'youtube' => 'https://www.youtube.com'
        ]);
    }
}
