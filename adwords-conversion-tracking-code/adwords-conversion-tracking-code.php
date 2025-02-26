<?php

/**
 * @package AdWords_Conversion_Tracking_Code
 * @version 1.0
 */

/*
Plugin Name: AdWords Conversion Tracking Code
Plugin URI: http://kcseopro.com/
Description: Adding Google AdWords Remarketing code to your website has never been easier. Simply copy and paste your AdWords Remarketing code and that's it. Add your AdWords code to display the ads on your site.
Author: kcseopro
Version: 1.0
Stable tag: 1.0
Author URI: http://kcseopro.com/
Text Domain: tpl-adwords-tracking-code
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define( 'ACTC_VERSION', '1.0' );
define(	'ACTC_TITLE', 'AdWords Conversion Tracking Code');
define( 'ACTC_SLUG', 'tpl-adwords-tracking-code');
define( 'ACTC_PLUGIN_PATH', dirname( __FILE__ ));
define( 'ACTC_PLUGIN_URL', plugins_url( '' , __FILE__ ));


add_action('admin_menu', 'actcAdwordSettingsMenu');

function actcAdwordSettingsMenu() {
	add_submenu_page( 'options-general.php', __('AdWords Conversion Tracking Code', ACTC_SLUG), __('AdWords Tracking Code', ACTC_SLUG), 'manage_options', 'actc-adwords-settings', 'actcSettingsPage' );

	global $theme_name;
	if ( function_exists( 'get_post_types' ) ) {
			$post_types = get_post_types( array(), 'objects' );
			foreach ( $post_types as $post_type ) {
				if ( $post_type->show_ui ) {
					add_meta_box( 'actc-adtc-meta-boxes', __('Google Adwords Tracking Code', ACTC_SLUG), 'actc_adtc_meta_boxes', $post_type->name, 'normal', 'default' );
				}
			}
		} else {
			add_meta_box( 'actc-adtc-meta-boxes', __('Google Adwords Tracking Code', ACTC_SLUG), 'actc_adtc_meta_boxes', 'post', 'normal', 'default' );
			add_meta_box( 'actc-adtc-meta-boxes', __('Google Adwords Tracking Code', ACTC_SLUG), 'actc_adtc_meta_boxes', 'page', 'normal', 'default' );
		}


}

function actc_adtc_meta_boxes() {
	global $post;
	$new_meta_boxes =array(
			"image" => array(
				"name" => "actc_adtc",
				"std" => "",
				"title" => __("Adwords Tracking", ACTC_SLUG),
				"description" => __("Add Your Tracking Code", ACTC_SLUG)
				)
			);
	foreach($new_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

		if($meta_box_value == "")
		$meta_box_value = $meta_box['std'];
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

		echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
		echo'<textarea name="'.$meta_box['name'].'_value" cols="60" rows="8" style="width:97%">'.$meta_box_value.'</textarea>';

	}
}

function actcSettingsPage() {
		$message = null;
		if(@$_POST['submit']){
			if ( !wp_verify_nonce( @$_POST['actc_nonce'], 'actc_adtc_nonce') ){
				$message = __("Security Error!!!", ACTC_SLUG);
			}else{
					update_option( 'actc_adword_code', $_POST['actc_adword_code'] );
			}
		}


		$tlpAdwordCode  = get_option('actc_adword_code');

	?>

	<div class="wrap">
		<div id="icon-tools" class="icon32"></div>
		<h2><?php _e('AdWords Conversion Tracking Code', ACTC_SLUG); ?></h2>
		<?php
			if($message){
				echo "<div class='update'>$message</div>";
			}
		?>
		<form id="tlp-adtc-settings" action="" method="POST">

		<table class="form-table">

			<tr>
				<th scope="row"><label for="actc_adword_code"><?php _e('Google Adwords Code',ACTC_SLUG);?></label></th>
				<td>
					<label for="actc_adword_code">
						<textarea name="actc_adword_code" cols="60" rows="8"><?php echo stripslashes((@$tlpAdwordCode ? @$tlpAdwordCode : null)); ?></textarea>
					</label>
				</td>
			</tr>
		</table>
		<p class="submit"><input type="submit" name="submit" id="tlpSaveButton" class="button button-primary" value="Save Changes"></p>

		<?php wp_nonce_field( 'actc_adtc_nonce', 'actc_nonce' ); ?>
	</form>
	</div>
<?php
}

function tlp_Adword_Display(){
		global $post;

		$metacode = get_post_meta($post->ID, 'actc_adtc_value', true);

		if($metacode){
			$tlpAdwordCode = $metacode;
		}else{
			$tlpAdwordCode  = stripslashes(get_option('actc_adword_code'));
		}

		$html = null;
		$html .= $tlpAdwordCode;

		if($tlpAdwordCode){
			echo $html;
		}
}

function tlp_save_adword($post_id, $post, $update){
	global $post;

	$new_meta_boxes =array(
			"image" => array(
				"name" => "actc_adtc",
				"std" => "",
				"title" => __("Adwords Tracking", ACTC_SLUG),
				"description" => __("Add Your Tracking Code", ACTC_SLUG)
				)
			);

	foreach($new_meta_boxes as $meta_box) {
	// Verify
	if ( !wp_verify_nonce( @$_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
	return $post_id;
	}

	$data = $_POST[$meta_box['name'].'_value'];

	if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
		add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
	elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
		update_post_meta($post_id, $meta_box['name'].'_value', $data);
	elseif($data == "")
		delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
	}
}

add_action('wp_footer','tlp_Adword_Display');
add_action('save_post', 'tlp_save_adword', 10, 3);

add_action( 'plugins_loaded', 'tlp_team_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function tlp_team_load_textdomain() {
  load_plugin_textdomain( ACTC_SLUG, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
