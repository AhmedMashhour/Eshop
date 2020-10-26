<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\AdminDatatable;
use Illuminate\Http\Request;
use \App\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $admin)
    {
        return $admin->render('admin.admins.index',['titel'=>'Admin Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create',['title'=>'Create New Admin']);
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
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6',
        ]);
        $data['password']=bcrypt(request('password'));
        \App\Admin::create($data);
        session()->flash('added','The New Admin Added Successfully');
        return redirect(aurl('admin'));
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
        $admin=\App\Admin::find($id);
       return view('admin.admins.edit',['title'=>'Edit Admin Data','data'=>$admin]);
    }
    public function multiDelete()
    {
        if (!request()->has('item'))
        {
           return back();
        }elseif ( is_array(request('item')))
        {
            \App\Admin::destroy(request('item'));

        }
        else
        {
            Admin::find(request('item'))->delete();
        }
        session()->flash('added','The Admins Deleted Successfully');
        return redirect(aurl('admin'));
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
            'email'=>'required|email|unique:admins,email,'.$id,
            'password'=>'sometimes|nullable|min:6',
        ]);
        if(request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }
        \App\Admin::where('id',$id)->update($data);
        session()->flash('added','The Admin Data Updated Successfuly');
        return redirect(aurl('admin'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Admin::find($id)->delete();
        session()->flash('added','The Admins Deleted Successfully');
        return redirect(aurl('admin'));
    }
}
