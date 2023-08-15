@extends('layouts.app')
@section('title', __('home.home'))

{{-- @section('css')
    {!! Charts::styles(['highcharts']) !!}
@endsection
 --}}
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ __('home.welcome_message', ['name' => Session::get('user.first_name')]) }}
    </h1>
</section>
@if(auth()->user()->can('dashboard.data'))
<!-- Main content -->
<section class="content no-print">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="btn-group pull-right" data-toggle="buttons">
				<label class="btn btn-info active">
    				<input type="radio" name="date-filter"
    				data-start="{{ date('Y-m-d') }}"
    				data-end="{{ date('Y-m-d') }}"
    				checked> {{ __('home.today') }}
  				</label>
  				<label class="btn btn-info">
    				<input type="radio" name="date-filter"
    				data-start="{{ $date_filters['this_week']['start']}}"
    				data-end="{{ $date_filters['this_week']['end']}}"
    				> {{ __('home.this_week') }}
  				</label>
  				<label class="btn btn-info">
    				<input type="radio" name="date-filter"
    				data-start="{{ $date_filters['this_month']['start']}}"
    				data-end="{{ $date_filters['this_month']['end']}}"
    				> {{ __('home.this_month') }}
  				</label>
  				<label class="btn btn-info">
    				<input type="radio" name="date-filter"
    				data-start="{{ $date_filters['this_fy']['start']}}"
    				data-end="{{ $date_filters['this_fy']['end']}}"
    				> {{ __('home.this_fy') }}
  				</label>
            </div>
		</div>
	</div>
	<br>
	<style>
	    .purchase {color:white;background: #f44336;} .purchase-due {color:white;background: #e91e63;}
	    .sales {color:white;background: #4caf50;} .sales-due {color:white;background: #009688;}
	    .income {color:white;background: #8bc34a;} .income-due {color:white;background: #00a65a;}
	    .expense {color:white;background: #ffc107;} .expense-due {color:white;background: #ff9800;}
	    .customers {color:white;background: #3f51b5;}
	    .suppliers {color:white;background: #673ab7;}
	    .invoice-purchase {color:white;background: #2196f3;} .invoice-sales {color:white;background: #00bcd4;}
	</style>
	<div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon purchase"><i class="bi bi-bag-plus"></i></span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('home.total_purchase') }}</span>
	          <span class="info-box-number total_purchase"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>

	    <!-- /.col -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon purchase-due">
	        	<i class="bi bi-bag-plus"></i>
				<i class="fa fa-exclamation"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('home.purchase_due') }}</span>
	          <span class="info-box-number purchase_due"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->

	    <!-- /.col -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon sales">
	            <i class="bi bi-cart-check"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('home.total_sell') }}</span>
	          <span class="info-box-number total_sell">
	              <i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>


	    <!-- fix for small devices only -->
	    <!-- <div class="clearfix visible-sm-block"></div> -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon sales-due">
	        	<i class="bi bi-cart-check"></i>
	        	<i class="fa fa-exclamation"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text"> Sell Due</span>
	          <span class="info-box-number invoice_due"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->
  	</div>


  	<div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon income">
	            <i class="bi bi-cash-stack"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('Total Income') }}</span>
	          <span class="info-box-number total_income"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>

	    <!-- /.col -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon income-due">
	        	<i class="bi bi-cash-stack"></i>
				<i class="fa fa-exclamation"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('Total Income Due') }}</span>
	          <span class="info-box-number income_due"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->


	    <!-- /.col -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon expense">
	            <i class="bi bi-credit-card-2-back"></i>
	            </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('Total Expense') }}</span>
	          <span class="info-box-number total_expense"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>


	    <!-- fix for small devices only -->
	    <!-- <div class="clearfix visible-sm-block"></div> -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon expense-due">
	        	<i class="bi bi-credit-card-2-back"></i>
	        	<i class="fa fa-exclamation"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('Total Expense Due') }}</span>
	          <span class="info-box-number expense_due"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->
  	</div>

  	<div style="border-top:2px solid #3f51b5; margin-bottom:15px">
  	</div>

  	<div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon customers">
	            <i class="bi bi-person"></i>
	            </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('CUSTOMERS') }}</span>
	          <span class="info-box-number total_customer"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon suppliers">
	            <i class="bi bi-person"></i>
	            </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('SUPPLIERS') }}</span>
	          <span class="info-box-number total_supplier"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon invoice-purchase">
	        	<i class="bi bi-receipt"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('INVOICE PURCHASE') }}</span>
	          <span class="info-box-number total_purchase_invoice"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->

	    <!-- fix for small devices only -->
	    <!-- <div class="clearfix visible-sm-block"></div> -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon invoice-sales">
	        	<i class="bi bi-receipt-cutoff"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text">{{ __('INVOICE SALES') }}</span>
	          <span class="info-box-number total_sell_invoice"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->
  	</div>



  	<br>
    @if(!empty($widgets['after_sale_purchase_totals']))
      @foreach($widgets['after_sale_purchase_totals'] as $widget)
        {!! $widget !!}
      @endforeach
    @endif

</section>
<!-- /.content -->
@stop
@section('javascript')
    <script src="{{ asset('js/home.js?v=' . $asset_v) }}"></script>
{{--     {!! Charts::assets(['highcharts']) !!}
    {!! $sells_chart_1->script() !!}
    {!! $sells_chart_2->script() !!} --}}
@endif
@endsection

