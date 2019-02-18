<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'Techawy',
            'address' => 'Sadat city, Menofia, Egypt',
            'contact_number' => '+201010589447',
            'contact_email' => 'admin@laravell.tk',
            'owner' => 'Rami Mohamed',
            'info' => 'I\'m PHP Laravel web developer, i have a very good knowledge in laravel framework.
            I\'m Creating and maintaining REST API\'s and web services.
            I have basic knowlege in HTML5,CSS3 and javascript.
            I have the BS Degree in computer science from Faculty of Computers and information Menofia University.
            I\'m hard worker and aiming to learn everything new as for now i\'m studying NODE.js and AJAX as the needs of the market'
        ]);
    }
}
