@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
          <h3>Frequently asked questions...</h3>
          <p>take a look Frequently Asked Questions and Get your answer here...</p>
        </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        @foreach ($helpData as $helpData)
            <h4>{{$helpData->question}}</h4>
            <p>{{$helpData->answer}}</p>
        @endforeach
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <h4>Enter your Question</h4>
        <form action="/help/faq/question" method="POST">
          {{ csrf_field() }}
          <input type="text" name="question" id="" class="form-control"><br>
          <input type="submit" value="Submit" class="btn btn-success">
        </form>
      </div>
    </div>
</div>
@endsection
