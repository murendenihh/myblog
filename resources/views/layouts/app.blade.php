<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color:#0066ff;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/logo/logo.jpg" class="img-fluid" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/">Blog</a>
                            </li>
<!--                         <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>-->
                        <li class="nav-item">
                                <a class="nav-link" href="/contacts/create">Contact</a>
                            </li>
                    </ul>
                    @endguest
                   
                    @auth
   <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                                <a class="nav-link" href="{{route('posts.index')}}">Dashboard</a>
                            </li>
                       
                         <li class="nav-item">
                                <a class="nav-link" href="/categories">Categories</a>
                            </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/manage">Manage Admin</a>
                            </li>
                        <li class="nav-item">
                                <a class="nav-link" href="/comments">Comments<span class="badge badge-pill badge-warning ml-1">{{count($disapprove_comments)}}</span></a>
                            </li>
<!--                        <li class="nav-item">
                                <a class="nav-link" href="#">Live Blog</a>
                            </li>-->
                    </ul>
                @endauth
                <span class="navbar-text d-none d-lg-block d-xl-block text-white" id="wel-text">
                  Welcome to our blog post
                 </span>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" style="color:#000;">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                             
                        @endguest
                    </ul>
                     
                    
                      </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="container">
            <footer>
                <p class="text-center bg-primary text-white">&copy;{{date("Y")}} Murex</p>
            </footer> 
        </div>
    </div>
    <script>
//     var ele = document.getElementById("wel-text");
//     ele.innerHTML = "Something";

   </script>
</body>
</html>
