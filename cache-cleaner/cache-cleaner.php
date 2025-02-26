<?php
/*
Plugin Name: Cache Cleaner - Scheduled
Author: Lumiverse Dynamic
Author URI: https://lvdynamic.com
Description: Scheduled Cache Clean UP. Keep your Cache Folders Fresh.
Text Domain: cache-cleaner
Version: 1.0.7
License: GPL2
*/

// DO NOT ALLOW DIRECT ACCESS
if ( !defined( 'ABSPATH' ) ) exit;

define( 'WPLOCALSEO_CLEANER_PATH', plugin_dir_path( __FILE__ ) );	// Defining plugin dir path
define( 'WPLOCALSEO_CLEANER_VERSION', 'v1.0.7');						// Defining plugin version
define( 'WPLOCALSEO_CLEANER_NAME', 'Scheduled Cache Cleaner');		// Defining plugin name

/**
 * Create Settings Page
 */

// Create Settings Menu
add_action('admin_menu', 'wplocalseo_cleaner_create_menu');

function wplocalseo_cleaner_create_menu() {

    add_menu_page('Cache Cleaner', 'Cache Cleaner', 'administrator', __FILE__, 'wplocalseo_cleaner_settings_page' , plugins_url('/images/wplocalseo-cleaner.png', __FILE__) );	
	add_action( 'admin_init', 'register_wplocalseo_cleaner_settings' );
	
}

function register_wplocalseo_cleaner_settings() {
	// Register Plugin Settings
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_time' );
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_time_old' );
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_autoptimize' );
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_w3totalcache' );
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_wpsupercache' );
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_wpfastestcache' );
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_cometcache' );
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_cacheenabler' );
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_rocket' );
	// Notifications Settings
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_notify' );
	register_setting( 'wplocalseo_cleaner_settings_group', 'wplocalseo_cleaner_notificationsemail' );
}

