<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;
class AuthController extends Controller
{
    Public function signup(Request $request){
        //  validation
        $validator = Validator::make($request->all(),[
            'name' =>'required',
            'email' => 'required|email' ,
            'password' => 'required',
            'c_password' => 'required|same:password',
            'roles'=>"required"
        ]);

        if($validator->fails()){
            $response =[
                'success'=> false,
                'message' => $validator->errors()
            ];
            return response()->json($response,400);
        }

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [

            'success' => true,
            'data' =>$success,
            'message' => 'User register Successfully'
        ];
         return response()->json($response,200);
        }
        public function signin(Request $request){
            if(Auth::attempt(['email'=>$request->email,'password' =>$request->password])){
                $user = Auth::user();
                $success['token'] = $user->createToken('MyApp')->plainTextToken;
                $success['name'] = $user->name;

                $response = [

                    'success' => true,
                    'data' =>$success,
                    'message' => 'User login  Successfully'
                ];
                return response()->json($response,200);


            }
        }

    }
