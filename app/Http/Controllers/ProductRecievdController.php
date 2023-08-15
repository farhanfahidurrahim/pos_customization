<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductRecievd;
use App\Models\Transaction;

class ProductRecievdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->purchase_line_id)){
           foreach($request->purchase_line_id as $key=>$id){
               $line=new ProductRecievd();
               $line->purchase_line_id=$id;
               $line->date=request('date');
               $line->transaction_id=request('transaction_id');
               $line->ref_no=request('ref_no');
               $line->quantity=$request->quantity[$key];
               $line->save();
           }
           $output = ['success' => 1,
                            'msg' => __('Product Recived Successfully')
                        ];
        }else{
            $output = ['success' => 0,
                            'msg' => __('messages.something_went_wrong')
                        ];
        }
        
        return redirect('purchases')->with('status', $output);
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $business_id = request()->session()->get('user.business_id');
        $purchase = Transaction::where('business_id', $business_id)
                                ->where('id', $id)
                                ->with('contact','purchase_lines','purchase_lines.product','purchase_lines.product.unit','purchase_lines.product_recieves')
                                ->firstOrFail();
        return view('product_recieve.create')->with(compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
