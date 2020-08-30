<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema de Notas') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Sistema de Notas') }}
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
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
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
                                document.getElementById('logout-form').submit();">
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
        <div class="container">
            @yield('content')
            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                    <div class="col-12 col-md">                     
                        <small class="d-block mb-3 text-muted">© 2020</small>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Equipo</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Vinicio</a></li>
                            <li><a class="text-muted" href="#">Nery</a></li>
                            <li><a class="text-muted" href="#">Raul</a></li>
                            <li><a class="text-muted" href="#">Keneth</a></li>
                            <li><a class="text-muted" href="#">Ing. Luna</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Recursos</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Laravel</a></li>
                            <li><a class="text-muted" href="#">MySQL</a></li>
                            <li><a class="text-muted" href="#">Bootstrap</a></li>
                            <li><a class="text-muted" href="#">Eloquent</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Acerca de</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Proyecto Fase 1</a></li>
                            <li><a class="text-muted" href="#">Analisis de sistemas 2</a></li>
                            <li><a class="text-muted" href="#">UMG - Antigua</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>

    </div>            
</main>

</div>
</body>
</html>
