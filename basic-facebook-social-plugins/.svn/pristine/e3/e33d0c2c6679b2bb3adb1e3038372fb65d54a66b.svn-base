<?php
/*
Plugin Name: Basic Facebook Social Plugins
Version: 1.3
Plugin URI: http://www.romantika.name/v2/wordpress-plugin-basic-facebook-social-plugins/
Description: This plugin is used to quickly add basic Facebook Social plugin features. Basic here means the features using iframe and does not use the SDK (XFBML) / JavaScript. The recommendations, activity and like box features are provided as widgets.
Author: Ady Romantika
Author URI: http://www.romantika.name/v2/
*/

function basic_facebook_social_plugins_likebutton($content="")
{
	# http://developers.facebook.com/docs/reference/plugins/like
	
	$wp_fbsocial = get_option("wp_fbsocial");
	
	$wp_fbsocial_showfaces = ($wp_fbsocial["wp_fbsocial_likefaces"] == 'true' ? 'true' : 'false');

	if($wp_fbsocial["wp_fbsocial_likeenable"] == 'yes')
		return $content . '<iframe id="basic_facebook_social_plugins_likebutton" src="http://www.facebook.com/plugins/like.php?href='.urlencode(get_permalink())
			. '&amp;layout=' . $wp_fbsocial["wp_fbsocial_likelayout"]
			. '&amp;show_faces=' . $wp_fbsocial_showfaces
			. '&amp;width=' . $wp_fbsocial["wp_fbsocial_likewidth"]
			. '&amp;action=' . $wp_fbsocial["wp_fbsocial_likeverb"]
			. '&amp;font=' . $wp_fbsocial["wp_fbsocial_likefont"]
			. '&amp;colorscheme=' . $wp_fbsocial["wp_fbsocial_likecolor"]
			. '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:' . $wp_fbsocial["wp_fbsocial_likewidth"]
			. 'px; height:' . $wp_fbsocial["wp_fbsocial_likeheight"]
			. 'px"></iframe>';
	
	else return $content;
}

# Menu (Settings) panel

function wp_basic_facebook_social_plugins_options_page() {

	if (function_exists('add_options_page')){

		add_options_page( __('Basic Facebook Social Plugins','basic_facebook_social_plugins'), __('Basic Facebook Social Plugins','basic_facebook_social_plugins'), 8, basename(__FILE__), 'basic_facebook_social_plugins_options_subpanel');

	}
}

