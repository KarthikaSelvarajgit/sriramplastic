<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function submit(Request $request)
    {
      $this->validate($request,[
        'name'=>'required',
        'email'=>'required',
        'message'=> 'required'
      ]);
      //Save data to Database
      $message = new Message;
      $message->name=$request->input('name');
      $message->email=$request->input('email');
      $message->message=$request->input('message');
      $message->save();

      //redirect
      return redirect('/');
    }
}
