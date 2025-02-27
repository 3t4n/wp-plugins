<?php
if (!defined('ABSPATH'))
{
	exit;
}

function ecpt_textSliderGlobalSettingsFree()
{
	if (isset($_POST['postExcerptSettings']))
	{
		check_admin_referer( 'ecpt_post_excerpt_settings' );
		if (isset($_POST['postExcerptSelect']))
		{
			$postExcerptSelect = sanitize_textarea_field($_POST['postExcerptSelect']);
			update_option("postExcerptSelect",$postExcerptSelect);
		}
	}
	$postExcerptSelect = '';
	$postExcerptSelect = get_option("postExcerptSelect");
	
	if (isset($_POST['nativeExcerptSettings']))
	{
		check_admin_referer( 'ecpt_native_excerpt_settings' );
		if (isset($_POST['nativeExcerptSelect']))
		{
			$nativeExcerptSelect = sanitize_textarea_field($_POST['nativeExcerptSelect']);
			update_option("nativeExcerptSelect",$nativeExcerptSelect);
		}
	}
	$nativeExcerptSelect = '';
	$nativeExcerptSelect = get_option("nativeExcerptSelect");

	//woocomemrce post slider
	if (isset($_POST['woocommerceExcerptSettings']))
	{
		check_admin_referer( 'ecpt_woocommerce_excerpt_settings' );
		
		if (isset($_POST['wooCommerceExcerptSelect']))
		{
			$wooCommerceExcerptSelect = sanitize_textarea_field($_POST['wooCommerceExcerptSelect']);
			update_option("wooCommerceExcerptSelect",$wooCommerceExcerptSelect);
		}
	}
	$wooCommerceExcerptSelect = '';
	$wooCommerceExcerptSelect = get_option("wooCommerceExcerptSelect");
	
	//
	
	if (isset($_POST['speedOfTheTextSlideAnimationSettings']))
	{
		check_admin_referer( 'ecpt_speed_of_animation_settings' );
		if (isset($_POST['speedOfTheTextSlideAnimation']))
		{
			$speedOfTheTextSlideAnimation = sanitize_textarea_field($_POST['speedOfTheTextSlideAnimation']);
			update_option("speedOfTheTextSlideAnimation",$speedOfTheTextSlideAnimation);
		}
	}
	$speedOfTheTextSlideAnimation = '';
	$speedOfTheTextSlideAnimation = get_option("speedOfTheTextSlideAnimation");
	if (empty($speedOfTheTextSlideAnimation))
	{
		$speedOfTheTextSlideAnimation = 300;
	}
	
	$tiptextsliderstitlefontfamily = '';
	if (isset($_POST['tiptextsliderstitlefontfamily']))
	{
		check_admin_referer( 'ecpt_text_sliders_title_font_family' );
		
		$tiptextsliderstitlefontfamily = sanitize_textarea_field($_POST['tiptextsliderstitlefontfamily']);
		update_option("tiptextsliderstitlefontfamily",$tiptextsliderstitlefontfamily);

	}
	$tiptextsliderstitlefontfamily= get_option("tiptextsliderstitlefontfamily");
	
?>
<div style='margin:20px 5px 10px 5px;'>
	<div style='float:left;margin-right:10px;'>
	<img src='<?php echo TEXT_SLIDERS_PLUGIN_URL;  ?>/asset/images/text.png' style='width:30px;height:30px;'>
	</div> 
	<div style='padding-top:5px; font-size:22px;'>
		<i>
		<?php
			echo  __( 'Text Slider Global Settings', 'text-sliders' );
		?>
		</i>
	</div>
	<div style='clear:both'></div>
</div>
<?php if (function_exists('is_rtl'))
{
	if (is_rtl())
	{
		echo '<div class="" style="width:70%;float:right;">';
	}
	else
	{
		echo '<div class="" style="width:70%;float:left;">';
	}
}
else 
{
	echo '<div class="" style="width:70%;float:left;">';
}
?>
<?php 
// excerpt of sliders start
?>
<div style='clear:both'></div>		
		<div class="wrap">
			<div id="dashboard-widgets-wrap">
			    <div id="dashboard-widgets" class="metabox-holder">
					<div id="post-body">
						<div id="dashboard-widgets-main-content">
							<div class="postbox-container" style="width:98%;">
								<div class="postbox">
									<h3 class='hndle' style='padding: 10px 0px;'><span>
										<?php 
										$nativeTextSliderSiteUrl = get_option('siteurl');
										echo __( 'Use Excerpt Or Full Post Content In <a href="'.$nativeTextSliderSiteUrl.'/wp-admin/edit.php?post_type=text_slider" target="_blank">Native Text Sliders</a> ?', 'text-sliders' );
										//echo __( " <span style='margin-left:20px;color:#999'><i>( Shortcode: [textsliders] )</i></span>", 'text-sliders' );
										$ecpt_admin_setting_panel_option_right_tip = ecpt_admin_setting_panel_option_right_tip('Shortcode: [textsliders]','text-sliders');
										echo $ecpt_admin_setting_panel_option_right_tip;
										 ?>
									</span>
									</h3>
								
									<div class="inside" style='padding-left:5px;'>
										<form id="textsliderform" name="textsliderform" action="" method="POST">
										<?php 
										wp_nonce_field('ecpt_native_excerpt_settings');
										?>
										<table id="textslidertable" width="100%" style="font-size: 11px;">

										<tr style="text-align:left;">
										
										<td width="30%"  style="text-align:left;">
										<?php 
											echo __( 'Excerpt Or Full Native Content:', 'text-sliders' );
										?>
										</td>
										<td width="60%"  style="text-align:left;">
										<select id="nativeExcerptSelect" name="nativeExcerptSelect" style="width:400px;">
										<option id="nativeExcerptOption" value="nativeexcerpt" <?php if ($nativeExcerptSelect == 'nativeexcerpt') echo "selected";   ?>> Use Excerpt In Native Text Slider</option>
										<option id="nativeExcerptOption" value="nativecontent" <?php if ($nativeExcerptSelect == 'nativecontent') echo "selected";   ?>> Use Full Post Content In Native Text Slider</option>
										</select>
										</td>
										<td width="10%"  style="text-align:right;">
										<input type="submit"  class="button-primary"  id="nativeExcerptSettings" name="nativeExcerptSettings" value="<?php  echo __( ' Update Now ', 'text-sliders' ); ?>">
										</td>
										</tr>

										</table>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
		<div style="clear:both"></div>
		<br />
<?php 
// excerpt of sliders end
?>
<div style='clear:both'></div>		
		<div class="wrap">
			<div id="dashboard-widgets-wrap">
			    <div id="dashboard-widgets" class="metabox-holder">
					<div id="post-body">
						<div id="dashboard-widgets-main-content">
							<div class="postbox-container" style="width:98%;">
								<div class="postbox">
									<h3 class='hndle' style='padding: 10px 0px;'><span>
										<?php 
										echo __( 'Use Excerpt or Full Post Content in Post Text Slider?', 'text-sliders' );
										$ecpt_admin_setting_panel_option_right_tip = ecpt_admin_setting_panel_option_right_tip('Shortcode: [postsliders]','text-sliders');
										echo $ecpt_admin_setting_panel_option_right_tip;										
										 ?>
									</span>
									</h3>
								
									<div class="inside" style='padding-left:5px;'>
										<form id="textsliderform" name="textsliderform" action="" method="POST">
										<?php 
										wp_nonce_field('ecpt_post_excerpt_settings');
										?>
										<table id="textslidertable" width="100%" style="font-size: 11px;">

										<tr style="text-align:left;">
										
										<td width="30%"  style="text-align:left;">
										<?php 
											echo __( 'Excerpt or Full Post Content:', 'text-sliders' );
										?>
										</td>
										<td width="60%"  style="text-align:left;">
										<select id="postExcerptSelect" name="postExcerptSelect" style="width:400px;">
										<option id="postExcerptOption" value="postexcerpt" <?php if ($postExcerptSelect == 'postexcerpt') echo "selected";   ?>> Use Excerpt In Post Text Slider</option>
										<option id="postExcerptOption" value="postcontent" <?php if ($postExcerptSelect == 'postcontent') echo "selected";   ?>> Use Full Post Content In Post Text Slider</option>
										</select>
										</td>
										<td width="10%"  style="text-align:right;">
										<input type="submit"  class="button-primary"  id="postExcerptSettings" name="postExcerptSettings" value="<?php  echo __( ' Update Now ', 'text-sliders' ); ?>">
										</td>
										</tr>

										</table>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
		<div style="clear:both"></div>
		<br />
		
<div style='clear:both'></div>		
		<div class="wrap">
			<div id="dashboard-widgets-wrap">
			    <div id="dashboard-widgets" class="metabox-holder">
					<div id="post-body">
						<div id="dashboard-widgets-main-content">
							<div class="postbox-container" style="width:98%;">
								<div class="postbox">
									<h3 class='hndle' style='padding: 10px 0px;'><span>
										<?php 
										echo __( 'Use Excerpt or Full Post Content in WooCommerce Text Slider?', 'text-sliders' );
										$ecpt_admin_setting_panel_option_right_tip = ecpt_admin_setting_panel_option_right_tip('Shortcode: [woocommercesliders]','text-sliders');
										echo $ecpt_admin_setting_panel_option_right_tip;
										 ?>
									</span>
									</h3>
								
									<div class="inside" style='padding-left:5px;'>
										<form id="textsliderform" name="textsliderform" action="" method="POST">
										<?php 
										wp_nonce_field('ecpt_woocommerce_excerpt_settings');
										?>
										<table id="textslidertable" width="100%" style="font-size: 11px;">

										<tr style="text-align:left;">
										
										<td width="30%"  style="text-align:left;">
										<?php 
											echo __( 'Excerpt or Full Product Content:', 'text-sliders' );
										?>
										</td>
										<td width="60%"  style="text-align:left;">
										<select id="wooCommerceExcerptSelect" name="wooCommerceExcerptSelect" style="width:400px;">
										<option id="wooCommerceExcerptOption" value="woocommerceexcerpt" <?php if ($wooCommerceExcerptSelect == 'woocommerceexcerpt') echo "selected";   ?>> Use Excerpt In WooCommerce Text Slider</option>
										<option id="wooCommerceExcerptOption" value="postcontent" <?php if ($wooCommerceExcerptSelect == 'postcontent') echo "selected";   ?>> Use Full Post Content In WooCommerce Text Slider</option>
										</select>
										</td>
										<td width="10%"  style="text-align:right;">
										<input type="submit"  class="button-primary"  id="woocommerceExcerptSettings" name="woocommerceExcerptSettings" value="<?php  echo __( ' Update Now ', 'text-sliders' ); ?>">
										</td>
										</tr>

										</table>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
		<div style="clear:both"></div>
		<br />

<div style='clear:both'></div>		
		<div class="wrap">
			<div id="dashboard-widgets-wrap">
			    <div id="dashboard-widgets" class="metabox-holder">
					<div id="post-body">
						<div id="dashboard-widgets-main-content">
							<div class="postbox-container" style="width:98%;">
								<div class="postbox">
									<h3 class='hndle' style='padding: 10px 0px;'><span>
										<?php 
										echo __( 'Speed of the text slide animation? <font color="gray"><i>( in "ms")</i></font>', 'text-sliders' );
										 ?>
									</span>
									</h3>
								
									<div class="inside" style='padding-left:5px;'>
										<form id="textsliderform" name="textsliderform" action="" method="POST">
										<?php 
										wp_nonce_field('ecpt_speed_of_animation_settings');
										?>
										<table id="textslidertable" width="100%" style="font-size: 11px;">

										<tr style="text-align:left;">
										
										<td width="30%"  style="text-align:left;">
										<?php 
											echo __( 'Speed of the text slide animation? <font color="gray"><i>( default:300 )</i></font>', 'text-sliders' );
										?>
										</td>
										<td width="60%"  style="text-align:left;">
										<?php  
										$speedOfTheTextSlideAnimation = get_option('speedOfTheTextSlideAnimation');
										if (empty($speedOfTheTextSlideAnimation))
										{
											$speedOfTheTextSlideAnimation = 300;
										}
										?>
										<input type="text" id="speedOfTheTextSlideAnimation" name="speedOfTheTextSlideAnimation" value="<?php echo $speedOfTheTextSlideAnimation;  ?>" required placeholder="<?php echo __('for example:300', "text-sliders");; ?>">
										</td>
										<td width="10%"  style="text-align:right;">
										<input type="submit"  class="button-primary"  id="speedOfTheTextSlideAnimationSettings" name="speedOfTheTextSlideAnimationSettings" value="<?php  echo __( ' Update Now ', 'text-sliders' ); ?>">
										</td>
										</tr>

										</table>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
		<div style="clear:both"></div>
		<br />
<?php // @version 3.6.5 ?>
<div style='clear:both'></div>		
		<div class="wrap">
			<div id="dashboard-widgets-wrap">
			    <div id="dashboard-widgets" class="metabox-holder">
					<div id="post-body">
						<div id="dashboard-widgets-main-content">
							<div class="postbox-container" style="width:98%;">
								<div class="postbox">
									<h3 class='hndle' style='padding: 10px 0px;'><span>
										<?php 
										echo __( 'Text Sliders Title Font Family', 'text-sliders' );
										//$ecpt_admin_setting_panel_option_right_tip_pro = ecpt_admin_setting_panel_option_right_tip_pro('Shortcode: [woocommercesliders]','text-sliders');
										//echo $ecpt_admin_setting_panel_option_right_tip_pro;
										 ?>
									</span>
									</h3>
								
									<div class="inside" style='padding-left:5px;'>
										<form id="textsliderform" name="textsliderform" action="" method="POST">
										<?php 
										wp_nonce_field('ecpt_text_sliders_title_font_family');
										?>
										<table id="textslidertable" width="100%" style="font-size: 11px;">

										<tr style="text-align:left;">
										
										<td width="30%"  style="text-align:left;">
										<?php 
											echo __( 'Text Sliders Title Font Family:', 'text-sliders' );
										?>
										</td>
										<td width="60%"  style="text-align:left;">
										<?php
											if (empty($tiptextsliderstitlefontfamily)) 
											{
												$tiptextsliderstitlefontfamily = '';
											}
										?>
										<select name="tiptextsliderstitlefontfamily" id="tiptextsliderstitlefontfamily">
											<option id="tiptextsliderstitlefontfamilyOption" value="Default" <?php if (($tiptextsliderstitlefontfamily == '') or ($tiptextsliderstitlefontfamily == 'Default')) echo "selected";  ?>> <?php echo __('Default', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Andale Mono" <?php if ($tiptextsliderstitlefontfamily == 'Andale Mono') echo "selected";  ?>> <?php echo __('Andale Mono', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Arial" <?php if ($tiptextsliderstitlefontfamily == 'Arial') echo "selected";  ?>> <?php echo __('Arial', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Arial Black" <?php if ($tiptextsliderstitlefontfamily == 'Arial Black') echo "selected";  ?>> <?php echo __('Arial Black', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Book Antiqua" <?php if ($tiptextsliderstitlefontfamily == 'Book Antiqua') echo "selected";  ?>> <?php echo __('Book Antiqua', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Comic Sans MS" <?php if ($tiptextsliderstitlefontfamily == 'Comic Sans MS') echo "selected";  ?>> <?php echo __('Comic Sans MS', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Courier New" <?php if ($tiptextsliderstitlefontfamily == 'Courier New') echo "selected";  ?>> <?php echo __('Courier New', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Georgia" <?php if ($tiptextsliderstitlefontfamily == 'Georgia') echo "selected";  ?>> <?php echo __('Georgia', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Helvetica" <?php if ($tiptextsliderstitlefontfamily == 'Helvetica') echo "selected";  ?>> <?php echo __('Helvetica', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Impact" <?php if ($tiptextsliderstitlefontfamily == 'Impact') echo "selected";  ?>> <?php echo __('Impact', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Symbol" <?php if ($tiptextsliderstitlefontfamily == 'Symbol') echo "selected";  ?>> <?php echo __('Symbol', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Tahoma" <?php if ($tiptextsliderstitlefontfamily == 'Tahoma') echo "selected";  ?>> <?php echo __('Tahoma', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Terminal" <?php if ($tiptextsliderstitlefontfamily == 'Terminal') echo "selected";  ?>> <?php echo __('Terminal', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Times New Roman" <?php if ($tiptextsliderstitlefontfamily == 'Times New Roman') echo "selected";  ?>> <?php echo __('Times New Roman', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Trebuchet MS" <?php if ($tiptextsliderstitlefontfamily == 'Trebuchet MS') echo "selected";  ?>> <?php echo __('Trebuchet MS', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Verdana" <?php if ($tiptextsliderstitlefontfamily == 'Verdana') echo "selected";  ?>> <?php echo __('Verdana', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Webdings" <?php if ($tiptextsliderstitlefontfamily == 'Webdings') echo "selected";  ?>> <?php echo __('Webdings', "text-sliders");?> </option>
											<option id="tiptextsliderstitlefontfamilyOption" value="Wingdings" <?php if ($tiptextsliderstitlefontfamily == 'Wingdings') echo "selected";  ?>> <?php echo __('Wingdings', "text-sliders");?> </option>
										</select>
										</td>
										<td width="10%"  style="text-align:right;">
										<input type="submit"  class="button-primary"  id="tiptextsliderstitlefontfamilySettings" name="tiptextsliderstitlefontfamilySettings" value="<?php  echo __( ' Update Now ', 'text-sliders' ); ?>">
										</td>
										</tr>

										</table>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
		<div style="clear:both"></div>
		<br />
<?php  #version 3.6.5 ?>
	<?php // end is_trl div ?>
	</div>
<div class="" style="width:28%;float:left;">	
<div style='clear:both'></div>		
		<div class="">
			<div id="dashboard-widgets-wrap">
			    <div id="dashboard-widgets" class="metabox-holder">
					<div id="post-body">
						<div id="dashboard-widgets-main-content">
							<div class="" style="width:100%;">
								<div class="postbox">
									<h3 class='hndle' style='padding: 10px 0px;'><span>
									<?php
									echo __( 'Features & Demos of Text Sliders Pro', 'text-sliders' )."<i> <font color='Gray'></font></i>";
									?>
									</span>
									</h3>
									<div class="inside" style='padding-left:5px;'>
									
							<div class="inside">
									<p>
									<span style="margin-left:0px;"><b><a class="" target="_blank" href="https://textsliders.com/features-of-wordpress-text-sliders-plugin/">Features And Demos:</a></b></span>
									</p>
									<ul>
									<li>
										* All features includes in wordpress text sliders free version
									</li>									
									<li>
										* Custom pretty style for text sliders, for example: Text Sliders Content Font Color, Text Sliders Title Color,  Text Sliders Box Width,Text Sliders Box Background,
											Text Sliders Text Align,Text Sliders Box Padding,Text Sliders Class Name,Text Sliders Border Radius,Text Sliders Border Width,Text Sliders Border Color,  
											Text Sliders Font Size,Text Sliders Line Height,Show Text Sliders Post Title,Text Sliders Title Background Color,Text Sliders Title Font Size,
											Text Sliders Title Font Color, Text Sliders Title Font Family,Text Sliders Content Font Family... and so on
									</li>
									<li>
										<a href='https://textsliders.com/features-of-wordpress-text-sliders-plugin/' target='_blank'>Build a colorful and varied and graceful text slider super easy and fast</a> 
									</li>									
									<li>
										* Add bread crumbs in text slider posts, at the top of the text slider posts, you will find bread crumbs like this: Home / Text Slider / text slider post title, you can click to back to text slider index / archive page, or click to back to home page, or click to open the original post in the text slider 
									</li>
									<li>										
										* Advanced textsliders shortcode, for example, if you use [[textsliders catname='love']], we will just search and show text slider posts in the text slider category "love". If you use [[textsliders catid='1']],we will just search and show posts of text slider in the text slider category which category id = 1									
									<li>	
										* and more...
									</li>
									<li>
									<span style="margin-left:10px;"><b><a class="" target="_blank" href="https://textsliders.com/features-of-wordpress-text-sliders-plugin/">Check Demos Now</a></b> -- Timed: Only $4 </span>
									</li>																			
									</ul>
								</div>

									</div>
								</div>
								
								<div class="postbox">
									<h3 class='hndle' style='padding: 20px 0px; !important'>
									<span>
									<?php 
										echo  __( 'Wordpress Text Slider Tips Feed:', 'text-sliders');
									?>
									</span>
									</h3>
								
									<div class="inside" style='padding-left:10px;'>
						<?php 
							wp_widget_rss_output('https://textsliders.com/feed/', array(
							'items' => 3, 
							'show_summary' => 0, 
							'show_author' => 0, 
							'show_date' => 1)
							);
						?>
										<br />
									* <a class=""  target="_blank" href="https://textsliders.com/contact-us/">Suggest a Feature, Report a Bug? Need Customize Plugin? --> Contact me</a>										
									</div>
								</div>
																
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
		<div style="clear:both"></div>
		<br />
</div>	
	
<?php
}

