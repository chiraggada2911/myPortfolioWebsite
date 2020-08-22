<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProfilePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfilePhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $profile_photos = ProfilePhoto::all()->sortByDesc('id');
        $count = ProfilePhoto::where('status', 1)->count();

        return view('admin.home.profile_photo.index', compact('profile_photos', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home.profile_photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('profile_image')){

            // Get image file
            $profile_image = $request->file('profile_image');

            // Folder path
            $folder ='uploads/img/profile_photo/';

            // Make image name
            $profile_image_name =  time().'-'.$profile_image->getClientOriginalName();

            // Upload image
            $profile_image->move($folder, $profile_image_name);

            // Set input
            $input['profile_image']= $profile_image_name;

        }

        // Record to database
        ProfilePhoto::firstOrCreate(
            [
                'profile_image' => $input['profile_image']
            ]
        );

        return redirect()->route('profile-photo.index')
            ->with('success','content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving models
        $profile_photo = ProfilePhoto::find($id);

        return view('admin.home.profile_photo.edit', compact( 'profile_photo'));
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
        // Form validation
        $request->validate([
            'profile_image' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $profile_photo = ProfilePhoto::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('profile_image')){

            // Get image file
            $profile_image_file = $request->file('profile_image');

            // Folder path
            $folder = 'uploads/img/profile_photo/';

            // Make image name
            $profile_image_name =  time().'-'.$profile_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$profile_photo->profile_image));

            // Original size upload file
            $profile_image_file->move($folder, $profile_image_name);

            // Set input
            $input['profile_image']= $profile_image_name;

        }

        // Update to database
        ProfilePhoto::find($id)->update($input);

        return redirect()->route('profile-photo.index')
            ->with('success','content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        //Find a model
        $profile_photos = ProfilePhoto::all();

        foreach ($profile_photos as $photo) {
            if ($photo->id == $id) {
                // Update to database
                ProfilePhoto::find($id)->update(['status' => 1]);
            } else {
                // Update to database
                ProfilePhoto::find($photo->id)->update(['status' => 0]);
            }
        }

        return redirect()->route('profile-photo.index')
            ->with('success','content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function all_update_status()
    {
        // Retrieve a model
        $profile_photos = ProfilePhoto::all();

        foreach ($profile_photos as $photo) {
            // Update to database
            ProfilePhoto::find($photo->id)->update(['status' => 0]);
        }

        return redirect()->route('profile-photo.index')
            ->with('success','content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $profile_photo = ProfilePhoto::find($id);

        // Folder path
        $folder = 'uploads/img/profile_photo/';

        // Delete Image
        File::delete(public_path($folder.$profile_photo->profile_image));

        // Delete record
        $profile_photo->delete();

        return redirect()->route('profile-photo.index')
            ->with('success','content.deleted_successfully');
    }
}
