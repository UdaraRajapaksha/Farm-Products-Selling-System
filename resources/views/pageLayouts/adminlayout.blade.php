<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin.css')}}">
        <link rel="stylesheet" href="{{asset('css/footer.css')}}">
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
        
        <title>{{$title}}</title><!--888888888888888888888888888888888888888888-->
        <style>
            .btn-default{
               width: 100%;
               margin-bottom: 1vh
            }
        </style>
    </head>
    <body>
        <!---------------------------------header----------------------------------->
@include('inc.navbar')
<!---------------------------------------------------------------------------->
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-3">
                    <div class="well">
                    <h4 style="text-align:center;color:white;background-color:seagreen;padding:2vh;">Administrator</h4>
                    <a href="/admin"><button type="submit" class="btn btn-default">Dashboard</button></a><br>
                    <a href="/admin/advertisements"><button type="submit" class="btn btn-default">Advertisements</button></a><br>
                    <a href="/admin/profile"><button type="submit" class="btn btn-default">Profile</button></a><br>
                    <a href="/admin/mailbox"><button type="submit" class="btn btn-default">E-mail</button></a><br>
                    <a href="/admin/products"><button type="submit" class="btn btn-default">Manage Products</button></a><br>
                    <a href="/admin/faq/view"><button type="submit" class="btn btn-default">Manage FAQ</button></a><br>
                    </div>
                </div>
                <div class="col-sm-9">
                        @yield('content')
                </div>
            </div>

            <!---------------------------------footer----------------------------------->
            @include('inc.footer')
            <!---------------------------------------------------------------------------->
            
        </div>
    </body>
</html>