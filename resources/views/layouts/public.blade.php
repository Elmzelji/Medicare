<?php $settings = App\Settings::all()->first(); ?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', $settings->title) }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,500,700&display=swap" rel="stylesheet">

    <style type="text/css">
      /* @media (min-width:641px) {
          #landing {
              background-image: url('{{URL('/images/BackgroundDecor.png')}}') !important;
          }
      } */
    </style>

</head>

<body id="landing" class="font-doc text-doc_text antialiased leading-none px-8 sm:px-24 pt-6 bg-cover" style="background-image: url({{URL('/images/bg-mobile.png')}});">
    <!-- Header -->
    <header class="flex justify-between items-center">
        <a href="{{URL('/')}}">
            <img src="{{URL('/images/logo.png')}}" class="w-40">
        </a>
        <div class="flex items-center">
            @guest
                <div class="hidden sm:flex items-center mr-4">
                    <a href="{{route('login')}}" class="font-medium text-sm mr-4">Connexion</a>
                    <a href="/{{$settings->cta_link}}" class="uppercase bg-doc_primary text-white text-sm font-semibold shadow-md px-6 py-2">{{$settings->cta_text}}</a>

                </div>
                @if (Route::has('register'))
                @endif
            @else
                <a href="{{route('dashboard')}}">
                    <span class="text-doc_text text-sm pr-4">{{ Auth::user()->name }}</span>
                </a>

                <a href="{{ route('logout') }}"
                           class="no-underline hover:underline text-doc_text text-sm p-3"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
            @endguest
        </div>
    </header>

    @yield('content')

    <footer class="mt-32 py-6">
        <a href="{{route('frontpage')}}" class="flex justify-center items-center">
            <img src="{{URL('/images/logo.png')}}" alt="doctage" class="w-32">
        </a>
        <div class="text-black font-medium text-sm flex justify-center mt-4">
            <!-- <a href="#">Contact</a>
            <a href="#" class="ml-6">Feedback</a> -->
            <!-- <a href="#" class="ml-6">Join our Slack</a> -->
            <!-- <a href="#" class="ml-6">Terms</a> -->
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
