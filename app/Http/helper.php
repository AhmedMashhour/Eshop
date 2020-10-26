<?php
if(!function_exists('validate_images')){
    function validate_images($ext=null)
    {
        if($ext===null)
        {
            return 'image|mimes:jpg,jpeg,png,gif';
        }
        else{
            return 'image|mimes'.$ext;
        }
    }
}

if(!function_exists('setting')){
    function setting()
    {
        return \App\Model\Setting::orderBy('id','desc')->first();
    }
}
if(!function_exists('up')){
    function up()
    {
        return new \App\Http\Controllers\Upload;
    }
}


if(!function_exists('get_parent')){
    function get_parent($dept_id)
    {
        $deps=\App\Department::find($dept_id);
        if($deps->parent_id!==null&&$deps->parent_id > 0){
            return get_parent($deps->parent_id).",".$dept_id;
        }else{
            return $dept_id;
        }
    }
}


if(!function_exists('load_dep')){
    function load_dep($selected=null,$hide=null)
    {
       $deps=\App\Department::selectRaw('department_name as text')
           ->selectRaw('id as id')
           ->selectRaw('parent_id as parent')
           ->get(['text','parent','id']);
       $dep_arr=[];
       foreach ($deps as $dep)
       {
           $list_arr=[];

           $list_arr['icon']='';
           $list_arr['li_attr']='';
           $list_arr['a_attr']='';
           $list_arr['children']=[];
           if($selected!==null and $selected==$dep->id)
           {

               $list_arr['state']=['opened'=>true,'selected'=>true,'disabled'=>false];
           }
           if($hide!==null and $hide==$dep->id)
           {

               $list_arr['state']=['opened'=>false,'selected'=>false,'disabled'=>true,'hidden'=>true];
           }
           $list_arr['id']=$dep->id;
           $list_arr['parent']=$dep->parent > 0?$dep->parent:'#';
           $list_arr['text']=$dep->text;
           array_push($dep_arr,$list_arr);
       }
     //  dd(json_encode($dep_arr,JSON_UNESCAPED_UNICODE));
       return json_encode($dep_arr,JSON_UNESCAPED_UNICODE);
    }
}

if(!function_exists('aurl'))
{
    function aurl($url=null)
    {
        return url('admin/'.$url);
    }
}
if (!function_exists('active_menu'))
{
    function active_menu($link)
    {
        if(preg_match('/'.$link.'/i',Request::segment(2)))
        {
            return ['menu-open','display:block'];

        }
        else
        {
            return ['',''];
        }
    }
}
if(!function_exists('admin'))
{
    function admin()
    {
        return auth()->guard('admin');
    }
}
if(!function_exists('customer'))
{
    function customer()
    {
        return auth()->guard('customer');
    }
}
