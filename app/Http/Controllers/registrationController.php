<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\customer;
use App\supplier;

class registrationController extends Controller
{
    //


    //category selection-----------------------

    public function regcategory(){
        return view('authpages.registration_category');
    }

    //reg pages---------------------------------------
    public function customerform(){
        return view('authpages.customer_registration');
    }
    public function supplierform(){
        return view('authpages.supplier_registration');
    }

    //save data to user----------------------------------

    //===========customer==============
    protected function registerCustomer(Request $request){
        //return "hello";
        $users = new User();
        $users->name = $request->name;
        $users->password =  bcrypt($request->password);
        $users->category = "Customer";
        $users->email = $request->email;
        $users->save();

        //get customerId
        $insertedId = $users->id;

        //saving data to customer table
        
        $customers = new customer();
        $customers->customerId = $insertedId;

        $customers->companyname = $request->companyname;
        $customers->name = $request->name;
        $customers->nic = $request->nic;
        $customers->phoneNo = $request->phoneNo;
        $customers->email = $request->email;
        $customers->regNo = $request->regNo;
       // $customers->accountNo = $request->accountNo;
        $customers->address = $request->address;
        $customers->homeTown = $request->homeTown;

        $image=addslashes($_FILES['image']['tmp_name']);
        $image=file_get_contents($image);
        $image=base64_encode($image);
        
        $customers->image = $image;

        $customers->save();

        return redirect('/login')->with('success','You have succesfully registered. Please Login Now'); 

    }

    //===========supplier==============
    protected function registerSupplier(Request $request){
        //return "hello";
        $users = new User();
        $users->name = $request->name;
        $users->password =  bcrypt($request->password);
        $users->category = "Supplier";
        $users->email = $request->email;
        $users->save();

        //get supplierId
        $insertedId = $users->id;

        //saving data to suppliers table
        
        $suppliers = new supplier();
        $suppliers->supplierId = $insertedId;

        $suppliers->farmName = $request->farmName;
        $suppliers->phoneNo = $request->phoneNo;

        $suppliers->name = $request->name;
        $suppliers->nic = $request->nic;
        $suppliers->email = $request->email;
        $suppliers->accountNo = $request->accountNo;
        $suppliers->farmRegNo = $request->farmRegNo;
        $suppliers->address = $request->address;
        $suppliers->homeTown = $request->homeTown;
        $suppliers->location = $request->location;

        $image=addslashes($_FILES['image']['tmp_name']);
        $image=file_get_contents($image);
        $image=base64_encode($image);
        
        $suppliers->image = $image;

        $suppliers->supplier_description = $request->supplier_description;

        $suppliers->save();
        //return redirect()->with('success','You have succesfully registered. Please Login Now'); 
        return redirect('/login')->with('success','You have succesfully registered. Please Login Now'); 
    }

    //----------------------------------------------------


}
