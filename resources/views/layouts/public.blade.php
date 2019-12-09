<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dr Ibrahim Amzil') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,500,700&display=swap" rel="stylesheet">

    <style type="text/css">
        @media (min-width:641px) {
            #landing {
                background-image: url('{{URL('/images/BackgroundDecor.png')}}') !important;
            }
        }
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
                <div class="hidden sm:flex mr-4">
                    <a href="#" class="font-medium text-sm">À propos</a>
                    <a href="#" class="ml-4 font-medium text-sm">Services</a>
                </div>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="uppercase bg-doc_primary text-white text-sm font-semibold shadow-md px-6 py-2"> Contactez-moi</a>
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
        <div class="flex justify-between items-center">
            <img src="{{URL('/images/logo.png')}}" alt="doctage" class="w-32">
            <div class="flex">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-6"><path d="M17 1H3c-1.1 0-2 .9-2 2v14c0 1.101.9 2 2 2h7v-7H8V9.525h2v-2.05c0-2.164 1.212-3.684 3.766-3.684l1.803.002v2.605h-1.197c-.994 0-1.372.746-1.372 1.438v1.69h2.568L15 12h-2v7h4c1.1 0 2-.899 2-2V3c0-1.1-.9-2-2-2z"/></svg>
                </a>
                <a href="#" class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" class="w-6"><path d="M17.946 5.29a6.606 6.606 0 00-.418-2.185 4.412 4.412 0 00-1.039-1.594A4.412 4.412 0 0014.895.472a6.606 6.606 0 00-2.184-.418C11.75.01 11.444 0 9 0S6.25.01 5.29.054a6.606 6.606 0 00-2.185.418A4.412 4.412 0 001.51 1.511 4.412 4.412 0 00.472 3.105a6.606 6.606 0 00-.418 2.184C.01 6.25 0 6.556 0 9s.01 2.75.054 3.71a6.606 6.606 0 00.418 2.185 4.412 4.412 0 001.039 1.594 4.411 4.411 0 001.594 1.039 6.606 6.606 0 002.184.418C6.25 17.99 6.556 18 9 18s2.75-.01 3.71-.054a6.606 6.606 0 002.185-.418 4.602 4.602 0 002.633-2.633 6.606 6.606 0 00.418-2.184C17.99 11.75 18 11.444 18 9s-.01-2.75-.054-3.71zm-1.62 7.347a4.978 4.978 0 01-.31 1.67 2.98 2.98 0 01-1.708 1.709 4.979 4.979 0 01-1.671.31c-.95.043-1.234.052-3.637.052s-2.688-.009-3.637-.052a4.979 4.979 0 01-1.67-.31 2.788 2.788 0 01-1.036-.673 2.788 2.788 0 01-.673-1.035 4.978 4.978 0 01-.31-1.671c-.043-.95-.052-1.234-.052-3.637s.009-2.688.052-3.637a4.979 4.979 0 01.31-1.67 2.788 2.788 0 01.673-1.036 2.788 2.788 0 011.035-.673 4.979 4.979 0 011.671-.31c.95-.043 1.234-.052 3.637-.052s2.688.009 3.637.052a4.979 4.979 0 011.67.31 2.788 2.788 0 011.036.673 2.788 2.788 0 01.673 1.035 4.979 4.979 0 01.31 1.671c.043.95.052 1.234.052 3.637s-.009 2.688-.052 3.637zM9 4.378A4.622 4.622 0 1013.622 9 4.622 4.622 0 009 4.378zM9 12a3 3 0 113-3 3 3 0 01-3 3zm5.884-7.804a1.08 1.08 0 11-1.08-1.08 1.08 1.08 0 011.08 1.08z"/></svg>
                </a>
            </div>
        </div>
        <div class="text-black font-medium text-sm flex justify-center mt-4">
            <a href="#">Contact</a>
            <a href="#" class="ml-6">Feedback</a>
            <a href="#" class="ml-6">Join our Slack</a>
            <a href="#" class="ml-6">Terms</a>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
