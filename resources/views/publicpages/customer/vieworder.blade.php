
@extends('publicpages.customer.customerlayout')

@section('content')
<div class="row">
  <div class="col-sm-12">
      <h1>@foreach ( $cutomerData as $cutomerData )
        {{$cutomerData->companyname}}
      @endforeach</h1>
  </div>
  
</div>

<div class="row" style="">
  @include('inc.messages')
</div>

<div class="row">
  <div class="col-sm-12" style="background-color:white;padding-top:4vh;">
    @if (count($orderData)>0)
    <form action="/customer/orders/reserve" method="post"><!--order controller-->
      <div class="row">
      {{csrf_field()}}
        @php
            $i=0;
        @endphp


        @foreach ($orderData->chunk(4) as $orderDataChunk)
            <div class="row">


          @foreach ($orderDataChunk as $orderData)
          @php
              $i++;
          @endphp 
          <div class="">
              <div class="col-sm-3" style="float:left">
                <div class="well">
                  <h4 style="color:black"> {{$orderData->productimagename}}</h4>
                  <span style="color:blue">{{$orderData->quantity}} kg</span>
                  <p><strong> Rs. {{$orderData->price}}</strong></p>
                  <img src="data:image;base64,{{$orderData->image}}" alt="" class="img-responsive" style="max-height: 20vh;width:auto;"><br>
                    My Order 
                    <input type="number" name='n{{$i}}' id="otext" class="form-cont" value="0" max="{{$orderData->quantity}}" style="border: 1px solid #ccc;border-radius: 4px;"><!-- My qty--> 
                    
                 <!-- hidden input --->
                    <input type="hidden" name="p{{$i}}" id="otext" value="{{$orderData->price}}" >
                    <input type="hidden" name="oq{{$i}}" id="otext" value="{{$orderData->quantity}}" ><!-- order qty-->
                    {{-- <input type="hidden" name="id{{$i}}" value="{{$orderData->id}}"> --}}
                    <input type="hidden" name="id{{$i}}" value="{{$orderData->id}}">
                    <input type="hidden" name="order_number" value="{{$orderData->order_number}}">
                  <!----------------->
                </div>
              </div>
          </div>
          @endforeach
        </div>
        @endforeach
        </div>
        <div class="row">
          <div class="col-sm-12">
            <input type="hidden" name="customer_Id" value="{{$customerID}}">
              <input type="hidden" name="rowcount" value="{{$i}}">
              <input type="submit" value="Reserve Order" class="btn btn-success" style="margin-bottom:4vh;">
          </div>
        </div>  
    </form>
    @else
      <p>No Orders Found</p>
    @endif
  </div>
</div>




@endsection