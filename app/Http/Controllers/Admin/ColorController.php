<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\ColorsDatatables;
use App\Http\Controllers\controller;
use App\DataTables\ColorsDatatable;
use Illuminate\Http\Request;
use \App\Color;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ColorsDatatables $color)
    {
        return $color->render('admin.colors.index',['title'=>'Colors Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.colors.create',['title'=>'Create New Color']);
    }


    public function store()
    {

        $data=$this->validate(\request(),[
            'name'=>'required',
            'color'=>'required|string',
        ]);

        \App\Color::create($data);
        session()->flash('added','The New Color Added Successfully');
        return redirect(aurl('colors'));
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

        $color=\App\Color::find($id);
        return view('admin.colors.edit',['title'=>'Edit Color Data','color'=>$color]);
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
                $c=Color::find($id);
                $c->delete();
            }

        }
        else
        {
            $c=Color::find(\request('item'));
            $c->delete();
        }
        session()->flash('added','The Colors Deleted Successfully');
        return redirect(aurl('colors'));
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
            'color'=>'required|string',
        ]);

        \App\Color::where('id',$id)->update($data);
        session()->flash('added','The Color Updated Successfully');
        return redirect(aurl('colors'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Color::find($id);
        $c->delete();
        session()->flash('added','The Color Deleted Successfully');
        return redirect(aurl('colors'));
    }
}
