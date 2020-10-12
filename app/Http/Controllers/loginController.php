<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    //
    public function viewlogin(){
        return view('authpages.login');
      }

      protected function loginUser(Request $request){
       
        $credentials = $request->only('email', 'password');
        $email=$request->email;
        $password=$request->password;
        $category=$request->category;

        /*if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }*/

        if (Auth::attempt(['email' => $email, 'password' => $password, 'category' =>'Supplier'])) {
           //-----login supplier----
            return redirect()->action('supplierController@index');
        }

        if (Auth::attempt(['email' => $email, 'password' => $password, 'category' =>'Customer'])) {
            //-----login customer----
            return redirect()->action('customerController@index');     
        }

        if (Auth::attempt(['email' => $email, 'password' => $password, 'category' =>'Admin'])) {
            //-----login admin----
           return redirect()->action('adminController@dashboard');
        }

        else {
            return redirect('/login')->with('error','Login Failed..Invalid User name or Password'); 
         }

      }
}
