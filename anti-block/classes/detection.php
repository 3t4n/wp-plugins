<?php

class detect_ad_block {

	private $settings = array();

	public function __construct() {
		$this->settings = get_option('anti_block_settings');
	}

	public function mark_as_read() {
		$_SESSION['has_read'] = 1;
		return true;
	}

	private function show_popup() {
		if (isset($_SESSION['has_read']) && $this->settings['do_not_nag'] == 1) {
			return false;
		}
		return true;
	}

	public function detect() {

		if (!empty($this->settings)) { //make sure the settings are there
			if ($this->show_popup()) {
				


				$title = htmlentities($this->settings['title'], ENT_QUOTES);
				$message = nl2br(htmlentities($this->settings['message'], ENT_QUOTES));
				$yes = htmlentities($this->settings['okay_btn'], ENT_QUOTES);
				$no = htmlentities($this->settings['no_btn'], ENT_QUOTES);

				include WP_PLUGIN_DIR . '/anti-block/popup.php';
			}
		}
	}

}
