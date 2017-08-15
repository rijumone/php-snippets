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
        return Merge::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
    }

}
