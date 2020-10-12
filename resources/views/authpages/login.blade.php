
@extends('layouts.app')

@section('content')
@if(session()->has('message'))
                 <div class="alert alert-success">
                 {{ session()->get('message')}}
                 </div>
                 @endif

                 @if(session()->has('message2'))
                 <div class="alert alert-danger">
                 {{ session()->get('message2')}}
                 </div>
                 @endif
<div class="container-fluid" style=" background-image: url('images/wallpaper.jpg'); 
  background-repeat: no-repeat; 
   width:100%;
   background-size:cover;
   height:405px;
   position:relative;">

<div class="container">
    <div class="row">
      <div class="col-sm-6">
          @include('inc.messages')

          <div  class="col-sm-10 col-sm-offset-7">
						<h5>If you shopped with us before, Please enter your Login name and password...
						<br>don’t have an account?
                 <a href="/registration" > Register Now</a></h5>
         
<!--Login form-->
          <form action="/login/user" method="post">
            {{ csrf_field() }}

            <label for="email" class="required control-label">E mail</label><br>
            <input type="email" class ="form-control" name="email" id="email" required autofill=false placeholder="Enter Your Email Address" ><br>
            
            <label for="password" class="required control-label">Password</label><br>
            <input type="password" class ="form-control" name="password" id="password" required placeholder="Enter Your Password" ><br>    
             
             <input type="submit" class ="btn btn-success"  name="register" value="Login">
          </form>
         
                       <div class="form-group">
                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                       </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?</a>
                        </div>
            </div>    
          </div>
        </div>
      </div>
    </div>
</div>

@endsection









