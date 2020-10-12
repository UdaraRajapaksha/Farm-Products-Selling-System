<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\supplier;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function posts()
    {
     $posts = supplier::all();
     return view('posts',compact('posts'));
    }
  
   public function show($id)
    {
     $post = supplier::find($id);
     return view('postsShow',compact('post'));
    }
  
   public function postPost(Request $request)
    {
   //  request()->validate(['rate' => 'required']);
     $post = supplier::find($request->id);
     $rating = new \willvincent\Rateable\Rating;
     $rating->rating = $request->rate;
     $rating->user_id = auth()->user()->id;
     $post->ratings()->save($rating);
     return redirect()->back();
    }
}
