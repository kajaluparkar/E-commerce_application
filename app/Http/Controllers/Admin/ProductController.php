<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        return view('backend.admin.product.create');
    }

    public function store(Request $request)
    {
                //   validation
                $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'description'=>'required',
                    'image'=>'required',

                ]);


        $data = new Product();
        $data->name=$request->name;
        $data->price=$request->price;
        $data->description=$request->description;

        if($request->hasFile('image')){
            $file = $request->image;
            $extension =$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads',$filename);
            $data->image=$filename;

            }
        $data->Save();
         return redirect()->route('admin.product.table')->with('msg' , "Data Added Successfully !");
        }

    public function table()
    {
        $data = product::paginate(3);
        return view('backend.admin.product.table',compact('data'));
    }
    public function edit($id)
    {
        $data = product::find($id);
        return view('backend.admin.product.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
                        //   validation
                        $request->validate([
                            'name' => 'required',
                            'price' => 'required',
                            'description'=>'required',
                            'image'=>'nullable',

                        ]);



        $data = Product::find($id);
        $data->name=$request->name;
        $data->price=$request->price;
        $data->description=$request->description;

        if($request->hasFile('image')){
            $file = $request->image;
            $extension =$file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads',$filename);
            $data->image=$filename;

            }
        $data->Save();
         return redirect()->route('admin.product.table')->with('msg' , "Data Updated Successfully !");
        }
        public function delete($id)
        {
            $data = product::find($id);
            $data->delete();
            return redirect()->route('admin.product.table')->with('msg' , "Data Deleted Successfully !");
        }

        public function detail($id)
        {

            $data = product::find($id);
            return view('backend.admin.product.detail',compact('data'));
        }


}
