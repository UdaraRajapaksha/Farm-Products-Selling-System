@extends('pageLayouts.adminlayout')

@section('content')

        <div class="row">
                <div class="col-sm-8">
                      
                    <div class="advert">
                        <div class="well">
                            @if (count($productData)>0)  
                              <div class="ad">
                                  <h3>{{$productData->productimagename}}</h3>
                                  <p>
                                      Added On {{$productData->created_at }}<br>
                                      
                                  </p>
                                  <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$productData->image}}" alt="image"> 
                                  <br>    
                              </div>  
                            
                               
                            
                                <form action="/admin/updateproductimages/{{$productData->id}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
 
                                    <div class="form-group">
                                      Update Image
                                    <input type="file" name="image" id="image" class="form-control-file" required>
                                    </div>
                                    <div class="form-group">
                                      Product Name
                                      <input type="text" name="productname" id="image" class="form-control" value="{{$productData->productimagename}}" required>
                                    </div>
                                
                                    <input type="submit" value="Update Product" name="submit" class="btn btn-primary">
                                    <a href="/admin/deleteproduct/{{$productData->id}}" class="btn btn-danger" onclick="return confirm('Remove Product! Are You Sure?');">Remove</a>
                                </form> 
                                @else
                                <p>No Products found</p>
                                <a href="/admin/products">Back</a>
                                @endif   
                        </div> 
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        @endif
                    </div>
                    
                </div>
                <div class="col-sm-4">
                    <div class="advert">
                      <div class="well">
                        <h3>Added Products</h3>
                       
                        @if (count($productAll)>0)
                             @foreach ($productAll as $productDatas)
                             <div class="">
                             <p>
                             <a href="/admin/manageproducts/{{$productDatas->id}}">{{$productDatas->productimagename}}</a>
                             <small> {{$productDatas->created_at}}</small>
                             </p><a href="/admin/manageproducts/{{$productDatas->id}}">
                             <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$productDatas->image}}" alt="image"> 
                             </a>
                             <br>                                                
                         </div>
                             
                             @endforeach
                             {{$productAll->links()}}
                         @else
                                 <p>No Products found</p>
                         @endif
                         
                    </div>
                    </div>
                </div>

        </div>    
         
@endsection