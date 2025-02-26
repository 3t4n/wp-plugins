<?php

/*
Akari Worker is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.
 
Akari is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Akari Worker. If not, see https://www.gnu.org/licenses/gpl-3.0.html.

All Akari plugin images / logos are copyrighted by Akari AS.
*/

/*
 * Plugin Name:     Akari Worker
 * Description:     Required functions for this website. Do not deactivate unless you are certain.
 * Version:         3.1.0
 * Requires PHP:    7.4
 * Author:          Akari AS
 * Author URI:      https://www.akari.no
 * License:         GPL v3 or later
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
*/

define("AKARI_WORKER_VER", "3.1.0");

require_once(__DIR__ . "/inc/admin-page.php");
require_once(__DIR__ . "/inc/page-meta.php");
require_once(__DIR__ . "/inc/admin-notice.php");

if (!defined("ABSPATH")) {
	exit();
}

class AkariWorker {
	public const MB_TO_BYTES = 1024 * 1024;
	public const BYTES_TO_MB = 1 / self::MB_TO_BYTES;

	public $max_upload_size_mb;
	public $available_storage_mb;

	function __construct(int $available_storage_mb = 10_000, $max_upload_size_mb = 20) {
		$this->available_storage_mb = get_option("akari_worker_available_storage", $available_storage_mb);
		$this->max_upload_size_mb = get_option("akari_worker_max_upload_size", $max_upload_size_mb);

		/* Admin Panel */
		add_action("load-index.php", fn() => add_action("admin_notices", [$this, "adminNotice"]));
		add_action("admin_head", [$this, "adminStyle"]);
		add_filter("upload_size_limit", fn() => get_option("akari_worker_max_upload_size", $max_upload_size_mb) * pow(1024, 2));
		add_action("admin_init", [$this, "customScheme"]);
		add_filter("wp_handle_upload_prefilter", [$this, "handleUploadPrefilter"], 10, 1);

		/* Login Page */
		add_action("login_enqueue_scripts", [$this, "loginStyle"]);
		add_filter("login_headerurl", fn() => "https://akari.no");

		/* Other */
		add_shortcode("year", fn() => date("Y"));
		add_filter("auto_plugin_update_send_email", "__return_false");
		add_filter("xmlrpc_enabled", "__return_false");

		$this->loadPageMeta();

		if (is_admin()) {
			$admin_page = new AkariWorker\Inc\AdminPage();
		}
	}

	public function loginStyle() {
		wp_enqueue_style("akari-login-style", plugins_url("assets/css/login-style.css", __FILE__), [], AKARI_WORKER_VER);
	}

	public function adminStyle() {
		wp_enqueue_style("akari-admin-style", plugins_url("assets/css/admin-style.css", __FILE__), [], AKARI_WORKER_VER);
	}

	public function adminNotice() {
		$adminNotice = new AkariWorker\Inc\AdminNotice($this->available_storage_mb, round($this->calcSpaceUsed() * self::BYTES_TO_MB));
		$adminNotice->render();
	}

	public function calcSpaceUsed() {
		require_once(ABSPATH . "wp-admin/includes/class-wp-debug-data.php");
		return WP_Debug_Data::get_sizes()["total_size"]["raw"];
	}

	public function loadPageMeta() {
		$page_additions = new AkariWorker\Inc\PageMeta();
	}

	public function handleUploadPrefilter($file) {
		if ($file["size"] > $this->max_upload_size_mb * self::MB_TO_BYTES) {
			$file["error"] = sprintf(__("ERROR: File size is limited to %d MB."), $this->max_upload_size_mb);
		} else if ($this->calcSpaceUsed() >= $this->available_storage_mb * self::MB_TO_BYTES) {
			$file["error"] = sprintf(__("ERROR: Du har brukt opp tilgjengelig lagringsplass på %d MB."), $this->available_storage_mb);
		}

		return $file;
	}

	public function customScheme() {
		wp_admin_css_color("akari_scheme", __("Akari"), plugins_url("assets/css/akari-scheme.css", __FILE__),
			array("#2c3e50", "#34495e", "#ecf0f1", "#16a085"));
	}
}

add_action("init", function() {
	$akari_worker = new AkariWorker();
});
