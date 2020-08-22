<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blog;
use App\Models\Admin\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Retrieving models
        $blogs = Blog::orderBy('id', 'desc')
            ->take(6)
            ->get();
        $projects_count = Project::all()->count();
        $blogs_count = Blog::all()->count();

        return view('admin.dashboard', compact('blogs', 'projects_count', 'blogs_count'));
    }
}
