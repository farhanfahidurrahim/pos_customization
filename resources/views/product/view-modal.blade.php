<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modalTitle">{{ $product->name }}</h4>
            <h5 class="modal-title" id="modalTitle"><span style="font-weight: bold;">Barcode:</span>
                {{ $product->barcode_number }}</h5>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-9">
                    <div class="col-sm-4 invoice-col">
                        <b>@lang('product.sku'):</b>
                        {{ $product->sku }}<br>

                        <b>@lang('product.brand'): </b>
                        @if ($product->brand)
                            {{ $product->brand->name }}
                        @else
                            --
                        @endif
                        <br>

                        <b>@lang('product.unit'): </b>
                        @if ($product->unit)
                            {{ $product->unit->short_name }}
                        @else
                            --
                        @endif
                        <br>

                        <b>@lang('product.barcode_type'): </b>
                        @if ($product->barcode_type)
                            {{ $product->barcode_type }}
                        @else
                            --
                        @endif
                        <br>

                        @if (!empty($product->product_custom_field1))
                            <br />
                            <b>@lang('lang_v1.product_custom_field1'): </b>
                            {{ $product->product_custom_field1 }}
                        @endif
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <b>@lang('product.category'): </b>
                        @if ($product->category)
                            {{ $product->category->name }}
                        @else
                            -- {{-- Display a default value when business location is not available --}}
                        @endif
                        <br>

                        <b>@lang('product.sub_category'): </b>
                        @if (!empty($product->sub_category))
                            {{ $product->sub_category->name }}
                        @else
                            -- {{-- Display a default value when sub_category is null --}}
                        @endif
                        <br>

                        <b>@lang('product.manage_stock'): </b>
                        @if ($product->enable_stock)
                            @lang('messages.yes')
                        @else
                            @lang('messages.no')
                        @endif
                        <br>
                        @if ($product->enable_stock)
                            <b>@lang('product.alert_quantity'): </b>
                            {{ $product->alert_quantity or '--' }}
                        @endif
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <b>@lang('product.expires_in'): </b>
                        @php
                            $expiry_array = ['months' => __('product.months'), 'days' => __('product.days'), '' => __('product.not_applicable')];
                        @endphp
                        @if (!empty($product->expiry_period) && !empty($product->expiry_period_type))
                            {{ $product->expiry_period }} {{ $expiry_array[$product->expiry_period_type] }}
                        @else
                            {{ $expiry_array[''] }}
                        @endif
                        <br>
                        @if ($product->weight)
                            <b>@lang('lang_v1.weight'): </b>
                            {{ $product->weight }}<br>
                        @endif

                        <b>@lang('product.applicable_tax'): </b>
                        @if ($product->product_tax)
                            {{ $product->product_tax->name }}
                        @else
                            -- {{-- Display a default value when business location is not available --}}
                        @endif
                        <br>

                        @php
                            $tax_type = ['inclusive' => __('product.inclusive'), 'exclusive' => __('product.exclusive')];
                        @endphp
                        <b>@lang('product.selling_price_tax_type'): </b>
                        {{ $tax_type[$product->tax_type] }}<br>
                        <b>@lang('product.product_type'): </b>
                        @lang('lang_v1.' . $product->type)

                    </div>
                    <div class="clearfix"></div>
                        <br>
                    <div class="col-sm-12">
                        <b>@lang('Available in Locations'): </b>
                        @if ($product->businessLocation)
                            {{ $product->businessLocation->name }}
                        @else
                            -- {{-- Display a default value when business location is not available --}}
                        @endif
                        <br>
                        <b>@lang('Created By'): </b>
                        @if ($product->user)
                            {{ $product->user->name }}
                        @else
                            --
                        @endif
                        <br>
                        <b>@lang('Created At'): </b>
                        @if ($product->created_at)
                            {{ $product->created_at }}
                        @else
                            --
                        @endif
                        <br>
                        <br>
                        <b>@lang('Has IMEI / Model No'): </b>
                        @if ($product->needwork)
                            {{ $product->needwork }}
                        @else
                            --
                        @endif
                        <br>
                        <b>@lang('Warranty'): </b>
                        @if ($product->needwork)
                            {{ $product->needwork }}
                        @else
                            --
                        @endif
                        <br>
                        <b>@lang('Updated By'): </b>
                        @if ($product->needwork)
                            {{ $product->needwork }}
                        @else
                            --
                        @endif
                        <br>
                        <b>@lang('Updated At'): </b>
                        @if ($product->needwork)
                            {{ $product->needwork }}
                        @else
                            --
                        @endif
                        <br>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 invoice-col">
                    <div class="thumbnail">
                        <img src="{{ $product->image_url }}" alt="Product image">
                    </div>
                </div>
            </div>
            @if ($rack_details->count())
                @if (session('business.enable_racks') || session('business.enable_row') || session('business.enable_position'))
                    <div class="row">
                        <div class="col-md-12">
                            <h4>@lang('lang_v1.rack_details'):</h4>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-condensed bg-gray">
                                    <tr class="bg-green">
                                        <th>@lang('business.location')</th>
                                        @if (session('business.enable_racks'))
                                            <th>@lang('lang_v1.rack')</th>
                                        @endif
                                        @if (session('business.enable_row'))
                                            <th>@lang('lang_v1.row')</th>
                                        @endif
                                        @if (session('business.enable_position'))
                                            <th>@lang('lang_v1.position')</th>
                                        @endif
                                    </tr>
                                    @foreach ($rack_details as $rd)
                                        <tr>
                                            <td>{{ $rd->name }}</td>
                                            @if (session('business.enable_racks'))
                                                <td>{{ $rd->rack }}</td>
                                            @endif
                                            @if (session('business.enable_row'))
                                                <td>{{ $rd->row }}</td>
                                            @endif
                                            @if (session('business.enable_position'))
                                                <td>{{ $rd->position }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if ($product->type == 'single')
                @include('product.partials.single_product_details')
            @else
                @include('product.partials.variable_product_details')
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary no-print" aria-label="Print"
                onclick="$(this).closest('div.modal').printThis();">
                <i class="fa fa-print"></i> @lang('messages.print')
            </button>
            <button type="button" class="btn btn-default no-print" data-dismiss="modal">@lang('messages.close')</button>
        </div>
    </div>
</div>
