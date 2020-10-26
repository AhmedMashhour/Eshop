<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerLogin extends Controller
{
    public function login(){
        return view('style.login');
    }

    public function dologin(){
        if(auth()->guard('customer')->attempt(['email'=>request('email'),'password'=>request('password')]))
        {

            return redirect('customer/home');

        }else
        {

            return back();
        }
}

    public function logout()
    {
        auth()->guard('customer')->logout();
        return redirect('customer/login');
    }
    public function register(){
        return view('style.register');
    }

    public function store()
    {
        $data=$this->validate(\request(),[
            'name'=>'required|string',
            'address'=>'required',
            'phone'=>'required',
            'visa'=>'required|numeric',
            'email'=>'required|email|unique:customers',
            'password'=>'required|min:6',
        ]);
        $data['password']=bcrypt(request('password'));
        \App\Customer::create($data);
        session()->flash('added','The New Customer Added Successfully');
        return redirect(url('customer/login'));
    }
}
