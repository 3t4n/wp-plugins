<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function appsilaSendData3($data_array){

          $returnid = 0;
            $date=date('d.m.Y ');

          
          //It saves the datas into variables.
          $email=$data_array["email"]; 
          $website_api2=$data_array["apikey"];
          $bul      = "-";
          $degistir = "";
          $website_api = str_replace($bul, $degistir, $website_api2);
          $wc_api_key=$data_array["wc_api_key"];
          $wc_api_secret=$data_array["wc_api_secret"];
          $hostname=$data_array["hostname"];
    
            //It saves the variables into a string in json format. 
            $data_string='{"email":"'. $email .'","apikey":"' . $website_api. '","wc_api_key":"' . $wc_api_key . '","wc_api_secret":"' . $wc_api_secret . '","hostname":"' . $hostname . '","licencestartdate":"2008-11-11","licenceexpiredate":"2009-11-11"
          }';

    
          //It sends the information the the azure functions to compare with the correct datas.
          $url='https://woocrm.azurewebsites.net/api/Activate_Account?code=nn/UVwAywb4OorHC8ac7sfL02Mm4tUJL5Y6jIZnlYrtzS/FFKOHVmg==&clientId=default';
          $header=array('Content-Type'=>'application/json; charset=UTF-8','x-lang'=>'tr','x-timezone'=>'180');
          $response = wp_remote_post( $url, array(
                'method' => 'POST',
                  'headers' => $header,
                'body' => $data_string
            )
          );
          $result=$response["body"];
          //It returns 0 and 2 for errors, 1 for correct datas.

                         if ($result == 1 ) { //correct datas.
                           $returnid = 1;
                         } 
                         else if($result == 2){ //licence error.
                           $returnid=2;
                         }
                         else{
                            $returnid = 0; //email error.
                         }

                         return $returnid;

          }

?>
