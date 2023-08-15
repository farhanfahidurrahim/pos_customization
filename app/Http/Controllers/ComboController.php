<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ComboController extends Controller
{
    public function get_combo(Request $request){
    	return  view('combo.create');
    }

    public function store(Request $request){
    	$title = $request->title;

    	 $data = $request->validate([
            "title"    => "required|string|min:3",
        ]);

        DB::table('combos')->insert([
            'title'=> $request->title,
            'price'=> 0,
        ]);

        Session::flash('success', 'Combo Created successfuly!');

        return back();
    }
}
