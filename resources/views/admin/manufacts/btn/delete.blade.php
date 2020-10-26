

<a class="btn btn-danger" data-toggle="modal" data-target="#deleteCountry{{$id}}"><i class="fa fa-trash"></i></a>

<div class="modal fade" id="deleteCountry{{$id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" id="popupdelete">
            <div class="modal-header">
                <button type="button"  class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are You Sure ?</h4>
            </div>
            <div class="modal-body">
                <h2> <strong class="msg" style="color:red;">You will Delete  {{$name}} trade !</strong></h2>
            </div>
            <div class="modal-footer">
                <form action="{{aurl('manufacts/'.$id)}}" method="post" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="delete">


                    <input type="submit" class="btn btn-danger" value="Yes">
                    <button type="button" onclick="" class="btn btn-info" data-dismiss="modal">No</button>
                </form>

            </div>
        </div>
    </div>
</div>