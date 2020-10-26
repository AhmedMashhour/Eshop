@extends('admin.index')
@section('content')


    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('trademarks')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="POST">
                <div class="form-group">
                    <label >Name</label><br>
                    <input type="text" name="trademark_name" value="{{old('trademark_name')}}" class="form-control">
                </div>




                <div class="form-group">
                    <label >Logo</label><br>
                    <input type="file" name="logo" value="" class="form-control">
                    @if(!empty($country->logo))
                        <img src="{{\Illuminate\Support\Facades\Storage::url($country->logo)}}" style="width: 100px;height:100px ;margin: auto">
                    @endif
                </div>
                <div class="form-group">

                    <input type="submit" name="submit" value="Add New TradeMark" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection