<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get All Request
        $input = $request->all();

        // Record to database
        Education::firstOrCreate([
            'title' => $input['title'],
            'desc' => $input['desc']
        ]);

        return redirect()->route('education-list.create')
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
        // Get All Request
        $input = $request->all();

        // Update to database
        Education::find($id)->update($input);

        return redirect()->route('education-list.create')
            ->with('success', 'content.updated_successfully');
    }
}
