<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use Auth;

class commentsController extends Controller
{
    //


    public function store(Request $request)
    {
        $this->validate($request, [
            'comment_body' => 'required'

        ]);
        
            $customerId=Auth::user()->id;

            if($customerId==null){
                return "please login";
            }

        $cus = new comment;
        $cus->comment_body = $request->input('comment_body');
        $cus->supplierId = $request-> input('supplierId');

        $cus->customer_Id = $customerId;

        /* $cus->supplier_Id = auth()->user()->id; */
        $cus->save();
        return back()->with('success' ,'Commented');


    }


}
