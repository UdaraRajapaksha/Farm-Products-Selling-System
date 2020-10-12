
@extends('customerlayouts.customerdashboard')
@section('content')

<div class="col-md-12">
@if(Session::has('success'))
 <div class="center" style="text-align: center;">
 <div class="alert alert-success">
     {{Session::get('success')}}
 </div>
</div>
 @endif

 
 
     <section class="row justify-content-center">
  
     <div class="form-group">
     @foreach($displayname as $display)
    
     
    <h2> <center>{{$display->productimagename}}</center></h2>
    <center><img class="img-responsive" style="max-height: 20vh;" src="data:image;base64,{{$display->image}}" alt="image"></center>
   

     @endforeach
     </div>
   
              
  
     <form action="/viewreservedonesupplier" method="POST" class="form-container" >
      {{csrf_field()}}
      @foreach($customer_data as $customer)
     <div class="col-sm-3">
                <div class="well">
                  <h4 style="color:black"> {{$customer->name}}</h4>
                  <th><center><img class="img-responsive" style="max-height: 20vh;" src="data:image;base64,{{$customer->image}}" alt="image"></center></th>
              <br>
           
                  <span style="color:#00802b">Reserved Quantity (Kg):{{$customer->reserved_quantity}}</span>
                  <br>
                  <p style="color:#006600"><strong>Reserved Price (Rs): {{$customer->reserved_price}}</strong></p>
                 <input type="hidden" name="supid" class="form-control" value="{{$customer->supplierId}}" />
                  <input type="hidden" name="orderef" class="form-control" value="{{$customer->order_refNo}}" />
                  <input type="submit" name="" value="View More Reserved" class="btn btn-danger">
            
                
            
                    
                
                </div>
              </div>
              @endforeach
     </form>

              

       </section>        
</div>

     @endsection   

        

        
 


