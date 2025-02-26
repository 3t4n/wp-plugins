<?php
/*
Plugin Name: Bileta nga autobus.al
Plugin URI: https://wordpress.org/plugins/bileta-nga-autobus-al
Description: Implementimi i motorrit te kerkimit per bileta nderkombetare autobusi nga Sistemi i Biletimit Elektronik www.autobus.al. Ju duhet te jeni pjese e sistemit autobus.al dhe te keni te aktivizuar opsionin e implementimit qe me pas te vini ne funksion kete plugin.
Author: autobus.al shpk
Author URI: https://www.autobus.al/
Version: 1.0.1
Text Domain: autobusal
Domain Path: /languages
License: GPL2
*/

defined( 'ABSPATH' ) or die( 'Are you serious? Not allowed this way!' );


// Per te shtuar funksionin ne head te wordpress
// END - Per te shtuar funksionin ne head te wordpress

/***********************************************************/
// Shtojme opsionet ne admin
// Register the menu.
add_action( "admin_menu", "autobusal_plugin_menu_func" );
function autobusal_plugin_menu_func() {
   add_menu_page( 
                  "Bileta nga autobus.al",            // Page title
                  "autobus.al",            // Menu title
                  "manage_options",       // Minimum capability (manage_options is an easy way to target administrators)
                  "autobusal",            // Menu slug
                  "autobusal_settings_page",     // Callback that prints the markup
	   				plugins_url( 'autobusal/imazhet/autobusal22c.png' ), // ikona para emertimit ne menu
	   				59 // renditja ne menu
               );
}

// Regjistrimi i settings
add_action( 'admin_init', 'autobusal' );

function autobusal() {
	register_setting( 'autobusal-settings-group', 'autobusal_gjuha' );
	register_setting( 'autobusal-settings-group', 'autobusal_appid' );
	register_setting( 'autobusal-settings-group', 'autobusal_appsecret' );
	// Settings per desing
	register_setting( 'autobusal-settings-group', 'autobusal_dsg_bgcolor' );
}
// END - Regjistrimi i settings


