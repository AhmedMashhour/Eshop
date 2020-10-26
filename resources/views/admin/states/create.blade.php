@extends('admin.index')
@section('content')

    @push('js')
        <script>
            $(document).ready(function () {
                @if(old('country_id'))
                $.ajax(
                    {
                        url:'{{aurl('states/create')}}',
                        type:'get',
                        dataType:'html',
                        data:{country_id:'{{old('country_id')}}',select:'{{old('city_id')}}'},
                        success:function (data) {
                            $('.city').html(data);
                        }

                    }
                );
                @endif
                $(document).on('change','.country_id',function () {


                    var  country=$('.country_id option:selected').val();
                    if (country!=0)
                    {
                        $.ajax(
                            {
                                url:'{{aurl('states/create')}}',
                                type:'get',
                                dataType:'html',
                                data:{country_id:country,},
                                success:function (data) {
                                    $('.city').html(data);
                                }

                            }
                        );
                    }
                });
            });

        </script>

    @endpush

    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('states')}}" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="POST">
                <div class="form-group">
            <label >Name</label><br>
                <input type="text" name="state_name" value="{{old('state_name')}}" class="form-control">
                </div>



                <div class="form-group">
                    <label >Country Name</label><br>
                   <select class="country_id form-control" name="country_id">
                @foreach($countries as $country)
                           <option value="{{$country->id}}" @if($country->country_id==old('country_id')) selected @endif>{{$country->country_name}}</option>
                @endforeach
                   </select>
                </div>


                <div class="form-group">
                    <label class="city_id" >City Name</label><br>
                    <span class="city"></span>
                </div>

<div class="form-group">
                    <input type="submit" name="submit" value="Add New State" class="btn btn-info">
            </div>
            </form>
        </div>
    </div>


@endsection