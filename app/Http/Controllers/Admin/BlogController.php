<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $blogs = Blog::all()->sortByDesc('id');

        return view('admin.blog.post.index', compact('blogs' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.post.create');
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
            'title' => 'required',
            'blog_image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('blog_image')){

            // Get image file
            $blog_image = $request->file('blog_image');

            // Folder path
            $folder ='uploads/img/blog/';

            // Make image name
            $blog_image_name =  time().'-'.$blog_image->getClientOriginalName();

            // Upload image
            $blog_image->move($folder, $blog_image_name);

            // Set input
            $input['blog_image']= $blog_image_name;

        }  else {
            // Set input
            $input['blog_image']= null;
        }

        // Record to database
        Blog::firstOrCreate([
            'title' => $input['title'],
            'short_desc' => $input['short_desc'],
            'desc' => Purifier::clean($input['desc']),
            'tag' => $input['tag'],
            'author' => $input['author'],
            'status' => $input['status'],
            'blog_image' => $input['blog_image']
        ]);

        return redirect()->route('blog.index')
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
        /// Retrieving models
        $blog = Blog::find($id);

        return view('admin.blog.post.edit', compact('blog'));
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
            'title' => 'required',
            'blog_image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'integer|in:0,1',
        ]);

        $blog = Blog::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('blog_image')){

            // Get image file
            $blog_image_file = $request->file('blog_image');

            // Folder path
            $folder = 'uploads/img/blog/';

            // Make image name
            $blog_image_name =  time().'-'.$blog_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$blog->blog_image));

            // Original size upload file
            $blog_image_file->move($folder, $blog_image_name);

            // Set input
            $input['blog_image']= $blog_image_name;

        }

        // XSS Purifier
        $input['desc'] = Purifier::clean($input['desc']);

        // Update to database
        Blog::find($id)->update($input);

        return redirect()->route('blog.index')
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
        $blog = Blog::find($id);

        // Folder path
        $folder = 'uploads/img/blog/';

        // Delete Image
        File::delete(public_path($folder.$blog->blog_image));

        // Delete record
        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success','content.deleted_successfully');
    }
}