function basic_facebook_social_plugins_options_subpanel() {

	if($_POST["wp_fbsocial_submit"]){
		$message = "Basic Facebook Social Plugins Settings Updated";
		$wp_fbsocial_saved = get_option("wp_fbsocial");
		$wp_fbsocial = array (
			"wp_fbsocial_sitename"		=> $_POST['wp_fbsocial_sitename_option'],
			"wp_fbsocial_siteimage"		=> $_POST['wp_fbsocial_siteimage_option'],
			"wp_fbsocial_fbadmin"		=> $_POST['wp_fbsocial_fbadmin_option'],
			# Like Button
			"wp_fbsocial_likeenable" 	=> $_POST['wp_fbsocial_likeenable_option'],
			"wp_fbsocial_likelayout" 	=> $_POST['wp_fbsocial_likelayout_option'],
			"wp_fbsocial_likefaces" 	=> $_POST['wp_fbsocial_likefaces_option'],
			"wp_fbsocial_likewidth" 	=> $_POST['wp_fbsocial_likewidth_option'],
			"wp_fbsocial_likeheight" 	=> $_POST['wp_fbsocial_likeheight_option'],
			"wp_fbsocial_likeverb" 		=> $_POST['wp_fbsocial_likeverb_option'],
			"wp_fbsocial_likefont" 		=> $_POST['wp_fbsocial_likefont_option'],
			"wp_fbsocial_likecolor" 	=> $_POST['wp_fbsocial_likecolor_option'],
			# Advanced
			"wp_fbsocial_advancedcss"		=> $_POST['wp_fbsocial_advancedcss_option'],
		);	

		if ($wp_fbsocial_saved != $wp_fbsocial)
			if(!update_option("wp_fbsocial",$wp_fbsocial))
				$message = "Update Failed";
		echo '<div id="message" class="updated fade"><p>'.$message.'.</p></div>';
	}

	$wp_fbsocial = get_option("wp_fbsocial");

?>

    <div class="wrap">

        <h2 id="write-post"><?php _e("Basic Facebook Social Plugins Options&hellip;",'basic_facebook_social_plugins');?></h2>

        <div style="float:right;">
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
          <input type="hidden" name="cmd" value="_donations">
          <input type="hidden" name="business" value="ady@romantika.name">
          <input type="hidden" name="item_name" value="Donate to romantika.name">
          <input type="hidden" name="no_shipping" value="0">
          <input type="hidden" name="no_note" value="1">
          <input type="hidden" name="currency_code" value="USD">
          <input type="hidden" name="tax" value="0">
          <input type="hidden" name="lc" value="US">
          <input type="hidden" name="bn" value="PP-DonationsBF">
          <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"><br />
          </form>
        </div>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo basename(__FILE__); ?>">
		
        <h3><?php _e("Metadata (leave empty to disable)",'basic_facebook_social_plugins');?></h3>
		
		<table class="form-table">
          <tr>
            <th><?php _e("Site Name",'basic_facebook_social_plugins');?></th>
            <td>
              <input type="text" name="wp_fbsocial_sitename_option" value="<?php echo $wp_fbsocial["wp_fbsocial_sitename"]; ?>" />
            </td>
          </tr>
          <tr>
            <th><?php _e("The URL of the best picture for this page. The image must be at least 50px by 50px and have a maximum aspect ratio of 3:1",'basic_facebook_social_plugins');?></th>
            <td>
              <input type="text" name="wp_fbsocial_siteimage_option" value="<?php echo $wp_fbsocial["wp_fbsocial_siteimage"]; ?>" />
            </td>
          </tr>
          <tr>
            <th><?php _e("Admin IDs separated by comma",'basic_facebook_social_plugins');?></th>
            <td>
              <input type="text" name="wp_fbsocial_fbadmin_option" value="<?php echo $wp_fbsocial["wp_fbsocial_fbadmin"]; ?>" />
            </td>
          </tr>
		</table>

        <h3><?php _e("Like Button",'basic_facebook_social_plugins');?> (<a href="http://developers.facebook.com/docs/reference/plugins/like">Read about it</a>)</h3>

		<p><?php _e("The like button will always be placed at the end of your article/post") ?></p>
		
        <table class="form-table">
          <tr>
            <th><?php _e("Enable Like Button",'basic_facebook_social_plugins');?></th>
            <td>
              <?php
              if ( $wp_fbsocial["wp_fbsocial_likeenable"] == 'yes' ) {
              echo '<input name="wp_fbsocial_likeenable_option" type="checkbox" value="yes" checked>';
              } else {
              echo '<input name="wp_fbsocial_likeenable_option" type="checkbox" value="yes">';
              }
			  ?>
            </td>
          </tr>
          <tr>
            <th><?php _e("Layout Style",'basic_facebook_social_plugins'); ?></th>
            <td>
              <?php $wp_fbsocial_likelayout = $wp_fbsocial["wp_fbsocial_likelayout"]; ?>
              <select name="wp_fbsocial_likelayout_option" >
              <option value="standard" <?php if($wp_fbsocial_likelayout == 'standard') echo 'selected' ?> ><?php _e("Standard",'basic_facebook_social_plugins'); ?></option>
              <option value="button_count" <?php if($wp_fbsocial_likelayout == 'button_count') echo 'selected' ?>><?php _e("Button Count",'basic_facebook_social_plugins'); ?></option>
              </select>
            </td>
          </tr>
          <tr>
            <th><?php _e("Show Faces",'basic_facebook_social_plugins'); ?></th>
            <td>
              <?php
              if ( $wp_fbsocial["wp_fbsocial_likefaces"] == 'true' ) {
              echo '<input name="wp_fbsocial_likefaces_option" type="checkbox" value="true" checked>';
              } else {
              echo '<input name="wp_fbsocial_likefaces_option" type="checkbox" value="true">';
              }
              ?>
            </td>
          </tr>
          <tr>
            <th><?php _e("Width",'basic_facebook_social_plugins');?></th>
            <td>
              <input type="text" name="wp_fbsocial_likewidth_option" value="<?php echo $wp_fbsocial["wp_fbsocial_likewidth"]; ?>" />
            </td>
          </tr>
          <tr>
            <th><?php _e("Height (default 25px)",'basic_facebook_social_plugins');?></th>
            <td>
              <input type="text" name="wp_fbsocial_likeheight_option" value="<?php echo ($wp_fbsocial["wp_fbsocial_likeheight"] == '' ? '25' : $wp_fbsocial["wp_fbsocial_likeheight"]) ?>" />
            </td>
          </tr>
          <tr>
            <th><?php _e("Verb To Display",'basic_facebook_social_plugins'); ?></th>
            <td>
              <?php $wp_fbsocial_likeverb = $wp_fbsocial["wp_fbsocial_likeverb"]; ?>
              <select name="wp_fbsocial_likeverb_option" >
              <option value="like" <?php if($wp_fbsocial_likeverb == 'like') echo 'selected' ?> ><?php _e("like",'basic_facebook_social_plugins'); ?></option>
              <option value="recommend" <?php if($wp_fbsocial_likeverb == 'recommend') echo 'selected' ?>><?php _e("recommend",'basic_facebook_social_plugins'); ?></option>
              </select>
            </td>
          </tr>
          <tr>
            <th><?php _e("Font",'basic_facebook_social_plugins'); ?></th>
            <td>
              <?php $wp_fbsocial_likefont = $wp_fbsocial["wp_fbsocial_likefont"]; ?>
              <select name="wp_fbsocial_likefont_option" >
              <option value="arial" <?php if($wp_fbsocial_likefont == 'arial') echo 'selected' ?> ><?php _e("arial",'basic_facebook_social_plugins'); ?></option>
              <option value="lucida+grande" <?php if($wp_fbsocial_likefont == 'lucida+grande') echo 'selected' ?>><?php _e("lucida grande",'basic_facebook_social_plugins'); ?></option>
			  <option value="segoe+ui" <?php if($wp_fbsocial_likefont == 'segoe+ui') echo 'selected' ?>><?php _e("segoe ui",'basic_facebook_social_plugins'); ?></option>
			  <option value="tahoma" <?php if($wp_fbsocial_likefont == 'tahoma') echo 'selected' ?>><?php _e("tahoma",'basic_facebook_social_plugins'); ?></option>
			  <option value="trebuchet+ms" <?php if($wp_fbsocial_likefont == 'trebuchet+ms') echo 'selected' ?>><?php _e("trebuchet ms",'basic_facebook_social_plugins'); ?></option>
			  <option value="verdana" <?php if($wp_fbsocial_likefont == 'verdana') echo 'selected' ?>><?php _e("verdana",'basic_facebook_social_plugins'); ?></option>
              </select>
            </td>
          </tr>
          <tr>
            <th><?php _e("Color Scheme",'basic_facebook_social_plugins'); ?></th>
            <td>
              <?php $wp_fbsocial_likecolor = $wp_fbsocial["wp_fbsocial_likecolor"]; ?>
              <select name="wp_fbsocial_likecolor_option" >
              <option value="light" <?php if($wp_fbsocial_likecolor == 'light') echo 'selected' ?> ><?php _e("light",'basic_facebook_social_plugins'); ?></option>
              <option value="dark" <?php if($wp_fbsocial_likecolor == 'dark') echo 'selected' ?>><?php _e("dark",'basic_facebook_social_plugins'); ?></option>
              </select>
            </td>
          </tr>
        </table>
		
		<h3><?php _e("Advanced",'basic_facebook_social_plugins');?></h3>
		
		<table class="form-table">
          <tr>
            <th>
				<?php _e("CSS Override (Like Button)",'basic_facebook_social_plugins');?>
			</th>
            <td>
              <textarea name="wp_fbsocial_advancedcss_option" rows="5" cols="50"><?php echo $wp_fbsocial["wp_fbsocial_advancedcss"]; ?></textarea>
            </td>
          </tr>
		  <tr>
			<td colspan="2">
				ID for iframes:<br/>
				#basic_facebook_social_plugins_likebutton<br/>
				#basic_facebook_social_plugins_recommend<br/>
				#basic_facebook_social_plugins_activity<br/>
				#basic_facebook_social_plugins_likebox
			</td>
		  </tr>
		</table>
		
        <p class="submit"><input type="submit" value="<?php _e("Update Preferences &raquo;",'basic_facebook_social_plugins');?>" name="wp_fbsocial_submit" /></p>
        </form>
		
      </div>

<?php } ?><?php

