<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>OurStore</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{asset('assetassets/css/all.min.css')}}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
	<!-- main style -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

</head>
<body>

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
				<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href={{route('dashboard')}}>
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
					<nav class="main-menu">
					<ul>
						<li class="current-list-item"><a href={{route('dashboard')}}>Home</a>
						</li>
						<li><a href={{ route('product_list')}}>Product</a>

								</li>
								<li><a href="news.html">Categories</a>
								
								</li>



                                <li>
                                    <a href={{route('profile.edit')}}  ><div>{{ Auth::user()->name }}</div></a>
                                   <ul class="sub-menu">

                                    <li>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('profile.edit')">
                                             {{ __('Profile') }}
                                            </x-dropdown-link>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </li>

                                </ul>

                                </li>


							</ul>

						</nav>



						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->




@yield('content')


<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">About us</h2>
                    <p>Welcome to OurStore, your premier destination for a diverse range of high-quality products. From everyday essentials to unique finds, we are committed to bringing you the best selection at competitive prices.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Get in Touch</h2>
                    <ul>
                        <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                        <li>support@fruitkha.com</li>
                        <li>+00 111 222 3333</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Pages</h2>
                    <ul>
                        <li><a href={{route('dashboard')}}>Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="/product">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Subscribe</h2>
                    <p>Subscribe to our mailing list to get the latest updates.</p>
                    <form action="index.html">
                        <input type="email" placeholder="Email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->

<!-- end copyright -->

<!-- jquery -->
<script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- count down -->
<script src="{{asset('assets/js/jquery.countdown.js')}}"></script>
<!-- isotope -->
<script src="{{asset('assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
<!-- waypoints -->
<script src="{{asset('assets/js/waypoints.js')}}"></script>
<!-- owl carousel -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- magnific popup -->
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- mean menu -->
<script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
<!-- sticker js -->
<script src="{{asset('assets/js/sticker.js')}}"></script>
<!-- main js -->
<script src="{{asset('assets/js/main.js')}}"></script>

<script src="sweetalert2.all.min.js"></script>

</body>
</html>
