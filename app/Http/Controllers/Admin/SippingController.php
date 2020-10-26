<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\ShippingDatatables;
use Illuminate\Http\Request;
use \App\Shipping;
use Illuminate\Support\Facades\Storage;

class SippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShippingDatatables $shipping)
    {
        return $shipping->render('admin.shippings.index',['title'=>'Shippings Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=\App\User::all();
        return view('admin.shippings.create',['title'=>'Create New Shipping','users'=>$users]);
    }


    public function store()
    {

        $data=$this->validate(\request(),[
            'name'=>'required',
            'user_id'=>'required|numeric',
            'lat'=>'sometimes|nullable',
            'long'=>'sometimes|nullable',
            'address'=>'sometimes|nullable',
            'icon'=>'sometimes|nullable|'.validate_images(),
        ]);
        if (\request()->hasFile('icon'))
        {

            $data['icon']=up()->upload([
                //'new_name'=>'',
                'file'=>'icon',
                'path'=>'shippings',
                'upload_type'=>'single',
                'delete_file'=>''
            ]);
        }

        \App\Shipping::create($data);
        session()->flash('added','The New Shipping Added Successfully');
        return redirect(aurl('shippings'));
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
        $users=\App\User::all();
        $shipping=\App\Shipping::find($id);
        return view('admin.shippings.edit',['title'=>'Edit Shipping Data','shipping'=>$shipping,'users'=>$users]);
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
                $c=Shipping::find($id);
                Storage::delete($c->icon);
                $c->delete();
            }

        }
        else
        {
            $c=Shipping::find(\request('item'));
            Storage::delete($c->icon);
            $c->delete();
        }
        session()->flash('added','The Shippings Deleted Successfully');
        return redirect(aurl('shippings'));
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
            'user_id'=>'required|numeric|',
            'lat'=>'sometimes|nullable',
            'long'=>'sometimes|nullable',
            'address'=>'sometimes|nullable',
            'icon'=>'sometimes|nullable|'.validate_images(),
        ]);
        if (\request()->hasFile('icon'))
        {
            //!empty(setting()->icon)?Storage::delete(setting()->icon):'';
            $data['icon']=up()->upload([
                //'new_name'=>'',
                'file'=>'icon',
                'path'=>'shippings',
                'upload_type'=>'single',
                'delete_file'=>Shipping::find($id)->icon,

            ]);
        }
        \App\Shipping::where('id',$id)->update($data);
        session()->flash('added','The New Shipping Updated Successfully');
        return redirect(aurl('shippings'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Shipping::find($id);
        Storage::delete($c->icon);
        $c->delete();
        session()->flash('added','The Shipping Deleted Successfully');
        return redirect(aurl('shippings'));
    }
}
