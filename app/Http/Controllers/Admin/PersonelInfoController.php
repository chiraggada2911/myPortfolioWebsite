<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PersonelInfo;
use App\Models\Admin\InfoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PersonelInfoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $personel_info = PersonelInfo::first();
        $infos = InfoList::all();

        return view('admin.about.personel_info.create', compact('personel_info', 'infos'));
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
            'profile_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
            'cv_file'   =>  'mimes:pdf|max:2048',
            'btn_link_status'   =>  'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('profile_image')){

            // Get image file
            $profile_image = $request->file('profile_image');

            // Folder path
            $folder ='uploads/img/personel_info/';

            // Make image name
            $profile_image_name =  time().'-'.$profile_image->getClientOriginalName();

            // Upload image
            $profile_image->move($folder, $profile_image_name);

            // Set input
            $input['profile_image']= $profile_image_name;

        } else {
            // Set input
            $input['profile_image']= null;
        }

        if( $request->hasFile('cv_file')){

            // Get cv file
            $cv_file = $request->file('cv_file');

            // Folder path
            $folder ='uploads/img/personel_info/';

            // Make cv name
            $cv_file_name =  time().'-'.$cv_file->getClientOriginalName();

            // Upload file
            $cv_file->move($folder, $cv_file_name);

            // Set input
            $input['cv_file']= $cv_file_name;
        } else {
            // Set input
            $input['cv_file']= null;
        }

        // Record to database
        PersonelInfo::firstOrCreate([
            'title' => $input['title'],
            'desc' => $input['desc'],
            'btn_name' => $input['btn_name'],
            'btn_link_status' => $input['btn_link_status'],
            'profile_image' => $input['profile_image'],
            'cv_file' => $input['cv_file']
        ]);

        return redirect()->route('personel-info.create')
            ->with('success','content.created_successfully');
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
            'profile_image'   =>  'image|mimes:png,jpeg,jpg|max:2048',
            'cv_file'   =>  'mimes:pdf|max:2048',
            'btn_link_status'   =>  'integer|in:0,1',
        ]);

        // Get user
        $personel_info = PersonelInfo::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('profile_image')){

            // Get image file
            $profile_image = $request->file('profile_image');

            // Folder path
            $folder ='uploads/img/personel_info/';

            // Make image name
            $profile_image_name =  time().'-'.$profile_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$personel_info->profile_image));

            // Upload image
            $profile_image->move($folder, $profile_image_name);

            // Set input
            $input['profile_image']= $profile_image_name;

        }

        if( $request->hasFile('cv_file')){

            // Get cv file
            $cv_file = $request->file('cv_file');

            // Folder path
            $folder ='uploads/img/personel_info/';

            // Make cv name
            $cv_file_name =  time().'-'.$cv_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$personel_info->cv_file));

            // Upload file
            $cv_file->move($folder, $cv_file_name);

            // Set input
            $input['cv_file']= $cv_file_name;

        }

        // Update user
        PersonelInfo::find($id)->update($input);

        return redirect()->route('personel-info.create')
            ->with('success','content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_info_list(Request $request)
    {

        // Form validation
        $request->validate([
            'name'   =>  'required|max:255',
            'desc'   =>  'required',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();


        // Record to database
        InfoList::create($input);

        return redirect()->route('personel-info.create')
            ->with('success','content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_info_list($id)
    {
        // Retrieving models
        $info = InfoList::find($id);

        return view('admin.about.personel_info.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_info_list(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'name'   =>  'required|max:255',
            'desc'   =>  'required',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        InfoList::find($id)->update($input);

        return redirect()->route('personel-info.create')
            ->with('success','content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_info_list($id)
    {
        // Retrieve a model
        $info = InfoList::find($id);

        // Delete record
        $info->delete();

        return redirect()->route('personel-info.create')
            ->with('success','content.deleted_successfully');
    }

}
