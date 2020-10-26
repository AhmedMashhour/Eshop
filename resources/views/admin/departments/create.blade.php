@extends('admin.index')
@section('content')
    @push("js")
        <script type="text/javascript">
            $(document).ready(function () {
                $("#jstree").jstree({
                    "core":{
                        "data":{!! load_dep(old('parent_id')) !!},
                        "themes":{
                            "variant":"large"
                        }

                    },
                    "checkbox":{
                        "keep_selected_style":false
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
                $('.parent').val(r.join(', '));
            });

        </script>

    @endpush

    <div class="box">
        <div class="box-header" >
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('departments')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="parent_id" value="{{old('parent_id')}}" class="parent">

                <div class="form-group">
            <label >Department</label><br>
                <input type="text" name="department_name" value="{{old('department_name')}}" class="form-control">
                </div>
                <div class="clearfix"></div>
                <div id="jstree">




                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label >Description</label><br>
                    <textarea name="description" value="" class="form-control">{{old('description')}}</textarea>
                </div>

                <div class="form-group">
                    <label >Keyword</label><br>
                    <textarea name="keyword" value="" class="form-control">{{old('keyword')}}</textarea>
                </div>


                <div class="form-group">
                    <label>Icon</label>
                    <input type="file" name="icon" value="" class="form-control">
                    @if(!empty($department->icon))
                        <img src="{{\Illuminate\Support\Facades\Storage::url($department->icon)}}" style="width: 100px;height:100px ;margin: auto">
                    @endif
                </div>


                <div class="form-group">

                    <input type="submit" name="submit" value="Add New User" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>


@endsection