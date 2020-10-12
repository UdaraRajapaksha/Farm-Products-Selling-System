<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <style>
  #otext{
    text-align:right;
  }
  </style>
</head>
@include('inc.navibar')
<body>
  
  <div class="container">
    <div class="">
      @yield('content')
     

    </div>
    <div class="row">
      
    </div>
  </div>
</body>
</html>