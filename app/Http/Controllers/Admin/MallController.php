<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\MallsDatatable;
use Illuminate\Http\Request;
use \App\Mall;
use Illuminate\Support\Facades\Storage;

class MallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MallsDatatable $mall)
    {
        return $mall->render('admin.malls.index',['title'=>'Malls Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=\App\Country::all();
        return view('admin.malls.create',['title'=>'Create New Mall','countries'=>$countries]);
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
            'country_id'=>'required|numeric',
            'long'=>'sometimes|nullable',
            'address'=>'sometimes|nullable',
            'icon'=>'sometimes|nullable|'.validate_images(),
        ]);
        if (\request()->hasFile('icon'))
        {

            $data['icon']=up()->upload([
                //'new_name'=>'',
                'file'=>'icon',
                'path'=>'malls',
                'upload_type'=>'single',
                'delete_file'=>''
            ]);
        }

        \App\Mall::create($data);
        session()->flash('added','The New Mall Added Successfully');
        return redirect(aurl('malls'));
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
        $country=\App\Country::all();
        $mall=\App\Mall::find($id);
        return view('admin.malls.edit',['title'=>'Edit Mall Data','mall'=>$mall,'country'=>$country]);
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
                $c=Mall::find($id);
                Storage::delete($c->icon);
                $c->delete();
            }

        }
        else
        {
            $c=Mall::find(\request('item'));
            Storage::delete($c->icon);
            $c->delete();
        }
        session()->flash('added','The Malls Deleted Successfully');
        return redirect(aurl('malls'));
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
            'country_id'=>'required|numeric',

            'icon'=>'sometimes|nullable|'.validate_images(),
        ]);
        if (\request()->hasFile('icon'))
        {
            //!empty(setting()->icon)?Storage::delete(setting()->icon):'';
            $data['icon']=up()->upload([
                //'new_name'=>'',
                'file'=>'icon',
                'path'=>'malls',
                'upload_type'=>'single',
                'delete_file'=>Mall::find($id)->icon,

            ]);
        }
        \App\Mall::where('id',$id)->update($data);
        session()->flash('added','The Mall Updated Successfully');
        return redirect(aurl('malls'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Mall::find($id);
        Storage::delete($c->icon);
        $c->delete();
        session()->flash('added','The Mall Deleted Successfully');
        return redirect(aurl('malls'));
    }
}
