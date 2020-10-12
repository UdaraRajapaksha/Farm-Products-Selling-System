<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\advertisement;
use DB;
use Mail;
use App\productimage;
use App\admin;
use Auth;
use App\help;

use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //----------------------- Dashboard page view-----------------------------//
    public function dashboard(){
        $title = 'Admin Dashboard';
        $customerData = DB::select('select * from customers');
        $supplierData = DB::select('select * from suppliers');
        $orderData = DB::select('select * from orders');
        //$loginData = DB::select('select* from login order by userID desc limit 5');
        $clogin = DB::select('SELECT * FROM customers LEFT JOIN users ON customers.customerId =users.id ORDER BY users.id asc limit 5');
        ;
        $slogin = DB::select('SELECT * FROM suppliers LEFT JOIN users ON suppliers.supplierId =users.id ORDER BY users.id asc limit 5');
        //return $slogin;
        //return $query;
        return view('adminpages.dashboard')->with('title',$title)
        ->with('customerData',$customerData)
        ->with('supplierData',$supplierData)
        ->with('orderData',$orderData)
        ->with('clogin',$clogin)
        ->with('slogin',$slogin)
        ;
    }

    //-------------------------view customers-------------------------------------//
    public function viewcustomer($id){
        $title = 'Admin - View User';
        $customerData=DB::select("select * from customers where customerId = '$id' limit 1"); 
        //return $customerData;
        return view('adminpages.viewcustomer')->with('title',$title)->with('customerData',$customerData);
    }

    //------------------------view suppliers--------------------------------------//
    public function viewsupplier($id){
        $title = 'Admin - View User'; 
        $supplierData=DB::select("select * from suppliers where supplierId = '$id' limit 1"); 
        //return $customerData;
        return view('adminpages.viewsupplier')->with('title',$title)->with('supplierData',$supplierData);
    }

    //---------------------------view profile page----------------------------------//
    public function viewprofile(){
        $title = 'Admin - Profile';
        $id=Auth::user()->id;
        //$adminData=admin::find($id);
        $adminData = DB::select("select * from admins where adminId='$id'");
        return view('adminpages.profile')->with('title',$title)->with('adminData',$adminData);
        
    }

    //*********************************************** Manage Products********************************************* */

    //---------------------------view prdoucts page----------------------------------//
    public function viewproducts(){
        $title = 'Admin - Products';
        $productData=productimage::orderBy('id','desc')->paginate(3);
       // return $productData;
        return view('adminpages.products_config.index')->with('title',$title)->with('productData',$productData);
        
    }

    public function productsstore(Request $request){
        $title = 'Admin - Products';
        $productData=new productimage;
        $productData->productimagename=$request->productName;

        //image
        $name=addslashes($_FILES['image']['name']);
        //$advertisementData->imageName=$name;

        $image=addslashes($_FILES['image']['tmp_name']);
        $image=file_get_contents($image);
		$image=base64_encode($image);

        $productData->image=$image;


        $productData->save();
        return redirect()->back();
    }
    

    public function manageproducts($id){
        $title="Admin - view product";
      $productData=productimage::find($id);
      $productAll=productimage::orderBy('id','desc')->paginate(3);;
      return view('adminpages.products_config.view')->with('title',$title)->with('productData',$productData)->with('productAll',$productAll);
    }

    public function updateproducts(Request $request, $id)
    {
       /*  $this->validate($request,[
            'image' => '
            required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]); */
        //
        $updateData=productimage::find($id);

        //image
        $name=addslashes($_FILES['image']['name']);
        //$updateData->imageName=$name;

        $image=addslashes($_FILES['image']['tmp_name']);
        $image=file_get_contents($image);
		$image=base64_encode($image);
        
        $updateData->image=$image;
        $updateData->productimagename=$request->productname;
        //**** */



        $updateData->save();
        
        return redirect()->back();
    }

    public function deleteproducts($id){
        $DeleteData=productimage::find($id);
        //return $adData;
        $DeleteData->delete();
        
        $title = 'Admin - Products';
        $productData=productimage::orderBy('id','desc')->paginate(3);
       // return $productData;
        return view('adminpages.products_config.index')->with('title',$title)->with('productData',$productData);
        
        
    }

