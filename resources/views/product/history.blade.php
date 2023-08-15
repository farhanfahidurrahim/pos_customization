@extends('layouts.app')
@section('title', __('Product Stock History'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang('sale.products')
        <small>stock History</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
@can('product.view')
    <div class="row">
        <div class="col-md-12">
           <div class="box">
               <div class="box-header"><h3>{{ $product->name .' '.$product->unit->actual_name}}</h3></div>
               
               <div class="box-body">
                   <div class="col-sm-12">
                       <div class="col-sm-4">
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped">
                                   <tr>
                                       <th colspan="2">Quantities In</th>
                                   </tr>
                                   
                                    <tr>
                                       <th>Total Purchase</th>
                                       <td> {{ number_format($purchase->where('type','purchase')->sum('quantity')).' '.$product->unit->actual_name}}</td>
                                    </tr>
                                    
                                    <tr>
                                       <th>Total Opening Stock</th>
                                       <td> {{ number_format($purchase->where('type','opening_stock')->sum('quantity')).' '.$product->unit->actual_name}}</td>
                                    </tr>
                                    
                                    <tr>
                                       <th>Total Sell Return</th>
                                       <td> {{ number_format($sell->where('type','sell')->sum('quantity_returned')).' '.$product->unit->actual_name}}</td>
                                    </tr>
                                    
                                    <tr>
                                       <th>Total Opening Stock (in)</th>
                                       <td> {{ number_format($purchase->where('type','purchase_transfer')->sum('quantity')).' '.$product->unit->actual_name}}</td>
                                    </tr>
                                    
                                    
                                   
                                   
                               </table>
                           </div>
                       </div>
                       <div class="col-sm-4">
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped">
                                   <tr>
                                       <th colspan="2">Quantities Out</th>
                                   </tr>
                                    <tr>
                                       <th>Total Sell</th>
                                       <td> {{ number_format($purchase->sum('quantity_sold')).' '.$product->unit->actual_name}}</td>
                                    </tr>
                                    
                                    <tr>
                                       <th>Total Stcok Adjustment</th>
                                       <td> {{ number_format($purchase->sum('quantity_adjusted')).' '.$product->unit->actual_name}}</td>
                                    </tr>
                                    
                                    <tr>
                                       <th>Total Purchase Return</th>
                                       <td> {{ number_format($purchase->where('type','purchase')->sum('quantity_returned')).' '.$product->unit->actual_name}}</td>
                                    </tr>
                                    
                                    <tr>
                                       <th>Total Opening Stock (out)</th>
                                       <td> {{ number_format($sell->where('type','sell_transfer')->sum('quantity')).' '.$product->unit->actual_name}}</td>
                                    </tr>
                                    
                                    
                               </table>
                           </div>
                       </div>
                       <div class="col-sm-4">
                           <div class="table-responsive">
                               <table class="table table-bordered table-striped">
                                   <tr>
                                       <th colspan="2">Total</th>
                                   </tr>
                                   
                                    <tr>
                                       <th>Total Current Stock</th>
                                       <td> {{ number_format($purchase->sum('quantity') - ($purchase->sum('quantity_returned') + $purchase->sum('quantity_adjusted') +  $purchase->sum('quantity_sold')) ).' '.$product->unit->actual_name}}</td>
                                    </tr>
                                    
                               </table>
                           </div>
                       </div>
                   </div>
                   
               </div>
           </div>
           
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
               <table class="table table-bordered table-striped">
                   <tr>
                       <th>Type</th>
                       <th>Quantity Change</th>
                       <th>Quantity return </th>
                       <th>New Quantity</th>
                       <th>Date</th>
                       <th>Reference Number</th>
                   </tr>
                    @php
                    $total_qty=0;
                    $return_qty=0;
                    
                    @endphp
                   @foreach($lists as $list)
                   
                    @php
                    
                    if($list->purchase_qty){
                   
                        $qty= '+'.$list->purchase_qty;
                    
                    } else{
                        $qty= '-'.$list->sell_qty;
                    }
                    
                    if($list->purchase_returned){
                   
                        $return_qty= '-'.$list->purchase_returned;
                    
                    } elseif($list->sell_return){
                        $return_qty= '+'.$list->sell_return;
                    }else{
                    
                        $return_qty =0;
                    }
                    
                    
                    $total_qty +=$qty;
                    
                    $total_qty +=$return_qty;
         
                   @endphp
                        
                   <tr>
                       <td>{{ $list->type}}</td>
                       <td>{{$qty}}</td>
                       <td>{{$return_qty}}</td>
                       <td>{{ number_format($total_qty,2) }}</td>
                       <td>{{ date('d M , Y', strtotime($list->transaction_date))}}</td>
                       <td>{{ $list->ref_no ? $list->ref_no : $list->invoice_no}}</td>
                   </tr>
                   @endforeach
               </table>
           </div>
                           
        </div>
    </div>
@endcan


@endsection

@section('javascript')
    
@endsection