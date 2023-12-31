<?php

use App\Models\Package;
use Illuminate\Support\Facades\DB;

/**
 * boots pos.
 */
 
function getSellStatus(){
    return [
        'Pending'=>'0',    
        'Processing'=>'1',    
        'Delivered'=>'2',    
        'Cancelled'=>'3',    
    ];
}
function pos_boot($ul, $pt, $lc, $em, $un, $type = 1){

    $ch = curl_init();
    $request_url = ($type == 1) ? base64_decode(config('author.lic1')) : base64_decode(config('author.lic2'));

    $curlConfig = array(CURLOPT_URL => $request_url, 
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_POSTFIELDS     => array(
            'url' => $ul,
            'path' => $pt,
            'license_code' => $lc,
            'email' => $em,
            'username' => $un,
            'product_id' => config('author.pid')
        )
    );
    curl_setopt_array($ch, $curlConfig);
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_msg = 'C'.'U'.'RL '.'E'.'rro'.'r: ';
        $error_msg .= curl_errno($ch);

        return redirect()->back()
            ->with('error', $error_msg);
    }
    curl_close($ch);

    if($result){
        $result = json_decode($result, true);

        if($result['flag'] == 'valid'){
            // if(!empty($result['data'])){
            //     $this->_handle_data($result['data']);
            // }
        } else {
            return redirect()->back()
                ->with('error', "I"."nvali"."d "."Lic"."ense Det"."ails");
        }
    }
}

if (! function_exists('humanFilesize')) {
    function humanFilesize($size, $precision = 2)
    {
        $units = ['B','kB','MB','GB','TB','PB','EB','ZB','YB'];
        $step = 1024;
        $i = 0;

        while (($size / $step) > 0.9) {
            $size = $size / $step;
            $i++;
        }
        
        return round($size, $precision).$units[$i];
    }
}

/**
 * Checks if the uploaded document is an image
 */
if (! function_exists('isFileImage')) {
    function isFileImage($filename)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $array = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF'];
        $output = in_array($ext, $array) ? true : false;

        return $output;
    }
}

 function checkQty($product_id, $location_id = null){

        $min_checker = 0;
        $package =Package::with('raws')->where('product_id',$product_id)->first();
        foreach($package->raws as $items)
        {
            $stock_check = DB::table('variation_location_details')
                            ->select(DB::raw("SUM(qty_available) as remain_stock"))
                            ->where('location_id',$location_id)
                            ->where('product_id', $items->raw_product_id)
                            ->first();
            $temp = $stock_check ?$stock_check->remain_stock: 0;

            $array[]=$temp;
            $value=min($array);
            $min_checker = $value;
        }
        return number_format($min_checker ,2);
    }