function wplocalseo_cleaner_settings_page() {
?>

<div class="wrap" style="padding: 10px;">

<div class="box-region-middle">

<div class="box-wpspgrpro">
<p><img src="<?php echo plugins_url( '/images/banner-772x250.jpg', __FILE__ ); ?>" width="100%" align="center" /></p>
</div>
	<?php
	wp_register_style('wplocalseocleaner', plugins_url('/css/wplocalseo-cleaner.css', __FILE__ ), false, '1.0', 'all');
	wp_print_styles(array('wplocalseocleaner', 'wplocalseocleaner'));
	
	$wplocalseo_cleaner_notificationsemail = get_option( 'wplocalseo_cleaner_notificationsemail' );
	
	?>
<hr/>
<form method="post" action="options.php">
    <?php settings_fields( 'wplocalseo_cleaner_settings_group' ); ?>
    <?php do_settings_sections( 'wplocalseo_cleaner_settings_group' ); ?>
<div class="box-wpspgrpro">
<h3><?php _e('Interval for Scheduled AutoCleaning', 'wplocalseo-cleaner') ?></h3>
<table class="form-table">

<tr>		
<td style="text-align: center;">

			<?php $tcleanercache = get_option( 'wplocalseo_cleaner_time' ); ?>
			<select name="wplocalseo_cleaner_time">
			<option value="1440" <?php if ( $tcleanercache == 1440 ) { ?>selected <?php } ?>>Every Day</option>
			<option value="20160" <?php if ( $tcleanercache == 20160 ) { ?>selected <?php } ?>>Every Week</option>
			<option value="43200" <?php if ( $tcleanercache == 43200 ) { ?>selected <?php } ?>>Every Month</option>
			</select>
			
			
</td>
</tr>
</table>
</div>	
<div class="box-wpspgrpro">
<h3>Cache Clean UP</h3>
<table class="form-table">

<tr>		
<th scope="row" style="width: 40%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: #f4f4f4;">

<div class="switch">
			<input id="wplocalseo_cleaner_autoptimize" name="wplocalseo_cleaner_autoptimize" class="cmn-toggle cmn-toggle-round" type="checkbox" value="1" <?php checked( '1', get_option( 'wplocalseo_cleaner_autoptimize' ) ); ?> />
			<label for="wplocalseo_cleaner_autoptimize"></label>
</div>

<?php _e('Autoptimize', 'wplocalseo-cleaner') ?></th><td>View Plugin Details <a target="_blank" href="https://wordpress.org/plugins/autoptimize/">here</a></td>		
</tr>

<tr>		
<th scope="row" style="width: 40%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: #f4f4f4;">

<div class="switch">
			<input id="wplocalseo_cleaner_w3totalcache" name="wplocalseo_cleaner_w3totalcache" class="cmn-toggle cmn-toggle-round" type="checkbox" value="1" <?php checked( '1', get_option( 'wplocalseo_cleaner_w3totalcache' ) ); ?> />
			<label for="wplocalseo_cleaner_w3totalcache"></label>
</div>

<?php _e('W3 Total Cache', 'wplocalseo-cleaner') ?></th><td>View Plugin Details <a target="_blank" href="https://wordpress.org/plugins/w3-total-cache/">here</a></td>		
</tr>

<tr>		
<th scope="row" style="width: 40%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: #f4f4f4;">

<div class="switch">
			<input id="wplocalseo_cleaner_wpsupercache" name="wplocalseo_cleaner_wpsupercache" class="cmn-toggle cmn-toggle-round" type="checkbox" value="1" <?php checked( '1', get_option( 'wplocalseo_cleaner_wpsupercache' ) ); ?> />
			<label for="wplocalseo_cleaner_wpsupercache"></label>
</div>

<?php _e('WP Super Cache', 'wplocalseo-cleaner') ?></th><td>View Plugin Details <a target="_blank" href="https://wordpress.org/plugins/wp-super-cache/">here</a></td>		
</tr>

<tr>		
<th scope="row" style="width: 40%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: #f4f4f4;">

<div class="switch">
			<input id="wplocalseo_cleaner_wpfastestcache" name="wplocalseo_cleaner_wpfastestcache" class="cmn-toggle cmn-toggle-round" type="checkbox" value="1" <?php checked( '1', get_option( 'wplocalseo_cleaner_wpfastestcache' ) ); ?> />
			<label for="wplocalseo_cleaner_wpfastestcache"></label>
</div>

<?php _e('WP Fastest Cache', 'wplocalseo-cleaner') ?></th><td>View Plugin Details <a target="_blank" href="https://wordpress.org/plugins/wp-fastest-cache/">here</a></td>		
</tr>

<tr>		
<th scope="row" style="width: 40%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: #f4f4f4;">

<div class="switch">
			<input id="wplocalseo_cleaner_cometcache" name="wplocalseo_cleaner_cometcache" class="cmn-toggle cmn-toggle-round" type="checkbox" value="1" <?php checked( '1', get_option( 'wplocalseo_cleaner_cometcache' ) ); ?> />
			<label for="wplocalseo_cleaner_cometcache"></label>
</div>

<?php _e('Comet Cache', 'wplocalseo-cleaner') ?></th><td>View Plugin Details <a target="_blank" href="https://wordpress.org/plugins/comet-cache/">here</a></td>		
</tr>

<tr>		
<th scope="row" style="width: 40%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: #f4f4f4;">

<div class="switch">
			<input id="wplocalseo_cleaner_cacheenabler" name="wplocalseo_cleaner_cacheenabler" class="cmn-toggle cmn-toggle-round" type="checkbox" value="1" <?php checked( '1', get_option( 'wplocalseo_cleaner_cacheenabler' ) ); ?> />
			<label for="wplocalseo_cleaner_cacheenabler"></label>
</div>

<?php _e('Cache Enabler', 'wplocalseo-cleaner') ?></th><td>View Plugin Details <a target="_blank" href="https://wordpress.org/plugins/cache-enabler/">here</a></td>		
</tr>

<tr>		
<th scope="row" style="width: 40%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: #f4f4f4;">

<div class="switch">
			<input id="wplocalseo_cleaner_rocket" name="wplocalseo_cleaner_rocket" class="cmn-toggle cmn-toggle-round" type="checkbox" value="1" <?php checked( '1', get_option( 'wplocalseo_cleaner_rocket' ) ); ?> />
			<label for="wplocalseo_cleaner_rocket"></label>
</div>

<?php _e('WP Rocket', 'wplocalseo-cleaner') ?></th><td>View Plugin Details <a target="_blank" href="https://wp-rocket.me">here</a></td>		
</tr>


</table>		
</div>  

<div class="box-wpspgrpro">
<h3>Email Notification</h3>
<table class="form-table">

<tr>		
<th scope="row" style="width: 40%; border-style: solid; border-width: 0px 0px 1px 0px; border-color: #f4f4f4;">

<div class="switch">
			<input id="wplocalseo_cleaner_notify" name="wplocalseo_cleaner_notify" class="cmn-toggle cmn-toggle-round" type="checkbox" value="1" <?php checked( '1', get_option( 'wplocalseo_cleaner_notify' ) ); ?> />
			<label for="wplocalseo_cleaner_notify"></label>
</div>

<?php _e('Notify by Email', 'wplocalseo-cleaner') ?></th><td><strong>Please Add The Email to Use:</strong> <input type="text" name="wplocalseo_cleaner_notificationsemail" style="width:250px; padding: 5px; horizontal-align: center; margin-top: 0px;" value="<?php echo $wplocalseo_cleaner_notificationsemail; ?>"></td>		
</tr>
</table>
</div>
  
    <?php submit_button(); ?>
</form>
</div>



<div class="box-region-right">

<div class="box-wpspgrpro" style="background-color: #34407d!important;">
<table>
<tr>
<td><h3 style="color: #fff!important;">Do you Like our Plugin?</h3>
<li style="color: #fff!important;">Give Us a <strong style="color: #fff995!important;">5 Star</strong> <a style="color: #fff!important; text-decoration: underline;" target="_blank" href="https://wordpress.org/support/plugin/cache-cleaner/reviews/?rate=5#new-post">Review.</a></li>
</td>
</tr>
</table>
</div>

<div class="box-wpspgrpro" style="background-color: #34407d!important;">
<table>
<tr>
<td><h3 style="color: #fff!important;">WHO WE ARE</h3>
<li style="color: #fff!important;">Our Website:  <a style="color: #fff!important; text-decoration: underline;" target="_blank" href="https://lvdynamic.com">Lumiverse Dynamic</a></li>
</td>
</tr>

<tr>
<td><h3 style="color: #fff!important;">OTHER PLUGINS</h3>
<li style="color: #fff!important;"><a style="color: #fff!important; text-decoration: underline;" target="_blank" href="https://wordpress.org/plugins/wp-speed-grades-pro/">WP Speed Grades</a></li>
<li style="color: #fff!important;"><a style="color: #fff!important; text-decoration: underline;" target="_blank" href="https://wordpress.org/plugins/wpspeed-localbusiness-schema/">JSON-LD Schema</a></li>
</td>
</tr>
</table>
</div>

</div>
</div>
<?php }
 
 
 
