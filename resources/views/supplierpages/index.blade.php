@extends('supplierpages.supplierlayout')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="products">
      <h3>My Products</h3>
      @foreach ($productData as $productData) 
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$productData->productName}}</h4>
                <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$productData->product_image}}" alt="image"> 
                <br>
                {{$productData->description}}<br>
              </div>
          </div>
      @endforeach
    </div>
  </div>
</div>



<!---------------------comments------------------------------------------>

<div class="row">
    <div class="col-md-8">

      <h4>Comments about you</h4>

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


@endsection
