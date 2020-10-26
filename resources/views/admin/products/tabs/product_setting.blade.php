@push('js')

    <script>
        $('.datepicker').datepicker({
            format:'yyyy-mm-dd',autoclose:false,todayBtn:true,clearBtn:true
        });


        $(document).on('change','.status_changed',function () {
           var status=$('.status-changed option:selected').val();
           if(status=='refused')
           {
               $('.reason-changed').removeClass('hidden');
           }else {
               $('.reason-changed').addClass('hidden');

           }
        });
    </script>

@endpush
<style>
  
</style>
<div id="menu2" class="tab-pane fade">
    <h3>Product Setting</h3>
    <div class="form-group  col-md-3 col-lg-3 col-md-3 col-xs-12">
        <label>Price</label>
        <input type="number" name="price" value="{{$product->price}}" class="form-control">
    </div>

    <div class="form-group   col-md-3 col-lg-3 col-md-3 col-xs-12">
        <label>Stock</label>
        <input type="number" name="stock" value="{{$product->stock}}" class="form-control">
    </div>

    <div class="form-group  col-md-3 col-lg-3 col-md-3 col-xs-12">
        <label>Start At</label>
        <input type="text" name="start_at" value="{{$product->start_at}}" class="form-control datepicker">
    </div>

    <div class="form-group  col-md-3 col-lg-3 col-md-3 col-xs-12">
        <label>End At</label>
        <input type="text" name="end_at" value="{{$product->end_at}}" class="form-control datepicker">
    </div><hr/>
                        <div class="clearfix"></div>
    <div class="form-group  col-md-4 col-lg-4 col-md-4 col-xs-12">
        <label>Price Offer</label>
        <input type="text" name="price_offer" value="{{$product->price_offer}}" class="form-control">
    </div>

    <div class="form-group  col-md-4 col-lg-4 col-md-4 col-xs-12">
        <label>Start Offer At</label>
        <input type="text" name="start_offer_at" value="{{$product->start_offer_at}}" class="form-control datepicker">
    </div>

    <div class="form-group  col-md-4 col-lg-4 col-md-4 col-xs-12">
        <label>End Offer At</label>
        <input type="text" name="end_offer_at" value="{{$product->end_offer_at}}" class="form-control datepicker">
    </div>
    <hr/>
    <div class="clearfix"></div>

    <div class="form-group">
        <label>Status</label>
        <select class="form-control status_changed" name="status">
            <option @if($product->status=='pending')selected @endif value="pending" >pending</option>
            <option @if($product->status=='active')selected @endif value="active" >active</option>
            <option @if($product->status=='refused')selected @endif value="refused" >refused</option>
        </select>
    </div>
    <div class="form-group reason-changed {{$product->status!="refused"?'hidden':''}}">
        <label>Reason</label>
        <textarea name="reason" class="form-control">{{$product->reason}}</textarea>
    </div>
</div>