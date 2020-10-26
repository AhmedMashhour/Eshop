@extends('admin.index')
@section('content')


    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('countries/'.$country->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label >Name</label><br>
                    <input type="text" name="country_name" value="{{$country->country_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label >Currency</label><br>
                    <input type="text" name="currency" value="{{$country->currency}}" class="form-control">
                </div>

                <div class="form-group">
                    <label >Mobil</label><br>
                    <input type="text" name="mob" value="{{$country->mob}}" class="form-control">
                </div>

                <div class="form-group">
                    <label >Code</label><br>
                    <input type="text" name="code" value="{{$country->code}}" class="form-control">
                </div>





                <div class="form-group">
                    <label >Logo</label><br>
                    <input type="file" name="logo" value="" class="form-control">
                    @if(!empty($country->logo))
        <img src="{{\Illuminate\Support\Facades\Storage::url($country->logo)}}" style="width: 100px;height:100px ;margin: auto">
                    @endif
                </div>
                <div class="form-group">

                    <input type="submit" name="submit" value="Update Country" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection