<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ExperienceList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year_range', 'job', 'company', 'desc', 'order',
    ];
}
