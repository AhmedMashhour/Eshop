@extends('admin.index')
@section('content')
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#jstree").jstree({
                "core":{
                    "data":{!! load_dep(old('department_id')) !!},
                    "themes":{
                        "variant":"large"
                    }

                },
                "checkbox":{
                    "keep_selected_style":true
                },
                "plugins":["wholerow"]

            });
        });
        $('#jstree').on('changed.jstree',function (e,data) {
            var i,j,r =[];

            for (i=0,j=data.selected.length;i<j;i++)
            {
                r.push(data.instance.get_node(data.selected[i]).id);

            }

            if(r.join(', ')!='')
            {
                $('.department_id').val(r.join(', '));
            }
        });

    </script>

    @endpush
    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('sizes')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="POST">

                <div class="form-group">
                    <label >Name</label><br>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control">
                </div>
<input type="hidden" name="department_id"class="department_id" value="{{old('department_id')}}">
                <div id="jstree">

                </div>

                <div class="form-group">
                    <label >Public</label><br>
                    <select class="form-control" name="is_public">
                            <option >yes</option>
                            <option >no</option>
                    </select>
                </div>


                <div class="form-group">

                    <input type="submit" name="submit" value="Add New Size" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection