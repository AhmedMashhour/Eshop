@extends('admin.index')
@section('content')


    <div class="box">
        <div class="box-header" >
        <h3 class="box-title">{{$titel}}</h3>
        </div>
        <div class="box-body">
            <form method="post" action="{{aurl('states/destroy/all')}}" id="admins_form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="DELETE">

    {!! $dataTable->table([
        'class'=>'dataTable table table-striped table-hover table-bordered','style'=>'width:100%'],true) !!}

            </form>
        </div>
    </div>

    <div class="modal fade" id="deleteAdmins" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" id="popupdelete">
                <div class="modal-header">
                    <button type="button"  class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Are You Sure ?</h4>
                </div>
                <div class="modal-body">
                   <h2> <strong class="msg" style="color:red;">You will Delete Selected States !</strong></h2>
                </div>
                <div class="modal-footer">




                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="adminDelete_submit">Yes</button>
                        <button type="button" onclick="" class="btn btn-info" data-dismiss="modal">No</button>

                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script type="text/javascript">
            deleteAll_admin();
        </script>
    {!! $dataTable->scripts() !!}
    @endpush
@endsection