// Clean the Cache Directory
function wplocalseo_cleaner_hook_clean_cache() {
	
	$wplocalseo_whatcache = '';
	
	// For Autoptimize Plugin
	$wplocalseo_cleaner_autoptimize = get_option( 'wplocalseo_cleaner_autoptimize' );
	if ( $wplocalseo_cleaner_autoptimize == 1 ) {
	if (class_exists('\autoptimizeCache')) {
            \autoptimizeCache::clearall();
			$wplocalseo_whatcache = 'Autoptimize' . PHP_EOL;
        }
    
	}

    // W3 Total Cache
	$wplocalseo_cleaner_w3totalcache = get_option( 'wplocalseo_cleaner_w3totalcache' );
	if ( $wplocalseo_cleaner_w3totalcache == 1 ) {
     
    if(function_exists('w3tc_flush_all')) {
			w3tc_flush_all ();
			$wplocalseo_whatcache .= 'W3 Total Cache' . PHP_EOL;
	}
	}

	// WP Rocket
	$wplocalseo_cleaner_rocket = get_option( 'wplocalseo_cleaner_rocket' );
	if ( $wplocalseo_cleaner_rocket == 1 ) {
     
    if ( function_exists( 'rocket_clean_domain' ) ) {
			rocket_clean_domain();
	$wplocalseo_whatcache .= 'WP Rocket' . PHP_EOL;
	}
	}
	
	
    // WP Super Cache
	$wplocalseo_cleaner_wpsupercache = get_option( 'wplocalseo_cleaner_wpsupercache' );
	if ( $wplocalseo_cleaner_wpsupercache == 1 ) {
	
	if(function_exists('wp_cache_clean_cache')) {
				wp_cache_clean_cache( $file_prefix, true );
				$wplocalseo_whatcache .= 'WP Super Cache' . PHP_EOL;
	}
    }
	
	// WP Fastest Cache
	$wplocalseo_cleaner_wpfastestcache = get_option( 'wplocalseo_cleaner_wpfastestcache' );
	if ( $wplocalseo_cleaner_wpfastestcache == 1 ) {
	
	if(isset($GLOBALS['wp_fastest_cache']) && method_exists($GLOBALS['wp_fastest_cache'], 'deleteCache')){
	$GLOBALS['wp_fastest_cache']->deleteCache(true);
	$wplocalseo_whatcache .= 'WP Fastest Cache' . PHP_EOL;
	}
    }
	
	// Cache Enabler
	$wplocalseo_cleaner_cacheenabler = get_option( 'wplocalseo_cleaner_cacheenabler' );
	if ( $wplocalseo_cleaner_cacheenabler == 1 ) {
	
	$cache_dir1 = ABSPATH."wp-content";
	$cache_dir1 = $cache_dir1 . '/cache' . '/cache-enabler/';
	if (is_dir($cache_dir1)) {
	foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($cache_dir1, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
        $path->isDir() && !$path->isLink() ? rmdir($path->getPathname()) : unlink($path->getPathname()); }
	//rmdir($cache_dir1);
	$wplocalseo_whatcache .= 'Cache Enabler' . PHP_EOL;
	}
	}
	
	// For Comet Cache Plugin
	$wplocalseo_cleaner_cometcache = get_option( 'wplocalseo_cleaner_cometcache' );
	if ( $wplocalseo_cleaner_cometcache == 1 ) {
	if (class_exists('\comet_cache')) {
            \comet_cache::clear();
        $wplocalseo_whatcache .= 'Comet Cache' . PHP_EOL;
		}
    }
	
	
	// DO WE NEED EMAIL NOTIFICATION?
	
	$wplocalseo_cleaner_notify = get_option( 'wplocalseo_cleaner_notify' );
	$the_email = get_option( 'wplocalseo_cleaner_notificationsemail' );
	if ( $the_email == '' ) $the_email = get_option( 'admin_email' );
	// Let's Notify
	$the_url = get_option( 'siteurl' );
	// Send to Site Admin Notification
			if ( $wplocalseo_cleaner_notify ) {
			$subject  = 'CACHE CLEANER: Notification';
			$message  = 'Hello,' . PHP_EOL . PHP_EOL;
			$message .= 'This is a notification that Cache WAS CLEANED on your website: ' . $the_url . PHP_EOL . PHP_EOL;
			$message .= 'Report: What was Cleaned ' . PHP_EOL;
			$message .= '-------------------------------' . PHP_EOL;
			$message .= $wplocalseo_whatcache . PHP_EOL . PHP_EOL;
			$message .= '-' . PHP_EOL;
			$message .= 'Kind Regards' . PHP_EOL;
			
			$message .= 'Scheduled Cache Cleaner. Cool Right?' . PHP_EOL;
			$message .= '-----------------------------------------------------' . PHP_EOL . PHP_EOL;
			$message .= 'Hosting - Speed Optimization - Local SEO - Web Design - ReDesign' . PHP_EOL;
			$message .= 'WORDPRESS IS IN OUR DNA : https://lvdynamic.com' . PHP_EOL;
			$headers  = 'From: '. $the_email . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			mail($the_email, $subject, $message, $headers);	
			}
}	

