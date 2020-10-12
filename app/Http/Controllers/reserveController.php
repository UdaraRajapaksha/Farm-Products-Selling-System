<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\reserve;
use Auth;

class reserveController extends Controller
{
    //
    public function reserveorder(Request $request){
       // return dd($request->all());
        //return $request->n1;
        //$order_number=2;
        $order_number=$request->order_number;
        $customer_Id=$request->customer_Id;
        //$customer_Id=2; //instant comment
        $supplier_Id=$id=Auth::user()->id;// get from session
        $rowcount=$request->rowcount;
        $firstrowcount=$rowcount;
        $emptycount=0;
        $qty=0;
        //return $rowcount;
        while($rowcount>0){
            $name='n'.$rowcount;
            $pricename='p'.$rowcount;
            $oqname='oq'.$rowcount;
            $idname='id'.$rowcount;
            $id=$request->$idname;

            $pricerow=$request->$pricename;
            $qty=$request->$name;
            $orderqty=$request->$oqname;
   
            $price=$pricerow*$qty;
            $newOrderQty=$orderqty-$qty;
            $query2=DB::update("update orders set quantity='$newOrderQty' where order_number='$order_number' and id='$id' ");

            if($qty!='0'){
            $query=DB::insert("insert into reserves (reserved_quantity,order_refNo,customer_Id,supplier_Id,reserved_price,order_Id) values ('$qty','$order_number','$customer_Id','$supplier_Id','$price','$id')");   
            }
            else{
                $emptycount++;
            }
            
            $rowcount--;
            
        }
        //return redirect()->back();
        //session()->flash('notif','sucess');
       if($emptycount==$firstrowcount){
           return back()->with('error' ,'! '.' Empty Orders. You have not reserved any order.');
       }
       else{
        //return back()->with('success' ,'You have reserved order successfuly')->with('error' ,'! '.$emptycount.' orders are empty!');
        return redirect('/supplier/myorders/'.$order_number)->with('success' ,'You have reserved order successfuly');
        //return $request->rowcount;
        }
       // return back()->with('success' ,'You have reserved order successfuly'.$emptycount.'orders are empty!')->with('error' ,'!'.$emptycount.'orders are empty!');

        //return redirect('/customer/orders/'.$customer_number);
    }

    public function cancelOrder(Request $request){
        //return dd($request->all());
        $id=$request->id;
        $order_Id=$request->order_Id;
        $reserved_quantity=$request->reserved_quantity;
        $quantity=$request->quantity;

        //calculation
        $newOrderQty=$quantity+$reserved_quantity;
        //return $newOrderQty;
        $OrderData=reserve::find($id);
        //return $adData;
        $OrderData->delete();
        $query2=DB::update("update orders set quantity='$newOrderQty' where id='$order_Id' ");
        return back()->with('error' ,'! '.' Order Removed');
    }

    public function editOrder(Request $request){
       // return dd($request->all());

        $id=$request->id;
        $order_Id=$request->order_Id;

        $reserved_quantity=$request->reserved_quantity;
        $quantity=$request->quantity;
        $new_quantity=$request->new_quantity;
        $price=$request->price;

        //return $price;

        //calculations
        $new_order_qty=$quantity+$reserved_quantity-$new_quantity;
        $new_reserve_qty=$new_quantity;
        $newprice=$price*$new_quantity;
        //return $new_order_qty;
        $query2=DB::update("update orders set quantity='$new_order_qty' where id='$order_Id' ");
        $query3=DB::update("update reserves set reserved_quantity='$new_reserve_qty', reserved_price='$newprice' where id='$id'");

        return back()->with('success' ,'! '.' Order Updated');
    }

}
