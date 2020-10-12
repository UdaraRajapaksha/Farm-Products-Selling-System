<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\advertisement;

class advertismentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

     
    public function index()
    {
        //
        
        //$adData=advertisement::all();
        $title='Admin-Advertisements';
        $adData=advertisement::orderBy('updated_at','desc')->get();
       // return view('adminpages.advertisements.index')->with('adData',$adData);
        return view('adminpages.advertisements.index')->with('adData',$adData)->with('title',$title);
        //return view::make
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //store
    public function store(Request $request)
    {
       /* request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);*/
        $this->validate($request,[
            'image' => '
            required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        //
        $advertisementData=new advertisement;
        $advertisementData->advertiserName=$request->advertiserName;
        $advertisementData->organization_name=$request->organization_name;
        $advertisementData->phoneNo=$request->phoneNo;

        //image
        $name=addslashes($_FILES['image']['name']);
        //$advertisementData->imageName=$name;

        $image=addslashes($_FILES['image']['tmp_name']);
        $image=file_get_contents($image);
		$image=base64_encode($image);

        $advertisementData->image=$image;

        //**** */

        $advertisementData->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $adData=advertisement::find($id);
        $TadData=advertisement::orderBy('updated_at','desc')->get();
        $title='Admin-Advertisements-View';
        return view('adminpages.advertisements.view')->with('adData',$adData)->with('title',$title)->with('TadData',$TadData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => '
            required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        //
        $updateData=advertisement::find($id);
        //return $updateData;
        //$updateData->phoneNo=$request->input('phoneNo');
        
        //image
        $name=addslashes($_FILES['image']['name']);
        //$updateData->imageName=$name;

        $image=addslashes($_FILES['image']['tmp_name']);
        $image=file_get_contents($image);
		$image=base64_encode($image);

        $updateData->image=$image;

        //**** */



        $updateData->save();
        //return back
        /*$adData=advertisement::find($id);
        return view('adminpages.advertisements.view')->with('adData',$adData);*/
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        //
        $DeleteData=advertisement::find($id);
        //return $adData;
        $DeleteData->delete();
        $adData=advertisement::all();
        $title='Admin-Advertisements';
        return view('adminpages.advertisements.index')->with('adData',$adData)->with('title',$title);

    }
}
