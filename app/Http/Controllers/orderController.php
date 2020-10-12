<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imupload;
use App\Order;
use App\supplier;
use DB;
use Auth;
use PDF;

use Carbon\Carbon;

class orderController extends Controller
{

   
   public  function showorder(){
   
        $data=Auth::user()->id;

    $customer_data=DB::table('orders')->join('productimages','productimages.id','=','orders.product_id')
    ->select('orders.id','image','productinitial_quantity','quantity','price','productimagename','product_id','expired_date')
    ->where('orders.customer_id','=',$data)->get();
       // $maxValue = order::select('order_number')->where('customer_number', '=',  $data3)->max('order_number');
      
       $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
     
      return view('customer_order.showorder')->with('customer_data' , $customer_data)->with('customerdetailes',$customerdetailes);
      
 
        return $customer_data;
    }    
    public function getproductname(){
        $data=Auth::user()->id;
        $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
        $productname = DB::table('productimages')->select('id','productimagename')->get();
        return view('customer_order.create_order')->with('productname' , $productname)->with('customerdetailes',$customerdetailes);
    }
    public function createorder(Request $request)
    {
        $data1=Auth::user()->id;
    
    $students = DB::table('Orders')->select('customer_id')->where('customer_id', '=',  $data1)->take(1)->get();
 
        if(count($request->product_name) > 0)
        {

 foreach($students as $stud){
 
 
     if( $stud->customer_id==$data1){
 
 
         $ord = DB::table('Orders')->select('order_number')->where('customer_id', '=',  $data1)->orderBy('order_number', 'desc')->take(1)->get();
 
   foreach($ord as $or){
 
      $ors = $or->order_number + 1;
 
      foreach($request->product_name as $item=>$v){
       
        $current = Carbon::now();
        $current = new Carbon();
        $expire_date = Carbon::now()->addHours($request->expire_date); 

    
     
 
 
          $data2=array(
       
           
              'product_id'=>$request->product_name[$item],
             
              'quantity'=>$request->quantity[$item],
              'productinitial_quantity'=>$request->quantity[$item],
              'price'=>$request->price[$item],
     
              //'order_number'=>$request->order_number,
              'order_number'=>$ors,
              'customer_id'=>$data1,
           
              'expired_date'=>$expire_date,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
             
          );
          
     
          Order::insert($data2);
       
     }
     return redirect()->back()->with('success','Order Create Succesfullyy');
 } 
 
     }   
 
    
      
        }
 
 
 
        $user = Order::where('customer_id', '=', $data1)->first();
 
        if(  $user===null){
 
         $order_number=1;
 
         foreach($request->product_name as $item=>$v){
          
          
            $current = Carbon::now();
            $current = new Carbon();
            $expire_date = Carbon::now()->addHours($request->expire_date);
      
           
             
                $data2=array(
             
               
                    'product_id'=>$request->product_name[$item],
                   
                    'quantity'=>$request->quantity[$item],
                    'price'=>$request->price[$item],
                    'productinitial_quantity'=>$request->quantity[$item],
                    //'order_number'=>$request->order_number,
                    'order_number'=>$order_number,
                    'customer_id'=>$data1,
                    'expired_date'=>$expire_date,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                   
                );
                
       
                Order::insert ($data2);
             
          }
          return redirect()->back()->with('success',' Order Create Succesfully');
     } 
   
 
        }


        
      
    }

  
 
    public function upadteorder(Request $request)
    {
     
        $id=$request->id;
    
     $price=$request->price;
    
 
     $quantity=$request->quantity;

     $data=Order::find($id);
     
     $data->productinitial_quantity=$quantity;
     $data->price=$price;
     $data->save();
 
     $data=01;
    
     $customer_data=DB::table('orders')->join('productimages','productimages.id','=','orders.product_id')->select('orders.id','image','quantity','price','productimagename')->where('orders.customer_id','=',$data)->get();
 
    
     
 
    
     return redirect()->back()->with('customer_data' , $customer_data);
  
     
    
    }
    public function removeorder($id) 
    {
  
 
     $cus1=Order::find($id);
     $cus1->delete();
     
     
     return redirect()->back();
    
    
    
    }

    public function reservedsuppliers($id){
        $customer_data=DB::table('orders')->join('reserves','reserves.order_id','=','orders.id')->join('productimages','productimages.id','=','orders.product_id')->join('suppliers', 'reserves.supplier_Id', '=', 'suppliers.supplierId')->select('suppliers.supplierId','reserved_quantity','reserved_price','product_id','name','productimagename','productimages.image','suppliers.image','order_refNo')->where('reserves.order_id','=',$id)->get();  
        //  return view('customer_order.reservedsuppliers')->with('customer_data' , $customer_data);
        $data=Auth::user()->id;
        $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
    // $proid=DB::table('ordercustomers')->select('product_id')->where('ordercustomers.id','=',$id)->get();
    $displayname = DB::table('orders')->join('productimages','productimages.id','=','orders.product_id')->select('image','productimagename')->where('orders.id','=',$id)->get();
        //   $displayname=DB::table('productimages')->join('ordercustomers','ordercustomers.product_id','=','productimages.id')->select('image','productimagename')->where('ordercustomers.product_id','=',$id)->get(); 
         return view('customer_order.reservedsuppliers')->with('displayname',$displayname)->with('customer_data' , $customer_data)->with('customerdetailes',$customerdetailes);
       // return redirect()->back();  
           
          // $productname = DB::table('productimages')->select('id','productimagename')->where('id','=',$id)->get();
        }
 
    public function showordertocustomer(){
        $data=Auth::user()->id;
        $customerdetailes = DB::table('suppliers')->select('image','name ','address','phoneNo  ','email')->where('supplierId','=',$data)->get();
        return view('customer_order.showordertosupplier')->with('customerdetailes',$customerdetailes);

    }


    public function viewreservedonesupplier(Request $request){
        $data=Auth::user()->id;

        $supid=$request->supid;
    
     $orderef=$request->orderef;

      $onlysupplierreserved = DB::table('reserves')->join('orders','orders.id','=','reserves.order_id')->join('productimages','productimages.id','=','orders.product_id')->select('reserved_quantity','reserved_price','product_id','productimagename','image')->where('reserves.customer_id','=',$data)->where('reserves.supplier_Id','=', $supid)->get();
              $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
               
              $displayname =DB::table('suppliers')->select('image','name','address','phoneNo','email')->where('supplierId','=', $supid)->get();
             //new
              $totalprice=DB::select("SELECT SUM(reserved_price) AS totalprice FROM reserves WHERE order_refNo='$orderef' and supplier_Id='$supid' limit 1");
              
              //====
             
              //return view('customer_order.onesuppliersorders')->with('onlysupplierreserved',$onlysupplierreserved)->with('displayname',$displayname)->with('customerdetailes',$customerdetailes);
            
              return view('customer_order.onesuppliersorders')->with('onlysupplierreserved',$onlysupplierreserved)->with('displayname',$displayname)->with('customerdetailes',$customerdetailes)->with('totalprice',$totalprice);
           
            
            }


         
}
?>