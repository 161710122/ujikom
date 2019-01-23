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
				   					<h1><span><a href="{{route('home')}}">Home</a></span>&nbsp&nbsp&nbsp&nbsp<span><a href="{{route('allblog')}}">Blog</a></span> </h1>
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
					<div class="col-xs-12 col-sm-12 col-md-25">
						<article class="article-antry">
							<a href="{{ asset('assets/img/fotoblog/'.$blog->foto) }}" class="blog-img" style="background-image: url({{ asset('assets/img/fotoblog/'.$blog->foto) }});"></a>
							<div class="desc">
								<p class="meta"><span class="">{{ $blog->created_at->format("d M Y")}}</span></p>
								<h1>{{$blog->judul}}</h1>
								<p>{!! $blog->artikel !!}</p>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>

	@endsection