
@extends('pageLayouts.adminlayout')


@section('content')
        
        <div class="row">
                <div class="col-sm-8">
<!------------------------------------Add products----------------------------------------->     
                        <div class="advert">
                                <div class="well">
                                <h3>Add New Product</h3>
                                <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    Product Name
                                    <input type="text" name="productName" id="productName" class="form-control" placeholder="Product Name" required>
                                    </div>
                                    <div class="form-group">
                                    Select Image
                                    <input type="file" name="image" id="image" class="form-control-file" required>
                                    </div>
                                
                                    <input type="submit" value="Add Product" name="submit" class="btn btn-primary">
                                    </form> 
                                </div> 
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
<!------------------------------------****------------------------------------------>     
                </div>

<!-----------------------------------products side view------------------------->     
                <div class="col-sm-4">
                    <div class="advert">
                        <div class="well">
                               <h3>Added Products</h3>
                               
                               @if (count($productData)>0)
                                    @foreach ($productData as $productDatas)
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
                                    {{$productData->links()}}
                                @else
                                        <p>No Products found</p>
                                @endif
                                
                        </div>
                    </div>
                </div>
<!------------------------------------******************------------------------------------>     
        </div>       
@endsection