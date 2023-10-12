<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use App\Mail\UserMail;
use Illuminate\Validation\Rule;
use App\Models\City;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = User::Status()->get();
            foreach ($data as $key => $value) {
                $data[$key]->action = '<a href="'.route("user.edit",$value->id).'" class="btn btn-success btn-sm">Edit</a> &nbsp;<a href="javascript:void(0)" class="btn btn-danger btn-sm delete" data-id="'.$value->id.'">Delete</a>';
                $data[$key]->fullname = $value->name.' '.$value->lastname;
            }

            $recordsTotal = $data->count();
            $json['data'] = $data;
            return json_encode($json);
        }
        return view('admin.users.user_list');
    }
    public function create()
    {
        $city = City::Active()->get();
        return view('admin.users.user_create',compact('city'));
    }
    public function store(Request $request)   {
        try{
             $validator   = Validator::make($request->all(), [
                'firstname' =>'required',
                'lastname'  =>'required',
                'email'     =>'required|email|unique:users',
                'phone'     =>'required',
                'gender'    =>'required',
                'address'   =>'required',
                'city'      =>'required',
                'hobbies'   =>'required',
                'image'     =>'required | mimes:jpeg,jpg,png',
                'user_type' =>'required',
                'status'    =>'required',
            ]);

            $fileName = null;
            if($request->file('image')){
                $file          = $request->file('image');
                $fileName      = $file->getClientOriginalName();
                $path          = public_path('images/');
                $file->move($path,$fileName);
            };
            $password        = Str::random(6);
            $user            = New User;
            $user->name      = $request->firstname;
            $user->lastname  = $request->lastname;
            $user->email     = $request->email;
            $user->phone     = $request->phone;
            $user->gender    = $request->gender;
            $user->address   = $request->address;
            $user->city      = $request->city;
            $user->hobbies   = implode(',',$request->hobbies);
            $user->image     = $fileName;
            $user->username  = $request->firstname.'_'.$request->lastname;
            $user->password  = Hash::make($password);
            $user->user_type = $request->user_type;
            $user->status    = $request->status;
            $user->save();

           /* $mailData = [
                'password'=> $password,
            ];
            $data =  Mail::to($request->email)->send(new UserMail($mailData));*/
            $arr_msg = array(
                    'msg'    => 'User created successfully',
                    'status' => 'success'
                );
                $request->session()->flash('success', $arr_msg);
                return redirect()->route('user.index');

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
   /* public function mail()
    {
        $mailData = [
            'password' => 'Mail from ItSolutionStuff.com',
            'username' => 'This is for testing email using smtp.'
        ];

        Mail::to($request->email)->send(new UserMail($mailData));

        dd("Email is sent successfully.");
    }*/
    public function edit(Request $request,$id){
        try{
            $user = User::where('id','=',$id)->first();
            $city = City::Active()->get();
            if(!empty($user)){
                return view('admin.users.user_create', [
                    'user'    => $user,
                    'city'    => $city,
                    'hobbies' => explode(',', $user->hobbies)

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
            $user      = User::find($request->id);
            $validator = Validator::make($request->all(), [
                'firstname' =>'required',
                'lastname'  =>'required',
                'email'     =>['required','email',Rule::unique('users')->ignore($user->id),],
                'phone'     =>'required',
                'gender'    =>'required',
                'address'   =>'required',
                'city'      =>'required',
                'hobbies'   =>'required',
                'image'     =>'required | mimes:jpeg,jpg,png ',
                'user_type' =>'required',
                'status'    =>'required',
            ]);
            $user = User::find($request->id);
            /*if($request->file('image')){
                $file     = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $path     = public_path('images/');
                $file->move($path,$user->image);
                    if(File::exists($path))
                    {
                        File::delete(public_path('images/'));
                    }
            }else{
                $fileName=!empty($user->image) ? ($user->image) : '';
            }*/

            $fileName = null;
            if($request->has('image')) {
                $image       = $request->file('image');
                $fileName    = $image->getClientOriginalName();
                $image->move(public_path('images/'), $fileName);
                $user->image = $request->file('image')->getClientOriginalName();
            }else{
                $fileName = !empty($user->image) ? ($user->image) : '';
            }
            $user->name     = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            $user->gender   = $request->gender;
            $user->address  = $request->address;
            $user->city     = $request->city;
            $user->hobbies  = implode(',',$request->hobbies);
            $user->image    = $fileName;
            $user->username = $request->firstname.'_'.$request->lastname;
            $user->user_type= $request->user_type;
            $user->status   = $request->status;
            $user->update();
            $arr_msg = array(
                'msg'    => 'User updated successfully',
                'status' => 'success'
            );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('user.index');

        }catch (ModelNotFoundException $exception) {
          return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function destroy(Request $request){
        $user = User::find($request->id);
        $user->status = '2';
        $data = $user->save();
        if(!empty($data)){
            $arr_msg = array(
                'msg'    => 'User deleted successfully',
                'status' => 'success'
            );
            $request->session()->flash('success', $arr_msg);
            return redirect()->route('user.index');
        }
        else{
            return redirect()->back();
        }
    }
    public function email(Request $request)
    {
        try{
            $user = User::where('email',$request->email);
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
    public function getFile(Request $request){
        $id       = $request->id;
        $user     = User::find($id);
        $filename = $user->image;
        $path     = public_path('images/'.$filename);
        return response()->download($path);
    }

   /* public function getCity(Request $request)
    {
        $user = City::get();
        return response()->json([
            'html' => view('admin.city.city_data')->render()
        ]);

    }*/
    public function getCity(Request $request){
        $user      = User::find($request->id);
        $city      = City::Active()->get();
        $city_html = '';
            //$city_html .= '<option value="0">Add New city</option>';
            //foreach ($city as $key => $value) {
                /*$city_html .= '<option value="'.$value->id.'"'.(isset($user) && ($user->city == $value->id) ? 'selected' : '').'>'.$value->city.'</option>';*/

                $city_html .= '<label class="col-lg-2 col-form-label">Add City:</label>';
                $city_html .= '<div class="col-lg-4">';
                $city_html .= '<input type="text" class="form-control m-input"
                               placeholder="Select city" name="city" ';
                $city_html .= '</div>';
                $city_html .= '<label class="col-lg-2 col-form-label">Status:</label>';
                $city_html .= '<div class="col-lg-4 status"> ';
                $city_html .= '<input type="radio" name="status" value="0">Active';
                $city_html .= '<input type="radio" name="status" value="1">Inactive';
                $city_html .= '</div>';

           // }
        // $city_html .= '</select>';
        return response()->json(array(
            'success'  => "User list success",
            'html'     => $city_html)
        );
    }

    public function saveAddress(Request $request)
    {
        //$id       = $request->id;
        //dd($request->all());
        $user           = User::find($request->id);
        $user->address  = $request->input('address');
        $user->name     = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email    = $request->input('email');
        $user->phone    = $request->input('phone');
        $user->save();
        return response()->json(['success' => true]);
    }
}

