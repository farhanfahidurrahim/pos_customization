<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => route('account.store'), 'method' => 'post', 'id' => 'payment_account_form' ]) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang( 'account.add_account' )</h4>
    </div>

    <div class="modal-body">

            <div class="form-group">
                {!! Form::label('bank_name', __( 'Bank Name' ) .":*") !!}
                {!! Form::text('bank_name', null, ['class' => 'form-control', 'required','placeholder' => __( 'Bank Name' ) ]); !!}
            </div>

            <div class="form-group">
                {!! Form::label('branch_name', __( 'Branch Name' ) .":*") !!}
                {!! Form::text('branch_name', null, ['class' => 'form-control', 'required','placeholder' => __( 'Branch Name' ) ]); !!}
            </div>

            {{-- <div class="form-group">
                {!! Form::label('account_type', __( 'Account Type' ) .":*") !!}
                {!! Form::text('account_type', null, ['class' => 'form-control', 'required','placeholder' => __( 'Account Type' ) ]); !!}
            </div> --}}

            <div class="form-group">
                {!! Form::label('name', __( 'lang_v1.name' ) .":*") !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required','placeholder' => __( 'lang_v1.name' ) ]); !!}
            </div>

            <div class="form-group">
                {!! Form::label('account_number', __( 'account.account_number' ) .":*") !!}
                {!! Form::text('account_number', null, ['class' => 'form-control', 'required','placeholder' => __( 'account.account_number' ) ]); !!}
            </div>


            <div class="form-group">
                {!! Form::label('account_type', __( 'account.account_type' ) .":") !!}
                {!! Form::select('account_type', $account_types, null, ['class' => 'form-control']); !!}
            </div>


            <div class="form-group">
                {!! Form::label('opening_balance', __( 'account.opening_balance' ) .":") !!}
                {!! Form::text('opening_balance', 0, ['class' => 'form-control input_number','placeholder' => __( 'account.opening_balance' ) ]); !!}
            </div>


            <div class="form-group">
                {!! Form::label('note', __( 'brand.note' )) !!}
                {!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => __( 'brand.note' ), 'rows' => 4]); !!}
            </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
