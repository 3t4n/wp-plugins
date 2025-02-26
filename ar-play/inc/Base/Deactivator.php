<?php

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Arplay
 * @author     Arty <office@at-ty.com>
 */

namespace IncArplay\Base;

class Deactivator
{

	public static function deactivate() {

	    flush_rewrite_rules();
	}

}
