<style>
    .right-invoice {
        text-align: right;
        margin-left: 0;
        margin-bottom: -55px;
        font-size: 40px;
        font-weight: 700;
    }
    .signature-left {
        text-align: center;
        border: 1px solid #fff;
        padding-top: 100px;
    }
    .signature-right {
        text-align: center;
        border: 1px solid #fff;
        padding-top: 100px;
    }
    .footer p {
        text-align: center;
    }
    .info-table {
        padding: 10px 40px 40px;
        display: block;
        width: 100%;
        overflow-x: auto;
    }
    .order-addresses {
        display: table;
        width: 100%;
    }
    .shipping-address {
        display: table-cell;
    }
    .order-info,
    table th,
    table td {
        padding: 6px 12px;
    }
    .order-info {
        margin-bottom: 40px;
    }
    table thead, th {
    font-size: 18px;
}
    table {
        width: 100%;
        border-collapse: collapse;
        display: table;
        box-sizing: border-box;
        text-indent: initial;
        border-spacing: unset;
        border-color: grey;
    }
    
    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }
    tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }
    table tr {
        border-bottom: 1px solid #ddd;
    }
    table th,
    table td {
        border: 1px solid #666262;
    }
    @media print {
        .order-items th {
            background: #0a5fa2;
        }
    }
    
    </style>
    
    <div class="sale-invoice">
    
        <div class="invoice-name" style="margin-top: 50px; text-align: center; font-size: 34px; font-weight: 600; margin-bottom: 30px;">INVOICE</div>
        <div class="info-table table-responsive" id="toprint">
            <div class="order-addresses" style="">
                <div class="billing-address" style="width: 60%;">
                    <h3 style="background: #002A53; padding: 6px 12px; color: white; border: 0.5px solid;">Client information</h3>
                    <p>
                        {{ $sell->contact->name}},<br />
                        {{ $sell->contact->supplier_business_name}},<br />
                        {{ $sell->contact->landmark.' '.$sell->contact->state.' '.$sell->contact->city}} <br />
                        Mobile: {{ $sell->contact->mobile}}<br />
                        Email: {{ $sell->contact->email}}
                    </p>
                </div>
                <div class="shipping-address" style="width: 40%;">
                    <table class="order-info" style="margin-top: 0px; text-align: right;">
                        <tbody>
                            <tr>
                                <th>Reference No:</th>
                                <td>{{ $sell->ref_no}}</td>
                            </tr>
    
                            <tr>
                                <th>Invoice No:</th>
                                <td>{{ $sell->invoice_no}}</td>
                            </tr>
    
                            <tr>
                                <th>Date:</th>
                                <td>{{ date('d M, Y', strtotime($sell->transaction_date))}}</td>
                            </tr>
                            <tr>
                                <th>Payment Status:</th>
                                <td>
                                    <span style="color: green; text-transform: uppercase; font-weight: bolder;">{{ $sell->payment_status}}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <table class="order-items" style="margin-bottom: 3px;">
                <img src="https://smtradingbd.com/wp-content/uploads/2021/01/smtrading-logo-2021.png" alt="smtrading" style=" width:500px; margin-bottom: -400px; margin-left: 360; opacity: .2; -webkit-filter: grayscale(100%); filter: grayscale(100%); transform: rotate(334deg); "/>
                <thead>
                    <tr style="background: #002A53; color: white;">
                        <th class="sl">SL</th>
                        <th class="product">Product/Service Name</th>
                        <th class="qty">Quantity</th>
                        <th class="product">Unit</th>
                        <th class="price">Unit Price</th>
                        <th class="total">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sell->sell_lines as $key => $line)
                    <tr>
                        <td class="sl" style="text-align: center;">
                            {{ $key +1}}
                            <dl class="meta">
                                <dt></dt>
                                <dd></dd>
                            </dl>
                        </td>
                        <td class="product" style="text-align: center;">
                            {{ $line->product->name}}
                            <dl class="meta">
                                <dt></dt>
                                <dd></dd>
                            </dl>
                        </td>
                        <td class="qty" style="text-align: center;">
                            {{ $line->quantity}}
                        </td>
                        <td class="product" style="text-align: center;">
                            {{ $line->product->unit->actual_name}}
                            <dl class="meta">
                                <dt></dt>
                                <dd></dd>
                            </dl>
                        </td>
                        <td class="price" style="text-align: center;">৳ {{ $line->unit_price_inc_tax}}</td>
                        <td class="total" style="text-align: end;">
                            ৳ {{ number_format($line->quantity * $line->unit_price_inc_tax,2)}}
                            <del></del>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
    
                @php $return_amount=$sell->return_parent ? $sell->return_parent->final_total :0; @endphp
                <tfoot style="text-align: right;">
                    <tr class="order-discount">
                        <th colspan="5" style="background: white;">Sub Total:</th>
                        <td colspan="1">{{ number_format($sell->total_before_tax,2)}}</td>
                    </tr>
                    <tr class="order-discount">
                        <th colspan="5" style="background: white;">Discount:</th>
                        <td colspan="1">{{ number_format($sell->discount_amount,2)}}</td>
                    </tr>
                    <tr class="order-discount">
                        <th colspan="5" style="background: white;">Loading/Transport:</th>
                        <td colspan="1">{{ number_format($sell->shipping_charges,2)}}</td>
                    </tr>
                    <tr class="order-discount">
                        <th colspan="5" style="background: white;">Vat &amp; Tax Amount:</th>
                        <td colspan="1">{{ number_format($sell->tax_amount,2)}}</td>
                    </tr>
                    <tr class="order-discount">
                        <th colspan="5" style="background: white; font-size: 18px; font-weight: 1000; color: red;">Return Amount:</th>
                        <td colspan="1">{{ $sell->return_parent ? $sell->return_parent->final_total :0}}</td>
                    </tr>
    
                    <tr class="order-total">
                        <th colspan="5" style="background: white;">Payable Amount:</th>
                        <td colspan="1">{{ number_format($sell->final_total - $return_amount,2)}}</td>
                    </tr>
                    <tr class="pos_cash-tendered">
                        <th colspan="5" style="background: white; font-size: 18px; font-weight: 1000; color: green;">PAID AMOUNT:</th>
                        <td colspan="1">
                            {{ number_format($sell->payment_lines->sum('amount'),2)}}
                        </td>
                    </tr>
                    <tr class="pos_cash-change">
                        <th colspan="5" style="background: white; font-size: 18px; font-weight: 1000; color: red;">DUE AMOUNT:</th>
                        <td colspan="1">
                            {{ number_format($sell->final_total - $sell->payment_lines->sum('amount') - $return_amount,2)}}
                        </td>
                    </tr>
                </tfoot>
            </table>
            <br />
    
            @if($sell->return_parent)
            <table class="order-items" style="border: none;">
                <thead>
                    <tr style="background: #002A53; color: white;">
                        <th class="product">Return Date</th>
                        <th class="qty" style="text-align: left;">Product/Service Name</th>
                        <th class="total">Quantity</th>
                        <th class="total">Unit</th>
                        <th class="total">Unit Price</th>
                        <th class="total">Return Amount</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach($sell->sell_lines as $r_line) @if($r_line->quantity_returned >0)
                    <tr>
                        <td class="qty" style="text-align: left;">
                            {{ date('d M, Y', strtotime($r_line->created_at))}}
                        </td>
                        <td class="price" style="text-align: left;">{{ $r_line->product->name}}</td>
                        <td class="qty" style="text-align: left;">{{ $r_line->quantity_returned}}</td>
                        <td class="qty" style="text-align: left;">{{ $r_line->product->unit->actual_name}}</td>
                        <td class="qty" style="text-align: left;">{{ $r_line->unit_price_inc_tax}}</td>
                        <td class="total">৳ {{ number_format ($r_line->quantity_returned * $r_line->unit_price_inc_tax,2)}}<del></del></td>
                    </tr>
    
                    @endif @endforeach
                </tbody>
            </table>
            @endif
            <br />
    
            <table class="order-items" style="border: none;">
                <thead>
                    <tr style="background: #002A53; color: white;">
                        <th class="product">Transaction Date</th>
                        <th class="qty" style="text-align: left;">Gateway (payment method)</th>
                        <th class="total">Amount</th>
                        <th class="total">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sell->payment_lines as $line)
                    <tr style="border: none;">
                        <td class="qty" style="text-align: left;">
                            {{ date('d M, Y', strtotime($line->paid_on))}}
                        </td>
                        <td class="price" style="text-align: left;">
                            {{ ucfirst($line->method) }} @if($line->transaction_no) (A/C No : {{$line->transaction_no}} , @elseif($line->card_number) (A/C No : {{$line->card_number}} , @elseif($line->bank_account_number) (A/C No :
                            {{$line->bank_account_number}} , @endif @if($line->payment_account) A/C Name : {{ $line->payment_account->name}} ) @endif
                        </td>
                        <td class="total">
                            ৳ {{ number_format($line->amount,2)}}
                            <del></del>
                        </td>
                        <td class="price">
                            <!--a class="dropdown-item delete" href="#" data-url="https://www.smtradingbd.com/final_test/transaction-sale-payment-delete/15" data-toggle="modal" data-target="#myModal">
                                <i class="fas fa-trash-alt text-orange-red"></i>Delete
                            </a-->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
            <table class="signature">
                <tr>
                    <td class="signature-left">
                        <img src="https://smtradingbd.com/portal/storage/quotation/signature/13.png" style="width: 120px; height: 80px;" alt="signature" /><br />
                        Receiver's signature
                    </td>
                    <td class="signature-right">
                        <img src="https://smtradingbd.com/portal/storage/quotation/signature/14.png" style="width: 120px; height: 80px;" alt="signature" /><br />
                        SM Tradingbd
                    </td>
                </tr>
            </table>
            <div class="order-notes"></div>
            <div class="footer">
                <hr />
                <p>
                    If you have any inquiry about this, please feel free to contact Mr. Milon ( 01728 817223) <br />
                    Thank You For Your Business !!
                </p>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 45" xmlns:v="https://vecta.io/nano">
        <defs>
            <style>
                @font-face {
                    font-family: "Calibri";
                    src: url(data:application/font-woff;charset=utf-8;base64,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)
                        format("woff");
                    font-weight: normal;
                    font-style: normal;
                }
            </style>
        </defs>
        <path d="M598.401 44.976H.311v-31.02h598.09z" fill="#003568" />
        <path d="M301.38 44.98H598.4V.24H319.17c-9.83 0-17.79 7.96-17.79 17.79v26.95z" fill="#ffcb4e" />
        <path d="M556.49.24h55.81v44.74h-55.81z" fill="#f9a51a" />
        <path
            d="M553 17.38v4.34h1.94v-3.14c0-.17.14-.31.31-.31h2.51c.17 0 .31.14.31.31v3.14H560v-4.34l-3.5-2.59-3.5 2.59zm9.96-2.32l-.04-.08c-1.32-2.28-3.75-3.69-6.39-3.69h-.09a7.37 7.37 0 0 0-6.39 3.69l-.04.08a7.37 7.37 0 0 0 0 7.38l.04.07c1.32 2.28 3.76 3.69 6.39 3.69h.09c2.64 0 5.07-1.41 6.39-3.69l.04-.07c1.32-2.29 1.32-5.1 0-7.38zm-2.33 6.97c0 .17-.14.31-.31.31h-2.56c-.17 0-.31-.14-.31-.31v-3.14h-1.88v3.14c0 .17-.14.31-.31.31h-2.56c-.17 0-.31-.14-.31-.31v-4.81c0-.1.05-.19.13-.25l3.81-2.82c.11-.08.26-.08.37 0l3.81 2.82c.08.06.13.15.13.25v4.81z"
            fill="#fff"
        />
        <text transform="matrix(1.1166 0 0 1 338.7428 15.4434)" fill="#231f20" font-family="Calibri" font-size="12">Port Connecting Road, Sagarika Moor</text>
        <text transform="matrix(1.0435 0 0 1 339.2684 27.4434)" fill="#231f20" font-family="Calibri" font-size="12">Pahartali, Chittagong-4219, Bangladesh.</text>
    </svg>
    </div>

    
    
    <script type="text/javascript">   
        window.onload = function() { window.print(); }
    </script>
        
        