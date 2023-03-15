<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DataInsert = [
            [
                'name' => 'Test Post Seeder',
                'description' => 'This is seeder test post',
                'image' => '',
                'user_id' => '1',
            ],
        ];
        DB::table('posts')->insert($DataInsert);
    }
}
