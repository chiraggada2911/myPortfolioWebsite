<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillList;
use Illuminate\Http\Request;

class SkillController extends Controller
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
        Skill::firstOrCreate([
            'title' => $input['title'],
            'desc' => $input['desc']
        ]);

        return redirect()->route('skill-list.create')
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
        Skill::find($id)->update($input);

        return redirect()->route('skill-list.create')
            ->with('success','content.updated_successfully');
    }

}
