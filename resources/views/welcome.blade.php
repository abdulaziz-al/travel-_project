



@extends('layouts.app')

@section('content')

<div class="container">


<div class="select-box">
    
    <label for="select-box1" class="label select-box1"><span class="label-desc">Choose your country</span> </label>
    <select id="select-box1" class="select">
      <option value="Choice 1">Falkland Islands</option>
      <option value="Choice 2">Germany</option>
      <option value="Choice 3">Neverland</option>
    </select>
    
  </div>
        @include('sweetalert::alert')

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </div>
    @endsection