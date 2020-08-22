<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogInfo;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where('status',1)
            ->orderBy('id', 'desc')
            ->paginate(6);
        $blog_info = BlogInfo::first();

        return view('frontend.blog.index', compact('blogs', 'blog_info'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Retrieving models
        $blog = Blog::where('slug', '=', $slug)
            ->firstOrFail();
        $blog_info = BlogInfo::first();

        if(isset($blog)){
            // Previous blog
            $previous_id = Blog::where('id', '<', $blog->id)->max('id');
            $previous = Blog::where('id', $previous_id)->first();

            // Next blog
            $next_id = Blog::where('id', '>', $blog->id)->min('id');
            $next = Blog::where('id', $next_id)->first();

            // Update view column
            Blog::find($blog->id)->update(
                ['view' => $blog->view + 1]
            );
        }

        return view('frontend.blog.show', compact('blog', 'blog_info', 'previous', 'next'));
    }

}