# Code to handle activity feed widget

function basic_facebook_social_plugins_activity_register() {
	if ( !$options = get_option('wp_fbsocial_activity') )
		$options = array();
	$widget_ops = array('classname' => 'wp_fbsocial_activity', 'description' => __('Facebook Activity Feed'));
	$control_ops = array('width' => 400, 'height' => 350, 'id_base' => 'wp_fbsocial_activity');
	$name = __('Facebook Activity Feed');

	$id = false;
	
	foreach ( (array) array_keys($options) as $o ) {

		$id = "wp_fbsocial_activity-$o";
		wp_register_sidebar_widget($id, $name, 'basic_facebook_social_plugins_activity', $widget_ops, array( 'number' => $o ));
		wp_register_widget_control($id, $name, 'basic_facebook_social_plugins_activity_control', $control_ops, array( 'number' => $o ));
	}
	
	if ( !$id ) {
		wp_register_sidebar_widget( 'wp_fbsocial_activity-1', $name, 'basic_facebook_social_plugins_activity', $widget_ops, array( 'number' => -1 ) );
		wp_register_widget_control( 'wp_fbsocial_activity-1', $name, 'basic_facebook_social_plugins_activity_control', $control_ops, array( 'number' => -1 ) );
	}
}

function basic_facebook_social_plugins_activity($args, $widget_args = 1)
{
	# http://developers.facebook.com/docs/reference/plugins/activity
	
	extract( $args, EXTR_SKIP );
	if ( is_numeric($widget_args) )
	{
		$widget_args = array( 'number' => $widget_args );
	}
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract( $widget_args, EXTR_SKIP );
	
	$option = get_option("wp_fbsocial_activity");
	
	if ( !isset($option[$number]) ) { return; }
	
	$option_activitydomain = ($option[$number]["domain"] != '' ? urlencode($option[$number]["domain"]) : urlencode(get_bloginfo('url')));
	
	print '<iframe id="basic_facebook_social_plugins_activity" src="http://www.facebook.com/plugins/activity.php?site=' . $option_activitydomain
		. '&amp;width=' . $option[$number]['width']
		. '&amp;height=' . $option[$number]['height'] 
		. '&amp;header=' . $option[$number]['header']
		. '&amp;colorscheme=' . $option[$number]['color']
		. '&amp;font=' . $option[$number]['font']
		. '&amp;border_color=%23' . $option[$number]['border']
		. '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:' . $option[$number]['width']
		. 'px; height:' . $option[$number]['height'] .'px"></iframe>';
}

