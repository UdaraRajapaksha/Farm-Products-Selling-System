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
    <style>
        .footer{
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #e6ffe6;
            
            margin-top:10vh;
        }
        .p{
            margin-left: 2vh;
        }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li><a href="/">About</a></li>
                        <li><a href="/">Contact</a></li>
                        <li><a href="/">Help</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="/login">Login</a></li>
                            <li><a href="/registration">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <a href="/search" style="float:right">Search </a>&nbsp;
        </div>

        <div class="container-fluid">

            <div class="row">
               
                @foreach ($customerData as $customerData)
                <div class="col-sm-4">
                        <div class="well">
                     <!--profile details-->
                    <div class="img" >
                        
                        <img class="img-responsive" style="width:100%;" src="data:image;base64,{{$customerData->image}}" alt="image"> 
                    </div>
                </div>
                </div>
                <div class="col-sm-8">
                        <div class="well">
                    <div class="farmdetails" style="margin-left:5vh;">
                        <h2> {{$customerData->name}}</h2>
                        <strong><br>
                        <span class="glyphicon glyphicon-envelope"></span><span class="p"><span class="p">{{$customerData->address}}</span><br><br>
                        <span class="glyphicon glyphicon-envelope"></span><span class="p"><span class="p">{{$customerData->phoneNo}}</span><br><br>
                        <span class="glyphicon glyphicon-envelope"></span><span class="p"><span class="p">{{$customerData->email}}</span><br><br>
                        </strong>
                    </div>
                    </div>
                   
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-sm-4">
                        <a href="/customer/index" class="btn btn-primary" style="margin-top:1vh;width:100%;text-align:center;">Dashboard</a>

                   <a href="/customer/editprofile" class="btn btn-primary" style="margin-top:1vh;width:100%;text-align:center;">Edit Profile</a>

                   <a href="/" class="btn btn-primary" style="margin-top:1vh;width:100%;text-align:center;"><< Back to Home</a>
                   
                </div>
                <div class="col-sm-8">
                    <!--other details-->
                    @yield('content')
                </div>
            </div>

        </div>

        

        
      <footer>
            <div class="footer">
              <div class="container-fluid">
                <div class="row" style="padding:5vh;">
                  <div class="col-sm-3">
                    <p><strong>Data Policy</strong></p>
                    <p>Terms and Conditions</p>
                  </div>
                  <div class="col-sm-3">
                      <p><strong>Help</strong></p>
                      <p>
                          FAQ
                      </p>
                  </div>
                  <div class="col-sm-3">
                      <p>
                          <strong>Contact Us</strong>
                      </p>
                      <i class="fa fa-phone" aria-hidden="true">07156587878</i><br>
                      <i class="fa fa-phone" aria-hidden="true">ceyloncart@gmail.com</i>
  
                  </div>
                  <div class="col-sm-3">
                      <p>
                        <strong>About</strong> <br>
  
                         copyright: ceylon cart (pvt) LTD
                      </p>
                  </div>
                </div>
              </div>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
