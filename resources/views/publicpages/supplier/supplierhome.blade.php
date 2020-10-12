@extends('publicpages.supplier.supplierlayout')

@section('content')

@if (count($supplierData)>0)
      
   
<div class="row" style="margin-bottom:4vh;background-color:white;">
  <div class="col-sm-4">
     
      <div class="img" style="margin-top:3vh;;">
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
      </div>

      <div class="ratings" style="margin-left:5vh;">
          <!-------------------------------***rating*****----------------------------------->
     <form action="/post/post" method="POST">
                        {{ csrf_field() }}

                                        
                                        <div class="rating">
                                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $supplierData->userAverageRating }}" data-size="xs">
                                            
                                            <input type="hidden" name="id" required="" value="{{ $supplierData->id }}">
                                            <br/>
                                            <button class="btn btn-success">Submit Review</button>
                                        </div>
                                   
                                
                            
                        
                    </form>
               
    
   

 </div>

  </div>
</div>


<div class="row" style="background-color:white;">
  <div class="a" >
    <div class="products" style="margin:3vh;">
      <h3>Farm Products</h3>
      @if (count($productData)>0)
      @foreach ($productData as $productData)
        
        <div class="col-sm-6">
            <div class="card-body">
                <h4 class="card-title">{{$productData->productName}}</h4>
                <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$productData->product_image}}" alt="image"> 
                <br>
                {{$productData->description}}<br>
            </div>
        </div>
      @endforeach
      @else
        <p>No Products added yet.</p>
      @endif
    </div>
  </div>
</div>

<div class="row">
    <div class="container">

        <form action="/comments" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="comment"><h3>What do you think about our products?</h3></label>
            <input type="text" class="form-control" id="comment_body" placeholder="Enter Your Comment Here" name="comment_body" autocomplete="off">
            <input type="hidden" name="supplierId" value="{{$supplierData->supplierId}}">
            </div>

          <input type="submit" class="btn btn-primary" name="submit" value="Post"/><br><br>
        </form>
      </div>



    <div class="container">
        <div class="row">
            <div class="col-md-8">

                    @if (count($commentData)>0)
                        @foreach ($commentData as $commentData)
                        <div class="media comment-box">
                            <div class="media-left">
                                    <a href="#">
                                      
                                        <img class="" src="{{ asset('images/user.jpg') }}" width="25px;" height="25px;" alt>
                                    </a>
                            </div>

                            <div class="media-body">

                                    <h4 class="media-heading">{{$commentData->name}}</h4>

                                    <p>{{$commentData->comment_body}}</p>

                            </div>


                        </div>
                @endforeach

                @else
                <p><h5>No Comments Found !!!</h5></p>
                @endif
            </div>
        </div>
    </div>
</div>

@else
  <p>No users found</p>
@endif

@endsection