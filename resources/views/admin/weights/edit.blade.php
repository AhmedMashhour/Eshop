@extends('admin.index')
@section('content')




    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('weights/'.$weight->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label >Name</label><br>
                    <input type="text" name="name" value="{{$weight->name}}" class="form-control">
                </div>



                <div class="form-group">

                    <input type="submit" name="submit" value="Update Weight" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection