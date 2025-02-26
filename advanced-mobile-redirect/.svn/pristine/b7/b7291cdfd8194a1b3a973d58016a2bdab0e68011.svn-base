<?php
/*
Plugin Name: Advanced Mobile Redirect
Description: Select a URL to redirect mobile users by device type
Author: Slimspots
Version: 1.2
Author URI: http://www.slimspots.net
 */

/*

Plugin based on a previous basic version of the Mobile Redirect Ozette Plugins (email : plugins@ozette.com)

 */


require_once("libs/amr-general.inc.php");
require_once("libs/geoip.inc.php");

$ios_mobile_redirect = new IOS_Mobile_Redirect();
$geo_ip = new GeoIP();

register_uninstall_hook( __FILE__, 'uninstall_mobile_redirect' );
function uninstall_mobile_redirect() {
    delete_option( 'iphone_redirect_url' );
    delete_option( 'iphone_redirect_country' );
    delete_option( 'iphone_redirect_mode' );
    delete_option( 'iphone_redirect_home' );
    delete_option( 'iphone_redirect_toggle' );

    delete_option( 'ipad_redirect_url' );
    delete_option( 'ipad_redirect_country' );    
    delete_option( 'ipad_redirect_mode' );
    delete_option( 'ipad_redirect_home' );
    delete_option( 'ipad_redirect_toggle' );

    delete_option( 'android_redirect_url' );
    delete_option( 'android_redirect_country' );    
    delete_option( 'android_redirect_mode' );
    delete_option( 'android_redirect_home' );
    delete_option( 'android_redirect_toggle' );

    delete_option( 'blackberry_redirect_url' );
    delete_option( 'blackberry_redirect_country' );        
    delete_option( 'blackberry_redirect_mode' );
    delete_option( 'blackberry_redirect_home' );
    delete_option( 'blackberry_redirect_toggle' );

    delete_option( 'windowsm_redirect_url' );
    delete_option( 'windowsm_redirect_country' );        
    delete_option( 'windowsm_redirect_mode' );
    delete_option( 'windowsm_redirect_home' );
    delete_option( 'windowsm_redirect_toggle' );

    delete_option( 'opera_redirect_url' );
    delete_option( 'opera_redirect_country' );        
    delete_option( 'opera_redirect_mode' );
    delete_option( 'opera_redirect_home' );
    delete_option( 'opera_redirect_toggle' );

    delete_option( 'palm_redirect_url' );
    delete_option( 'palm_redirect_country' );            
    delete_option( 'palm_redirect_mode' );
    delete_option( 'palm_redirect_home' );
    delete_option( 'palm_redirect_toggle' );

    delete_option( 'other_redirect_url' );
    delete_option( 'other_redirect_country' );            
    delete_option( 'other_redirect_mode' );
    delete_option( 'other_redirect_home' );
    delete_option( 'other_redirect_toggle' );

}

class IOS_Mobile_Redirect{

    function __construct() {
        //init function
	add_action( 'admin_init', array( &$this, 'admin_init' ) );
	add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
	add_action( 'template_redirect', array( &$this, 'template_redirect' ) ); //fix from amclin

        update_option( 'mobileredirecttoggle', true );
        /* if ( get_option( 'mobileredirecttoggle' ) == 'true' ){
	update_option( 'mobileredirecttoggle', true );
        } */
    }

    function admin_init() {
	add_filter( 'plugin_action_links_'. plugin_basename( __FILE__ ), array( &$this, 'plugin_action_links' ), 10, 4 );
    }

    function plugin_action_links( $actions, $plugin_file, $plugin_data, $context ) {
	if ( is_plugin_active( $plugin_file ) )
	    $actions[] = '<a href="' . admin_url('options-general.php?page=advanced-mobile-redirect/advanced-mobile-redirect.php') . '">Configure</a>';
	return $actions;
    }

