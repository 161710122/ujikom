<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/index', function(){
    return view('frontend.index');
});
Route::get('/admin', function(){
    return view('layouts.admin');
});
Route::get('/blogs', function(){
    return view('frontend.isiblog');
});

Route::group(['prefix'=>'admin' , 'middleware'=>['auth','role:admin']],
function () {
Route::resource('/category','CategoryController');
Route::resource('/brand','BrandController');
Route::resource('/product','ProductController');
Route::resource('/productimage','ProductImageController');
Route::resource('/blog','BlogController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FrontEndController@index')->name('index');
Route::get('/allblog','FrontEndController@allblog')->name('allblog');
Route::get('/allproduct','FrontEndController@allproduct')->name('allproduct');
Route::get('/produks/{slug}','FrontEndController@isiproduct')->name('produks');
Route::get('/singleblog/{slug}','FrontEndController@singleblog')->name('singleblog');
Route::get('/category/{slug}','FrontEndController@category')->name('isicategory');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/add-cart/{id_product}', function( $id_product,\Illuminate\Http\Request $request){
        // $produk = \App\Product::find($id_product);
        $exist = \App\cart::where('id_user', \Auth::user()->id)->where('id_product',$id_product)->first();
        if($exist){
            $exist->jumlah = $exist->jumlah + 1;
            $exist->save(); 
        }else{    
            $data = new \App\cart;
            $data->id_user = \Auth::user()->id;
            $data->id_product = $id_product;
            $data->jumlah = 1;
            $data->save();
       
        }
        return redirect()->back();
    });    

    Route::get('cart/{id_user}', function ($id_user) {
        $cart = \App\cart::where('id_user', $id_user)->get();
        $category = \App\category::all();
        return view('frontend.checkout', compact('cart','category'));
    });

    Route::get('cart/delete/{id}', function ($id) {
        $cart = \App\cart::find($id)->delete();
        return redirect()->back();
    });

    Route::post('cart/edit/{id_user}', function ( \Illuminate\Http\Request $request, $id_user) {
        for($i = 0; $i < count($request->id); $i++){
            $cart = \App\cart::find($request->id[$i]);
            $cart->jumlah = $request->jumlah[$i];
            $cart->save();
        }

        return redirect()->back();
    });
});
