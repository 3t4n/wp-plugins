<?php

namespace QSDarkMode\Base;

class Deactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
		wp_clear_scheduled_hook( 'qs_dark_mode_cron_hook', array() );
	}
}