function basic_facebook_social_plugins_activity_control($widget_args) {

	global $wp_registered_widgets;
	static $updated = false;

	if ( is_numeric($widget_args) )
		$widget_args = array( 'number' => $widget_args );			
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract( $widget_args, EXTR_SKIP );

	$options = get_option('wp_fbsocial_activity');
	
	if ( !is_array($options) )	
		$options = array();

	if ( !$updated && !empty($_POST['sidebar']) ) {
	
		$sidebar = (string) $_POST['sidebar'];	
		$sidebars_widgets = wp_get_sidebars_widgets();
		
		if ( isset($sidebars_widgets[$sidebar]) )
			$this_sidebar =& $sidebars_widgets[$sidebar];
		else
			$this_sidebar = array();

		foreach ( (array) $this_sidebar as $_widget_id ) {
			if ( 'basic_facebook_social_plugins_activity' == $wp_registered_widgets[$_widget_id]['callback'] && isset($wp_registered_widgets[$_widget_id]['params'][0]['number']) ) {
				$widget_number = $wp_registered_widgets[$_widget_id]['params'][0]['number'];
				if ( !in_array( "wp_fbsocial_activity-$widget_number", $_POST['widget-id'] ) ) // the widget has been removed.
					unset($options[$widget_number]);
			}
		}

		foreach ( (array) $_POST['wp_fbsocial_activity'] as $widget_number => $wp_fbsocial_activity ) {
			if ( !isset($wp_fbsocial_activity['domain']) && isset($options[$widget_number]) ) // user clicked cancel
				continue;

			$domain = $wp_fbsocial_activity['domain'];
			$width = $wp_fbsocial_activity['width'];
			$height = $wp_fbsocial_activity['height'];
			$header = $wp_fbsocial_activity['header'];
			$color	= $wp_fbsocial_activity['color'];
			$font = $wp_fbsocial_activity['font'];
			$border = $wp_fbsocial_activity['border'];
			
			// Pact the values into an array
			$options[$widget_number] = compact( 'domain', 'width', 'height', 'header', 'color', 'font', 'border' );
		}

		update_option('wp_fbsocial_activity', $options);
		$updated = true;
	}

	if ( -1 == $number ) { // if it's the first time and there are no existing values

		$domain = '';
		$width = '';
		$height = '';
		$header = '';
		$color	= '';
		$font = '';
		$border = '';
		$number = '%i%';
		
	} else { // otherwise get the existing values
	
		$domain = $options[$number]['domain'];
		$width = $options[$number]['width'];
		$height = $options[$number]['height'];
		$header = $options[$number]['header'];
		$color	= $options[$number]['color'];
		$font = $options[$number]['font'];
		$border = $options[$number]['border'];
	}
?>

		<p><label>Domain Override</label><br/><input type="text" size="30" id="domain_value_<?php echo $number ?>" name="wp_fbsocial_activity[<?php echo $number ?>][domain]" value="<?php echo $domain ?>" /></p>
		<p><label>Width</label><br/><input type="text" id="width_value_<?php echo $number ?>" name="wp_fbsocial_activity[<?php echo $number ?>][width]" value="<?php echo $width ?>" />px</p>
		<p><label>Height</label><br/><input type="text" id="height_value_<?php echo $number ?>" name="wp_fbsocial_activity[<?php echo $number ?>][height]" value="<?php echo $height ?>" />px</p>
		<p>
			<label>Show Facebook Header</label><br />
			Yes <input id="header_value_<?php echo $number; ?>" name="wp_fbsocial_activity[<?php echo $number; ?>][header]" type="radio" <?php if($header == 'true') echo 'checked="checked"'; ?> value="true" />
			No <input id="header_value_<?php echo $number; ?>" name="wp_fbsocial_activity[<?php echo $number; ?>][header]" type="radio" <?php if($header == 'false') echo 'checked="checked"'; ?> value="false" />
		</p>
		<p>
			<label>Color Scheme
			<select id="color_value_<?php echo $number; ?>" name="wp_fbsocial_activity[<?php echo $number; ?>][color]">
				<option <?php if ($color == 'light') echo 'selected'; ?> value="light">light</option>
				<option <?php if ($color == 'dark') echo 'selected'; ?> value="dark">dark</option>
			</select>
			</label>
		</p>
		<p>
			<label>Font
			<select id="font_value_<?php echo $number; ?>" name="wp_fbsocial_activity[<?php echo $number; ?>][font]">
				<option <?php if ($font == 'arial') echo 'selected'; ?> value="arial">arial</option>
				<option <?php if ($font == 'lucida+grande') echo 'selected'; ?> value="lucida+grande">lucida grande</option>
				<option <?php if ($font == 'segoe+ui') echo 'selected'; ?> value="segoe+ui">segoe ui</option>
				<option <?php if ($font == 'tahoma') echo 'selected'; ?> value="tahoma">tahoma</option>
				<option <?php if ($font == 'trebuchet+ms') echo 'selected'; ?> value="trebuchet+ms">trebuchet ms</option>
				<option <?php if ($font == 'verdana') echo 'selected'; ?> value="verdana">verdana</option>
			</select>
			</label>
		</p>
		<p><label>Border Color (hex)</label><br/>#<input type="text" id="border_value_<?php echo $number ?>" name="wp_fbsocial_activity[<?php echo $number ?>][border]" value="<?php echo $border ?>" />
<input type="hidden" name="wp_fbsocial_activity[<?php echo $number; ?>][submit]" value="1" />

<?php
}

# Code to handle recommendation widget

function basic_facebook_social_plugins_recommendations_register() {
	if ( !$options = get_option('wp_fbsocial_recommend') )
		$options = array();
	$widget_ops = array('classname' => 'wp_fbsocial_recommend', 'description' => __('Facebook Recommendations'));
	$control_ops = array('width' => 400, 'height' => 350, 'id_base' => 'wp_fbsocial_recommend');
	$name = __('Facebook Recommendations');

	$id = false;
	
	foreach ( (array) array_keys($options) as $o ) {

		$id = "wp_fbsocial_recommend-$o";
		wp_register_sidebar_widget($id, $name, 'basic_facebook_social_plugins_recommendations', $widget_ops, array( 'number' => $o ));
		wp_register_widget_control($id, $name, 'basic_facebook_social_plugins_recommendations_control', $control_ops, array( 'number' => $o ));
	}
	
	if ( !$id ) {
		wp_register_sidebar_widget( 'wp_fbsocial_recommend-1', $name, 'basic_facebook_social_plugins_recommendations', $widget_ops, array( 'number' => -1 ) );
		wp_register_widget_control( 'wp_fbsocial_recommend-1', $name, 'basic_facebook_social_plugins_recommendations_control', $control_ops, array( 'number' => -1 ) );
	}
}

function basic_facebook_social_plugins_recommendations($args, $widget_args = 1)
{
	# http://developers.facebook.com/docs/reference/plugins/recommendations
	
	extract( $args, EXTR_SKIP );
	if ( is_numeric($widget_args) )
	{
		$widget_args = array( 'number' => $widget_args );
	}
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract( $widget_args, EXTR_SKIP );
	
	$option = get_option("wp_fbsocial_recommend");
	
	if ( !isset($option[$number]) ) { return; }
	
	$option_recommenddomain = ($option[$number]["domain"] != '' ? urlencode($option[$number]["domain"]) : urlencode(get_bloginfo('url')));
	
	print '<iframe id="basic_facebook_social_plugins_recommend" src="http://www.facebook.com/plugins/recommendations.php?site=' . $option_recommenddomain
		. '&amp;width=' . $option[$number]['width']
		. '&amp;height=' . $option[$number]['height']
		. '&amp;header=' . $option[$number]['header']
		. '&amp;colorscheme=' . $option[$number]['color']
		. '&amp;border_color=%23' . $option[$number]['border']
		. '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:' . $option[$number]['width']
		. 'px; height:' . $option[$number]['height'] . 'px"></iframe>';
}

