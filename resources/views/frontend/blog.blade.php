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
				   					<h1>Our Blog</h1>
				   					<h2 class="bread"><span><a href="index.html">Home</a></span> <span>Blog</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-blog">
			<div class="container">
				<div class="row">
                @foreach($blog as $data)
					<div class="col-md-4">
						<article class="article-entry">
							<a href="{{ route('singleblog',$data->slug) }}" class="blog-img" style="background-image: url({{ asset('assets/img/fotoblog/'.$data->foto) }});"></a>
							<div class="desc">
								<p class="meta"><span class="">{{ $data->created_at->format("d M Y")}}</span></p>
								<h2><a href="{{ route('singleblog',$data->slug) }}">{{$data->judul}}</a></h2>
								<p>{!! str_limit($data->artikel,500) !!}</p>
							</div>
						</article>
					</div>
					@endforeach
				</div>
			</div>
		</div>

	@endsection