// Declare Some New Cron Intervals
function wplocalseo_cleaner_cron_intervals( $schedules ) {
 
    $schedules['every_three_minutes'] = array(
            'interval'  => 60*3,
            'display'   => __( 'Every 3 Minutes', 'wplocalseo-cleaner' )
    );
	
	$schedules['every_five_minutes'] = array(
            'interval'  => 60*5,
            'display'   => __( 'Every 5 Minutes', 'wplocalseo-cleaner' )
    );
	
	$schedules['every_two_hours'] = array(
            'interval'  => 60*60*2,
            'display'   => __( 'Every 2 Hours', 'wplocalseo-cleaner' )
    );
 
    $schedules['every_four_hours'] = array(
            'interval'  => 60*60*4,
            'display'   => __( 'Every 4 Hours', 'wplocalseo-cleaner' )
    );  
	
	$schedules['every_six_hours'] = array(
            'interval'  => 60*60*6,
            'display'   => __( 'Every 6 Hours', 'wplocalseo-cleaner' )
    );
	
	$schedules['every_ten_hours'] = array(
            'interval'  => 60*60*10,
            'display'   => __( 'Every 10 Hours', 'wplocalseo-cleaner' )
    );
	
	$schedules['every_fifteen_hours'] = array(
            'interval'  => 60*60*15,
            'display'   => __( 'Every 15 Hours', 'wplocalseo-cleaner' )
    );
	
	$schedules['every_twentyfour_hours'] = array(
            'interval'  => 60*60*24,
            'display'   => __( 'Every 24 Hours', 'wplocalseo-cleaner' )
    );
	
	$schedules['every_twodays'] = array(
            'interval'  => 60*60*48,
            'display'   => __( 'Every 48 Hours', 'wplocalseo-cleaner' )
    );
	
	$schedules['weekly'] = array(
            'interval'  => 604800,
            'display'   => __( 'Every Week', 'wplocalseo-cleaner' )
    );
	
	$schedules['monthly'] = array(
            'interval'  => 2635200,
            'display'   => __( 'Every Month', 'wplocalseo-cleaner' )
    );
     
    return $schedules;
}

