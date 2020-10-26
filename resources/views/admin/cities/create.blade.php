@extends('admin.index')
@section('content')


    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('cities')}}" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="POST">
                <div class="form-group">
            <label >Name</label><br>
                <input type="text" name="city_name" value="{{old('city_name')}}" class="form-control">
                </div>

                <div class="form-group">
                    <label >Country Name</label><br>
                   <select class="form-control" name="country_id">
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                       @endforeach
                   </select>
                </div>

<div class="form-group">
                    <input type="submit" name="submit" value="Add New City" class="btn btn-info">
            </div>
            </form>
        </div>
    </div>


@endsection