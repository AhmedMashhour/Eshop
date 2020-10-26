@extends('admin.index')
@section('content')

    @push('js')
        <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
        <script src="{{url('design/Adminlte/dist/js/locationpicker.jquery.js')}}"></script>
        <?php
        $lat=!empty($mall->lat)?$mall->lat:'30.03402';
        $long=!empty($mall->long)?$mall->long:'31.2423';
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
                },
                enableAutocomplete: true,
            });
        </script>
    @endpush


    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('malls/'.$mall->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="lat" value="{{$lat}}" id="lat">
                <input type="hidden" name="long" value="{{$long}}" id="long">
                <div class="form-group">
                    <label >Manufacturer Name</label><br>
                    <input type="text" name="name" value="{{$mall->name}}" class="form-control">
                </div>

                <div class="form-group">
                    <label > Contact Name</label><br>
                    <input type="text" name="contact_name" value="{{$mall->contact_name}}" class="form-control">
                </div>


                <div class="form-group">
                    <label >Mobile</label><br>
                    <input type="number" name="mobile" value="{{$mall->mobile}}" class="form-control">
                </div>

                <div class="form-group">
                    <label >Country Name</label><br>
                    <select class="form-control" name="country_id">
                        @foreach($country as $c)
                            <option value="{{$c->id}}" @if($mall->country_id==$c->id) selected @endif>{{$c->country_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label >Address</label><br>
                    <input type="text" id="address" name="address" value="{{$mall->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <div id="us1" style="width: 100%; height: 400px;"></div>
                </div>
                <div class="form-group">
                    <label >Facebook Account</label><br>
                    <input type="text" name="facebook" value="{{$mall->facebook}}" class="form-control">
                </div>


                <div class="form-group">
                    <label >Twitter Account</label><br>
                    <input type="text" name="twitter" value="{{$mall->twitter}}" class="form-control">
                </div>




                <div class="form-group">
                    <label >Icon</label><br>
                    <input type="file" name="icon" value="" class="form-control btn btn-primary">
                    @if(!empty($mall->icon))
                        <img src="{{\Illuminate\Support\Facades\Storage::url($mall->icon)}}" style="width: 100px;height:100px ;margin: auto">
                    @endif
                </div>
                <div class="form-group">

                    <input type="submit" name="submit" value="Update Mall" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection