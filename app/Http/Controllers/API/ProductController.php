<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //

    public function index()
    {
        # code...
        $products = Product::all();
        $response = [
            "success"=>true,
            "data"=>$products,
            "message"=>"Data Fected Successfully !"
        ];

        return response()->json( $response ,201);

    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',

        ]);

        $data=new Product();
        $data->name=$request->name;
        $data->price=$request->price;
       $data->description=$request->description;

       if($request->hasFile('image'))
            {
                $file=$request->image;
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('uploads',$filename);
                $data->image=$filename;
            }
       $data->save();
       $response = [
        "success"=>true,
        "data"=>$data,
        "message"=>"Data Added Successfully !"
    ];

    return response()->json( $response ,201);

}
public function table(){
   $data=Product::all();
   $response = [
    "success"=>true,
    "data"=>$data,
    "message"=>"Data Added Successfully !"
];
   return response()->json( $response ,201);
}

public function update(Request $request,$id){

    $validated = Validator::make($request->all(),[
        'name'=>'required',
        'price' => 'required',
        'description' => 'required',
    ]);
    if($validated->fails()){
        return response()->json(['status'=>400,'message'=>$validated->errors()]);
    }
    $data=Product::find($id);
    $data->name=$request->name;
    $data->price=$request->price;
    $data->description=$request->description;

    if($request->hasFile('image'))
            {
                $file=$request->image;
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('uploads',$filename);
                $data->image=$filename;
            }
    $data->save();
    $response = [
        "success"=>true,
        "data"=>$data,
        "message"=>"Data Updated Successfully !"
    ];
       return response()->json( $response ,201);
}

public function delete($id){
    $data=Product::find($id);
    $data->delete();
    $response = [
        "success"=>true,
        "data"=>$data,
        "message"=>"Data Deleted Successfully !"
    ];
       return response()->json( $response ,201);
}
public function detail($id){
    $data=Product::find($id);
    $response = [
        "success"=>true,
        "data"=>$data,
        "message"=>" details fetch Successfully !"
    ];
    return response()->json( $response ,201);

}


}
