@inject('request', 'Illuminate\Http\Request')

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <!-- Call superadmin module if defined -->
            @if (Module::has('Superadmin'))
                @includeIf('superadmin::layouts.partials.sidebar')
            @endif

            <!-- Call ecommerce module if defined -->
            @if (Module::has('Ecommerce'))
                @includeIf('ecommerce::layouts.partials.sidebar')
            @endif
            <!-- <li class="header">HEADER</li> -->
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="bi bi-house"></i> <span>
                        @lang('home.home')</span>
                </a>
            </li>
            @if (Auth::user()->can('supplier.view') || Auth::user()->can('customer.view'))
                <li class="treeview {{ in_array($request->segment(1), ['contacts', 'customer-group']) ? 'active active-sub' : '' }}"
                    id="tour_step4">
                    <a href="#" id="tour_step4_menu"><i class="bi bi-person-rolodex"></i>
                        <span>@lang('contact.contacts')</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('supplier.view')
                            <li class="{{ $request->input('type') == 'supplier' ? 'active' : '' }}"><a
                                    href="{{ route('contacts.index', ['type' => 'supplier']) }}"><i class="bi bi-dash"></i>
                                    @lang('report.supplier')</a></li>
                        @endcan

                        @can('customer.view')
                            <li class="{{ $request->input('type') == 'customer' ? 'active' : '' }}"><a
                                    href="{{ route('contacts.index', ['type' => 'customer']) }}"><i class="bi bi-dash"></i>
                                    @lang('report.customer')</a></li>

                            <li class="{{ $request->segment(1) == 'customer-group' ? 'active' : '' }}"><a
                                    href="{{ route('customer-group.index') }}"><i class="bi bi-dash"></i>
                                    @lang('lang_v1.customer_groups')</a></li>
                        @endcan

                        @if (Auth::user()->can('supplier.create') || Auth::user()->can('customer.create'))
                            <li
                                class="{{ $request->segment(1) == 'contacts' && $request->segment(2) == 'import' ? 'active' : '' }}">
                                <a href="{{ route('contacts.getImportContacts') }}"><i class="bi bi-dash"></i>
                                    @lang('lang_v1.import_contacts')</a></li>
                        @endcan

                </ul>
            </li>
        @endif

        @if (Auth::user()->can('product.view') ||
                Auth::user()->can('product.create') ||
                Auth::user()->can('brand.view') ||
                Auth::user()->can('unit.view') ||
                Auth::user()->can('category.view') ||
                Auth::user()->can('brand.create') ||
                Auth::user()->can('unit.create') ||
                Auth::user()->can('category.create'))
            <li class="treeview {{ in_array($request->segment(1), ['variation-templates', 'products', 'labels', 'import-products', 'import-opening-stock', 'selling-price-group', 'brands', 'units', 'categories']) ? 'active active-sub' : '' }}"
                id="tour_step5">
                <a href="#" id="tour_step5_menu"> <i class="bi bi-boxes"></i> <span>@lang('sale.products')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('product.view')
                        <li
                            class="{{ $request->segment(1) == 'products' && $request->segment(2) == '' ? 'active' : '' }}">
                            <a href="{{ route('products.index') }}"><i class="bi bi-dash"></i>@lang('lang_v1.list_products')</a>
                        </li>
                    @endcan
                    @can('product.create')
                        <li
                            class="{{ $request->segment(1) == 'products' && $request->segment(2) == 'create' ? 'active' : '' }}">
                            <a href="{{ route('products.create') }}"><i class="bi bi-dash"></i>@lang('product.add_product')</a>
                        </li>
                    @endcan

                    @can('product.view')
                        <li
                            class="{{ $request->segment(1) == 'labels' && $request->segment(2) == 'show' ? 'active' : '' }}">
                            <a href="{{ route('label.show') }}"><i class="bi bi-dash"></i>@lang('barcode.print_labels')</a></li>
                    @endcan

                    @can('product.create')
                        <li class="{{ $request->segment(1) == 'variation-templates' ? 'active' : '' }}"><a
                                href="{{ route('variation-templates.index') }}"><i
                                    class="bi bi-dash"></i><span>@lang('product.variations')</span></a></li>
                    @endcan
                    @can('product.create')
                        <li class="{{ $request->segment(1) == 'import-products' ? 'active' : '' }}"><a
                                href="{{ route('import-products.index') }}"><i
                                    class="bi bi-dash"></i><span>@lang('product.import_products')</span></a></li>
                    @endcan

                    @can('product.opening_stock')
                        <li class="{{ $request->segment(1) == 'import-opening-stock' ? 'active' : '' }}"><a
                                href="{{ route('import-opening-stock.index') }}"><i
                                    class="bi bi-dash"></i><span>@lang('lang_v1.import_opening_stock')</span></a></li>
                    @endcan
                    @can('product.create')
                        <li class="{{ $request->segment(1) == 'selling-price-group' ? 'active' : '' }}"><a
                                href="{{ route('selling-price-group.index') }}"><i
                                    class="bi bi-dash"></i><span>@lang('lang_v1.selling_price_group')</span></a></li>
                    @endcan

                    @if (Auth::user()->can('unit.view') || Auth::user()->can('unit.create'))
                        <li class="{{ $request->segment(1) == 'units' ? 'active' : '' }}">
                            <a href="{{ route('units.index') }}"><i class="bi bi-dash"></i>
                                <span>@lang('unit.units')</span></a>
                        </li>
                    @endif

                    @if (Auth::user()->can('category.view') || Auth::user()->can('category.create'))
                        <li class="{{ $request->segment(1) == 'categories' ? 'active' : '' }}">
                            <a href="{{ route('categories.index') }}"><i class="bi bi-dash"></i>
                                <span>@lang('category.categories') </span></a>
                        </li>
                    @endif

                    @if (Auth::user()->can('brand.view') || Auth::user()->can('brand.create'))
                        <li class="{{ $request->segment(1) == 'brands' ? 'active' : '' }}">
                            <a href="{{ route('brands.index') }}"><i class="bi bi-dash"></i>
                                <span>@lang('brand.brands')</span></a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        @if (Module::has('Repair'))
            @includeIf('repair::layouts.partials.sidebar')
        @endif

        @if (Auth::user()->can('purchase.create'))
            <li class="treeview {{ $request->segment(1) == 'stock-transfers' ? 'active active-sub' : '' }}">
                <a href="#"> <i class="bi bi-box-seam"></i> <span>@lang('lang_v1.stock_transfers')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('purchase.create')
                        <li
                            class="{{ $request->segment(1) == 'stock-transfers' && $request->segment(2) == null ? 'active' : '' }}">
                            <a href="{{ route('stock-transfers.index') }}"> <i class="bi bi-dash"></i>
                                @lang('lang_v1.list_stock_transfers')</a></li>
                    @endcan
                    @can('purchase.create')
                        <li
                            class="{{ $request->segment(1) == 'stock-transfers' && $request->segment(2) == 'create' ? 'active' : '' }}">
                            <a href="{{ route('stock-transfers.create') }}"> <i class="bi bi-dash"></i>
                                @lang('lang_v1.add_stock_transfer')</a></li>
                    @endcan
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('purchase.create'))
            <li class="treeview {{ $request->segment(1) == 'stock-adjustments' ? 'active active-sub' : '' }}">
                <a href="#"> <i class="bi bi-box2"></i> <span>@lang('stock_adjustment.stock_adjustment')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('purchase.view')
                        <li
                            class="{{ $request->segment(1) == 'stock-adjustments' && $request->segment(2) == null ? 'active' : '' }}">
                            <a href="{{ route('stock-adjustments.index') }}"> <i class="bi bi-dash"></i>
                                @lang('stock_adjustment.list')</a></li>
                    @endcan
                    @can('purchase.create')
                        <li
                            class="{{ $request->segment(1) == 'stock-adjustments' && $request->segment(2) == 'create' ? 'active' : '' }}">
                            <a href="{{ route('stock-adjustments.create') }}"> <i class="bi bi-dash"></i>
                                @lang('stock_adjustment.add')</a></li>
                    @endcan
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('purchase.view') || Auth::user()->can('purchase.create') || Auth::user()->can('purchase.update'))
            <li class="treeview {{ in_array($request->segment(1), ['purchases', 'purchase-return']) ? 'active active-sub' : '' }}"
                id="tour_step6">
                <a href="#" id="tour_step6_menu"><i class="bi bi-bag-plus"></i>
                    <span>@lang('purchase.purchases')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('purchase.view')
                        <li
                            class="{{ $request->segment(1) == 'purchases' && $request->segment(2) == null ? 'active' : '' }}">
                            <a href="{{ route('purchases.index') }}"> <i class="bi bi-dash"></i>
                                @lang('purchase.list_purchase')</a></li>
                    @endcan
                    @can('purchase.create')
                        <li
                            class="{{ $request->segment(1) == 'purchases' && $request->segment(2) == 'create' ? 'active' : '' }}">
                            <a href="{{ route('purchases.create') }}"> <i class="bi bi-dash"></i>
                                @lang('purchase.add_purchase')</a></li>
                    @endcan
                    @can('purchase.view')
                        <li class="{{ $request->segment(1) == 'purchase-return' ? 'active' : '' }}"><a
                                href="{{ route('purchase-return.index') }}"> <i class="bi bi-dash"></i>
                                @lang('lang_v1.list_purchase_return')</a></li>
                    @endcan
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('purchase.create'))
            <li class="treeview {{ $request->segment(1) == 'quotations' ? 'active active-sub' : '' }}">
                <a href="#"> <i class="bi bi-receipt"></i> <span>Quotation</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('purchase.create')
                        <li
                            class="{{ $request->segment(1) == 'quotations' && $request->segment(2) == null ? 'active' : '' }}">
                            <a href="{{ route('quotations.index') }}"> <i class="bi bi-dash"></i> Quotation
                                List</a></li>
                    @endcan
                    @can('purchase.create')
                        <li
                            class="{{ $request->segment(1) == 'quotations' && $request->segment(2) == 'create' ? 'active' : '' }}">
                            <a href="{{ route('quotations.create') }}"> <i class="bi bi-dash"></i>
                                Quotation Create</a></li>
                    @endcan
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('sell.view') || Auth::user()->can('sell.create') || Auth::user()->can('direct_sell.access'))
            <li class="treeview {{ in_array($request->segment(1), ['sells', 'pos', 'sell-return', 'ecommerce', 'discount']) ? 'active active-sub' : '' }}"
                id="tour_step7">
                <a href="#" id="tour_step7_menu"> <i class="bi bi-bag-dash"></i>
                    <span>@lang('sale.sale')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('sell.view')
                        <li
                            class="{{ $request->segment(1) == 'sells' && $request->segment(2) == null ? 'active' : '' }}">
                            <a href="{{ route('sells.index') }}"> <i class="bi bi-dash"></i>
                                @lang('lang_v1.all_sales')</a></li>
                    @endcan
                    <!-- Call superadmin module if defined -->
                    @if (Module::has('Ecommerce'))
                        @includeIf('ecommerce::layouts.partials.sell_sidebar')
                    @endif
                    @can('sell.create')
                        <li
                            class="{{ $request->segment(1) == 'sells' && $request->segment(2) == 'create' ? 'active' : '' }}">
                            <a href="{{ route('sells.create') }}"> <i class="bi bi-dash"></i>
                                @lang('sale.add_sale')</a></li>
                    @endcan
                    <!--
          @can('sell.view')
                    <li class="{{ $request->segment(1) == 'pos' && $request->segment(2) == null ? 'active' : '' }}" ><a href="{{ route('pos.index') }}"> <i class="bi bi-dash"></i> @lang('sale.list_pos')</a></li>
          @endcan
          -->
                    @can('sell.create')
                        <!--
                <li class="{{ $request->segment(1) == 'pos' && $request->segment(2) == 'create' ? 'active' : '' }}"><a href="{{ route('pos.create') }}"> <i class="bi bi-dash"></i> @lang('sale.pos_sale')</a></li>
              -->
                        <li
                            class="{{ $request->segment(1) == 'sells' && $request->segment(2) == 'drafts' ? 'active' : '' }}">
                            <a href="{{ route('sells.getDrafts') }}"> <i class="bi bi-dash"></i>
                                @lang('lang_v1.list_drafts')</a></li>
                        <!--
                <li class="{{ $request->segment(1) == 'sells' && $request->segment(2) == 'quotations' ? 'active' : '' }}" ><a href="{{ route('sells.quotations') }}"> <i class="bi bi-dash"></i> @lang('lang_v1.list_quotations')</a></li>
              -->
                    @endcan
                    @can('sell.view')
                        <li
                            class="{{ $request->segment(1) == 'sell-return' && $request->segment(2) == null ? 'active' : '' }}">
                            <a href="{{ route('sell-return.index') }}"> <i class="bi bi-dash"></i>
                                @lang('lang_v1.list_sell_return')</a></li>
                    @endcan

                    @can('discount.access')
                        <li class="{{ $request->segment(1) == 'discount' ? 'active' : '' }}"><a
                                href="{{ route('discount.index') }}"> <i class="bi bi-dash"></i>
                                @lang('lang_v1.discounts')</a></li>
                    @endcan

                    @if (in_array('subscription', $enabled_modules))
                        <li class="{{ $request->segment(1) == 'subscriptions' ? 'active' : '' }}"><a
                                href="{{ route('pso.listSubscriptions') }}"> <i
                                    class="bi bi-dash"></i> @lang('lang_v1.subscriptions')</a></li>
                    @endif
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('expense.access'))
            <li
                class="treeview {{ in_array($request->segment(1), ['expense-categories', 'expenses']) ? 'active active-sub' : '' }}">
                <a href="#"><i class="bi bi-credit-card-2-back"></i> <span> Income /
                        @lang('expense.expenses')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li
                        class="{{ $request->segment(1) == 'expenses' && empty($request->segment(2)) ? 'active' : '' }}">
                        <a href="{{ route('expenses.index') }}"> <i class="bi bi-dash"></i> Income /
                            @lang('lang_v1.list_expenses')</a></li>
                    <li
                        class="{{ $request->segment(1) == 'expenses' && $request->segment(2) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('expenses.create') }}"> <i class="bi bi-dash"></i> Income /
                            @lang('messages.add') @lang('expense.expenses')</a></li>
                    <li class="{{ $request->segment(1) == 'expense-categories' ? 'active' : '' }}"><a
                            href="{{ route('expense-categories.index') }}"> <i class="bi bi-dash"></i>
                            Income / @lang('expense.expense_categories')</a></li>
                </ul>
            </li>
        @endif

        @can('account.access')
            <li class="treeview {{ $request->segment(1) == 'account' ? 'active active-sub' : '' }}">
                <a href="#"> <i class="bi bi-cash-coin"></i> <span>@lang('lang_v1.payment_accounts')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li
                        class="{{ $request->segment(1) == 'account' && $request->segment(2) == 'account' ? 'active' : '' }}">
                        <a href="{{ route('account.index') }}"> <i class="bi bi-dash"></i>
                            @lang('account.list_accounts')</a></li>

                    <li
                        class="{{ $request->segment(1) == 'account' && $request->segment(2) == 'balance-sheet' ? 'active' : '' }}">
                        <a href="{{ route('accountreport.balanceSheet') }}"> <i class="bi bi-dash"></i>
                            @lang('account.balance_sheet')</a></li>

                    <li
                        class="{{ $request->segment(1) == 'account' && $request->segment(2) == 'trial-balance' ? 'active' : '' }}">
                        <a href="{{ route('accountreport.trialBalance') }}"> <i class="bi bi-dash"></i>
                            @lang('account.trial_balance')</a></li>

                    <li
                        class="{{ $request->segment(1) == 'account' && $request->segment(2) == 'cash-flow' ? 'active' : '' }}">
                        <a href="{{ route('accountreport.cashFlow') }}"> <i class="bi bi-dash"></i>
                            @lang('lang_v1.cash_flow')</a></li>

                    <li
                        class="{{ $request->segment(1) == 'account' && $request->segment(2) == 'payment-account-report' ? 'active' : '' }}">
                        <a href="{{ route('accountreport.paymentAccountReport') }}"> <i
                                class="bi bi-dash"></i> @lang('account.payment_account_report')</a></li>
                </ul>
            </li>
        @endcan

        @if (Auth::user()->can('purchase_n_sell_report.view') ||
                Auth::user()->can('contacts_report.view') ||
                Auth::user()->can('stock_report.view') ||
                Auth::user()->can('tax_report.view') ||
                Auth::user()->can('trending_product_report.view') ||
                Auth::user()->can('sales_representative.view') ||
                Auth::user()->can('register_report.view') ||
                Auth::user()->can('expense_report.view'))

            <li class="treeview {{ in_array($request->segment(1), ['reports']) ? 'active active-sub' : '' }}"
                id="tour_step8">
                <a href="#" id="tour_step8_menu"> <i class="bi bi-bar-chart-line"></i>
                    <span>@lang('report.reports')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('profit_loss_report.view')
                        <li class="{{ $request->segment(2) == 'profit-loss' ? 'active' : '' }}"><a
                                href="{{ route('report.getProfitLoss') }}"> <i class="bi bi-dash"></i>
                                @lang('report.profit_loss')</a></li>
                    @endcan

                    @can('purchase_n_sell_report.view')
                        <li class="{{ $request->segment(2) == 'purchase-sell' ? 'active' : '' }}"><a
                                href="{{ route('report.getPurchaseSell') }}"> <i class="bi bi-dash"></i>
                                @lang('report.purchase_sell_report')</a></li>
                    @endcan

                    @can('tax_report.view')
                        <li class="{{ $request->segment(2) == 'tax-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getTaxReport') }}"> <i class="bi bi-dash"></i>
                                @lang('report.tax_report')</a></li>
                    @endcan

                    @can('contacts_report.view')
                        <li class="{{ $request->segment(2) == 'customer-supplier' ? 'active' : '' }}"><a
                                href="{{ route('report.getCustomerSuppliers') }}"> <i
                                    class="bi bi-dash"></i> @lang('report.contacts')</a></li>

                        <li class="{{ $request->segment(2) == 'customer-group' ? 'active' : '' }}"><a
                                href="{{ route('report.getCustomerGroup') }}"> <i class="bi bi-dash"></i>
                                @lang('lang_v1.customer_groups_report')</a></li>
                    @endcan

                    @can('stock_report.view')
                        <li class="{{ $request->segment(2) == 'stock-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getStockReport') }}"> <i class="bi bi-dash"></i>
                                @lang('report.stock_report')</a></li>
                    @endcan

                    @can('stock_report.view')
                        @if (session('business.enable_product_expiry') == 1)
                            <li class="{{ $request->segment(2) == 'stock-expiry' ? 'active' : '' }}"><a
                                    href="{{ route('report.getStockExpiryReport') }}"> <i
                                        class="bi bi-dash"></i> @lang('report.stock_expiry_report')</a></li>
                        @endif
                    @endcan

                    @can('stock_report.view')
                        <li class="{{ $request->segment(2) == 'lot-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getLotReport') }}"> <i class="bi bi-dash"></i>
                                @lang('lang_v1.lot_report')</a></li>
                    @endcan

                    @can('trending_product_report.view')
                        <li class="{{ $request->segment(2) == 'trending-products' ? 'active' : '' }}"><a
                                href="{{ route('report.getTrendingProducts') }}"> <i
                                    class="bi bi-dash"></i> @lang('report.trending_products')</a></li>
                    @endcan

                    @can('stock_report.view')
                        <li class="{{ $request->segment(2) == 'stock-adjustment-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getStockAdjustmentReport') }}"> <i
                                    class="bi bi-dash"></i> @lang('report.stock_adjustment_report')</a></li>
                    @endcan

                    @can('purchase_n_sell_report.view')
                        <li class="{{ $request->segment(2) == 'product-purchase-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getproductPurchaseReport') }}"> <i
                                    class="bi bi-dash"></i> @lang('lang_v1.product_purchase_report')</a></li>

                        <li class="{{ $request->segment(2) == 'product-sell-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getproductSellReport') }}"> <i
                                    class="bi bi-dash"></i> @lang('lang_v1.product_sell_report')</a></li>

                        <li class="{{ $request->segment(2) == 'purchase-payment-report' ? 'active' : '' }}"><a
                                href="{{ route('report.purchasePaymentReport') }}"> <i
                                    class="bi bi-dash"></i> @lang('lang_v1.purchase_payment_report')</a></li>

                        <li class="{{ $request->segment(2) == 'sell-payment-report' ? 'active' : '' }}"><a
                                href="{{ route('report.sellPaymentReport') }}"> <i
                                    class="bi bi-dash"></i> @lang('lang_v1.sell_payment_report')</a></li>
                    @endcan

                    @can('expense_report.view')
                        <li class="{{ $request->segment(2) == 'expense-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getExpenseReport') }}"> <i class="bi bi-dash"></i>
                                @lang('report.expense_report')</a></li>
                        <li class="{{ $request->segment(2) == 'income-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getIncomeReport') }}"> <i class="bi bi-dash"></i>
                                Income Report</a></li>
                    @endcan

                    @can('register_report.view')
                        <li class="{{ $request->segment(2) == 'register-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getRegisterReport') }}"> <i
                                    class="bi bi-dash"></i> @lang('report.register_report')</a></li>
                        <li class="{{ $request->segment(2) == 'item-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getItemReport') }}"> <i class="bi bi-dash"></i>
                                Item Report</a></li>
                    @endcan

                    @can('sales_representative.view')
                        <li class="{{ $request->segment(2) == 'sales-representative-report' ? 'active' : '' }}"><a
                                href="{{ route('report.getSalesRepresentativeReport') }}"> <i
                                    class="bi bi-dash"></i> @lang('report.sales_representative')</a></li>
                    @endcan

                    @if (in_array('tables', $enabled_modules))
                        @can('purchase_n_sell_report.view')
                            <li class="{{ $request->segment(2) == 'table-report' ? 'active' : '' }}"><a
                                    href="{{ route('report.getTableReport') }}"> <i
                                        class="bi bi-dash"></i> @lang('restaurant.table_report')</a></li>
                        @endcan
                    @endif
                    @if (in_array('service_staff', $enabled_modules))
                        @can('sales_representative.view')
                            <li class="{{ $request->segment(2) == 'service-staff-report' ? 'active' : '' }}"><a
                                    href="{{ route('report.getServiceStaffReport') }}"> <i
                                        class="bi bi-dash"></i> @lang('restaurant.service_staff_report')</a></li>
                        @endcan
                    @endif

                </ul>
            </li>
        @endif

        @can('backup')
            <li class="treeview {{ in_array($request->segment(1), ['backup']) ? 'active active-sub' : '' }}">
                <a href="{{ route('backup.index') }}"> <i class="bi bi-layer-backward"></i>
                    <span>@lang('lang_v1.backup')</span>
                </a>
            </li>
        @endrole

        {{-- Call restaurant module if defined --}}
    {{-- @if (in_array('tables', $enabled_modules) && in_array('service_staff', $enabled_modules))
      @if (Auth::user()->can('crud_all_bookings') || Auth::user()->can('crud_own_bookings'))
      <li class="treeview {{ $request->segment(1) == 'bookings' ? 'active active-sub' : '' }}">
          <a href="{{ route('Restaurant\BookingController@index') }}"><i class="fa fa-calendar-check-o"></i> <span>@lang('restaurant.bookings')</span></a>
      </li>
      @endif
    @endif

    @if (in_array('kitchen', $enabled_modules))
      <li class="treeview {{ $request->segment(1) == 'modules' && $request->segment(2) == 'kitchen' ? 'active active-sub' : '' }}">
          <a href="{{ route('Restaurant\KitchenController@index') }}"><i class="fa fa-fire"></i> <span>@lang('restaurant.kitchen')</span></a>
      </li>
    @endif
    @if (in_array('service_staff', $enabled_modules))
      <li class="treeview {{ $request->segment(1) == 'modules' && $request->segment(2) == 'orders' ? 'active active-sub' : '' }}">
          <a href="{{ route('Restaurant\OrderController@index') }}"><i class="fa fa-list-alt"></i> <span>@lang('restaurant.orders')</span></a>
      </li>
    @endif --}}
        {{--  @if (Auth::user()->can('user.view') || Auth::user()->can('user.create') || Auth::user()->can('roles.view')) --}}
        <li
            class="treeview {{ in_array($request->segment(1), ['roles', 'users', 'sales-commission-agents']) ? 'active active-sub' : '' }}">
            <a href="#">
                <i class="bi bi-people"></i>
                <span class="title">@lang('user.user_management')</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                {{--  @can('user.view') --}}
                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">
                            @lang('user.users')
                        </span>
                    </a>
                </li>
                {{--   @endcan --}}
                {{--  @can('roles.view') --}}
                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                    <a href="{{ route('roles.index') }}">
                        <i class="fa fa-briefcase"></i>
                        <span class="title">
                            @lang('user.roles')
                        </span>
                    </a>
                </li>
                {{--  @endcan --}}

                {{--  @can('user.create') --}}
                <li class="{{ $request->segment(1) == 'sales-commission-agents' ? 'active active-sub' : '' }}">
                    <a href="{{ route('sales-commission-agents.index') }}">
                        <i class="fa fa-handshake-o"></i>
                        <span class="title">
                            @lang('lang_v1.sales_commission_agents')
                        </span>
                    </a>
                </li>
                {{--   @endcan --}}

            </ul>
        </li>
        {{--    @endif --}}


        @if (Auth::user()->can('business_settings.access') ||
                Auth::user()->can('barcode_settings.access') ||
                Auth::user()->can('invoice_settings.access') ||
                Auth::user()->can('tax_rate.view') ||
                Auth::user()->can('tax_rate.create'))


            <li class="treeview @if (in_array($request->segment(1), [
                    'business',
                    'tax-rates',
                    'barcodes',
                    'invoice-schemes',
                    'business-location',
                    'invoice-layouts',
                    'printers',
                    'subscription',
                ]) || in_array($request->segment(2), ['tables', 'modifiers'])) {{ 'active active-sub' }} @endif">

                <a href="#" id="tour_step2_menu"> <i class="bi bi-gear"></i>
                    <span>@lang('business.settings')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" id="tour_step3">
                    @can('business_settings.access')
                        <li class="{{ $request->segment(1) == 'business' ? 'active' : '' }}">
                            <a href="{{ route('business.getBusinessSettings') }}" id="tour_step2"> <i
                                    class="bi bi-dash"></i> @lang('business.business_settings')</a>
                        </li>
                        <li class="{{ $request->segment(1) == 'business-location' ? 'active' : '' }}">
                            <a href="{{ route('business-location.index') }}"> <i class="bi bi-dash"></i>
                                @lang('business.business_locations')</a>
                        </li>
                    @endcan
                    @can('invoice_settings.access')
                        <li class="@if (in_array($request->segment(1), ['invoice-schemes', 'invoice-layouts'])) {{ 'active' }} @endif">
                            <a href="{{ route('invoice-schemes.index') }}"> <i class="bi bi-dash"></i>
                                <span>@lang('invoice.invoice_settings')</span></a>
                        </li>
                    @endcan

                    @can('barcode_settings.access')
                        <li class="{{ $request->segment(1) == 'barcodes' ? 'active' : '' }}">
                            <a href="{{ route('barcodes.index') }}"> <i class="bi bi-dash"></i>
                                <span>@lang('barcode.barcode_settings')</span></a>
                        </li>
                    @endcan

                    <li class="{{ $request->segment(1) == 'printers' ? 'active' : '' }}">
                        <a href="{{ route('printers.index') }}"> <i class="bi bi-dash"></i>
                            <span>@lang('printer.receipt_printers')</span></a>
                    </li>

                    @if (Auth::user()->can('tax_rate.view') || Auth::user()->can('tax_rate.create'))
                        <li class="{{ $request->segment(1) == 'tax-rates' ? 'active' : '' }}">
                            <a href="{{ route('tax-rates.index') }}"> <i class="bi bi-dash"></i>
                                <span>@lang('tax_rate.tax_rates')</span></a>
                        </li>
                    @endif


                    {{-- @if (in_array('tables', $enabled_modules))
                        @can('business_settings.access')
                            <li
                                class="{{ $request->segment(1) == 'modules' && $request->segment(2) == 'tables' ? 'active' : '' }}">
                                <a href="{{ action('Restaurant\TableController@index') }}"> <i
                                        class="bi bi-dash"></i> @lang('restaurant.tables')</a>
                            </li>
                        @endcan
                    @endif
 --}}
                 {{--    @if (in_array('modifiers', $enabled_modules))
                        @if (Auth::user()->can('product.view') || Auth::user()->can('product.create'))
                            <li
                                class="{{ $request->segment(1) == 'modules' && $request->segment(2) == 'modifiers' ? 'active' : '' }}">
                                <a href="{{ action('Restaurant\ModifierSetsController@index') }}"> <i
                                        class="bi bi-dash"></i> @lang('restaurant.modifiers')</a>
                            </li>
                        @endif
                    @endif
 --}}

                    @if (Module::has('Superadmin'))
                        @includeIf('superadmin::layouts.partials.subscription')
                    @endif

                </ul>
            </li>
        @endif

        @can('send_notifications')
            <li class="treeview {{ $request->segment(1) == 'notification-templates' ? 'active active-sub' : '' }}">
                <a href="{{ route('notification-templates.index') }}"> <i class="bi bi-bell"></i>
                    <span>@lang('lang_v1.notification_templates')</span>
                </a>
            </li>
        @endrole

        <!-- call Essentials module if defined -->
        @if (Module::has('Essentials'))
            {{-- @includeIf('essentials::layouts.partials.sidebar_hrm') --}}
            @includeIf('essentials::layouts.partials.sidebar')
        @endif

        @if (Module::has('Woocommerce'))
            @includeIf('woocommerce::layouts.partials.sidebar')
        @endif
    </ul>

    <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>
