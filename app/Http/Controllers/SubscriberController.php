<?php

namespace App\Http\Controllers;

use App\Models\subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function subscribe(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => "required|email|unique:subscribers,email"   
        ]);
        if($validator->fails()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $subscriber = new subscriber();
      
        if(Auth::check()){
            $subscriber->user_id = auth()->user()->id;
            $subscriber->email = $request->email;
        }else{
           $subscriber->email = $request->email;
        }
        $save = $subscriber->save();
        if($save){
            return response()->json([
                "status" => 1,
                "success" => "success"
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "success" => "failed"
            ]);
        }
     
    }
}
