<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProjectSlider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'project_slider', 'order',
    ];
}
