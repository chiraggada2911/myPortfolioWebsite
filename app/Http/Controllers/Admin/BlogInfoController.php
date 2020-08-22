<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogInfo;
use Illuminate\Http\Request;

class BlogInfoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $blog_info= BlogInfo::first();;

        return view('admin.blog.blog_info.create', compact('blog_info'));
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
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        BlogInfo::firstOrCreate([
            'title_bg_name' => $input['title_bg_name'],
            'title' => $input['title']
        ]);

        return redirect()->route('blog-info.create')
            ->with('success', 'content.created_successfully');
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
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        BlogInfo::find($id)->update($input);

        return redirect()->route('blog-info.create')
            ->with('success', 'content.updated_successfully');
    }

}
