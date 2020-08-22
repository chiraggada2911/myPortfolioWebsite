<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProjectItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'name', 'desc', 'order',
    ];
}
