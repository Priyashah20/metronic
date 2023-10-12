<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usertype;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsertypeController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Usertype::Status()->get();
            foreach ($data as $key => $value) {
                $data[$key]->action = '<a href="'.route("usertype.edit",$value->id).'" class="btn btn-success btn-sm">Edit</a> &nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-sm delete" data-id="'.$value->id.'">Delete</a>';
            }
            $recordsTotal = $data->count();
            $json['data'] = $data;
            return json_encode($json);
        }
        return view('admin.user_type.usertype_list');
    }

    public function create()
    {
        return view('admin.user_type.usertype_create');
    }

    public function store(Request $request){
        try{
             $validator   = Validator::make($request->all(), [
                'role'   =>'required',
                'status' =>'required',
            ]);
            $user           = New Usertype;
            $user->role     = $request->role;
            $user->status   = $request->status;
            $user->save();
            $arr_msg = array(
                    'msg'    => 'Role created successfully',
                    'status' => 'success'
                );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('usertype.index');

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function edit(Request $request,$id){
        try{
            $user = Usertype::where('id','=',$id)->first();
            if(!empty($user)){
                return view('admin.user_type.usertype_create', [
                    'user'    => $user,
                ]);
            }else{
                return redirect()->route('usertype.index');
            }

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function update(Request $request){
        try{

            $validator   = Validator::make($request->all(), [
                'role'   =>'required',
                'status' =>'required',
            ]);
            $user         = Usertype::find($request->id);
            $user->role   = $request->role;
            $user->status = $request->status;
            $user->update();
            $arr_msg = array(
                'msg'    => 'Role updated successfully',
                'status' => 'success'
            );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('usertype.index');

        }catch (ModelNotFoundException $exception) {
          return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function destroy(Request $request){
        $user = Usertype::find($request->id);
        $user->status = '2';
        $data = $user->save();
        if(!empty($data)){
            $arr_msg = array(
                'msg'    => 'Role deleted successfully',
                'status' => 'success'
            );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('usertype.index');
        }
        else{
            return redirect()->back();
        }
    }
    public function role(Request $request)
    {
        try{
            $user = Usertype::where('role',$request->role);
            if($request->id != ''){
               $user->where('id','!=',$request->id);
            }
            $data = $user->first();
            if(!empty($data)){
                return "false";
            }else{
                return "true";
            }
        }
        catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
