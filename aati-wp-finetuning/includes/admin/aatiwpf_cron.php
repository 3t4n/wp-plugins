<?php
/*
Plugin Name: Server Cron Status
Description: Checks if there is a server-side cron job for the current WordPress site and displays the status on the plugins page.
*/

function is_shell_exec_enabled() {
    return function_exists('shell_exec');
}

function server_cron_status_admin_notices() {
    $screen = get_current_screen();

    if (current_user_can('manage_options') && $screen->id === 'dashboard') {
        // Code that should only run for admin users on the dashboard page

// to disable shell_exec in php.ini use: disable_functions = shell_exec
// check if shell_exec is available

if (is_shell_exec_enabled()) {
	global $is_server_cron_active;
    // shell_exec available
    $output = shell_exec('crontab -l');
	$php_version_long = phpversion();
	$php_version = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
	$php_bin = PHP_BINDIR . '/php'.$php_version;
    $running_user = posix_getpwuid(posix_geteuid())['name'];
	$wp_cron_path = ABSPATH . 'wp-cron.php';
	$is_server_cron_active = strpos($output, $wp_cron_path) !== false;
if ($is_server_cron_active) {
    // The server-side cron job is active, run this code
	//
	if (!is_disable_wp_cron_active()) {
    // DISABLE_WP_CRON is not defined or not set to true, run this code
		add_action('admin_notices', 'disable_wp_cron_admin_notice');
		enable_disable_wp_cron();
	}

} else {
    // The server-side cron job is not active, run this code
	// set disable cron to false if no server cronjob is active
		disable_disable_wp_cron();
		// display message to add cron
 		$message = sprintf( __('There is no server-side cron job for the WP-cron. To add one, use the following command:<br><code>*/15 * * * * %1$s %2$s</code><br>Make sure to run the cron job as the user <strong>%3$s</strong>.<br>Your server is running PHP version <strong>%4$s</strong>.', AATIWPF_TEXTDOMAIN), $php_bin, $wp_cron_path, $running_user, $php_version_long );

        echo '<div class="notice notice-warning is-dismissible"><p>' . $message . '</p></div>';
		//if disable cron is not active display error
		if (!is_disable_wp_cron_active()) {
			// DISABLE_WP_CRON is not defined or not set to true, run this code
			add_action('admin_notices', 'disable_wp_cron_admin_notice');
		}
}

} else {
	$php_version_long = phpversion();
	$php_version = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
	$php_bin = PHP_BINDIR . '/php'.$php_version;
    $running_user = posix_getpwuid(posix_geteuid())['name'];
	$wp_cron_path = ABSPATH . 'wp-cron.php';
    // NO shell_exec available
    add_action('admin_notices', 'shell_exec_not_available_notice');
	// check if in wp-config 
	if (!is_disable_wp_cron_active()) {
    // DISABLE_WP_CRON is not defined or not set to true, run this code
	add_action('admin_notices', 'disable_wp_cron_admin_notice');
	}
		$message = sprintf( __('There is no server-side cron job for the WP-cron. To add one, use the following command:<br><code>*/15 * * * * %1$s %2$s</code><br>Make sure to run the cron job as the user <strong>%3$s</strong>.<br>Your server is running PHP version <strong>%4$s</strong>.', AATIWPF_TEXTDOMAIN), $php_bin, $wp_cron_path, $running_user, $php_version_long );
        echo '<div class="notice notice-warning is-dismissible"><p>' . $message . '</p></div>';
}
   }
}
add_action('admin_notices', 'server_cron_status_admin_notices');



function shell_exec_not_available_notice() {
    echo '<div class="notice notice-error is-dismissible"><p>shell_exec is not available on your server. This might affect the ability to check the server-side cron status.</p></div>';
}

function is_disable_wp_cron_active() {
    return defined('DISABLE_WP_CRON') && DISABLE_WP_CRON === true;
}

function disable_wp_cron_admin_notice() {
        // DISABLE_WP_CRON is not defined or not set to true, show the admin notice
        echo '<div class="notice notice-warning is-dismissible"><p>DISABLE_WP_CRON is not active.</p></div>';
}

function enable_disable_wp_cron() {
    update_wp_cron_setting(true);
}

function disable_disable_wp_cron() {
    update_wp_cron_setting(false);
}

function update_wp_cron_setting($should_disable_wp_cron) {
    $wp_config_path = ABSPATH . 'wp-config.php';
    if (file_exists($wp_config_path) && is_writable($wp_config_path)) {
        $wp_config_contents = file_get_contents($wp_config_path);

        $pattern = "/(define\s*\(\s*['\"]DISABLE_WP_CRON['\"]\s*,\s*)(false|true)(\s*\))/i";
        $php_opening_tag = "<?php";

        if (preg_match($pattern, $wp_config_contents)) {
            // Replace the existing DISABLE_WP_CRON setting with the appropriate value
            $updated_config = preg_replace($pattern, '${1}' . ($should_disable_wp_cron ? 'true' : 'false') . '${3}', $wp_config_contents);
        } else {
            // Add the DISABLE_WP_CRON setting with the appropriate value after the PHP opening tag
            $lines = explode(PHP_EOL, $wp_config_contents);
            $insert_position = array_search($php_opening_tag, $lines);
            if ($insert_position !== false) {
                array_splice($lines, $insert_position + 1, 0, "define('DISABLE_WP_CRON', " . ($should_disable_wp_cron ? 'true' : 'false') . ");");
                $updated_config = implode(PHP_EOL, $lines);
            } else {
                // In case the PHP opening tag is not found, append to the end of the file
                $updated_config = $wp_config_contents . PHP_EOL . "define('DISABLE_WP_CRON', " . ($should_disable_wp_cron ? 'true' : 'false') . ");" . PHP_EOL;
            }
        }

        file_put_contents($wp_config_path, $updated_config);
    } else {
        // Display an admin notice if the wp-config.php file is not writable
        echo '<div class="notice notice-error is-dismissible"><p>The wp-config.php file is not writable. Please update the DISABLE_WP_CRON setting manually.</p></div>';
    }
}
