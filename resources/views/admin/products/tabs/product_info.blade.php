<div id="home" class="tab-pane fade in active ">
    <h3>Product Information</h3>
    <div class="form-group">
        <label>Title</label>
<input type="text" name="title" value="{{$product->title}}" class="form-control">
    </div>

    <div class="form-group">
        <label>Content</label>
        <textarea type="text" name="content" class="form-control">{{$product->content}}</textarea>
    </div>

</div>