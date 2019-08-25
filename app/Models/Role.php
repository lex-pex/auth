<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    /*
     * Many-To-Many relations with Users on user_roles
     */
    public function users() {
        return $this->belongsToMany('App\Models\User', 'user_roles'); // Default: role_user - Alphabetical
    }
}

