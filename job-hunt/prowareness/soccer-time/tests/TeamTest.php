<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /*
    public function testExample()
    {
        $this->assertTrue(true);
    }
    */

    public function test_users_can_view_teams() {
        $this->visit('/teams')
                ->see('Manchester');
    }

    public function test_users_can_view_players() {
        $this->visit('/team/1')
                ->see('De Gea1');
    }

}
