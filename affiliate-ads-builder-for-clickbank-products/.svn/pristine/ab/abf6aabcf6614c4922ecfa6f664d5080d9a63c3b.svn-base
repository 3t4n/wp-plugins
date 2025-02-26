<?php
		require_once 'cURL_ajax.inc.php';
		
				
		$ref="";
		$rows=0;
		$cols=0;
		$nos=0;
		$no_of_products=0;
		$show_product_descr=1;
		$show_read_more_btn=1;
		$default_font_family=1;
		$im_width="0";
		$descr_color="";
		$term_link="";
		$descr="";
		
		
		$im_width 				= htmlentities($_POST["im_width"]); 	
		$show_product_descr 	= htmlentities($_POST["show_product_descr"]); 	
		$show_read_more_btn	 	= htmlentities($_POST["show_read_more_btn"]); 	
		$default_font_family	= htmlentities($_POST["default_font_family"]); 	
		$fill_color 			= htmlentities($_POST["fill_color"]); 	
		$border_color 			= htmlentities($_POST["border_color"]); 
		$link_color 			= htmlentities($_POST["link_color"]); 	
		$kws					= htmlentities($_POST["kws"]); 
		$cols					= htmlentities(abs($_POST["cols"])); 		
		$rows 					= htmlentities(abs($_POST["rows"])); 	
		$ref					= htmlentities($_POST["ref"]); 		

		$height_adjustment		= htmlentities($_POST["height_adjustment"]); 			
		$hide_footer			= htmlentities($_POST["hide_footer"]); 	
		$tracking_id			= htmlentities($_POST["tracking_id"]); 	
				

		$kws=urlencode($kws);
				
		if ($cols==1) { $mcg_padding="padding:0px;";}
		else{$mcg_padding="margin-top:30px; margin-left:30px; margin-right:30px;";}
			

		
		
?>

<div id='mcg_inner_div' align="center" style=" <?php echo $mcg_padding;?> margin-left: auto; width:auto; border-radius:5px;     margin-right: auto;  overflow:auto; margin-top:0px; "  >
     
<?php



				
		$no_of_products = $rows * $cols;
	//echo $no_of_products.$_POST["border_color"].$border_color;	

		if ($no_of_products>=15 ){

			$nos= $no_of_products +18;
			
		}else if ($no_of_products>=10 ){
		
			$nos= $no_of_products +10;
			
		}else if ($no_of_products>=6 ){
		
			$nos= $no_of_products +5;
			
		}elseif ($no_of_products <=4 ){
		
			$nos= $no_of_products +3;
		}

		$nos=($no_of_products   )+ intval ($no_of_products * .75);

		
		$url=mycbgenie_fetch_url_in_ajax ('https://cbproads.com/xmlfeed/wordpress_ads/ads.asp?nos='.$nos.'&kws='.$kws,$ref,'image');
		
		//echo 'ss'.$url;
//		$url= ('https://cbproads.com/xmlfeed/wordpress_ads/ads.asp?nos='.$nos.'&kws='.$kws);		

//$opts = array( 'http'=>array(  'header' => 'Connection: close' ));
  
//$context = stream_context_create($opts);

//$json = json_decode(file_get_contents($url, false, $context));



   

	$json = json_decode(mycbgenie_ads_file_get_contents_curl($url,0,null,null));
		
		$cnt=0;


				
