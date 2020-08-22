<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Education;
use App\Models\Admin\EducationList;
use App\Models\Admin\ExperienceList;
use Illuminate\Http\Request;

class ExperienceListController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $education_lists = EducationList::all();
        $experience_lists = ExperienceList::all();
        $education = Education::first();

        return view('admin.about.education.create', compact('education_lists', 'experience_lists', 'education'));
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
            'order' => 'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ExperienceList::firstOrCreate([
            'year_range' => $input['year_range'],
            'job' => $input['job'],
            'company' => $input['company'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('experience-list.create')
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
        $experience_list = ExperienceList::find($id);

        return view('admin.about.education.edit', compact('experience_list'));
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
            'order' => 'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        ExperienceList::find($id)->update($input);

        return redirect()->route('education-list.create')
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
        $experience_list = ExperienceList::find($id);

        // Delete model
        $experience_list->delete();

        return redirect()->route('education-list.create')
            ->with('success', 'content.deleted_successfully');
    }
}
