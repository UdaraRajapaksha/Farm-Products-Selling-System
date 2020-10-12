
@extends('customerlayouts.customerdashboard')
@section('content')
<div class="container">
     
     <section class="row justify-content-center" >
     <div class="well" style="background-color:#999999" >
     <div class="row" >
            <div class="col-sm-4">
     @foreach($customerdetailes as $custo)
     <span > <img class="img-responsive" style="max-height: 20vh;max-width: 100vh;border-radius: 10px" src="data:imagee;base64,{{$custo->image}}" alt="imagee"></span>
     </div>
     <div class="col-sm-6">
     <span > <h1 style="font-family:Lucida Console;  font-size: 350%;font-weight: bold;color:#009900 ">{{$custo->companyname}}</h1></span>
    
</div>

     @endforeach
     </div>
       </div>
       
       <div class="col-md-3">
          <div class="well" style="background-color: #d9d9d9" >
         <div class="row" >
            <div class="form-group">
            <a href ="#" class="btn btn-info" style="width:100%;  
            text-align: center;font-size: 16px;border-radius: 2px;color:black;font-weight: bold;">Edit Profile</a>
            </div>
            <div class="form-group">
        <a href ="/createOrder" class="btn btn-info" style="width: 100%;  
        text-align: center;font-size: 16px;border-radius: 2px;color:black;font-weight: bold;">Create Order</a>
        </div>
        <div class="form-group">
        <a href ="#" class="btn btn-info" style="width: 100%;  
        text-align: center;font-size: 16px;border-radius: 2px;color:black;font-weight: bold;">View Orders</a>
        </div>
       
       
  </div>
           </div>
          </div>
       <div class="col-md-6">
       <div class="well" style="background-color: #cccccc" >
        <div class="row" >
        @foreach($customerdetailes as $custo)
    
        <div class="col-md-12">
           
        <lable><h4 style="font-weight: bold;">Address</h4></lable>
        <span > <h4 style="font-family:Lucida Console;">{{$custo->address}}</h4></span>
        <lable><h4 style="font-weight: bold;">Phone Number</h4></lable>
       <span > <h4 style="font-family:Lucida Console;">{{$custo->phoneNo }}</h4></span>
       <lable><h4 style="font-weight: bold;">Email</h4></lable>
       <span > <h4 style="font-family:Lucida Console;">{{$custo->email}}</h4></span>
   </div>
        @endforeach
        </div>
        </div>
          </div>
          
         </section>

        

      </div>  
 
        


@stop
