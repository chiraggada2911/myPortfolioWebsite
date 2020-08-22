<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'project_image',
    ];
}
