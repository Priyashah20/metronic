<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CustomersController extends Controller
{
    public function index(Request $request){

        if($request->ajax())
        {
            $data = Customers::Status()->get();
            foreach ($data as $key => $value) {
                $data[$key]->action = '<a href="'.route("customers.edit",$value->id).'" class="btn btn-success btn-sm">Edit</a> &nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-sm delete" data-id="'.$value->id.'">Delete</a>';
            }
            $recordsTotal = $data->count();
            $json['data'] = $data;
            return json_encode($json);
        }
        return view('admin.customers.customers_list');
    }

    public function create()
    {
        return view('admin.customers.customers_create');
    }
    public function store(Request $request){
        try{
             $validator   = Validator::make($request->all(), [
                'firstname'           => 'required',
                'lastname'            => 'required',
                'surname'             => 'required',
                'email'               => 'required',
                'mobile'              => 'required',
                'date_of_birth'       => 'required',
                'date_of_anniversary' => 'required',
            ]);
            $user                      = New Customers;
            $user->firstname           = $request->firstname;
            $user->lastname            = $request->lastname;
            $user->surname             = $request->surname;
            $user->email               = $request->email;
            $user->mobile              = $request->mobile;
            $user->date_of_birth       = $request->date_of_birth;
            $user->date_of_anniversary = $request->date_of_anniversary;
            $user->save();
            $arr_msg = array(
                    'msg'    => 'Customers created successfully',
                    'status' => 'success'
                );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('customers.index');

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function edit(Request $request,$id)
    {
        try{
            $user = Customers::where('id','=',$id)->first();
            if(!empty($user)){
                return view('admin.customers.customers_create', [
                    'user'    => $user,
                ]);
            }else{
                return redirect()->route('customers.index');
            }

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function update(Request $request){
         try{

            $validator   = Validator::make($request->all(), [
                'firstname'           =>'required',
                'lastname'            =>'required',
                'surname'             => 'required',
                'email'               => 'required',
                'mobile'              => 'required',
                'date_of_birth'       => 'required',
                'date_of_anniversary' => 'required',

            ]);
            $user                      = Customers::find($request->id);
            $user->firstname           = $request->firstname;
            $user->lastname            = $request->lastname;
            $user->surname             = $request->surname;
            $user->email               = $request->email;
            $user->mobile              = $request->mobile;
            $user->date_of_birth       = $request->date_of_birth;
            $user->date_of_anniversary = $request->date_of_anniversary;
            $user->update();
            $arr_msg = array(
                'msg'    => 'Customers updated successfully',
                'status' => 'success'
            );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('customers.index');

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function destroy(Request $request){
        $user = Customers::find($request->id);
        $user->status = '2';
        $data = $user->save();
        if(!empty($data)){
            $arr_msg = array(
                'msg'    => 'customers deleted successfully',
                'status' => 'success'
            );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('customers.index');
        }
        else{
            return redirect()->back();
        }
    }

}