function basic_facebook_social_plugins_recommendations_control($widget_args) {

	global $wp_registered_widgets;
	static $updated = false;

	if ( is_numeric($widget_args) )
		$widget_args = array( 'number' => $widget_args );			
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract( $widget_args, EXTR_SKIP );

	$options = get_option('wp_fbsocial_recommend');
	
	if ( !is_array($options) )	
		$options = array();

	if ( !$updated && !empty($_POST['sidebar']) ) {
	
		$sidebar = (string) $_POST['sidebar'];	
		$sidebars_widgets = wp_get_sidebars_widgets();
		
		if ( isset($sidebars_widgets[$sidebar]) )
			$this_sidebar =& $sidebars_widgets[$sidebar];
		else
			$this_sidebar = array();

		foreach ( (array) $this_sidebar as $_widget_id ) {
			if ( 'basic_facebook_social_plugins_recommendations' == $wp_registered_widgets[$_widget_id]['callback'] && isset($wp_registered_widgets[$_widget_id]['params'][0]['number']) ) {
				$widget_number = $wp_registered_widgets[$_widget_id]['params'][0]['number'];
				if ( !in_array( "wp_fbsocial_recommend-$widget_number", $_POST['widget-id'] ) ) // the widget has been removed.
					unset($options[$widget_number]);
			}
		}

		foreach ( (array) $_POST['wp_fbsocial_recommend'] as $widget_number => $wp_fbsocial_recommend ) {
			if ( !isset($wp_fbsocial_recommend['domain']) && isset($options[$widget_number]) ) // user clicked cancel
				continue;

			$domain = $wp_fbsocial_recommend['domain'];
			$width = $wp_fbsocial_recommend['width'];
			$height = $wp_fbsocial_recommend['height'];
			$header = $wp_fbsocial_recommend['header'];
			$color	= $wp_fbsocial_recommend['color'];
			$font = $wp_fbsocial_recommend['font'];
			$border = $wp_fbsocial_recommend['border'];
			
			// Pact the values into an array
			$options[$widget_number] = compact( 'domain', 'width', 'height', 'header', 'color', 'font', 'border' );
		}

		update_option('wp_fbsocial_recommend', $options);
		$updated = true;
	}

	if ( -1 == $number ) { // if it's the first time and there are no existing values

		$domain = '';
		$width = '';
		$height = '';
		$header = '';
		$color	= '';
		$font = '';
		$border = '';
		$number = '%i%';
		
	} else { // otherwise get the existing values
	
		$domain = $options[$number]['domain'];
		$width = $options[$number]['width'];
		$height = $options[$number]['height'];
		$header = $options[$number]['header'];
		$color	= $options[$number]['color'];
		$font = $options[$number]['font'];
		$border = $options[$number]['border'];
	}
?>

		<p><label>Domain Override</label><br/><input type="text" size="30" id="domain_value_<?php echo $number ?>" name="wp_fbsocial_recommend[<?php echo $number ?>][domain]" value="<?php echo $domain ?>" /></p>
		<p><label>Width</label><br/><input type="text" id="width_value_<?php echo $number ?>" name="wp_fbsocial_recommend[<?php echo $number ?>][width]" value="<?php echo $width ?>" />px</p>
		<p><label>Height</label><br/><input type="text" id="height_value_<?php echo $number ?>" name="wp_fbsocial_recommend[<?php echo $number ?>][height]" value="<?php echo $height ?>" />px</p>
		<p>
			<label>Show Facebook Header</label><br />
			Yes <input id="header_value_<?php echo $number; ?>" name="wp_fbsocial_recommend[<?php echo $number; ?>][header]" type="radio" <?php if($header == 'true') echo 'checked="checked"'; ?> value="true" />
			No <input id="header_value_<?php echo $number; ?>" name="wp_fbsocial_recommend[<?php echo $number; ?>][header]" type="radio" <?php if($header == 'false') echo 'checked="checked"'; ?> value="false" />
		</p>
		<p>
			<label>Color Scheme
			<select id="color_value_<?php echo $number; ?>" name="wp_fbsocial_recommend[<?php echo $number; ?>][color]">
				<option <?php if ($color == 'light') echo 'selected'; ?> value="light">light</option>
				<option <?php if ($color == 'dark') echo 'selected'; ?> value="dark">dark</option>
			</select>
			</label>
		</p>
		<p>
			<label>Font
			<select id="font_value_<?php echo $number; ?>" name="wp_fbsocial_recommend[<?php echo $number; ?>][font]">
				<option <?php if ($font == 'arial') echo 'selected'; ?> value="arial">arial</option>
				<option <?php if ($font == 'lucida+grande') echo 'selected'; ?> value="lucida+grande">lucida grande</option>
				<option <?php if ($font == 'segoe+ui') echo 'selected'; ?> value="segoe+ui">segoe ui</option>
				<option <?php if ($font == 'tahoma') echo 'selected'; ?> value="tahoma">tahoma</option>
				<option <?php if ($font == 'trebuchet+ms') echo 'selected'; ?> value="trebuchet+ms">trebuchet ms</option>
				<option <?php if ($font == 'verdana') echo 'selected'; ?> value="verdana">verdana</option>
			</select>
			</label>
		</p>
		<p><label>Border Color (hex)</label><br/>#<input type="text" id="border_value_<?php echo $number ?>" name="wp_fbsocial_recommend[<?php echo $number ?>][border]" value="<?php echo $border ?>" />
<input type="hidden" name="wp_fbsocial_recommend[<?php echo $number; ?>][submit]" value="1" />

<?php
}

