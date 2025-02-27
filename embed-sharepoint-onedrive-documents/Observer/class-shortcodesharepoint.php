<?php
/**
 * Handles the callback function for the Shortcode.
 *
 * @package embed-sharepoint-onedrive-documents\Observer
 */

namespace MoSharePointObjectSync\Observer;

use MoSharePointObjectSync\API\Azure;

use MoSharePointObjectSync\Wrappers\PluginConstants;
use MoSharePointObjectSync\Wrappers\WpWrapper;
use MoSharePointObjectSync\API\CustomerMOSPS;
use MoSharePointObjectSync\Observer\AdminObserver;
use MoSharePointObjectSync\View\DocumentsSync;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class ShortcodeSharepoint
 *
 * @package embed-sharepoint-onedrive-documents\Observer
 */
class ShortcodeSharepoint {

	/**
	 * Holds the class instance.
	 *
	 * @var ShortcodeSharepoint
	 */
	private static $obj;

	/**
	 * Configuration array.
	 *
	 * @var array
	 */
	public $config = array();

	/**
	 * Flag to check if shortcode is already added.
	 *
	 * @var bool
	 */
	private $shortcode_added = false;

	/**
	 * Get the singleton instance of this class.
	 *
	 * @return ShortcodeSharepoint
	 */
	public static function get_observer() {
		if ( ! isset( self::$obj ) ) {
			self::$obj = new ShortcodeSharepoint();
		}
		return self::$obj;
	}

	/**
	 * Shortcode handler function.
	 *
	 * @param array  $attrs Shortcode attributes.
	 * @param string $content Shortcode content.
	 * @return false|string
	 */
	public function mo_sps_shortcode_document_observer( $attrs, $content = '' ) {
		if ( $this->shortcode_added ) {
			return $content;
		}

		$feedback_config                      = WpWrapper::mo_sps_get_option( PluginConstants::FEEDBACK_CONFIG );
		$feedback_config['shortcode_embeded'] = 'yes';
		WpWrapper::mo_sps_set_option( 'mo_sps_feedback_config', $feedback_config );

		if ( ! is_user_logged_in() ) {
			return "<span style='text-align: center;width: 100%;display: inline-block'>Please <a href='" . wp_login_url( get_permalink() ) . "'>login</a> to view the content.</span>";
		}

		$attrs = shortcode_atts(
			array(
				'width'  => '100%',
				'height' => '600px',
			),
			$attrs,
			'MO_SPS_SHAREPOINT'
		);

		$this->config['width']  = sanitize_text_field( $attrs['width'] );
		$this->config['height'] = sanitize_text_field( $attrs['height'] );

		wp_enqueue_script( 'jquery' );
		ob_start();
		$document_sync_obj     = DocumentsSync::get_view();
		$this->shortcode_added = true;
		$document_sync_obj->mo_sps_display__tab_shortcode_details( $this->config );
		return ob_get_clean();
	}
}
