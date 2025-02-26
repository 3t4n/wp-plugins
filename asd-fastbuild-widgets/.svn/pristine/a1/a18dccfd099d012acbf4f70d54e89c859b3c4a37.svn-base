<?php
/**
 * Defines the ASD_AddressWidget class
 *
 * @package     WordPress
 * @subpackage  ASD_FastBuild_Widgets
 * Author:      Michael H Fahey
 * Author URI:  https://artisansitedesigns.com/staff/michael-h-fahey
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

/** ----------------------------------------------------------------------------
 *   class ASD_AddressWidget
 *   displays address information from Site Data admin panel options
 *  ------------------------------------------------------------------------- */
class ASD_AddressWidget extends ASD_Widget {

	/** ----------------------------------------------------------------------------
	 *   constructor
	 *  ------------------------------------------------------------------------- */
	public function __construct() {
		parent::__construct( false, 'ASD Address Widget' );
	}

	/** ----------------------------------------------------------------------------
	 *   function widget( $args, $instance )
	 *    prints widget content output on front end
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param Array $args -     passed from WP.
	 *   @param Array $instance - passed from WP.
	 */
	public function widget( $args, $instance ) {
		$this->widget_start( $args, $instance );

		echo '<div class="asd-widget asd-addresswidget">' . "\r\n";

		$this->print_item( 'asd_fastbuild_addr_street1', '', 'true' );
		$this->print_item( 'asd_fastbuild_addr_street2', '', 'true' );
		$this->print_item( 'asd_fastbuild_addr_city', ', ' );
		$this->print_item( 'asd_fastbuild_addr_state', ' ' );
		$this->print_item( 'asd_fastbuild_addr_zip', '', 'true' );

		echo '</div>' . "\r\n";

		$this->widget_end( $args, $instance );
	}


	/** ----------------------------------------------------------------------------
	 *   function update(  $new_instance, $old_instance )
	 *   preserves widget instance data
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param Array $new_instance -  widget with changes.
	 *   @param Array $old_instance -  widget without changes.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['wrapperclass'] = sanitize_html_class( $new_instance['wrapperclass'] );
		return $instance;
	}

}