# Code to handle likebox feed widget

function basic_facebook_social_plugins_likebox_register() {
	if ( !$options = get_option('wp_fbsocial_likebox') )
		$options = array();
	$widget_ops = array('classname' => 'wp_fbsocial_likebox', 'description' => __('Facebook Like Box'));
	$control_ops = array('width' => 400, 'height' => 350, 'id_base' => 'wp_fbsocial_likebox');
	$name = __('Facebook Like Box');

	$id = false;
	
	foreach ( (array) array_keys($options) as $o ) {

		$id = "wp_fbsocial_likebox-$o";
		wp_register_sidebar_widget($id, $name, 'basic_facebook_social_plugins_likebox', $widget_ops, array( 'number' => $o ));
		wp_register_widget_control($id, $name, 'basic_facebook_social_plugins_likebox_control', $control_ops, array( 'number' => $o ));
	}
	
	if ( !$id ) {
		wp_register_sidebar_widget( 'wp_fbsocial_likebox-1', $name, 'basic_facebook_social_plugins_likebox', $widget_ops, array( 'number' => -1 ) );
		wp_register_widget_control( 'wp_fbsocial_likebox-1', $name, 'basic_facebook_social_plugins_likebox_control', $control_ops, array( 'number' => -1 ) );
	}
}

function basic_facebook_social_plugins_likebox($args, $widget_args = 1)
{
	# http://developers.facebook.com/docs/reference/plugins/like-box
	
	extract( $args, EXTR_SKIP );
	if ( is_numeric($widget_args) )
	{
		$widget_args = array( 'number' => $widget_args );
	}
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract( $widget_args, EXTR_SKIP );
	
	$option = get_option("wp_fbsocial_likebox");
	
	if ( !isset($option[$number]) ) { return; }
	
	$option_likeboxdomain = ($option[$number]["domain"] != '' ? urlencode($option[$number]["domain"]) : urlencode(get_bloginfo('url')));
	
	print '<iframe id="basic_facebook_social_plugins_likebox" src="http://www.facebook.com/plugins/fan.php?id=' . $option[$number]['pageid']
		. '&amp;width=' . $option[$number]['width']
		. '&amp;height=' . $option[$number]['height']
		. '&amp;connections=' . $option[$number]['conn']
		. '&amp;stream=' . $option[$number]['stream']
		. '&amp;header=' . $option[$number]['header']
		. '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:' . $option[$number]['width']
		. 'px; height:' . $option[$number]['height']
		. 'px"></iframe>';
}

function basic_facebook_social_plugins_likebox_control($widget_args) {

	global $wp_registered_widgets;
	static $updated = false;

	if ( is_numeric($widget_args) )
		$widget_args = array( 'number' => $widget_args );			
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract( $widget_args, EXTR_SKIP );

	$options = get_option('wp_fbsocial_likebox');
	
	if ( !is_array($options) )	
		$options = array();

	if ( !$updated && !empty($_POST['sidebar']) ) {
	
		$sidebar = (string) $_POST['sidebar'];	
		$sidebars_widgets = wp_get_sidebars_widgets();
		
		if ( isset($sidebars_widgets[$sidebar]) )
			$this_sidebar =& $sidebars_widgets[$sidebar];
		else
			$this_sidebar = array();

		foreach ( (array) $this_sidebar as $_widget_id ) {
			if ( 'basic_facebook_social_plugins_likebox' == $wp_registered_widgets[$_widget_id]['callback'] && isset($wp_registered_widgets[$_widget_id]['params'][0]['number']) ) {
				$widget_number = $wp_registered_widgets[$_widget_id]['params'][0]['number'];
				if ( !in_array( "wp_fbsocial_likebox-$widget_number", $_POST['widget-id'] ) ) // the widget has been removed.
					unset($options[$widget_number]);
			}
		}

		foreach ( (array) $_POST['wp_fbsocial_likebox'] as $widget_number => $wp_fbsocial_likebox ) {
			if ( !isset($wp_fbsocial_likebox['pageid']) && isset($options[$widget_number]) ) // user clicked cancel
				continue;

			$pageid = $wp_fbsocial_likebox['pageid'];
			$width = $wp_fbsocial_likebox['width'];
			$height = $wp_fbsocial_likebox['height'];
			$header = $wp_fbsocial_likebox['header'];
			$conn	= $wp_fbsocial_likebox['conn'];
			$stream = $wp_fbsocial_likebox['stream'];
			
			// Pact the values into an array
			$options[$widget_number] = compact( 'pageid', 'width', 'height', 'header', 'conn', 'stream' );
		}

		update_option('wp_fbsocial_likebox', $options);
		$updated = true;
	}

	if ( -1 == $number ) { // if it's the first time and there are no existing values

		$pageid = '';
		$width = '';
		$height = '';
		$header = '';
		$conn	= '';
		$stream = '';
		$number = '%i%';
		
	} else { // otherwise get the existing values
	
		$pageid = $options[$number]['pageid'];
		$width = $options[$number]['width'];
		$height = $options[$number]['height'];
		$header = $options[$number]['header'];
		$conn	= $options[$number]['conn'];
		$stream = $options[$number]['stream'];
	}
?>

		<p><label>Facebook Page ID</label><br/><input type="text" size="30" id="pageid_value_<?php echo $number ?>" name="wp_fbsocial_likebox[<?php echo $number ?>][pageid]" value="<?php echo $pageid ?>" /></p>
		<p><label>Width</label><br/><input type="text" id="width_value_<?php echo $number ?>" name="wp_fbsocial_likebox[<?php echo $number ?>][width]" value="<?php echo $width ?>" />px</p>
		<p><label>Height</label><br/><input type="text" id="height_value_<?php echo $number ?>" name="wp_fbsocial_likebox[<?php echo $number ?>][height]" value="<?php echo $height ?>" />px</p>
		<p><label>No of Connections</label><br/><input type="text" id="conn_value_<?php echo $number ?>" name="wp_fbsocial_likebox[<?php echo $number ?>][conn]" value="<?php echo $conn ?>" /></p>
		<p>
			<label>Show Stream</label><br />
			Yes <input id="stream_value_<?php echo $number; ?>" name="wp_fbsocial_likebox[<?php echo $number; ?>][stream]" type="radio" <?php if($stream == 'true') echo 'checked="checked"'; ?> value="true" />
			No <input id="stream_value_<?php echo $number; ?>" name="wp_fbsocial_likebox[<?php echo $number; ?>][stream]" type="radio" <?php if($stream == 'false') echo 'checked="checked"'; ?> value="false" />
		</p>
		<p>
			<label>Show Facebook Header</label><br />
			Yes <input id="header_value_<?php echo $number; ?>" name="wp_fbsocial_likebox[<?php echo $number; ?>][header]" type="radio" <?php if($header == 'true') echo 'checked="checked"'; ?> value="true" />
			No <input id="header_value_<?php echo $number; ?>" name="wp_fbsocial_likebox[<?php echo $number; ?>][header]" type="radio" <?php if($header == 'false') echo 'checked="checked"'; ?> value="false" />
		</p>
<input type="hidden" name="wp_fbsocial_likebox[<?php echo $number; ?>][submit]" value="1" />

<?php
}

# Add metadata information

function basic_facebook_social_plugins_header()
{
	$wp_fbsocial = get_option("wp_fbsocial");
	if($wp_fbsocial["wp_fbsocial_advancedcss"] != '')
		print '<style type="text/css">' . $wp_fbsocial["wp_fbsocial_advancedcss"] . '</style>';
	if ($wp_fbsocial["wp_fbsocial_sitename"] != '')
		print "\n" . '<meta property="og:site_name" content="' . $wp_fbsocial["wp_fbsocial_sitename"] . '"/>';
	if ($wp_fbsocial["wp_fbsocial_siteimage"] != '')
		print "\n" . '<meta property="og:image" content="' . $wp_fbsocial["wp_fbsocial_siteimage"] . '"/>';
	if ($wp_fbsocial["wp_fbsocial_fbadmin"] != '')
		print "\n" . '<meta property="fb:admins" content="' . $wp_fbsocial["wp_fbsocial_fbadmin"] . '"/>';
}

add_action('wp_head', 'basic_facebook_social_plugins_header');

add_filter('the_content', 'basic_facebook_social_plugins_likebutton');
add_action('admin_menu', 'wp_basic_facebook_social_plugins_options_page');

add_action('init','basic_facebook_social_plugins_recommendations_register',1);
add_action('init','basic_facebook_social_plugins_activity_register',1);
add_action('init','basic_facebook_social_plugins_likebox_register',1);

?>