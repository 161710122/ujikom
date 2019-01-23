<?php

namespace App\Http\Controllers;

use App\blog;
use Illuminate\Http\Request;
use File;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = blog::all();
        // dd($blog);
        return view('blog.index',compact('blog'));
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
        $blog = new blog;
        
        $blog->judul = $request->judul;
        $blog->artikel = $request->artikel;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path().'/assets/img/fotoblog/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $blog->foto = $filename;
            }
        $blog->slug = str_slug($request->judul,'-');
        $blog->save();
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = blog::findOrFail($id);
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $blog = blog::findOrFail($id);
        $blog -> update($request->all());
        if($request->hasFile('foto')){
            $uploaded_logo = $request->file('foto');
            $extension = $uploaded_logo->getClientOriginalExtension();
            $destinationPath = public_path().'/assets/img/fotoblog/'; 
            $filename = md5(time()).'.'. $extension;
            $uploaded_logo->move($destinationPath, $filename);
            $blog->foto = $filename;
            $blog->save();
        }
        return redirect()->route('blog.index');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        $blog = blog::findOrFail($blog->id); 
        if ($blog->foto) {
            $old_foto = $blog->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'assets/img/fotoblog/'
            . DIRECTORY_SEPARATOR . $blog->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }       
        $blog->delete();
        return redirect()->route('blog.index');
    }
}
