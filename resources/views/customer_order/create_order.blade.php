
@extends('customerlayouts.customerdashboard')
@section('content')
<div class="col-md-12">
       
 @if(Session::has('success'))
 <div class="center" style="text-align: center;">
 <div class="alert alert-success">
     {{Session::get('success')}}
 </div>
</div>
 @endif

 
     <form action="/h" method="POST" class="form-container" >
         {{csrf_field()}}
        
<div class="form-group">
        <section class="row justify-content-center">
            <center><h2 style="font-weight: bold;color:#009900">Create Order </h2></center>   
            <br>
        <div class="row">

        <div class="col-sm-2">
                <center><h4>Order valid date </h4</center>
        </div>
        
        <div class="col-sm-4">
            <select name="expire_date" class="form-control" >
<option value="24">1-day</option> 
<option value="48">2- days</option>
<option value="72">3- days</option>
<option value="96">4- days</option>
<option value="120">5- days</option>
<option value="144">6- days</option>
<option value="168">7- days</option>

</select>
</div>
</div>
<br>
               <span>
              
        <table  class="table table-border" style="overflow-x:auto;"  >
   <thead style="background-color:#00b33c ;color:black;position:center; text-align:center;font-weight: bold;" align="center" >
                        <tr>
                            <th>Product Name</th>
                     
                            <th>Quantity (Kg)</th>
                            <th>Price (Rs)</th>
                          
                          <th><button class="btn btn-info"><a href="#" class="addRow" ><i class="glyphicon glyphicon-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
        <tr>
        <td>
        <select class="form-control" id="sell" name="product_name[]">
 @foreach($productname as $item)
  
 <option value="{{$item->id}}">{{$item->productimagename}}</option>



           @endforeach
           </select>
</td>

          <td><input type="number" name="quantity[]" class="form-control quantity" required="" placeholder="Enter Quantity"></td>
          <td><input type="number" name="price[]" class="form-control budget" required="" placeholder="Enter Price"></td>
        
        <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
        </tr>
                        </tr>
                    </tbody>
                  
                </table>
               </span>
         
                <input type="submit" name="" value="Create Order" class="btn btn-primary">
           

        
        </section>
       </div>
   

     </form>

   
</div>
    </div>
            
               

@section('script')


<script type="text/javascript">


 


 $('.addRow').on('click',function(){
     addRow();
 });
 function addRow()
 {
     var tr='<tr>'+
     '<td>'+
      '<select class="form-control" id="sell"  name="product_name[]" >'+
   '@foreach($productname as $item)'+
    '<option value="{{$item->id}}">{{$item->productimagename}}</option>'+
    '@endforeach'+
    '</select>'+
    '</td>'+

     '<td><input type="text" name="quantity[]" class="form-control quantity" required="" placeholder="Enter Quantity"></td>'+
     '<td><input type="text" name="price[]" class="form-control budget" placeholder="Enter Price"></td>'+

     '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
     '</tr>';
     $('tbody').append(tr);
 };
 $('.remove').live('click',function(){
     var last=$('tbody tr').length;
     if(last==1){
         alert("you can not remove last row");
     }
     else{
          $(this).parent().parent().remove();
     }
 
 });


</script>
@stop

@endsection