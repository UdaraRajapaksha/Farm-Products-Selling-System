<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/footer.css')}}">
 </head>
 <body>

<!---------------------------------header----------------------------------->
@include('inc.navbar')
<!---------------------------------------------------------------------------->

  
  <br />
  <div class="container box">
   <h3 align="center">Search customers by name/ home town...</h3><br />
   <div class="panel panel-default">
    
    
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Customers" />
     </div>
     <div class="table-responsive">
      
      <table class="table table-striped table-bordered">
       
       <tbody>

       </tbody>
       <!--<p><span id="total_records"></span> results </p>-->
      </table>
     </div>
      
   </div>

   <div class="row">
      <div class="well">
          <h4 style="background-color:#00b300;margin:1vh;padding:1vh;color:white;">Your nearest Customers <small style="color:white;">(Based on your home town)</small></h4>
          @foreach ($customerData as $customerData )
              <div class="names" style="margin:2vh;">
                <p>
                  <span><strong><a href="/customer/view/{{$customerData->id}}">{{$customerData->companyname}}</a></strong></span><br>
                  <small>
                    <span>{{$customerData->address}}</span> 
                    <span> | {{$customerData->phoneNo}}</span><br>
                  </small>
                </p>
              </div>
          @endforeach
       </div>
   </div>


  </div>
  
<!---------------------------------footer----------------------------------->
@include('inc.footer')
<!---------------------------------------------------------------------------->
 </body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.customerlist') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>





