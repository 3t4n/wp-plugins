<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


function mycbgenie_ads_settings(){

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	echo '<div class="wrap" style="margin-top: 35px;">';
		mycbgenie_ads_header_files();
		mycbgenie_show_ad_tabs();
	echo '</div>';
}


function mycbgenie_ads_widget(){

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	echo '<div class="wrap" style="margin-top: 35px;">';
		mycbgenie_ads_header_files();
	?>
	<br />
	<div style="clear:both; margin-top:100px" >
	<h1>MyCBGenie Ads Widget</h1>
	</div>
	<div style="margin-top:30px; padding:30px; font-size:18px;" class="updated">
	
	
	Please navigate to <strong>Appearance -> Widgets </strong> screen and find out for the widget <strong>MCG : Clickbank Affiliate Ads</strong>
	<br /><br />You may drag it on to your desired widget area and configure if needed.
	
			
	
	</div>

	<?php
	
	echo '</div>';
}


function mycbgenie_ads_header_files()
{

?>

	<style type="text/css">
	div.inline { float:left;  }
	.clearBoth { clear:both; }
	</style>
	
	
<div align=center class="wrap" style="border:0px ridge #3877A1;  height:auto; margin-right:0px; border-radius:5px; padding:0px;  color:#333333;">

			<div align="left" class="inline"  style="float:left; margin:0%; width:99%; border:1px solid #dcdcdc;  padding:5px; border-radius:5px; padding-left:10px;">
					<a href="http://mycbgenie.com" target=_blank>
					<img style='margin-right:0px; margin-top:10px;' width=201 height=70 src='<?php echo plugin_dir_url( __FILE__ )  ?>/images/MyCBGenie_logo.png' ></a>
						<div style="float:right; margin-right:10px; vertical-align:bottom; ">&nbsp;<br />
							<br /><br />Affiliate Ad Builder Version : <?php echo defined('MYCBGENIE_ADS_ACTIVE_VERSION');?>
						</div>
			</div>
			
</div>

<?php 
}




