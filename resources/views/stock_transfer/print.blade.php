<div class="row">
  <div class="col-xs-12">
    <h2 class="page-header">
      @lang('lang_v1.stock_transfers') (<b>@lang('purchase.ref_no'):</b> #{{ $sell_transfer->ref_no }})
      <small class="pull-right"><b>@lang('messages.date'):</b> {{ @format_date($sell_transfer->transaction_date) }}</small>
    </h2>
  </div>
</div>
<div class="row invoice-info">
  <div class="col-sm-4 invoice-col">
    @lang('lang_v1.location_from'):
    <address>
      <strong>{{ $location_details['sell']->name }}</strong>
    </address>
  </div>

  <div class="col-md-4 invoice-col">
    @lang('Customer'):
    <address>
      <strong>{{ $location_details['purchase']->name }}</strong>
      
      @if(!empty($location_details['purchase']->landmark))
        <br>{{$location_details['purchase']->landmark}}
      @endif

      @if(!empty($location_details['purchase']->city) || !empty($location_details['purchase']->state) || !empty($location_details['purchase']->country))
        <br>{{implode(',', array_filter([$location_details['purchase']->city, $location_details['purchase']->state, $location_details['purchase']->country]))}}
      @endif

      @if(!empty($sell_transfer->contact->tax_number))
        <br>@lang('contact.tax_no'): {{$sell_transfer->contact->tax_number}}
      @endif

      @if(!empty($location_details['purchase']->mobile))
        <br>@lang('contact.mobile'): {{$location_details['purchase']->mobile}}
      @endif
     
    </address>
  </div>

  <div class="col-sm-4 invoice-col">
    <b>@lang('purchase.ref_no'):</b> #{{ $sell_transfer->ref_no }}<br/>
    <b>@lang('messages.date'):</b> {{ @format_date($sell_transfer->transaction_date) }}<br/>
  </div>
</div>

<br>
<div class="row">
  <div class="col-xs-12">
    <div class="table-responsive">
      <table class="table bg-gray">
        <tr class="bg-green">
          <th>#</th>
          <th>@lang('sale.product')</th>
          <th>@lang('sale.qty')</th>
          <th>Product Rack</th>
          <th>Product Row</th>
          <th>Product Position</th>
        </tr>
  
        @foreach($sell_transfer->sell_lines as $sell_lines)
             @php
		        $raks=DB::table('product_racks')->where('product_id',$sell_lines->product->id)->whereNotNull('rack')->get();
		    @endphp
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              {{ $sell_lines->product->sku }}
               
            </td>
            <td>{{ @format_quantity($sell_lines->quantity) }} {{$sell_lines->product->unit->short_name ?? ""}}</td>
            
            <td>
			    @foreach($raks as $item)
			    {{$item->rack.' '}}
			    @endforeach
			</td>
			<td>@foreach($raks as $item)
			    {{$item->row.' '}}
			    @endforeach
			 </td>
			<td>
			    @foreach($raks as $item)
			    {{$item->position.' '}}
			    @endforeach
			</td>
            
          </tr>
          
        @endforeach
      </table>
    </div>
  </div>
</div>
<br>

<div class="row">
  <div class="col-sm-6">
    <strong>@lang('purchase.additional_notes'):</strong><br>
    <p class="well well-sm no-shadow bg-gray">
      @if($sell_transfer->additional_notes)
        {{ $sell_transfer->additional_notes }}
      @else
        --
      @endif
    </p>
  </div>
</div>
