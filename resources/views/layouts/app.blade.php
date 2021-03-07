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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        @yield('css')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}
            <div class="row max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
               <div class="col-12">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success')}}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
               </div>
                <div class="col-4">
                    <ul class="list-group">
                        @if (auth()->user()->isAdmin())
                            <li class="list-group-item">
                                <a href="{{ route('users.index') }}">Users</a>
                            </li>
                        @endif
                        <li class="list-group-item">
                            <a href="{{ route('posts.index') }}">Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('tags.index') }}">Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('categories.index') }}">Categories</a>
                        </li>
                    </ul>

                    <ul class="list-group mt-5">
                        <li class="list-group-item">
                            <a href="{{ route('trashed-posts.index') }}">Trashed Posts</a>
                        </li>
                    </ul>
                </div>

                <!-- Page Content -->
                <main class="col-8">
                    @yield('content')
                </main>
            </div>

            
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        @yield('script')
    </body>
</html>
