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
				   					<h1>Product Detail</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span><a href="shop.html">Product</a></span> <span>Product Detail</span></h2>
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
				<div class="row row-pb-lg">
					<div class="col-md-11 col-md-offset-0">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-6">
									<div class="product-entry">
                  @foreach($product->product_image as $data)    
                  <div class="product-img" style="background-image: url({{ asset('assets/img/fotoproduct/'.$data->foto) }});">
                  @endforeach
                  </div>
										<div class="thumb-nail">
											<a href="#" class="thumb-img" style="background-image: url(images/item-11.jpg);"></a>
											<a href="#" class="thumb-img" style="background-image: url(images/item-12.jpg);"></a>
											<a href="#" class="thumb-img" style="background-image: url(images/item-16.jpg);"></a>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="desc">
										<h1>{{$product->nama_produk}}</h1>
										<p class="price">
											<span>Rp {{number_format($product->harga,0,',','.')}}</span> 
										</p>
										<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										
										<div class="row row-pb-sm">
											<div class="col-md-4">
                                    <div class="input-group">
                                    	<span class="input-group-btn">
                                       	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                                          <i class="icon-minus2"></i>
                                       	</button>
                                   		</span>
                                    	<input type="number" id="quantity" name="jumlah" class="form-control input-number" value="1" min="1" max="100">
                                    	<span class="input-group-btn">
                                       	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                            <i class="icon-plus2"></i>
                                        </button>
                                    	</span>
                                 	</div>
                        			</div>
										</div>
										<p><a href="{{url('add-cart',$data->id)}}" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>New Arrival</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
        
        <div class="row">
        @foreach($produk as $data)  
        <div class="col-md-3 text-center">
						<div class="product-entry">
            @foreach($data->product_image as $data1)   
							<div class="product-img" style=" height: 280px; width:280px ; background-image: url({{ asset('assets/img/fotoproduct/'.$data1->foto)  }});">
						@endforeach
								<div class="cart">
									<p>
										<span class="addtocart"><a href="{{url('add-cart',$data->id)}}"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="{{ route('produks',$data->slug) }}"><i class="icon-eye"></i></a></span> 
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">{{$data->nama_produk}}</a></h3>
								<p class="price"><span>Rp {{number_format($data->harga,0,',','.')}}</span></p>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</div>
			</div>
		</div>

    @endsection
	