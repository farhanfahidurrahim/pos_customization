<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Utils\BusinessUtil;

use App\Models\Business;
use Illuminate\Support\Facades\Session;

class SetSessionData
{
    /**
     * Checks if session data is set or not for a user. If data is not set then set it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // if (!$request->session()->has('user')) {
            Session::forget('user'); 
            Session::forget('business'); 
            Session::forget('currency'); 
            Session::forget('financial_year'); 

            $business_util = new BusinessUtil;
            $user = Auth::user();
          //  dd($user->id);
            $session_data = ['id' => $user->id,
                            'surname' => $user->surname,
                            'first_name' => $user->first_name,
                            'last_name' => $user->last_name,
                            'email' => $user->email,
                            'business_id' => $user->business_id,
                            'language' => $user->language,
                            ];
            $business = Business::findOrFail($user->business_id);
            
            $currency = $business->currency;
            $currency_data = ['id' => $currency->id,
                                'code' => $currency->code,
                                'symbol' => $currency->symbol,
                                'thousand_separator' => $currency->thousand_separator,
                                'decimal_separator' => $currency->decimal_separator
                            ];

            $request->session()->put('user', $session_data);
            $request->session()->put('business', $business);
            $request->session()->put('currency', $currency_data);

            //set current financial year to session
            $financial_year = $business_util->getCurrentFinancialYear($business->id);
            $request->session()->put('financial_year', $financial_year);
       // }

        return $next($request);
    }
}
