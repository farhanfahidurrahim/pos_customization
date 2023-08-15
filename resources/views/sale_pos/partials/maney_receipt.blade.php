<style>
p {
    margin-block-start: 15px;
    margin-block-end: 15px;
    font-size: 18px;
}
h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0;
    margin-block-end: 0;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
h3 {
    display: block;
    font-size: 1.17em;
    margin-block-start: 0;
    margin-block-end: 0;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
.payment-receipt {
    width: 100%;
    height: auto;
    padding: 20px 40px;
    border: 5px double #2196f3;
}
.head {
    text-align: center;
}
.left-right-box-top {
    margin: 50px 0;
}
.left-right-box-bottom {
    margin: 50px 0 0;
}
.right {
    float: right;
}
.text-box {
    margin-bottom: 50px;
}
table thead, th {
    font-size: 18px;
}
table {
    border-collapse: collapse;
    display: table;
    box-sizing: border-box;
    text-indent: initial;
    border-spacing: 2px;
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
    border: 1px solid #dee2e6;
}




/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
</style>

<div class="payment-receipt">
    <div class="row">
        <div class="col-md-12">
            <div class="head">
                <h1 style="font-family: sans-serif; color: #2196f3;">SM Tradingbd</h1>
                <p>
                    Port Connecting Road, Sagarika Moor, Pahartali, Chittagong-4219, Bangladesh.<br />
                    Mobile: +88 01728-817223 | +88 01829-851799<br />
                    Email: smtradingbd23@gmail.com | www.smtradingbd.com
                </p>
                <h2 style="font-family: sans-serif;">Money Receipt</h2>
            </div>

            <div class="left-right-box-top">
                <div class="left"><h3>Receipt No: {{ $transaction->invoice_no}}</h3></div>
                <div class="right"><h3 style="margin-top: -22px; margin-right:120px;">Date: {{ date('d/m/Y')}}</h3></div>
            </div>
            <div class="text-box">
                <p>Received from: {{$transaction->contact->supplier_business_name.' , '. $transaction->contact->name}}</p>
                <p>For: SM Tradingbd</p>
            </div>
        </div>
        <div class="row">
            <div class="column" style="background-color:#aaa;">
                <div class="amount">
                    <p>Amount:</p>
                    <table>
                        <tbody>
                            <tr>
                                <th style="width: 55%;">Total Amount</th>
                                <td>{{ number_format($transaction->final_total,2)}}</td>
                            </tr>
                            <tr>
                                <th>Amount Received</th>
                                <td>{{ number_format($transaction->payment_lines->sum('amount'),2)}}</td>
                            </tr>
                            <tr>
                                <th>Balance Due</th>
                                <td>{{ number_format($transaction->final_total - $transaction->payment_lines->sum('amount'),2)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="column" style="background-color:#bbb;">
                <p>Payment Received in:</p>
                <form action="/action_page.php">
                    @foreach($transaction->payment_lines as $line)
                    <table>
                        <tbody>
                            <tr>
                                <th style="width: 55%;"><label for="fname">{{ ucfirst($line->method)}}:</label>t</th>
                                <td><input type="text" id="fname" name="fname" value="{{$line->amount}}" /></td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                </form>
            </div>
        </div>
        <div class="right">
            <p style="margin-top: -50px; margin-right:120px;">
                <img src="https://smtradingbd.com/portal/storage/quotation/signature/14.png" style="width: 120px; height: 80px;" alt="signature" /><br />
                __________ <br />
                Recived By
            </p>
        </div>
    </div>
</div>



