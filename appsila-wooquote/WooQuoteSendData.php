  <?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function appsilaSendData($dataarray)
{
              $returnid = '-1';
              $ticaretCRMoptions2 = get_option('sendData_cart');
              $ticaretCRMoptions = get_option('ticaretCRMoptions');
              $ticaretCRMoptions3 = get_option('sendData_single_page');
	 			         $sp_info = get_option('sp_info');
              $email=$ticaretCRMoptions['email'];
    
              $bul      = "-";
              $degistir = "";
              $apikey = str_replace($bul, $degistir,$ticaretCRMoptions['apikey']);//It deletes all '-' characters from apikey input
    
             // $apikey=$ticaretCRMoptions['apikey'];
              $wc_api_key=$ticaretCRMoptions['wc_api_key'];
              $wc_api_secret=$ticaretCRMoptions['wc_api_secret'];
              $hostname=$ticaretCRMoptions['hostname'];

              $currency=0;
              $apikey=strtoupper($apikey);

              $date=date('d.m.Y ');


             if($ticaretCRMoptions2['currency']=='TRY'){ //Determining the referance numbers of currencies.
                $currency2=362;
              }
              elseif($ticaretCRMoptions2['currency']=='EUR'){
                $currency2=360;
              }
              else{
                $currency2=361;
              }
              if($ticaretCRMoptions3['currency']=='TRY'){
                 $currency=362;
               }
               elseif($ticaretCRMoptions3['currency']=='EUR'){
                 $currency=360;
               }
               else{
                 $currency=361;
               }


              if(is_null($dataarray["taxrate"])){
              $names=explode(",",$dataarray["productnames"]);
              $pimagestr=explode(",",$ticaretCRMoptions2["image"]);
              $pimage_linkstr=explode(",",$dataarray["pimage_linkstr"]);
              $pdescriptionstr=explode(",",$dataarray["pdescriptionstr"]);
              $pshort_descriptionstr=explode(",",$dataarray["pshort_descriptionstr"]);
              $pskustr=explode(",",$dataarray["pskustr"]);
              $psku_quantitystr=explode(",",$dataarray["psku_quantitystr"]);
              $quantities=explode(",",$dataarray["quantities"]);
              $sale_price=explode(",",$dataarray["prices"]);
              $regular_price=explode(",",$dataarray["regular-prices"]);
              $tax=explode(",",$dataarray["tax"]);
              $amount=explode(",",$dataarray["line_total"]);
              $array_lenght=count($names);




           for ($x = 0; $x < $array_lenght-1; $x++) {
                  $vat_list.=round( $tax[$x]/$amount[$x]*100 ).";".$tax[$x]."|";
                }
                $vat_list.=round( $tax[$array_lenght-1]/$amount[$array_lenght-1]*100 ).";".$tax[$array_lenght-1];

                $data_string='{"email":"'  . $email . '","apikey":"'  . $apikey . '","address22":"'.$dataarray["address"].'","subject":"' . $dataarray["first_name"]." ".$dataarray["last_name"] ." ".$date." "."quote request" .'","total":"' . ($dataarray["total"]-$dataarray["total_tax"]-$dataarray["total_shipping"]) . '","vat_total":"' . ($dataarray["total_tax"]) . '","grand_total":"' . ($dataarray["total"]-$dataarray["total_shipping"]-$ticaretCRMoptions2['shipping_tax']) . '","discount_type":"percent","valid_till":"2018-12-05T00:00:00","vat_list":"'.$vat_list.'","description":"' . $dataarray["comments"] . '","shipping2":"' . $dataarray["total_shipping"] . '","kupon_kodu":"' . $dataarray["coupon"] . '","customer_key":"' . $wc_api_key . '","currency":' . $currency2 . ',"website_url":"' . $hostname . '","quantity":' . $ticaretCRMoptions2['quantity'] . ',"woo_notification":"' . $ticaretCRMoptions2['email'] . '","ids":[' . $ticaretCRMoptions2['id'] . '],"customer_secret":"' . $wc_api_secret . '","account":{"firm_name":"' . $dataarray["company_name"] . '","phone":"' . $dataarray["phone"] . '","e_mail":"' . $dataarray["email"]. '","GSM":"' . $dataarray["phone"] . '","person_name":"' . $dataarray["first_name"] . '","person_surname":"' . $dataarray["last_name"] . '"},"products":[';
                for ($x = 0; $x < $array_lenght; $x++) {
                    if($sale_price[$x] != "" ){
                      $regular_price[$x]=$sale_price[$x];
                    }

                    $data_string = $data_string . '{"id":' . ($x+110) . ',"name":"' . $names[$x] . '","product_code":"' . $pskustr[$x] . '","product_description":"' . $pdescriptionstr[$x] . '","product_short_description":"' . $pshort_descriptionstr[$x] . '","woo_image": "'.$pimagestr[$x].'","woo_image2": "'.$pimage_linkstr[$x].'","critical_stock_limit":"' . $psku_quantitystr[$x] . '","order":' . ($x+100) . ',"quantity":' . $quantities[$x] . ',"unit_price":' . $regular_price[$x] . ',"vat_percent":' . round( $tax[$x]/$amount[$x]*100 ) . ',"amount":' . $amount[$x] . '},' ;

                }
              $data_string = $data_string . ']}';

              }

              else{
				    $tax_total=(($dataarray["pro_in_tax"]-$dataarray["pro_price"])*$dataarray["billing_quantities"]);
				  $big_total=($dataarray["billing_quantities"]*$dataarray["pro_price"]);
				  $vat_list=round( $tax_total/$big_total*100 ).";".$tax_total;
              		// echo $vat_list."a".$big_total."b".$tax_total;
                $data_string='{"email":"'  . $email . '","address22":"'.$dataarray["address"].'","apikey":"'  . $apikey . '","subject":"' . $dataarray["first_name"]." ".$dataarray["last_name"] ." ".$date." "."quote request" .'","total":' . ($dataarray["billing_quantities"]*$dataarray["pro_price"]) . ',"vat_total":' . (($dataarray["pro_in_tax"]-$dataarray["pro_price"])*$dataarray["billing_quantities"]) . ',"grand_total":' . ($dataarray["billing_quantities"]*$dataarray["pro_in_tax"]) . ',"discount_type":"percent","valid_till":"2018-12-05T00:00:00","vat_list":"'.$vat_list.'","description":"' . $dataarray["comments"] . '","shipping2":"0","kupon_kodu":"' . $dataarray["coupon"] . '","customer_key":"' . $wc_api_key . '","woo_notification":"' . $ticaretCRMoptions3['email'] . '","currency":' . $currency . ',"website_url":"' . $hostname . '","quantity":' . $dataarray["billing_quantities"] . ',"ids":[' . $ticaretCRMoptions3['id'] . '],"customer_secret":"' . $wc_api_secret . '","account":{"firm_name":"' . $dataarray["company_name"] . '","phone":"' . $dataarray["phone"] . '","e_mail":"' . $dataarray["email"] . '","GSM":"' . $dataarray["phone"] . '","person_name": "' . $dataarray["first_name"] . '","person_surname": "' . $dataarray["last_name"] . '"},"products":[{"id":51, "name":"' . $dataarray["sp_name"] . '","product_code":"' . $sp_info['code'] . '","product_description":"' . $sp_info['description'] . '","product_short_description":"' . $sp_info['short_description'] . '","woo_image": "'.$sp_info['image'].'","woo_image2": "'.$sp_info['link'].'","critical_stock_limit":"' . $sp_info['stock'] . '", "order":' . $dataarray["billing_quantities"] . ', "quantity":' . $dataarray["billing_quantities"] . ',"unit_price":' . $dataarray["pro_price"] . ',"vat_percent":' . $dataarray["taxrate"] . ',"amount":' . ($dataarray["pro_price"]*$dataarray["billing_quantities"]) . '}]}';

              }


              $url='https://woocrm.azurewebsites.net/api/basketTransfer?code=ppFYJtZZv2Ea6Yd5Aaw1aBLLW9LAuUV5LdFa862q6DYa87HSIqC5mQ==&clientId=default';
              $header=array('Content-Type'=>'application/json; charset=UTF-8','x-api-key'=> $apikey,'x-e-mail'=>$email,'x-hostname'=>$hostname,'x-lang'=>'tr','x-timezone'=>'180');
             
              
    /*$path = WP_CONTENT_DIR . '/plugins/appsila-wooquote/logs.txt';
	$handle = fopen($path,"a");
	 fwrite ($handle , "Data String: " . $data_string . date("D j M Y H:i:s", time()) . PHP_EOL); */
	
    
    
    $response = wp_remote_post( $url, array(
                    'method' => 'POST',
                      'headers' => $header,
                    'body' => $data_string
                )
              );
              $result=$response["body"];


     
     /*fwrite ($handle , "Result " . $result . date("D j M Y H:i:s", time()) . PHP_EOL); 
    fclose ($handle);*/
                             if ($result == 1) {//successful
                                $returnid = '1';
                             }
                             elseif($result == 2){ //expire date
                              $returnid = '2';
                             }
                             elseif($result == 0){//apikey or email
                              $returnid = '0';
                             }
                             elseif($result == 4){//apikey or email
                              $returnid = '4';
                             }
                             else { //http code;
                                $returnid = '-1';
                             }
                             return $returnid;

}

?>
