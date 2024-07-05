<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </head>
    <body class="antialiased">


        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            Bienvenue sur !!!!!!!
            
            @yield('content')
        </div>


<!-- =================================Script===============-->
<script src="{{asset('js/scolaireJs/jquery.min.js')}}"></script>
<script src="{{asset('js/scolaireJs/bootstrap.min.js')}}"></script>

@yield('scripts')
    </body>
</html>
