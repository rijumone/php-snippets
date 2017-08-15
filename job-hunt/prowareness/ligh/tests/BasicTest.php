<?php

use App\User;
use App\Merge;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BasicTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $this->assertTrue(true);
    }

    public function test_authenticated_users_can_create_merges() {
        $user = factory(User::class)->create();

        $this->actingAs($user)
                ->visit('/merges')
                ->select('raised', 'status')
                ->select(3, 'branch_id')
                ->press('Add Merge')
                ->see('raised')
                ->seeInDatabase('merges', [
                    'status' => 'raised',
                    'branch_id' => 3,
        ]);
    }

    public function test_users_can_delete_a_merge() {
        $user = factory(User::class)->create();

        $user->merges()->save($mergeOne = factory(Merge::class)->create());
        $user->merges()->save($mergeTwo = factory(Merge::class)->create());

        $this->actingAs($user)
                ->visit('/merges')
                ->see($mergeOne->name)
                ->see($mergeTwo->name)
                ->press('delete-task-' . $taskOne->id)
                ->dontSee($taskOne->name)
                ->see($taskTwo->name);
    }

}
