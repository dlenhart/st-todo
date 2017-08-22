<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>st-todos - snowytech</title>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{asset('materialize/css/materialize.css')}}" rel="stylesheet" type="text/css">
    </head>
    <style>
      label{
        color: black !important;
      }
    </style>
    <body style="background-color: #e0e0e0 !important">
      <div id="app">
      <!-- Dropdown Structure -->
      <ul id="dropdown1" class="dropdown-content">
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      </ul>
      <nav class="indigo">
        <div class="container">
        <div class="nav-wrapper">
          <a href="/todo" class="brand-logo">st-todo</a>
          <ul class="right hide-on-med-and-down">

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <a href="#" class="dropdown-button" data-activates="dropdown1">
                    {{ Auth::user()->name }}  <i class="material-icons right">arrow_drop_down</i>
                </a>
            @endif

          </ul>
        </div>
      </div>
      </nav>
        @yield('content')
      </div>
      <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
      <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
      <script>
        $('.tooltipped').tooltip({delay: 50});
      </script>
    </body>
</html>
