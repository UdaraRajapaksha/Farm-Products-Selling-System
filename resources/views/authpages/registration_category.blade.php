@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Select your State</div>

              <div class="panel-body">
                <div class="category" style="text-align:center">
                  <a href="/registration/supplier" class="btn btn-primary">Register as a Supplier</a><br><br>
                  <a href="/registration/customer" class="btn btn-primary">Register as a Customer</a>
                </div>
              </div>
          </div>
      </div>


    </div>
</div>
@endsection
