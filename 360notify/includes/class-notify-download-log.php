<?php
/* This file is forked from the original author Micro Ocean Technologies's MoceanAPI Order SMS Notification plugin on 7/1/2024 */

/**
 * Created by PhpStorm.
 * User: Neoson Lam
 * Date: 4/16/2019
 * Time: 4:30 PM.
 */
class Notify_Download_log implements Notify_Register_Interface {
	protected $log_directory;

	public function __construct() {
		$upload_dir          = wp_upload_dir();
		$this->log_directory = $upload_dir['basedir'] . '/360notify-woocommerce-logs/';
	}

	public function register() {
		add_submenu_page( '360notify', '360notify', '360notify', 'manage_options', 'notifysms-download-file', array( $this, 'download' ) );
	}

	public function download() {
		if (isset($_GET['file'])) {
			global $wp_filesystem;

			if (!function_exists('WP_Filesystem')) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}
			WP_Filesystem();

			$logFile = $this->log_directory . $_GET['file'] . '.log';

			if ($wp_filesystem->exists($logFile)) {
				header('Content-Description: File Transfer');
				header('Content-Type: text/plain');
				header('Content-Disposition: attachment; filename="' . basename($logFile) . '"');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . $wp_filesystem->size($logFile));
				ob_clean();
				flush();
				echo esc_html($wp_filesystem->get_contents($logFile));
			} else {
				wp_redirect(admin_url('options-general.php?page=360notify-woocoommerce-setting'));
				exit;
			}
		}
		exit;
	}

}
