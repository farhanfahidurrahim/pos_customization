<div class="row bg-gray">
    <br><div class="col-md-3 text-center">
        <div class="well">
            <p><b>Closing Stock (By Purchase Price)</b></p>
            <h3> {{ number_format($p_price,2)}}</h3>
        </div>
    </div>
    <div class="col-md-3 text-center">
        <div class="well">
            <p><b>Closing Stock (By Sell Price)</b></p>
            <h3>{{  number_format($sell_price,2)}}</h3>
        </div>
    </div>
    <div class="col-md-3 text-center">
        <div class="well">
            <p><b>Potential Profit</b></p>
            <h3>{{ number_format($profit,2)}}</h3>
        </div>
    </div>
    <div class="col-md-3 text-center">
        <div class="well">
            <p><b>Profit Margin %</b></p>
            <h3>{{ number_format($profit_margin,2)}}</h3>
        </div>
    </div>

</div>