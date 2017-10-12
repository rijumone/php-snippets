<?php

namespace App;

use App\Task;
use App\Merge;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the tasks for the user.
     */
    public function tasks() {
        return $this->hasMany(Task::class);
    }

    /**
     * Get all of the merges for the user.
     */
    public function merges() {
        return $this->hasMany(Merge::class);
    }

}
