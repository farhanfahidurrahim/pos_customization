<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-bordered table-striped"  style="width:100%">
            <thead>
                <tr class="bg-primary">
                    <th>@lang('messages.date')</th>
                    <th>@lang('sale.invoice_no')</th>
                    <th>Type</th>
                    <th>@lang('sale.payment_status')</th>
                    <th>@lang('sale.total_amount')</th>
                    <th>Refrence No</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $item)
                <tr>
                    <td>{{ date("d M, Y", strtotime($item->created_at))}}</td>
                    <td>{{ $item->invoice_no}}</td>
                    <td>{{ $item->type}}</td>
                    
                    <td>{{ $item->payment_status}}</td>
                    <td>{{ $item->amount}}</td>
                    <td>{{ $item->ref_no}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p id="pagination">{{ $results->render() }}</p>
</div>