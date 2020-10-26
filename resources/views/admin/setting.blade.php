@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
    <form action="{{aurl('settings')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Site Name</label>
            <input type="text" name="siteName" value="{{setting()->siteName}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="{{setting()->email}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Logo</label>
            <input type="file" name="logo" value="" class="form-control">
            @if(!empty(setting()->logo))
                <img src="{{\Illuminate\Support\Facades\Storage::url(setting()->logo)}}"style="width: 300px;height:300px ;margin:inherit">
                @endif
        </div>
        <div class="form-group">
            <label>Icon</label>
            <input type="file" name="icon" value="" class="form-control">
            @if(!empty(setting()->icon))
               <img src="{{\Illuminate\Support\Facades\Storage::url(setting()->icon)}}" style="width: 100px;height:100px ;margin: auto">
            @endif
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea  name="description" class="form-control">{{setting()->description}}</textarea>
        </div>
        <div class="form-group">
            <label>Keywords</label>
            <textarea  name="keywords" class="form-control">{{setting()->keywords}}</textarea>
        </div>
        <div class="form-group">
            <label>Main language</label>
           <select name="main_lang" class="form-control">
               <option selected>en</option>
               <option >ar</option>
           </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option @if(setting()->status=='open') selected @endif>open</option>
                <option @if(setting()->status=='close') selected @endif >close</option>
            </select>
        </div>
        <div class="form-group">
            <label>Mintenance Message</label>
            <textarea  name="message_minten" class="form-control">{{setting()->message_minten}}</textarea>
        </div>
        <div class="form-group">

           <input type="submit" name="submit" class="btn btn-primary" value="Save">
        </div>



    </form>

        </div>
    </div>





@endsection


