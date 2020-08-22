<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $about = About::first();

        return view('admin.about.about_me.create', compact('about'));
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
            'title' => 'required'
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        About::firstOrCreate([
            'title_bg_name' => $input['title_bg_name'],
            'title' => $input['title']
        ]);

        return redirect()->route('about-me.create')
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
            'title' => 'required'
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        About::find($id)->update($input);

        return redirect()->route('about-me.create')
            ->with('success', 'content.updated_successfully');
    }

}
