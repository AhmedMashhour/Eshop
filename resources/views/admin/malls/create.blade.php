@extends('admin.index')
@section('content')
@push('js')
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="{{url('design/Adminlte/dist/js/locationpicker.jquery.js')}}"></script>
<?php
$lat=!empty(old('lat'))?old('lat'):'30.03402';
$long=!empty(old('long'))?old('long'):'31.2423';
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
            <form method="post" action="{{aurl('malls')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="lat" value="{{$lat}}" id="lat">
                <input type="hidden" name="long" value="{{$long}}" id="long">
                <div class="form-group">
                    <label >Manufacturer Name</label><br>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control">
                </div>

                <div class="form-group">
                    <label > Contact Name</label><br>
                    <input type="text" name="contact_name" value="{{old('contact_name')}}" class="form-control">
                </div>


                <div class="form-group">
                    <label >Mobile</label><br>
                    <input type="number" name="mobile" value="{{old('mobile')}}" class="form-control">
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
                    <label >Address</label><br>
                    <input type="text" id="address" name="address" value="{{old('address')}}" class="form-control">
                </div>
                <div class="form-group">
                <div id="us1" style="width: 100%; height: 400px;"></div>
                </div>
                <div class="form-group">
                    <label >Facebook Account</label><br>
                    <input type="text" name="facebook" value="{{old('facebook')}}" class="form-control">
                </div>


                <div class="form-group">
                    <label >Twitter Account</label><br>
                    <input type="text" name="twitter" value="{{old('twitter')}}" class="form-control">
                </div>




                <div class="form-group">
                    <label >Icon</label><br>
                    <input type="file" name="icon" value="" class="form-control btn btn-primary">

                </div>
                <div class="form-group">

                    <input type="submit" name="submit" value="Add New Mall" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection