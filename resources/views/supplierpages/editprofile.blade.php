@extends('supplierpages.supplierlayout')

@section('content')

    <div class="row">
        <div class="col-sm-12">
          <h3>Edit Profile</h3>
         
          @foreach ($supplierData as $supplierData2)

           <form action="/supplier/profile/update" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            Farm Name
            <input type="text" class="form-control" name="farmName" id="farmName" value="{{$supplierData2->farmName}}" >
        
            Farm Reg. No
            <input type="text" class ="form-control" name="farmRegNo" id="farmRegNo" value="{{$supplierData2->farmRegNo}}" >
         
             Address
            <input type="text" class ="form-control" name="address" id="address" value="{{$supplierData2->address}}">
            
            Home Town
            <input type="text" class ="form-control" name="homeTown" id="homeTown" value="{{$supplierData2->homeTown}}" >
            
            Cover Image 
            <input type="file" class ="form-control" name="image" id="image" value="{{$supplierData2->image}}">
           
            Name
            <input type="text" name="name" id="name" class="form-control" value="{{$supplierData2->name}}" >

            NIC
            <input type="text" class ="form-control" name="nic" id="nic" value="{{$supplierData2->nic}}">
                      
            Bank Account No
            <input type="text" class ="form-control" name="accountNo" id="accountNo" value="{{$supplierData2->accountNo}}">

            Phone No
            <input type="tel" name="phoneNo" id="phoneNo" class="form-control" value="{{$supplierData2->phoneNo}}">

            <input type="submit" name="save" value="Save Changes" class="btn btn-success">
           </form>
           
           @include('inc.messages')

          @endforeach
        </div>
    </div>

@endsection
