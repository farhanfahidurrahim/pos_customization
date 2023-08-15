
@if(!empty($accounts))
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label("account_$row_index" , __('lang_v1.payment_account') . ':') !!}
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-money"></i>
				</span>
				{!! Form::select("payment[$row_index][account_id]", $accounts, !empty($payment_line['account_id']) ? $payment_line['account_id'] : '' , ['class' => 'form-control select2', 'id' => "account_$row_index", 'style' => 'width:100%;']); !!}
			</div>
		</div>
	</div>
@endif

<div class="payment_details_div @if( $payment_line['method'] !== 'card' ) {{ 'hide' }} @endif" data-type="card" >
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label("card_number_$row_index", __('lang_v1.card_no')) !!}
			{!! Form::text("payment[$row_index][card_number]", $payment_line['card_number'], ['class' => 'form-control', 'placeholder' => __('lang_v1.card_no'), 'id' => "card_number_$row_index"]); !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label("card_holder_name_$row_index", __('lang_v1.card_holder_name')) !!}
			{!! Form::text("payment[$row_index][card_holder_name]", $payment_line['card_holder_name'], ['class' => 'form-control', 'placeholder' => __('lang_v1.card_holder_name'), 'id' => "card_holder_name_$row_index"]); !!}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::label("card_transaction_number_$row_index",__('lang_v1.card_transaction_no')) !!}
			{!! Form::text("payment[$row_index][card_transaction_number]", $payment_line['card_transaction_number'], ['class' => 'form-control', 'placeholder' => __('lang_v1.card_transaction_no'), 'id' => "card_transaction_number_$row_index"]); !!}
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-3">
		<div class="form-group">
			{!! Form::label("card_type_$row_index", __('lang_v1.card_type')) !!}
			{!! Form::select("payment[$row_index][card_type]", ['credit' => 'Credit Card', 'debit' => 'Debit Card','visa' => 'Visa', 'master' => 'MasterCard'], $payment_line['card_type'],['class' => 'form-control', 'id' => "card_type_$row_index" ]); !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{!! Form::label("card_month_$row_index", __('lang_v1.month')) !!}
			{!! Form::text("payment[$row_index][card_month]", $payment_line['card_month'], ['class' => 'form-control', 'placeholder' => __('lang_v1.month'),
			'id' => "card_month_$row_index" ]); !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{!! Form::label("card_year_$row_index", __('lang_v1.year')) !!}
			{!! Form::text("payment[$row_index][card_year]", $payment_line['card_year'], ['class' => 'form-control', 'placeholder' => __('lang_v1.year'), 'id' => "card_year_$row_index" ]); !!}
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{!! Form::label("card_security_$row_index",__('lang_v1.security_code')) !!}
			{!! Form::text("payment[$row_index][card_security]", $payment_line['card_security'], ['class' => 'form-control', 'placeholder' => __('lang_v1.security_code'), 'id' => "card_security_$row_index"]); !!}
		</div>
	</div>
	<div class="clearfix"></div>
</div>





<div class="payment_details_div @if( $payment_line['method'] !== 'bkash' ) {{ 'hide' }} @endif" data-type="bkash" >
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label("cheque_number_$row_index",__('Bkash Number')) !!}
			{!! Form::text("payment[$row_index][transaction_no_5]", $payment_line['transaction_no'], ['class' => 'form-control', 'placeholder' => __('Bkash Number'), 'id' => "cheque_number_$row_index"]); !!}
		</div>
	</div>
</div>

<div class="payment_details_div @if( $payment_line['method'] !== 'rocket' ) {{ 'hide' }} @endif" data-type="rocket" >
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label("cheque_number_$row_index",__('Rocket Number')) !!}
			{!! Form::text("payment[$row_index][transaction_no_6]", $payment_line['transaction_no'], ['class' => 'form-control', 'placeholder' => __('Rocket Number'), 'id' => "cheque_number_$row_index"]); !!}
		</div>
	</div>
</div>


<div class="payment_details_div @if( $payment_line['method'] !== 'nogod' ) {{ 'hide' }} @endif" data-type="nogod" >
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label("cheque_number_$row_index",__('Nogod Number')) !!}
			{!! Form::text("payment[$row_index][transaction_no_7]", $payment_line['transaction_no'], ['class' => 'form-control', 'placeholder' => __('Nogod Number'), 'id' => "cheque_number_$row_index"]); !!}
		</div>
	</div>
</div>



<div class="payment_details_div @if( $payment_line['method'] !== 'cheque' ) {{ 'hide' }} @endif" data-type="cheque" >


	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label("cheque_number_$row_index",__('lang_v1.cheque_no')) !!}
			{!! Form::text("payment[$row_index][cheque_number]", $payment_line['cheque_number'], ['class' => 'form-control', 'placeholder' => __('lang_v1.cheque_no'), 'id' => "cheque_number_$row_index"]); !!}
		</div>
	</div>
</div>


<div class="payment_details_div @if( $payment_line['method'] !== 'bank_transfer' ) {{ 'hide' }} @endif" data-type="bank_transfer" >
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label("bank_account_number_$row_index",__('lang_v1.bank_account_number')) !!}
			{!! Form::text( "payment[$row_index][bank_account_number]", $payment_line['bank_account_number'], ['class' => 'form-control', 'placeholder' => __('lang_v1.bank_account_number'), 'id' => "bank_account_number_$row_index"]); !!}
		</div>
	</div>
</div>
<div class="payment_details_div @if( $payment_line['method'] !== 'custom_pay_1' ) {{ 'hide' }} @endif" data-type="custom_pay_1" >
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label("transaction_no_1_$row_index", __('lang_v1.transaction_no')) !!}
			{!! Form::text("payment[$row_index][transaction_no_1]", $payment_line['transaction_no'], ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'), 'id' => "transaction_no_1_$row_index"]); !!}
		</div>
	</div>
</div>
<div class="payment_details_div @if( $payment_line['method'] !== 'custom_pay_2' ) {{ 'hide' }} @endif" data-type="custom_pay_2" >
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label("transaction_no_2_$row_index", __('lang_v1.transaction_no')) !!}
			{!! Form::text("payment[$row_index][transaction_no_2]", $payment_line['transaction_no'], ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'), 'id' => "transaction_no_2_$row_index"]); !!}
		</div>
	</div>
</div>
<div class="payment_details_div @if( $payment_line['method'] !== 'custom_pay_3' ) {{ 'hide' }} @endif" data-type="custom_pay_3" >
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label("transaction_no_3_$row_index", __('lang_v1.transaction_no')) !!}
			{!! Form::text("payment[$row_index][transaction_no_3]", $payment_line['transaction_no'], ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'), 'id' => "transaction_no_3_$row_index"]); !!}
		</div>
	</div>
</div>

<div class="payment_details_div @if( $payment_line['method'] !== 'advance' ) {{ 'hide' }} @endif" data-type="advance" >
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label("transaction_no_8_$row_index", __('lang_v1.transaction_no')) !!}
			{!! Form::text("payment[$row_index][transaction_no_8]", $payment_line['transaction_no'], ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no'), 'id' => "transaction_no_8_$row_index"]); !!}
		</div>
	</div>
</div>