foreach ($json as $key=>$value) {
	


			
			foreach ($value as $key => $val) { 
			
			if ($key=='title') { $title= $val;}
			if ($key=='descr') { $descr= $val;}
			if ($key=='mdescr') { $mdescr= $val;}
			if ($key=='image_name') { $image_name= $val;}
			if ($key=='altimage') { $altimage= $val;}	
			if ($key=='ids') { $ids= $val;}	
			if ($key=='siteurl') { $site_url= $val;}
			
				$title=htmlspecialchars($title);					
				$descr=htmlspecialchars($descr);					

			}
			$term_link	= "?action=mycbgenie_ads_view&tracking_id=".$tracking_id."&id=".$ids;
			if ($show_product_descr!=1){ $descr=''; $mcg_ht=0;} 
			else {
				
				if ($cols==1) 	{ $mcg_ht=30; }
				if ($cols==2) 	{ $mcg_ht=40; }					
				if ($cols==3)	{ $mcg_ht=65; }
				if ($cols==4)	{ $mcg_ht=85; }				
				if ($cols==5)	{ $mcg_ht=110; }
				if ($cols==6)   { $mcg_ht=130; }
				
			
				if ($default_font_family!=1) {
					$descr='<div align=sjustify style="padding-bottom:3px;  padding-left:5px; padding-right:5px; margin:0px; line-height:1.3em; font-size:0.8em; "><font style="font-family:arial;" color="#'.$descr_color.'">'.$descr.'</font></div>';
				}else {
					$descr='<div align=sjustify style="padding-bottom:3px;  margin:0px; line-height:1.3em; font-size:0.8em; ">'.$descr.'</div>';
				}
				
			}

			if ($default_font_family!=1){
			
				$title="<div style='padding-bottom:3px; margin-top:5px;'><font style='text-decoration:underline; font-family:arial;   font-weight:bold; color:#".$link_color."' >".$title."</font></div>";
				
				 } 
			else {
				$title="<div style='padding-bottom:3px; margin-top:5px;'><font style='text-decoration:underline;' >".$title."</font></div>";
			}



			
			if ($image_name!="blank.gif"  && $no_of_products > $cnt) {
				
				



				if ($cols==1 			 ) $mcg_ht=$mcg_ht+37;
				if ($cols==2 			) { $mcg_ht=$mcg_ht+20;}					
				if ($cols==3 			) { $mcg_ht=$mcg_ht+30;}
				if ($cols==4 ) 			  { $mcg_ht=$mcg_ht+25;}				
				if ($cols==5 ) 			  { $mcg_ht=$mcg_ht+25;}
				if ($cols==6  ) 		  { $mcg_ht=$mcg_ht+40;}				


				$cnt=$cnt+1;
			

	

				$thumb = "https://cbproads.com/clickbankstorefront/v4/send_binary.asp?show_border=no&ref=wp_aff_ad_plugin&equal=skip&im=".$image_name."&resize=".$im_width;
				
				if ($cols==1) { $mcg_wd = 92; }
				if ($cols==2) { $mcg_wd = 45; }
				if ($cols==3) { $mcg_wd = 30; }
				if ($cols==4) { $mcg_wd = 22; }
				if ($cols==5) { $mcg_wd = 17; }
				if ($cols==6) { $mcg_wd = 14; }																				
		
				$bdr= 'border: 1px solid #ddd';
			
				$term_link	= "?action=mycbgenie_ads_view&id=".$ids;
                $mcg_ht =$mcg_ht + $im_width + 55;
			?>	
				
				
			
				<div class="wrap_mcg_<?php echo $cols;?>"   style="margin-bottom:0px; height:<?php echo $mcg_ht;?>px; padding-left:3px; padding-right:3px;"  align=center>

						<div  align=center style="position: ; bottom: 0;width:95%; margin-right:3px; padding-bottom:7px; " >
							<a rel="nofollow" href="<?php echo ($term_link);?>" target="_blank">
							<img src="<?php echo ($thumb); ?>"   width="<?php //echo $im_width?>"  />
							<b><?php echo $title ?></b>		
							</a>
							
							<?php echo $descr ?>
							                    <div style="margin-top:0px; border:0px dashed red; ">
												<a rel="nofollow" target=_blank href="<?php echo $term_link ?>" style="<?php if ($default_font_family!=1){ echo 'color:#'.$link_color; }?>" >
												<font style="text-decoration:none; font-size:0.7em; font-weight:normal; color:#4CAF50;">	<?php echo $site_url ?></font></a>
												</div>
								
							       
						</div>

				</div>
		
<?php		 
			}


   
	
		}
		
		if ($hide_footer!=1) { ?>
    			<div  style=" clear:left; margin:0px; margin-top:3px; background:#<?php echo $border_color?>; " align=right>
                						<a style='text-decoration:none; padding:3px;' href='http://mycbgenie.com/?ref=<?php echo $ref;?>' target='_blank'>
                						<font color=darkgrey style="font-size:.77em;" >Ads By MyCBGenie&nbsp;</font></a></div>
		<?php }
		 ?>
		
</div>