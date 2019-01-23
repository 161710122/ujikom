@extends('layouts.frontend')
@section('content')
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(/assets2/images/img_bg_1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">New Accesories</h1>
					   					<h2 class="head-2">For</h2>
					   					<h2 class="head-3">Matic</h2>
					   					<p class="category"><span>New stylish Accessories</span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Now</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(/assets2/images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Huge</h1>
					   					<h2 class="head-2">Sale</h2>
					   					<h2 class="head-3">45% off</h2>
					   					<p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(/assets2/images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">New</h1>
					   					<h2 class="head-2">Arrival</h2>
					   					<h2 class="head-3">up to 30% off</h2>
					   					<p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
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
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>New Arrival</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
        
        <div class="row">
        @foreach($product as $data)  
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
		<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(/assets2/images/cover-img-1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Our Products</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
        @foreach($produk as $data)  
					<div class="col-md-3 text-center" >
						<div class="product-entry">
            @foreach($data->product_image as $data1)   
							<div class="product-img" style=" height: 280px; width:280px ; background-image: url({{ asset('assets/img/fotoproduct/'.$data1->foto)  }});" height="528" width="570">
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
								<p class="price"><span>Rp {{number_format($data->harga,0,',','.')}}</span> </p>
							</div>
						</div>
          </div>
        @endforeach
				</div>
			</div>
		</div>



		<div class="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
						<h2>Recent Blog</h2>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
					</div>
        </div>
				<div class="row">
        @foreach($blog as $data)
					<div class="col-md-4">
						<article class="article-entry">
							<a href="{{ route('singleblog',$data->slug) }}" class="blog-img" style="background-image: url({{ asset('assets/img/fotoblog/'.$data->foto) }});"></a>
							<div class="desc">
								<p class="meta"><span class="">{{ $data->created_at->format("d M Y")}}</span></p>
                <br>
                <h2><a href="{{ route('singleblog',$data->slug) }}">{{ $data->judul}}</a></h2>
								<p>{!! str_limit($data->artikel,400) !!}</p>
							</div>
						</article>
					</div>
				@endforeach
				</div>
			</div>
		</div>
	@endsection