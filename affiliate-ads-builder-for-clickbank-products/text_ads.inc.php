<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}	
			wp_enqueue_script('mycbgenie_text_ads_div_js', plugin_dir_url(__FILE__).'js/text_ads.js',
														array('jquery'), defined('MYCBGENIE_ADS_ACTIVE_VERSION'), false);
														
														
function mycbgenie_text_ads_script( $rows, $cols, $kws,  $show_product_descr, $show_read_more_btn,  $default_font_family, $fill_color,$border_color, $link_color, $descr_color, $height_adjustment,$hide_footer,$tracking_id){ 

		if($kws=="automatic") {
			$kws= mycbgenie_fetch_keywords_for_automatic();
		}

		wp_enqueue_style('mycbgenie_text_ads_css', plugins_url('css/text_ads.css', __FILE__));


		$ref=get_option('mycbgenie_account_no')	;
		$div_id_rand = mt_rand(1,100);		

		$return_html='
		<div  style="padding-bottom:0px; border-radius:5px;  margin-bottom:30px; border:1px solid #'.$border_color.'; background:#'.$fill_color.';" class ="mcg_text_div_'.$div_id_rand.'">

		Loading ....
		
		</div>
	
	
	<script type="text/javascript">
				
				  var div_id="'.$div_id_rand.'";
				   var rows="'.$rows.'";				  
				   var kws="'.$kws.'";
				   var cols="'.$cols.'";											   
				   var im_width="'.$im_width.'";		
				   var show_product_descr="'.$show_product_descr.'";		
				   var show_read_more_btn="'.$show_read_more_btn.'";		
				   var default_font_family="'.$default_font_family.'";		
				   var fill_color="'.$fill_color.'";		
				   var border_color="'.$border_color.'";
				   var link_color="'.$link_color.'";													   											   													   				   var ref="'.$ref.'";		
   				   var descr_color="'.$descr_color.'";		
   				   var height_adjustment="'.$height_adjustment.'";						   
   				   var hide_footer="'.$hide_footer.'";			
   				   var tracking_id="'.$tracking_id.'";			
				   			   				   

		load_text_ad_script(div_id,kws,rows,cols,show_product_descr,show_read_more_btn,default_font_family,fill_color,border_color,link_color,ref,descr_color,height_adjustment, hide_footer,tracking_id); 
				

			</script>';
			
			return $return_html;
			
 } 



?>