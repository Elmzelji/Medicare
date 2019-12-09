@extends('layouts.public')

@section('content')
<div class="container mx-auto mt-24">
    <div class="flex flex-wrap justify-center">
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    {{ __("S'inscrire") }}
                </div>

                <form class="w-full p-6" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="flex flex-wrap mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Nom et prénom') }}:
                        </label>

                        <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name')  border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Adresse e-mail') }}:
                        </label>

                        <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Mot de passe') }}:
                        </label>

                        <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Confirmer le mot de passe') }}:
                        </label>

                        <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                            {{ __("S'inscrire") }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                            {{ __('Vous avez déjà un compte ?') }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                                {{ __('Connexion') }}
                            </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
