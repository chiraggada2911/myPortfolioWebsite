<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Project;
use App\Models\Admin\ProjectSlider;
use App\Models\Admin\ProjectVideo;
use App\Models\Admin\ProjectImage;
use App\Models\Admin\ProjectItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $projects = Project::all();

        return view('admin.workshop.project.create', compact('projects'));
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
            'project_name'   =>  'required',
            'project_view_option'   =>  'required|in:1,2,3',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if ($input['project_view_option'] == 1) {
            $input['image_status'] = 1;
            $input['video_status'] = 0;
            $input['slider_status'] = 0;
        } elseif ($input['project_view_option'] == 2) {
            $input['image_status'] = 0;
            $input['video_status'] = 1;
            $input['slider_status'] = 0;
        } else {
            $input['image_status'] = 0;
            $input['video_status'] = 0;
            $input['slider_status'] = 1;
        }

        // Record to database
        Project::firstOrCreate([
            'project_name' => $input['project_name'],
            'project_view_option' => $input['project_view_option'],
            'image_status' => $input['image_status'],
            'video_status' => $input['video_status'],
            'slider_status' => $input['slider_status'],
            'item_status' => 1,
            'status' => 1,
            'order' => $input['order']
        ]);

        return redirect()->route('project.create')
            ->with('success', 'content.created_successfully');
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
        $project = Project::find($id);

        return view('admin.workshop.project.edit', compact('project'));
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
            'project_name'   =>  'required',
            'project_view_option'   =>  'required|in:1,2,3',
            'item_status'   =>  'integer|in:0,1',
            'status'   =>  'integer|in:0,1',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if ($input['project_view_option'] == 1) {
            $input['image_status'] = 1;
            $input['video_status'] = 0;
            $input['slider_status'] = 0;
        } elseif ($input['project_view_option'] == 2) {
            $input['image_status'] = 0;
            $input['video_status'] = 1;
            $input['slider_status'] = 0;
        } else {
            $input['image_status'] = 0;
            $input['video_status'] = 0;
            $input['slider_status'] = 1;
        }

        // Update to database
        Project::find($id)->update($input);

        return redirect()->route('project.create')
            ->with('success','content.updated_successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_image($id)
    {
        // Retrieving models
        $project_image = ProjectImage::where('project_id', $id)->first();

        return view('admin.workshop.project.image.create', compact('project_image', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_image(Request $request)
    {
        // Form validation
        $request->validate([
            'project_id'   =>  'required',
            'project_image'   =>  'required|image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('project_image')){

            // Get image file
            $project_image = $request->file('project_image');

            // Folder path
            $folder ='uploads/img/project/';

            // Make image name
            $project_image_name =  time().'-'.$project_image->getClientOriginalName();

            // Upload image
            $project_image->move($folder, $project_image_name);

            // Set input
            $input['project_image']= $project_image_name;
        }

        // Record to database
        ProjectImage::firstOrCreate([
            'project_id' => $input['project_id'],
            'project_image' => $input['project_image']
        ]);

        return redirect()->route('project.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_image(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'project_image' => 'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get user
        $project_img = ProjectImage::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('project_image')){

            // Get image file
            $project_image = $request->file('project_image');

            // Folder path
            $folder ='uploads/img/project/';

            // Make image name
            $project_image_name =  time().'-'.$project_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$project_img->project_image));

            // Upload image
            $project_image->move($folder, $project_image_name);

            // Set input
            $input['project_image']= $project_image_name;
        }

        // Update user
        ProjectImage::find($id)->update($input);

        return redirect()->route('project.create')
            ->with('success','content.updated_successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_video($id)
    {
        // Retrieving models
        $project_video = ProjectVideo::where('project_id', $id)->first();

        return view('admin.workshop.project.video.create', compact('project_video', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_video(Request $request)
    {
        // Form validation
        $request->validate([
            'project_id'   =>  'required',
            'video_link'   =>  'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ProjectVideo::firstOrCreate([
            'project_id' => $input['project_id'],
            'video_link' => $input['video_link']
        ]);

        return redirect()->route('project.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_video(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'video_link'   =>  'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update user
        ProjectVideo::find($id)->update($input);

        return redirect()->route('project.create')
            ->with('success','content.updated_successfully');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_slider($id)
    {
        // Retrieving models
        $project_sliders = ProjectSlider::where('project_id', $id)->get();

        return view('admin.workshop.project.slider.create', compact( 'project_sliders', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_slider(Request $request)
    {
        // Form validation
        $request->validate([
            'project_id'   =>  'required',
            'order'   =>  'integer',
            'project_slider'   =>  'required|image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('project_slider')){

            // Get image file
            $project_slider = $request->file('project_slider');

            // Folder path
            $folder ='uploads/img/project/';

            // Make image name
            $project_slider_name =  time().'-'.$project_slider->getClientOriginalName();

            // Upload image
            $project_slider->move($folder, $project_slider_name);

            // Set input
            $input['project_slider']= $project_slider_name;
        }

        // Record to database
        ProjectSlider::firstOrCreate([
            'project_id' => $input['project_id'],
            'order' => $input['order'],
            'project_slider' => $input['project_slider']
        ]);

        return redirect()->route('project.create_slider', $input['project_id'])
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_slider($project_id, $id)
    {
        // Retrieving models
        $slider = ProjectSlider::find($id);

        return view('admin.workshop.project.slider.edit', compact('slider', 'project_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_slider(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'project_slider' => 'image|mimes:png,jpeg,jpg|max:2048',
        ]);

        // Get user
        $project_sld = ProjectSlider::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('project_slider')){

            // Get image file
            $project_slider = $request->file('project_slider');

            // Folder path
            $folder ='uploads/img/project/';

            // Make image name
            $project_slider_name =  time().'-'.$project_slider->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$project_sld->project_slider));

            // Upload image
            $project_slider->move($folder, $project_slider_name);

            // Set input
            $input['project_slider']= $project_slider_name;
        }

        // Update user
        ProjectSlider::find($id)->update($input);

        return redirect()->route('project.create_slider', $input['project_id'])
            ->with('success','content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_slider(Request $request, $id)
    {
        // Get All Request
        $input = $request->all();

        // Retrieve a model
        $project_slider = ProjectSlider::find($id);

        // Folder path
        $folder = 'uploads/img/project/';

        // Delete Image
        File::delete(public_path($folder.$project_slider->project_slider));

        // Delete record
        $project_slider->delete();

        return redirect()->route('project.create_slider', $input['project_id'])
            ->with('success','content.deleted_successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_item($id)
    {
        // Retrieving models
        $project_items = ProjectItem::where('project_id', $id)->get();

        return view('admin.workshop.project.item.create', compact( 'project_items', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_item(Request $request)
    {
        // Form validation
        $request->validate([
            'project_id'   =>  'required',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ProjectItem::firstOrCreate([
            'project_id' => $input['project_id'],
            'name' => $input['name'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('project.create_item', $input['project_id'])
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_item($project_id, $id)
    {
        // Retrieving models
        $item = ProjectItem::find($id);

        return view('admin.workshop.project.item.edit', compact('item', 'project_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_item(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Update user
        ProjectItem::find($id)->update($input);

        return redirect()->route('project.create_item', $input['project_id'])
            ->with('success','content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_item(Request $request, $id)
    {
        // Get All Request
        $input = $request->all();

        // Retrieve a model
        $project_item = ProjectItem::find($id);

        // Delete record
        $project_item->delete();

        return redirect()->route('project.create_item', $input['project_id'])
            ->with('success','content.deleted_successfully');
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
        $project = Project::find($id);

        // Delete model
        $project->delete();

        return redirect()->route('project.create')
            ->with('success','content.deleted_successfully');
    }
}
