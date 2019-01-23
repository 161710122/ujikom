<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;
use App\product_image;
use App\blog;
use App\product;
use App\category;
use App\brand;
use App\cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Laratrust::hasRole('admin'))return $this->adminDashboard();
        if (Laratrust::hasRole('member'))return $this->memberDashboard();
      }
      protected function adminDashboard()
        {
            $category = [];
            $product = [];
            $brand = [];
           foreach (category::all() as $category1) {
            array_push($category, $category1->nama_category);
            array_push($product, $category1->product->count());
            }

            foreach (brand::all() as $brand1) {
                array_push($brand, $brand1->nama_brand);
                array_push($product, $brand1->product->count());
                }
    
            return view('dashboard.admin', compact('category', 'product','brand'));
        }

        protected function memberDashboard()
        {
            $productimage = product_image::all();
            $blog= blog::orderBy('created_at','desc')->paginate(3);
            $product = product::orderBy('updated_at','desc')->paginate(4);
            $produk = product::orderBy('nama_produk','desc')->paginate(8);
            $category = category::all();
            $cart = cart::all();
            return view('frontend.index',compact('productimage','blog','product','produk','category','cart'));
        
        }
    }

