<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digi-Talent') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {!! toastr()->render() !!}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    <div id="app">
        
        <nav class="navbar navbar-expand-md">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    Digi-Talent
                </a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon text-dark">Menú</span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @auth
                            <li class="nav-item dropdown z-index">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('admin.ideas.create') }}">
                                        {{ __('Publicar idea') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('saved.user.ideas.index') }}">
                                        {{ __('Mis ideas') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('completed.user.tasks') }}">
                                        {{ __('Mis tareas') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('saved.user.ideas.index') }}">
                                        {{ __('Enviar idea') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item z-index float-right">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
            @include('sweetalert::alert')
        </main>
    </div>  


    <footer class="mt-5 pt-5 footer">
        <div class="container bg-dark mt-5">
            <p class="text-white text-center p-1">
                Digi-Talent 2020 - Un producto de BeSoft
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    @stack('scripts')
    <!-- Custom JS -->
</body>
</html>
