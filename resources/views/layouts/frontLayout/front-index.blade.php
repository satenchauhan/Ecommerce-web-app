<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    
    <link href="{{asset('css/fcss/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    {{-- <link href="{{asset('css/fcss/font-awesome.min.css')}}" rel="stylesheet">  --}}
    <link href="{{asset('css/fcss/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/fcss/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/fcss/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/fcss/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/fcss/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/fcss/easyzoom.css')}}" rel="stylesheet">
        
    <link rel="shortcut icon" href="{{asset('images/fimages/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/fimages/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/fimages/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/fimages/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/fimages/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
  

	<!--header-->
	@include('layouts.frontLayout.header')
	<!--/header-->
	
	@yield('content')
	
	<!--Footer-->
	@include('layouts.frontLayout.footer')
	<!--/Footer-->
	
    <script src="{{asset('js/fjs/jquery.js')}}"></script>
	<script src="{{asset('js/fjs/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/fjs/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('js/fjs/price-range.js')}}"></script>
    <script src="{{asset('js/fjs/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/fjs/easyzoom.js')}}"></script>
    <script src="{{asset('js/fjs/main.js')}}"></script>
</body>
</html>