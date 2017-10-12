<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Merge extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'branch_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'branch_id' => 'int',
    ];

    /**
     * Get the user that owns the merge.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

}
