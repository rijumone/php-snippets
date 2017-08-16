<?php

namespace App\Repositories;

use App\Player;
use App\Team;

class PlayerRepository {

    /**
     * Get all of the players for a given team.
     *
     * @param  Team  $team
     * @return Collection
     */
    public function forTeam(Team $team) {
        return Player::where('teamId', $team->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
    }

}