function mycbgenie_show_ad_tabs(){



		if(isset($_POST['mycbgenie_ad_account_no'])) {
		
			
		

		
				$account_no 						= 	sanitize_text_field($_POST['mycbgenie_ad_account_no']);
				$mycbgenie_cb_tracking_id			=	sanitize_text_field($_POST['mycbgenie_ad_cb_tracking_id']);
				
			
				$mycbgenie_show_ads_on_top_single_posts		=	sanitize_text_field($_POST['mycbgenie_show_ads_on_top_single_posts']);
				$mycbgenie_ad_format_top_single_post		=	sanitize_text_field($_POST['mycbgenie_ad_format_top_single_post']);
				$mycbgenie_ad_top_banner_short_code			=	sanitize_text_field($_POST['mycbgenie_ad_top_banner_short_code']);
				$mycbgenie_ad_top_text_short_code			=	sanitize_text_field($_POST['mycbgenie_ad_top_text_short_code']);
				$mycbgenie_ad_top_image_short_code			=	sanitize_text_field($_POST['mycbgenie_ad_top_image_short_code']);
				$mycbgenie_ad_top_carousel_short_code		=	sanitize_text_field($_POST['mycbgenie_ad_top_carousel_short_code']);		
				$mycbgenie_ad_top_thumbnail_location		=	sanitize_text_field($_POST['mycbgenie_ad_top_thumbnail_location']);		
								

				$mycbgenie_show_ads_on_bottom_single_posts		=	sanitize_text_field($_POST['mycbgenie_show_ads_on_bottom_single_posts']);
				$mycbgenie_ad_format_bottom_single_post			=	sanitize_text_field($_POST['mycbgenie_ad_format_bottom_single_post']);
				$mycbgenie_ad_bottom_banner_short_code			=	sanitize_text_field($_POST['mycbgenie_ad_bottom_banner_short_code']);
				$mycbgenie_ad_bottom_text_short_code			=	sanitize_text_field($_POST['mycbgenie_ad_bottom_text_short_code']);
				$mycbgenie_ad_bottom_image_short_code			=	sanitize_text_field($_POST['mycbgenie_ad_bottom_image_short_code']);
				$mycbgenie_ad_bottom_carousel_short_code		=	sanitize_text_field($_POST['mycbgenie_ad_bottom_carousel_short_code']);	
				$mycbgenie_ad_bottom_thumbnail_location			=	sanitize_text_field($_POST['mycbgenie_ad_bottom_thumbnail_location']);					
														
				
				if (!is_numeric($account_no)  && isset($account_no) 	){ exit("<h1>MyCBGenie Account# must be a numeric value. Please Go Back to try again.</h1>");}
		
				
		
				$account_no=floor(htmlspecialchars (($account_no)));
				$mycbgenie_cb_tracking_id=htmlspecialchars (($mycbgenie_cb_tracking_id));
		
				update_option('mycbgenie_account_no',$account_no);
				update_option('mycbgenie_ad_cb_tracking_id',$mycbgenie_ad_cb_tracking_id);
			
			

				update_option('mycbgenie_show_ads_on_top_single_posts',$mycbgenie_show_ads_on_top_single_posts);
				update_option('mycbgenie_ad_format_top_single_post', $mycbgenie_ad_format_top_single_post);		
				update_option('mycbgenie_ad_top_banner_short_code',	 $mycbgenie_ad_top_banner_short_code);		
				update_option('mycbgenie_ad_top_image_short_code',	 $mycbgenie_ad_top_image_short_code);		
				update_option('mycbgenie_ad_top_text_short_code',	 $mycbgenie_ad_top_text_short_code);										
				update_option('mycbgenie_ad_top_carousel_short_code',$mycbgenie_ad_top_carousel_short_code);						
				update_option('mycbgenie_ad_top_thumbnail_location',$mycbgenie_ad_top_thumbnail_location);										


				update_option('mycbgenie_show_ads_on_bottom_single_posts',$mycbgenie_show_ads_on_bottom_single_posts);
				update_option('mycbgenie_ad_format_bottom_single_post', $mycbgenie_ad_format_bottom_single_post);		
				update_option('mycbgenie_ad_bottom_banner_short_code',	 $mycbgenie_ad_bottom_banner_short_code);		
				update_option('mycbgenie_ad_bottom_image_short_code',	 $mycbgenie_ad_bottom_image_short_code);		
				update_option('mycbgenie_ad_bottom_text_short_code',	 $mycbgenie_ad_bottom_text_short_code);										
				update_option('mycbgenie_ad_bottom_carousel_short_code',$mycbgenie_ad_bottom_carousel_short_code);					
				update_option('mycbgenie_ad_bottom_thumbnail_location',$mycbgenie_ad_bottom_thumbnail_location);					
				
						
				echo "<b><div class='updated'><br>Updated Successfully.</b></div><br>";

		}

		//getting & setting active tab
		$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'general_ad_tab_1';
		if(isset($_GET['tab'])) $active_tab = $_GET['tab'];
		?>
		<!--div for displaying result confirmation -->
		
		 

		<h2>&nbsp;</h2>
		<h2 class="nav-tab-wrapper">
		
		<a href="?page=mycbgenie_ads_settings&amp;tab=general_ad_tab_1" class="nav-tab 
		<?php echo $active_tab == 'general_ad_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php _e('Settings', 'Ad settings'); ?></a>
				
		<!--<a href="?page=mycbgenie_main_menu&amp;tab=categories_tab_2" class="nav-tab 
				<?php echo $active_tab == 'categories_ad_tab_2' ? 'nav-tab-active' : ''; ?>"><?php _e('Categories', 'sample'); ?></a>
		
		<a href="?page=mycbgenie_main_menu&amp;tab=cron_tab_3" class="nav-tab 
				<?php echo $active_tab == 'sample_ad_tab_3' ? 'nav-tab-active' : ''; ?>"><?php _e('Cron Job', 'sample'); ?></a>
		-->
		
		</h2>


		<?php if($active_tab == 'general_ad_tab_1') { ?>
		
			<div id="poststuff" class="ui-sortable meta-box-sortables">
				<div class="postbox">
				<h3><?php _e('', 'sample'); ?></h3>
					<div class="inside">
					<p><?php _e(mycbgenie_ad_general_settings(), 'sample'); ?></p>
					</div>
				</div>
			</div>
	
		<?php } ?>
		
		
		<?php
}




