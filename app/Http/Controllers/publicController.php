<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\advertisement;
use App\supplier;
use App\customer;
use DB;
use App\help;
use Auth;


class publicController extends Controller
{
    //

    //-------------------public home pages-----------------------------//

    public function index(){
        $adData=advertisement::all();
        //return $adData;
        return view('publicpages.home')->with('adData',$adData);
    }

    

    ///-------------------------help ---------------------------///
    
    public function helpView(){
        return view('publicpages.help');
    }

    public function faq(){
        $helpData=DB::select("select* from helps where approved='Y'");
        return view('publicpages.FAQ')->with('helpData',$helpData);
    }

    public function faqAdd(Request $request){

        $helpData = new help;
        $helpData->question=$request->question;

        $helpData->save();
        return redirect()->back();

    }

    //*********************************************************** */

    public function community(){
        $customers=customer::all();
        $suppliers=supplier::all();
        return view('publicpages.community')->with('customers',$customers)->with('suppliers',$suppliers);
    }


    //----------------------------------------supplier pages -------------------------//
    
    public function viewSupplier($id){ // public view of supplier

        $supplierData=supplier::find($id);
        if($supplierData==null){
            return "No users found";
        }

        //$id=Auth::user()->id;

        $supplierId=$supplierData->supplierId;

        $commentData =DB::table('comments')
                ->join('customers', 'customers.customerId', '=', 'comments.customer_Id')

                ->select('name','customer_Id','comment_body')->where('supplierId','=',$supplierId)->orderBy('comments.created_at','desc')
                ->get();

        $productData=DB::select("select * from products where supplierId = '$supplierId'");
        return view('publicpages.supplier.supplierhome')->with('supplierData',$supplierData)->with('productData',$productData)->with('commentData',$commentData);
   
    }

    //----------------------------------------customer pages -------------------------//

    public function viewCustomer($id){  // public view of customer

        $customerData=customer::find($id);
        if($customerData==null){
            return "No users found";
        }

        $customerdetailes = DB::table('customers')->select('customerId','image','companyname','address','phoneNo','email','name')->where('id','=',$id)->get();
        return view('layouts.customerdash')->with('customerdetailes',$customerdetailes);

    }

    public function viewCustomerOrders($id){ //view customer's order to supplier
        $customerID=$id;
        $title="Customer - view Orders";
        $cutomerData=DB::select("select companyname from customers where customerId='$customerID' limit 1 ");
        $orderData=DB::table('productimages')->join('orders','orders.product_id','=','productimages.id')->select('orders.id','productimagename','customer_id','quantity','price','order_number','image')->where('customer_id','=',$customerID)->get();
        return view('publicpages.customer.vieworder',compact('customerID'))->with('title',$title)->with('orderData',$orderData)->with('cutomerData',$cutomerData);
    }

    //---------------------------------new piumi-------------------------------------//

    public function aboutus(){
        return view('publicpages.aboutus');
    }

    public function contactus(){
        return view('publicpages.contact');
    }
    public function comment(){
        return view('publicpages.comment');
    }

    public function addComment(Request $request){
       
        $commentData=new help();

       // $commentData->supplierId =$id;
        $commentData->question =$request->comment_Body;
        $commentData->email =$request->email;
        
        $commentData->category ='COM';

        $commentData->save();
        return  redirect('/contactus')->with('message','Thanks for your feedback');
 
    }



}
