<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Counter;
use App\Models\Admin\Education;
use App\Models\Admin\EducationList;
use App\Models\Admin\ExperienceList;
use App\Models\Admin\PersonelInfo;
use App\Models\Admin\Section;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillList;
use App\Models\Admin\InfoList;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $about = About::first();
        $personel_info = PersonelInfo::first();
        $info_lists = InfoList::orderBy('order', 'asc')
            ->get();
        $counters = Counter::orderBy('order', 'asc')
            ->get();
        $skill = Skill::first();
        $skill_lists = SkillList::orderBy('order', 'asc')
            ->get();
        $education = Education::first();
        $education_lists = EducationList::orderBy('order', 'asc')
        ->get();
        $experience_lists = ExperienceList::orderBy('order', 'asc')
        ->get();


        return view('frontend.about.index', compact('about', 'personel_info', 'info_lists',
            'counters', 'skill', 'skill_lists', 'education', 'education_lists', 'experience_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
