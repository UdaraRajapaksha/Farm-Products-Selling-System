
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

<body  style="background-color:#d9d9d9">
<html lang="en" class="full-height">

<!--Main Navigation-->
<header>

@foreach($customerdetailes as $custo)
  <div class="view intro-2" style="background-image:url('data:imagee;base64,{{$custo->image}}" alt="imagee')no-repeat center center;">
    <div class="full-bg-img">
        <br>
        <br>
          <center>
            
                    <span > <img class="img-responsive" style="max-height:20vh;max-width:100vh;border-radius: 10px;" src="data:imagee;base64,{{$custo->image}}" alt="imagee"></span>
               </center>>
      <div class="mask rgba-purple-light flex-center">
        <div class="container text-center white-text wow fadeInUp">
        <br>
        <br>
        
       <!--  <div class="row">
            
            
            <div class="col-sm-8">
           <span > <h1 style="font-family:Lucida Console;  font-size: 350%;font-weight: bold;color: #000000">{{$custo->companyname}}</h1></span>
           </div>
          
</div> -->
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <center>    
      <div class="col-sm-12">
     <span > <h1 style="font-family:Lucida Console;  font-size: 350%;font-weight: bold;color: #000000">{{$custo->companyname}}</h1></span>
     </div></center>
</header>
<!--Main Navigation-->

<!--Main Layout-->

<!--Main Layout-->

<div class="well" style="background-color:#999999" >
     <section class="row justify-content-center" >

    
       
       <div class="col-md-3">
          <div class="well" style="background-color: #d9d9d9" >
         <div class="row" >
           
        <div class="form-group">
        <a href ="/customer/orders/{{$custo->customerId}}" class="btn btn-info" style="width: 100%;  
        text-align: center;font-size: 16px;border-radius: 2px;color:black;font-weight: bold;">View Orders</a>
        </div>
        
         <div class="form-group">
         <div class="well" style="background-color:#d9d9d9" >
         @foreach($customerdetailes as $custo)
    
         <div class="col-md-12">
      
         <lable><h4 style="font-weight: bold;color:#009900 ">   Manager Name</h4></lable>
            <span > <h4 style="font-family:Lucida Console;"><i style='font-size:24px' class='fas'>&#xf007;</i> {{$custo->name}}</h4></span>
            <lable><h4 style="font-weight: bold;color:#009900 ">    Address</h4></lable>
        
             <span > <h4 style="font-family:Lucida Console;"><i style='font-size:24px' class='fas'>&#xf2bb;</i>  {{$custo->address}}</h4></span>
             <lable><h4 style="font-weight: bold;color:#009900;">Phone Number</h4></lable>
            <span > <h4 style="font-family:Lucida Console;"><i style='font-size:24px' class='fas'>&#xf095;</i>  {{$custo->phoneNo }}</h4></span>
            <lable><h4 style="font-weight: bold;color:#009900;">Email</h4></lable>
            <span > <h4 style="font-family:Lucida Console;"><i style="font-size:24px" class="fa">&#xf0e0;</i>  {{$custo->email}}</h4></span>
     </div>
         @endforeach
</div>
         </div>
       
  </div>
           </div>
          </div>



       <div class="col-md-9">
       <div class="well" style="background-color: #d9d9d9" >
        <div class="row" >
          
              
        </div>
        </div>
          </div>
          
         </section>

</div>

         </body>
</html> 

 
        



