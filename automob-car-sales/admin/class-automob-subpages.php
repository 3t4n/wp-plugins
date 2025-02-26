<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       automob.co.za
 * @since      1.0.0
 *
 * @package    Automob
 * @subpackage Automob/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Automob
 * @subpackage Automob/admin
 * @author     Luke Madzedze <lukemadzedze@gmail.com>
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class AutomobSubPages {

	public function settings()
	{
		ob_start(); 
			$template_loader  = new AutomobTemplateManager(); 
			$template_loader->get_template_part( 'admin/page-settings' );
			$contents = ob_get_contents();
		ob_end_clean();
		echo $contents;
	}

}
