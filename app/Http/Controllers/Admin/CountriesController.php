<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\CountriesDatatables;
use Illuminate\Http\Request;
use \App\Country;
use Illuminate\Support\Facades\Storage;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountriesDatatables $country)
    {
        return $country->render('admin.countries.index',['titel'=>'Countries Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create',['title'=>'Create New Country']);
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
            'country_name'=>'required',
            'mob'=>'required',
            'currency'=>'required',
            'code'=>'required',
            'logo'=>'required|'.validate_images(),
        ]);
        if (\request()->hasFile('logo'))
        {

            $data['logo']=up()->upload([
                //'new_name'=>'',
                'file'=>'logo',
                'path'=>'countries',
                'upload_type'=>'single',
                'delete_file'=>''
            ]);
        }
        \App\Country::create($data);
        session()->flash('added','The New Country Added Successfully');
        return redirect(aurl('countries'));
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
        $country=\App\Country::find($id);
        return view('admin.countries.edit',['title'=>'Edit Country Data','country'=>$country]);
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
               $c=Country::find($id);
               Storage::delete($c->logo);
               $c->delete();
           }

        }
        else
        {
            $c=Country::find(\request('item'));
            Storage::delete($c->logo);
            $c->delete();
        }
        session()->flash('added','The Country Deleted Successfully');
        return redirect(aurl('countries'));
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
            'country_name'=>'required',
            'currency'=>'required',

            'mob'=>'required',
            'code'=>'required',
            'logo'=>'sometimes|nullable|'.validate_images(),
        ]);
        if (\request()->hasFile('logo'))
        {
            //!empty(setting()->logo)?Storage::delete(setting()->logo):'';
            $data['logo']=up()->upload([
                //'new_name'=>'',
                'file'=>'logo',
                'path'=>'countries',
                'upload_type'=>'single',
                'delete_file'=>Country::find($id)->logo,

            ]);
        }
        \App\Country::where('id',$id)->update($data);
        session()->flash('added','The New countries Updated Successfully');
        return redirect(aurl('countries'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Country::find($id);
        Storage::delete($c->logo);
        $c->delete();
        session()->flash('added','The Country Deleted Successfully');
        return redirect(aurl('countries'));
    }
}
