<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use \App\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $admin)
    {
        return $admin->render('admin.users.index',['titel'=>'User Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['title'=>'Create New User']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=$this->validate(\request(),[
            'name'=>'required',
            'level'=>'required|in:user,vendor,company',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ]);
        $data['password']=bcrypt(request('password'));
        \App\User::create($data);
        session()->flash('added','The New User Added Successfully');
        return redirect(aurl('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=\App\User::find($id);
        return view('admin.users.edit',['title'=>'Edit User Data','data'=>$data]);
    }
    public function multiDelete()
    {
        if (!request()->has('item'))
        {
            return back();
        }elseif ( is_array(request('item')))
        {
            \App\User::destroy(request('item'));

        }
        else
        {
            User::find(request('item'))->delete();
        }
        session()->flash('added','The Users Deleted Successfully');
        return redirect(aurl('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$this->validate(request(),[
            'name'=>'required',
            'level'=>'required|in:user,vendor,company',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'sometimes|nullable|min:6',
        ]);
        if(request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }
        \App\User::where('id',$id)->update($data);
        session()->flash('added','The User Data Updated Successfuly');
        return redirect(aurl('users'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('added','The Users Deleted Successfully');
        return redirect(aurl('users'));
    }
}
