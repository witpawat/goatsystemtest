<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GoatSystem</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <script src="{{ asset('js/jquery-3.6.0.min.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Bootstrap core CSS -->
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>

        .navbar {
            width: 100%;
            height: 65px;
            background: #80C2B6;
        }

        .card-header {
            text-align: center;
        }


    </style>
</head>

<body style="background-color: #FFFAFA;">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">

                <a class="navbar-brand" href="{{ route('admin.home') }}">
                    <div><img src="https://sv1.picz.in.th/images/2021/09/25/CVBy5y.th.png" style="width:60px;"></div>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('ลงทะเบียน') }}</a>
                                </li>
                            @endif
                        @else



                            <ul class="navbar-nav ms-auto mb-2 mb-lg-1 btn ">
                                <li class="nav-item">
                                    <a href="{{ route('admin.home') }}" class="nav-link " aria-current="page">
                                        <span class="ml-2">หน้าเเรก</span>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a href="{{ route('admin.createGene') }}" class="nav-link " aria-current="page">
                                        <span class="ml-2">อัปเดตพันธุ์แพะ</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.createDisease') }}" class="nav-link " aria-current="page">
                                        <span class="ml-2">อัปเดตโรคแพะ</span>
                                    </a>
                                </li>   
                                <li class="nav-item">
                                    <a href="{{ route('admin.createVaccine') }}" class="nav-link " aria-current="page">
                                        <span class="ml-2">อัปเดตวัคซีนแพะ</span>
                                    </a>
                                </li>                          


                                



                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->fname }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">                                        

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('ออกจากระบบ') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
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
    </div>
    <script>
        feather.replace()
    </script>
</body>

</html>
