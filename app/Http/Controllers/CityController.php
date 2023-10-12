<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CityController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = City::Status()->get();
            foreach ($data as $key => $value) {
                $data[$key]->action = '<a href="'.route("city.edit",$value->id).'" class="btn btn-success btn-sm">Edit</a> &nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-sm delete" data-id="'.$value->id.'">Delete</a>';
            }
            $recordsTotal = $data->count();
            $json['data'] = $data;
            return json_encode($json);
        }
        return view('admin.city.city_list');
    }

    public function create()
    {
        return view('admin.city.city_create');
    }
    public function store(Request $request)   {
        try{
             $validator   = Validator::make($request->all(), [
                'city'   =>'required',
                'status' =>'required',
            ]);
            $user           = New City;
            $user->city     = $request->city;
            $user->status   = $request->status;
            $user->save();
            $arr_msg = array(
                    'msg'    => 'City created successfully',
                    'status' => 'success'
                );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('city.index');

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function edit(Request $request,$id){
        try{
            $user = City::where('id','=',$id)->first();
            if(!empty($user)){
                return view('admin.city.city_create', [
                    'user'    => $user,
                ]);
            }else{
                return redirect()->route('user.index');
            }

        }catch (ModelNotFoundException $exception) {
          return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function update(Request $request){
        try{

            $validator   = Validator::make($request->all(), [
                'city'   =>'required',
                'status' =>'required',
            ]);
            $user         = City::find($request->id);
            $user->city   = $request->city;
            $user->status = $request->status;
            $user->update();
            $arr_msg = array(
                'msg'    => 'City updated successfully',
                'status' => 'success'
            );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('city.index');

        }catch (ModelNotFoundException $exception) {
          return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function destroy(Request $request){
        $user         = City::find($request->id);
        $user->status = '2';
        $data         = $user->save();
        if(!empty($data)){
            $arr_msg = array(
                'msg'    => 'City deleted successfully',
                'status' => 'success'
            );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('city.index');
        }
        else{
            return redirect()->back();
        }
    }
    public function city(Request $request)
    {
        try{
            $user = City::where('city',$request->city);
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
