<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('tittel')</title>

        <link href="{{asset('asset/frontend/assets/css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/assets/css/menu.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/assets/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/assets/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/assets/css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset/frontend/assets/css/style.css')}}" rel="stylesheet">

    </head>
    <body>
		<header>
      @include('front.includes.header')
		</header>

   @yield('content')
    <!----------  Scrool  Section Close ---------->
        <!--body-section-->
		<!--footer-section--> 
		 @include('front.includes.footer')

		<script src="{{asset('asset/frontend/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('asset/frontend/assets/js/bootstrap.js')}}"></script>
		<script src="{{asset('asset/frontend/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('asset/frontend/assets/js/main.js')}}"></script>
		<script src="{{asset('asset/frontend/assets/js/owl.carousel.min.js')}}"></script>
	</body>
</html> 