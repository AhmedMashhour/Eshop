@extends('admin.index')
@section('content')


    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('admin')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="POST">
                <div class="form-group">
            <label >Name</label><br>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label >Email</label><br>
                    <input type="email" name="email" value="{{old('Email')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label >Password</label><br>
                    <input type="password" name="password" value="" class="form-control">
                </div>
                <div class="form-group">

                    <input type="submit" name="submit" value="Add New Admin" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection