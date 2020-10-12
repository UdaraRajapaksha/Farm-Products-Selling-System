<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="_token" content="{{csrf_token()}}" />
  <title>{{$title}}</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
  <script src="{{asset('js/app.js')}}"></script>
<!--
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('css/header.css')}}">
-->

  <style>
  #otext{
    text-align:right;
  }
  .orderbtns{
    border: none;
    cursor: pointer;
    margin-left: 2vh;
  }
  .txt{
    text-align: right;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin:2vh 0;
    padding: 1vh 1vh;
  }
  .update_btn{
    background-color:#00cc44;
    border: none;
    color: white;
    padding: 8px 20px;
    border-radius: 4px;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<!--@include('common.header')-->
@include('inc.navibar')
<body>
  <div class="container" style="">
      <div class="row">
        <div class="col-sm-12" style="margin-top:5vh;">
            @include('inc.messages')
        </div>
      </div>
      @yield('content')
      
  </div>

  <!--<img src="{{asset('images/img.jpg')}}" alt="">-->


</body>
</html>