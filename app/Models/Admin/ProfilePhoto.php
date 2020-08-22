<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProfilePhoto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_image', 'status',
    ];
}
