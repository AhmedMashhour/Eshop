<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\CitiesDatatables;
use Illuminate\Http\Request;
use \App\City;
use \App\Country;
use Illuminate\Support\Facades\Storage;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CitiesDatatables $city)
    {
        return $city->render('admin.cities.index',['titel'=>'Cities Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return view('admin.cities.create',['title'=>'Create New City','countries'=>$countries]);
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
            'city_name'=>'required',
            'country_id'=>'required|numeric',

        ]);
        //dd($data);
        $k=\App\City::create($data);
        session()->flash('added','The New City Added Successfully');
        return redirect(aurl('cities'));
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
        $city=\App\City::find($id);
        $country=\App\Country::all();
        return view('admin.cities.edit',['title'=>'Edit City Data','city'=>$city,'country'=>$country]);
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
                $c=City::find($id);

                $c->delete();
            }

        }
        else
        {
            $c=City::find(\request('item'));

            $c->delete();
        }
        session()->flash('added','The Cities Deleted Successfully');
        return redirect(aurl('cities'));
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
            'city_name'=>'required',
            'country_id'=>'required|numeric',


        ]);

        \App\City::where('id',$id)->update($data);
        session()->flash('added','The New City Updated Successfully');
        return redirect(aurl('cities'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=City::find($id);

        $c->delete();
        session()->flash('added','The City Deleted Successfully');
        return redirect(aurl('cities'));
    }
}
