
@extends('pageLayouts.adminlayout')


@section('content')
        
        <div class="row">
                <div class="col-sm-8">
<!------------------------------------Add Advertsments----------------------------------------->     
                        <div class="advert">
                                <div class="well">
                                <h3>Add New Advertisement</h3>
                                <form action="/admin/advertisements" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                    Advertiser Name
                                    <input type="text" name="advertiserName" id="advertiserName" class="form-control" placeholder="Advertiser Name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                    Organization Name
                                    <input type="text" name="organization_name" id="organization_name" class="form-control" placeholder="Organization Name" required>
                                    </div>
                                
                                    <div class="form-group">
                                    Phone Number
                                    <input type="tel" name="phoneNo" id="phoneNo" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                
                                    <div class="form-group">
                                    Select Image
                                    <input type="file" name="image" id="image" class="form-control-file" required>
                                    </div>
                                
                                    <input type="submit" value="Add Advertisements" name="submit" class="btn btn-primary">
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

<!-----------------------------------Advertsments side view------------------------->     
                <div class="col-sm-4">
                    <div class="advert">
                        <div class="well">
                               <h3>Recent Advertisements</h3>
                              {{count($adData)}} Advertisments <br>
                               @if (count($adData)>0)
                                    @foreach ($adData as $adData)
                                    <div class="">
                                    <p>
                                    <a href="/admin/advertisements/{{$adData->id}}">{{$adData->organization_name}}</a>
                                    <small> {{$adData->created_at}}</small>
                                    </p><a href="/admin/advertisements/{{$adData->id}}">
                                    <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$adData->image}}" alt="image"> 
                                    </a>
                                    <br>                                                
                                </div>
                                    
                                    @endforeach
                                @else
                                        <p>No Advertisements found</p>
                                @endif
                                
                        </div>
                    </div>
                </div>
<!------------------------------------******************------------------------------------>     
        </div>       
@endsection