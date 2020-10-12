@extends('pageLayouts.adminlayout')

@section('content')
       <div class="row">
           <div class="col-sm-8 col-sx-12">
                <div class="well">
                    <h3>My Profile</h3>
                   
                    @if (count($errors)==0)
                     @include('inc.messages')
                    @endif
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                
                            </ul>
                        </div>
                     @endif

                    @foreach ($adminData as $adminData)
                   


                    <form action="/admin/profile/update" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            
                            <input type="hidden" name="userID" class="form-control" value=" {{$adminData->adminId}}" readonly>
                        </div>
                        
                        <div class="form-group">
                            Name
                            <input type="text" name="name" class="form-control" value=" {{$adminData->name}}" >
                        </div>

                        <div class="form-group">
                            NIC
                            <input type="text" name="nic" class="form-control" value=" {{$adminData->nic}}" required>
                        </div>

                        <div class="form-group">
                            E-mail
                            <input type="text" name="email" class="form-control" value=" {{$adminData->email}}" >
                        </div>

                        <div class="form-group">
                            Phone Number
                            <input type="text" name="phoneNo" class="form-control" value=" {{$adminData->phoneNo}}" required>
                        </div>

                        <input type="submit" name="update" class="btn btn-primary" value="Save Changes">
                        <!--<input type="submit" name="another" class="btn btn-warning" value="Add Separte Admin" formaction="admin/newadmin" method='POST'>
                        -->    
                    </form>
                    @endforeach
                </div>
           </div>
           

           
       </div>
        
@endsection