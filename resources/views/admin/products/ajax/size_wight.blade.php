<div class="col-md-6">
    <div class="form-group">
        <label for="sizes" class="col-md-3">Size ID</label>
        <div class="col-md-9">
            <select name="size_id" class="form-control">

                @foreach( $sizes as $size)
                    <option  @if($product_size!=null&&$product_size->name==$size) selected @endif >{{$size}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="wights" class="col-md-3">Size</label>
            <div class="col-md-9">
                <input type="text" name="size" class="form-control" placeholder="Size" value="{{$product->size}}">
            </div>
        </div>


    </div>
</div>
<div class="col-md-6">
<div class="form-group">
    <label for="wights" class="col-md-3">Wight ID</label>
    <div class="col-md-9">
        <select name="weight_id" class="form-control">
            @foreach($wights as $wight)
                <option   @if($product_weight!=null&&$product_weight->name==$wight) selected @endif >{{$wight}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="wights" class="col-md-3">Wights</label>
        <div class="col-md-9">
            <input type="text" name="weight" class="form-control" placeholder="Weight"  value="{{$product->weight}}">
        </div>
    </div>


</div>
</div>
<div class="clearfix"></div>