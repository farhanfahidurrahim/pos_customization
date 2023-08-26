@extends('layouts.app')


@section('title', __('contact.view_contact'))

@section('css')


@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>{{ __('contact.view_contact') }}</h1>
</section>

<!-- Main content -->
<section class="content no-print">
	<div class="box">
        <div class="box-header">
        	<h3 class="box-title">
                <i class="fa fa-user margin-r-5"></i>
                @if($contact->type == 'both')
                    @lang( 'contact.contact_info', ['contact' => __('contact.contact') ])
                @else
                    @lang( 'contact.contact_info', ['contact' => ucfirst($contact->type) ])
                @endif
            </h3>
        </div>

        <div class="box-body">
            <div class="col-sm-4">
                <select class="form-control select2" id="contact_id_new">
                    @foreach($items as $item)
                    <option value="{{ $item->id}}" {{ ($item->id == $contact->id) ? 'selected':''}}>{{ $item->name}}</option>
                    @endforeach
                </select>


            </div>
        </div>
    </div>



    <!-- Start Tab -->
    <div class="container-fluid">
      <ul class="nav nav-tabs">


        <li class="{{ (request('view') == '' || request('view') =='ledger') ?'active':''}}"><a data-toggle="tab" href="#home">Ledger</a></li>

        @if( $contact->type != 'supplier')
        <li class="{{ (request('view') =='sell') ?'active':''}}"><a data-toggle="tab" href="#menu2">Sell List</a></li>
        @else
        <li class="{{ (request('view') =='purchase') ?'active':''}}"><a data-toggle="tab" href="#menu1">Purchase List</a></li>
        @endif
        <li class="{{ (request('view') =='payment') ?'active':''}}"><a data-toggle="tab" href="#menu3">Payment</a></li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in {{ (request('view') == '' || request('view') =='ledger') ?'active':''}}" style="width:100%">
          @include('contact.partials.ladger')
        </div>
        <div id="menu1" class="tab-pane fade in {{ (request('view') =='purchase') ?'active':''}}" style="width:100%">
            @include('contact.partials.purchase')
        </div>
        <div id="menu2" class="tab-pane fade in {{ (request('view') =='sell') ?'active':''}}" style="width:100%">
           @include('contact.partials.sell')
        </div>
        <div id="menu3" class="tab-pane fade in {{ (request('view') =='payment') ?'active':''}}" style="width:100%">
             @include('contact.partials.payment')
        </div>
      </div>
    </div>

    <!-- end Tab -->

</section>
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog"
        aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog"
    aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade pay_contact_due_modal" tabindex="-1" role="dialog"
        aria-labelledby="gridSystemModalLabel"></div>
