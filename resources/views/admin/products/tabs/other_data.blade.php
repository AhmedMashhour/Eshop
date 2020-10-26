<div id="menu5" class="tab-pane fade">
    <h3>Other Data</h3>
    <div class="form-group">
        <label >Currency Name</label><br>
        <select class="form-control" name="currency_id">
            @foreach($currencies as $currency)
                <option value="{{$currency->id}}" @if($currency->id == $product->currency_id) selected @endif>{{$currency->currency}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label >Trademark Name</label><br>
        <select class="form-control" name="trademark_id">
            @foreach($trademarks as $trademark)
                <option value="{{$trademark->id}}" @if($trademark->id == $product->trademark_id) selected @endif>{{$trademark->trademark_name}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label >Manufacturer  Name</label><br>
        <select class="form-control" name="manufact_id">
            @foreach($manufacts as $manufact)
                <option value="{{$manufact->id}}" @if($manufact->id == $product->manufact_id) selected @endif>{{$manufact->name}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label >Color Name</label><br>

            @foreach($colors as $color)
            <div class="col-md-3"> <input type="radio" name="color_id" value="{{$color->id}}"  @if($color->id == $product->color_id) checked @endif>
                <span style="width: 15px;height: 15px;background-color: {{$color->color}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
               </div>
        @endforeach

    </div>

    <div class="form-group">
        <label >Other Data</label><br>
    <textarea name="other_data" class="form-control" >{{$product->other_data}}</textarea>

    </div>

<!---->
</div>

