<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteInfoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $site_info = SiteInfo::first();

        return view('admin.setting.site_info.create', compact('site_info'));
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
            'favicon' => 'mimes:svg,ico,png,jpeg,jpg|max:2048',
            'login_image' => 'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('favicon')){

            // Get image file
            $favicon = $request->file('favicon');

            // Folder path
            $folder ='uploads/img/icon/';

            // Make image name
            $favicon_name =  time().'-'.$favicon->getClientOriginalName();

            // Upload image
            $favicon->move($folder, $favicon_name);

            // Set input
            $input['favicon']= $favicon_name;

        } else {
            // Set input
            $input['favicon']= null;
        }

        if($request->hasFile('login_image')){

            // Get image file
            $login_image = $request->file('login_image');

            // Folder path
            $folder ='uploads/img/login/';

            // Make image name
            $login_image_name =  time().'-'.$login_image->getClientOriginalName();

            // Upload image
            $login_image->move($folder, $login_image_name);

            // Set input
            $input['login_image']= $login_image_name;

        } else {
            // Set input
            $input['login_image']= null;
        }

        // Record to database
        SiteInfo::firstOrCreate([
            'panel_name' => $input['panel_name'],
            'copyright' => $input['copyright'],
            'favicon' => $input['favicon'],
            'login_image' => $input['login_image']
        ]);

        return redirect()->route('site-info.create')
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
            'favicon' => 'mimes:svg,ico,png,jpeg,jpg|max:2048',
            'login_image' => 'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get user
        $site_info = SiteInfo::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('favicon')){

            // Get image file
            $favicon = $request->file('favicon');

            // Folder path
            $folder ='uploads/img/icon/';

            // Make image name
            $favicon_name =  time().'-'.$favicon->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$site_info->favicon));

            // Upload image
            $favicon->move($folder, $favicon_name);

            // Set input
            $input['favicon']= $favicon_name;

        }

        if($request->hasFile('login_image')){

            // Get image file
            $login_image = $request->file('login_image');

            // Folder path
            $folder ='uploads/img/login/';

            // Make image name
            $login_image_name =  time().'-'.$login_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$site_info->login_image));

            // Upload image
            $favicon->move($folder, $login_image_name);

            // Set input
            $input['login_image']= $login_image_name;

        }

        // Update user
        SiteInfo::find($id)->update($input);

        return redirect()->route('site-info.create')
            ->with('success','content.updated_successfully');
    }

}
