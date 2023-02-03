<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function table(){
        $data = order::with('user','product')->get();
        $response = [
            "success"=>true,
            "data"=>$data,
            "message"=>" data fetch Successfully !"
        ];
        return response()->json( $response ,201);
    }
    public function detail($id){
        $data=Order::find($id);
        $response = [
            "success"=>true,
            "data"=>$data,
            "message"=>" detail fetch Successfully !"
        ];
        return response()->json( $response ,201);}
}
