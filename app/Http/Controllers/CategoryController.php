<?php

namespace App\Http\Controllers;

use App\category;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if ($request->ajax()) {
            $category = category::select(['id','nama_category']);
            return Datatables::of($category)
                    ->addColumn('action', function ($category) {
                        return view('datatable._action', [
                        'model'=> $category,
                        'form_url'=> route('category.destroy', $category->id),
                        'edit_url' => route('category.edit', $category->id),
                        'confirm_message' => 'Yakin mau menghapus ' . $category->name . '?'
                    ]);
                    })->make(true);
        }
        $html = $builder
            ->addColumn(['data' => 'nama_category', 'name'=>'nama_category', 'title'=>'nama_category'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

            return view('category.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new category;
        $category->nama_category = $request->nama_category;
        $category->slug = str_slug($request->nama_category,'-');
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $category = category::findOrFail($category->id);
        $category->nama_category = $request->nama_category;     
        $category->slug = str_slug($request->nama_category,'-');      
        $category->save();
        return redirect()->route('category.index');
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category = category::findOrFail($category->id);        
        $category->delete();
        return redirect()->route('category.index');
    }
}
