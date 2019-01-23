<?php

namespace App\Http\Controllers;

use App\brand;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use File;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if ($request->ajax()) {
            $brand = brand::select(['id','nama_brand']);
            return Datatables::of($brand)
                    ->addColumn('action', function ($brand) {
                        return view('datatable._action', [
                        'model'=> $brand,
                        'form_url'=> route('brand.destroy', $brand->id),
                        'edit_url' => route('brand.edit', $brand->id),
                        'confirm_message' => 'Yakin mau menghapus ' . $brand->name . '?'
                    ]);
                    })->make(true);
        }
        $html = $builder
            ->addColumn(['data' => 'nama_brand', 'name'=>'nama_brand', 'title'=>'nama_brand'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

            return view('brand.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new brand;
        $brand->nama_brand = $request->nama_brand;
        $brand->slug = str_slug($request->nama_brand,'-');
        // dd($brand);  
        $brand->save();
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(brand $brand)
    {
        return view('brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, brand $brand)
    {
        $brand = brand::findOrFail($brand->id);
        $brand->nama_brand = $request->nama_brand;     
        $brand->slug = str_slug($request->nama_brand,'-');      
        $brand->save();
        return redirect()->route('brand.index');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(brand $brand)
    {
        $brand = brand::findOrFail($brand->id);        
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
