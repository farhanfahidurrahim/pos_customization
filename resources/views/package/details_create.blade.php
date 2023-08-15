<div class="modal-dialog" role="document">
  <div class="modal-content">
    <form action="{{ action('PackageDetailsController@store')}}" method="post">
      {{ csrf_field()}}
      <input type="hidden" name="package_id" value="{{$package->id}}">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"> Add Package Product For  {{$package->product->name}}</h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <label>product</label>
        <select class="form-control" name="product_id[]" id="select" multiple="multiple" required>
          <option value="" hidden>Select A Product</option>
          @foreach($products as $item)
          <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>
  </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->