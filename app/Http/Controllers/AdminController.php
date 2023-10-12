<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignUp;
use Validator;
use Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Redirect;
use session;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use DB;
use Str;
use Carbon\Carbon;
use File;
use App\Rules\MatchOldPassword;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function adminLogin(Request $request)
    {
        try{
            $request->validate([
                'email'    => 'required',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');
            $arr_msg = array('msg' => __('Login successfully'),'status' => 'success');
            if (Auth::guard('web')->attempt($credentials)) {

                $user = SignUp::find(Auth::user()->id);
                //$user->logincounter = $user->logincounter+1;
                $user->logincounter++;
                $user->save();
                $request->session()->flash('success', $arr_msg);
                return redirect()->route('admin.dashboard');
            }else{
                $arr_msg = array('msg' => __('email or password invalid'),'status' => 'success');
                $request->session()->flash('error',$arr_msg);
                return redirect()->route('admin.index');
            }
        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $arr_msg = array('msg' => __('Logout successfully'),'status' => 'success');
        $request->session()->flash('success', $arr_msg);
        return redirect()->route('admin.index');
    }

    public function forgotPassword(Request $request)
    {
        try{
            $request->validate([
                'email' => 'required',
            ]);

            $myEmail = 'priya.shah@iflair.com';
            $mail    = [
                'email'  => $request->email,
            ];

            $user  = SignUp::where('email',$request->email)->first();
            if(!empty($user))
            {
                $token       = Str::random(6);
                $user->token = $token;
                $user->save();
                $url         = url('admin/resetpassword').'/'.$token;

                $arr_msg = array(
                    'msg'    => 'We have e-mailed your password reset link!',
                    'status' => 'success'
                );
                $res = Mail::to($request->email)->send(New WelcomeEmail($mail,$url));
                    $request->session()->flash('success', $arr_msg);
                    return redirect()->back();
            }else{
                $arr_msg = array(
                    'msg'    => 'User Not Found',
                    'status' => 'error'
                );
                return redirect()->back()->with('error',$arr_msg);
            }

        }catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function resetPassword(Request $request){
        $token = $request->token;
        return view('layout.resetpassword')->with(['token'=>$token]);
    }

    public function getResetPassword(Request $request)
    {
        $user = SignUp::where('token',$request->token)->first();
        if(isset($user)){
            $user->password = Hash::make($request->new_password);
            $result         = $user->save();
            if($result){
                $arr_msg = array(
                    'msg'    => 'Password Changed Successfully',
                    'status' => 'success'
                );
                $request->session()->flash('success', $arr_msg);
                return redirect()->route('admin.index');
            }else{
                $arr_msg = array(
                    'msg'    => 'Something wrong to reset password',
                    'status' => 'error'
                );
            }
        }else{
            return redirect()->back();
        }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function profile(Request $request)
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        try {
          $request->validate([
            'name'  =>'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $user = Auth::user();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $filename = NULL;
            if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
        }
      //  $user->image = $filename;
        $user->update();
        $arr_msg = array(
                    'msg'    => 'Profile Updated',
                    'status' => 'success'
                );
                $request->session()->flash('success', $arr_msg);
                return redirect()->route('admin.profile');
        }
        catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function changePassword(Request $request){
        if(!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            $arr_msg = array(
                'msg'    => 'Your current password does not matches with the password.',
                'status' => 'error'
            );
            return redirect()->back()->with("error",$arr_msg);
        }else{
            $user = Auth::user();
            $user->password = bcrypt($request->get('new_password'));
            $result = $user->update();
            if($result){
                $arr_msg = array(
                    'msg'    => 'Password Changed Successfully',
                    'status' => 'success'
                );
                $request->session()->flash('success', $arr_msg);
                return redirect()->route('admin.profile');
            }
        }
    }

}
