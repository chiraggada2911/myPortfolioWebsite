<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class InfoList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'desc', 'order',
    ];
}
