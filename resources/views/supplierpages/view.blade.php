@extends('supplierpages.supplierlayout')

@section('content')

        @if(session()->has('message'))
          <div class="alert alert-success">
                {{ session()->get('message')}}
          </div>
        @endif
                  
       
        <div class="row">
                <div class="col-sm-8">
                  
                <!--Update Product link-->                                                  
                <h2>Update Product</h2>
                                
                 

                <form action="/supplier/product/update/{{$productData->id}}" method="POST" enctype="multipart/form-data">
                 {{csrf_field()}}
           
                    Product Name                
                    <input type="text" name="productName" id="productName" value="{{$productData->productName}}" class="form-control"><br>
                    Description
                    <textarea rows="3" cols="30" placeholder="Short discription about the product..." name="description" 
                    class="form-control">{{$productData->description}}</textarea>
                    <br>
                    Product Image 
                    <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$productData->product_image}}" alt="image">
                    <br> 
                    <input type="file" class ="form-control" name="image" id="image" value="{{$productData->product_image}}">
                   
                    <input type="submit" value="Update Product" name="submit" class="btn btn-primary">
                    
                    <!--Delete Product link-->
                    <a href="/deleteProduct/{{$productData->id}}" class="btn btn-danger" onclick="return confirm('Remove Product! Are You Sure?');">Remove</a>
                
                </form> 
              
            @include('inc.messages')

            
              
                </div>    
        </div>     
@endsection