<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $sections = Section::all();

        return view('admin.setting.section.index', compact( 'sections'));
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
        //Find a model
        $section = Section::find($id);

        if ($section->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        // Update to database
        Section::find($id)->update(['status' => $status]);

        return redirect()->route('section.index')
            ->with('success','content.updated_successfully');
    }

}
