@extends("admin.index")
@section("content")
@push("js")


    <a class="btn btn-danger"><i class="fa fa-trash"></i></a>

    <div class="modal fade" id="deleteDep" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" id="popupdelete">
                <div class="modal-header">
                    <button type="button"  class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Are You Sure ?</h4>
                </div>
                <div class="modal-body">
                    <h2> <strong class="msg" style="color:red;">You will Delete Department <span class="delName"></span> !</strong></h2>
                </div>
                <div class="modal-footer">
                    <form action="" method="post" id="formDeleteDep">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="delete">
    <div class="model-footer">

                        <input type="submit" class="btn btn-danger" value="Yes">
                        <button type="button" onclick="" class="btn btn-info" data-dismiss="modal">No</button>
    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
$("#jstree").jstree({
    "core":{
        "data":{!! load_dep() !!},
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
            var name=[];
            for (i=0,j=data.selected.length;i<j;i++)
            {
                r.push(data.instance.get_node(data.selected[i]).id);
                name.push(data.instance.get_node(data.selected[i]).text);
            }
            $('#formDeleteDep').attr('action',"{{aurl('departments')}}/"+r.join(', '));
            $('.delName').text(name.join(', '));
            if(r.join(', ')!='')
            {
                $('.show_btn').removeClass('hidden');
                $('.edit_dep').attr('href',"{{aurl('departments')}}/"+r.join(', ')+'/edit');
            }else {
                $('.show_btn').addClass('hidden');
            }
        });

    </script>

    @endpush

    <div class="box">
        <div class="box-header" >
        <h3 class="box-title">{{$title}}</h3>
        </div>

        <div class="box-body">
            <a href="" class="btn btn-primary edit_dep show_btn hidden"><i class="fa fa-edit"></i>Edit Department </a>
            <a href="" class="btn btn-danger delete_dep show_btn hidden"  data-toggle="modal" data-target="#deleteDep">
                <i class="fa fa-trash">
                </i>Delete Department </a>
    <div id="jstree">

    </div>
            <input type="hidden" name="parent_id" value="" class="parent">
        </div>
    </div>


@endsection