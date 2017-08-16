<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

    /**
     * Get all of the players for the team.
     */
    public function players() {
        return $this->hasMany(Player::class);
    }

}