function mycbgenie_ad_general_settings()
{

		//Setting the default value 33333 if option is not set.
		if (!get_option('mycbgenie_account_no')){
			$account_no='33333';
			}
		else{$account_no=get_option('mycbgenie_account_no');}
		
		
		if (!get_option('mycbgenie_ad_cb_tracking_id')){
			$mycbgenie_ad_cb_tracking_id='';
			}
		else{$mycbgenie_ad_cb_tracking_id=get_option('mycbgenie_ad_cb_tracking_id');}
		
		


		if (!get_option('mycbgenie_show_ads_on_top_single_posts')){ }
			
		else{$show_ads_top_single_post=get_option('mycbgenie_show_ads_on_top_single_posts');
				if ( $show_ads_top_single_post=="Yes")	{ $show_ads_top_single_post="checked";}
				else				    {$show_ads_top_single_post="";}
		}
			

		if (!get_option('mycbgenie_show_ads_on_bottom_single_posts')){ }
			
		else{$show_ads_bottom_single_post=get_option('mycbgenie_show_ads_on_bottom_single_posts');
				if ( $show_ads_bottom_single_post=="Yes")	{ $show_ads_bottom_single_post="checked";}
				else				    {$show_ads_bottom_single_post="";}
		}
			


						

		if (get_option('mycbgenie_ad_format_top_single_post')){ 
		
			$mycbgenie_ad_format_top_single_post=get_option('mycbgenie_ad_format_top_single_post');
		}	
		if (get_option('mycbgenie_ad_format_bottom_single_post')){ 
		
			$mycbgenie_ad_format_bottom_single_post=get_option('mycbgenie_ad_format_bottom_single_post');
		}
		

		if (get_option('mycbgenie_ad_top_thumbnail_location')){ 
		
			$thumbnails_top_location=get_option('mycbgenie_ad_top_thumbnail_location');
		}		
				

		if (get_option('mycbgenie_ad_bottom_thumbnail_location')){ 
		
			$thumbnails_bottom_location=get_option('mycbgenie_ad_bottom_thumbnail_location');
		}	
					
	
		//TEXT TOP shortcodes
		
		if (get_option('mycbgenie_ad_top_text_short_code')){ 
		
			$mycbgenie_ad_top_text_short_code=get_option('mycbgenie_ad_top_text_short_code');
			$mycbgenie_ad_top_text_short_code = stripslashes(str_replace('\"','"',$mycbgenie_ad_top_text_short_code));
			
		}else{
			$mycbgenie_ad_top_text_short_code='[mycbgenie_text_ad  kws="automatic" show_product_descr="1" default_font_family="1" fill_color="ffffff" link_color="0000ff" border_color="dddddd"  rows=1"  cols="3" descr_color="000000"  hide_footer="0" tracking_id="mycbgenie"]';
		}		

		//BANNER TOP shortcode
		if (get_option('mycbgenie_ad_top_banner_short_code')){ 
		
			$mycbgenie_ad_top_banner_short_code=get_option('mycbgenie_ad_top_banner_short_code');
			$mycbgenie_ad_top_banner_short_code = stripslashes(str_replace('\"','"',$mycbgenie_ad_top_banner_short_code));
			
		}else{
			$mycbgenie_ad_top_banner_short_code='[mycbgenie_banner_ad banner_size="728x90" kws="automatic" hide_footer="0" tracking_id="mycbgenie"]';
		}	
		
		
		//IMAGE AD TOP Shortcode
		if (get_option('mycbgenie_ad_top_image_short_code')){ 
		
			$mycbgenie_ad_top_image_short_code=get_option('mycbgenie_ad_top_image_short_code');
			$mycbgenie_ad_top_image_short_code = stripslashes(str_replace('\"','"',$mycbgenie_ad_top_image_short_code));
			
		}else{
			$mycbgenie_ad_top_image_short_code='[mycbgenie_image_ad cols="3" rows="1" kws="automatic" im_width="180" show_product_descr="0" default_font_family="1" fill_color="ffffff" link_color="0000ff" border_color="dddddd"   hide_footer="0" tracking_id="mycbgenie"]';
		}	
		
		
		//CAROUSEL TOP shortcode
		if (get_option('mycbgenie_ad_top_carousel_short_code')){ 
		
			$mycbgenie_ad_top_carousel_short_code=get_option('mycbgenie_ad_top_carousel_short_code');
			$mycbgenie_ad_top_carousel_short_code = stripslashes(str_replace('\"','"',$mycbgenie_ad_top_carousel_short_code));
			
		}else{
			$mycbgenie_ad_top_carousel_short_code='[mycbgenie_carousel_ad title="RELATED PRODUCTS" no_of_products="6" im_width="180" vertical_no_of_products="3" auto_show="true" speed="300" delay="3000" moveSlides="1" orientation="horizontal" kws="automatic" show_product_descr="1" default_font_family="1" fill_color="ffffff" link_color="0000ff" border_color="dddddd"  hide_footer="0" tracking_id="mycbgenie"]';
		}				
		
		
			//TEXT BOTTOM shortcodes
		
		if (get_option('mycbgenie_ad_bottom_text_short_code')){ 
		
			$mycbgenie_ad_bottom_text_short_code=get_option('mycbgenie_ad_bottom_text_short_code');
			$mycbgenie_ad_bottom_text_short_code = stripslashes(str_replace('\"','"',$mycbgenie_ad_bottom_text_short_code));
		}else{
			$mycbgenie_ad_bottom_text_short_code='[mycbgenie_text_ad  kws="automatic" show_product_descr="1" default_font_family="1" fill_color="ffffff" link_color="0000ff" border_color="dddddd"  rows=1"  cols="3" descr_color="000000"  hide_footer="0" tracking_id="mycbgenie"]';
		}		

		//BANNER BOTTOM shortcode
		if (get_option('mycbgenie_ad_bottom_banner_short_code')){ 
		
			$mycbgenie_ad_bottom_banner_short_code=get_option('mycbgenie_ad_bottom_banner_short_code');
			$mycbgenie_ad_bottom_banner_short_code = stripslashes(str_replace('\"','"',$mycbgenie_ad_bottom_banner_short_code));
			
		}else{
			$mycbgenie_ad_bottom_banner_short_code='[mycbgenie_banner_ad banner_size="728x90" kws="automatic" hide_footer="0" tracking_id="mycbgenie"]';
		}	
		
		
		//IMAGE AD BOTTOM Shortcode
		if (get_option('mycbgenie_ad_bottom_image_short_code')){ 
		
			$mycbgenie_ad_bottom_image_short_code=get_option('mycbgenie_ad_bottom_image_short_code');
			$mycbgenie_ad_bottom_image_short_code = stripslashes(str_replace('\"','"',$mycbgenie_ad_bottom_image_short_code));
			
		}else{
			$mycbgenie_ad_bottom_image_short_code='[mycbgenie_image_ad cols="3" rows="1" kws="automatic" im_width="180" show_product_descr="0" default_font_family="1" fill_color="ffffff" link_color="0000ff" border_color="dddddd"   hide_footer="0" tracking_id="mycbgenie"]';
		}	
		
		
		//CAROUSEL BOTTOM shortcode
		if (get_option('mycbgenie_ad_bottom_carousel_short_code')){ 
		
			$mycbgenie_ad_bottom_carousel_short_code=get_option('mycbgenie_ad_bottom_carousel_short_code');
			$mycbgenie_ad_bottom_carousel_short_code = stripslashes(str_replace('\"','"',$mycbgenie_ad_bottom_carousel_short_code));
			
		}else{
			$mycbgenie_ad_bottom_carousel_short_code='[mycbgenie_carousel_ad title="RELATED PRODUCTS" no_of_products="6" im_width="180" vertical_no_of_products="3" auto_show="true" speed="300" delay="3000" moveSlides="1" orientation="horizontal" kws="automatic" show_product_descr="1" default_font_family="1" fill_color="ffffff" link_color="0000ff" border_color="dddddd"  hide_footer="0" tracking_id="mycbgenie"]';
		}		
		
					
		?>
		
			<style type="text/css">
				#mycbgenie_ad_form_id li { background:#dddddd; padding:5px; margin:10px; width:50%;  }
			</style>
		
					<form method="POST" action="" id="mycbgenie_ad_form_id">
					<ul>
						<li><label for="accno">MyCBGenie Account #: </label>
						<input size=5 id="mycbgenie_ad_account_no" name="mycbgenie_ad_account_no" value="<?php echo $account_no ?>" />
						<span> <a href="http://mycbgenie.com" target=_blank>It's FREE! Click here to get a one</a></span></li>    
<!--
						<li><label for="tracking">Clickbank Tracking ID : </label>
						<input size=12 value="<?php echo $mycbgenie_cb_tracking_id ?>" 
										name="mycbgenie_ad_cb_tracking_id" id="mycbgenie_ad_cb_track_id" />
						<span> (Optional) </span></li> 
-->						
						
						<li >
						<input value="Yes" type=checkbox <?php echo $show_ads_top_single_post?> name="mycbgenie_show_ads_on_top_single_posts" id="mycbgenie_show_ads_on_top_single_posts" />
						<label for="show_ads" id="mycbgenie_label_top_ad_show">Show Matching Ads On Top Of All Posts/ Products Page </label>
						<label id="mycbgenie_top_arrow_label_bottom_ad_show" style="float:right">&dArr;</label><br />
					
						<!--<span> <strong>Position : </strong></span>
							<input type="radio" value="Top" 
									<?php if ($mycbgenie_ad_position_single_post=="Top"){ echo " checked='checked'  ";} ?>	name="mycbgenie_ad_position_single_post"/> Top
							<input type="radio" value="Bottom"
									<?php if ($mycbgenie_ad_position_single_post=="Bottom"){ echo " checked='checked'  ";} ?>   name="mycbgenie_ad_position_single_post"/> Bottom
												
						-->
						<div id="mycbgenie_ad_top_sub_div" style="margin:15px; display:none;">
							<span>
							<input type="radio" value="BANNER" 	checked 
											<?php if ($mycbgenie_ad_format_top_single_post=="BANNER"){ echo " checked='checked'  ";} ?> name="mycbgenie_ad_format_top_single_post"/> Banner 
							<input type="radio" value="TEXT"  
											<?php if ($mycbgenie_ad_format_top_single_post=="TEXT"){ echo " checked='checked'  ";} ?> name="mycbgenie_ad_format_top_single_post"/> TEXT 		
							<input type="radio" value="IMAGE"  
											<?php if ($mycbgenie_ad_format_top_single_post=="IMAGE"){ echo " checked='checked'  ";} ?> name="mycbgenie_ad_format_top_single_post"/> Image GRID 						
							<input type="radio" value="CAROUSEL"  
											<?php if ($mycbgenie_ad_format_top_single_post=="CAROUSEL"){ echo " checked='checked'  ";} ?> name="mycbgenie_ad_format_top_single_post"/> Carousel 																				
							 </span>
							<br />

							<textarea name="mycbgenie_ad_top_banner_short_code" 
								style="padding:10px; margin-left:30px; display:none; font-size:12px; margin:12px;" rows=5 cols=71%><?php echo esc_textarea($mycbgenie_ad_top_banner_short_code);?></textarea>

							<textarea name="mycbgenie_ad_top_text_short_code" 
								style="padding:10px; margin-left:30px; display:none;font-size:12px; margin:12px;" rows=5 cols=71%><?php echo esc_textarea($mycbgenie_ad_top_text_short_code);?></textarea>
									
							<textarea name="mycbgenie_ad_top_image_short_code" 
								style="padding:10px; margin-left:30px; display:none; font-size:12px; margin:12px;" rows=5 cols=71%><?php echo esc_textarea($mycbgenie_ad_top_image_short_code);?></textarea>
									
							<textarea name="mycbgenie_ad_top_carousel_short_code" 
								style="padding:10px; margin-left:30px; display:none; font-size:12px; margin:12px;" rows=5 cols=71%><?php echo esc_textarea($mycbgenie_ad_top_carousel_short_code);?></textarea>																								
							</span>
										
							
								<div style="padding:12px; background:#d3d3d3; margin-left:30px; margin:12px; margin-top:5px; border-radius:5px; width:90%; max-width:100%;" >
							
								<span>  <input checked type="radio" value="header" name="mycbgenie_ad_top_thumbnail_location"/>On Header Area<br />
										<input <?php if ($thumbnails_top_location=="breadcrumb") echo "checked" ?> type="radio" value="breadcrumb"  
													name="mycbgenie_ad_top_thumbnail_location"/>On Breadcrumb Area<br />
													
										<input  <?php if ($thumbnails_top_location=="shop_loop") echo "checked" ?> type="radio" value="shop_loop"  
													name="mycbgenie_ad_top_thumbnail_location"/>Just Before Products
								</span>	
								<br />
								<span style="margin-left:21px;"> <font color="#0066FF">[ Your theme may OR not support all of the above areas.</span>
								<br><span style="margin-left:21px;">Select the best area that looks good on your theme. ]</font></span>
								
																						
								</div>
								
								
								
							</div>		
						</li>
						


						
						
											<li >
						<input value="Yes" type=checkbox <?php echo $show_ads_bottom_single_post?> name="mycbgenie_show_ads_on_bottom_single_posts" id="mycbgenie_show_ads_on_bottom_single_posts" />
						<label for="show_ads" id="mycbgenie_label_bottom_ad_show">Show Matching Ads On Bottom Of  All Posts/ Products Page</label>
						<label id="mycbgenie_btm_arrow_label_bottom_ad_show" style="float:right">&dArr;</label><br />
						<!--<span> <strong>Position : </strong></span>
							<input type="radio" value="Top" 
									<?php if ($mycbgenie_ad_position_single_post=="Top"){ echo " checked='checked'  ";} ?>	name="mycbgenie_ad_position_single_post"/> Top
							<input type="radio" value="Bottom"
									<?php if ($mycbgenie_ad_position_single_post=="Bottom"){ echo " checked='checked'  ";} ?>   name="mycbgenie_ad_position_single_post"/> Bottom
												
						-->
						<div id="mycbgenie_ad_bottom_sub_div" style="margin:15px; display:none;">
							<span>
							<input type="radio" value="BANNER" 	checked 
											<?php if ($mycbgenie_ad_format_bottom_single_post=="BANNER"){ echo " checked='checked'  ";} ?> name="mycbgenie_ad_format_bottom_single_post"/> Banner 
							<input type="radio" value="TEXT"  
											<?php if ($mycbgenie_ad_format_bottom_single_post=="TEXT"){ echo " checked='checked'  ";} ?> name="mycbgenie_ad_format_bottom_single_post"/> TEXT 		
							<input type="radio" value="IMAGE"  
											<?php if ($mycbgenie_ad_format_bottom_single_post=="IMAGE"){ echo " checked='checked'  ";} ?> name="mycbgenie_ad_format_bottom_single_post"/> Image GRID 						
							<input type="radio" value="CAROUSEL"  
											<?php if ($mycbgenie_ad_format_bottom_single_post=="CAROUSEL"){ echo " checked='checked'  ";} ?> name="mycbgenie_ad_format_bottom_single_post"/> Carousel 																				
							 </span>
							<br />

							<textarea name="mycbgenie_ad_bottom_banner_short_code" 
								style="padding:10px; margin-left:30px; display:none; font-size:12px; margin:12px;" rows=5 cols=71%><?php echo esc_textarea($mycbgenie_ad_bottom_banner_short_code);?></textarea>

							<textarea name="mycbgenie_ad_bottom_text_short_code" 
								style="padding:10px; margin-left:30px; display:none;font-size:12px; margin:12px;" rows=5 cols=71%><?php echo esc_textarea($mycbgenie_ad_bottom_text_short_code);?></textarea>
									
							<textarea name="mycbgenie_ad_bottom_image_short_code" 
								style="padding:10px; margin-left:30px; display:none; font-size:12px; margin:12px;" rows=5 cols=71%><?php echo esc_textarea($mycbgenie_ad_bottom_image_short_code);?></textarea>
									
							<textarea name="mycbgenie_ad_bottom_carousel_short_code" 
								style="padding:10px; margin-left:30px; display:none; font-size:12px; margin:12px;" rows=5 cols=71%><?php echo esc_textarea($mycbgenie_ad_bottom_carousel_short_code);?></textarea>																								
							</span>
							
							
								<div style="padding:12px; background:#d3d3d3; margin-left:30px; margin:12px; margin-top:5px; border-radius:5px; width:90%; max-width:100%;" >
							
								<span>  <input checked type="radio" value="after_shop_loop" name="mycbgenie_ad_bottom_thumbnail_location"/>Just After Products<br />
													
										<input  <?php if ($thumbnails_bottom_location=="before_footer") echo "checked" ?> type="radio" value="before_footer"  
													name="mycbgenie_ad_bottom_thumbnail_location"/>Just Before Footer
								</span>	
								<br />
								<span style="margin-left:21px;"> <font color="#0066FF">[ Your theme may OR not support all of the above areas.</span>
								<br><span style="margin-left:21px;">Select the best area that looks good on your theme. ]</font></span>
								
																						
								</div>
						
						
							</div>					
						</li>
					
						<li style="background:none;">

							
						</li>
						
						

						
						
					</ul>
					<input class="button-primary" id="" type="submit" name="Mycbgenie_submitbutton" value="Save Changes" />
					</form>
					
							<div>&nbsp;</div>
							<div id="mycbgenie_short_code_info" style="display :none; width:71%; margin:0px; background:lightyellow; border:1px solid #dddddd; padding:5px;
							border-radius:7px;	 ">
							
							
							<h2><strong>SHORT CODE Options</strong></h2>
								
							<style type="text/css">
								.mycbgenie_shortcode_option_title 
									{ 
										font-weight:bold;
									  	color:#DE1B1B;
									 }
								.mycbgenie_shortcode_option_values
									{ 
										font-weight:notmal;
									  	color:#099;
									 }			
									 
								.mycbgenie_shortcode_option_applicable
									{ 
										font-weight:notmal;
									  	color:#6B8E23;
										float:right;
									 }									 						 
							</style>
							
							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">kws</span><br />
								Specify the keywords to target<br /><br />
							<span class="mycbgenie_shortcode_option_values">automatic</span>  : detects keywords automatically <br />
							<span class="mycbgenie_shortcode_option_values">health fitness</span>  : shows ads related with '<strong>health and fitness</strong>'
							
							<br /><br />
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE, BANNER, CAROUSEL] </span> &nbsp;
							
							</div>


							

							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">show_product_descr</span><br />
								Shows / Hides the product description<br /><br />
							<span class="mycbgenie_shortcode_option_values">1</span>  : shows <br />
							<span class="mycbgenie_shortcode_option_values">0</span>  : hides
							
							<br /><br />
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE, CAROUSEL] </span>&nbsp;
							
							</div>						

