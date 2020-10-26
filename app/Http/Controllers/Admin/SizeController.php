<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\SizesDatatables;
use Illuminate\Http\Request;
use \App\Size;
use Illuminate\Support\Facades\Storage;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SizesDatatables $size)
    {
        return $size->render('admin.sizes.index',['title'=>'Size Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.sizes.create',['title'=>'Create New Size']);
    }


    public function store()
    {

        $data=$this->validate(\request(),[
            'name'=>'required',
            'department_id'=>'required|numeric',
            'is_public'=>'required|in:yes,no',

        ]);

        \App\Size::create($data);
        session()->flash('added','The New Size Added Successfully');
        return redirect(aurl('sizes'));
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

        $size=\App\Size::find($id);
        return view('admin.sizes.edit',['title'=>'Edit Size Data','size'=>$size]);
    }
    public function multiDelete()
    {
        if (!request()->has('item'))
        {
            return back();
        }elseif ( is_array(request('item')))
        {
            foreach (\request('item') as $id)
            {
                $c=Size::find($id);
                $c->delete();
            }

        }
        else
        {
            $c=Size::find(\request('item'));
            $c->delete();
        }
        session()->flash('added','The Size Deleted Successfully');
        return redirect(aurl('sizes'));
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
            'name'=>'required',
            'department_id'=>'required|numeric',
            'is_public'=>'required|in:yes,no',

        ]);

        \App\Size::where('id',$id)->update($data);
        session()->flash('added','The Size Updated Successfully');
        return redirect(aurl('sizes'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Size::find($id);
        $c->delete();
        session()->flash('added','The Size Deleted Successfully');
        return redirect(aurl('sizes'));
    }
}
