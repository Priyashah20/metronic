<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Product::get();

            foreach ($data as $key => $value) {
                $data[$key]->action = '<a href="'.route("products.edit",$value->id).'" class="btn btn-success btn-sm">Edit</a> &nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-sm delete" data-id="'.$value->id.'">Delete</a>';
            }
            $recordsTotal = $data->count();
            $json['data'] = $data;
            return json_encode($json);
        }


        return view('admin.products.product_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.products.product_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
             $validator   = Validator::make($request->all(),[
                'title'    => 'required',
                'category' =>'required',
                'price'    => 'required',
                'color'    => 'required',
                'quantity' => 'required',
            ]);
            $user           = New Product;
            $user->title    = $request->title;
            $user->category = $request->category;
            $user->price    = $request->price;
            $user->color    = $request->color;
            $user->quantity = $request->quantity;
            $user->save();
            $arr_msg = array(
                    'msg'    => 'Producs created successfully',
                    'status' => 'success'
                );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('products.index');

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {

        try{
            $user = Product::where('id','=',$id)->first();
            if(!empty($user)){
                return view('admin.products.product_create', [
                    'user'    => $user,
                ]);
            }else{
                return redirect()->route('products.index');
            }

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try{
             $validator   = Validator::make($request->all(),[
                'title'    => 'required',
                'category' =>'required',
                'price'    => 'required',
                'color'    => 'required',
                'quantity' => 'required',
            ]);
            $user           = Product::find($request->id);
            $user->title    = $request->title;
            $user->category = $request->category;
            $user->price    = $request->price;
            $user->color    = $request->color;
            $user->quantity = $request->quantity;
            $user->save();
            $arr_msg = array(
                    'msg'    => 'Producs updated successfully',
                    'status' => 'success'
                );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('products.index');

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
