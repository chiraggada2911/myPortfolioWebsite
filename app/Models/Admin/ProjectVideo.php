<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProjectVideo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'video_link',
    ];
}
