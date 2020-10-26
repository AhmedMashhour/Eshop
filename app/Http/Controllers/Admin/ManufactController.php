<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\ManufactsDatatables;
use Illuminate\Http\Request;
use \App\Manufact;
use Illuminate\Support\Facades\Storage;

class ManufactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManufactsDatatables $manufact)
    {
        return $manufact->render('admin.manufacts.index',['title'=>'Manufacturers Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacts.create',['title'=>'Create New Manufacturer']);
    }


    public function store()
    {

        $data=$this->validate(\request(),[
            'name'=>'required',
            'facebook'=>'sometimes|nullable|url',
            'twitter'=>'sometimes|nullable|url',
            'contact_name'=>'sometimes|nullable|string',
            'lat'=>'sometimes|nullable',
            'mobile'=>'sometimes|nullable|numeric',
            'long'=>'sometimes|nullable',
            'address'=>'sometimes|nullable',

            'icon'=>'sometimes|nullable|'.validate_images(),
        ]);
        if (\request()->hasFile('icon'))
        {

            $data['icon']=up()->upload([
                //'new_name'=>'',
                'file'=>'icon',
                'path'=>'manufacts',
                'upload_type'=>'single',
                'delete_file'=>''
            ]);
        }

        \App\Manufact::create($data);
        session()->flash('added','The New Manufacturer Added Successfully');
        return redirect(aurl('manufacts'));
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
        $manufact=\App\Manufact::find($id);
        return view('admin.manufacts.edit',['title'=>'Edit Manufacturer Data','manufact'=>$manufact]);
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
                $c=Manufact::find($id);
                Storage::delete($c->icon);
                $c->delete();
            }

        }
        else
        {
            $c=Manufact::find(\request('item'));
            Storage::delete($c->icon);
            $c->delete();
        }
        session()->flash('added','The Manufacturers Deleted Successfully');
        return redirect(aurl('manufacts'));
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
            'facebook'=>'sometimes|nullable|url',
            'twitter'=>'sometimes|nullable|url',
            'contact_name'=>'sometimes|nullable|string',
            'lat'=>'sometimes|nullable',
            'long'=>'sometimes|nullable',
            'address'=>'sometimes|nullable',
            'mobile'=>'sometimes|nullable|numeric',

            'icon'=>'sometimes|nullable|'.validate_images(),
        ]);
        if (\request()->hasFile('icon'))
        {
            //!empty(setting()->icon)?Storage::delete(setting()->icon):'';
            $data['icon']=up()->upload([
                //'new_name'=>'',
                'file'=>'icon',
                'path'=>'manufacts',
                'upload_type'=>'single',
                'delete_file'=>Manufact::find($id)->icon,

            ]);
        }
        \App\Manufact::where('id',$id)->update($data);
        session()->flash('added','The New Manufacturer Updated Successfully');
        return redirect(aurl('manufacts'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Manufact::find($id);
        Storage::delete($c->icon);
        $c->delete();
        session()->flash('added','The Manufacturer Deleted Successfully');
        return redirect(aurl('manufacts'));
    }
}