    function admin_menu() {
	add_submenu_page( 'options-general.php', __( 'Advanced Mobile Redirect', 'mobile-redirect' ), __( 'Advanced Mobile Redirect', 'mobile-redirect' ), 'administrator', __FILE__, array( &$this, 'page' ) );
    }

    function page() {

        global $geo_ip;
        
        //admin options page
	if ( isset( $_POST['iphone_redirect_url'] ) ) {
            // urls
            update_option( 'iphone_redirect_url', esc_url_raw( $_POST['iphone_redirect_url'] ) );
            update_option( 'ipad_redirect_url', esc_url_raw( $_POST['ipad_redirect_url'] ) );
            update_option( 'android_redirect_url', esc_url_raw( $_POST['android_redirect_url'] ) );
            update_option( 'blackberry_redirect_url', esc_url_raw( $_POST['blackberry_redirect_url'] ) );
            update_option( 'windowsm_redirect_url', esc_url_raw( $_POST['windowsm_redirect_url'] ) );
            update_option( 'opera_redirect_url', esc_url_raw( $_POST['opera_redirect_url'] ) );
            update_option( 'palm_redirect_url', esc_url_raw( $_POST['palm_redirect_url'] ) );
            update_option( 'other_redirect_url', esc_url_raw( $_POST['other_redirect_url'] ) );


            // countries
            update_option( 'iphone_redirect_country', esc_attr( $_POST['iphone_redirect_country'] ) );
            update_option( 'ipad_redirect_country', esc_attr( $_POST['ipad_redirect_country'] ) );
            update_option( 'android_redirect_country', esc_attr( $_POST['android_redirect_country'] ) );
            update_option( 'blackberry_redirect_country', esc_attr( $_POST['blackberry_redirect_country'] ) );
            update_option( 'windowsm_redirect_country', esc_attr( $_POST['windowsm_redirect_country'] ) );
            update_option( 'opera_redirect_country', esc_attr( $_POST['opera_redirect_country'] ) );
            update_option( 'palm_redirect_country', esc_attr( $_POST['palm_redirect_country'] ) );
            update_option( 'other_redirect_country', esc_attr( $_POST['other_redirect_country'] ) );
            

            // redirect modes
            update_option( 'iphone_redirect_mode', intval( $_POST['iphone_redirect_mode'] ) );
            update_option( 'ipad_redirect_mode', intval( $_POST['ipad_redirect_mode'] ) );
            update_option( 'android_redirect_mode', intval( $_POST['android_redirect_mode'] ) );
            update_option( 'blackberry_redirect_mode', intval( $_POST['blackberry_redirect_mode'] ) );
            update_option( 'windowsm_redirect_mode', intval( $_POST['windowsm_redirect_mode'] ) );
            update_option( 'opera_redirect_mode', intval( $_POST['opera_redirect_mode'] ) );
            update_option( 'palm_redirect_mode', intval( $_POST['palm_redirect_mode'] ) );
            update_option( 'other_redirect_mode', intval( $_POST['other_redirect_mode'] ) );

            // redirect home
            update_option( 'iphone_redirect_home', isset( $_POST['iphone_redirect_home'] ) );
            update_option( 'ipad_redirect_home', isset( $_POST['ipad_redirect_home'] ) );
            update_option( 'android_redirect_home', isset( $_POST['android_redirect_home'] ) );
            update_option( 'blackberry_redirect_home', isset( $_POST['blackberry_redirect_home'] ) );
            update_option( 'windowsm_redirect_home', isset( $_POST['windowsm_redirect_home'] ) );
            update_option( 'opera_redirect_home', isset( $_POST['opera_redirect_home'] ) );
            update_option( 'palm_redirect_home', isset( $_POST['palm_redirect_home'] ) );
            update_option( 'other_redirect_home', isset( $_POST['other_redirect_home'] ) );

            // toggles
            update_option( 'iphone_redirect_toggle', isset( $_POST['iphone_redirect_toggle'] ) ? true : false );
            update_option( 'ipad_redirect_toggle', isset( $_POST['ipad_redirect_toggle'] ) ? true : false );
            update_option( 'android_redirect_toggle', isset( $_POST['android_redirect_toggle'] ) ? true : false );
            update_option( 'blackberry_redirect_toggle', isset( $_POST['blackberry_redirect_toggle'] ) ? true : false );
            update_option( 'windowsm_redirect_toggle', isset( $_POST['windowsm_redirect_toggle'] ) ? true : false );
            update_option( 'opera_redirect_toggle', isset( $_POST['opera_redirect_toggle'] ) ? true : false );
            update_option( 'palm_redirect_toggle', isset( $_POST['palm_redirect_toggle'] ) ? true : false );
            update_option( 'other_redirect_toggle', isset( $_POST['other_redirect_toggle'] ) ? true : false );


	    echo '<div class="updated"><p>' . __( 'Updated', 'mobile-redirect' ) . '</p></div>';
	}
                                                    
?>
<style type="text/css">
 .amr_country_sel{
     /*max-width:120px;*/
     font-weight:bold;
 }
</style>
<div class="wrap"><h2><?php _e( 'Advanced Mobile Redirect', 'mobile-redirect' ); ?></h2>
<p><a href="http://www.slimspots.net"><img src="http://slimspots.org/adview.gif"></a></p>
    <p>
	<?php _e( 'If the Enable checkbox is checked, and a valid URL is inputted, this site will redirect to the specified URL when visited by the selected mobile device.', 'mobile-redirect' ); ?>
    </p>

    <form method="post">

        <table class="wp-list-table  fixed bookmarks">
            <thead>
                <tr>
                    <th style="text-align:left;">Select Device for Redirect</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>

                        <table class="form-table">
                            <tbody>

                                <tr valign="top">
                                    <th scope="row">&nbsp;</th>
                                    <th scope="row" style="padding-left:10px;width:120px;">Country</th>
                                    <th scope="row" style="padding-left:10px;">Redirect URL</th>
                                    <th scope="row" style="padding-left:10px;" width="100">Redirect Mode</th>
                                    <th scope="row">&nbsp;</th>
                                    <th scope="row">&nbsp;</th>
                                </tr>


                                <tr valign="top">
                                    <th scope="row">iPhone/iPod Touch:</th>
                                    <td>
                                        <select class="amr_country_sel" id="iphone_redirect_country" name="iphone_redirect_country">
                                            <?php
                                            foreach ($geo_ip->GEOIP_COUNTRY_NAMES as $aK => $s_country){
                                                echo "<option value='".$geo_ip->GEOIP_COUNTRY_CODES[$aK]."' ".(get_option('iphone_redirect_country') == $geo_ip->GEOIP_COUNTRY_CODES[$aK] ? "selected='selected'" : "").">".(empty($s_country) ? "ALL" : $s_country)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="iphone_redirect_url" id="iphone_redirect_url" value="<?php echo esc_url( get_option('iphone_redirect_url', '') ); ?>" />
                                    </td>
                                    <td>
	                                <select id="iphone_redirect_mode" name="iphone_redirect_mode">
		                            <option value="301" <?php selected( get_option('iphone_redirect_mode', 301 ), 301 ); ?>>301</option>
		                            <option value="302" <?php selected( get_option('iphone_redirect_mode'), 302 ); ?>>302</option>
	                                </select>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="iphone_redirect_home" id="iphone_redirect_home" <?php checked( get_option('iphone_redirect_home', ''), 1 ); ?> />
	                                <label for="iphone_redirect_home" style="font-size:11px;"><?php _e( ' Only Redirect Homepage', 'mobile-home' ); ?>
	                                </label>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="iphone_redirect_toggle" id="iphone_redirect_toggle" <?php checked( get_option('iphone_redirect_toggle', ''), 1 ); ?> />
	                                <label for="iphone_redirect_toggle" style="font-size:11px;"><?php _e( ' Enable Redirect', 'mobile-redirect' ); ?></label>
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th scope="row">iPad</th>
                                    <td>
                                        <select class="amr_country_sel" id="ipad_redirect_country" name="ipad_redirect_country">
                                            <?php
                                            foreach ($geo_ip->GEOIP_COUNTRY_NAMES as $aK => $s_country){
                                                echo "<option value='".$geo_ip->GEOIP_COUNTRY_CODES[$aK]."' ".(get_option('ipad_redirect_country') == $geo_ip->GEOIP_COUNTRY_CODES[$aK] ? "selected='selected'" : "").">".(empty($s_country) ? "ALL" : $s_country)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>                                    
                                    <td>
                                        <input type="text" name="ipad_redirect_url" id="ipad_redirect_url" value="<?php echo esc_url( get_option('ipad_redirect_url', '') ); ?>" />
                                    </td>
                                    <td>
	                                <select id="ipad_redirect_mode" name="ipad_redirect_mode">
		                            <option value="301" <?php selected( get_option('ipad_redirect_mode', 301 ), 301 ); ?>>301</option>
		                            <option value="302" <?php selected( get_option('ipad_redirect_mode'), 302 ); ?>>302</option>
	                                </select>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="ipad_redirect_home" id="ipad_redirect_home" <?php checked( get_option('ipad_redirect_home', ''), 1 ); ?> />
	                                <label for="ipad_redirect_home" style="font-size:11px;"><?php _e( ' Only Redirect Homepage', 'mobile-home' ); ?>
	                                </label>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="ipad_redirect_toggle" id="ipad_redirect_toggle" <?php checked( get_option('ipad_redirect_toggle', ''), 1 ); ?> />
	                                <label for="ipad_redirect_toggle" style="font-size:11px;"><?php _e( ' Enable Redirect', 'mobile-redirect' ); ?></label>
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th scope="row">Android</th>
                                    <td>
                                        <select class="amr_country_sel" id="android_redirect_country" name="android_redirect_country">
                                            <?php
                                            foreach ($geo_ip->GEOIP_COUNTRY_NAMES as $aK => $s_country){
                                                echo "<option value='".$geo_ip->GEOIP_COUNTRY_CODES[$aK]."' ".(get_option('android_redirect_country') == $geo_ip->GEOIP_COUNTRY_CODES[$aK] ? "selected='selected'" : "").">".(empty($s_country) ? "ALL" : $s_country)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="android_redirect_url" id="android_redirect_url" value="<?php echo esc_url( get_option('android_redirect_url', '') ); ?>" />
                                    </td>
                                    <td>
	                                <select id="android_redirect_mode" name="android_redirect_mode">
		                            <option value="301" <?php selected( get_option('android_redirect_mode', 301 ), 301 ); ?>>301</option>
		                            <option value="302" <?php selected( get_option('android_redirect_mode'), 302 ); ?>>302</option>
	                                </select>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="android_redirect_home" id="android_redirect_home" <?php checked( get_option('android_redirect_home', ''), 1 ); ?> />
	                                <label for="android_redirect_home" style="font-size:11px;"><?php _e( ' Only Redirect Homepage', 'mobile-home' ); ?>
	                                </label>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="android_redirect_toggle" id="android_redirect_toggle" <?php checked( get_option('android_redirect_toggle', ''), 1 ); ?> />
	                                <label for="android_redirect_toggle" style="font-size:11px;"><?php _e( ' Enable Redirect', 'mobile-redirect' ); ?></label>
                                    </td>
                                </tr>

		                <tr valign="top">
                                    <th scope="row">Blackberry</th>
                                    <td>
                                        <select class="amr_country_sel" id="blackberry_redirect_country" name="blackberry_redirect_country">
                                            <?php
                                            foreach ($geo_ip->GEOIP_COUNTRY_NAMES as $aK => $s_country){
                                                echo "<option value='".$geo_ip->GEOIP_COUNTRY_CODES[$aK]."' ".(get_option('blackberry_redirect_country') == $geo_ip->GEOIP_COUNTRY_CODES[$aK] ? "selected='selected'" : "").">".(empty($s_country) ? "ALL" : $s_country)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="blackberry_redirect_url" id="blackberry_redirect_url" value="<?php echo esc_url( get_option('blackberry_redirect_url', '') ); ?>" />
                                    </td>
                                    <td>
	                                <select id="blackberry_redirect_mode" name="blackberry_redirect_mode">
		                            <option value="301" <?php selected( get_option('blackberry_redirect_mode', 301 ), 301 ); ?>>301</option>
		                            <option value="302" <?php selected( get_option('blackberry_redirect_mode'), 302 ); ?>>302</option>
	                                </select>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="blackberry_redirect_home" id="blackberry_redirect_home" <?php checked( get_option('blackberry_redirect_home', ''), 1 ); ?> />
	                                <label for="android_redirect_home" style="font-size:11px;"><?php _e( ' Only Redirect Homepage', 'mobile-home' ); ?>
	                                </label>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="blackberry_redirect_toggle" id="blackberry_redirect_toggle" <?php checked( get_option('blackberry_redirect_toggle', ''), 1 ); ?> />
	                                <label for="blackberry_redirect_toggle" style="font-size:11px;"><?php _e( ' Enable Redirect', 'mobile-redirect' ); ?></label>
                                    </td>
                                </tr>


                                <tr valign="top">
                                    <th scope="row">Windows Mobile</th>
                                    <td>
                                        <select class="amr_country_sel" id="windowsm_redirect_country" name="windowsm_redirect_country">
                                            <?php
                                            foreach ($geo_ip->GEOIP_COUNTRY_NAMES as $aK => $s_country){
                                                echo "<option value='".$geo_ip->GEOIP_COUNTRY_CODES[$aK]."' ".(get_option('windowsm_redirect_country') == $geo_ip->GEOIP_COUNTRY_CODES[$aK] ? "selected='selected'" : "").">".(empty($s_country) ? "ALL" : $s_country)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>                                    
                                    <td>
                                        <input type="text" name="windowsm_redirect_url" id="windowsm_redirect_url" value="<?php echo esc_url( get_option('windowsm_redirect_url', '') ); ?>" />
                                    </td>
                                    <td>
	                                <select id="windowsm_redirect_mode" name="windowsm_redirect_mode">
		                            <option value="301" <?php selected( get_option('windowsm_redirect_mode', 301 ), 301 ); ?>>301</option>
		                            <option value="302" <?php selected( get_option('windowsm_redirect_mode'), 302 ); ?>>302</option>
	                                </select>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="windowsm_redirect_home" id="windowsm_redirect_home" <?php checked( get_option('windowsm_redirect_home', ''), 1 ); ?> />
	                                <label for="windowsm_redirect_home" style="font-size:11px;"><?php _e( ' Only Redirect Homepage', 'mobile-home' ); ?>
	                                </label>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="windowsm_redirect_toggle" id="windowsm_redirect_toggle" <?php checked( get_option('windowsm_redirect_toggle', ''), 1 ); ?> />
	                                <label for="windowsm_redirect_toggle" style="font-size:11px;"><?php _e( ' Enable Redirect', 'mobile-redirect' ); ?></label>
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th scope="row">Opera Mini</th>
                                    <td>
                                        <select class="amr_country_sel" id="opera_redirect_country" name="opera_redirect_country">
                                            <?php
                                            foreach ($geo_ip->GEOIP_COUNTRY_NAMES as $aK => $s_country){
                                                echo "<option value='".$geo_ip->GEOIP_COUNTRY_CODES[$aK]."' ".(get_option('opera_redirect_country') == $geo_ip->GEOIP_COUNTRY_CODES[$aK] ? "selected='selected'" : "").">".(empty($s_country) ? "ALL" : $s_country)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>                                    
                                    <td>
                                        <input type="text" name="opera_redirect_url" id="opera_redirect_url" value="<?php echo esc_url( get_option('opera_redirect_url', '') ); ?>" />
                                    </td>
                                    <td>
	                                <select id="opera_redirect_mode" name="opera_redirect_mode">
		                            <option value="301" <?php selected( get_option('opera_redirect_mode', 301 ), 301 ); ?>>301</option>
		                            <option value="302" <?php selected( get_option('opera_redirect_mode'), 302 ); ?>>302</option>
	                                </select>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="opera_redirect_home" id="opera_redirect_home" <?php checked( get_option('opera_redirect_home', ''), 1 ); ?> />
	                                <label for="opera_redirect_home" style="font-size:11px;"><?php _e( ' Only Redirect Homepage', 'mobile-home' ); ?>
	                                </label>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="opera_redirect_toggle" id="opera_redirect_toggle" <?php checked( get_option('opera_redirect_toggle', ''), 1 ); ?> />
	                                <label for="opera_redirect_toggle" style="font-size:11px;"><?php _e( ' Enable Redirect', 'mobile-redirect' ); ?></label>
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th scope="row">Palm Os</th>
                                    <td>
                                        <select class="amr_country_sel" id="palm_redirect_country" name="palm_redirect_country">
                                            <?php
                                            foreach ($geo_ip->GEOIP_COUNTRY_NAMES as $aK => $s_country){
                                                echo "<option value='".$geo_ip->GEOIP_COUNTRY_CODES[$aK]."' ".(get_option('palm_redirect_country') == $geo_ip->GEOIP_COUNTRY_CODES[$aK] ? "selected='selected'" : "").">".(empty($s_country) ? "ALL" : $s_country)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>                            
                                    <td>
                                        <input type="text" name="palm_redirect_url" id="palm_redirect_url" value="<?php echo esc_url( get_option('palm_redirect_url', '') ); ?>" />
                                    </td>
                                    <td>
	                                <select id="palm_redirect_mode" name="palm_redirect_mode">
		                            <option value="301" <?php selected( get_option('palm_redirect_mode', 301 ), 301 ); ?>>301</option>
		                            <option value="302" <?php selected( get_option('palm_redirect_mode'), 302 ); ?>>302</option>
	                                </select>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="palm_redirect_home" id="palm_redirect_home" <?php checked( get_option('palm_redirect_home', ''), 1 ); ?> />
	                                <label for="palm_redirect_home" style="font-size:11px;"><?php _e( ' Only Redirect Homepage', 'mobile-home' ); ?>
	                                </label>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="palm_redirect_toggle" id="palm_redirect_toggle" <?php checked( get_option('palm_redirect_toggle', ''), 1 ); ?> />
	                                <label for="palm_redirect_toggle" style="font-size:11px;"><?php _e( ' Enable Redirect', 'mobile-redirect' ); ?></label>
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <th scope="row">Other Mobile Device</th>
                                    <td>
                                        <select class="amr_country_sel" id="other_redirect_country" name="other_redirect_country">
                                            <?php
                                            foreach ($geo_ip->GEOIP_COUNTRY_NAMES as $aK => $s_country){
                                                echo "<option value='".$geo_ip->GEOIP_COUNTRY_CODES[$aK]."' ".(get_option('other_redirect_country') == $geo_ip->GEOIP_COUNTRY_CODES[$aK] ? "selected='selected'" : "").">".(empty($s_country) ? "ALL" : $s_country)."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>                                    
                                    <td>
                                        <input type="text" name="other_redirect_url" id="other_redirect_url" value="<?php echo esc_url( get_option('other_redirect_url', '') ); ?>" />
                                    </td>
                                    <td>
	                                <select id="other_redirect_mode" name="other_redirect_mode">
		                            <option value="301" <?php selected( get_option('other_redirect_mode', 301 ), 301 ); ?>>301</option>
		                            <option value="302" <?php selected( get_option('other_redirect_mode'), 302 ); ?>>302</option>
	                                </select>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="other_redirect_home" id="other_redirect_home" <?php checked( get_option('other_redirect_home', ''), 1 ); ?> />
	                                <label for="other_redirect_home" style="font-size:11px;"><?php _e( ' Only Redirect Homepage', 'mobile-home' ); ?>
	                                </label>
                                    </td>
                                    <td>
	                                <input type="checkbox" value="1" name="other_redirect_toggle" id="other_redirect_toggle" <?php checked( get_option('other_redirect_toggle', ''), 1 ); ?> />
	                                <label for="other_redirect_toggle" style="font-size:11px;"><?php _e( ' Enable Redirect', 'mobile-redirect' ); ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Back to full version website</th>
                                    <td>
                                        <div style="background:#408CEA;color:#FFFFFF;font-weight:bold;min-height:21px;padding:3px 5px;width:338px;">
                                            <?php echo site_url()."/?main=true"; ?>
                                        </div>
                                        <p class="description">Place this link in mobile website for Redirect back mobile visitor to main website</p>
                                    </td>
                                </tr>
		                <tr valign="top">
                                    <th scope="row"><?php submit_button(); ?></th>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<div class="copyFooter">Converting Desktop and Mobile Traffic with <a href="http://www.slimspots.net">Slimspots - CPA Network</a>.</div>
<?php
}


function template_redirect() {

    require_once("libs/Mobile_Detect.php");
    $detect = new Mobile_Detect;
    $cur_url = esc_url("http://". $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] );
    
    
    
    // do stuff only if its mobile and session for main site is not set
    if ($detect->isMobile() || $detect->isTablet() && !isset($_SESSION['amr_main'])){

        // check if any of the options is toogled
        if (amr_is_anything_toggled() == true){

            $amr_redirect_options = Array('url'=>'', 'mode'=>'302', 'only_home'=>'0');

            // check for iphone
            if (get_option( 'iphone_redirect_toggle' ) == '1' && $detect->isiPhone() ){
                $amr_redirect_options = Array(
                    'url'=> get_option( 'iphone_redirect_url' ),
                    'country'=> get_option( 'iphone_redirect_country' ),
                    'mode'=>get_option( 'iphone_redirect_mode' ),
                    'only_home'=>get_option( 'iphone_redirect_home' )
                );
            }
            // check for ipad
            if (get_option( 'ipad_redirect_toggle' ) == '1' && $detect->isiPad() ){
                $amr_redirect_options = Array(
                    'url'=> get_option( 'ipad_redirect_url' ),
                    'country'=> get_option( 'ipad_redirect_country' ),                    
                    'mode'=>get_option( 'ipad_redirect_mode' ),
                    'only_home'=>get_option( 'ipad_redirect_home' )
                );
            }
            // check for android
            if (get_option( 'android_redirect_toggle' ) == '1' && $detect->isAndroidOS() ){
                $amr_redirect_options = Array(
                    'url'=> get_option( 'android_redirect_url' ),
                    'country'=> get_option( 'android_redirect_country' ),                    
                    'mode'=>get_option( 'android_redirect_mode' ),
                    'only_home'=>get_option( 'android_redirect_home' )
                );
            }            
            // check for blackberry
            if (get_option( 'blackberry_redirect_toggle' ) == '1' && $detect->isBlackBerryOS() ){
                $amr_redirect_options = Array(
                    'url'=> get_option( 'blackberry_redirect_url' ),
                    'country'=> get_option( 'blackberry_redirect_country' ),                                        
                    'mode'=>get_option( 'blackberry_redirect_mode' ),
                    'only_home'=>get_option( 'blackberry_redirect_home' )
                );
            }            
            // check for windows mobile
            if (get_option( 'windowsm_redirect_toggle' ) == '1' && $detect->isWindowsMobileOS() ){
                $amr_redirect_options = Array(
                    'url'=> get_option( 'windowsm_redirect_url' ),
                    'country'=> get_option( 'windowsm_redirect_country' ),                                                            
                    'mode'=>get_option( 'windowsm_redirect_mode' ),
                    'only_home'=>get_option( 'windowsm_redirect_home' )
                );
            }            
            // check for opera
            if (get_option( 'opera_redirect_toggle' ) == '1' && $detect->isOpera() ){
                $amr_redirect_options = Array(
                    'url'=> get_option( 'opera_redirect_url' ),
                    'country'=> get_option( 'opera_redirect_country' ),                    
                    'mode'=>get_option( 'opera_redirect_mode' ),
                    'only_home'=>get_option( 'opera_redirect_home' )
                );
            }
            // check for palm
            if (get_option( 'palm_redirect_toggle' ) == '1' && $detect->isPalmOS() ){
                $amr_redirect_options = Array(
                    'url'=> get_option( 'palm_redirect_url' ),
                    'country'=> get_option( 'palm_redirect_country' ),                                        
                    'mode'=>get_option( 'palm_redirect_mode' ),
                    'only_home'=>get_option( 'palm_redirect_home' )
                );
            }
            // check for other type of mobile device
            if (get_option( 'other_redirect_toggle' ) == '1' &&  ($detect->isMobile() || $detect->isTablet())  ){
                $amr_redirect_options = Array(
                    'url'=> get_option( 'other_redirect_url' ),
                    'country'=> get_option( 'other_redirect_country' ),                                                            
                    'mode'=>get_option( 'other_redirect_mode' ),
                    'only_home'=>get_option( 'other_redirect_home' )
                );
            }            

            
            // if empty url then exit
            if ( empty( $amr_redirect_options['url'] ) ) return;


            // at this point an option is toogled and the url to redirect is not empty


            // check for the Only home option
            if( $amr_redirect_options['home'] == '1'){
	        if( ! is_front_page() )	return;
            }



            

            // FINAL STEP
            // make sure we don't redirect to ourself
            if ( $amr_redirect_options['url'] != $cur_url ) {

                $do_redirect_country = false;
                // check country code
                if (!empty($amr_redirect_options['country'])){
                    $gi = geoip_open(plugin_dir_path(__FILE__)."libs/GeoIP.dat",GEOIP_STANDARD);
                    $country_code = geoip_country_code_by_addr($gi, $_SERVER['REMOTE_ADDR']);
                    if ($country_code == $amr_redirect_options['country']){
                        $do_redirect_country = true;
                    }
                    geoip_close($gi);
                }else{
                    // if not sent then redirect ALL countries
                    $do_redirect_country = true;
                }

                
                // if country do not match then do not redirect
                if (!$do_redirect_country) return;
                
                header("Cache-Control: max-age=0, no-cache, no-store, must-revalidate");
                wp_redirect( $amr_redirect_options['url'], $amr_redirect_options['mode'] );
                exit;
            }                    
            
        }

    }else{
        // die("SESSION DONE;".$_SESSION['amr_main']);
    }

}

}

/**
 * Start session
 */
function amr_start_session(){
    if(!session_id()) {
        session_start();
    }
    if (isset($_REQUEST["main"])){
        amr_session_set();
    }
}
/**
 * End session
 */
function amr_end_session(){
    session_destroy();    
}
/**
 * Set main site session
 */
function amr_session_set(){
    if (!isset($_SESSION['amr_main'])) $_SESSION['amr_main'] = 1;
}
add_action('init', 'amr_start_session', 1);
add_action('wp_logout', 'amr_end_session');
add_action('wp_login', 'amr_end_session');
// eof
