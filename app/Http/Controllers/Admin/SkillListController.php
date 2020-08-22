<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillList;
use Illuminate\Http\Request;

class SkillListController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $skill_lists = SkillList::all();
        $skill = Skill::first();

        return view('admin.about.skill.create', compact('skill_lists', 'skill'));
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
            'percent' => 'required|integer',
            'title' => 'required',
            'order' => 'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if ($input['percent'] > 100) {
            $input['percent'] = 100;
        }

        // Record to database
        SkillList::firstOrCreate([
            'percent' => $input['percent'],
            'title' => $input['title'],
            'order' => $input['order']
        ]);

        return redirect()->route('skill-list.create')
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
        $skill_list = SkillList::find($id);

        return view('admin.about.skill.edit', compact('skill_list'));
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
            'percent' => 'required|integer',
            'title' => 'required',
            'order' => 'integer',
        ]);

        // Get All Request
        $input = $request->all();

        if ($input['percent'] > 100) {
            $input['percent'] = 100;
        }

        // Update to database
        SkillList::find($id)->update($input);

        return redirect()->route('skill-list.create')
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
        $skill_list = SkillList::find($id);

        // Delete model
        $skill_list->delete();

        return redirect()->route('skill-list.create')
            ->with('success','content.deleted_successfully');
    }
}
