<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Portfolio;
use App\Models\Admin\Project;
use App\Models\Admin\Section;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $projects = Project::where('status', 1)->orderBy('order', 'asc')
            ->get();
        $portfolio = Portfolio::first();

        return view('frontend.portfolio.index', compact('projects', 'portfolio'));
    }

}
