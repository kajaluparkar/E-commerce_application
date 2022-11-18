<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use Gloudemans\Shoppingcart\Facades\Cart;


class FrontController extends Controller
{

    public function cart_store(Request $request)
    {
      Cart::add($request->id, $request->name, 1, 9.99, 550);

      return redirect()->route('index');
    }

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
                   $user->address=$request->address;

                   $user->Save();

                 return redirect()->route('signup')->with('msg','Registered Successfully');

}
public function cart(){
    $data = Cart::instance('default')->content();
    // dd($data);
    return view ('fronted.cart',compact('data'));

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

public function destroy(){
    Cart::destroy();
    return redirect()->route('index');
}

public function remove($rowId){

   Cart::remove($rowId);

   return redirect()->route('cart');


}
public function checkout(){

    $data = Cart::instance('default')->content();

    return view('fronted.checkout',compact('data'));
}
 public function checkout_store(Request $request,$id){


    $data = User::find($id);
    $data->name=$request->name;
   $data->email=$request->email;
  $data->password=bcrypt($request->password);
  $data->city=$request->city;
  $data->provance=$request->provance;
  $data->postal=$request->postal;
  $data->phone=$request->phone;


  $data->Save();
 return redirect()->route('index')->with('msg',"Your order is Successfully");


 }

}
