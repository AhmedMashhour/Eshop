<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Admin;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Auth;
use DB;
use Carbon\Carbon;
use App\Mail\AdminResetPassword ;
use Mail;
class AdminAuth extends Controller
{
    //
    public function login()
    {
    	return view('admin.login');
    }

    public function dologin()
    {
    	if(admin()->attempt(['email'=>request('email'),'password'=>request('password')]))
    	{

    		return redirect('admin');
    	}else
    	{

    		return back();
    	}
    }
    public function logout()
    {
    	auth()->guard('admin')->logout();
    	return redirect('admin/login');
    }
    public function forgot_password()
    {
        return view('admin.forgot_password');
    }
    public function forgot_password_reset()
    {
        $admin= Admin::where('email',request('email'))->first();

        if(!empty($admin))
        {
            $token=app('auth.password.broker')->createToken($admin);
            $data=DB::table('password_resets')->insert([
                'email'=>$admin->email,
                "token"=>$token,
                "created_at"=>Carbon::now()
            ]);
             Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
             session()->flash('success','the mail has been sent');
             return back();
        }
        else
        {
            return back();
        }
    }
    public function reset_password($token)
    {
        $check_token=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()
        ->subHours(2))->first();
         ($check_token);
        if(!empty($check_token))
        {
            return view('admin.reset_password',['data'=>$check_token]);
        }
        else
        {
            return redirect('admin/forgot');
        }
    }
    public function reset_password_final($token)
    {
        $this->validate(request(),[
            'password'=>'required',
            'confirm'=>'required',

        ]);
        $check_token=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()
        ->subHours(2))->first();
        if(!empty($check_token))
        {
           // dd($check_token);
            $admin=Admin::where('email',$check_token->email)->update([
                'email'=>$check_token->email,
                'password'=>bcrypt(request('password'))
            ]);
            DB::table('password_resets')->where('email',request('email'))->delete();
            admin()->attempt(['email'=>request('email'),'password'=>request('password')]);
            return redirect(aurl());
        }
        else
        {
            return redirect(aurl('forgot'));
        }
    }
}
