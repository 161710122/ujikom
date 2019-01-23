<?php

namespace App\Http\Controllers;

use App\product;
use App\brand;
use App\category;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if ($request->ajax()) {
                $product = product::with(['category','brand']);
                return Datatables::of($product)
                        ->addColumn('action', function ($product) {
                            return view('datatable._action', [
                            'model'=> $product,
                            'form_url'=> route('product.destroy', $product->id),
                            'edit_url' => route('product.edit', $product->id),
                            'confirm_message' => 'Yakin mau menghapus ' . $product->name . '?'
                        ]);
                        })->make(true);
            }
            $html = $builder
                ->addColumn(['data' => 'nama_produk', 'name'=>'nama_produk', 'title'=>'nama_produk'])  
                ->addColumn(['data' => 'harga', 'name'=>'harga', 'title'=>'harga'])
                ->addColumn(['data' => 'stock', 'name'=>'stock', 'title'=>'stock'])
                ->addColumn(['data' => 'slug', 'name'=>'slug', 'title'=>'slug'])
                ->addColumn(['data' => 'category.nama_category', 'name'=>'category.nama_category', 'title'=>'Category'])
            ->addColumn(['data' => 'brand.nama_brand', 'name'=>'brand.nama_brand', 'title'=>'Brand'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

            return view('product.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = brand::all();
        $category = category::all();
        return view('product.create',compact('brand','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new product;
        $product->nama_produk = $request->nama_produk;
        $product->harga = $request->harga;
        $product->stock = $request->stock;
        $product->slug = str_slug($request->nama_produk,'-');
        $product->id_category = $request->id_category;
        $product->id_brand = $request->id_brand;
       
        // dd($product);  
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $brand = brand::all();
        $category = category::all();
        return view('product.edit',compact('product','brand','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $product = product::findOrFail($product->id);
        $product->nama_produk = $request->nama_produk;
        $product->harga = $request->harga;
        $product->stock = $request->stock;
        $product->slug = str_slug($request->nama_produk,'-');
        $product->id_category = $request->id_category;
        $product->id_brand = $request->id_brand;      
        $product->save();
        return redirect()->route('product.index');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product = product::findOrFail($product->id);        
        $product->delete();
        return redirect()->route('product.index');
    }
}
