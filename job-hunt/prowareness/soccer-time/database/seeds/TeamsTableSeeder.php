<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	DB::table('teams')->insert([
            'name' => "Manchester United F.C.",
            'logoUri' => "https://lh3.googleusercontent.com/-iDzlv7IG4rY/AAAAAAAAAAI/AAAAAAACvIg/RgmZbx-AN3o/s0-c-k-no-ns/photo.jpg",
        ]);
     	DB::table('teams')->insert([
            'name' => "Arsenal F.C.",
            'logoUri' => "https://lh4.googleusercontent.com/-dZ2LhrpNpxs/AAAAAAAAAAI/AAAAAAAA1os/qrf-VeTVJrg/s0-c-k-no-ns/photo.jpg",
        ]);
    }
}
