
<!DOCTYPE html>
<html>
<head>
    



<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
  
  
</script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<style>
div.dataTables_wrapper {
    width:100%;
    margin: 0 auto;
}

.view {
    background: url("fg.jpg")no-repeat center center;
    background-size: cover;
}

.navbar {
    background-color: transparent;
}

.top-nav-collapse {
    background-color: #4285F4;
}

@media only screen and (max-width: 300px) {
    .navbar {
        background-color: #4285F4;
    }
}

html,
body,
header,
.view {
  height: 75%;
}




</style>
</head>
<body  style=>
<html lang="en" class="full-height">

<!--Main Navigation-->
@include('inc.navbar')
<!--Main Navigation-->

<!--Main Layout-->

<!--Main Layout-->

<div class="container-fluid" >
     <section class="row justify-content-center" >

    
       
       <div class="col-md-3">
          <div class="well" style="background-color: " >
         <div class="row" >
            @foreach($customerdetailes as $custo)
            <div class="col-md-12">
              <center>
                <img class="img-responsive" style="max-height:auto;border-radius: 5px width:100%" src="data:image;base64,{{$custo->image}}" alt="image">
              </center>
              </div>
           
           

        
            
            @endforeach
            <center>    
                <div class="col-sm-12">
               <span > <h4 style="font-family:Lucida Console;  font-size: 150%;font-weight: bold;color: #000000">{{$custo->companyname}}</h4></span>
               </div></center>
            <div class="form-group">
            <a href ="/customer/editprofile" class="btn btn-primary" style="margin-top:1vh;width:100%;text-align:center;">Edit Profile</a>
            </div>
            <div class="form-group">
        <a href ="/createOrder" class="btn btn-primary" style="margin-top:1vh;width:100%;text-align:center;">Create Order</a>
        </div>
        
        <div class="form-group">
   
         <a href ="/show" class="btn btn-primary" style="margin-top:1vh;width:100%;text-align:center;">Reserved Orders</a>
         </div>
         <div class="form-group">
        
         @foreach($customerdetailes as $custo)
    
         <div class="col-md-12">
            
        
     </div>
         @endforeach

         </div>
       
  </div>
           </div>
          </div>

     

       <div class="col-md-9">
       <div class="well"  >
        <div class="row" >
            <center>
        <lable><h4 style="font-weight: bold;color:#009900 ">   Manager Name</h4></lable>
        <span > <h4 style="font-family:Lucida Console;"><i style='font-size:24px' class='fas'>&#xf007;</i> {{$custo->name}}</h4></span>
        <lable><h4 style="font-weight: bold;color:#009900 ">    Address</h4></lable>
    
         <span > <h4 style="font-family:Lucida Console;"><i style='font-size:24px' class='fas'>&#xf2bb;</i>  {{$custo->address}}</h4></span>
         <lable><h4 style="font-weight: bold;color:#009900;">Phone Number</h4></lable>
        <span > <h4 style="font-family:Lucida Console;"><i style='font-size:24px' class='fas'>&#xf095;</i>  {{$custo->phoneNo }}</h4></span>
        <lable><h4 style="font-weight: bold;color:#009900;">Email</h4></lable>
        <span > <h4 style="font-family:Lucida Console;"><i style="font-size:24px" class="fa">&#xf0e0;</i>  {{$custo->email}}</h4></span>
        </center>
    </div>
        </div>
          </div>
          
         </section>
</div>

  @include('inc.footer')
         </body>
</html> 

 
        



