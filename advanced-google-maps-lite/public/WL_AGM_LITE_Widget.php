<?php
defined('ABSPATH') or die();

require_once(WL_AGM_LITE_PLUGIN_DIR_PATH . 'public/widgets/WL_AGM_LITE_MAP_Widget.php');

class WL_AGM_LITE_Widget {
	public static function register_widgets() {
		/* Registor google map widget */
		register_widget('WL_AGM_LITE_MAP_Widget');
	}
}
