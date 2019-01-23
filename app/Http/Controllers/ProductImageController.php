<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_image;
use App\product;
use File;
class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_image = product_image::all();
        // dd($product_image);
        return view('product_image.index',compact('product_image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = product::all();
        return view('product_image.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            foreach($request->foto as $foto) {
                $filename = $foto->getClientOriginalName();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/fotoproduct/';
                $foto->move($destinationPath, $filename);
                $galeri = product_image::create($request->except('foto')); 
                $galeri->foto = $filename;
                $galeri->save();
            }
            }
        return redirect()->route('productimage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function show(product_image $product_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_image = product_image::findOrFail($id);
        $product = product::all();
        return view('product_image.edit',compact('product_image','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $product_image = product_image::findOrFail($id);
        $product_image->id_product = $request->id_product;
        // edit upload foto       
        if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $destinationPath = public_path().'/assets/img/fotoproduct/';
                    $filename = str_random(6).'_'.$file->getClientOriginalName();
                    $uploadSuccess = $file->move($destinationPath, $filename);
            
                // hapus foto lama, jika ada
                if ($product_image->foto) {
                $old_foto = $product_image->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/fotoproduc/t'
                . DIRECTORY_SEPARATOR . $product_image->foto;
                    try {
                    File::delete($filepath);
                    } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
                    } 
                   
                }
                $product_image->foto = $filename;
            }

        $product_image->save();
        return redirect()->route('productimage.index');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_image = product_image::findOrFail($id);
        if ($product_image->foto) {
            $old_foto = $product_image->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'assets/img/fotoproduct/'
            . DIRECTORY_SEPARATOR . $product_image->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
        
        $product_image->delete();
        return redirect()->route('productimage.index');
    }
}
