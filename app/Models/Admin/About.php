<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_bg_name', 'title', 'desc',
    ];
}
