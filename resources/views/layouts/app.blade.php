<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->

    <title>ترحال</title>

    <!-- Scripts -->

    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
      
        <script src="{{ asset('js/app.js') }}" defer></script>

          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      
          <script src="{{ asset('js/jquery-3.3.1.js') }}" defer></script>
          <script src="{{ asset('js/bootstrap.js') }}" defer></script>
          <script src="{{ asset('js/momentjs.js') }}" defer></script>
          <script src="{{ asset('js/moment-with-locales.js') }}" defer></script>
          <script src="{{ asset('js/moment-hijri.js') }}" defer></script>
          <script src="{{ asset('js/bootstrap-hijri-datetimepicker.main.js') }}" defer></script>


 
    <style>
      body{
        position: relative;
      }
    </style>
</head>
<body>

    @include('sweetalert::alert')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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

            <div id="app">

            @yield('content')
            <router-view></router-view>

            </div>
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <script>
        $(function initHijrDatePicker() {
           
           for(var i=1; i<=24; i++){
             var el = document.getElementById("hijri-date-input" + i);
       
             $(el).hijriDatePicker({
                 locale: "ar-sa",
       
                 format:"هـ iYYYY-iMM-iDD " + "DD-MM-YYYY م" ,
                 hijriFormat:"هـ iYYYY-iMM-iDD " + "DD-MM-YYYY م" ,
       
                 dayViewHeaderFormat: "MMMM YYYY",
                 hijriDayViewHeaderFormat: "iMMMM iYYYY",
                 showSwitcher: true,
       
                 allowInputToggle: true,
                 showTodayButton: false,
                 useCurrent: true,
                 isRTL: false,
                 keepOpen: false,
                 hijri: true,
                 debug: true,
                 showClear: true,
                 showTodayButton: true,
                 showClose: true
       
             });
           }
       
         })
    </script>

   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">


    
        $(function initHijrDatePicker() {
         
          for(var i=1; i<=24; i++){
            var el = document.getElementById("hijri-date-input" + i);

            $(el).hijriDatePicker({
                locale: "ar-sa",

                format:"هـ iYYYY-iMM-iDD " + "DD-MM-YYYY م" ,
                hijriFormat:"هـ iYYYY-iMM-iDD " + "DD-MM-YYYY م" ,

                dayViewHeaderFormat: "MMMM YYYY",
                hijriDayViewHeaderFormat: "iMMMM iYYYY",
                showSwitcher: true,

                allowInputToggle: true,
                showTodayButton: false,
                useCurrent: true,
                isRTL: false,
                keepOpen: false,
                hijri: true,
                debug: true,
                showClear: true,
                showTodayButton: true,
                showClose: true

            });
          }

        })


    </script>


</body>
</html>
