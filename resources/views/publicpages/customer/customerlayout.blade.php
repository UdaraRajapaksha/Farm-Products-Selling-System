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
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
</head>
<body>
    <div id="app">
        
<!---------------------------------header----------------------------------->
@include('inc.navbar')
<!---------------------------------------------------------------------------->
  
        <div class="container">
            <a href="/search" style="float:right">Search </a>&nbsp;
        </div>

        
        <div class="container">
          @yield('content')
        </div>


        <div class="container-fluid">

           
        
<!---------------------------------footer----------------------------------->
@include('inc.footer')
<!---------------------------------------------------------------------------->


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
