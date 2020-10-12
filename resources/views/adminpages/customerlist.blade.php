@extends('pageLayouts.adminlayout')

@section('content')

<div class="row">
    <div class="col-sm-12">
           <div class="well">
              <table class="table">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>User ID</th>
                        <th>Organization Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Registered Number</th>
                        <th>Option</th>

                      </tr>
                  </thead>
                  <tbody>
                      @foreach ( $customerData as $customerData)
                      <tr>
                        <td>#</td>
                        <td>{{$customerData->userID}}</td>
                        <td>{{$customerData->name}}</td>
                        <td>{{$customerData->phoneNo}}</td>
                        <td>{{$customerData->address}}</td>
                        <td>{{$customerData->regNo}}</td>
                        <td><a href="/admin/viewuser/customer/{{$customerData->userID}}">View More</a></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
           </div>
    </div>
</div>

@endsection