<!--
							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">show_read_more_btn</span><br />
								Shows / Hides the <strong>READ MORE</strong>  button<br /><br />
								<span class="mycbgenie_shortcode_option_values">1</span>  : shows <br />
								<span class="mycbgenie_shortcode_option_values">0</span>  : hides
							
							<br /><br />
							<span class="mycbgenie_shortcode_option_applicable" > [TEXT, IMAGE] </span>&nbsp;
							
							</div>

-->
							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">fill_color</span><br />
								Please do not add #symbol <br /><br />
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE, CAROUSEL] </span>&nbsp;
							</div>													
						

							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">link_color</span><br />
								Title color. Please do not add #symbol <br /><br />
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE, CAROUSEL] </span>&nbsp;
							</div>													



							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">border_color</span><br />
								Please do not add #symbol <br /><br />
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE, CAROUSEL] </span>&nbsp;
							</div>													



							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">descr_color</span><br />
								Specify the color of the short description, if opted to show <strong>show_product_descr</strong>. Please do not add #symbol <br /><br />
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE, CAROUSEL] </span>&nbsp;
							</div>													



							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">default_font_family</span><br />
								Specify whether to follow the theme's default color patterns. Please note that enabling this option will ignore above color settings. <br /><br />
								<span class="mycbgenie_shortcode_option_values">1</span>  : enabled <br />
								<span class="mycbgenie_shortcode_option_values">0</span>  : disabled<br /><br />
						
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE, CAROUSEL] </span>&nbsp;
							</div>	
							

							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">rows, cols</span><br />
								The number of rows and columns. To show vertically, specify cols="1" and to display horizontally, specify rows="1".<br />
								The total number of products displayed = [ rows <Strong>X</Strong> cols ] <br /><br />
								<span class="mycbgenie_shortcode_option_values">1-6</span>  : enter a number in between 1-6. <br />

							<br /><br />
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE] </span> &nbsp;
							</div>	
														
