<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->delete();

        DB::table('contents')->insert(
            [
                [
                    'id' => '1',
                    'url' => 'http://www.hanneloregoovaerts.be',
                    'title' => 'hanneloregoovaerts.be',
                    'type' => 'Default',
                    'body' => 'https://d13yacurqjgara.cloudfront.net/users/419040/screenshots/2413869/pidgeo.png',
                    'user_id' => '2',
                    'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => '2',
                    'url' => 'https://youtu.be/AoSOZRNGsPw',
                    'title' => 'Efteling, September 2015 - YouTube',
                    'content' => 'AoSOZRNGsPw',
                    'type' => 'YouTube',
                    'user_id' => '1',
                    'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => '3',
                    'url' => 'https://vimeo.com/148428205',
                    'title' => 'Brett Rheeder - This is Home on Vimeo',
                    'content' => '148428205',
                    'type' => 'Vimeo',
                    'user_id' => '1',
                    'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => '4',
                    'url' => 'https://soundcloud.com/skrillex/avicii-levels-skrillex-remix',
                    'title' => 'Avicii &#39;Levels&#39; Skrillex Remix by Skrillex | Free Listening on SoundCloud',
                    'content' => '34019569',
                    'type' => 'Soundcloud',
                    'user_id' => '3',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'published_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );

    }
}
