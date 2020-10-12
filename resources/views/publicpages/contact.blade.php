@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
       
          <h1>Contact Us</h1>
          <div class="col-sm-4">

            <p> <img style="width:5%; height:25px" src="images/phone.png"><b> &nbsp Phone Number  : 071 56587878</b></p>
                          
            <p> <img style="width:5%; height:25px" src="images/email.png"><b> &nbsp E mail : ceyloncart@gmail.com</b></p>

            <p> <img style="width:5%; height:25px" src="images/fb.jpg"><b> &nbsp Facebook : www.facebook.com/ceyloncart.SL</b></p>

            <p> <img style="width:5%; height:25px" src="images/twitter.png"><b> &nbsp Twitter  : www.twitter.com/ceyloncart_SL</b></p>
        <br>
            <img style="width:50%; height:80px" src="images/logo.png">
            </div>
        
            <div class="col-sm-8">
                      
                        <center><h2>We welcome your feedback</h2></center>
                        <br>Your comments help us improve our website.
                        <br>Thank you very much for spending your valuable time on this
                  
    
       <h3>Add New Comment</h3>
             

       @include('inc.messages')
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

         <form action="/addcomment" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
       E mail<br>
         <input type="text" name="email" id="email"  required class="form-control"><br>
       Comment <br>
         <textarea rows="4" cols="50" placeholder="Enter Your Comments here..." 
                         required name="comment_Body" required class="msg form-control"></textarea>
     <br>
            
         <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>
 
       
   
          </div>
        </div> 
    </div>  
@endsection