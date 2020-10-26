<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\CitiesDatatables;
use Illuminate\Http\Request;
use \App\Department;

use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $department=Department::all();
        return view('admin.departments.index',['title'=>' Departments','department'=>$department]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department=Department::all();
        return view('admin.departments.create',['title'=>'Create New Department','department'=>$department]);
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
            'department_name'=>'required',
            'parent_id'=>'sometimes|nullable|numeric',
            'icon'=>'sometimes|nullable|'.validate_images(),
            'description'=>'sometimes|nullable',
            'keyword'=>'sometimes|nullable',


        ]);
        if (\request()->hasFile('icon'))
        {

            $data['icon']=up()->upload([
                //'new_name'=>'',
                'file'=>'icon',
                'path'=>'departments',
                'upload_type'=>'single',
                'delete_file'=>'',
            ]);
        }
        \App\Department::create($data);
        session()->flash('added','The New Department Added Successfully');
        return redirect(aurl('departments'));
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
        $department=\App\Department::find($id);

        return view('admin.departments.edit',['title'=>'Edit Department Data','department'=>$department]);
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
        $data=$this->validate(\request(),[
            'department_name'=>'required',
            'parent_id'=>'sometimes|nullable|numeric',
            'icon'=>'sometimes|nullable|'.validate_images(),
            'description'=>'sometimes|nullable',
            'keyword'=>'sometimes|nullable',


        ]);
        if (\request()->hasFile('icon'))
        {

            $data['icon']=up()->upload([
                //'new_name'=>'',
                'file'=>'icon',
                'path'=>'departments',
                'upload_type'=>'single',
                'delete_file'=>Department::find($id)->icon,
            ]);
        }

        \App\Department::where('id',$id)->update($data);
        session()->flash('added','The Department Updated Successfully');
        return redirect(aurl('departments'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public static function delete_parent($id)
    {
        $deps=Department::where('parent_id',$id)->get();
        foreach ($deps as $dep)
        {
            self::delete_parent($dep->id);
            if(!empty($dep->icon))
            {
                Storage::has($dep->icon)?Storage::delete($dep->icon):'';
            }
            Department::find($dep->id)->delete();
        }
    }
    public function destroy($id)
    {
      self::delete_parent($id);
     $dep= Department::find($id);
        if(!empty($dep->icon))
        {
            Storage::has($dep->icon)?Storage::delete($dep->icon):'';
        }
        $dep->delete();
        session()->flash('added','The Department Deleted Successfully');
        return redirect(aurl('departments'));
    }
}
