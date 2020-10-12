<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <!--rating links---->

    


<!--------->
    <style>
        .footer{
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #e6ffe6;
            
            margin-top:10vh;
        }

    </style>
</head>
<body>
    <div id="app">

<!---------------------------------header----------------------------------->
@include('inc.navbar')
<!---------------------------------------------------------------------------->

        <div class="container">
            <a href="/search/index" style="float:right">Search </a>&nbsp;
        </div>

        @yield('content')
          
<!---------------------------------footer----------------------------------->
@include('inc.footer')
<!---------------------------------------------------------------------------->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
