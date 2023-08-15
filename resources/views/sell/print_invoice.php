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
    padding: 70px 40px 40px;
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
.order-info, table th, table td {
    padding: 6px 12px;
}
.order-info {
    margin-bottom: 40px;
}
table {
    width: 100%;
	border-collapse: collapse;
	display: table;
    border-collapse: separate;
    box-sizing: border-box;
    text-indent: initial;
    border-spacing: 2px;
    border-color: grey;
}

*, ::after, ::before {
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
table th, table td {
    border: 1px solid #dee2e6;
}
@media print{
			.order-items th {
			background: #0a5fa2;
			}
		}
</style>

<div class="info-table table-responsive" id="toprint">
    <img src="https://smtrading.maaoshi.com/pos/signature/top-banner.png" alt="image" style="width: 100%;">
    <!--div class="order-branding">
        <div class="right-invoice">INVOICE</div>
        <h2 class="company-address" style=" background: #0a5fa2; width: fit-content; padding: 6px 12px; color: white; ">SM TRADINGBD <br>
M/S, SUMAIYA TRADERS <br>
M/S, MARUF ENTERPRISE</h2>
<h5>
All kinds of Old &amp; New Steel Pipe, Steel plate, <br>
Steel Sheet pile, Steel Angel, U Chanel, H-Beam <br>
&amp; Construction Materials Wholesale Suppliers.
</h5>
        <p>
            P.C Road, Saraipara,<br />
            Pahartali, Chittagong - 4219,<br />
            Mobile: +8801728-817223<br />
            Mobile: +8801812-384700<br />
            smtradingctg23@gmail.com
        </p>
    </div-->
    <div class="order-addresses" style="margin-top:170px;">
        <div class="billing-address" style="width: 60%;">
            <h3 style=" background: #0a5fa2; width: fit-content; padding: 6px 12px; color: white; ">Client information</h3>
            <p>
                {{ $sell->contact->name}},<br />
                {{ $sell->contact->supplier_business_name}},<br />
                {{ $sell->contact->landmark.' '.$sell->contact->state.' '.$sell->contact->city}} <br />
                Mobile: {{ $sell->contact->email}}<br />
                {{ $sell->contact->email}}
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
                    <th>Order Number:</th>
                    <td>{{ $sell->invoice_no}}</td>
                </tr>
                
                <tr>
                    <th>Order Date:</th>
                    <td>{{ date('d M, Y', strtotime($sell->transaction_date))}}</td>
                    
                </tr>
                <tr>
                    <th>Payment Status:</th>
                    <td>
                        <span style="color: green;">{{ $sell->payment_status}}</span>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        
    </div>
    <table class="order-items" style="margin-bottom: 3px;">
	<img src="https://smtradingbd.com/wp-content/uploads/2021/01/smtrading-logo-2021.png" alt="smtrading" style=" width:500px; margin-bottom: -400px; margin-left: 360; opacity: .2; -webkit-filter: grayscale(100%); filter: grayscale(100%); transform: rotate(334deg); "/>
        <thead>
            <tr style="background: #0a5fa2; color: #fff;">
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
                <td class="sl">
                    {{ $key +1}}
                    <dl class="meta">
                        <dt></dt>
                        <dd></dd>
                    </dl>
                </td>
                <td class="product">
                    {{ $line->product->name}}
                    <dl class="meta">
                        <dt></dt>
                        <dd></dd>
                    </dl>
                </td>
                <td class="qty" style="text-align: center;">
                    {{ $line->quantity}}
                </td>
                <td class="product" style="text-align: left;">
                    {{ $line->product->unit->actual_name}}
                    <dl class="meta">
                        <dt></dt>
                        <dd></dd>
                    </dl>
                </td>
                <td class="price">৳  {{ $line->unit_price_inc_tax}}</td>
                <td class="total">
                    ৳  {{ $line->quantity * $line->unit_price_inc_tax}}
                    <del></del>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot style="text-align: right;">
            <tr class="order-discount">
                <th colspan="5" style=" background: white; ">Sub Total:</th>
                <td colspan="1">{{ number_format($sell->total_before_tax,2)}}</td>
            </tr>
            <tr class="order-discount">
                <th colspan="5" style=" background: white; ">Discount:</th>
                <td colspan="1">{{ number_format($sell->discount_amount,2)}}</td>
            </tr>
            <tr class="order-discount">
                <th colspan="5" style=" background: white; ">Transport:</th>
                <td colspan="1">{{ number_format($sell->shipping_charges,2)}}</td>
            </tr>
            <tr class="order-discount">
                <th colspan="5" style=" background: white; ">Vat &amp; Tax Amount:</th>
                <td colspan="1">{{ number_format($sell->tax_amount,2)}}</td>
            </tr>
			<tr class="order-discount">
                <th colspan="5"  style="background: white; font-size: 18px; font-weight: 1000; color: red;">Return Amount:</th>
                <td colspan="1">{{ $sell->return_parent ? $sell->return_parent->final_total :0}}</td>
            </tr>

            <tr class="order-total">
                <th colspan="5" style=" background: white; ">Payable Amount:</th>
                <td colspan="1">{{ number_format($sell->final_total,2)}}</td>
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
                    {{ number_format($sell->final_total - $sell->payment_lines->sum('amount'),2)}}
                </td>
            </tr>
        </tfoot>
    </table>
	<br>
	
	@if($sell->return_parent)
	<table class="order-items" style="border: none;">
        <thead>
            <tr style="background: #0a5fa2; color: #fff;">
                <th class="product">Return Date</th>
                <th class="qty" style="text-align: left;">Product/Service Name</th>
                <th class="total">Quantity</th>
                <th class="total">Unit</th>
				<th class="total">Unit Price</th>
				<th class="total">Return Amount</th>
        </thead>
        
        <tbody>
            @foreach($sell->sell_lines as $r_line)
            @if($r_line->quantity_returned >0)
            <tr>
                <td class="qty" style="text-align: left;">
                   {{ date('d M, Y', strtotime($r_line->created_at))}}
                </td>
                <td class="price" style="text-align: left;"> {{ $r_line->product->name}}</td>
				<td class="qty" style="text-align: left;"> {{ $r_line->quantity_returned}}</td>
				<td class="qty" style="text-align: left;">{{ $r_line->product->unit->actual_name}}</td>
				<td class="qty" style="text-align: left;">{{ $r_line->unit_price_inc_tax}}</td>
                <td class="total"> ৳  {{ number_format ($r_line->quantity_returned * $r_line->unit_price_inc_tax,2)}}<del></del></td>
                
            </tr>
            
            
            @endif
            
            @endforeach
        </tbody>
        
        
    </table>
    @endif
	<br>
	
    <table class="order-items" style="border: none;">
        <thead>
            <tr style="background: #0a5fa2; color: #fff;">
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
                    {{ ucfirst($line->method) }}
                    
                    
                    @if($line->transaction_no)
                    (A/C No : {{$line->transaction_no}} ,
                    @elseif($line->card_number)
                    (A/C No : {{$line->card_number}} ,
                    @elseif($line->bank_account_number)
                    (A/C No : {{$line->bank_account_number}} ,
                    
                    @endif
                    
                    @if($line->payment_account)
                    A/C Name : {{ $line->payment_account->name}} )
                    @endif
                </td>
                <td class="total">
                    ৳  {{ number_format($line->amount,2)}}
                    <del></del>
                </td>
                <td class="price">
                    <a class="dropdown-item delete" href="#" data-url="https://www.smtradingbd.com/final_test/transaction-sale-payment-delete/15" data-toggle="modal" data-target="#myModal">
                        <i class="fas fa-trash-alt text-orange-red"></i>Delete
                    </a>
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


<script type="text/javascript">   
    window.onload = function() { window.print(); }
</script>

