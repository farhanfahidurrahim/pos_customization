<?php

namespace App\Http\Middleware;

use App\Models\Business;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class BusinessSetting
{
   
    public function handle(Request $request, Closure $next): Response
    {
        $bussiness = Business::first();

        if ($bussiness==null) {
            return redirect()->route('business.getRegister');
        }
        return $next($request);
    }
}
