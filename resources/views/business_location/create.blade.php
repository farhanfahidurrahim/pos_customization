<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open([
            'url' => route('business-location.store'),
            'method' => 'post',
            'id' => 'business_location_add_form',
        ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang('business.add_business_location')</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('name', __('invoice.name') . ':*') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __('invoice.name')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('name', __('Owner Name') . ':*') !!}
                        {!! Form::text('owner_name', null, ['class' => 'form-control', 'required', 'placeholder' => __('invoice.name')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('vat', 'VAT Number:') !!}
                        {!! Form::text('vat_number', null, ['class' => 'form-control', 'placeholder' => 'Enter VAT Number']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('vat', 'Tax No:') !!}
                        {!! Form::text('tax_no', null, ['class' => 'form-control', 'placeholder' => 'Enter Tax No']) !!}
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('vat', 'GST Number:') !!}
                        {!! Form::text('gst_number', null, ['class' => 'form-control', 'placeholder' => 'Enter GST Number']) !!}
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('vat', 'IGT Number:') !!}
                        {!! Form::text('igt_number', null, ['class' => 'form-control', 'placeholder' => 'Enter IGT Number']) !!}
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('vat', 'License Number:') !!}
                        {!! Form::text('license_number', null, ['class' => 'form-control', 'placeholder' => 'Enter License Number']) !!}
                    </div>
                </div>

                {{-- <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('image', 'Upload Image:') !!}
                        {!! Form::file('image', ['class' => 'form-control-file']) !!}
                    </div>
                </div> --}}
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('location_id', __('lang_v1.location_id') . ':') !!}
                        {!! Form::text('location_id', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.location_id')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('landmark', __('business.landmark') . ':') !!}
                        {!! Form::text('landmark', null, ['class' => 'form-control', 'placeholder' => __('business.landmark')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('city', __('business.city') . ':*') !!}
                        {!! Form::text('city', '.', ['class' => 'form-control', 'placeholder' => __('business.city'), 'required']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('zip_code', __('business.zip_code') . ':*') !!}
                        {!! Form::text('zip_code', '007', [
                            'class' => 'form-control',
                            'placeholder' => __('business.zip_code'),
                            'required',
                        ]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('state', __('business.state') . ':*') !!}
                        {!! Form::text('state', '.', ['class' => 'form-control', 'placeholder' => __('business.state'), 'required']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('country', __('business.country') . ':*') !!}
                        {!! Form::text('country', '.', ['class' => 'form-control', 'placeholder' => __('business.country'), 'required']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('mobile', __('business.mobile') . ':') !!}
                        {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => __('business.mobile')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('alternate_number', __('business.alternate_number') . ':') !!}
                        {!! Form::text('alternate_number', null, [
                            'class' => 'form-control',
                            'placeholder' => __('business.alternate_number'),
                        ]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('email', __('business.email') . ':') !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('business.email')]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('website', __('lang_v1.website') . ':') !!}
                        {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.website')]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('invoice_scheme_id', __('invoice.invoice_scheme') . ':*') !!} @show_tooltip(__('tooltip.invoice_scheme'))
                        {!! Form::select('invoice_scheme_id', $invoice_schemes, 1, [
                            'class' => 'form-control',
                            'required',
                            'placeholder' => __('messages.please_select'),
                        ]) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('invoice_layout_id', __('invoice.invoice_layout') . ':*') !!} @show_tooltip(__('tooltip.invoice_layout'))
                        {!! Form::select('invoice_layout_id', $invoice_layouts, 1, [
                            'class' => 'form-control',
                            'required',
                            'placeholder' => __('messages.please_select'),
                        ]) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-12">
                </div>

            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">@lang('messages.save')</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
        </div>

        {!! Form::close() !!}

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
