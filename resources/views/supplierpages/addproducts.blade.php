@extends('supplierpages.supplierlayout')

@section('content')

                @if(session()->has('message'))
                 <div class="alert alert-success">
                 {{ session()->get('message')}}
                 </div>
                 @endif
                  
                 @if(session()->has('message2'))
                 <div class="alert alert-danger">
                 {{ session()->get('message2')}}
                 </div>
                 @endif
    <div class="row">
        <div class="col-sm-12">
          <h3>Add New Product</h3>
                
                 @if(session()->has('message'))
                 <div class="alert alert-success">
                 {{ session()->get('message')}}
                 </div>
                 @endif
                  
                 @if(session()->has('message2'))
                 <div class="alert alert-danger">
                 {{ session()->get('message2')}}
                 </div>
                 @endif
         
           <form action="/supplier/addProduct" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            Product Name <br>
            <input type="text" name="productName" id="productName" value="" required class="form-control"><br>
            Description <br>
            <textarea rows="4" cols="50" placeholder="Short discription about the product..." 
                            required name="description" required class="msg form-control"></textarea>
        
            Image <br>
            <input type="file" name="image" id="image" required class="form-control"><br>

            <input type="submit" name="add" value="Add Product" class="btn btn-success">
           </form>
           <br>
           @include('inc.messages')

         
        </div>
    </div>

<!-- view added products-->

    
                <div class="col-sm-12">
        
                    <div class="advert">
                        <h3>Recently Added Products</h3>
                              {{count($productData)}} New Products <br>
                               @if (count($productData)>0)
                                    @foreach ($productData as $productData)
                        <div class="col-sm-3">
                                    <p>
                                    <a href="/supplier/editProduct/{{$productData->id}}">
                                    {{$productData->productName}}</a>
                                    <small> {{$productData->created_at}}</small>
                                    </p>
                                
                                    <a href="/supplier/editProduct/{{$productData->id}}">
                                     
                                    <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$productData->product_image}}" alt="image"> 
                                    </a>
                                    <br>                                                
                        </div>
                                
                                    @endforeach
                                @else
                                        <p>No Product found</p>
                                @endif
                      
                    </div>
                </div>
       
               
@endsection

