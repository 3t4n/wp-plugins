<?php
defined('ABSPATH') or die();

class WL_AGM_LITE_Language {
	public static function load_translation() {
		load_plugin_textdomain(WL_AGM_LITE_DOMAIN, false, basename(WL_AGM_LITE_PLUGIN_DIR_PATH) . '/lang');
	}
}
