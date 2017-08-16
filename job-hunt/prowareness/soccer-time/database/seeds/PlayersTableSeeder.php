<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            'firstName' => "David",
            'lastName' => "Gea",
            'imageUri' => "http://www.manutd.com/sitecore/shell/~/media/C52DB6DA5F2A421EBD03335A07F8270E.ashx?w=240&h=311&rgn=0,106,2000,2700",
            'teamId' => 1,
        ]);
        DB::table('players')->insert([
            'firstName' => "Victor",
            'lastName' => "Lindelof",
            'imageUri' => "http://www.manutd.com/sitecore/shell/~/media/D904E5EEAC6042F3BC96FE1CCD1688E6.ashx?w=240&h=311&rgn=167,0,2186,2613",
            'teamId' => 1,
        ]);
        DB::table('players')->insert([
            'firstName' => "Mathieu",
            'lastName' => "Debuchy",
            'imageUri' => "https://www.arsenal.com/sites/default/files/styles/large_16x9/public/gun__1470928030_player_1617_debuchy.jpg?itok=zI_XpQnX",
            'teamId' => 2,
        ]);
        DB::table('players')->insert([
            'firstName' => "Aaron",
            'lastName' => "Ramsey",
            'imageUri' => "https://www.arsenal.com/sites/default/files/styles/large_16x9/public/gun__1470928196_player_1617_ramsey.jpg?itok=jqD9hxwr",
            'teamId' => 2,
        ]);
    }
}
