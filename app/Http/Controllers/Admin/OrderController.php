<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function table()
    {

        $data = Order::with(['user','product'])->paginate(3);
        // dd($data);
        return view('backend.admin.order.table',compact('data'));

}
public function detail($id)
{

    $data = order::find($id);
    return view('backend.admin.order.detail',compact('data'));
}

}
