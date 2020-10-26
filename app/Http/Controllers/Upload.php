<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Files;
class Upload extends Controller
{
public static function upload($data=[])
{
    if (in_array('new_name',$data)) {
    $newName=$data['new_name']===null?time():$data['new_name'];
}

    if(\request()->hasFile($data['file'])&&$data['upload_type']=='single')
    {
     Storage::has($data['delete_file'])?Storage::delete($data['delete_file']):'';
        return \request()->file($data['file'])->store($data['path']);
    }else if(\request()->hasFile($data['file'])&&$data['upload_type']=='files')
    {
        $file= \request()->file($data['file']);
        $name=$file->getClientOriginalName();
        $size=$file->getSize();
        $mim=$file->getMimeType();
        $hash=$file->hashName();
        $file->store($data['path']);
        $add=Files::create([
            'name'=>$name,
            'size'=>$size,
            'file'=>$hash,
            'path'=>$data['path'],
            'full_file'=> $data['path'].'/'.$hash,
            'mime_type'=>$mim,
            'file_type'=>$data['file_type'],
            'relation_id'=>$data['relation_id'],
        ]);
        return $add->id;
    }
}
public function delete($id)
{
    $file=Files::find($id);
    if (!empty($file)){
    Storage::delete($file->full_file);
    $file->delete();
            }
}
}
