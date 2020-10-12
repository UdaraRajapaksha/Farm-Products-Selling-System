@extends('supplierpages.supplierlayout')

@section('content')
<div class="row">
  <div class="col-sm-12">
    
    <div class="orders">

      @foreach ($reserves as $reserves)
        <span style="padding-right:2vh;"><a href="/supplier/myorders/{{$reserves->order_refNo}}">{{$reserves->id}}</a></span>
        <span>{{$reserves->reserved_at}}</span> <br>
      @endforeach

    </div>
    
  </div>
</div>
@endsection
