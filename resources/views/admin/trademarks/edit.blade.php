@extends('admin.index')
@section('content')


    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('trademarks/'.$trademark->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label >Name</label><br>
                    <input type="text" name="trademark_name" value="{{$trademark->trademark_name}}" class="form-control">
                </div>




                <div class="form-group">
                    <label >Logo</label><br>
                    <input type="file" name="logo" value="" class="form-control">
                    @if(!empty($trademark->logo))
                        <img src="{{\Illuminate\Support\Facades\Storage::url($trademark->logo)}}" style="width: 100px;height:100px ;margin: auto">
                    @endif
                </div>
                <div class="form-group">

                    <input type="submit" name="submit" value="Update TradeMark" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection