<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\MillDetail;
use App\Product_details;

class BillingOrderController extends Controller
{
    //
    public function getData()
    {
      $millnames = MillDetail::get()->pluck('millname','id')->toArray();
      $product_details = Product_details::get()->pluck('product_name','id')->toArray();
      return view('Billing',compact('millnames'),compact('product_details'));
    }
    public function getMillDetails(Request $request)
    {
          $details = MillDetail::where('id', $request->mill_id)->first();
          return $details;
    }
    public function getHSNDetails(Request $request)
    {
          $details = Product_details::where('id', $request->product_id)->first();
          return $details;
    }
    public function submit(Request $request)
    {
      foreach ($request->except('_token') as $data => $value)
      {
          $valids[$data] = "required";
      }

      $request->validate($valids);


      //redirect
      return '123';
    }
}
