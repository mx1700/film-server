<?php

use Illuminate\Database\Seeder;

class LocationCardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\LocationCard::create([
            'film_id' => 1,
            'start_time' => '00:00:02',
            'card' => 'background/1.jpg',
        ]);

        \App\LocationCard::create([
            'film_id' => 1,
            'start_time' => '00:00:7',
            'card' => 'background/2.jpg',
        ]);

        \App\LocationCard::create([
            'film_id' => 1,
            'start_time' => '00:00:15',
            'card' => 'background/3.jpg',
        ]);
    }
}
