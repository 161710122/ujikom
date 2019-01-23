<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\product_image;
use App\blog;
use App\category;
use App\cart;
class FrontEndController extends Controller
{

    public function index()
    {
        $product = product::orderBy('updated_at','desc')->paginate(4);
        $produk = product::orderBy('nama_produk','desc')->paginate(8);
                $productimage = product_image::all();
        $cart = cart::all();
        $category = category::all();
        $blog= blog::orderBy('updated_at','desc')->paginate(3);
        return view('frontend.index',compact('category','cart','product','productimage','blog','produk'));
    }

    public function allblog()
    {
        $category = category::all();
        $cart = cart::all();
        $blog= blog::orderBy('created_at','desc')->paginate(10); 
        return view('frontend.blog',compact('category','cart','blog'));
    }
    
    
    public function singleblog($slug) 
    {
        $blog = blog::whereSlug($slug)->first();
        $category = category::all();
        $cart = cart::all();
        return view('frontend.singleblog',compact('category','cart','blog'))->with('blog', $blog);
    }

    public function isiproduct($slug) 
    {
        $product = product::whereSlug($slug)->first();
        $category = category::all();
        $cart = cart::all();
        $produk = product::orderBy('updated_at','desc')->paginate(4);
        return view('frontend.singleproduct',compact('category','cart','product','produk'))->with('product', $product);
    }
    public function allproduct()
    {
        $category = category::all();
        $product= product::orderBy('nama_produk','desc')->paginate(9);
        $cart = cart::all();
        return view('frontend.allproduct',compact('category','cart','product'));
    }
    public function category($slug)
    {
        $category = category::all();
        $kategori= category::whereSlug($slug)->first();
        $cart = cart::all(); 
        return view('frontend.isicategory',compact('category','cart','kategori'))->with('kategori', $kategori);
    }    
}
