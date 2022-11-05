<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Auth;

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
public function profile(){

    $user = Auth::user();
    // $user  =  Auth::routes(['verify' => true]);


    // dd($user);

    return view('admin.profile',compact('user'));
}
public function update(Request $request,$id)
{
    $request->validate([
        'password' => 'nullable'


    ]);
                  $user = User::find($id);
                    $user->name=$request->name;
                   $user->email=$request->email;
                  $user->password=bcrypt($request->password);
                  $user->Save();
                 return redirect()->route('admin.user.table');

}


}
