<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PersonelInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'desc', 'short_desc', 'btn_name', 'cv_file', 'btn_link_status', 'profile_image',
    ];
}
