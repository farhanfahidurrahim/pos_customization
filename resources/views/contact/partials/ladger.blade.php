<div class="row">
    <div class="col-sm-4" style="padding:10px">
        <div class="col-sm-12">
            <div class="well well-sm">
                <strong>{{ $contact->name }}</strong><br><br>
                <strong><i class="fa fa-map-marker margin-r-5"></i> @lang('business.address')</strong>
                <p class="text-muted">
                    @if ($contact->landmark)
                        {{ $contact->landmark }}
                    @endif

                    {{ ', ' . $contact->city }}

                    @if ($contact->state)
                        {{ ', ' . $contact->state }}
                    @endif
                    <br>
                    @if ($contact->country)
                        {{ $contact->country }}
                    @endif
                </p>
                @if ($contact->supplier_business_name)
                    <strong><i class="fa fa-briefcase margin-r-5"></i>
                        @lang('business.business_name')</strong>
                    <p class="text-muted">
                        {{ $contact->supplier_business_name }}
                    </p>
                @endif

            </div>
        </div>
        <div class="col-sm-12">
            <div class="well well-sm">
                <strong><i class="fa fa-mobile margin-r-5"></i> @lang('contact.mobile')</strong>
                <p class="text-muted">
                    {{ $contact->mobile }}
                </p>
                @if ($contact->landline)
                    <strong><i class="fa fa-phone margin-r-5"></i> @lang('contact.landline')</strong>
                    <p class="text-muted">
                        {{ $contact->landline }}
                    </p>
                @endif
                @if ($contact->alternate_number)
                    <strong><i class="fa fa-phone margin-r-5"></i> @lang('contact.alternate_contact_number')</strong>
                    <p class="text-muted">
                        {{ $contact->alternate_number }}
                    </p>
                @endif
            </div>
        </div>


        @if ($contact->type == 'supplier' || $contact->type == 'customer')
            <div class="col-sm-12">
                <div class="well well-sm">
                    @if ($contact->tax_number)
                        <strong><i class="fa fa-info margin-r-5"></i> @lang('contact.tax_no')</strong>
                        <p class="text-muted">
                            {{ $contact->tax_number }}
                        </p>
                    @endif
                    @if ($contact->pay_term_type)
                        <strong><i class="fa fa-calendar margin-r-5"></i> @lang('contact.pay_term_period')</strong>
                        <p class="text-muted">
                            {{ ucfirst($contact->pay_term_type) }}
                        </p>
                    @endif
                    {{-- @if ($contact->pay_term_number)
                    <strong><i class="fa fa-handshake-o margin-r-5"></i> @lang('contact.pay_term')</strong>
                    <p class="text-muted">
                        {{ $contact->pay_term_number }}
                    </p>
                @endif --}}
                </div>
            </div>
        @endif
    </div>
    <div class="col-sm-4" style="padding:10px">



        @if ($contact->type == 'supplier' || $contact->type == 'customer')
            <div class="col-sm-12">
                <div class="well well-sm">
                    @if ($contact->vat_number)
                        <strong><i class="fa fa-briefcase margin-r-5"></i>
                            VAT Number</strong>
                        <p class="text-muted">
                            {{ $contact->vat_number }}
                        </p>
                    @endif
                    @if ($contact->gst_number)
                        <strong><i class="fa fa-briefcase margin-r-5"></i>
                            GST Number</strong>
                        <p class="text-muted">
                            {{ $contact->gst_number }}
                        </p>
                    @endif
                    @if ($contact->igt_number)
                        <strong><i class="fa fa-briefcase margin-r-5"></i>
                            IGT Number</strong>
                        <p class="text-muted">
                            {{ $contact->igt_number }}
                        </p>
                    @endif
                    @if ($contact->national_id)
                        <strong><i class="fa fa-briefcase margin-r-5"></i>
                            National ID</strong>
                        <p class="text-muted">
                            {{ $contact->national_id }}
                        </p>
                    @endif
                    @if ($contact->business_license_number)
                        <strong><i class="fa fa-briefcase margin-r-5"></i>
                            Busines License Number</strong>
                        <p class="text-muted">
                            {{ $contact->business_license_number }}
                        </p>
                    @endif
                </div>
            </div>
        @endif
    </div>
    <div class="col-sm-4 text-right" style="padding:10px">
        <div class="well well-sm">
            <h3 class="text-right bg-primary" style="padding:5px">Account Summary</h3>

            @if ($contact->type == 'supplier' || $contact->type == 'both')
                <strong>@lang('report.total_purchase')</strong>
                <p class="text-muted">
                    <span class="display_currency" data-currency_symbol="true">
                        {{ $contact->total_purchase }}</span>
                </p>
                <strong>@lang('contact.total_purchase_paid')</strong>
                <p class="text-muted">
                    <span class="display_currency" data-currency_symbol="true">
                        {{ $contact->purchase_paid }}</span>
                </p>
                <strong>@lang('contact.total_purchase_due')</strong>
                <p class="text-muted">
                    <span class="display_currency" data-currency_symbol="true">
                        {{ $contact->total_purchase - $contact->purchase_paid }}</span>
                </p>
                <strong>@lang('Return Amount')</strong>
                <p class="text-muted">
                    <span class="display_currency" data-currency_symbol="true">
                </p>
            @endif
            @if ($contact->type == 'customer' || $contact->type == 'both')
                <strong>@lang('report.total_sell')</strong>
                <p class="text-muted">
                    <span class="display_currency" data-currency_symbol="true">
                        {{ $contact->total_invoice }}</span>
                </p>
                <strong>@lang('contact.total_sale_paid')</strong>
                <p class="text-muted">
                    <span class="display_currency" data-currency_symbol="true">
                        {{ $contact->invoice_received }}</span>
                </p>
                <strong>@lang('contact.total_sale_due')</strong>
                <p class="text-muted">
                    <span class="display_currency" data-currency_symbol="true">
                        {{ $contact->total_invoice - $contact->invoice_received }}</span>
                </p>
            @endif

            <strong>@lang('lang_v1.opening_balance')</strong>
            <p class="text-muted">
                <span class="display_currency" data-currency_symbol="true">
                    {{ $contact->opening_balance }}</span>
            </p>
            <strong>@lang('lang_v1.opening_balance_due')</strong>
            <p class="text-muted">
                <span class="display_currency" data-currency_symbol="true">
                    {{ $contact->opening_balance - $contact->opening_balance_paid }}</span>
            </p>
            <strong>Advance Balance</strong>
            <p class="text-muted">
                <span class="display_currency" data-currency_symbol="true">
                    {{ $contact->balance }}</span>
            </p>

        </div>

        @if ($contact->type == 'supplier' || $contact->type == 'both')
            <div class="clearfix"></div>
            <div class="col-sm-12">
                @if ($contact->total_purchase - $contact->purchase_paid > 0)
                    <a href="{{ route('payments.getPayContactDue', [$contact->id]) }}?type=purchase"
                        class="pay_purchase_due btn btn-primary btn-sm pull-right"><i class="fa fa-money"
                            aria-hidden="true"></i> @lang('contact.pay_due_amount')</a>
                @endif
            </div>
        @endif
    </div>

    <div id="transaction_data">

    </div>

</div>
