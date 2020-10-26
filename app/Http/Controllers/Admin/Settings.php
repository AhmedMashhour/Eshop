<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \App\Model\Setting;

class Settings extends Controller
{
    public function setting()
    {
        return view('admin.setting',['title'=>'Admin Setting']);
    }
    public  function setting_save()
    {

        $data=$this->validate(\request(),[
            'logo'=>validate_images(),
            'icon'=>validate_images(),
            'status'=>'',
            'siteName'=>'',
            'email'=>'',
            'description'=>'',
            'keywords'=>'',
            'main_lang'=>'',
            'message_minten'=>'',
            ]);
        if (\request()->hasFile('logo'))
        {
            //!empty(setting()->logo)?Storage::delete(setting()->logo):'';

           $data['logo']=up()->upload([
               //'new_name'=>'',
               'file'=>'logo',
               'path'=>'settings',
               'upload_type'=>'single',
               'delete_file'=>setting()->logo,
           ]);
        }
        if (\request()->hasFile('icon'))
        {
            //!empty(setting()->icon)?Storage::delete(setting()->icon):'';
            $data['icon']=up()->upload([
                //'new_name'=>'',
                'file'=>'icon',
                'path'=>'settings',
                'upload_type'=>'single',
                'delete_file'=>setting()->icon,
            ]);
        }

        Setting::orderBy('id','desc')->update($data);
        session()->flash('added','The Admins Settings Saved Successfully');
        return redirect(aurl('settings'));
    }
}
