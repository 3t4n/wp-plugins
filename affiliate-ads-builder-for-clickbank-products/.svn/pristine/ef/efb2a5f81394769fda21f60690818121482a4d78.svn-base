<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//The function whcih is called back by AJAX...
//This function returns HTML as the  content to fill for  <DIV id='mcg_div'>
function mycbgenie_ajax_image_ads_function(){

		if ($cols==1) { $mcg_padding="padding:0px;";}
		else{$mcg_padding="margin-top:30px; margin-left:30px; margin-right:30px;";}
		
		$kws="acne";
		$cols="1";
		$rows="4";
		$show_product_descr=1;
		$show_read_more_btn=1;
		$default_font_family=1;
		$im_width=180;		
		$kws=urlencode($kws);
		

			
		$ref=get_option('mycbgenie_account_no')	;
		
		?>
	<div id='mcg_inner_div' align="center" style=" <?php echo $mcg_padding;?> margin-left: auto; width:auto;       margin-right: auto;  overflow:auto; "  >

		<?php
		
		$no_of_products = $rows * $cols;
		
		if ($no_of_products>15 ){

			$nos= $no_of_products +18;
			
		}else if ($no_of_products>10 ){
		
			$nos= $no_of_products +10;
			
		}else if ($no_of_products>6 ){
		
			$nos= $no_of_products +5;
			
		}elseif ($no_of_products <4 ){
		
			$nos= $no_of_products +3;
		}

		$url=mycbgenie_fetch_url ('https://cbproads.com/xmlfeed/wordpress_ads/ads.asp?nos='.$nos.'&kws='.$kws);
	
		//$url= ('https://cbproads.com/xmlfeed/wordpress_ads/ads.asp?nos='.$nos.'&kws='.$kws);		
		$json = json_decode(file_get_contents($url,0,null,null));
		
		$cnt=0;
				
		foreach ($json as $key=>$value) {
	
			foreach ($value as $key => $val) { 
			
			if ($key=='title') { $title= $val;}
			if ($key=='descr') { $descr= $val;}
			if ($key=='mdescr') { $mdescr= $val;}
			if ($key=='image_name') { $image_name= $val;}
			if ($key=='altimage') { $altimage= $val;}	
			if ($key=='ids') { $ids= $val;}						
			}
			$term_link	= "?action=mycbgenie_ads_view&id=".$ids;
			if ($show_product_descr!=1){ $descr=''; $mcg_ht=0;} 
			else {
				
				if ($cols==1) 	{ $mcg_ht=30; }
				if ($cols==2) 	{ $mcg_ht=40; }					
				if ($cols==3)	{ $mcg_ht=65; }
				if ($cols==4)	{ $mcg_ht=85; }				
				if ($cols==5)	{ $mcg_ht=110; }
				if ($cols==6)   { $mcg_ht=130; }
				
			
				if ($default_font_family!=1) {
					$descr='<p align=justify style="padding-bottom:9px; padding-right:7px; margin:0px; "><font color="#'.$descr_color.'">'.$descr.'</font></p>';
				}else {
					$descr='<p align=justify style="padding-bottom:9px; padding-right:7px; margin:0px;">'.$descr.'</p>';
				}
				
			}

			if ($default_font_family!=1){
			
				$title="<div style='padding-bottom:9px;'><font style='text-decoration:underline; font-family:arial;   
						font-weight:bold; color:#".$link_color."' >".$title."</font></div>";
				 } 
			else {
				$title="<div style='padding-bottom:9px;'><font style='text-decoration:underline;' >".$title."</font></div>";
			}

		
			if ($image_name!="blank.gif"  && $no_of_products > $cnt) {

				if ($cols==1 			 ) $mcg_ht=$mcg_ht+35;
				if ($cols==2 			) { $mcg_ht=$mcg_ht+20;}					
				if ($cols==3 			) { $mcg_ht=$mcg_ht+35;}
				if ($cols==4 ) 			  { $mcg_ht=$mcg_ht+40;}				
				if ($cols==5 ) 			  { $mcg_ht=$mcg_ht+50;}
				if ($cols==6  ) 		  { $mcg_ht=$mcg_ht+60;}				

				$cnt=$cnt+1;
			

				$mcg_ht =$mcg_ht + $im_width + 30;

				$thumb = "http://cbproads.com/clickbankstorefront/v4/send_binary.asp?equal=skip&im=".$image_name."&resize=".$im_width;
				
				if ($cols==1) { $mcg_wd = 92; }
				if ($cols==2) { $mcg_wd = 45; }
				if ($cols==3) { $mcg_wd = 30; }
				if ($cols==4) { $mcg_wd = 22; }
				if ($cols==5) { $mcg_wd = 17; }
				if ($cols==6) { $mcg_wd = 14; }																				
				
				$bdr= 'border: 1px solid #ddd';
				$mcg_ht =$mcg_ht + 45;

			?>	
				
					
			
				<div class="wrap_mcg_<?php echo $cols;?>"  style=" height:<?php echo $mcg_ht;?>px; <?php echo $bdr;?>"  align=center>

						<div  align=center style="position: absolute; bottom: 0;width:95%; margin-right:3px; padding-bottom:12px; " >
							<a rel="nofollow" href="<?php echo $term_link;?>" target="_blank">
							<img src="<?php echo $thumb?>"   width="<?php //echo $im_width?>"  />
							<b><?php echo $title ?></b>		
							</a>
							<?php echo $descr ?>	
							<input type="submit" style="border-radius:1px; max-width:81%; text-align:center;" value="Read More" onClick="parent.open('<?php echo $term_link;?>')" />
						</div>
				</div>
		
		<?php		 
			} // end of if ($image_name!="blank.gif"  && $n.....

		}	// end of for loop
		
		?>
						<div align=right style="margin:5px; float:right; clear:both;">
						<a style='text-decoration:none;' href='http://mycbgenie.com/?ref=<?php echo $ref;?>' target='_blank'>
						<font color=darkgrey size=1 >Clickbank Ads</font></a></div>
	</div>
<?php

die();

}  // end of AJAX CALL FUCNTION

		wp_enqueue_style('mycbgenie_image_ads_css', plugins_url('css/image_ads.css', __FILE__),defined('MYCBGENIE_ADS_ACTIVE_VERSION'),false);									         	
		wp_enqueue_script('mycbgenie_image_ads_div_js', plugin_dir_url(__FILE__).'js/image_ads.js',
														array('jquery'), defined('MYCBGENIE_ADS_ACTIVE_VERSION'), false);

		wp_localize_script('mycbgenie_image_ads_div_js', 'mycbgenie_url', array(
		    'pluginsUrl' => plugin_dir_url(__FILE__),
		));


