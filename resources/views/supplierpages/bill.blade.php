<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ceylon Cart</title>

  <style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: right;
  padding: 8px;
}

 th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

.product{
  text-align: left;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.bill{
  align:center;
}
h2{
  font-family: "Trebuchet MS", Helvetica, sans-serif;
}
.det{
  font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}
  </style>

</head>
<body>
  
  @php
      $total=0;
  @endphp

  <div class="bill">
    <center>

      <h2>Ceylon Cart</h2>
      <p class="det">
        E-mail - ceyloncart@gmail.com , Tel - 055 894 5456  <br>
        @php
            echo date("l").' ';
            echo date("Y/m/d");
            $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
            echo " ";
            echo $date->format('H:i:s');
        @endphp
      </p>

      

      <p class="fname" style="text-align:;">
        
          @foreach($billData as $billData2)
          @if ($loop->first)
          Payer : {{$billData2->companyname}} <br>
          Payee : {{$billData2->farmName}}
          @endif
        @endforeach
      </p>

      <table class="bill" style="align:center">
        <thead>
          <tr>
            <th>Item</th>
            <th>Price</th>
            <th></th>
            <th>Qty (Kg)</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($billData as $billData)
          
            <tr>
              <td class="product">{{$billData->productimagename}}</td>
              <td>Rs : {{$billData->price}} . 00</td>
              <td>*</td>
              <td>{{$billData->reserved_quantity}}</td>
              <td>Rs: {{$billData->reserved_price}} . 00</td>
              
            </tr>
    
            @php  
                $total=$total+$billData->reserved_price;    
            @endphp
            
          @endforeach
        
            <tr class="info">
                <td class="product"><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <strong>Rs : {{$total}} . 00</strong>
                </td>
            </tr>
        </tbody>
        
    </table>
    
    <br>
    <br>
    <br>
    <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>
    



    </center>
  </div>
  
</body>
</html>