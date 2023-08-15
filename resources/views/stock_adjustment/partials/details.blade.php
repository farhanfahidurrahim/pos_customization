<div class="row">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1">
		<div class="table-responsive">
			<table class="table table-condensed bg-gray">
				<tr>
					<th>@lang('sale.product')</th>
					@if(!empty($lot_n_exp_enabled))
                		<th>{{ __('lang_v1.lot_n_expiry') }}</th>
              		@endif
					<th>@lang('sale.qty')</th>
					<th>Product Rack</th>
					<th>Product Row</th>
					<th>Product Position</th>
				</tr>
				@foreach( $stock_adjustment_details as $details )
				
				    @php
				        $raks=DB::table('product_racks')->where('product_id',$details->product_id)->whereNotNull('rack')->get();
				    @endphp
					<tr>
						<td>
						
							( {{ $details->sub_sku }} )
						</td>
						@if(!empty($lot_n_exp_enabled))
                			<td>{{ $details->lot_number or '--' }}
			                  @if( session()->get('business.enable_product_expiry') == 1 && !empty($details->exp_date))
			                    ({{@format_date($details->exp_date)}})
			                  @endif
			                </td>
              			@endif
						<td>
							{{@format_quantity($details->quantity)}}
						</td>
						
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