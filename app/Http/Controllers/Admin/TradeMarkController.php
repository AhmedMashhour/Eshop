<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\TradeMarkDatatables;
use Illuminate\Http\Request;
use \App\TradeMark;
use Illuminate\Support\Facades\Storage;

class TradeMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TradeMarkDatatables $trademark)
    {
        return $trademark->render('admin.trademarks.index',['title'=>'TradeMarks Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trademarks.create',['title'=>'Create New TradeMark']);
    }


    public function store()
    {
        $data=$this->validate(\request(),[
            'trademark_name'=>'required',

            'logo'=>'required|'.validate_images(),
        ]);
        if (\request()->hasFile('logo'))
        {

            $data['logo']=up()->upload([
                //'new_name'=>'',
                'file'=>'logo',
                'path'=>'trademarks',
                'upload_type'=>'single',
                'delete_file'=>''
            ]);
        }

        \App\TradeMark::create($data);
        session()->flash('added','The New TradeMark Added Successfully');
        return redirect(aurl('trademarks'));
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
        $trademark=\App\TradeMark::find($id);
        return view('admin.trademarks.edit',['title'=>'Edit TradeMark Data','trademark'=>$trademark]);
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
                $c=TradeMark::find($id);
                Storage::delete($c->logo);
                $c->delete();
            }

        }
        else
        {
            $c=TradeMark::find(\request('item'));
            Storage::delete($c->logo);
            $c->delete();
        }
        session()->flash('added','The TradeMark Deleted Successfully');
        return redirect(aurl('trademarks'));
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
            'trademark_name'=>'required',

            'logo'=>'sometimes|nullable|'.validate_images(),
        ]);
        if (\request()->hasFile('logo'))
        {
            //!empty(setting()->logo)?Storage::delete(setting()->logo):'';
            $data['logo']=up()->upload([
                //'new_name'=>'',
                'file'=>'logo',
                'path'=>'trademarks',
                'upload_type'=>'single',
                'delete_file'=>TradeMark::find($id)->logo,

            ]);
        }
        \App\TradeMark::where('id',$id)->update($data);
        session()->flash('added','The New trademarks Updated Successfully');
        return redirect(aurl('trademarks'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=TradeMark::find($id);
        Storage::delete($c->logo);
        $c->delete();
        session()->flash('added','The TradeMark Deleted Successfully');
        return redirect(aurl('trademarks'));
    }
}
