<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @yield('title')
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('magnews2/images/icons/favicon.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('magnews2/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('magnews2/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('magnews2/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('magnews2/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('magnews2/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('magnews2/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('magnews2/css/util.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('magnews2/css/main.css')}}">
    <!--===============================================================================================-->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<body class="animsition">

<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								New York, NY
							</span>

							<img class="m-b-1 m-rl-8" src="{{asset('magnews2/images/icons/icon-night.png')}}" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>

                    <a href="#" class="left-topbar-item">
                        About
                    </a>

                    <a href="#" class="left-topbar-item">
                        Contact
                    </a>
                    @guest
                        <a  class="left-topbar-item"   href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a  class="left-topbar-item"  href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif

                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @else

                        <li class="dropdown">
                            <a href="#"class="left-topbar-item" data-toggle="dropdown" role="button" aria-expanded="false">
                                Notifications <span class="badge">{{count(Auth::user()->unreadNotifications)}}</span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    @foreach (Auth::user()->unreadNotifications as $notification)
                                        <a href="{{ route('posts.show', $notification->data['post']['id']) }}"><i>{{ $notification->data["user"]["name"] }}</i> has commented in <b>{{ $notification->data["post"]["title"] }}</b></a>
                                    @endforeach
                                </li>
                            </ul>
                        </li>

                        <a class="left-topbar-item" href="{{ route('post.create') }}">Create Post</a>

                        <a class="left-topbar-item" href="{{ route('posts') }}"> Post Show</a>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <a class="dropdown-item" href="{{route('userpost.shows')}}">
                                    {{ __('Posts') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                @endguest
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
</header>

<div class="contant">
    @yield('content')
</div>

<!-- Footer -->
<footer>
    <div class="bg2 p-t-40 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <a href="#">
                            <img class="max-s-full" src="{{asset('magnews2/images/icons/logo-02.png')}}" alt="LOGO">
                        </a>
                    </div>

                    <div>
                        <p class="f1-s-1 cl11 p-b-16">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at, facilisis ut turpis. Vestibulum dolor metus, tincidunt eget odio
                        </p>

                        <p class="f1-s-1 cl11 p-b-16">
                            Any questions? Call us on (+1) 96 716 6879
                        </p>

                        <div class="p-t-15">
                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-facebook-f"></span>
                            </a>

                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-youtube"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Popular Posts
                        </h5>
                    </div>

                    <ul>
                        <li class="flex-wr-sb-s p-b-20">
                            <a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('magnews2/images/popular-post-01.jpg')}}" alt="IMG">
                            </a>

                            <div class="size-w-5">
                                <h6 class="p-b-5">
                                    <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
                                        Donec metus orci, malesuada et lectus vitae
                                    </a>
                                </h6>

                                <span class="f1-s-3 cl6">
										Feb 17
									</span>
                            </div>
                        </li>

                        <li class="flex-wr-sb-s p-b-20">
                            <a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
                                <img src="{{asset('magnews2/images/popular-post-02.jpg')}}" alt="IMG">
                            </a>

                            <div class="size-w-5">
                                <h6 class="p-b-5">
                                    <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
                                        Lorem ipsum dolor sit amet, consectetur
                                    </a>
                                </h6>

                                <span class="f1-s-3 cl6">
										Feb 16
									</span>
                            </div>
                        </li>

                    </ul>
                </div>

                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Category
                        </h5>
                    </div>

                    <ul class="m-t--12">

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Life Style (28)
                            </a>
                        </li>

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                DIY & Crafts (16)
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bg11">
        <div class="container size-h-4 flex-c-c p-tb-15">
				<span class="f1-s-1 cl0 txt-center">
					Copyright © 2018

					<a href="#" class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</span>
        </div>
    </div>
</footer>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
</div>

<!-- Modal Video 01-->
<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" data-dismiss="modal">
        <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

        <div class="wrap-video-mo-01">
            <div class="video-mo-01">
                <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="{{asset('magnews2/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('magnews2/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('magnews2/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('magnews2/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('magnews2/js/main.js')}}"></script>
@yield('scrips')
</body>
</html>
