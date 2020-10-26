@if(count($errors->all())>0)
    <div class="alert alert-danger" style="background-color: palevioletred;color: black;font-size:35px">
        <ul>
            @foreach($errors->all() as $e)
                <li>{{$e}}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session()->has('added'))
    <div class="alert alert-success">
        <h2>{{session('added')}}</h2>
    </div>
@endif