<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['showBySlug', 'show', 'index']]);
        $this->middleware('auth.admin', ['except' => ['showBySlug', 'show', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::all();
        return view('blog.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('featured_image');
        $blog = Blog::create($request->all());
        if($path) {
            $blog->featured_image = $path->store('featured_images', 'public');
            $blog->save();
        }
        return redirect()->route('blog.show', ['id' => $blog->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        if(! count($blog)) {
            $blog = Blog::where('slug', $id)->first();
        }
        return view('blog.show')->with('blog', $blog);
    }

    /**
     * Display blog post by slug
     * 
     * @param  int $slug
     * @return \Illuminate\Http\Response
     */
    public function showBySlug($slug)
    {
        return view('blog.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog.edit')->with('blog', $blog);
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
        $path = $request->file('featured_image');
        
        $blog = Blog::find($id);
        $blog->update($request->all());
        
        if($path) {
            $blog->featured_image = $path->store('featured_images', 'public');
        }
        
        $blog->save();
        return redirect()->route('blog.show', ['blog' => $blog->id ]);
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
