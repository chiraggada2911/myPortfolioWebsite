<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_name', 'project_view_option', 'status', 'image_status',
        'video_status', 'slider_status', 'item_status', 'order',
    ];

    /**
     * Get the image record associated with the project.
     */
    public function image()
    {
        return $this->hasOne('App\Models\Admin\ProjectImage', 'project_id', 'id');
    }

    /**
     * Get the image record associated with the project.
     */
    public function video()
    {
        return $this->hasOne('App\Models\Admin\ProjectVideo', 'project_id', 'id');
    }

    /**
     * Get the items for the project.
     */
    public function items()
    {
        return $this->hasMany('App\Models\Admin\ProjectItem', 'project_id', 'id');
    }

    /**
     * Get the items for the project.
     */
    public function sliders()
    {
        return $this->hasMany('App\Models\Admin\ProjectSlider', 'project_id', 'id');
    }
}
