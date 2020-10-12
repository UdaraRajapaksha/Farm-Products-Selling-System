@extends('pageLayouts.adminlayout')

@section('content')
       <div class="row">
           <div class="col-sm-12">
                  <div class="well">
                         <h4>Compose E-mail</h4>
                         <form action="/admin/sendmail" method="post">
                            {{ csrf_field() }}
                                To : 
                                <input type="email" name="to" id="" class="form-control" placeholder="example@gmail.com" value="{{$email}}" required>
                                Subject : 
                                <input type="text" name="to" id="" class="form-control" placeholder="Subject">
                                Body : 
                                <textarea name="bosy" id="" cols="20" rows="10" class="form-control" placeholder="Message"></textarea><br>
                                <input type="submit" value="Send mail" name="send" class="btn btn-primary">
                                <input type="reset" value="Cancel" name="cancel" class="btn btn-warning">
                         </form>
                  </div>
           </div>
       </div>
        
@endsection