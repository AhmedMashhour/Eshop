@extends('admin.index')
@section('content')

    @push('js')
        <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
        <script src="{{url('design/Adminlte/dist/js/locationpicker.jquery.js')}}"></script>
        <?php
        $lat=!empty($shipping->lat)?$shipping->lat:'30.03402';
        $long=!empty($shipping->long)?$shipping->long:'31.2423';
        ?>

        <script>
            $('#us1').locationpicker({
                location: {
                    latitude: {{$lat}},
                    longitude: {{$long}}
                },
                radius: 300,
                markerIcon: '{{url('design/Adminlte/dist/img/marker.jpg')}}',
                inputBinding: {
                    latitudeInput: $('#lat'),
                    longitudeInput: $('#long'),
                    // radiusInput: $('#us2-radius'),
                    locationNameInput: $('#address')
                }
            });
        </script>
    @endpush


    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('shippings/'.$shipping->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="lat" value="{{$lat}}" id="lat">
                <input type="hidden" name="long" value="{{$long}}" id="long">
                <div class="form-group">
                    <label >Shipping Company</label><br>
                    <input type="text" name="name" value="{{$shipping->name}}" class="form-control">
                </div>

                <div class="form-group">
                    <label >Owner</label><br>
                    <select class="form-control" name="user_id">
                        @foreach($users as $c)
                            @if($c->level=='company')
                            <option value="{{$c->id}}" @if($shipping->user_id==$c->id) selected @endif>{{$c->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>




                <div class="form-group">
                    <label >Address</label><br>
                    <input type="text" id="address" name="address" value="{{$shipping->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <div id="us1" style="width: 100%; height: 400px;"></div>
                </div>

                <div class="form-group">
                    <label >Icon</label><br>
                    <input type="file" name="icon" value="" class="form-control btn btn-primary">
                    @if(!empty($shipping->icon))
                        <img src="{{\Illuminate\Support\Facades\Storage::url($shipping->icon)}}" style="width: 100px;height:100px ;margin: auto">
                    @endif
                </div>
                <div class="form-group">

                    <input type="submit" name="submit" value="Update Manufacturer" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection