@extends('layouts.app')
@section('title', __('Item Report'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Item Report </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @component('components.filters', ['title' => __('report.filters')])

              {!! Form::open(['url' => route('report.getCustomerGroup'), 'method' => 'get', 'id' => 'cg_report_filter_form' ]) !!}


                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('location_id',  __('purchase.business_location') . ':') !!}
                        {!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('customer_id',  __('Customer') . ':') !!}
                        {!! Form::select('customer_id', $customers, null, ['class' => 'form-control select2', 'style' => 'width:100%']); !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('supplier_id',  __('Supplier') . ':') !!}
                        {!! Form::select('supplier_id', $suppliers, null, ['class' => 'form-control select2', 'style' => 'width:100%']); !!}
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('sell_date_range', __('Sell Date Filter') . ':') !!}
                        {!! Form::text('sell_date_range', @format_date('first day of this month') . ' ~ ' . @format_date('last day of this month'), ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); !!}
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('purchase_date_range', __('Purchase Date Filter') . ':') !!}
                        {!! Form::text('purchase_date_range', @format_date('first day of this month') . ' ~ ' . @format_date('last day of this month'), ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); !!}
                    </div>
                </div>


                {!! Form::close() !!}
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @component('components.widget', ['class' => 'box-primary'])
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="item_report_table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Sku</th>
                            <th>Purchase Date</th>
                            <th>Purchase</th>
                            <th>Supplier</th>
                            <th>Purchase Price</th>
                            <th>Sale Date</th>
                            <th>Sale</th>
                            <th>Customer</th>
                            <th>Quantity</th>
                            <th>Selling Price</th>
                            <th>@lang('report.total_sell')</th>
                        </tr>
                    </thead>
                </table>
            </div>
            @endcomponent
        </div>
    </div>
</section>
<!-- /.content -->

@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function(){

            if($('#sell_date_range').length == 1){
                $('#sell_date_range').daterangepicker({
                    ranges: ranges,
                    autoUpdateInput: false,
                    locale: {
                        format: moment_date_format
                    }
                });
                $('#sell_date_range').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format(moment_date_format) + ' ~ ' + picker.endDate.format(moment_date_format));
                    item_report.ajax.reload();
                });

                $('#sell_date_range').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                    item_report.ajax.reload();
                });
            }


            if($('#purchase_date_range').length == 1){
                $('#purchase_date_range').daterangepicker({
                    ranges: ranges,
                    autoUpdateInput: false,
                    locale: {
                        format: moment_date_format
                    }
                });
                $('#purchase_date_range').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format(moment_date_format) + ' ~ ' + picker.endDate.format(moment_date_format));
                    item_report.ajax.reload();
                });

                $('#purchase_date_range').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                    item_report.ajax.reload();
                });
            }


            item_report = $('#item_report_table').DataTable({
                            processing: true,
                            serverSide: true,
                            "ajax": {
                                "url": "/reports/item-report",
                                "data": function ( d ) {
                                    d.location_id = $('#location_id').val();
                                    d.customer_id = $('#customer_id').val();
                                    d.supplier_id = $('#supplier_id').val();
                                    d.sell_start_date = $('#sell_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                                    d.sell_end_date = $('#sell_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                                    d.purchase_start_date = $('#purchase_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                                    d.purchase_end_date = $('#purchase_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                                }
                            },
                            columns: [
                                {data: 'name', name: 'p.name'},
                                {data: 'sku', name: 'p.sku'},
                                {data: 'purchase_date', name: 'purchase.transaction_date'},
                                {data: 'type', name: 'purchase.type'},
                                {data: 'supplier', name: 'supplier.name'},
                                {data: 'purchase_price_inc_tax', name: 'PL.purchase_price_inc_tax'},
                                {data: 'sell_date', name: 'sells.transaction_date'},
                                {data: 'invoice_no', name: 'sells.invoice_no'},
                                {data: 'customer', name: 'contacts.name'},
                                {data: 'quantity', name: 'TSLPl.quantity'},
                                {data: 'unit_price_inc_tax', name: 'TSL.unit_price_inc_tax'},
                                {data: 'sub_total', name: 'sub_total',"searchable": false}

                            ],
                            "fnDrawCallback": function (oSettings) {
                                __currency_convert_recursively($('#item_report_table'));
                            }
                        });
            //Customer Group report filter
            $('select#customer_id, select#location_id, select#supplier_id, #purchase_date_range, #sell_date_range').change( function(){
                item_report.ajax.reload();
            });
        })
    </script>
@endsection
