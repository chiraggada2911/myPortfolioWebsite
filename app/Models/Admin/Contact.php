<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_bg_name', 'title', 'custom_title', 'desc', 'email_title', 'email',
        'phone_title', 'phone', 'address_title', 'address',
    ];
}
