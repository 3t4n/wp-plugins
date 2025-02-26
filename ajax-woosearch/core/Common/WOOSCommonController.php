<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Common;

if (!class_exists('WOOSCommonController')) {
	
	class WOOSCommonController{
		/**
	    * Constructor
	    * Feature added by : Joy Shaha joysaha7302@gmail.com
	    * Date       : 22.04.2020
	    */
		public function woos_register()
		{
			add_filter( "plugin_action_links_" . WOOS_PLUGIN_BASE, array( $this, 'woos_settings_link' ) );
			add_action( "admin_notices", array( $this,  "woos_wp_version_error_warning" ));
		}
		/**
		 * Setting Link
		 * Feature added by : Joy Shaha joysaha7302@gmail.com
		 * Date : 21.04.2020
		*/
		public function woos_settings_link( $links )
		{
			$settings_link = '<a href="admin.php?page=woos">Settings</a>';
			array_push( $links, $settings_link );
			return $links;
		}
		/**
		 * WP version check
		 * Feature added by : Joy Shaha joysaha7302@gmail.com
		 * Date : 21.04.2020
		*/
		public function woos_wp_version_error_warning( ) {
			$wp_version = get_bloginfo( 'version' );

			if ( ! version_compare( $wp_version, WOOS_WP_VERSION, '<' ) ) {
				return;
			}

		?>
		<div class="notice notice-warning woos-warning">
		<p><?php
			echo sprintf(
				__( '<strong>WooSearch %1$s requires WordPress %2$s or higher to work properly.</strong> Please <a href="%3$s">update WordPress</a> first.', 'woosearch' ),
				WOOS_VERSION,
				WOOS_WP_VERSION,
				admin_url( 'update-core.php' )
			);
		?></p>
		</div>
		<?php }
	}
}