<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $content = Content::first();;

        return view('admin.home.content.create', compact('content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'btn_link_status' => 'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Content::firstOrCreate([
            'small_title' => $input['small_title'],
            'main_title' => $input['main_title'],
            'short_desc' => $input['short_desc'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'btn_link_status' => $input['btn_link_status']
        ]);

        return redirect()->route('content.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'btn_link_status' => 'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        Content::find($id)->update($input);

        return redirect()->route('content.create')
            ->with('success', 'content.updated_successfully');
    }

}