// This is function that calls for AJAX	   
function mycbgenie_image_ads_script($title, $title_tag, $rows, $cols, $kws, $im_width,  $show_product_descr, $show_read_more_btn, $default_font_family, $fill_color,$border_color, $link_color,$height_adjustment,$hide_footer,$tracking_id){ 


		if($kws=="automatic") {
			$kws= mycbgenie_fetch_keywords_for_automatic();
		}



	 	/*wp_localize_script('mycbgenie_image_ads_div_js','mycbgenie_image_ads_vars', array(
					'ajaxadminurl' => admin_url('admin-ajax.php')
		));

		add_action('wp_ajax_mycbgenie_ajax_image_ads_action',   'mycbgenie_ajax_image_ads_function' );  

		*/
		$ref=get_option('mycbgenie_account_no')	;
		$div_id_rand = mt_rand(1,100);		
		
		//add_action( 'wp_footer', 'mycbgenie_load_image_ad_script_parameter', 100 );
		


		
		

		

	
		$return_html='	
		
		<div  class="mcg_div_'.$div_id_rand.'" align=center style="background:#'.$fill_color.'; margin-left:0px; padding-bottom:0px; 
	 		border-radius:5px; margin-right:3px;  border:1px solid #'.$border_color.'; overflow:hdden; text-align: center;  
	 		margin-left: auto;   margin-right: auto; text-align:center;  ">
	 
		 Loading......
	
		</div>


		<div>&nbsp;</div>
		
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
				   var link_color="'.$link_color.'";													   											   													   				   
				   var ref="'.$ref.'";		
				   var height_adjustment="'.$height_adjustment.'";													   											   													   				   					var hide_footer="'.$hide_footer.'";		
			   	   var tracking_id="'.$tracking_id.'";		

				    load_image_ad_script(div_id,kws,rows,cols,im_width,show_product_descr,show_read_more_btn,default_font_family,fill_color,border_color,link_color,ref,height_adjustment,hide_footer,tracking_id); 
				
			</script>';

	return $return_html;

 } 
?>