// Shfaqja grafike e settings ne admin
function autobusal_settings_page() {
?>
<div class="wrap">
<h2><?php _e( 'autobus.al Bus Ticketing Search Engine Settings', 'autobusal' ) ?></h2>
	<div class="card" style="float: left; margin-right: 30px; width: 50%;">
<form method="post" action="options.php">
    <?php settings_fields( 'autobusal-settings-group' ); ?>
    <?php do_settings_sections( 'autobusal-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row" style="width: 300px;"><?php _e( 'Search Engine Language', 'autobusal' ) ?></th>
        <td>
			<select name="autobusal_gjuha" id="autobusal_gjuha">
				<option value="en" <?php if (esc_attr( get_option('autobusal_gjuha') ) && esc_attr( get_option('autobusal_gjuha') )=='en') { echo 'selected="selected"';};?> ><?php _e( 'English', 'autobusal' ) ?></option>
				<option value="sq" <?php if (esc_attr( get_option('autobusal_gjuha') ) && esc_attr( get_option('autobusal_gjuha') )=='sq') { echo 'selected="selected"';};?>><?php _e( 'Albanian', 'autobusal' ) ?></option>
			</select>
			</td>
        </tr>
         
        <tr valign="top">
        <th scope="row" style="width: 300px;"><?php _e( 'Search Engine appID', 'autobusal' ) ?></th>
        <td><input type="text" name="autobusal_appid" value="<?php echo esc_attr( get_option('autobusal_appid') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row" style="width: 300px;"><?php _e( 'Search Engine appSecret', 'autobusal' ) ?></th>
        <td><input type="text" name="autobusal_appsecret" value="<?php echo esc_attr( get_option('autobusal_appsecret') ); ?>" /></td>
        </tr>
    </table>
	<hr />
	<h3><?php _e( 'Search Form Design', 'autobusal' ) ?></h3>
	<table class="form-table">
		<tr valign="top">
			<th scope="row" style="width: 300px;"><?php _e( 'Background Color', 'autobusal' ) ?> </th>
			<td><input type="text" name="autobusal_dsg_bgcolor" value="<?php echo esc_attr( get_option('autobusal_dsg_bgcolor') ); ?>" placeholder="#FFFFFF" /></td>
		</tr>

	</table>
	<?php submit_button(); ?>
</form>
	</div>
	
	<div class="card" style="float: left; margin-right: 30px; width: 40%;">
		
		<h3> <?php _e( 'How to use it', 'autobusal' ) ?></h3>		
	<p>
		<?php _e( 'This plugin uses shortcode syntax to load the search engine. Please, place the below shortcode where do you want the seach engine to show. We recommend to be placed in a page and not in sidebars, since it needs at least 1000px to show up correctly on big screens.', 'autobusal' ) ?>
	</p>
	<p> Shortcode: <strong>[ autobusal_motorri ]</strong> </p>
		
	<p> <br /></p>
	<hr />
		<p> <a href="https://www.autobus.al/?utm_source=<?php echo site_url();?>&utm_medium=logo-settings&utm_campaign=wp-plugin" target="_blank"><img src="<?php echo plugins_url( 'autobusal/imazhet/logo-zeze.png' );?>" alt="<?php _e( 'Online Bus Ticketing System in Albania - autobus.al', 'autobusal' ) ?>" title="<?php _e( 'Online Bus Ticketing System in Albania - autobus.al', 'autobusal' ) ?>" width="100%"> </a> </p>
	<hr />
		<h3> <?php _e( 'About autobus.al', 'autobusal' ) ?></h3>
		<p><?php _e( 'Online Bus Ticketing System autobus.al is the only system in Albania that can provide online bus tickets for international routes from Albania to Italy, Germany, Greece, Turkey, Bulgaria, North Macedonia and Kosovo, and vice-versa. The company "autobus.al shpk" based in Tirana, Albania is operating from June 2017 and is an online exclusive company.', 'autobusal' ) ?> </p>
		<p><?php _e( 'If you have an account to www.autobus.al and want to integrate the autobus.al\'s Bus Tickets Search Engine, please, <a href="https://www.autobus.al/contact?utm_source=wp-plugin&utm_medium=contactus-settings&utm_campaign=wp-plugin" target="_blank">contact our staff</a> and we will activate that service for you.', 'autobusal' ) ?> </p>
		<hr />
		<h4> <a href="https://www.autobus.al/account/login?utm_source=<?php echo site_url();?>&utm_medium=login-settings&utm_campaign=wp-plugin" target="_blank"><?php _e( 'Login to your autobus.al account', 'autobusal' ) ?></a> <strong>|</strong> <a href="https://www.autobus.al/become_agent?utm_source=<?php echo site_url();?>&utm_medium=register-settings&utm_campaign=wp-plugin" target="_blank"><?php _e( 'Don\'t have an account? Register now!', 'autobusal' ) ?></a></h4>
		
	</div>
	
</div>

<?php
}

// END - Shfaqja grafike e settings ne admin

// Krijimi Shortcode
function autobusal_shfaq_mottorin( $atts ) {
	if ( is_front_page() ){
 ?>
   <div class="autobusal-form">
   		<div id="offers" class="autobusal-form-dsg"></div>
	   <div class="autobusal-signature"> <div class="autobusal-providedby"><?php _e( 'This is a service provided by ', 'autobusal' ) ?> </div> <a href="https://www.autobus.al/?utm_source=<?php echo site_url();?>&utm_medium=logo-search-front&utm_campaign=wp-plugin" target="_blank" alt="<?php _e( 'Online Bus Ticketing System in Albania - autobus.al', 'autobusal' ) ?>"><img src="<?php echo plugins_url( 'autobusal/imazhet/logo-zeze-vogel.png' );?>" alt="<?php _e( 'Online Bus Ticketing System in Albania - autobus.al', 'autobusal' ) ?>" title="<?php _e( 'Online Bus Ticketing System in Albania - autobus.al', 'autobusal' ) ?>"> </a>
	</div>
 <?php
	//echo get_option('autobusal_gjuha');
	}
}
// END - Krijimi Shortcode

// Shtimi i scriptit async te autobus.al ne header ne wp
function autobusal_async_script(){
	// Nese gjuha zgjedhur eshte anglisht
	if (esc_attr( get_option('autobusal_gjuha') ) && esc_attr( get_option('autobusal_gjuha') )=='en') { 
  ?>
	<script async="async" src="https://www.autobus.al/en/obtSDK.js?appId=<?php echo get_option('autobusal_appid');?>&appsecret=<?php echo get_option('autobusal_appsecret');?>"></script>
  <?php
	} // Fundi nese gjuha zgjedhur eshte anglisht
	// nese gjuha zgjedhur eshte tjeter, jo anglisht	
	else {
		?>
	<script async="async" src="https://www.autobus.al/obtSDK.js?appId=<?php echo get_option('autobusal_appid');?>&appsecret=<?php echo get_option('autobusal_appsecret');?>"></script>
  <?php	
		}// Fundi nese gjuha zgjedhur eshte tjeter, jo anglisht
}
// END - Shtimi i scriptit async te autobus.al ne header ne wp

// Shtimi i css te autobus.al ne header ne wp
function autobusal_css(){
	echo "	<link rel='stylesheet' id='autobusal-searchform'  href='".plugins_url( 'autobusal/autobusal.css' )."' media='all' />";
?>
<style>
	/* Stili formularit te motorrit te kerkimi */
	<?php if (esc_attr( get_option('autobusal_dsg_bgcolor'))) { echo '.autobusal-form{background:'.esc_attr( get_option('autobusal_dsg_bgcolor')).'}';};?>
	
</style>
<?php
}
// END - Shtimi i css te autobus.al ne header ne wp

// Verifikojme nese eshte load jquery apo jo
function load_jquery() {
    if ( ! wp_script_is( 'jquery', 'enqueued' )) { // Nese nuk eshte load
       //Enqueue
        wp_enqueue_script( 'jquery' ); //Atehere load
    }
}


function autobusal_init() {
  load_plugin_textdomain( 'autobusal', false, 'autobusal/languages' );
}
add_action('init', 'autobusal_init');

// HOOKS ============= 
add_shortcode( "autobusal_motorri", "autobusal_shfaq_mottorin" ); // Shortcode
add_action( 'wp_enqueue_scripts', 'load_jquery' ); // Per te load jquery nese nuk eshte tashme load
add_action( 'wp_print_styles', 'autobusal_css', 1 ); // Shton scriptin ne head
add_action( 'wp_head', 'autobusal_async_script', 98 ); // Shton scriptin ne head
