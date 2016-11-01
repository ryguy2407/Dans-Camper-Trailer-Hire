<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dan's Camper Trailer Hire @yield('title')</title>
	<link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/all.css">
	<script src="/js/jquery-3.1.0.min.js"></script>
	<script src="/js/cycle2.js"></script>
	<script src="/js/pickaday.js"></script>
	<script src="/js/pickaday.jquery.js"></script>
	<script src="https://use.fontawesome.com/8cf984e967.js"></script>
	<script>

			$(document).ready(function(){
				$('div.background-bar').css('height', $('div.slideshowWrapper div.slideText').outerHeight() + 20);

				$('div.slideText').each(function(){
					var bgBar = $('div.background-bar').outerHeight();
					var height = $(this).outerHeight();
					$(this).css('marginTop', (bgBar - height) / 2);
				});

				$('button.mobileNav').on('click', function(){
					$('div.mainNav').slideToggle();
				});

				var maxHeight = 0;
				$('#adv-custom-pager div.columns').each(function(){
					maxHeight = maxHeight > $(this).outerHeight() ? maxHeight : $(this).outerHeight();
				});
				$('#adv-custom-pager div.columns').css('height', maxHeight);

				$('div.pageHeader h1').css('marginTop', Math.abs(($('div.pageHeader h1').outerHeight() - 150) / 2));

				$('.datepicker').pikaday();

				$('td').each(function(){
					if($(this).children('a').length > 0) {
						$(this).css('height', '120');
					}
				});
			});
	</script>
</head>
<body>

<div class="container header">
	<div class="row">
		<div class="three columns logo">
			<a href="/">
				<img src="/images/logo.png" alt="Dan's Camper Trailer Hire">
			</a>
		</div>
		<div class="nine columns">
			<div class="topMeta text-right">
				<h6 style="font-size: 18px;">(07) 3284 5634</h6>
				<h6 style="font-size: 18px;">bookings@hiremycampertrailer.com.au</h6>
				<a class="fbbutton" href="https://www.facebook.com/hiremycamper/?fref=ts" target="_blank"><img src="/images/like-us-on-facebook.png" style="width: 120px;"></a>
			</div>
			<button class="mobileNav"><i class="fa fa-bars" aria-hidden="true"></i> Toggle navigation</button>
			<div class="mainNav text-right">
				<ul>
					<li><a href="/">HOME</a></li>
					<li><a href="/rates">OUR RATES</a></li>
					<li><a href="/booking-enquiry">BOOK ONLINE</a></li>
					<li><a href="/contact">CONTACT US</a></li>
					<li><a href="http://blog.danscampertrailerhire.com.au" target="_blank">BLOG</a></li>
					@if(Auth::user())
						<li><a href="{{ route('user.show', ['id' => Auth::user()->id]) }}">ADMIN</a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>