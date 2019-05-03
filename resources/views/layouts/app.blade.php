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
        <script src="https://use.fontawesome.com/b74c93e4e3.js"></script>

        <!-- Recaptcha -->
        <script src="https://www.google.com/recaptcha/api.js?render={6Lf-U6EUAAAAAAVG2CQdBQq6eRxVXJIXoedccbhR}"></script>

        <script>
grecaptcha.ready(function(){
grecaptcha.execute('{6Lf-U6EUAAAAAAVG2CQdBQq6eRxVXJIXoedccbhR}', {action:{'recaptcha'}).then(function(token){
if (token){
document.getElementById('recaptcha').value = token;
}
});
});
        </script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Bootstrap CDN -->

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('sass/example.scss') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Project Management System
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else


                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i> My Companies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('projects.index') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i> Projects</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Tasks</a>
                            </li>

                            @if(Auth::user()->role_id==1)

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user" aria-hidden="true"></i> Admin 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{ route('projects.index') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i> All Projects</a>
                                    <a class="nav-link" href="{{ route('users.index') }}"><i class="fa fa-user" aria-hidden="true"></i> All Users</a>
                                    <a class="nav-link" href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> All Tasks</a>
                                    <a class="nav-link" href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i> All Companies</a>
                                    <a class="nav-link" href="{{ route('roles.index') }}"><i class="fa fa-user-md" aria-hidden="true"></i> All Roles</a>
                                </div>
                            </li>

                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->first_name }}       
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>

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

      @if (Auth::check() && Auth::user())
            <div class="col-md-4 col-sm-1 hidden-xs col-lg-3  display-table-cell v-align box" id="navigation" 
                 style="background: #2566a2;color: #fff;">
                <div class="logo">
                    <a hef="home.html">
                        <img src="{{ asset('images/pms-logo.jpg') }}"  style="height: 145px;padding-top: 10px; width: 100%;" alt="pms_logo" 
                             class="hidden-xs hidden-sm">

                    </a>
                </div>
                <div class="navi" >
                    <ul style="list-style-type: none;">
                        <li><a href="#" role="button" style="font-size: 20px;">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <strong> Welcome <br /> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </strong>       
                            </a></li>
                        <li class="nav-item"><a href="#">&nbsp;<i class="fa fa-home" aria-hidden="true"></i> Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i> My Companies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.index') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i> Projects</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Tasks</a>
                        </li>
                        @endif

                        @if (Auth::check() && Auth::user()->role_id==1)

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user" aria-hidden="true"></i> Admin 
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="{{ route('projects.index') }}"><i class="fa fa-product-hunt" ></i> All Projects</a>
                                <a class="nav-link" href="{{ route('users.index') }}"><i class="fa fa-user" ></i> All Users</a>
                                <a class="nav-link" href="{{ route('tasks.index') }}"><i class="fa fa-tasks" ></i> All Tasks</a>
                                <a class="nav-link" href="{{ route('companies.index') }}"><i class="fa fa-building" ></i> All Companies</a>
                                <a class="nav-link" href="{{ route('roles.index') }}"><i class="fa fa-user-md"></i> All Roles</a>
                            </div>
                        </li>

                        @endif
                    </ul>
                </div>
            </div>


            <main class="py-4">
                <div class='container'>
                    @include('partial.errors')
                    @include('partial.success')
                    <div class='row'>
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>       
        <div class="footer">
            @include('partial.footer')
        </div>
    </body>
</html>
