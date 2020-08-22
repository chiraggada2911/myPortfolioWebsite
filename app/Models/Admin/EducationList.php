<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class EducationList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year_range', 'degree', 'school', 'desc', 'order',
    ];
}
