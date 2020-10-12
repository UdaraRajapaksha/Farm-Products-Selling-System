<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\supplier;

class searchController extends Controller
{
    function index()
    {
     return view('publicpages.search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        /*
       $data = DB::table('suppliers')
         ->where('farmName', 'like', '%'.$query.'%')
         ->orWhere('phoneNo', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();*/

         $data = DB::table('suppliers')->join('products','products.supplierId','=','suppliers.supplierId')
         ->select('suppliers.farmName','suppliers.phoneNo','suppliers.id')
         ->where('suppliers.farmName', 'like', '%'.$query.'%')
         ->orWhere('products.productName', 'like', '%'.$query.'%')
         ->orderBy('suppliers.id', 'desc')
         ->get();
         
      }
     /* else
      {
       $data = DB::table('suppliers')
         ->orderBy('id', 'desc')
         ->get();
      }*/
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        
         <td>'.'<a href="/supplier/view/'.$row->id.'">'.$row->farmName.'</a>'.'</td>
         <td>'.$row->phoneNo.'</td>
         
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
//----------------------------------search end---------------------------------------------//

//=====================customer list===========================


public function customerlistView($homeTown){

  $customerData=DB::select("select companyname,address,phoneNo,id from customers where homeTown ='$homeTown'");
  return view('supplierpages.customerslist')->with('customerData',$customerData);
  

}

function customerlist(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        
       $data = DB::table('customers')
         ->where('companyname', 'like', '%'.$query.'%')
         ->orWhere('homeTown', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();

        /* $data = DB::table('suppliers')->join('products','products.supplierId','=','suppliers.supplierId')
         ->select('suppliers.farmName','suppliers.phoneNo','suppliers.id')
         ->where('suppliers.farmName', 'like', '%'.$query.'%')
         ->orWhere('products.productName', 'like', '%'.$query.'%')
         ->orderBy('suppliers.id', 'desc')
         ->get();*/
         
      }
     /* else
      {
       $data = DB::table('suppliers')
         ->orderBy('id', 'desc')
         ->get();
      }*/
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        
         <td>'.'<a href="/customer/view/'.$row->id.'">'.$row->companyname.'</a>'.'</td>
         <td>'.$row->homeTown.'</td>
         
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }


}