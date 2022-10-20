<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\order;
use App\Models\user;


class DashboardController extends Controller
{
    public function index()
    {
        $data = product::all();
        $task = order::all();
        $latest= user::all();

        return view('admin.dashboard',compact('data','task','latest'));
    }
}
