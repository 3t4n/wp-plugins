<?php
/**
 * Plugin Name: Shift8 Facebook Feed
 * Plugin URI: https://github.com/stardothosting/shift8-fbfeed
 * Description: This plugin easily integrates your Facebook page's feed into your site
 * Version: 1.0.3
 * Author: Shift8 Web 
 * Author URI: https://www.shift8web.ca
 * License: GPLv3
 */

// Require facebook php library
require_once plugin_dir_path( __FILE__ ) . 'facebook/facebook.php';

// create custom plugin settings menu
add_action('admin_menu', 'shift8_fbfeed_create_menu');

function shift8_fbfeed_create_menu() {
	//create new top-level menu
	if ( empty ( $GLOBALS['admin_page_hooks']['shift8-settings'] ) ) {
		add_menu_page('Shift8 Settings', 'Shift8', 'administrator', 'shift8-settings', 'shift8_main_page' , 'dashicons-building' );
	}
	add_submenu_page('shift8-settings', 'Shift8 Settings', 'Facebook Feed Settings', 'manage_options', __FILE__.'/custom', 'shift8_fbfeed_settings_page');
	//call register settings function
	add_action( 'admin_init', 'register_shift8_fbfeed_settings' );
}


function register_shift8_fbfeed_settings() {
	//register our settings
	register_setting( 'shift8-fbfeed-settings-group', 'fb_app_id' );
	register_setting( 'shift8-fbfeed-settings-group', 'fb_app_secret' );
	register_setting( 'shift8-fbfeed-settings-group', 'fb_page_name' );
}

// Admin welcome page
if (!function_exists('shift8_main_page')) {
	function shift8_main_page() {
	?>
	<div class="wrap">
	<h2>Shift8 Plugins</h2>
	Shift8 is a Toronto based web development and design company. We specialize in Wordpress development and love to contribute back to the Wordpress community whenever we can! You can see more about us by visiting <a href="https://www.shift8web.ca" target="_new">our website</a>.
	</div>
	<?php
	}
}


// Admin settings page
function shift8_fbfeed_settings_page() {
?>
<div class="wrap">
<h2>Shift8 Facebook Feed</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'shift8-fbfeed-settings-group' ); ?>
    <?php do_settings_sections( 'shift8-fbfeed-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Facebook App ID</th>
        <td><input type="text" name="fb_app_id" value="<?php echo esc_attr( get_option('fb_app_id') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Facebook App Secret</th>
        <td><input type="text" name="fb_app_secret" value="<?php echo esc_attr( get_option('fb_app_secret') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Facebook Page Name</th>
        <td><input type="text" name="fb_page_name" value="<?php echo esc_attr( get_option('fb_page_name') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php 
}

function shift8_getfb($atts) {
	extract(shortcode_atts(array(
		'number' => '5'
	), $atts));

	// connect to app
	$config = array();
	$config['appId'] = esc_attr( get_option('fb_app_id') );
	$config['secret'] = esc_attr( get_option('fb_app_secret') );
	$config['fileUpload'] = false; // optional
	// instantiate
	$facebook = new Facebook($config);

	$feed = $facebook->api('/'.esc_attr( get_option('fb_page_name') ).'/feed');
	$out = '<div class="frontfb-container">';
	$i = 0;
	$outmsg = array();
	$outimg = array();
	if (count($feed["data"]) >= $number) {
		for ($i=0;$i<$number;$i++) {
			if (!empty($feed['data'][$i]['picture'])) {
				$out_img = '<a href="'.$feed['data'][$i]['link'].'" target="_new"><img src="'.$feed['data'][$i]['picture'] .'" class="frontfb-image"></a>';
			} else {
				$out_img = '';
			}
			$out .= '<div class="frontfb-item"><div class="one-third first">'.$out_img.'</div><div class="one-half">'. make_clickable($feed['data'][$i]['message']) . '</div></div>';
		}
	} else {
		for ($i=0;$i<count($feed["data"]);$i++) {
                        if (!empty($feed['data'][$i]['picture'])) {
                                $out_img = '<a href="'.$feed['data'][$i]['link'].'" target="_new"><img src="'.$feed['data'][$i]['picture'] .'" class="frontfb-image"></a>';
                        } else {
                                $out_img = '';
                        }
			$out .= '<div class="frontfb-item"><div class="one-third first">'.$out_img.'</div><div class="one-half">'. make_clickable($feed['data'][$i]['message']) . '</div></div>';
		}
	}
	$out .= '</div>';
	return $out;
}

add_shortcode('shift8_fb', 'shift8_getfb');
