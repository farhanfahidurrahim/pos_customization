<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountReportsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackUpController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessLocationController;
use App\Http\Controllers\CashRegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CombinedPurchaseReturnController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerAdvanceController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GroupTaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportOpeningStockController;
use App\Http\Controllers\ImportProductsController;
use App\Http\Controllers\InvoiceLayoutController;
use App\Http\Controllers\InvoiceSchemeController;
use App\Http\Controllers\LabelsController;
use App\Http\Controllers\LocationSettingsController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationTemplateController;
use App\Http\Controllers\OpeningStockController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageDetailsController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRecievdController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseReturnController;
use App\Http\Controllers\QuatationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesCommissionAgentController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\SellingPriceGroupController;
use App\Http\Controllers\SellPosController;
use App\Http\Controllers\SellReturnController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\StockTransferController;
use App\Http\Controllers\SupplierAdvanceController;
use App\Http\Controllers\TaxRateController;
use App\Http\Controllers\TransactionPaymentController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationTemplateController;
use FontLib\Table\Type\name;

//===================All Route====================//
Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    dd("Cache is cleared");
});
Route::get('/business/register', [BusinessController::class, 'getRegister'])->name('business.getRegister');
Route::post('/business/register', [BusinessController::class, 'postRegister'])->name('business.postRegister');

Route::post('/business/register/check-username', [BusinessController::class, 'postCheckUsername'])->name('business.postCheckUsername');
Route::post('/business/register/check-email', [BusinessController::class, 'postCheckEmail'])->name('business.postCheckEmail');
Route::get('/invoice/{token}', [SellPosController::class, 'showInvoice'])->name('show_invoice');

