<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MillDetail;

class MillDetailsController extends Controller
{
    //
    public function submit(Request $request)
    {
      $this->validate($request,[
        'millname'=>'required',
        'address'=>'required',
        'gstno'=> 'required',
        'pono'=> 'required'
      ]);
      //Save data to Database
      $milldetails = new MillDetail;
      $milldetails->millname=$request->input('millname');
      $milldetails->address=$request->input('address');
      $milldetails->gstno=$request->input('gstno');
      $milldetails->pono=$request->input('pono');
      $milldetails->email=$request->input('email');
      $milldetails->price=$request->input('price');
      $milldetails->contact=$request->input('contact');
      $milldetails->contactno=$request->input('contactno');
      $milldetails->save();

      //redirect
      return redirect('/');
    }
}
