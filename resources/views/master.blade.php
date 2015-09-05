<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title')</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon-16x16.png') }}">
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ URL::asset('assets/css/skel.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('assets/css/style-desktop.css') }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	@yield('styles')
	<body>
		@yield('navigation')
    <!-- Nav -->
			<nav id="nav">
				<ul class="container">
					@if(\Auth::check())
					<li><a>{{\Auth::user()->first_name}} {{\Auth::user()->last_name}}</a></li>
					<li><a href="/user">Favorites</a></li>
					<li><a href="/search">Search</a></li>
					<li><a href="/logout">Logout</a></li>
					@else
					<li><a href="/">Login</a></li>
					<li><a href="/signup">Sign Up</a></li>
					<li><a href="/search">Search</a></li>
					@endif
				</ul>
			</nav>
    @yield('content')
		<!-- Sign Up -->
			<div class="wrapper style4">
				<article id="contact" class="container 75%">
						<div class="row">
							<div class="12u">
								<hr />
								<h3>Find us on ...</h3>
								<ul class="social">
									<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
									<li><a href="https://github.com/Find-Enchiladas/" class="icon fa-github"><span class="label">Github</span></a></li>
									<!--
									<li><a href="#" class="icon fa-rss"><span>RSS</span></a></li>
									<li><a href="#" class="icon fa-instagram"><span>Instagram</span></a></li>
									<li><a href="#" class="icon fa-foursquare"><span>Foursquare</span></a></li>
									<li><a href="#" class="icon fa-skype"><span>Skype</span></a></li>
									<li><a href="#" class="icon fa-soundcloud"><span>Soundcloud</span></a></li>
									<li><a href="#" class="icon fa-youtube"><span>YouTube</span></a></li>
									<li><a href="#" class="icon fa-blogger"><span>Blogger</span></a></li>
									<li><a href="#" class="icon fa-flickr"><span>Flickr</span></a></li>
									<li><a href="#" class="icon fa-vimeo"><span>Vimeo</span></a></li>
									-->
								</ul>
								<hr />
							</div>
						</div>
					<footer>
						<ul id="copyright">
							<li>&copy; Find Enchiladas. All rights reserved.</li><li>Designed by: Andrew Atwong '16 &amp; Kevin Cunanan '18</li>
						</ul>
					</footer>
				</article>
			</div>

	</body>
  <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.scrolly.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/skel.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/init.js') }}"></script>
	@yield('scripts')
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-64484825-1', 'auto');
	  ga('send', 'pageview');

	</script>
</html>
