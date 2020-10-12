@extends('layouts.app')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12">
         <h3>Online Help?</h3>
        </div>
    </div>

    <div class="row">

          <h4><strong>> How to create an account?</strong> 
            <a href="#" id="show1">show</a>
            <a href="#" id="hideshow1">hide</a>
          
          </h4>
          

          <script>
            $(document).ready(function(){

              $("#hide1").hide();
              $("#hideshow1").hide();

              $("#show1").click(function(){
                  $("#hide1").show();
                  $("#show1").hide();
                  $("#hideshow1").show();
                  
              });

              $("#hideshow1").click(function(){
                  $("#hide1").hide();
                  $("#show1").show();
                  $("#hideshow1").hide();
                  
              });

            });

          </script>

          <div id="hide1">

          <div class="container" style="margin-left:;">
              <div class="col-sm-6">
                  <h5><strong>Click on Register button</strong></h5>
                  <p>Within the right coner of navigation bar you can find register button</p>
              </div>
              <div class="col-sm-6">
                <img src="{{asset('images/q1.1.jpg')}}" alt="img1" width="" height="auto">
              </div>
          </div>

          <div class="container" style="margin-left:;">
              <div class="col-sm-6">
                  <h5><strong>Select Your Role</strong></h5>
                  <p>
                    Within the next page you can find two buttons. 
                    If you are registering as a supplier click on supplier otherwise customer.
                </p>
              </div>
              <div class="col-sm-6">
                <img src="{{asset('images/q1.2.jpg')}}" alt="img1" width="100%" height="auto">
              </div>
          </div>

          <div class="container" style="margin-left:;">
              <div class="col-sm-6">
                  <h5><strong>Fill in the Application form</strong></h5>
                  <p>
                      Then you will see the registration form. 
                      Fill the form correctly with your true details and click on register button.
                  </p>
              </div>
              <div class="col-sm-6">
                <img src="{{asset('images/q1.2.jpg')}}" alt="img1" width="100%" height="auto">
              </div>
          </div>
          
        </div>
          
    </div>

    <div class="row">
        <h4><strong>> How to create an order?</strong>
          <a href="#" id="show2">show</a>
          <a href="#" id="hideshow2">hide</a>
        </h4>

        <script>
            $(document).ready(function(){

              $("#hide2").hide();
              $("#hideshow2").hide();

              $("#show2").click(function(){
                  $("#hide2").show();
                  $("#show2").hide();
                  $("#hideshow2").show();
                  
              });

              $("#hideshow2").click(function(){
                  $("#hide2").hide();
                  $("#show2").show();
                  $("#hideshow2").hide();
                  
              });

            });

          </script>

        <div id="hide2">
            <div class="container" style="margin-left:;">
                <div class="col-sm-6">
                    <h5><strong>Click on Register button</strong></h5>
                    <p>Within the right coner of navigation bar you can find register button</p>
                </div>
                <div class="col-sm-6">
                  <img src="{{asset('images/q1.1.jpg')}}" alt="img1" width="auto" height="auto">
                </div>
            </div>
        </div>
        
    </div>


    <div class="row">
        <h4><strong>> How to reserve an order?</strong>
          <a href="#" id="show3">show</a>
          <a href="#" id="hideshow3">hide</a>
        </h4>

        <script>
            $(document).ready(function(){

              $("#hide3").hide();
              $("#hideshow3").hide();

              $("#show3").click(function(){
                  $("#hide3").show();
                  $("#show3").hide();
                  $("#hideshow3").show();
                  
              });

              $("#hideshow3").click(function(){
                  $("#hide3").hide();
                  $("#show3").show();
                  $("#hideshow3").hide();
                  
              });

            });

          </script>

        <div id="hide3">
            <div class="container" style="margin-left:;">
                <div class="col-sm-6">
                    <h5><strong>Click on Register button</strong></h5>
                    <p>Within the right coner of navigation bar you can find register button</p>
                </div>
                <div class="col-sm-6">
                  <img src="{{asset('images/q1.1.jpg')}}" alt="img1" width="auto" height="auto">
                </div>
            </div>
        </div>
        
    </div>
<br>
    <div class="row">
      <div class="col-sm-12">
        <p>Was this article helpful?</p>
        <a href="/help/FAQ">Frequently Asked Questions</a>
      </div>
    </div>

</div>
@endsection