Route::middleware(['BusinessSetting'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();

    //Routes for authenticated users only
    Route::middleware(['auth', 'SetSessionData', 'timezone'])->group(function () {

        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/home/get-totals', [HomeController::class, 'getTotals']);
        Route::get('/home/product-stock-alert', [HomeController::class, 'getProductStockAlert']);
        Route::get('/home/purchase-payment-dues', [HomeController::class, 'getPurchasePaymentDues']);
        Route::get('/home/sales-payment-dues', [HomeController::class, 'getSalesPaymentDues']);

        Route::get('/load-more-notifications', [HomeController::class, 'loadMoreNotifications']);

        Route::get('/business/settings', [BusinessController::class, 'getBusinessSettings'])->name('business.getBusinessSettings');
        Route::post('/business/update', [BusinessController::class, 'postBusinessSettings'])->name('business.postBusinessSettings');
        Route::get('/user/profile', [UserController::class, 'getProfile'])->name('user.getProfile');
        Route::post('/user/update', [UserController::class, 'updateProfile'])->name('user.updateProfile');
        Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

        Route::resources([
            'brands' => BrandController::class,
            'supplier_advance' => SupplierAdvanceController::class,
            'customer_advance' => CustomerAdvanceController::class,
            'product_recieves' => ProductRecievdController::class,
            'packages' => PackageController::class,
            'package' => PackageDetailsController::class,
            /*  'payment-account' => AccountController::class, */
            'tax-rates' => TaxRateController::class,
            'units' => UnitController::class,
            'contacts' => ContactController::class,
            'categories' => CategoryController::class,
            'variation-templates' => VariationTemplateController::class,
            'products' => ProductController::class,
            'quotations' => QuatationController::class,
            'purchases' => PurchaseController::class,
            'sells' => SellController::class,
            'pos' => SellPosController::class,
            'roles' => RoleController::class,
            'users' => ManageUserController::class,
            'group-taxes' => GroupTaxController::class,
            'barcodes' => BarcodeController::class,
            'invoice-schemes' => InvoiceSchemeController::class,
            'business-location' => BusinessLocationController::class,
            'invoice-layouts' => InvoiceLayoutController::class,
            'expense-categories' => ExpenseCategoryController::class,
            'expenses' => ExpenseController::class,
            'payments' => TransactionPaymentController::class,
            'printers' => PrinterController::class,
            'stock-adjustments' => StockAdjustmentController::class,
            'cash-register' => CashRegisterController::class,
            'sales-commission-agents' => SalesCommissionAgentController::class,
            'stock-transfers' => StockTransferController::class,
            'customer-group' => CustomerGroupController::class,
            'sell-return' => SellReturnController::class,
            'backup' => BackUpController::class,
            'selling-price-group' => SellingPriceGroupController::class,
            'notification-templates' => NotificationTemplateController::class,
            'purchase-return' => PurchaseReturnController::class,
            'discount' => DiscountController::class,
            'account' => AccountController::class,

        ]);

        //Route::resource('backup', [BackUpController::class], ['only' => ['index', 'create', 'store']]);


        Route::get('product-list-combo', [PackageController::class, 'list']);
        Route::get('entry-list', [PackageController::class, 'entryList']);
        Route::get('package/details-create/{id}', [PackageDetailsController::class, 'detailsCreate']);
        Route::get('package/details-index/{id}', [PackageDetailsController::class, 'detailsIndex']);

        Route::get('/contacts/import', [ContactController::class, 'getImportContacts'])->name('contacts.getImportContacts');
        Route::post('/contacts/import', [ContactController::class, 'postImportContacts'])->name('contacts.postImportContacts');
        Route::post('/contacts/check-contact-id', [ContactController::class, 'checkContactId']);
        Route::get('/contacts/customers', [ContactController::class, 'getCustomers']);


        Route::get('combo', [ComboController::class, 'get_combo']);
        Route::post('create_combo', [ComboController::class, 'store']);

        Route::post('/products/mass-deactivate', [ProductController::class, 'massDeactivate'])->name('products.massDeactivate');
        Route::get('/products/activate/{id}', [ProductController::class, 'activate']);
        Route::get('/products/view-product-group-price/{id}', [ProductController::class, 'viewGroupPrice']);
        Route::get('/products/add-selling-prices/{id}', [ProductController::class, 'addSellingPrices'])->name('products.addSellingPrices');
        Route::post('/products/save-selling-prices', [ProductController::class, 'saveSellingPrices']);
        Route::post('/products/mass-delete', [ProductController::class, 'massDestroy'])->name('products.massDestroy');
        Route::get('/products/view/{id}', [ProductController::class, 'view'])->name('products.view');
        Route::get('/products/list', [ProductController::class, 'getProducts']);

        Route::get('/products/list-no-variation', [ProductController::class, 'getProductsWithoutVariations']);
        Route::get('/products/stock-history/{is}', [ProductController::class, 'productStockHistory'])->name('products.productStockHistory');

        Route::post('/products/get_sub_categories', [ProductController::class, 'getSubCategories']);
        Route::post('/products/product_form_part', [ProductController::class, 'getProductVariationFormPart']);
        Route::post('/products/get_product_variation_row', [ProductController::class, 'getProductVariationRow']);
        Route::post('/products/get_variation_template', [ProductController::class, 'getVariationTemplate']);
        Route::get('/products/get_variation_value_row', [ProductController::class, 'getVariationValueRow']);
        Route::post('/products/check_product_sku', [ProductController::class, 'checkProductSku']);
        Route::get('/products/quick_add', [ProductController::class, 'quickAdd'])->name('products.quickAdd');
        Route::post('/products/save_quick_product', [ProductController::class, 'saveQuickProduct']);

        Route::get('quotations/send-mail/{id}', [QuatationController::class, 'sendMail'])->name('quatations.senMail');

        Route::get('/purchases/get_products', [PurchaseController::class, 'getProducts']);

        Route::get('/purchases/get_suppliers', [PurchaseController::class, 'getSuppliers']);
        Route::post('/purchases/get_purchase_entry_row', [PurchaseController::class, 'getPurchaseEntryRow']);
        Route::post('/purchases/check_ref_number', [PurchaseController::class, 'checkRefNumber']);

        Route::get('/purchases/print/{id}', [PurchaseController::class, 'printInvoice'])->name('purchase.printInvoice');
        Route::get('/purchases/status/{id}', [PurchaseController::class, 'getStatus']);
        Route::post('/purchases/status-update/{id}', [PurchaseController::class, 'statusUpdate']);

        Route::get('/toggle-subscription/{id}', [SellPosController::class, 'toggleRecurringInvoices']);
        Route::get('/sells/subscriptions', [SellPosController::class, 'listSubscriptions'])->name('pso.listSubscriptions');
        Route::get('/sells/invoice-url/{id}', [SellPosController::class, 'showInvoiceUrl'])->name('sells.showInvoiceUrl');
        Route::get('/sells/duplicate/{id}', [SellController::class, 'duplicateSell'])->name('sells.duplicateSell');
        Route::get('/sells/drafts', [SellController::class, 'getDrafts'])->name('sells.getDrafts');
        Route::get('/sells/quotations', [SellController::class, 'getQuotations'])->name('sells.quotations');
        Route::get('/sells/draft-dt', [SellController::class, 'getDraftDatables']);
        Route::get('/sells/delivery-note/{id}', [SellController::class, 'deliveryNote'])->name('sells.deliveryNote');
        Route::post('/sells/date-update/{id}', [SellController::class, 'dateUpdate']);

        Route::get('/sells/pos/get_product_row/{variation_id}/{location_id}', [SellPosController::class, 'getProductRow']);
        Route::post('/sells/pos/get_payment_row', [SellPosController::class, 'getPaymentRow']);
        Route::get('/sells/pos/get-recent-transactions', [SellPosController::class, 'getRecentTransactions']);
        Route::get('/sells/pos/get-product-suggestion', [SellPosController::class, 'getProductSuggestion']);
        Route::get('/sells/{transaction_id}/print', [SellPosController::class, 'printInvoice'])->name('sell.printInvoice');
        Route::get('/sells/{transaction_id}/sell-print', [SellPosController::class, 'sellPrint'])->name('sell.sell-print');

        Route::get('/sells/{transaction_id}/mone-receipt', [SellPosController::class, 'moneyReceipt'])->name('sell.moneyReceipt');

        Route::get('/sells/status/edit/{id}', [SellController::class, 'sellStatusEdit'])->name('sells.statusEdit');
        Route::post('/sells/status/update/{id}', [SellController::class, 'sellStatusUpdate']);

        Route::get('/barcodes/set_default/{id}', [BarcodeController::class, 'setDefault'])->name('barcodes.setDefault');
        //Invoice schemes..
        Route::get('/invoice-schemes/set_default/{id}', [InvoiceSchemeController::class, 'setDefault'])->name('invoice-schemes.setDefault');

        //Print Labels
        Route::get('/labels/show', [LabelsController::class, 'show'])->name('label.show');
        Route::get('/labels/add-product-row', [LabelsController::class, 'addProductRow']);
        Route::post('/labels/preview', [LabelsController::class, 'preview']);

        //Reports...
        Route::get('/reports/closing-stock-amount', [ReportController::class, 'closingStockAmount'])->name('report.closingStockAmount');

        Route::get('/reports/service-staff-report', [ReportController::class, 'getServiceStaffReport'])->name('report.getServiceStaffReport');
        Route::get('/reports/service-staff-line-orders', [ReportController::class, 'serviceStaffLineOrders']);
        Route::get('/reports/table-report', [ReportController::class, 'getTableReport'])->name('report.getTableReport');
        Route::get('/reports/profit-loss', [ReportController::class, 'getProfitLoss'])->name('report.getProfitLoss');
        Route::get('/reports/get-opening-stock', [ReportController::class, 'getOpeningStock'])->name('report.getOpeningStock');
        Route::get('/reports/purchase-sell', [ReportController::class, 'getPurchaseSell'])->name('report.getPurchaseSell');
        Route::get('/reports/customer-supplier', [ReportController::class, 'getCustomerSuppliers'])->name('report.getCustomerSuppliers');
        Route::get('/reports/stock-report', [ReportController::class, 'getStockReport'])->name('report.getStockReport');
        Route::get('/reports/stock-details', [ReportController::class, 'getStockDetails'])->name('report.getStockDetails');
        Route::get('/reports/tax-report', [ReportController::class, 'getTaxReport'])->name('report.getTaxReport');
        Route::get('/reports/trending-products', [ReportController::class, 'getTrendingProducts'])->name('report.getTrendingProducts');
        Route::get('/reports/expense-report', [ReportController::class, 'getExpenseReport'])->name('report.getExpenseReport');
        Route::get('/reports/income-report', [ReportController::class, 'getIncomeReport'])->name('report.getIncomeReport');

        Route::get('/reports/expense-category-wise', [ReportController::class, 'getExpenseCategoryReport'])->name('report.getExpenseCategoryReport');

        Route::get('/reports/stock-adjustment-report', [ReportController::class, 'getStockAdjustmentReport'])->name('report.getStockAdjustmentReport');
        Route::get('/reports/register-report', [ReportController::class, 'getRegisterReport'])->name('report.getRegisterReport');
        Route::get('/reports/sales-representative-report', [ReportController::class, 'getSalesRepresentativeReport'])->name('report.getSalesRepresentativeReport');
        Route::get('/reports/sales-representative-total-expense', [ReportController::class, 'getSalesRepresentativeTotalExpense'])->name('report.getSalesRepresentativeTotalExpense');
        Route::get('/reports/sales-representative-total-sell', [ReportController::class, 'getSalesRepresentativeTotalSell']);
        Route::get('/reports/sales-representative-total-commission', [ReportController::class, 'getSalesRepresentativeTotalCommission'])->name('report.getSalesRepresentativeTotalCommission');
        Route::get('/reports/stock-expiry', [ReportController::class, 'getStockExpiryReport'])->name('report.getStockExpiryReport');
        Route::get('/reports/stock-expiry-edit-modal/{purchase_line_id}', [ReportController::class, 'getStockExpiryReportEditModal'])->name('report.getStockExpiryReportEditModal');
        Route::post('/reports/stock-expiry-update', [ReportController::class, 'updateStockExpiryReport'])->name('updateStockExpiryReport')->name('report.updateStockExpiryReport');
        Route::get('/reports/customer-group', [ReportController::class, 'getCustomerGroup'])->name('report.getCustomerGroup');
        Route::get('/reports/product-purchase-report', [ReportController::class, 'getproductPurchaseReport'])->name('report.getproductPurchaseReport');
        Route::get('/reports/product-sell-report', [ReportController::class, 'getproductSellReport'])->name('report.getproductSellReport');
        Route::get('/reports/product-sell-grouped-report', [ReportController::class, 'getproductSellGroupedReport']);
        Route::get('/reports/lot-report', [ReportController::class, 'getLotReport'])->name('report.getLotReport');
        Route::get('/reports/purchase-payment-report', [ReportController::class, 'purchasePaymentReport'])->name('report.purchasePaymentReport');
        Route::get('/reports/sell-payment-report', [ReportController::class, 'sellPaymentReport'])->name('report.sellPaymentReport');
        Route::get('/reports/product-stock-details', [ReportController::class, 'productStockDetails']);
        Route::get('/reports/adjust-product-stock', [ReportController::class, 'adjustProductStock']);
        Route::get('/reports/get-profit/{by?}', [ReportController::class, 'getProfit']);

        Route::get('/reports/item-report', [ReportController::class, 'getItemReport'])->name('report.getItemReport');
        //Business Location Settings...
        Route::prefix('business-location/{location_id}')->name('location.')->group(function () {
            Route::get('settings', [LocationSettingsController::class, 'index'])->name('settings');
            Route::post('settings', [LocationSettingsController::class, 'updateSettings'])->name('settings_update');
        });
        //Business Locations...
        Route::post('business-location/check-location-id', [BusinessLocationController::class, 'checkLocationId']);
        //Transaction payments...
        Route::get('/payments/get-contact-transaction/{id}', [TransactionPaymentController::class, 'getContactTransaction']);
        Route::get('/payments/opening-balance/{contact_id}', [TransactionPaymentController::class, 'getOpeningBalancePayments'])->name('payments.getOpeningBalancePayments');
        Route::get('/payments/show-child-payments/{payment_id}', [TransactionPaymentController::class, 'showChildPayments']);
        Route::get('/payments/view-payment/{payment_id}', [TransactionPaymentController::class, 'viewPayment'])->name('payments.viewPayment');
        Route::get('/payments/add_payment/{transaction_id}', [TransactionPaymentController::class, 'addPayment'])->name('payments.addPayment');
        Route::get('/payments/pay-contact-due/{contact_id}', [TransactionPaymentController::class, 'getPayContactDue'])->name('payments.getPayContactDue');
        Route::post('/payments/pay-contact-due', [TransactionPaymentController::class, 'postPayContactDue'])->name('payments.postPayContactDue');

        Route::get('/stock-adjustments/remove-expired-stock/{purchase_line_id}', [StockAdjustmentController::class, 'removeExpiredStock']);
        Route::post('/stock-adjustments/get_product_row', [StockAdjustmentController::class, 'getProductRow']);


        Route::get('/cash-register/register-details', [CashRegisterController::class, 'getRegisterDetails']);
        Route::get('/cash-register/close-register', [CashRegisterController::class, 'getCloseRegister']);
        Route::post('/cash-register/close-register', [CashRegisterController::class, 'postCloseRegister']);

        //Import products
        Route::get('/import-products', [ImportProductsController::class, 'index'])->name('import-products.index');
        Route::post('/import-products/store', [ImportProductsController::class, 'store'])->name('import-products.store');
        //Stock Transfer
        Route::get('stock-transfers/print/{id}', [StockTransferController::class, 'printInvoice'])->name('stock-transfers.printInvoice');

        Route::get('/opening-stock/add/{product_id}', [OpeningStockController::class, 'add'])->name('openingStock.add');
        Route::post('/opening-stock/save', [OpeningStockController::class, 'save'])->name('openingStock.save');

        //Import opening stock
        Route::get('/import-opening-stock', [ImportOpeningStockController::class, 'index'])->name('import-opening-stock.index');
        Route::post('/import-opening-stock/store', [ImportOpeningStockController::class, 'store'])->name('import-opening-stock.store');

        //Sell return
        Route::get('sell-return/get-product-row', [SellReturnController::class, 'getProductRow']);
        Route::get('/sell-return/print/{id}', [SellReturnController::class, 'printInvoice']);
        Route::get('/sell-return/add/{id}', [SellReturnController::class, 'add'])->name('sellReturn.add');

        //Backup
        Route::get('backup/download/{file_name}', [BackUpController::class, 'download']);
        Route::get('backup/delete/{file_name}', [BackUpController::class, 'delete']);

        Route::get('notification/get-template/{transaction_id}/{template_for}', [NotificationController::class, 'getTemplate'])->name('notification.getTemplate');
        Route::post('notification/send', [NotificationController::class, 'send']);

        Route::post('/purchase-return/update', [CombinedPurchaseReturnController::class, 'update']);
        Route::get('/purchase-return/edit/{id}', [CombinedPurchaseReturnController::class, 'edit'])->name('combinedPurchaseReturn.edit');
        Route::post('/purchase-return/save', [CombinedPurchaseReturnController::class, 'save'])->name('combinedPurchaseReturn.save');
        Route::post('/purchase-return/get_product_row', [CombinedPurchaseReturnController::class, 'getProductRow']);
        Route::get('/purchase-return/create', [CombinedPurchaseReturnController::class, 'create'])->name('purchase.return.create');
        Route::get('/purchase-return/add/{id}', [PurchaseReturnController::class, 'add'])->name('purchase.return.add');

        Route::get('/discount/activate/{id}', [DiscountController::class, 'activate']);
        Route::post('/discount/mass-deactivate', [DiscountController::class, 'massDeactivate'])->name('discount.massDeactivate');

        Route::group(['prefix' => 'account'], function () {

            Route::get('/fund-transfer/{id}', [AccountController::class, 'getFundTransfer'])->name('account.getFundTransfer');
            Route::post('/fund-transfer', [AccountController::class, 'postFundTransfer'])->name('account.postFundTransfer');
            Route::get('/deposit/{id}', [AccountController::class, 'getDeposit'])->name('account.getDeposit');
            Route::post('/deposit', [AccountController::class, 'postDeposit'])->name('account.postDeposit');
            Route::get('/close/{id}', [AccountController::class, 'close'])->name('account.close');
            Route::get('/open/{id}', [AccountController::class, 'open'])->name('account.open');
            Route::get('/delete-account-transaction/{id}', [AccountController::class, 'destroyAccountTransaction']);
            Route::get('/get-account-balance/{id}', [AccountController::class, 'getAccountBalance']);

            Route::get('/balance-sheet', [AccountReportsController::class, 'balanceSheet'])->name('accountreport.balanceSheet');
            Route::get('/trial-balance', [AccountReportsController::class, 'trialBalance'])->name('accountreport.trialBalance');
            Route::get('/payment-account-report', [AccountReportsController::class, 'paymentAccountReport'])->name('accountreport.paymentAccountReport');
            Route::get('/link-account/{id}', [AccountReportsController::class, 'getLinkAccount']);
            Route::post('/link-account', [AccountReportsController::class, 'postLinkAccount']);
            Route::get('/cash-flow', [AccountController::class, 'cashFlow'])->name('accountreport.cashFlow');
        });
    });
});
