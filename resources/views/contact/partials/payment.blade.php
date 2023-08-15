


@if(auth()->user()->can('purchase.payments') || auth()->user()->can('sell.payments'))
@component('components.widget', ['class' => 'box-primary', 'title' => __('Payment List')])
    <div class="table-responsive">
        <table class="table table-bordered table-striped"
        id="ob_payment_table"  style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('purchase.ref_no')</th>
                    <th>@lang('lang_v1.paid_on')</th>
                    <th>@lang('sale.amount')</th>
                    <th>@lang('lang_v1.payment_method')</th>
                    <th>Payment For</th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
        </table>
    </div>
@endcomponent
@endif
