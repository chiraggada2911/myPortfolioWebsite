<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $counters = Counter::all();

        return view('admin.about.counter.create', compact( 'counters'));
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
            'timer'   =>  'required|integer',
            'desc'   =>  'required',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Counter::firstOrCreate([
            'timer' => $input['timer'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('counter.create')
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
        // Retrieving models
        $counter = Counter::find($id);

        return view('admin.about.counter.edit', compact('counter'));
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
            'timer'   =>  'required|integer',
            'desc'   =>  'required',
            'order'   =>  'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        Counter::find($id)->update($input);

        return redirect()->route('counter.create')
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
        $counter = Counter::find($id);

        // Delete model
        $counter->delete();

        return redirect()->route('counter.create')
            ->with('success','content.deleted_successfully');
    }
}
