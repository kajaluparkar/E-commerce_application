<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class UserController extends Controller
{
    public function table(){
        $data = User::get();
        $response = [
            "success"=>true,
            "data"=>$data,
            "message"=>"Data Added Successfully !"
        ];
           return response()->json( $response ,201);
        }

        public function detail($id){
            $data=User::find($id);
            $response = [
                "success"=>true,
                "data"=>$data,
                "message"=>"Data fetch Successfully !"
            ];
               return response()->json( $response ,201);
            }

            public function profile(){
                $user=Auth::user();
                $response = [
                    "success"=>true,
                    "data"=>$user,
                    "message"=>"Data fetch Successfully !"
                ];
                   return response()->json( $response ,201);
                }

                public function update(Request $request,$id){

                    $request->validate(['password'=>'nullable']);
                    $user=User::find($id);
                    $user->name=$request->name;
                    $user->email=$request->email;
                    $user->password=bcrypt($request->password);
                    $user->save();

                    $response = [
                        "success"=>true,
                        "data"=>$user,
                        "message"=>"Data fetch Successfully !"
                    ];
                       return response()->json( $response ,201);
                    }

            }



