<div class="modal-dialog modal-md" role="document">
    <form action="{{ action ('SellController@sellStatusUpdate',[$sell->id])}}" method="post">
      <div class="modal-content">
          
        <div class="row">
            <div class="col-sm-12">
                <h2>Sell Status Update</h2>
                {{ csrf_field()}}
                <div class="form-group col-sm-8">
                    <label> Status :</label>
                    <select class="form-control" name="sell_status" required>
                        <option value="" hidden>Select A Status</option>
                        @foreach($items as $key=>$item)
                        <option value="{{ $key }}" {{ $key ==$sell->sell_status ?'selected' :''}}>{{ $key}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-default no-print" data-dismiss="modal">@lang( 'messages.close' )</button>
        </div>
      </div>
    </form>
</div>


