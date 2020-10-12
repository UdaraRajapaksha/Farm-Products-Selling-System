<?php
   
namespace App\Http\Controllers;
   
use App\product;
use Illuminate\Http\Request;
use Redirect;
use PDF;
//use \PDF;

   
class NotesController extends Controller
{

    public function generatePDF(){
        $id=3;
        $product=product::find($id);

        $productName=$product->productName;
        $des=$product->description;
        
       // $details = ['title' => 'test'];
       $details = ['title' => $productName, 'des' => $des];
        //$pdf = PDF::loadView('textDoc',$details);
        $pdf = PDF::loadView('textDoc',$details);
        return $pdf->download('My pdf.pdf');
        //return view('publicpages.home');
    }
    
 
}