<!--
							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">height_adjustment</span><br />
								Specify the number of pixels you want to adjust space for height so that the ad block looks neat and is not overridden. 
								Please enter only numeric values. No need to add pixel notations like 
								<Strong>pxs, em</Strong> etc... <br /><br />
								<span class="mycbgenie_shortcode_option_values">10 </span>  : adds 10 pixels to the existing height.<br />
								<span class="mycbgenie_shortcode_option_values">-5</span>  : substracts 5 pixels from the existing height.<br /><br />
						
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE] </span> &nbsp;
							</div>	
-->

							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">banner_size</span><br />
								Specify the dimensions for the banner ads. <br /><br />
								<span class="mycbgenie_shortcode_option_values">728x90, 468x60, 234x60, 336x280, 300x250, 250x250,  
								125x125, 120x600, 160x600, 120x240, 120x60</span>  <br /><br />

						
							<span class="mycbgenie_shortcode_option_applicable"> [BANNER] </span> &nbsp;
							</div>								
	

							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">im_width</span><br />
								Specify the width of the image in pixels. <br /><br />

						
							<span class="mycbgenie_shortcode_option_applicable"> [IMAGE, CAROUSEL] </span> &nbsp;
							</div>	
							


							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">no_of_products</span><br />
								Specify the number of products to add in the carousel. 
							<br /><br />
							<span class="mycbgenie_shortcode_option_applicable"> [CAROUSEL] </span> &nbsp;
							</div>	
							


							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">orientation</span><br />
								Specify the orientation of the products in the carousel. 
								<br /><br />
								<span class="mycbgenie_shortcode_option_values">horizontal </span>  : shows horizonatlly<br />
								<span class="mycbgenie_shortcode_option_values">vertical</span>  :  shows vertically<br /><br />
						
							<span class="mycbgenie_shortcode_option_applicable"> [CAROUSEL] </span> &nbsp;
							</div>	
							


							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">vertical_no_of_products</span><br />
								Specify the 'number of products to show at a time' (in vertical mode only)  in the carousel. 
								In horizontal mode, the 'number of products to show at a time' is based upon the width of the container.
							<br /><br />
							<span class="mycbgenie_shortcode_option_applicable"> [CAROUSEL] </span>&nbsp;
							</div>	
							


							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">auto_show</span><br />
								Slides will automatically transition <br /><br />
								<span class="mycbgenie_shortcode_option_values">true</span>  : start automatically <br />
								<span class="mycbgenie_shortcode_option_values">false</span>  : no<br /><br />
						
							<span class="mycbgenie_shortcode_option_applicable"> [CAROUSEL] </span> &nbsp;
							</div>		


							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">speed</span><br />
								Slide transition duration (in ms)<br /><br />
						
							<span class="mycbgenie_shortcode_option_applicable"> [CAROUSEL] </span> &nbsp;
							</div>		
							
							
							
						<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">delay</span><br />
								The amount of time (in ms) between each auto transition <br /><br />
						
							<span class="mycbgenie_shortcode_option_applicable"> [CAROUSEL] </span> &nbsp;
							</div>		
							
							
							
						<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">moveSlides</span><br />
								The number of slides to move on each transition.  <br /><br />
					
							<span class="mycbgenie_shortcode_option_applicable"> [CAROUSEL] </span> &nbsp;
						</div>																																					

							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">hide_footer</span><br />
								Specify whether to show / hide the footer part of the ad block. <br /><br />
								<span class="mycbgenie_shortcode_option_values">1</span>  : hides <br />
								<span class="mycbgenie_shortcode_option_values">0</span>  : shows<br /><br />
						
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE, CAROUSEL, BANNER] </span> &nbsp;
							</div>								

							<div  style="margin:10px; padding:5px; border:1px solid #dddddd;">
								<span class="mycbgenie_shortcode_option_title">tracking_id</span><br />
								For example, if you are promoting a product on social media, on a blog and in an email marketing campaign, 
								you can use a separate tracking ID for each campaign so you can see which is responsible for your sales. <br /><br />
								You must adhere to the Clickbank Tracking ID creating rules. Any special chars or spaces are not allowed, only eight alpha-numeric digits is allowed. <br />
								Kindly check this link to know more about Clickbank Tracking IDs.  <a href="https://www.clickbank.com/blog/successfully-using-tracking-ids/" target=_blank>https://www.clickbank.com/blog/successfully-using-tracking-ids</a>
								<br /><br />
						
							<span class="mycbgenie_shortcode_option_applicable"> [TEXT, IMAGE, CAROUSEL, BANNER] </span> &nbsp;
							</div>
							
							
							
						</div>
							
			<?php
}
?>