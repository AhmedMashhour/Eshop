<link rel="stylesheet" href="{{url('design/Adminlte/dropzone/basic.min.css')}}">
<link rel="stylesheet" href="{{url('design/Adminlte/dropzone/dropzone.min.css')}}">

@push('js')
    <script type="text/javascript" src="{{url('design/Adminlte/dropzone/dropzone.js')}}"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover=false;
        $(document).ready(function () {

$('#dropzonefileuploade').dropzone({

    url:'{{aurl('upload/image/'.$product->id)}}',
    paramName:'file',
    uploadMultiple:false,
    maxFiles:15,
    maxFilesize:5,
    acceptedFiles:'image/*',
    params:{ _token:'{{csrf_token()}}'},
    dictRemoveFile:'Remove',
    removedfile:function(file){
        $.ajax({
            dataType:'json',
            type:'post',
            url:'{{aurl('delete/image')}}',
            data:{_token: '{{csrf_token()}}',id:file.fid}
        });
        var fmock;
        return (fmock=file.previewElement)!=null? fmock.parentNode.removeChild(file.previewElement):void 0;
    },
    addRemoveLinks:true,
    init:function () {
        @foreach($product->files()->get() as $file)
        var mock={name:'{{$file->name}}',fid:'{{$file->id}}',size:'{{$file->size}}',type:'{{$file->mim_type}}'};
        this.emit('addedfile',mock);
        this.options.thumbnail.call(this,mock,'{{url('storage/'.$file->full_file)}}');
        @endforeach

        this.on('sending',function (file,xhr,formData) {
            formData.append('fid','');
            file.fid='';
        });
        this.on('success',function (file,response) {
            file.fid=response.id;
        });
    }
});





///////////////////////////
            $('#mainphoto').dropzone({

                url:'{{aurl('update/image/'.$product->id)}}',
                paramName:'file',
                uploadMultiple:false,
                maxFiles:1,
                maxFilesize:5,
                acceptedFiles:'image/*',
                params:{ _token:'{{csrf_token()}}'},
                dictRemoveFile:'Remove',
                removedfile:function(file){
                    $.ajax({
                        dataType:'json',
                        type:'post',
                        url:'{{aurl('delete/product/image/'.$product->id)}}',
                        data:{_token: '{{csrf_token()}}',id:file.fid}
                    });
                    var fmock;
                    return (fmock=file.previewElement)!=null? fmock.parentNode.removeChild(file.previewElement):void 0;
                },
                addRemoveLinks:true,
                init:function () {
                    var mock={name:'{{$product->title}}',size:'',type:''};
                    @if(!empty($product->photo))
                    this.emit('addedfile',mock);
                    this.options.thumbnail.call(this,mock,'{{url('storage/'.$product->photo)}}');
                    $('.dz-progress').remove();
                    @endif
                        this.on('sending',function (file,xhr,formData) {
                        formData.append('fid','');
                        file.fid='';
                    });
                    this.on('success',function (file,response) {
                        file.fid=response.id;
                    });
                }
            });

        });
    </script>
    @endpush
<div id="menu3" class="tab-pane fade">
    <h3>Product Media</h3>
    <hr/>
    <center><h3>Main Photo</h3></center>
<div class="dropzone"  id="mainphoto">

</div>
<hr>
    <center><h3>Other Photo</h3></center>
    <div class="dropzone"  id="dropzonefileuploade">

    </div>
</div>

<style>
    .dz-image img{
        width:100px;
        height: 100px;
    }
</style>