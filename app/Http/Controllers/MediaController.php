<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Media;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $blog = Blog::find($id);
        return view('media.index')->with('blog', $blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $blog = Blog::find($id);
        return view('media.create')->with('blog', $blog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $files = $request->file('attachments');
        foreach ($files as $file) {  
            $hash = md5(rand());          
            $originalurl = 'blog_'.$id.'/'.$hash.'.'.$file->guessClientExtension();
            $resizedurl = 'blog_'.$id.'/resized/'.$hash.'.'.$file->guessClientExtension();

            Media::create([
                'url' => $originalurl,
                'blog_id' => $id,
                'media_size' => 'original'
            ]);
            Media::create([
                'url' => $resizedurl,
                'blog_id' => $id,
                'media_size' => 'thumbnail'
            ]);

            $originalImage = Image::make($file)->encode();        
            $image = Image::make($file)->fit(100)->encode();        
            
            Storage::put('public/'.$originalurl, $originalImage);
            Storage::put('public/'.$resizedurl, $image);
        }

        return redirect()->route('blog.media.create', ['blog' => $id]);
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
