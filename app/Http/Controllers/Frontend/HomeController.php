<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content;
use App\Models\Admin\ProfilePhoto;
use App\Models\Admin\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $profile_photos = ProfilePhoto::all();
        $array_ids =ProfilePhoto::where('id' ,'>' ,0)->pluck('id')->toArray();
        $content = Content::first();
        $sections = Section::all();

        if (count($profile_photos) > 0) {
            foreach ($profile_photos as $profile_photo) {

                if ($profile_photo->status == 1) {

                    // Get photo
                    $photo = $profile_photo->profile_image;

                } else {

                    // Get random id
                    $random_id = Arr::random($array_ids);

                    // Find model
                    $profile_photo = ProfilePhoto::find($random_id);

                    // Get photo
                    $photo = $profile_photo->profile_image;
                }

            }
        } else {
            // Get photo
            $photo = null;
        }

        // For Section Enable/Disable
        foreach ($sections as $section) {
            $section_arr[$section->section] = $section->status;
        }

        if ($section_arr['maintenance_mode'] == 1) {
            // Maintenance mode view
            return view('frontend.maintenance-mode.index', compact('section_arr'));

        } else {

            return view('frontend.home.index', compact('photo', 'content'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
