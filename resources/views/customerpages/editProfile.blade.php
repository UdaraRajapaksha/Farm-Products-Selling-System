@extends('customerpages.customerlayout')

@section('content')

    <div class="row">
        <div class="col-sm-12">
          <h3>Edit Profile</h3>
         
          @foreach ($customerData as $customerData2)

           <form action="/customer/profile/update" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
           
            Name
            <input type="text" name="name" id="name" class="form-control" value="{{$customerData2->name}}" >

            Company Name
            <input type="text" name="companyname" id="companyname" class="form-control" value="{{$customerData2->companyname}}" >

            NIC
            <input type="text" class ="form-control" name="nic" id="nic" value="{{$customerData2->nic}}">
             
            Phone No
            <input type="tel" class="form-control" name="phoneNo" id="phoneNo" value="{{$customerData2->phoneNo}}">

            Registration No:
            <input type="text" class ="form-control" name="regNo" id="regNo" value="{{$customerData2->regNo}}">
                      
                
            Address
            <input type="text" class ="form-control" name="address" id="address" value="{{$customerData2->address}}">
            
            Home Town
            <input type="text" class ="form-control" name="homeTown" id="homeTown" value="{{$customerData2->homeTown}}" >
            
            Cover Image 
            <input type="file" class ="form-control" name="image" id="image" value="{{$customerData2->image}}">
           
            <input type="submit" name="save" value="Save Changes" class="btn btn-success">
           </form>
           
           @include('inc.messages')

          @endforeach
        </div>
    </div>

@endsection
