<?php
##############
#Options Page
#############
#initialization
//build menus
if (is_admin()){ 
	add_action('admin_menu', 'ap_favicon_admin_top_level');
}
//create top level menu
function ap_favicon_admin_top_level(){
	global $ap_favC;
	$optionpage_top_level = $ap_favC->menutitle;
	$optionpage_name = "General Options";
	$icon_url = $ap_favC->theicon;
	add_menu_page( $optionpage_top_level, $optionpage_top_level, 'administrator', 'ap-favicon-general-options', 'ap_favicon_generate_general',$icon_url);
	add_submenu_page('ap-favicon-general-options', $optionpage_name, $optionpage_name, 'administrator', 'ap-favicon-general-options', 'ap_favicon_generate_general');
}

//generate the options page
function ap_favicon_generate_general(){	
	global $ap_favC;
	$optionpage_name = 'General Options';
	$optionpage_codename = 'general';
      $optionpage_local = $optionpage_name.' - '.$ap_favC->pluginname;
		
	$optionname = $ap_favC->ap_get_option('string');

	//retrieve current options from database
	$options = $ap_favC->ap_get_option('array'); 
	
?>



<div class="wrap">

<div id="icon-options-general" class="icon32"><br /></div>
<h2><?php echo $optionpage_local; ?></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">

	<?php // include the sidebar
		$ap_favC->ap_sidebar_options();
	?>
	
	<!-- main contenet here -->
	
	<form method="post" action="options.php">
	
	<div id="post-body-content">
		<div id="normal-sortables" class="meta-box-sortables ui-sortable">
		
			<?php 
			//$content= 'This is the content...';
			//$ap_favC->ap_mainbox('ap_misc','Miscellaneous',$content)
			?>
			
			<div id="favicon-box" class="postbox ">
				<div class="handlediv" title="Click to toggle"><br /></div>
				<h3 class="hndle"><span>Favicon ( Website Shortcut Icon )</span></h3>
				<div class="inside">
				<p><strong>Note:</strong> The ICO file type is cross browser compatible, <i>including Internet Explorer</i>. Internet Explorer does not support PNG or GIF. The recommended size is 16x16 px, but 32x32 and 64x64 px are supported. Multiple file types can be selected. An animated favicon is feasible via a GIF file. The GIF file has priority over the PNG file. Read the <a title="Favicon Behavior" target="_blank" href="http://www.amberpanther.com/knowledge-base/favicon-explained-demystifying-functionality-across-browsers/">Guide to Demystifying the Favicon Behavior</a> to get a clearer view of how to setup the favicon for your site.</p>
				<br />
				<hr />
				<p><label><input type="radio" name="<?php echo $optionname;?>[favicon]" id="favicon_none" value="none" <?php if ($options['favicon'] == "none" || $options['favicon'] == false){echo "checked = checked";}?> /><strong>Use None</strong><label></p>
				<br />
				<hr />
				<p><label><input type="radio" name="<?php echo $optionname;?>[favicon]" id="favicon_root" value="root" <?php if ($options['favicon'] == "root"){echo "checked = checked";}?> /><strong>I have the Favicon file(s) in my site's root directory ( e.g. <?php bloginfo('url')?>/favicon.ico )</strong></label></p>
				<p class="ap_indent"><strong>ICO file type</strong> ( e.g. <?php bloginfo('url')?>/favicon.ico )<br /><small>A link tag does not need to be specified for this. It is detected automatically by browsers.</small></p>
				<?php $favurl = get_bloginfo('url').'/favicon.ico'; if ( !ap_image_exists($favurl) ) {$favurl = $ap_favC->theX; $out="   <i><strong>Default Icon Not Found!</strong></i> We recommended you create one and add it to your site's root, as browsers will request it, and it is better not to respond with a <code>404 Not Found</code> ";}else{$out='<i><strong>Default Icon Found!</strong></i>';}?>
				<p class="ap_indent"><img style="margin:0 5px -3px 0;" width="16px" height="16px" src="<?php echo $favurl?>" title=""><?php echo $out; ?></p><br />
				<!-- <p class="ap_indent"><label><input type="checkbox" name="<?php //echo $optionname;?>[fav_root_ico]" class="sboptions" value="1" <?php //if ($options['fav_root_ico']){echo "checked = checked";}?> /> ICO file type (e.g. <?php //bloginfo('url')?>/favicon.ico) </label> | <img style="margin:0 5px -3px 0;" width="16px" height="16px" src="<?php //echo $favurl?>" title=""><?php //echo $out; ?></p> -->
				<p class="ap_indent"><strong>Aditionally/Alternatively Use:</strong></p>
				<?php $out='';$favurl = get_bloginfo('url').'/favicon.png'; if ( !ap_image_exists($favurl) ) {$favurl = $ap_favC->theX; $out='   <i>Not Found!</i>';} ?>
				<p class="ap_indent"><label><input type="checkbox" name="<?php echo $optionname;?>[fav_root_png]" class="sboptions" value="1" <?php if ($options['fav_root_png']){echo "checked = checked";}?> /> PNG file type (e.g. <?php bloginfo('url')?>/favicon.png) </label> | <img style="margin:0 5px -3px 0;" width="16px" height="16px" src="<?php echo $favurl?>" title=""><?php echo $out; ?></p>
				<?php $out='';$favurl = get_bloginfo('url').'/favicon.gif'; if ( !ap_image_exists($favurl) ) {$favurl = $ap_favC->theX; $out='   <i>Not Found!</i>';} ?>
				<p class="ap_indent"><label><input type="checkbox" name="<?php echo $optionname;?>[fav_root_gif]" class="sboptions" value="1" <?php if ($options['fav_root_gif']){echo "checked = checked";}?> /> GIF file type (e.g. <?php bloginfo('url')?>/favicon.gif) </label> | <img style="margin:0 5px -3px 0;" width="16px" height="16px" src="<?php echo $favurl?>" title=""><?php echo $out; ?></p>


				<br />
				<hr />	
				<p><label><input type="radio" name="<?php echo $optionname;?>[favicon]" id="favicon_cutom" value="custom" <?php if ($options['favicon'] == "custom" ){echo "checked = checked";}?> /> <strong>I want to define custom URLs for my Favicon file(s)</strong></label><br /><small>( e.g. <?php bloginfo('url')?>/somename.ico or <?php bloginfo('url')?>/some-directory/somename.png )</small></p>
				<p class="ap_indent"><strong>Define Favicon URLs:</strong></p>
				<p class="ap_indent"><strong>ICO file type</strong>:<br/>
				<?php $out='';$favurl = $options['fav_cust_ico'];if ($favurl && !ap_image_exists($favurl) ) {$favurl = $ap_favC->theX; $out='   <i>Not Found!</i>';}?>
				<input name="<?php echo $optionname;?>[fav_cust_ico]" class="input_box" type="text" id="favicon_ico" value="<?php if ($options['fav_cust_ico']){echo $options['fav_cust_ico'];}?>" size="60" maxlength="255" /><?php if ($options['fav_cust_ico']){echo '  | <img style="margin:0 5px -3px 0;" width="16px" height="16px" src="'.$favurl.'" title="">'.$out;}?></p>
				<p class="ap_indent"><strong>PNG file type</strong>:<br/>
				<?php $out='';$favurl = $options['fav_cust_png'];if ($favurl && !ap_image_exists($favurl) ) {$favurl = $ap_favC->theX; $out='   <i>Not Found!</i>';}?>
				<input name="<?php echo $optionname;?>[fav_cust_png]" class="input_box" type="text" id="favicon_png" value="<?php if ($options['fav_cust_png']){echo $options['fav_cust_png'];}?>" size="60" maxlength="255" /><?php if ($options['fav_cust_png']){echo '  | <img style="margin:0 5px -3px 0;" width="16px" height="16px" src="'.$favurl.'" title="">'.$out;}?></p>
				<?php $out='';$favurl = $options['fav_cust_gif'];if ($favurl && !ap_image_exists($favurl) ) {$favurl = $ap_favC->theX; $out='   <i>Not Found!</i>';}?>
				<p class="ap_indent"><strong>GIF file type</strong>:<br/>
				<input name="<?php echo $optionname;?>[fav_cust_gif]" class="input_box" type="text" id="favicon_gif" value="<?php if ($options['fav_cust_gif']){echo $options['fav_cust_gif'];}?>" size="60" maxlength="255" /><?php if ($options['fav_cust_gif']){echo '  | <img style="margin:0 5px -3px 0;" width="16px" height="16px" src="'.$favurl.'" title="">'.$out;}?></p>
				<br />


				</div><!-- end inside-->
			</div><!-- end main-box-1-->


			

			
			


			
			

	
		</div><!-- end normal-sortables -->
		
		<!--<div id="advanced-sortables" class="meta-box-sortables ui-sortable"> </div>-->
	</div><!-- end post-body-content -->
	
	
</div><!-- end poststuff -->

<?php //add securities
	settings_fields($ap_favC->ap_get_option('settings'));
	$ap_favC->ap_input_whichpage($optionpage_codename);
	$ap_favC->ap_savebutton_options();
?>
</form>

<?php //add footer
	$ap_favC->ap_footer_options()
?>

</div><!--end wrap-->

<?php
}

if (!function_exists('ap_image_exists')){
	function ap_image_exists($url=''){
		$exists = false;
		$handle = @fopen($url,'r');
		if ( $handle ){
			$exists = true;
			@fclose($handle);
		}
		return $exists;
	}
}

?>