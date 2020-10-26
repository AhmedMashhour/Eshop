<?php

namespace App\Http\Controllers\Admin;
use App\City;
use App\Http\Controllers\controller;
use App\DataTables\StatesDatatables;
use Illuminate\Http\Request;
use \App\Country;
use \App\State;
use Illuminate\Support\Facades\Storage;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StatesDatatables $state)
    {
        return $state->render('admin.states.index',['titel'=>'States Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\request()->ajax())
        {
            if(\request()->has('country_id'))
            {
               // $select=\request()->has('select')?\request('select'):'';

                if(\request()->has('select'))
                {
                    $select=City::where('country_id',\request('country_id'))->where('id',\request('select'))->get();

                    $city=City::where('country_id',\request('country_id'))->get();
                    $data='<select class="form-control" name="city_id">';

                    foreach ($city as $c)
                    {

                        if(\request()->has('select')&&$c->id==$select[0]->id) {
                            $data .= '<option seleccted value="' . $c->id . '">' . $c->city_name . '</option>';
                        }
                        else
                        {
                            $data .= '<option  value="' . $c->id . '">' . $c->city_name . '</option>';
                        }
                    }
                    $data.='</select>';
                    // dd($data);
                    return $data;
                }
                else {

                    $city = City::where('country_id', \request('country_id'))->get();
                    $data = '<select class="form-control" name="city_id">';
                    //dd($city);
                    foreach ($city as $c) {

               $data .= '<option  value="' . $c->id . '">' . $c->city_name . '</option>';

                    }
                    $data .= '</select>';
                    // dd($data);
                    return $data;
                }
            }
        }
        $countries=Country::all();
        $cities=City::all();
        return view('admin.states.create',['title'=>'Create New State','countries'=>$countries,'cities'=>$cities]);
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
            'state_name'=>'required',
            'country_id'=>'required|numeric',
            'city_id'=>'required|numeric',

        ]);

        \App\State::create($data);
        session()->flash('added','The New State Added Successfully');
        return redirect(aurl('states'));
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
        $state=State::find($id);
        $cities=\App\City::all();
        $country=\App\Country::all();
        return view('admin.states.edit',['title'=>'Edit State Data','state'=>$state,'cities'=>$cities,'country'=>$country]);
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
                $c=State::find($id);

                $c->delete();
            }

        }
        else
        {
            $c=State::find(\request('item'));

            $c->delete();
        }
        session()->flash('added','The Admins Deleted Successfully');
        return redirect(aurl('states'));
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
            'state_name'=>'required',
            'country_id'=>'required|numeric',
            'city_id'=>'required|numeric',

        ]);

        \App\State::where('id',$id)->update($data);
        session()->flash('added','The New State Updated Successfully');
        return redirect(aurl('states'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=State::find($id);

        $c->delete();
        session()->flash('added','The State Deleted Successfully');
        return redirect(aurl('states'));
    }
}
