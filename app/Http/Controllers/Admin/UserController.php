<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function table()
    {
        $data = User::paginate(3);
        return view('backend.admin.user.table',compact('data'));
    }
    public function detail($id)
{

    $data = User::find($id);
    return view('backend.admin.user.detail',compact('data'));
}

}
