<?php

namespace App\Policies;

use App\User;
use App\Merge;
use Illuminate\Auth\Access\HandlesAuthorization;

class MergePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /*
    * Determine if the given user can delete the given merge
    * 
    * @param User $user
    * @param Merge $merge
    * @return bool
    */

    public function destroy(User $user, Merge $merge){
        return $user->id === $merge->user_id;
    }
}
