<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SkillList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'percent', 'title', 'order',
    ];
}
