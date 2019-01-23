<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Garage20</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/assets2/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/assets2/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/assets2/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/assets2/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="/assets2/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/assets2/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets2/css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="/assets2/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="/assets2/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="/assets2/css/style.css">

	<!-- Modernizr JS -->
	<script src="/assets2//assets2/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="/assets2//assets2/js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
      <div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
            <img src="{{asset('/assets/img/logo1.png')}}" height="50" width="100" />
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
                <li><a href="/">Home</a></li>
								<li class="has-dropdown">
									<a>Category</a>
									<ul class="dropdown">
                  @foreach($category as $data)
										<li><a href="{{ route('isicategory',$data->slug) }}">{{$data->nama_category}}</a></li>
                  @endforeach
                  </ul>
								</li>
                                <li><a href="{{route('allproduct')}}">All Products</a></li>
                                <li><a href="{{route('allblog')}}">Blog</a></li>
	              <li class="has-dropdown">
									@if(Route::has('login'))
									@auth
                    @role(['admin','member']) 
					<a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                                     class="nav-link">
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form> Logout</a>					<ul class="dropdown">
										      <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                                     class="nav-link">
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form> Logout</a></li>
                                          @endrole
										  @else
										  <a href="#">Login</a>
										  <ul class="dropdown">
										  
										<li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">register</a></li>
</ul
					@endauth
					@endif
					</ul>

								</li>
								
                <li>@role('member')<a href="{{url('cart', Auth::user()->id)}}"><i class="icon-shopping-cart"></i> Cart [0]</a>@endrole</li>
                <li> @role('member')Hi! {{ Auth::user()->name }}@endrole</li>
              </ul>
						</div>
					</div>
				</div>
			</div>
		</nav>