@extends('layouts.frontend')
@section('content')
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(/assets2/images/cover-img-1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Products</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span>All Products</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">
                                    @foreach($product as $data)  
                                            <div class="col-md-4 text-center">
                                                <div class="product-entry">
                                                @foreach($data->product_image as $data1)   
                                                      <div class="product-img" style=" height: 280px; width:300px ; background-image: url({{ asset('assets/img/fotoproduct/'.$data1->foto)  }});" height="528" width="570">
                                                @endforeach
                                                            <div class="cart">
                                                                  <p>
                                                                        <span class="addtocart"><a href="{{url('add-cart',$data->id)}}"><i class="icon-shopping-cart"></i></a></span> 
                                                                        <span><a href="{{ route('produks',$data->slug) }}"><i class="icon-eye"></i></a></span> 
                                                                  </p>
                                                            </div>
                                                      </div>
                                                      <div class="desc">
                                                            <h3><a href="{{ route('produks',$data->slug) }}">{{$data->nama_produk}}</a></h3>
                                                            <p class="price"><span>Rp {{number_format($data->harga,0,',','.')}}</span></p>
                                                      </div>
                                                </div>
                                          </div>
				@endforeach
                                    </div>
                                    {{$product->links()}}
                              </div>
					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
								<h2>Categories</h2>
								<div class="fancy-collapse-panel">
			                  <div class="panel-group">
                                    @foreach($category as $data)      
			                     <div class="panel panel-default">
			                         <div class="panel-heading" >
			                             <h4 class="panel-title">
			                                 <a href="{{ route('isicategory',$data->slug) }}" >{{$data->nama_category}}</a>
			                             </h4>
			                         </div>
                                       </div>
                                    @endforeach
			                  </div>
			               </div>
					</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection