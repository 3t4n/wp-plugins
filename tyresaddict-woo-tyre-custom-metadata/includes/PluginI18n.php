<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    TyresAddict/TCM
 * @subpackage TyresAddict/TCM/includes
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TCM;


class PluginI18n 
{
	static public function textdomains() 
	{   
	    // load WP translations
		load_plugin_textdomain( Plugin::lang, false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' );

	    // merge local translations, WP used first
		load_textdomain( Plugin::lang, WP_PLUGIN_DIR .'/'. dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' . Plugin::lang . '-' . get_locale() . '.mo' );
	}
}
