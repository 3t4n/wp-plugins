<?php
/*
Plugin Name: Animated Pinterset "Pin It" Button for Images
Plugin URI: http://PinItButton.com/
Description: Add a Animated Pinterest "Pin It" Button to your images.
Author: Plamen Marinov
Version: 1.0
Author URI: http://PinItButton.com/
*/

//Set default options
function ptmbg_pitbtn_set_default_options() {
    $defaults = array(
		'on_home'                 => '1',
		'on_front'                => '1',
		'on_page'                 => '1',
		'on_post'                 => '1',
		'on_category'             => '1',
		'on_archive'              => '1',
		'on_blog'                 => '1'
	);
	return $defaults;
}
// SET plugin
function ptmbg_pitbtn_set_plugin() {
    if (get_option('ptmbg_pitbtn_options')==false) {
       add_option('ptmbg_pitbtn_options', ptmbg_pitbtn_set_default_options() );
    }
}
// SET default options
register_activation_hook( __FILE__, 'ptmbg_pitbtn_set_plugin' );
add_action( 'plugins_loaded', 'ptmbg_pitbtn_set_plugin' );

function ptmbg_pitbtn_menu_options() {
     add_options_page('Animated Pinterset "Pin It" Button for Images', 'Animated Pinterset "Pin It" Button for Images!', 'manage_options', 'ptmbg_pitbtn_settings', 'ptmbg_pitbtn_admin_options_page');
}

function ptmbg_pitbtn_plugin_settings_filter( $links ) {
	$settings_link = '<a href="options-general.php?page=ptmbg_pitbtn_settings">' . __( 'Settings', 'manage_options' ) . '</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

$ptmbg_pitbtn_plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$ptmbg_pitbtn_plugin", 'ptmbg_pitbtn_plugin_settings_filter' );

// Load the Admin Options page
if (is_admin()){
    add_action('admin_menu', 'ptmbg_pitbtn_menu_options');
    add_action('admin_init', 'ptmbg_pitbtn_admin_init');

} else {
    add_action('wp_footer'      , 'ptmbg_pitbtn_add_footer_script');
}

function ptmbg_pitbtn_admin_init() {
   register_setting('ptmbg_pitbtn_options','ptmbg_pitbtn_options','ptmbg_pitbtn_options_validate');
}

function ptmbg_pitbtn_admin_options_page() {
    $options = get_option('ptmbg_pitbtn_options');
?>
    <h2>Animated Pinterset "Pin It" Button for Images</h2>
    <div><b>You can visit <a href="http://pinitbutton.com">PinItButton.com</a>, register as free and see all features.</b></div><br>
    <p class="description">Check on which pages you want the Pinterest button to show up.<br>Uncheck all if you'd like the "Pin it" button to not show.</p>
    <form action="options.php" method="post">
    <?php
    settings_fields('ptmbg_pitbtn_options');
    ?>
    <table class="table_clean" cellpadding="0" cellspacing="0">
    <tr><td style="vertical-align:top">
	<input type="checkbox" id="on_home" name="ptmbg_pitbtn_options[on_home]" <?php checked( true, $options['on_home'] ); ?> value="1" />
	<label for="on_home">Home page</label><br/>
	<input type="checkbox" id="on_front" name="ptmbg_pitbtn_options[on_front]" <?php checked( true, $options['on_front'] ); ?> value="1" />
	<label for="on_front">Front page</label><br/>
	<input type="checkbox" id="on_page" name="ptmbg_pitbtn_options[on_page]" <?php checked( true, $options['on_page'] ); ?> value="1" />
	<label for="on_page">Individual Pages</label><br/>
	<input type="checkbox" id="on_post" name="ptmbg_pitbtn_options[on_post]" <?php checked( true, $options['on_post'] ); ?> value="1" />
	<label for="on_post">Individual posts</label><br/>
	<input type="checkbox" id="on_category" name="ptmbg_pitbtn_options[on_category]" <?php checked( true, $options['on_category'] ); ?> value="1" />
	<label for="on_category">Category pages</label><br/>
	<input type="checkbox" id="on_archive" name="ptmbg_pitbtn_options[on_archive]" <?php checked( true, $options['on_archive'] ); ?> value="1" />
	<label for="on_archive">Archive pages</label><br/>
	<input type="checkbox" id="on_blog" name="ptmbg_pitbtn_options[on_blog]" <?php checked( true, $options['on_blog'] ); ?> value="1" />
	<label for="on_blog">Search pages</label><br/>
	</td><tr></table>

        <?php
			submit_button();
       ?>

        </form>
<?php
}

function ptmbg_pitbtn_options_validate($input) {
    return $input;
}

function ptmbg_pitbtn_check_page() {
   $options = get_option('ptmbg_pitbtn_options');
   if (isset( $options['on_home'] ) && $options['on_home'] == "1" && is_home()) {
      return true;
   } else if (isset( $options['on_front'] ) && $options['on_front'] == "1" && is_front_page()) {
      return true;
   } else if (isset( $options['on_page'] ) && $options['on_page'] == "1" && is_page()) {
      return true;
   } else if (isset( $options['on_post'] ) && $options['on_post'] == "1" && is_single()) {
      return true;
   } else if (isset( $options['on_category'] ) && $options['on_category'] == "1" && is_category()) {
      return true;
   } else if (isset( $options['on_archive'] ) && $options['on_archive'] == "1" && is_archive()) {
      return true;
   } else if (isset( $options['on_search'] ) && $options['on_search'] == "1" && is_search()) {
      return true;
   }
   return false;
}

function ptmbg_pitbtn_add_footer_script() {
   if (ptmbg_pitbtn_check_page()) {
      wp_enqueue_script('jquery');
      wp_enqueue_script('jquery-ui-core');
      wp_enqueue_script('jquery-effects-core');
      wp_enqueue_script('jquery-effects-blind');
      wp_enqueue_script('jquery-effects-bounce');
      wp_enqueue_script('jquery-effects-clip');
      wp_enqueue_script('jquery-effects-drop');
      wp_enqueue_script('jquery-effects-explode');
      wp_enqueue_script('jquery-effects-fade');
      wp_enqueue_script('jquery-effects-fold');
      wp_enqueue_script('jquery-effects-highlight');
      wp_enqueue_script('jquery-effects-pulsate');
      wp_enqueue_script('jquery-effects-scale');
      wp_enqueue_script('jquery-effects-shake');
      wp_enqueue_script('jquery-effects-slide');
      wp_enqueue_script('jquery-effects-transfer');
      wp_enqueue_script('ptmbg-pitbtn-script', 'https://pinitbutton.webwapstudio.com/lite/lite.js', array(), '1.0', true );
   }
}

