<?php

namespace App\Http\Controllers;

use App\Models\PackageDetails;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;

class PackageDetailsController extends Controller
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
        $rows = $request->input('product_id');
        foreach ($rows as $key=>$row)
        {
        PackageDetails::updateOrCreate(['package_id'=>$request->package_id,'raw_product_id'=>$row], ['qty'=>1]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackageDetails  $packageDetails
     * @return \Illuminate\Http\Response
     */
    public function show(PackageDetails $packageDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackageDetails  $packageDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageDetails $packageDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackageDetails  $packageDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageDetails $packageDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackageDetails  $packageDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $packageDetails=PackageDetails::find($id);
        $packageDetails->delete();
        return back();
    }

    public function detailsCreate($id){
        $products=Product::whereNull('combo')->get();
        $package=Package::with('product')->find($id);
        return view('package.details_create',compact('products','package'));
    }

    public function detailsIndex($id){
        $package=Package::with('product','raws','raws.product')->find($id);
        return view('package.details_index',compact('package'));
    }
}
