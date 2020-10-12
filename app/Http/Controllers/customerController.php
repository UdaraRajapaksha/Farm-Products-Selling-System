<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\supplier;
use DB;
use Auth;

class customerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index(){ // index page after login

        $customerId=Auth::user()->id;
        $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$customerId)->get();
        return view('customerlayouts.customerdash')->with('customerdetailes',$customerdetailes);

    }

    //-----------------------------new piumi-----------

    protected function editprofile(){
        $id=Auth::user()->id;
        
        $customerData=DB::select("select * from customers where customerId = '$id'");

        //return $customerData;

       return view('customerpages.editprofile')->with('customerData',$customerData);
    }

    protected function updateprofile(Request $request){
        $id=Auth::user()->id;
        
        $customerData=DB::select("select * from customers where customerId = '$id'");

        $name=$request->name;
        $companyname=$request->companyname;
        $regNo=$request->regNo;
        $address=$request->address;
        $homeTown=$request->homeTown;

        $image=addslashes($_FILES['image']['tmp_name']);
            $image=file_get_contents($image);
            $image=base64_encode($image);

        
        $nic=$request->nic;
        $phoneNo=$request->phoneNo;
            
        $query=DB::update("update customers set companyname = '$companyname'
                                            , name = '$name'
                                            , regNo = '$regNo'
                                            , address = '$address'
                                            , homeTown = '$homeTown'
                                            , image = '$image'
                                            , nic = '$nic'
                                            , phoneNo = '$phoneNo'
                                           
         where customerId = '$id'");

       return redirect('/customer/editprofile')->with('success','Profile Updated'); 

        }


}
