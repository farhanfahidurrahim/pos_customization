<div class="table-responsive">
    <table class="table table-bordered table-striped" id="stock_report_table">
        <thead>
            <tr>
                <th>SKU</th>
                <th>@lang('business.product')</th>
                <th>Unit Price</th>
                <th>@lang('report.current_stock')</th>
                <th>Current stock Value by Purchase price</th>
                <th>Current stock Value by Sell price</th>
                <th>Potential Profit</th>
                <th>Total Unit Sold</th>
                <th>Total Transfered</th>
                <th>Total Adjusted</th>
            </tr>
        </thead>
        <tfoot>
            <tr class="bg-gray font-17 text-center footer-total">
                <td colspan="3"><strong>@lang('sale.total'):</strong></td>
                <td id="footer_total_stock"></td>
                
                <td><span class="display_currency" id="footer_total_purchase_stock" data-currency_symbol ="true"></span></td>
                <td><span class="display_currency" id="footer_total_sell_stock" data-currency_symbol ="true"></span></td>
                <td><span class="display_currency" id="footer_total_potential_price" data-currency_symbol ="true"></span></td>

                <td id="footer_total_sold"></td>
                <td id="footer_total_transfer"></td>
                <td id="footer_total_adjusted"></td>
            </tr>
        </tfoot>
    </table>
</div>