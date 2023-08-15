<div class="modal-dialog" role="document">
  <div class="modal-content">
  
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"> {{$package->product->sku}}  </h4>
    </div>

    <div class="modal-body">
      <table class="table table-bordered table-striped">
        <tr>
          <th>Product Name</th>
          <th>Product Sku</th>
          <th>Action</th>
        </tr>
        @foreach($package->raws as $item)
        <tr>
          <td>{{$item->product->name}}</td>
          <td>{{$item->product->sku}}</td>
          <td>
           <form class="" action="{{ action('PackageDetailsController@destroy',[$item->id])}}" method="post">
            {{ method_field('DELETE') }}
            {!! csrf_field() !!}
            <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
              <i class="fa fa-trash"></i>delete
            </button>
          </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->