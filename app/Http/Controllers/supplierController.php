<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\supplier;
use Auth;
use DB;
use App\product;
use App\order;

use Redirect;
use PDF;

class supplierController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index(){
        $id=Auth::user()->id;
        
        $supplierData=DB::select("select * from suppliers where supplierId = '$id'");
        $productData=DB::select("select * from products where supplierId = '$id'");

        //return $supplierData;

        //$commentData=DB::select("select*from comments where supplierId='$id'");
        $commentData =DB::table('comments')
                ->join('customers', 'customers.customerId', '=', 'comments.customer_Id')

                ->select('name','customer_Id','comment_body')->where('supplierId','=',$id)->orderBy('comments.created_at','desc')
                ->get();

       return view('supplierpages.index')->with('supplierData',$supplierData)->with('productData',$productData)->with('commentData',$commentData);
    }

    protected function editprofile(){
        $id=Auth::user()->id;
        
        $supplierData=DB::select("select * from suppliers where supplierId = '$id'");

        //return $supplierData;

       return view('supplierpages.editprofile')->with('supplierData',$supplierData);
    }

    protected function updateprofile(Request $request){
        $id=Auth::user()->id;
        
        $supplierData=DB::select("select * from suppliers where supplierId = '$id'");

        $farmName=$request->farmName;
        $farmRegNo=$request->farmRegNo;
        $address=$request->address;
        $homeTown=$request->homeTown;
       
        $image=addslashes($_FILES['image']['tmp_name']);
            $image=file_get_contents($image);
            $image=base64_encode($image);

        $name=$request->name;
        $nic=$request->nic;
        $phoneNo=$request->phoneNo;
        $accountNo=$request->accountNo;
       

        $query=DB::update("update suppliers set name = '$name'
                                            , farmName = '$farmName'
                                            , farmRegNo = '$farmRegNo'
                                            , address = '$address'
                                            , homeTown = '$homeTown'
                                            , image = '$image'
                                            , nic = '$nic'
                                            , phoneNo = '$phoneNo'
                                            , accountNo = '$accountNo'
         where supplierId = '$id'");

     
       return redirect('/supplier/editprofile')->with('success','Profile Updated'); 
    }

    protected function addProductsView(){
         $id=Auth::user()->id;
        $supplierData=DB::select("select * from suppliers where supplierId = '$id'");
        $productData=DB::select("select * from products where supplierId = '$id'");
        return view('supplierpages.addproducts')->with('supplierData',$supplierData)->with('productData',$productData);
    }

    public function addProduct(Request $request){
        $id=Auth::user()->id;
        $addproductData=new product();

        $addproductData->supplierId =$id;
        $addproductData->productName =$request->productName;
        $addproductData->description =$request->description;

        $image=addslashes($_FILES['image']['tmp_name']);
        $image=file_get_contents($image);
		$image=base64_encode($image);

        $addproductData->product_image=$image;

        $addproductData->save();

        //after save--------------------
        $id=Auth::user()->id;
        
        $supplierData=DB::select("select * from suppliers where supplierId = '$id'");
        $productData=DB::select("select * from products where supplierId = '$id'");

        //return $supplierData;

       return view('supplierpages.index')->with('supplierData',$supplierData)->with('productData',$productData);
        
    }


    //-------==================== ordering process-===================-----------

    protected function viewmyorders($id){ //id.>> orderRefNo
        $title="Supplier - My order";
       // $supplier_Id=5;
       $supplier_Id=Auth::user()->id;
       $reservedData=DB::table('orders')->join('reserves','reserves.order_Id','=','orders.id')->join('productimages','productimages.id','=','orders.product_id')->select('productimagename','image','quantity','reserves.id as r_id','reserved_quantity','order_Id','price','reserved_quantity','orders.created_at as o_created_at','reserved_price')->where('supplier_Id','=',$supplier_Id)->where('reserves.order_refNo','=',$id)->get();
        
       $supplierData=DB::select("select * from suppliers where supplierId ='$supplier_Id' ");
        //return $reservedData;
        $billData=$reservedData;
        $totalprice=DB::select("SELECT SUM(reserved_price) AS totalprice FROM reserves WHERE order_refNo ='$id' and supplier_Id='$supplier_Id' ");
        //return $totalprice;
        

                
        // Start the session
        session_start();
        $_SESSION["order_refNo"] = $id;


        return view('supplierpages.vieworder')
        ->with('title',$title)
        ->with('reservedData',$reservedData)
        ->with('billData',$billData)
        ->with('totalprice',$totalprice)
        ->with('supplierData',$supplierData)
        ->with('id',$id);

        

    } 
    //**********

    protected function viewOrderslist(){
        $supplier_Id=Auth::user()->id;
        $supplierData=DB::select("select * from suppliers where supplierId ='$supplier_Id' ");

        $reserves=DB::select("select* from reserves where supplier_Id='$supplier_Id'");
        return view('supplierpages.orderslist')->with('supplierData',$supplierData)->with('reserves',$reserves); 
    }

   /* public function viewBill($id){

        $supplier_Id=Auth::user()->id;
        $billData=DB::table('orders')->join('reserves','reserves.order_Id','=','orders.id')->join('productimages','productimages.id','=','orders.product_id')->select('productimagename','image','quantity','reserves.id as r_id','reserved_quantity','order_Id','price','reserved_quantity','orders.created_at as o_created_at','reserved_price')->where('supplier_Id','=',$supplier_Id)->where('reserves.order_refNo','=',$id)->get();
     
        $totalprice=DB::select("SELECT SUM(reserved_price) AS totalprice FROM reserves WHERE order_refNo ='$id' and supplier_Id='$supplier_Id' ");
       
        return view('supplierpages.bill')
        ->with('billData',$billData)
        ->with('totalprice',$totalprice);

    }*/

    public function viewBill(Request $request){

        session_start();
        $id = $_SESSION["order_refNo"];

       
        $supplier_Id=Auth::user()->id;
/*
        $billData=DB::table('orders')
        ->join('reserves','reserves.order_Id','=','orders.id')
        ->join('productimages','productimages.id','=','orders.product_id')
        ->select('productimagename','quantity','reserves.id as r_id','reserved_quantity','price','reserved_quantity','reserved_price')
        ->where('supplier_Id','=',$supplier_Id)
        ->where('reserves.order_refNo','=',$id)->get();*/

        $billData=DB::table('orders')
        ->join('reserves','reserves.order_Id','=','orders.id')
        ->join('suppliers','suppliers.supplierId','=','reserves.supplier_Id')
        ->join('productimages','productimages.id','=','orders.product_id')
        ->join('customers','customers.customerId','=','orders.customer_id')
        ->select('companyname','productimagename','quantity','reserves.id as r_id','reserved_quantity','price','reserved_quantity','reserved_price','farmName')
        ->where('supplier_Id','=',$supplier_Id)
        ->where('reserves.order_refNo','=',$id)->get();

        /*$supplierName=DB::select("select farmName from suppliers where supplierId='$supplier_Id'");

       
        $_SESSION["supplierName"] = $supplierName;*/


        view()->share('billData',$billData);

        if($request->has('download')){
            $pdf = PDF::loadView('supplierpages.bill');
            return $pdf->download('pdfview.pdf');
        }

        
        return view('supplierpages.bill');


        /*return view('supplierpages.bill')
        ->with('billData',$billData)
        ->with('totalprice',$totalprice);*/

    }

    public function downloadPdf(){
        $id=1;
       // $order=order::find($id);
       $order=order::all();

       $supplier_Id=Auth::user()->id;
        $billData=DB::table('orders')->join('reserves','reserves.order_Id','=','orders.id')->join('productimages','productimages.id','=','orders.product_id')->select('productimagename','image','quantity','reserves.id as r_id','reserved_quantity','order_Id','price','reserved_quantity','orders.created_at as o_created_at','reserved_price')->where('supplier_Id','=',$supplier_Id)->where('reserves.order_refNo','=',$id)->get();
     
        $totalprice=DB::select("SELECT SUM(reserved_price) AS totalprice FROM reserves WHERE order_refNo ='$id' and supplier_Id='$supplier_Id' ");
       
       

        $productName='smds';
        $des='sjdhs';

        //$details = ['title' => $productName, 'des' => $des];
       
        
        //$pdf = PDF::loadView('supplierpages.textDoc',$details);
        $pdf = PDF::loadView('supplierpages.bill',$billData)->with('billData',$billData)
        ->with('totalprice',$totalprice);
        return $pdf->download('My pdf.pdf');
        
    }

    //----------------------------------new piumi-----------------------------------------

    public function showproduct($id)
    {
        //
        $productData=product::find($id);
        $TproductData=product::orderBy('updated_at','desc')->get();
        $title='New-Product-View';
        return view('supplierpages.addproducts')->with('productData',$productData)->with('title',$title)->with('TproductData',$TproductData);
    }

    public function updateView($id){
        return view('supplierpages.view');
     
    }

    protected function editProduct($id)
    {
        $supplierId=Auth::user()->id;
     
        $supplierData=DB::select("select * from suppliers where supplierId = '$supplierId'");
        //$productData=DB::select("select * from products where supplierId = '$id'");
        $productData=product::find($id);
        //return $productData;
        // and id = '$pid'
       return view('supplierpages.view')->with('supplierData',$supplierData)->with('productData',$productData);
    }

    public function updateProduct(Request $request,$id)
    {
        $customerId= Auth::user()->id;
    
         $productData=DB::select("select * from products where supplierId = '$customerId' ");
    //and id = '$pid'
            
        /*$product_image_name=addslashes($_FILES['product_image']['product_image_name']);
        $product_image=addslashes($_FILES['product_image']['tmp_name']);
        $product_image=file_get_contents($product_image);
		$product_image=base64_encode($product_image);
        $productData->product_image=$product_image;*/
$image=addslashes($_FILES['image']['tmp_name']);
        

        if($image==null){
            $productName=$request->productName;
            $description=$request->description;
            
            $query=DB::update("update products set productName = '$productName'
                                            , description = '$description'
                                            where id = '$id'");

        }
        else{
            $productName=$request->productName;
            $description=$request->description;

            $image=addslashes($_FILES['image']['tmp_name']);
            $image=file_get_contents($image);
            $image=base64_encode($image);

            $product_image=$image;

            $query=DB::update("update products set productName = '$productName'
                                            , description = '$description'
                                            , product_image = '$product_image'
                                            where id = '$id'");
        }
        

         return redirect()->back()->with('message','Product Updated');
               
    }

    public function remove($id)
    {
        //$id=Auth::user()->id;
       // $supplierData=supplier::find($id);

        $DeleteData=product::find($id);
        $DeleteData->delete();

        $productData=product::all();
        $title='Product Delete';
       
          return redirect()->action('supplierController@addProductsView');
       // return view('supplierpages.addproducts')->with('productData',$productData)->with('title',$title)->with('supplierData',$supplierData);
        
    }

}
