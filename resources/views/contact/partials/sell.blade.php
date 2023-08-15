<!-- list sales -->
    @if( in_array($contact->type, ['customer', 'both']) )
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-money margin-r-5"></i>
                    @lang( 'contact.all_sells_linked_to_this_contact')
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                              <button type="button" class="btn btn-primary" id="sells-daterange-btn">
                                <span>
                                  <i class="fa fa-calendar"></i> {{ __("messages.filter_by_date") }}
                                </span>
                                <i class="fa fa-caret-down"></i>
                              </button>
                            </div>
                          </div>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped ajax_view" id="sell_table"  style="width:100%">
                            <thead>
                                <tr>
                                    <th>@lang('messages.date')</th>
                                    <th>@lang('sale.invoice_no')</th>
                                    <th>@lang('sale.customer_name')</th>
                                    <th>@lang('sale.payment_status')</th>
                                    <th>@lang('sale.total_amount')</th>
                                    <th>@lang('sale.total_paid')</th>
                                    <th>@lang('sale.total_remaining')</th>
                                    <th>@lang('messages.action')</th>
                                </tr>
                            </thead>
                            
                            <tfoot>
                                <tr class="bg-gray font-17 footer-total text-center">
                                    <td colspan="3"><strong>@lang('sale.total'):</strong></td>
                                    <td id="footer_payment_status_count"></td>
                                    <td><span class="display_currency" id="footer_sale_total" data-currency_symbol ="true"></span></td>
                                    <td><span class="display_currency" id="footer_total_paid" data-currency_symbol ="true"></span></td>
                                    <td class="text-left"><small>@lang('lang_v1.sell_due') - <span class="display_currency" id="footer_total_remaining" data-currency_symbol ="true"></span><br>@lang('lang_v1.sell_return_due') - <span class="display_currency" id="footer_total_sell_return_due" data-currency_symbol ="true"></span></small></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @component('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.sell_return')])
            @can('sell.view')
                <div class="form-group">
                    <div class="input-group">
                      <button type="button" class="btn btn-primary" id="daterange-btn-sr">
                        <span>
                          <i class="fa fa-calendar"></i> {{ __('messages.filter_by_date') }}
                        </span>
                        <i class="fa fa-caret-down"></i>
                      </button>
                    </div>
                </div>
                @include('sell_return.partials.sell_return_list')
            @endcan
        @endcomponent
    @endif