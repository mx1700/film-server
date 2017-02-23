<?php

use Illuminate\Database\Seeder;
use \App\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'film_id' => 1,
            'type' => Event::$IMAGE_EVENT,
            'time' => '00:00:05',
            'resources' => 'background/3.jpg',
        ]);

        Event::create([
            'film_id' => 1,
            'type' => Event::$WEB_PAGE_EVENT,
            'time' => '00:00:10',
            'resources' => 'html/1/',
        ]);

        Event::create([
            'film_id' => 1,
            'type' => Event::$VIDEO_EVENT,
            'time' => '00:00:15',
            'resources' => 'movie/1.mov',
        ]);
    }
}
