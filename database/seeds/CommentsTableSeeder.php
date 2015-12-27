<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        DB::table('comments')->insert(
            [
                [
                    'id' => '1',
                    'user_id' => '1',
                    'content_id' => '1',
                    'body' => 'Nice site! Mobile view still has some bugs, though.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => '2',
                    'user_id' => '1',
                    'content_id' => '2',
                    'body' => 'Such an awesome trip!',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => '3',
                    'user_id' => null,
                    'content_id' => '1',
                    'body' => 'This should be anonymous.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => '4',
                    'user_id' => '3',
                    'content_id' => '4',
                    'body' => 'I liked the original, but this one is better!',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => '5',
                    'user_id' => '2',
                    'content_id' => '3',
                    'body' => 'Adventurous!',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
