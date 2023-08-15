<div class="modal-dialog" role="document">
  <div class="modal-content">
    <form action="{{ action('PackageController@update' ,[$package->id])}}" method="post">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"> Update  Package</h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <label>product</label>
        <select class="form-control" name="product_id" required>
          <option value="" hidden>Select A Product</option>
          @foreach($products as $item)
          <option value="{{$item->id}}" {{$package->product_id==$item->id ? 'selected' :''}}>{{$item->name}}</option>
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