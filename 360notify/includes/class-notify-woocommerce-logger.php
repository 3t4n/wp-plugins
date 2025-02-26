<?php
/* This file is forked from the original author Micro Ocean Technologies's MoceanAPI Order SMS Notification plugin on 7/1/2024 */

class Notify_WooCoommerce_Logger {

	private $_handles;
	private $log_directory;
    
	public function __construct() {
		$upload_dir          = wp_upload_dir();
		$this->log_directory = $upload_dir['basedir'] . '/360notify-woocommerce-logs/';
        global $wp_filesystem;
        if (!function_exists('WP_Filesystem')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }
        WP_Filesystem();
        if ( ! $wp_filesystem->exists( $this->log_directory ) ) {
		    $wp_filesystem->mkdir( $this->log_directory, 0700 );
        }
	}

	private function open($handle) {
		global $wp_filesystem;

		if (!function_exists('WP_Filesystem')) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}
		WP_Filesystem();

		if (isset($this->_handles[$handle])) {
			return true;
		}

		$file_path = $this->log_directory . $handle . '.log';

		if (!$wp_filesystem->exists($file_path)) {
			$wp_filesystem->put_contents($file_path, '', FS_CHMOD_FILE);
		}

		if ($wp_filesystem->is_writable($file_path)) {
			$this->_handles[$handle] = $wp_filesystem->get_contents($file_path);
			return true;
		}

		return false;
	}

public function add($handle, $message) {
    if (notifysms_get_options('export_notifysms_log', 'notifysms_setting', 'off') == 'on') {
        global $wp_filesystem;

        if (!function_exists('WP_Filesystem')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }
        WP_Filesystem();

        $current_datetime = gmdate('Y-m-d H:i:s');
        $file_path = $this->log_directory . $handle . '.log';
        $log_message = "$current_datetime $message\n";

        $existing_content = '';
        if ($wp_filesystem->exists($file_path)) {
            $existing_content = $wp_filesystem->get_contents($file_path);
        }

        $new_content = $existing_content . $log_message;

        if ($wp_filesystem->put_contents($file_path, $new_content)) {
            return true;
        } else {
            $this->log->add("360MessengerWhatsApp", "Failed to write to log file: $file_path");
        }
    }

    return false;
}


    public function get_log_file($handle)
    {
        $log_file = $this->log_directory . "{$handle}.log"; //The log file.
        global $wp_filesystem;
        if (!function_exists('WP_Filesystem')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }
        WP_Filesystem();
        if($wp_filesystem->exists($log_file)){
            return $wp_filesystem->get_contents($log_file);
        }
    }

    public function get_log_file_path($handle)
    {
        return $this->log_directory . "{$handle}.log";
    }
}

?>