// Let's Activate our Intervals
add_filter( 'cron_schedules', 'wplocalseo_cleaner_cron_intervals' );

// Check if we need to ReSchedule 
$tcleanercache = get_option( 'wplocalseo_cleaner_time' );
$tcleanercache_old = get_option( 'wplocalseo_cleaner_time_old' ); 

if ( ( wp_next_scheduled( 'wplocalseo_cleaner_clean_all_cache' ) ) AND ( $tcleanercache != $tcleanercache_old ) ) {
	wp_clear_scheduled_hook( 'wplocalseo_cleaner_clean_all_cache' );
	
}	


if ( ! wp_next_scheduled( 'wplocalseo_cleaner_clean_all_cache' ) ) {
	
	// For debug only
	//wp_schedule_event( time(), 'every_three_minutes', 'wplocalseo_cleaner_clean_all_cache' );
	
	if ( $tcleanercache == 1440 )	wp_schedule_event( time(), 'daily', 'wplocalseo_cleaner_clean_all_cache' );
	//else if ( $tcleanercache == 2880 )	wp_schedule_event( time(), 'twodays', 'wplocalseo_cleaner_clean_all_cache' );
	else if ( $tcleanercache == 20160 )	wp_schedule_event( time(), 'weekly', 'wplocalseo_cleaner_clean_all_cache' );
	else if ( $tcleanercache == 43200 )	wp_schedule_event( time(), 'monthly', 'wplocalseo_cleaner_clean_all_cache' );
	update_option( 'wplocalseo_cleaner_time_old', $tcleanercache );
}

add_action('wplocalseo_cleaner_clean_all_cache', 'wplocalseo_cleaner_cache_schedule',10 ,0);

function wplocalseo_cleaner_cache_schedule () {
			// Let's Clean 
			wplocalseo_cleaner_hook_clean_cache();
}

function wplocalseo_cleaner_activation() {
	update_option( 'wplocalseo_cleaner_time',20160 );
	update_option( 'wplocalseo_cleaner_time_old',20160 );
	update_option( 'wplocalseo_cleaner_autoptimize',0 );
	update_option( 'wplocalseo_cleaner_w3totalcache',0 );
	update_option( 'wplocalseo_cleaner_wpsupercache',0 );
	update_option( 'wplocalseo_cleaner_wpfastestcache',0 );
	update_option( 'wplocalseo_cleaner_cometcache',0 );
	update_option( 'wplocalseo_cleaner_cacheenabler',0 );
	update_option( 'wplocalseo_cleaner_rocket',0 );
	update_option( 'wplocalseo_cleaner_notify',0 );
	update_option( 'wplocalseo_cleaner_notificationsemail','' );
}


function wplocalseo_cleaner_deactivation() {
	delete_option('wplocalseo_cleaner_time' );
	delete_option('wplocalseo_cleaner_time_old' );
	delete_option('wplocalseo_cleaner_autoptimize' );
	delete_option('wplocalseo_cleaner_w3totalcache' );
	delete_option('wplocalseo_cleaner_wpsupercache' );
	delete_option('wplocalseo_cleaner_wpfastestcache' );
	delete_option('wplocalseo_cleaner_cometcache' );
	delete_option('wplocalseo_cleaner_cacheenabler' );
	delete_option('wplocalseo_cleaner_rocket' );
	delete_option('wplocalseo_cleaner_notify' );
	delete_option('wplocalseo_cleaner_notificationsemail' );
	
	wp_clear_scheduled_hook( 'wplocalseo_cleaner_clean_all_cache' );
}

// Our Hooks
register_activation_hook(__FILE__, 'wplocalseo_cleaner_activation');
register_deactivation_hook(__FILE__, 'wplocalseo_cleaner_deactivation');