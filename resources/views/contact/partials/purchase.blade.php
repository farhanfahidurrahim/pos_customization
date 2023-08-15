 @if( in_array($contact->type, ['supplier', 'both']) )
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                <i class="fa fa-money margin-r-5"></i>
                @lang( 'contact.all_purchases_linked_to_this_contact')
            </h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group">
                          <button type="button" class="btn btn-primary" id="daterange-btn">
                            <span>
                              <i class="fa fa-calendar"></i> {{ __("messages.filter_by_date") }}
                            </span>
                            <i class="fa fa-caret-down"></i>
                          </button>
                        </div>
                      </div>
                </div>
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped ajax_view" id="purchase_table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Ref No.</th>
                                <th>Supplier</th>
                                <th>Purchase Status</th>
                                <th>Payment Status</th>
                                <th>Grand Total</th>
                                <th>@lang('purchase.payment_due') &nbsp;&nbsp;<i class="fa fa-info-circle text-info" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="{{ __('messages.purchase_due_tooltip')}}" aria-hidden="true"></i></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-gray font-17 text-center footer-total">
                                <td colspan="3"><strong>@lang('sale.total'):</strong></td>
                                <td id="footer_status_count"></td>
                                <td id="footer_payment_status_count"></td>
                                <td><span class="display_currency" id="footer_purchase_total" data-currency_symbol ="true"></span></td>
                                <td class="text-left"><small>@lang('report.purchase_due') - <span class="display_currency" id="footer_total_due" data-currency_symbol ="true"></span><br>
                                @lang('lang_v1.purchase_return') - <span class="display_currency" id="footer_total_purchase_return_due" data-currency_symbol ="true"></span>
                                </small></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @component('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.all_purchase_returns')])
        @can('purchase.view')
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group">
                          <button type="button" class="btn btn-primary" id="daterange-btn-pr">
                            <span>
                              <i class="fa fa-calendar"></i> {{ __('messages.filter_by_date') }}
                            </span>
                            <i class="fa fa-caret-down"></i>
                          </button>
                        </div>
                      </div>
                </div>
        </div>
            @include('purchase_return.partials.purchase_return_list')
        @endcan
    @endcomponent
@endif