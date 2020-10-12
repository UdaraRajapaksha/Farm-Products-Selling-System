
@extends('supplierpages.supplierlayout')

@section('content')
<script>
  
</script>

@if (count($reservedData)>0)

<div class="row">
  <div class="col-sm-12">
    <h1>Food City</h1>
         
    <table class="table table-bordered" style="text-align:center;background-color:white;">
      <thead>
        <tr class="info">
          <th>Product</th>
          <th>Remaining Quantity (kg)</th>
          <th>Reserved Quantity (kg)</th>
          <th>Reserved at</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reservedData as $reservedData)
             
              <tr>
                <td class="success">{{$reservedData->productimagename}}
                  <center><img src="data:image;base64,{{$reservedData->image}}" alt="" class="img-responsive" style="max-height: 10vh;width:auto;">
                  </center>
                    </td>
                <td>{{$reservedData->quantity}}</td>
                <td>
                    <span id="value{{$reservedData->r_id}}">{{$reservedData->reserved_quantity}}</span>
                    <script>
                        $(document).ready(function(){
                          $("#{{$reservedData->r_id}}").hide();
                          $("#cancel{{$reservedData->r_id}}").hide();
                          $("#update{{$reservedData->r_id}}").hide();

                          $("#btn{{$reservedData->r_id}}").click(function(){
                            $("#{{$reservedData->r_id}}").show();
                            $("#cancel{{$reservedData->r_id}}").show();
                            $("#update{{$reservedData->r_id}}").show();
                            $("#value{{$reservedData->r_id}}").hide();
                            $("#btn{{$reservedData->r_id}}").hide();
                            
                          });

                          $("#cancel{{$reservedData->r_id}}").click(function(){
                            //$(document).ready(function();
                            $("#{{$reservedData->r_id}}").hide();
                            $("#cancel{{$reservedData->r_id}}").hide();
                            $("#update{{$reservedData->r_id}}").hide();
                            $("#btn{{$reservedData->r_id}}").show();
                            $("#value{{$reservedData->r_id}}").show();
                          });

                        });
                      </script>
                    
                    <form action="/supplier/editOrder" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{$reservedData->r_id}}">
                      <input type="hidden" name="order_Id" value="{{$reservedData->order_Id}}">
                      <input type="hidden" name="quantity" value="{{$reservedData->quantity}}">
                      <input type="hidden" name="price" value="{{$reservedData->price}}">
                      <input type="hidden" name="reserved_quantity" value="{{$reservedData->reserved_quantity}}">
                      
                      <!-- dynamic input ------------------->
                      <input type="number" name="new_quantity" value="{{$reservedData->reserved_quantity}}" id="{{$reservedData->r_id}}" class="txt" max="{{$reservedData->quantity}}">
                      
                      <span id="cancel{{$reservedData->r_id}}" class="orderbtns">Cancel Edit</span>
                    
                </td>
                <td>{{$reservedData->o_created_at}}</td>
                <td>
                    <input type="submit" value="Update Order"  name="Update" id="update{{$reservedData->r_id}}" class="update_btn" style="width:100%;">
                      
                  </form>
                  <input type="submit" value="Edit" class="btn btn-primary" style="width:100%;" id="btn{{$reservedData->r_id}}">
                  <form action="/supplier/cancelOrder" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$reservedData->r_id}}">
                    <input type="hidden" name="order_Id" value="{{$reservedData->order_Id}}">
                    <input type="hidden" name="quantity" value="{{$reservedData->quantity}}">
                    <input type="hidden" name="reserved_quantity" value="{{$reservedData->reserved_quantity}}">
                    <input type="submit" value="Cancel Order"  name="Cancel" class="btn btn-danger" style="width:100%;">
                  </form>
                </td>

              </tr>

        @endforeach 
      </tbody>
    </table>     
    
  </div>
  
</div>

<div class="row">
  <div class="col-sm-12">
    <h4> Your Payment</h4>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="well well-sm" style="background-color:white">
      <table class="table table-responsive">
          <thead>
            <tr>
              <th>Item</th>
              <th>Price</th>
              <th></th>
              <th>Qty (Kg)</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($billData as $billData)
              <tr>
                <td>{{$billData->productimagename}}</td>
                <td>Rs : {{$billData->price}}</td>
                <td>*</td>
                <td>{{$billData->reserved_quantity}}</td>
                <td>Rs: {{$billData->reserved_price}}</td>
                
              </tr>
            @endforeach
              <tr class="info">
                  <td>Total</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                      @foreach ($totalprice as $totalprice)
                   Rs : {{$totalprice->totalprice}}
                    @endforeach
                  </td>
              </tr>
          </tbody>
          
      </table>
    </div>
  </div>
  
  <div class="col-sm-6">
    <a href="/pdfview" class="btn btn-primary">View My Bill</a>
  </div>

  

</div>

@else
  <p>No Orders Found</p>
@endif

@endsection