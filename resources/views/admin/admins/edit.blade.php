@extends('admin.index')
@section('content')


    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('admin/'.$data->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label >Name</label><br>
                    <input type="text" name="name" value="{{$data['name']}}" class="form-control">
                </div>
                <div class="form-group">
                    <label >Email</label><br>
                    <input type="email" name="email" value="{{$data['email']}}" class="form-control">
                </div>
                <div class="form-group">
                    <label >Password</label><br>
                    <input type="password" name="password" value="" class="form-control">
                </div>
                <div class="form-group">

                    <input type="submit" name="submit" value="Update Admin Data" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection