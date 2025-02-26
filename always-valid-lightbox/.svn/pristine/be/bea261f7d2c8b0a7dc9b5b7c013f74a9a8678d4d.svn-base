<?php
/*
Plugin Name: Always Valid Lightbox
Plugin URI: http://www.joffrey-quillet.fr/
Version: v1.1.3
Author: <a href="http://www.joffrey-quillet.fr/">Joffrey Quillet</a>
Description: Always Valid Lightbox is a Lightbox plugin whose markup adapts to your Doctype in order to always provide valid HTML markup.
*/

/*	Copyright 2012  Joffrey Quillet - Email : joffrey.quillet[at]gmail.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA	*/


/*--------------------------------------------------------------------------*/


/*Actions to perform on plugin activation and deactivation*/

function always_valid_lightbox_activation(){
	add_option("always_valid_lightbox_add_jquery_library", 0, 'yes');
	add_option("always_valid_lightbox_add_attributes", 1, 'yes');
	add_option("always_valid_lightbox_attribute_to_add", 'rel="lightbox"', 'yes');
	add_option("always_valid_lightbox_css", 0, 'yes');
}

function always_valid_lightbox_deactivation(){
	delete_option("always_valid_lightbox_add_jquery_library");
	delete_option("always_valid_lightbox_add_attributes");
	delete_option("always_valid_lightbox_attribute_to_add");
	delete_option("always_valid_lightbox_css");
}

register_activation_hook(__FILE__,'always_valid_lightbox_activation');
register_deactivation_hook(__FILE__,'always_valid_lightbox_deactivation');

/*Generate the options page*/

if(is_admin()){
	function always_valid_lightbox_add_plugin_menu(){
		add_menu_page( 'Always Valid Lightbox', 'Always valid Lightbox', 'manage_options', __FILE__, 'always_valid_lightbox_options' );
		register_setting( 'always_valid_lightbox_settings_group', 'always_valid_lightbox_add_attributes', 'always_valid_lightbox_add_attributes_validation');
		register_setting('always_valid_lightbox_settings_group', 'always_valid_lightbox_attribute_to_add', 'always_valid_lightbox_attribute_to_add_validation');
		register_setting('always_valid_lightbox_settings_group','always_valid_lightbox_add_jquery_library', 'always_valid_lightbox_add_jquery_library_validation');
		register_setting('always_valid_lightbox_settings_group','always_valid_lightbox_css','always_valid_lightbox_css_validation');
	}

	add_action('admin_menu','always_valid_lightbox_add_plugin_menu');
}

/*Options page*/

function always_valid_lightbox_options(){
	if((is_admin())&&(current_user_can('manage_options'))){
	?>
	<div class="wrap">
		<h2><?php _e('Always Valid Lightbox Options');?></h2>
		<form method="post" id="options" action="options.php">
			<?php settings_fields('always_valid_lightbox_settings_group');?>
			<?php do_settings_sections( 'always_valid_lightbox_settings_group' ); ?>
			<?php $add_tags = get_option('always_valid_lightbox_add_attributes');?>
			<?php $get_library = get_option('always_valid_lightbox_add_jquery_library');?>
			<?php $css_style = get_option('always_valid_lightbox_css');?>
			<h3>Lightbox integration :</h3>
			<div id="section1">
				<p><label for="always_valid_lightbox_add_jquery_library"><?php _e('Automatically include the jQuery library in your HTML document (check "No" if the jQuery library is already included in the <head> section of your template or by a plugin you\'re using. Otherwise, check "Yes" or the plugin will not work.)');?></label></p>
				<p><input type="radio" name="always_valid_lightbox_add_jquery_library" value="1" <?php if($get_library==1){echo 'checked="checked"';}?>/><?php _e('Yes');?></p>
				<p><input type="radio" name="always_valid_lightbox_add_jquery_library" value="0" <?php if($get_library==0){echo 'checked="checked"';}?>/><?php _e('No');?></p>
			</div>
			<div id="section2">
				<p><label for="always_valid_lightbox_add_attributes"><?php _e('Automatically detect the image links in your posts and apply the lightbox attribute to them :');?></label></p>
				<p><input type="radio" name="always_valid_lightbox_add_attributes" value="1" <?php if($add_tags==1){echo 'checked="checked"';}?>/><?php _e('Yes');?></p>
				<p><input type="radio" name="always_valid_lightbox_add_attributes" value="0" <?php if($add_tags==0){echo 'checked="checked"';}?> /><?php _e('No');?></p>
			</div>
			<?php $tags = get_option('always_valid_lightbox_attribute_to_add');?>
			<div id="section3">
				<label for="always_valid_lightbox_add_attributes"><?php _e('If you chose yes, select which attribute should be inserted in your code (choose accordingly with your doctype declaration) : ');?></label>
				<p><input type="radio" name="always_valid_lightbox_attribute_to_add" value='rel="lightbox"' <?php if($tags=='rel="lightbox"'){echo 'checked="checked"';}?>/><?php _e('rel="lightbox" : Recommended if your theme uses HTML Strict or Transitional Doctype');?></p>
				<p><input type="radio" name="always_valid_lightbox_attribute_to_add" value='data-lightbox="true"' <?php if($tags=='data-lightbox="true"'){echo 'checked="checked"';}?> /><?php _e('data-lightbox="true" : Recommended if your theme uses HTML5 Doctype');?></p>
			</div>
			<div id="section4">
				<h3><label for="always_valid_lightbox_css"><?php _e('Lightbox skin :');?></h3>
				<table>
					<tr align="center">
						<td><input type="radio" name="always_valid_lightbox_css" value="0" <?php if($css_style==0){echo 'checked="checked"';}?>/><?php _e('White');?></td>
						<td><input type="radio" name="always_valid_lightbox_css" value="1" <?php if($css_style==1){echo 'checked="checked"';}?>/><?php _e('Black');?></td>
					</tr>
					<tr align="center">
						<td><img src="<?php echo plugins_url().'/always-valid-lightbox/images/screenshot-white.jpg';?>" height="192" width="256"/></td>
						<td><img src="<?php echo plugins_url().'/always-valid-lightbox/images/screenshot-black.jpg';?>" height="192" width="256"/></td>
					</tr>
				</table>
			</div>
			<p class="submit"><input name="submit" type="submit" value="<?php _e('Save Changes') ?>" /></p>
		</form>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var value = jQuery('input[name=always_valid_lightbox_add_attributes]:checked').val();
				if(value==0){
					jQuery('#section3').hide();
				}
				else if(value==1){
					jQuery('#section3').show();
				}
				
				jQuery('#options').change(function(){
					var newvalue = jQuery('input[name=always_valid_lightbox_add_attributes]:checked').val();
					if(newvalue==0){
						jQuery('#section3').fadeOut('normal');
					}
					else if(newvalue==1){
						jQuery('#section3').fadeIn('normal');
					}
				});
			})
		</script>
	</div>
	<?php
	}
}

/*Form data validation*/

function always_valid_lightbox_add_attributes_validation($input){
	if(($input!=0)&&($input!=1)){
		$input = '';
	}
	return $input;
}

function always_valid_lightbox_attribute_to_add_validation($input){
	if(($input!='rel="lightbox"')&&($input!='data-lightbox="true"')){
		$input ='';
	}
	return $input;
}

function always_valid_lightbox_add_jquery_library_validation($input){
	if(($input!=0)&&($input!=1)){
		$input = '';
	}
	return $input;
}

function always_valid_lightbox_css_validation($input){
	if(($input!=0)&&($input!=1)){
		$input = '';
	}
	return $input;
}

/*Include the jQuery library, the jQuery lightbox script and the stylesheet*/

function always_valid_lightbox_add_jquery_js(){
	wp_deregister_script('jquery');
	wp_register_script('jquery','http://code.jquery.com/jquery-1.7.2.min.js', false, '');
	wp_enqueue_script('jquery');
}

function always_valid_lightbox_add_lightbox_js(){
	wp_register_script('always_valid_lightbox',plugins_url().'/always-valid-lightbox/js/lightbox.js','','',true);
	wp_enqueue_script('always_valid_lightbox');
}

function always_valid_lightbox_add_lightbox_css(){
	wp_register_style( 'black', plugins_url().'/always-valid-lightbox/css/black.css' );
	wp_register_style( 'white', plugins_url().'/always-valid-lightbox/css/white.css' );
	$css_style = get_option('always_valid_lightbox_css');
	if($css_style==0){
		wp_enqueue_style('white');
	}
	elseif($css_style==1){
		wp_enqueue_style('black');		
	}
}

if(!is_admin()){
	if((function_exists('always_valid_lightbox_add_jquery_js'))&&(get_option("always_valid_lightbox_add_jquery_library")==1)){
		add_action('init', 'always_valid_lightbox_add_jquery_js');
	}

	if(function_exists('always_valid_lightbox_add_lightbox_js')){
		add_action('init','always_valid_lightbox_add_lightbox_js');
	}

	if(function_exists('always_valid_lightbox_add_lightbox_css')){
		add_action('init','always_valid_lightbox_add_lightbox_css');
	}
}

/*Add the data-lightbox attribute to all image links*/
function always_valid_lightbox_add_attributes($content){
	$tags = get_option("always_valid_lightbox_attribute_to_add");
	$pattern = '#(<a.*href=".*\.(jpg|jpeg|gif|png)".*)(>)(<img.*src=".*\.(jpg|jpeg|gif|png)".*/>)(</a>)#isU';
	if(preg_match($pattern, $content)){
		if($tags=='data-lightbox="true"'){
			$content = preg_replace($pattern, '$1 data-lightbox="true" $3 $4 $6',$content);
		}
		else if($tags=='rel="lightbox"'){
			$content = preg_replace($pattern, '$1 rel="lightbox" $3 $4 $6',$content);			
		}
	}
	return $content;
}

if(function_exists('always_valid_lightbox_add_attributes')){
	$attribute_value = get_option('always_valid_lightbox_add_attributes');
	if($attribute_value==1){
		add_filter('the_content','always_valid_lightbox_add_attributes');
	}
}
?>