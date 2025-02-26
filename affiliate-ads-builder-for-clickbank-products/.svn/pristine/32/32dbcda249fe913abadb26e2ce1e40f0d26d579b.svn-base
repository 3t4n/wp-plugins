<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function mycbgenie_carousel_ads_script($title, $no_of_products, $im_width, $no_of_products_at_a_time, $auto_show, $speed, $delay, $moveSildes,  $orientation,  $kws,  $show_product_descr,  $default_font_family, $fill_color,$border_color, $link_color,$hide_footer,$tracking_id){ 


		if($kws=="automatic") {
			$kws= mycbgenie_fetch_keywords_for_automatic();
		}



		$nos=($no_of_products   )+ intval ($no_of_products * .75);



		$kws=urlencode($kws);

		wp_enqueue_script('mycbgenie-ads-slider-js', plugins_url('bxslider_carousel/js/jquery.bxslider.min.js', __FILE__), array('jquery'),false,false);
	//	wp_enqueue_script('jquery-effects-core');
		wp_enqueue_script('mycbgenie-ads-main-js', plugins_url('bxslider_carousel/js/main.js', __FILE__),false,false);
		wp_enqueue_style('mycbgenie-ads-slider-css', plugins_url('bxslider_carousel/styles/jquery.bxslider.css', __FILE__));
		wp_enqueue_style('mycbgenie-ads-main-css', plugins_url('bxslider_carousel/styles/main.css', __FILE__));
		wp_enqueue_style('mycbgenie-ads-css', plugins_url('bxslider_carousel/styles/controls.css', __FILE__));

		$url=mycbgenie_fetch_url_in_ajax ('https://cbproads.com/xmlfeed/wordpress_ads/ads.asp?kws='.$kws.'&nos='.$nos,  get_option('mycbgenie_account_no'),'carousel');
		//echo $url;
//echo get_option('mycbgenie_account_no').' - '. $url. ' - ' . (abs(date("s")));


		
		$json = json_decode(mycbgenie_ads_file_get_contents_curl($url,0,null,null));
		
		
		if ($orientation=="vertical") {

	
			$container_width= ($im_width+30);
			$container_width= $container_width."px";
			$mycbgenie_v_h_type = 'mycbgenie-ads3';
			$mcg_png	=	"padding:5px; padding-top:15px"	;		
			
		}else if ($orientation=="horizontal") {

			$container_width=  "100%";
			$mycbgenie_v_h_type = 'mycbgenie-ads4';
			$mcg_png	=	"padding:20px";
		}
	
		
		$return_html='
		
		<div style="clear:both"><br></div>
		<div align="center" 	 style="width:'.$container_width.'; 
									 border:1px solid #'.$border_color.'; background:#'.$fill_color.';  '.$mcg_png.'">
									 
		<div style="border:1px solid #ddd; padding:5px;   
					background:white; padding-right:2px;" align=center>
		<div class="mycbgenie-ads-head"  ><span class="mycbgenie-ads-head-title">'.$title.'</span></div>
		<div  		class="'.$mycbgenie_v_h_type.'"  
							autoslide="'.$auto_show.'" delay="'.$delay.'" moveSildes="'.$moveSildes.'" 
							at_a_time="'.$no_of_products_at_a_time.'" 
							speed="'.$speed.'"  im_width="'.$im_width.'" count="'.$no_of_products.'"  >';

		
						  
		foreach ($json as $key=>$value) {
	
			foreach ($value as $key => $val) { 
			
			if ($key=='title') { $title= $val;}
			if ($key=='descr') { $descr= $val;}
			if ($key=='mdescr') { $mdescr= $val;}
			if ($key=='image_name') { $image_name= $val;}
			if ($key=='altimage') { $altimage= $val;}	
			if ($key=='ids') { $ids= $val;}			
			
						
				$title=esc_html($title);					
				$descr=esc_html($descr);					
			
			}
			$term_link	= "?action=mycbgenie_ads_view&tracking_id=".$tracking_id."&id=".$ids;
			if ($show_product_descr!=1){ $descr='';} 
			else {
			
				if ($default_font_family!=1) {
					$descr='<div style=padding:5px; text-align:left;><font color="#'.$descr_color.'">'.$descr.'</font></div>';
				}else {
					$descr='<div style=padding:5px; text-align:left;> '.$descr.'</div>';
				}
				
			}

			if ($default_font_family!=1){
			
				$title="<font style='text-decoration:underline; font-family:arial;  font-weight:bold; color:#".$link_color."' >".$title;
				
				 } 
			else {
				$title="<font style='text-decoration:underline;' >".$title;
			}



		
			
			if ($image_name!="blank.gif" ) {
			


				$thumb = "https://cbproads.com/clickbankstorefront/v4/send_binary.asp?ref=wp_aff_plugin&equal=skip&im=".$image_name."&resize=$im_width";
				//$thumb  = ""


			$return_html.='
				<li ><div class="mycbgenie-ads_col"  >
	
				<div class="mycbgenie-ads_container" style="font-size:0.8em;"  >
						<div class="mycbgenie-ads_thumb"  align=center><a target=_blank href="'.$term_link.'"><img src="'.esc_url($thumb).'"/></a></div>

						<div class="mycbgenie-ads_title" style="text-align:center;">
							<a rel="nofollow" target=_blank href="'.esc_url($term_link).'"><b>'.$title.'</b></font></a></div>

						'.$descr.'			
				</div></div></li>';
				
			
			}

		}
		
		
				
	
		$return_html.='
		</div>
		
			

				
		</div>';
		
			if($hide_footer!=1) {
						$return_html.='<a style="float:right; text-decoration:none; padding-bottom:5px;" 
						href="http://mycbgenie.com/?ref='.get_option('mycbgenie_account_no').'" target="_blank">
						<font color=darkgrey style="font-size:0.7em;">Ads by MyCBGenie&nbsp;</font></a>';
			}
		$return_html.='
		</div>	
		<div>&nbsp;</div>';


	 

	return $return_html;
}
?>