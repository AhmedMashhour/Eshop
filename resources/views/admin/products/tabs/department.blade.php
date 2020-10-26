@push("js")
    <script type="text/javascript">
        $(document).ready(function () {
            $("#jstree").jstree({
                "core":{
                    "data":{!! load_dep($product->department_id) !!},
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
            var department=r.join(', ');
            $('.department_id').val(department);

            $.ajax({
                url:'{{aurl("load/size/wight")}}',
                dataType:'html',
                type:'post',
                data:{_token:"{{csrf_token()}}",idd:'{{$product->id}}',dept_id:department},
                success:function (data) {
                    $('.size_wight').html(data);
                }
            })
        });

    </script>

@endpush
<div id="menu1" class="tab-pane fade">
    <h3> Department</h3>
    <div id="jstree">

    </div>
    <input type="hidden" name="department_id" value="" class="department_id">
</div>