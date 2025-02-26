<?php
/**
 * @author            Kona Macphee <kona@fidgetylizard.com>
 * @since             1.0
 * @package           No_Suggested_Password
 *
 * @wordpress-plugin
 * Plugin Name:       No Suggested Password 
 * Plugin URI:        https://wordpress.org/plugins/no-suggested-password/
 * Description:       Removed the suggested new password from the password reset form, to prevent user confusion.
 * Version:           1.0
 * Author:            Fidgety Lizard
 * Author URI:        http://www.fidgetylizard.com
 * Contributors:			fliz, kona
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       no-suggested-password
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'No_Suggested_Password' ) )
{
  class No_Suggested_Password
  {
    /**
     * Construct the plugin object
     */
    public function __construct()
    {
			// We want our scripts queued on the login pages only
			add_action( 'login_enqueue_scripts', array( $this, 'add_scripts' ) );	

			// Prepare for i18n translations
			add_action( 'plugins_loaded', array( $this, 'load_my_textdomain' ) );
    } // END public function __construct

    /**
     * Activate the plugin
     */
    public static function activate()
    {
      // Nothing to do here
    } // END public static function activate

    /**
     * Deactivate the plugin
     */
    public static function deactivate()
    {
      // Nothing to do here
    } // END public static function deactivate

		/**
		 * Set up the necessary CSS and JS 
		 */
		public function add_scripts()
		{
			// Add the JS that does the JQuery/Ajax password field tweaking
  		wp_enqueue_script(
    		'fliznsp-password-js',
				plugin_dir_url( __FILE__ ) . 'js/fliznsp-password.js',
    		array( 'jquery' ) // Depends on jquery
  		);
    } // END public function add_scripts
 

		/**
		 * Set things up for i18n
		 */
		public function load_my_textdomain() 
		{
		  load_plugin_textdomain( 
				'no-suggested-password', 
				FALSE, 
				basename( dirname( __FILE__ ) ) . '/languages/' 
			);
		}
  } // END class No_Suggested_Password
} // END if ( ! class_exists( 'No_Suggested_Password' ) )


if ( class_exists( 'No_Suggested_Password' ) )
{
  // Installation and uninstallation hooks
  register_activation_hook(
		__FILE__, 
		array( 'No_Suggested_Password', 'activate' )
	);
  register_deactivation_hook(
		__FILE__, 
		array( 'No_Suggested_Password', 'deactivate' )
	);
  // instantiate the plugin class
  $wp_plugin_template = new No_Suggested_Password();
}
?>
