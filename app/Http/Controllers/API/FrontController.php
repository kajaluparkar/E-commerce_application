<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Product;
use Validator;
use App\Models\User;
use Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Order;

class FrontController extends Controller
{
    public function index()
    {
        $data = product::all();
        return view('welcome', compact('data'));
        $response = [
            "success" => true,
            "data" => $data,
            "message" => " details fetch Successfully !"
        ];
        return response()->json($response, 201);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->roles = 2;
        $data->address = $request->address;
        $data->save();

        $response = [
            "success" => true,
            "data" => $data,
            "message" => " data Stored Successfully !"
        ];
        return response()->json($response, 201);
    }



 public function signin(LoginRequest $request)
 {
     //    validate

     $rules = [
         'email'    => 'required|email',
         'password' => 'required',
     ];

     $request->validate($rules);
     // check if exists
     $data = request(['email', 'password']);
     $userExist = User::where('email',$data['email'])->count();

    }

public function profile(){
    $user=Auth::User();
    return view('frontend.signin-profile',compact('user'));
}


    public function profile_update(Request $request, $id)
    {
        $request->validate(['password' => 'nullable']);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $response = [
            "success" => true,
            "data" => $user,
            "message" => " data Stored Successfully !"
        ];
    }
}
