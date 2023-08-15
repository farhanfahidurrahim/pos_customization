<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => action('ProductRecievdController@store'), 'method' => 'POST' ]) !!}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center"> Product Recieved</h4>
        <div class="row">
            <div class="col-md-6" style="color:red">
                <div class="form-group">
                    <label>Referance Number </label>
                    <input type="text" class="form-control" name="ref_no" value="">
                </div>
                
            </div>
            <div class="col-md-6" style="color:red">
                <div class="form-group">
                    <label>Recieve Date </label>
                    <input type="date" class="form-control" name="date" value="{{ date('Y-m-d')}}">
                    <input type="hidden" class="form-control" name="transaction_id" value="{{ $purchase->id}}">
                </div>
            </div>
        </div>
    </div>

    <div class="modal-body">
        <div class="col-md-12">
            <table class="table bg-gray" id="purchase_return_table">
                    <thead>
                        <tr class="bg-green">
                            <th>#</th>
                            <th>@lang('product.product_name')</th>
                            <th>@lang('sale.unit_price')</th>
                            <th>@lang('purchase.purchase_quantity')</th>
                            <th>@lang('lang_v1.quantity_left')</th>
                            <th>@lang('lang_v1.return_quantity')</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchase->purchase_lines as $purchase_line)
                        
                        @php
                            $remain_qty=$purchase_line->quantity - $purchase_line->product_recieves->sum('quantity');
                        @endphp
                      
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$purchase_line->product->name}}</td>
                            <td><span class="display_currency" data-currency_symbol="true">{{ $purchase_line->purchase_price_inc_tax }}</span></td>
                            <td><span class="display_currency" data-is_quantity="true" data-currency_symbol="false">{{ $purchase_line->quantity }}</span> </td>
                            <td><span class="display_currency" data-currency_symbol="false" data-is_quantity="true">{{ $remain_qty }}</span> </td>
                            <td>
                                <input type="number" step="any" value="{{($remain_qty >0) ? $remain_qty :0}}" name="quantity[]" class="form-control"> 
                                <input type="hidden" step="any" value="{{$purchase_line->id}}" name="purchase_line_id[]" > 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">@lang( 'messages.update' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->