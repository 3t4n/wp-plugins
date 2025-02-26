<?php

function price_table_themes_flat($post_id)
	{
		$price_table_data = get_post_meta( $post_id, 'price_table_data', true );	
		$price_table_data_price = get_post_meta( $post_id, 'price_table_data_price', true );
		
		$price_table_data_header = get_post_meta( $post_id, 'price_table_data_header', true );				
		$price_table_data_signup_url = get_post_meta( $post_id, 'price_table_data_signup_url', true );
		$price_table_data_signup_text = get_post_meta( $post_id, 'price_table_data_signup_text', true );

		$price_table_themes = get_post_meta( $post_id, 'price_table_themes', true );
		$price_table_themes_pack = get_post_meta( $post_id, 'price_table_themes_pack', true );
		$price_table_themes_text_pack = get_post_meta( $post_id, 'price_table_themes_text_pack', true );				

		$price_table_ribbons = get_post_meta( $post_id, 'price_table_ribbons', true );	
		
		$price_table_col_duration = get_post_meta( $post_id, 'price_table_col_duration', true );	
		$price_table_col_width = get_post_meta( $post_id, 'price_table_col_width', true );			
		$price_table_col_img = get_post_meta( $post_id, 'price_table_col_img', true );						
		$price_table_col_img_height = get_post_meta( $post_id, 'price_table_col_img_height', true );		
		
		$price_table_bg_img = get_post_meta( $post_id, 'price_table_bg_img', true );
		$price_table_font_family = get_post_meta( $post_id, 'price_table_font_family', true );
		$price_table_font_family_custom = get_post_meta( $post_id, 'price_table_font_family_custom', true );		
		
		
		$price_table_body = '';
		
		$price_table_data_reverse = array();
		
		if(empty($price_table_data))
			{
			
				return 'Table data is missing or you forget to save data.';
				
			}
		else
			{
				foreach ($price_table_data as $key1 => $arr) {
					foreach ($arr as $key2 => $num) {
						$price_table_data_reverse[$key2][$key1] = $num;
					}
				}	
			}

		




		
		//$price_table_body .= print_r($price_table_themes_pack);
		
		
				
		if($price_table_font_family == 'custom')
			{
				$price_table_font_family = $price_table_font_family_custom;
			}

		$price_table_body .= '
			<script type="text/javascript">
			  WebFontConfig = {
				google: { families: [ "'.$price_table_font_family.'::latin" ] }
			  };
			  (function() {
				var wf = document.createElement("script");
				wf.src = ("https:" == document.location.protocol ? "https" : "http") +
				  "://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js";
				wf.type = "text/javascript";
				wf.async = "true";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(wf, s);
			  })(); </script>';	
		
		
		
		
		
		
		$price_table_body .= '<style type="text/css">';
		$price_table_body .= '
		.price-table-main-'.$post_id.'{
			font-family: "'.$price_table_font_family.'";
		
		}';		
		
		
		

		
		
		
		
		
		$price_table_body .= '</style>';		
		
		
		
		//light yellow
		$price_table_themes_packs['pack1'] = array('header'=>'#f0b128','price'=>'#f3bf34','signup'=>'#f3bf34');
		//yellow
		$price_table_themes_packs['pack2'] = array('header'=>'#ed8000','price'=>'#f19300','signup'=>'#f19300');		
		//orange yellow
		$price_table_themes_packs['pack3'] = array('header'=>'#d85200','price'=>'#e06400','signup'=>'#e06400');	
		//red yellow
		$price_table_themes_packs['pack4'] = array('header'=>'#b5280b','price'=>'#c3350f','signup'=>'#c3350f');	
		
		//light blue
		$price_table_themes_packs['pack5'] = array('header'=>'#52b5d5','price'=>'#64c3de','signup'=>'#64c3de');
		//blue
		$price_table_themes_packs['pack6'] = array('header'=>'#3591ca','price'=>'#44a3d5','signup'=>'#44a3d5');	
		//dark blue
		$price_table_themes_packs['pack7'] = array('header'=>'#1f5f9f','price'=>'#2972b0','signup'=>'#2972b0');
		//black dark blue			
		$price_table_themes_packs['pack8'] = array('header'=>'#193b76','price'=>'#234e8e','signup'=>'#234e8e');

		//light green			
		$price_table_themes_packs['pack9'] = array('header'=>'#83c145','price'=>'#96cd56','signup'=>'#96cd56');		
		//green			
		$price_table_themes_packs['pack10'] = array('header'=>'#44982b','price'=>'#55a938','signup'=>'#55a938');
		//dark green			
		$price_table_themes_packs['pack11'] = array('header'=>'#186f32','price'=>'#208240','signup'=>'#208240');		
		//black dark green			
		$price_table_themes_packs['pack12'] = array('header'=>'#0a4945','price'=>'#0e5b56','signup'=>'#0e5b56');			
		
		//Text Color Pack
		
		// White pack		
		$price_table_themes_text_packs['pack1'] = array('header'=>'#ffffff','price'=>'#ffffff','signup'=>'#ffffff');		
		$price_table_themes_text_packs['pack2'] = array('header'=>'#000000','price'=>'#000000','signup'=>'#000000');		
		$price_table_themes_text_packs['pack3'] = array('header'=>'#c2c2c2','price'=>'#c2c2c2','signup'=>'#c2c2c2');		
		$price_table_themes_text_packs['pack4'] = array('header'=>'#9a9a9a','price'=>'#9a9a9a','signup'=>'#9a9a9a');		
		$price_table_themes_text_packs['pack5'] = array('header'=>'#767676','price'=>'#767676','signup'=>'#767676');			
		$price_table_themes_text_packs['pack6'] = array('header'=>'#494949','price'=>'#494949','signup'=>'#494949');
		$price_table_themes_text_packs['pack7'] = array('header'=>'#fe5b5b','price'=>'#e36c6c','signup'=>'#e1a4a4');		
				
		
		$price_table_body .= '<div class="price-table-main price-table-main-'.$post_id.' " style="background:url('.$price_table_bg_img.');">';





			foreach($price_table_data_reverse as $key1 => $value1)
				
				{
					//Column Width
					$col_width = $price_table_col_width[$key1];
					$pack = $price_table_themes_pack[$key1];					
					$pack_header_bg = $price_table_themes_packs[$pack]['header'];
					$pack_price_bg = $price_table_themes_packs[$pack]['price'];			
					$pack_signup_bg = $price_table_themes_packs[$pack]['signup'];
					
					//Text Color Pack
					$pack_text_color = $price_table_themes_text_pack[$key1];					
					$pack_header_text_color = $price_table_themes_text_packs[$pack_text_color]['header'];
					$pack_price_text_color = $price_table_themes_text_packs[$pack_text_color]['price'];			
					$pack_signup_text_color = $price_table_themes_text_packs[$pack_text_color]['signup'];					
					
					
					
										
					
					$col_img_height = $price_table_col_img_height;					
					
					$price_table_body.=  '<div class="price-table-columns" style="width:'.$col_width.';" >';
					$price_table_body.= '<ul>';
					
					$price_table_body.=  '<li style="background:'.$pack_header_bg.';" class="price-table-items ribbons"><span class="ribbon-'.$price_table_ribbons[$key1].'"></span>&nbsp;</li>';

					$price_table_body.=  '<li style="background:'.$pack_header_bg.'; color:'.$pack_header_text_color.';" class="price-table-items header">'.$price_table_data_header[$key1].'</li>';
					$price_table_body.=  '<li style="background:'.$pack_price_bg.';color:'.$pack_price_text_color.';"  class="price-table-items price">'.$price_table_data_price[$key1].'<span>'.$price_table_col_duration[$key1].'</span></li>';
					if(!empty($price_table_col_img[$key1]))
						{
							$col_img = $price_table_col_img[$key1];
							$price_table_body.=  '<li style="background:'.$pack_price_bg.';height:'.$col_img_height.'" class="price-table-items col-img" >'.price_table_get_img_video($col_img).'</li>';			
						}
							
					
					foreach($value1 as $key2 => $value2)
						
						{		
							if(empty($value2))
								{
									$value2 = '<span class="data-empty">&nbsp;</span>';
								}				
							
							$price_table_body.=  '<li class="price-table-items data">'.$value2.'</li>';
						
							
						}
						
					$price_table_body.=  '<li style="background:'.$pack_signup_bg.';" class="price-table-items signup"><a style="color:'.$pack_signup_text_color.';" class="signup-url" href="'.$price_table_data_signup_url[$key1].'">'.$price_table_data_signup_text[$key1 ].'</a></li>';
						
						
						
					$price_table_body.=  "</ul>";						
					$price_table_body.=  "</div>";
				}

		
		$price_table_body .= '</div>';

		return $price_table_body;
		

		
	}
	
	
	
	
	

	
	