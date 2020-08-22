<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'timer', 'desc', 'order',
    ];
}
