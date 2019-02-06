<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Saten E-Shop') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light card-header">
            <div class="container">
               <div class="control-group normal_text"> <h3><img src="{{asset('images/bimages/logo1.jpg') }}" width="3%" alt="Logo" />&nbsp;Saten E-Shop<small> Admin</small></h3></div>
                <a class="navbar-brand" href="{{ url('/') }}">
             
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                     <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
    
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}"><b>{{ __('Home') }}</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin') }}"><b>{{ __('Login') }}</b></a>
                            </li>

                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ url('/register') }}"><b>{{ __('Register') }}</b></a>
                            </li> --}}
    
    
                            <li class="nav-item dropdown">
                              {{--   <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span style="margin-left: -50px;"> {{ ucwords(Auth::user()->name) }}<br></span>
                                </a>
 --}}
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
    @if($errors->any())
    <div class="alert alert-danger" style="color: red;">
      @foreach($errors->all() as $error)
      <li><span>{{$error}}</span></li>
      @endforeach
    </div>
    @endif   
    @if(session()->has("error"))
        <div class="alert alert-danger">
            <p style="color: red">{{ session()->get("error")}}</p>
        </div>
    @endif
    @if(session()->has("success"))
        <div class="alert alert-success">
            <p style="color: green">{{ session()->get("success")}}</p>
        </div>
    @endif
        <main class="py-4">
           @yield('content')
        </main>
</div>
<script src="{{asset ('js/bjs/jquery.min.js') }}"></script> 
<script src="{{asset ('js/bjs/bootstrap.min.js') }}"></script> 
</body>
</html>