@stop
@section('javascript')
<script type="text/javascript">
$(document).ready( function(){
    //Purchase table
    purchase_table = $('#purchase_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        ajax: '/purchases?supplier_id={{ $contact->id }}',
        columnDefs: [ {
            "targets": 6,
            "orderable": false,
            "searchable": false
        } ],
        columns: [
            { data: 'serial_number', name: 'serial_number'  },
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'ref_no', name: 'ref_no'},
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'name', name: 'contacts.name'},
            { data: 'status', name: 'status'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'total_before_tax', name: 'total_before_tax'},
            { data: 'amount_return', name: 'amount_return'},
            { data: 'amount_paid', name: 'amount_paid'},
            { data: 'final_total', name: 'final_total'},
            { data: 'payment_due', name: 'payment_due'},
            { data: 'action', name: 'action'}
        ],
        "fnDrawCallback": function (oSettings) {

            var total_purchase = sum_table_col($('#purchase_table'), 'final_total');
            $('#footer_purchase_total').text(total_purchase);

            $('#footer_total_due').text(sum_table_col($('#purchase_table'), 'payment_due'));

            var total_purchase_return_due = sum_table_col($('#purchase_table'), 'purchase_return');
            $('#footer_total_purchase_return_due').text(total_purchase_return_due);

            $('#footer_status_count').html(__sum_status_html($('#purchase_table'), 'status-label'));

            $('#footer_payment_status_count').html(
                __sum_status_html($('#purchase_table'), 'payment-status-label')
            );

            __currency_convert_recursively($('#purchase_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(4)').attr('class', 'clickable_td');
        }
    });
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#daterange-btn span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            purchase_table.ajax.url( '/purchases?supplier_id={{ $contact->id }}&start_date=' + start.format('YYYY-MM-DD') +
                '&end_date=' + end.format('YYYY-MM-DD') ).load();
        }
    );
    $('#daterange-btn').on('cancel.daterangepicker', function(ev, picker) {
        purchase_table.ajax.url( '/purchases?supplier_id={{ $contact->id }}').load();
        $('#daterange-btn span').html('<i class="fa fa-calendar"></i> {{ __("messages.filter_by_date") }}');
    });

    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        ajax: '/sells?customer_id={{ $contact->id }}',
        columnDefs: [ {
            "targets": 7,
            "orderable": false,
            "searchable": false
        } ],
        columns: [
            { data: '', name: ''},
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'name', name: 'contacts.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'final_total', name: 'final_total'},
            { data: 'total_paid', searchable: false},
            { data: 'total_remaining', name: 'total_remaining'},
            { data: '', name: ''},
            { data: '', name: ''},
            { data: '', name: ''},
            { data: '', name: ''},
            { data: '', name: ''},
            { data: 'action', name: 'action'}
        ],
        "fnDrawCallback": function (oSettings) {
            $('#footer_sale_total').text(sum_table_col($('#sell_table'), 'final-total'));
            $('#footer_total_paid').text(sum_table_col($('#sell_table'), 'total-paid'));

            $('#footer_total_remaining').text(sum_table_col($('#sell_table'), 'payment_due'));

            $('#footer_total_sell_return_due').text(sum_table_col($('#sell_table'), 'sell_return_due'));

            $('#footer_payment_status_count').html(__sum_status_html($('#sell_table'), 'payment-status-label'));
            __currency_convert_recursively($('#sell_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(3)').attr('class', 'clickable_td');
        }
    });
    $('#sells-daterange-btn').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sells-daterange-btn span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            sell_table.ajax.url( '/sells?customer_id={{ $contact->id }}&start_date=' + start.format('YYYY-MM-DD') +
                '&end_date=' + end.format('YYYY-MM-DD') ).load();
        }
    );
    $('#sells-daterange-btn').on('cancel.daterangepicker', function(ev, picker) {
        sell_table.ajax.url( '/sells?customer_id={{ $contact->id }}').load();
        $('#daterange-btn span').html('<i class="fa fa-calendar"></i> {{ __("messages.filter_by_date") }}');
    });

    //Opening balance payment ob_payment_table
    ob_payment_table = $('#ob_payment_table').DataTable({
    processing: true,
    serverSide: true,
    aaSorting: [[0, 'desc']],
    ajax: '/payments/opening-balance/{{ $contact->id }}',
    columns: [
        { data: 'serial_number', name: 'serial_number', orderable: false, searchable: false },
        { data: 'payment_ref_no', name: 'payment_ref_no'  },
        { data: 'paid_on', name: 'paid_on'  },
        { data: 'amount', name: 'transaction_payments.amount'  },
        { data: 'method', name: 'method' },
        { data: 'type', name: 'type' },
        { data: 'date', name: 'date' },
        { data: 'created_by', name: 'created_by' },
        { data: 'action', "orderable": false, "searchable": false },
    ],
    "fnDrawCallback": function (oSettings) {
        __currency_convert_recursively($('#ob_payment_table'));
    }
});


    @if( in_array($contact->type, ['supplier', 'both']) )
    //Purchase return table
    purchase_return_table = $('#purchase_return_datatable').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        ajax: {
            url: '/purchase-return',
            data: function(d) {
                d.supplier_id = {{$contact->id}}
            }
        },
        columnDefs: [ {
            "targets": [7, 8],
            "orderable": false,
            "searchable": false
        } ],
        columns: [
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'ref_no', name: 'ref_no'},
            { data: 'parent_purchase', name: 'T.ref_no'},
            { data: 'location_name', name: 'BS.name'},
            { data: 'name', name: 'contacts.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'final_total', name: 'final_total'},
            { data: 'payment_due', name: 'payment_due'},
            { data: 'action', name: 'action'}
        ],
        "fnDrawCallback": function (oSettings) {
            var total_purchase = sum_table_col($('#purchase_return_datatable'), 'final_total');
            $('#footer_purchase_return_total').text(total_purchase);

            $('#footer_payment_status_count').html(__sum_status_html($('#purchase_return_datatable'), 'payment-status-label'));

            var total_due = sum_table_col($('#purchase_return_datatable'), 'payment_due');
            $('#footer_total_due').text(total_due);

            __currency_convert_recursively($('#purchase_return_datatable'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(5)').attr('class', 'clickable_td');
        }
    });
    //Date range as a button
    $('#daterange-btn-pr').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#daterange-btn-pr span').html(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            purchase_return_table.ajax.url( '/purchase-return?start_date=' + start.format('YYYY-MM-DD') +
                '&end_date=' + end.format('YYYY-MM-DD') ).load();
        }
    );
    $('#daterange-btn-pr').on('cancel.daterangepicker', function(ev, picker) {
        purchase_return_table.ajax.url( '/purchase-return').load();
        $('#daterange-btn-pr span').html('<i class="fa fa-calendar"></i> {{ __("messages.filter_by_date") }}');
    });
    @endif

    @if( in_array($contact->type, ['customer', 'both']) )

    //Date range as a button
    $('#daterange-btn-sr').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#daterange-btn-sr span').html(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            sell_return_table.ajax.url( '/sell-return?start_date=' + start.format('YYYY-MM-DD') + '&end_date=' + end.format('YYYY-MM-DD') ).load();
        }
    );
    $('#daterange-btn-sr').on('cancel.daterangepicker', function(ev, picker) {
        sell_return_table.ajax.url( '/sell-return').load();
        $('#daterange-btn-sr span').html('<i class="fa fa-calendar"></i> {{ __("messages.filter_by_date") }}');
    });
    sell_return_table = $('#sell_return_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        "ajax": {
            "url": "/sell-return",
            "data": function ( d ) {
                var start = $('#daterange-btn-sr').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var end = $('#daterange-btn-sr').data('daterangepicker').endDate.format('YYYY-MM-DD');
                d.start_date = start;
                d.end_date = end;
                d.customer_id = {{$contact->id}}
            }
        },
        columnDefs: [ {
            "targets": [7, 8],
            "orderable": false,
            "searchable": false
        } ],
        columns: [
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'parent_sale', name: 'T1.invoice_no'},
            { data: 'name', name: 'contacts.name'},
            { data: 'business_location', name: 'bl.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'final_total', name: 'final_total'},
            { data: 'payment_due', name: 'payment_due'},
            { data: 'action', name: 'action'}
        ],
        "fnDrawCallback": function (oSettings) {
            var total_sell = sum_table_col($('#sell_return_table'), 'final_total');
            $('#footer_sell_return_total').text(total_sell);

            $('#footer_payment_status_count_sr').html(__sum_status_html($('#sell_return_table'), 'payment-status-label'));

            var total_due = sum_table_col($('#sell_return_table'), 'payment_due');
            $('#footer_total_due_sr').text(total_due);

            __currency_convert_recursively($('#sell_return_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(2)').attr('class', 'clickable_td');
        }
    });
    @endif
});

$('table#purchase_table').on('click', 'a.delete-purchase', function(e){
    e.preventDefault();
    swal({
      title: LANG.sure,
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            var href = $(this).attr('href');
            $.ajax({
                method: "DELETE",
                url: href,
                dataType: "json",
                success: function(result){
                    if(result.success == true){
                        toastr.success(result.msg);
                        purchase_table.ajax.reload();
                    } else {
                        toastr.error(result.msg);
                    }
                }
            });
        }
    });
});

$(document).ready(function () {

      $('select#contact_id_new').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var id = this.value;

        window.location.href="https://smtrading.maaoshi.com/pos/contacts/"+id;

    });

    getTransaction();

});



function getTransaction(){

    var id='{{ $contact->id}}';
    $.ajax({
        url: "{{ url('/payments/get-contact-transaction')}}/"+ id,
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('div#transaction_data').html(response.html);
        }
    });

}

</script>
<script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>

@endsection
