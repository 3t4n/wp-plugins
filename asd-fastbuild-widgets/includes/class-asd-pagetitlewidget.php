<?php
/**
 * Defines the ASD_PageTitleWidget class
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
 *   class ASD_PageTitleWidget
 *   displays page title in a widget
 *  ------------------------------------------------------------------------- */
class ASD_PageTitleWidget extends ASD_Widget {

	/** ----------------------------------------------------------------------------
	 *   constructor
	 *  ------------------------------------------------------------------------- */
	public function __construct() {
		parent::__construct( false, 'ASD Page Title Widget' );
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

		echo '<h1>' . get_the_title() . '</h1>';

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