//******************************************************************************************************************** */

    //-------------------------------view mail box page-------------------------//
    public function mailbox(){
        $title='Admin - Mail Box';
        $email='';
        return view('adminpages.mailbox')->with('title',$title)->with('email',$email);
    }

    
    public function sendmail(){
       //return "ttt";
       $msg="test";
           // $data = array('data'=>$msg);
            $data=['name'=>$msg];
        Mail::send(['text'=>'adminpages.mailbox'],$data,function($message) use($data) {
        $message->to('hansanapushpakumara@gmail.com')
                ->subject('Online Email Test');
        $message->from('nemodorylab2018@gmail.com');
        });
        return "hell";
        return redirect()->back();
    }

    //--------------------------------remove customer---------------------------//
    public function removecustomer($id){
       // return $id;
        $query1 = DB::delete("delete from customers where customerId='$id'");
        $query2 = DB::delete("delete from users where id='$id'");
        return redirect()->back();
    }

    //--------------------------------remove supplier---------------------------//
    public function removesupplier($id){
        // return $id;
         $query1 = DB::delete("delete from suppliers where supplierId='$id'");
         $query2 = DB::delete("delete from users where id='$id'");
         return redirect()->back();
     }

    //-------------------------send email to users by looking their pages---------------//
    public function mailusers($email){
        $title='Admin - Mail Box';
        //return $email;
        return view('adminpages.mailbox')->with('title',$title)->with('email',$email);
    }
    
    //-------------------------update admin profile----------------------------------//
    public function updateprofile(Request $request)
    {
        $customMessages = [
            'name.required'  => '*Name is required',
            'email.required|email' => '*Email is required'
          ];
          $this->validate($request,[
                  'name'=> 'required',
                  'email' => 'required',
              ], $customMessages);
        //
        /*$profileData=new profileData;*/
        $userId=$request->userID;
        $name=$request->name;
        $nic=$request->nic;
        $email=$request->email;
        $phoneNo=$request->phoneNo;
        //$accountNo=$request->accountNo;

        $query=DB::update("update admins set  name = '$name', nic = '$nic', email = '$email', phoneNo = '$phoneNo' where adminId = $userId");
        return redirect()->back()->with('success' ,'Profile Updated');

        //dd($request->all());
    }

    //--------------------------------------show customer list-------------------------//
    public function viewcustomerslist(){
        $title = 'Admin - View Customers'; 
        $customerData=DB::select("select * from customers"); 
        //return $customerData;
        return view('adminpages.customerlist')->with('title',$title)->with('customerData',$customerData);
    }

    //==================================help=====================================//

    //---------------------help view----------------------
    public function viewHelp(){
        $title="help MAnagement";
        $helpData=DB::select("select* from helps where approved='Y' and category = 'FAQ'");

        $helpDataN=DB::select("select* from helps where approved='N' and category = 'FAQ'");

        $feedbackData=DB::select("select* from helps where category = 'COM'");

        return view('adminpages.help.helpindex')->with('title',$title)
        ->with('helpData',$helpData)
        ->with('helpDataN',$helpDataN)
        ->with('feedbackData',$feedbackData);

    }

    public function saveHelp(Request $request,$id){
        $helpData=help::find($id);
        $helpData->question=$request->question;
        $helpData->answer=$request->answer;
        $helpData->approved=$request->approved;
        $helpData->save();
        return redirect()->back()->with('success' ,'Posted');
    }
    public function removeHelp($id){
        $helpData=help::find($id);
        $helpData->delete();
        return redirect()->back();
    }
    protected function newHelp(Request $request){
        $helpData = new help;
        $helpData->question=$request->question;
        $helpData->answer=$request->answer;
        $helpData->approved=$request->approved;
        $helpData->save();
        return redirect()->back()->with('success' ,'Posted');
    }
}
