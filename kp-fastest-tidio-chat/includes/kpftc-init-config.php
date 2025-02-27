<?php


// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}


// Register Settings Menu
function kpftc_register_settings_menu()
{
    add_options_page('KP Fastest Tidio Chat', 'KP Fastest Tidio Chat', 'manage_options', 'kpftc', 'kpftc_settings_page');
}
add_action('admin_menu', 'kpftc_register_settings_menu');


// Set Default Config on Plugin Activation
function kpftc_set_default_config() {

    if (KPFTC_VERSION !== get_option('KPFTC_VERSION')) {
		
		$kpftc_chat_link = "//code.tidio.co/xwbyttpq6abupb9ctmutbsvnbvy8bxh4.js";

		if (get_option('kpftc_chat_enabled') === false)
            update_option('kpftc_chat_enabled', "yes");
        if (get_option('kpftc_chat_link') === false)
            update_option('kpftc_chat_link', $kpftc_chat_link);
		if (get_option('kpftc_delay_time') === false)
            update_option('kpftc_delay_time', 10000);
		if (get_option('kpftc_excluded_pages') === false)
			update_option('kpftc_excluded_pages', '0');
		if (get_option('kpftc_admin_disabled') === false)
            update_option('kpftc_admin_disabled', "no");

        update_option('KPFTC_VERSION', KPFTC_VERSION);
    }
}
add_action('plugins_loaded', 'kpftc_set_default_config');


//Set Transients on Plugin Activation
function kpftc_admin_notice_transient()
{
    set_transient( 'kpftc-admin-notice-activation', true, 60*60*24 );
	/*set_transient( 'kpftc-admin-notice-reminder', true, 60*60*24*7 );*/
}


//Display Message on Plugin Activation
function kpftc_admin_notice_activation()
{
    if( get_transient('kpftc-admin-notice-activation') )
	{
    ?>
		<div class="updated notice is-dismissible kpftc-activate">
            <p>Thank you for using <strong>KP Fastest Tidio Chat</strong> plugin! If you like our plugin, please provide us your feedback <a href="https://wordpress.org/support/plugin/kp-fastest-tidio-chat/reviews/#new-post" target="_blank" style="font-size:14px;"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></a> on WordPress.org</p>
        </div>
        <?php
	delete_transient( 'kpftc-admin-notice-activation' );
    }
}
add_action( 'admin_notices', 'kpftc_admin_notice_activation' );

/*
//Display Review Reminder Message After One Week
function kpftc_admin_notice_reminder()
{
	$reminder_expire = (int) get_option( '_transient_timeout_kpftc-admin-notice-reminder', 0 );
	
    if( $reminder_expire < 600000 )
	{
        ?>
        <div class="updated notice is-dismissible kpftc-reminder">
            <p>Thank you for using <strong>KP Fastest Tidio Chat</strong> plugin for more than a week! If you like our plugin, please provide us your feedback <a href="https://wordpress.org/support/plugin/kp-fastest-tidio-chat/reviews/#new-post" target="_blank" style="font-size:14px;"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></a> on WordPress.org</p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'kpftc_admin_notice_reminder' );
*/

//Delete Plugin Settings Upon Plugin Deletion
function kpftc_delete_settings()
{
	delete_option('kpftc_chat_enabled');
    delete_option('kpftc_chat_link');
	delete_option('kpftc_delay_time');
	delete_option('kpftc_excluded_pages');
	delete_option('kpftc_admin_disabled');
	delete_option('KPFTC_VERSION');
	/*delete_transient('kpftc-admin-notice-activation');
	delete_transient('kpftc-admin-notice-reminder');*/
}

/*
//Delete Transients if Dismissed
function kpftc_delete_transients()
{
	if($_REQUEST['kpnotice'] == 'kpftc-activate')
		delete_transient( 'kpftc-admin-notice-activation' );
	
	if($_REQUEST['kpnotice'] == 'kpftc-reminder')
		delete_transient( 'kpftc-admin-notice-reminder' );
}
add_action("wp_ajax_kpftc_delete_transients", "kpftc_delete_transients");
*/