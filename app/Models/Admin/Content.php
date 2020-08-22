<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'small_title', 'main_title', 'short_desc', 'btn_name', 'btn_link', 'btn_link_status',
    ];
}
