@extends('admin.index')
@section('content')


    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('countries')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="POST">
                <div class="form-group">
            <label >Name</label><br>
                <input type="text" name="country_name" value="{{old('country_name')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label >Currency</label><br>
                    <input type="text" name="currency" value="{{old('currency')}}" class="form-control">
                </div>


                <div class="form-group">
                    <label >Mobil</label><br>
                    <input type="text" name="mob" value="{{old('mob')}}" class="form-control">
                </div>

                <div class="form-group">
                    <label >Code</label><br>
                    <input type="text" name="code" value="{{old('code')}}" class="form-control">
                </div>





                <div class="form-group">
                    <label >Logo</label><br>
                    <input type="file" name="logo" value="" class="form-control">
                </div>
                <div class="form-group">

                    <input type="submit" name="submit" value="Add New Country" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection