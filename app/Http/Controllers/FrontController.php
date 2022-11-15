<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;

class FrontController extends Controller
{
    public function index()
    {
        $data = product::all();
        return view('welcome',compact('data'));
    }
    public function detail(){

        return view ('fronted.signup');

     }

     public function store(Request $request)
{
                //   validation
                $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'password'=>'nullable',
                    'address'=>'required',

                ]);
                   $user = new user();
                   $user->name=$request->name;
                   $user->email=$request->email;
                   $user->password=bcrypt($request->password);
                   $user->Save();

                 return redirect()->route('signup')->with('msg','Registered Successfully');

}
public function cart(){

    return view ('fronted.cart');

 }
 public function signin(Request $request){

    return view ('fronted.signin');

 }

public function signin_store(LoginRequest $request)
{
    $request->authenticate();

    $request->session()->regenerate();

    return redirect()->route('index');
}
public function profile(){

    $user = Auth::user();
    return view ('fronted.profile',compact('user'));

 }
 public function profile_store(Request $request,$id)
{
    $request->validate([
        'password' => 'nullable'


    ]);
                  $user = User::find($id);
                    $user->name=$request->name;
                   $user->email=$request->email;
                  $user->password=bcrypt($request->password);
                  $user->Save();
                 return redirect()->route('profile')->with('msg',"Profile Updated Successfully");

}



}
