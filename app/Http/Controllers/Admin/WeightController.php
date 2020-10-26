<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\WeightDatatables;
use Illuminate\Http\Request;
use \App\Weight;
use Illuminate\Support\Facades\Storage;

class WeightController extends Controller
{
    /**235648
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WeightDatatables $weight)
    {
        return $weight->render('admin.weights.index',['title'=>'Weights Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.weights.create',['title'=>'Create New Weight']);
    }


    public function store()
    {

        $data=$this->validate(\request(),[
            'name'=>'required',

        ]);

        \App\Weight::create($data);
        session()->flash('added','The New Weight Added Successfully');
        return redirect(aurl('weights'));
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

        $weight=\App\Weight::find($id);
        return view('admin.weights.edit',['title'=>'Edit Weight Data','weight'=>$weight]);
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
                $c=Weight::find($id);
                $c->delete();
            }

        }
        else
        {
            $c=Weight::find(\request('item'));
            $c->delete();
        }
        session()->flash('added','The Weights Deleted Successfully');
        return redirect(aurl('weights'));
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

        ]);

        \App\Weight::where('id',$id)->update($data);
        session()->flash('added','The Weight Updated Successfully');
        return redirect(aurl('weights'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Weight::find($id);
        $c->delete();
        session()->flash('added','The Weight Deleted Successfully');
        return redirect(aurl('weights'));
    }
}
