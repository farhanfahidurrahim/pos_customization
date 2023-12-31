<div class="table-responsive">
    <table class="table table-bordered table-striped ajax_view table-text-center" id="product_table">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all-row"></th>
                <th>Image</th>
                <th>@lang('sale.product')</th>
                {{-- <th>Variations</th> --}}
                <th>Product Price</th>
                <th>Price Including Vat/Tax</th>
                <th>Margin(%)</th>
                <th>Selling Price with Margin</th>
                <th>@lang('report.current_stock')</th>
                <th>@lang('product.product_type')</th>
                <th>@lang('product.category')</th>
                <th>@lang('product.sub_category')</th>
                <th>@lang('product.brand')</th>
                <th>@lang('product.tax')</th>
                <th>@lang('product.sku')</th>
                <th>Barcode Number</th>
                <th>@lang('messages.action')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="11">
                <div style="display: flex; width: 100%;">
                    @can('product.delete')
                        {!! Form::open(['url' => route('products.massDestroy'), 'method' => 'post', 'id' => 'mass_delete_form' ]) !!}
                        {!! Form::hidden('selected_rows', null, ['id' => 'selected_rows']); !!}
                        {!! Form::submit(__('lang_v1.delete_selected'), array('class' => 'btn btn-xs btn-danger', 'id' => 'delete-selected')) !!}
                        {!! Form::close() !!}
                    @endcan
                    &nbsp;
                    {!! Form::open(['url' => route('products.massDeactivate'), 'method' => 'post', 'id' => 'mass_deactivate_form' ]) !!}
                    {!! Form::hidden('selected_products', null, ['id' => 'selected_products']); !!}
                    {!! Form::submit(__('lang_v1.deactivate_selected'), array('class' => 'btn btn-xs btn-warning', 'id' => 'deactivate-selected')) !!}
                    {!! Form::close() !!} @show_tooltip(__('lang_v1.deactive_product_tooltip'))
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
