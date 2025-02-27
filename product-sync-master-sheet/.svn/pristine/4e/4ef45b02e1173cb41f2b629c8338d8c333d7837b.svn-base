<?php 

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$product_id = 14384;
$premum_try_demo = 'https://wpprincipal.xyz/?site=pssg';

$final_data = [
    'pricing_variable' => [ 1 => 49, 2 => 69, 3 => 99, 4 => 129, 5 => 149, 6 => 169],
    
];



$transient_name = $prefix . 'pricing_variables_' . $product_id;
$rem_pricing_variable = get_transient($transient_name);
if (false === $rem_pricing_variable || empty($rem_pricing_variable)) {
    $rem_pricing_variable = sflpricing_codeastrology_get_n_manage_data($product_id, $transient_name);
}
if(is_array($rem_pricing_variable) && !empty($rem_pricing_variable)){
    $temp_pricing_variable = [];$serial = 1;
    foreach ($rem_pricing_variable as $key => $value) {
        // $temp_pricing_variable[] = $value;
        // dd($value);
        $final_data['pricing_variable'][$serial] = $value;
        $serial++;
    }   

}
$pricing_variables = $final_data['pricing_variable'];

//Fixing 00 price issue and setting default price with float value
$pricing_variables = array_map(function($price){
    return (float) $price;
}, $pricing_variables);
