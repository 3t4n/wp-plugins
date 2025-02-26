<?php
/**
 * Defines the ASD_HoursWidget class
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
 *   class ASD_HoursWidget
 *   displays hours information from Site Data admin panel options
 *  ------------------------------------------------------------------------- */
class ASD_HoursWidget extends ASD_Widget {

	/** ----------------------------------------------------------------------------
	 *   constructor
	 *  ------------------------------------------------------------------------- */
	public function __construct() {
		parent::__construct( false, 'ASD Hours Widget' );
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

		$this->dayline( 'mon' );
		$this->dayline( 'tue' );
		$this->dayline( 'wed' );
		$this->dayline( 'thu' );
		$this->dayline( 'fri' );
		$this->dayline( 'sat' );
		$this->dayline( 'sun' );

		$this->widget_end( $args, $instance );
	}

	/** ----------------------------------------------------------------------------
	 *   function dayline( $day )
	 *   shortcut function for printing day/hours data
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param Array $day - day of the week.
	 */
	protected function dayline( $day ) {

		$daystart1 = 'asd_fastbuild_hours_' . $day . '_start1';
		$dayend1   = 'asd_fastbuild_hours_' . $day . '_end1';

		echo '<div class="col-xs-12">';
		echo '   <div class="col-xs-4">';
		echo '		  <div class="daycolumn">';
		echo '			  <span style="text-transform:uppercase;">' . esc_attr( $day ) . '</span>';
		echo '		  </div>';
		echo '   </div>';
		echo '   <div class="col-xs-8">';
		echo '		  <div class="col-xs-4">';
		echo '			  <div class="hourscolumn">';
		$this->print_item( $daystart1, '' );
		echo '			  </div>';
		echo '		  </div>';

		if ( ! ( 'Closed' === get_option( $daystart1 )['text_string'] ) ) {
			echo '		 <div class="col-xs-2">';
			echo '				 <small>to </small> ';
			echo '		 </div>';
			echo '		 <div class="col-xs-4">';
			echo '			 <div class="hourscolumn">';
			$this->print_item( $dayend1, '' );
			echo '			 </div>';
			echo '		 </div>';
		}
		echo '   </div>';
		echo '</div>';

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
		$instance['wrapperclass'] = sanitize_text_fiels( $new_instance['wrapperclass'] );
		return $instance;
	}
}

