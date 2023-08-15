<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use DB;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $business_id = request()->session()->get('user.business_id');
            $purchases = Package::join('products','products.id','=','packages.product_id')
                        ->select('packages.*','products.name','products.sku')
                        ->where('packages.business_id', $business_id)
                        ->orderby('packages.id','desc');
            return Datatables::of($purchases)

            ->addColumn('action',
                    '@can("brand.update")
                    <button data-href="{{action(\'PackageController@edit\', [$id])}}" class="btn btn-xs btn-primary btn-modal" data-container=".category_modal"><i class="glyphicon glyphicon-edit"></i> @lang("messages.edit")</button>
                        &nbsp;
                    <button data-href="{{action(\'PackageDetailsController@detailsIndex\',[$id])}}" class="btn btn-xs btn-primary btn-modal" data-container=".category_modal"><i class="glyphicon glyphicon-envelope"></i> View Raw Items</button>
                    &nbsp;
                    @endcan
                    @can("brand.delete")
        
                         <button data-info="This Dish Will be Deleted!" data-href="{{action(\'PackageController@destroy\', [$id])}}" class="btn btn-xs btn-danger delete_package_button"><i class="glyphicon glyphicon-trash"></i> @lang("messages.delete")</button>
                    @endcan')

            ->editColumn('created_at', function ($row) use ($business_id)
            {
                $min_checker = 0;
                $package =Package::with('raws')->find($row->id);
                foreach($package->raws as $items)
                {
                    $stock_check = DB::table('variation_location_details')
                                    ->select(DB::raw("SUM(qty_available) as remain_stock"))
                                    ->where('location_id',$business_id)
                                    ->where('product_id', $items->raw_product_id)
                                    ->first();
                    $temp = $stock_check ?$stock_check->remain_stock: 0;

                    $array[]=$temp;
                    $value=min($array);
                    $min_checker = $value;
                }
                return number_format($min_checker ,2);
            })
            ->rawColumns(['action'])
            ->make(true);
            }

        return view('package.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $ps=Product::whereNotNull('combo')->get();
       return view('package.create',compact('ps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {   $business_id = request()->session()->get('user.business_id');

        $package=Package::updateOrCreate(['product_id'=>$r->product_id],['business_id'=>$business_id]);
        $rows = $r->input('raw_product_id');
        if (isset($rows)) {
            foreach ($rows as $key=>$row){
                 PackageDetails::updateOrCreate(['package_id'=>$package->id,'raw_product_id'=>$row], ['qty'=>1]);
            }
        }
                
        return redirect()->route('packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $products=Product::whereNotNull('combo')->get();
        return view('package.edit',compact('products','package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $package->product_id=$request->product_id;
        $package->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (request()->ajax()) {
            try {
                
                $package=Package::find($id);

                if ($package->raws()->count() >0) {
                   $package->raws()->delete();
                }
                $package->delete();
                $output = ['success' => true,
                        'msg' => __("contact.deleted_success")
                        ];

            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
            }

            return $output;
        }
        //
    }


    public function list(){

        if (request()->ajax()) {
            $term = request()->input('term', '');

            $business_id = request()->session()->get('user.business_id');

            $products = Product::whereNull('combo')
            ->select(
                'products.id',
                'products.name',
                'products.sku'
            );
            
            //Include search
            if (!empty($term)) {
                $products->where(function ($query) use ($term) {
                    $query->where('products.name', 'like', '%' . $term .'%');
                    $query->orWhere('sku', 'like', '%' . $term .'%');
                });
            }
            
            $result = $products->get();
            return json_encode($result);
        }
    }


    public function entryList(){

        $products=Product::select('id','name','sku')->where('id',request()->id)->get();

        $view= view('package.product_raw', compact('products'))->render();

        return response(['view'=>$view,'success'=>true]);
    }
}
