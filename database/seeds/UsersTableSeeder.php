<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(
            [
                [
                    'id' => '1',
                    'name' => 'Pieter Van der Elst',
                    'email' => 'pieter@pietervde.be',
                    'password' => bcrypt('temptest'),
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => '2',
                    'name' => 'Hannelore Goovaerts',
                    'email' => 'hannelore@goovaerts.be',
                    'password' => bcrypt('temptest'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'id' => '3',
                    'name' => 'Ben Dover',
                    'email' => 'ben@dover.be',
                    'password' => bcrypt('temptest'),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
            ]
        );
    }
}
