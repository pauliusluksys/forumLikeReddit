<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            @if (Route::has('login'))
                <div class="fixed top-0 px-6 py-4 flex flex-row justify-evenly w-screen bg-yellow-500">
                    <div>
                        <a href={{route("post.index")}}>Logo</a>
                    </div>
                    <div>search for something</div>
                    <div>Chat</div>
                    <div>Messages</div>
                    <div>
                    @auth
                        <div class="inline-block">
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        </div>
                            <div class="inline-block">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-button class="ml-3">
                                        {{ __('Logout') }}
                                    </x-button>
                                </form>
                            </div>
                            <div class="inline-block">{{ Auth::user()->name }}</div>
                        <div class="inline-block"></div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                    </div>
                </div>
            @endif
                <div class="flex mt-6">
                    <div class="flex-1"></div>
                    <div class="py-2 flex-none mx-auto inline-block flex content-start sm:px-6 lg:px-8" style="width: 1000px;">
                        <div class="  inline-block" style="width:750px;">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                                <div class="p-6 bg-white border-b border-gray-200 ">
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>
