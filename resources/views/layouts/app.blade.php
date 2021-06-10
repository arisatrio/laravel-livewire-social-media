<!doctype html>
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
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet">
    <style>
        .body{
            overflow-x: hidden;
        }
        .sidenav {
            height: 100%;
            width: 382px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: white;
            overflow-x: hidden;
            padding-top: 10px;
            border-right: 1px solid rgb(219, 219, 219)
        }

        .sidenav .foot{
            height: 80px;
            width: 100%;
            position: absolute;
            bottom: 0%;
        }
        
        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 22px;
            color: #818181;
            display: block;
        }
        
        .sidenav a:hover {
            color: blue;
        }
        .image-upload>input {
            display: none;
        }
        </style>
    @livewireStyles
</head>
<body class="bg-primary">
    <div id="app">
        <main>
            <div class="row">
                @auth
                <div class="col">
                    <div class="sidenav shadow">
                        <a class="navbar-brand text-primary text-center mb-3">
                            <h2 class="font-weight-bold">SOCIAL DILEMMA</h2>
                        </a>
                        <a href="{{ route('home') }}" class="@yield('home')">
                            <i class="fas fa-home mr-2"></i>Home
                        </a>
                        <a href="{{ route('profile') }}" class="@yield('profile')" {{-- wire:click="detail({{ auth()->user()->id }})" --}}>
                            <i class="fas fa-user mr-2"></i>Profile
                        </a>
                        <a href="{{ route('your-post') }}" class="@yield('your-post')">
                            <i class="fas fa-edit mr-2"></i>Your Post
                        </a>
                        <a href="{{ route('liked-post') }}" class="@yield('liked-post')">
                            <i class="fas fa-thumbs-up mr-2"></i>Liked Post
                        </a>
                        <a class="text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                @endauth
                <div class="col-9">
                    <nav class="navbar sticky-top navbar-expand-sm navbar-light bg-white pl-2" style="border-bottom: 1px solid rgb(219, 219, 219)">
                        <a class="nav-link text-muted" href="{{ url('/') }}">
                            <h4 class="font-weight-bold">@yield('header')</h4>
                            <div class="bg-primary mt-2" style="width: 670px; height: 3px"></div>
                        </a>
                        <ul class="mr-auto">
                            <form class="form-inline">
                                <input class="form-control form-control-lg ml-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-lg btn-primary ml-2" type="submit">Search</button>
                            </form>
                        </ul>
                        
                    </nav>
                    <div class="container">
                        <div class="row mt-3">
                            <div class="col-sm-8">
                                @yield('content')
                            </div>
                            <div class="col-md-4">
                                @yield('right-side')
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
        

    </div>
    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('postUpdated', () => {
            $('#edit').modal('hide');
        })
    </script>
</body>
</html>
