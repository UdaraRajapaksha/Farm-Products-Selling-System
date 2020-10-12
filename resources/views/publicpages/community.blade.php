@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
      <div class="col-sm-12">
        <h4>Our community</h4>
      </div>
    </div>

    <div class="row">

        <div class="col-sm-6">
          <p>Suppliers</p>
          @foreach ($suppliers as $suppliers )
              <a href="/supplier/view/{{$suppliers->id}}">{{$suppliers->farmName}}</a><br>
          @endforeach
        </div>

        <div class="col-sm-6">
          <p>Customers</p>
          @foreach ($customers as $customers )
             <a href="/customer/view/{{$customers->id}}"> {{$customers->companyname}}</a><br>
          @endforeach
        </div>

    </div>
</div>
@endsection