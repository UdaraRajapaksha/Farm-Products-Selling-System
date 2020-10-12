<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ceylon Cart</title>

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

        <div class="container-fluid">

            <div class="row">
                @foreach ($supplierData as $supplierData)
                <div class="col-sm-4">
                     <!--profile details-->
                    <div class="img" style="margin:;">
                        
                        <img class="img-responsive" style="width:100%;" src="data:image;base64,{{$supplierData->image}}" alt="image"> 
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="farmdetails" style="margin-left:5vh;">
                        <h2> {{$supplierData->farmName}}</h2>
                        <strong><br>
                        <span class="glyphicon glyphicon-envelope"></span><span class="p"><span class="p">{{$supplierData->address}}</span><br><br>
                        <span class="glyphicon glyphicon-envelope"></span><span class="p"><span class="p">{{$supplierData->phoneNo}}</span><br><br>
                        <span class="glyphicon glyphicon-envelope"></span><span class="p"><span class="p">{{$supplierData->email}}</span><br><br>
                        </strong>
                        <a href="/supplier/profile/addproducts">Add Products</a>
                    </div>
                    
                   
                </div>
                
            </div>

            <div class="row">
                <div class="col-sm-4">
                        <a href="/supplier/index" class="btn btn-success" style="margin-top:1vh;width:100%;text-align:center;">Dashboard</a>
                   <a href="/supplier/myorders" class="btn btn-success" style="margin-top:1vh;width:100%;text-align:center;">Reserved Orders</a>
                   <a href="/supplier/editprofile" class="btn btn-success" style="margin-top:1vh;width:100%;text-align:center;">Edit Profile</a>
                   <a href="/" class="btn btn-success" style="margin-top:1vh;width:100%;text-align:center;"><< Back to Home</a>
                   <a href="{{ url('/find/customer/'.$supplierData->homeTown.'/') }}" class="btn btn-success" style="margin-top:1vh;width:100%;text-align:center;">
                    Find Customers
                    </a>
                   @endforeach
                </div>
                <div class="col-sm-8">
                    <!--other details-->
                    @yield('content')
                </div>
            </div>

        </div>

        
  
    <!---------------------------------footer----------------------------------->
    @include('inc.footer')
    <!---------------------------------------------------------------------------->

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
