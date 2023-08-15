<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => route('supplier_advance.store'), 'method' => 'POST' ]) !!}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{$contact->name}} Supplier Advance</h4>
    </div>

    <div class="modal-body">
        <div class="col-md-12">
            <div class="form-group">
                <label>Amount</label>
                <input type="number" step="any" name="amount" class="form-control" value="0">
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ date('Y-m-d')}}">
                <input type="hidden" name="contact_id" class="form-control" value="{{$contact->id}}">
            </div>

		</div>

    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">@lang( 'messages.update' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
