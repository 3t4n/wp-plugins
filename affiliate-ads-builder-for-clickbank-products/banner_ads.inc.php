<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


		wp_enqueue_script('mycbgenie_banner_ads_div_js', plugin_dir_url(__FILE__).'js/banner_ads.js',
														array('jquery'), defined('MYCBGENIE_ADS_ACTIVE_VERSION'), false);	
		
												
function mycbgenie_banner_ads_script($banner_size,$kws,$hide_footer,$tracking_id){ 	

		//return 'shdshjdhjsdhjs';
		//echo 'dd';
		//return 'dd';

		if($kws=="automatic") {
			$kws= mycbgenie_fetch_keywords_for_automatic();
		}

		$ref=get_option('mycbgenie_account_no')	;
		$div_id_rand = mt_rand(1,100);		
		
		$return_html ='<div align=center class="mcg_banner_div_'.$div_id_rand.'" style="margin-top:50px; margin-bottom:50px;" >Loading ....</div>

		
		
		
				<script type="text/javascript">

				  		var div_id="'.$div_id_rand.'";
				  	 	var kws="'.$kws.'";
				   		var banner_size="'.$banner_size.'";													   											   													   				   		var ref="'.$ref.'";		
   				   		var hide_footer="'.$hide_footer.'";		
   				   		var tracking_id="'.$tracking_id.'";		


				    load_banner_ad_script(div_id,kws,banner_size,ref,hide_footer,tracking_id); 
				
		</script>';
		
return  $return_html;} ?>