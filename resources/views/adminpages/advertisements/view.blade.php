@extends('pageLayouts.adminlayout')

@section('content')

        <div class="row">
                <div class="col-sm-8">
                      
                    <div class="advert">
                        <div class="well">
                            @if (count($adData)>0)  
                            <div class="ad">
                                <h3>{{$adData->organization_name}}</h3>
                                <p>
                                    Added On {{$adData->created_at }}<br>
                                    {{$adData->advertiserName}}<br>
                                    {{$adData->phoneNo}}<br>
                                </p>
                                <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$adData->image}}" alt="image"> 
                                <br>    
                            </div>  
                            
                               
                            
                                <form action="/updateAds/{{$adData->id}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
 
                                    <div class="form-group">
                                    Update Image
                                    <input type="file" name="image" id="image" class="form-control-file" required>
                                    </div>
                                
                                    <input type="submit" value="Update Advertisements" name="submit" class="btn btn-primary">
                                    <a href="/deleteAds/{{$adData->id}}" class="btn btn-danger" onclick="return confirm('Remove Advertisment! Are You Sure?');">Remove</a>
                                </form> 
                                @else
                                <p>No Advertisements found</p>
                                <a href="/admin/advertisements">Back</a>
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
                               <h3>Recent Advertisements</h3>
                               @if (count($TadData)>0)
                                    @foreach ($TadData as $TadData)
                                    <div class="">
                                    <p>
                                    <a href="/admin/advertisements/{{$TadData->id}}">{{$TadData->organization_name}}</a>
                                    <small> {{$TadData->created_at}}</small>
                                    </p>
                                    <a href="/admin/advertisements/{{$TadData->id}}">
                                    <img class="img-responsive" style="max-height: 30vh;" src="data:image;base64,{{$TadData->image}}" alt="image"> 
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

        </div>    
         
@endsection