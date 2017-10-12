<?php

namespace App\Repositories;

use App\User;
use App\Merge;

class MergeRepository {

    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user) {
        return      $user->merges()
                        ->orderBy('created_at', 'desc')
                        ->get();
    }

}
