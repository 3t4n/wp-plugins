<?php
/**
 * Defines the ASD_NameTaglineidget class
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
 *   class ASD_NameTaglineWidget
 *   displays name and/or tagline information from Site Data admin panel options
 *  ------------------------------------------------------------------------- */
class ASD_NameTaglineWidget extends ASD_Widget {

	/** ----------------------------------------------------------------------------
	 *   constructor
	 *  ------------------------------------------------------------------------- */
	public function __construct() {
		parent::__construct( false, 'ASD Name/Tagline Widget' );
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

		$display_what = $instance['display_what'];

		echo '<div class="asd-widget asd-nametaglinewidget">' . "\r\n";

		if ( ( 'both' === $display_what ) || ( 'name' === $display_what ) ) {
			echo '<h1 class="sitename">';
			echo esc_attr( get_bloginfo( 'name' ) );
			echo '</h1>';
		}

		if ( ( 'both' === $display_what ) || ( 'tagline' === $display_what ) ) {
			echo '<h2 class="sitetagline">';
			echo esc_attr( get_bloginfo( 'description' ) );
			echo '</h2>';
		}

		echo '</div>' . "\r\n";

		$this->widget_end( $args, $instance );
	}


	/** ----------------------------------------------------------------------------
	 *   function form ( $instance )
	 *   prints widget in Dashboard
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param Array $instance - passed from WP.
	 */
	public function form( $instance ) {
			parent::form( $instance );

			$display_what = 'both';
		if ( ! empty( $instance['display_what'] ) ) {
			$display_what = esc_attr( $instance['display_what'] );
		}

		$display_options = array(
			'both'    => 'both',
			'name'    => 'name',
			'tagline' => 'tagline',
		);

		?>

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'display_what' ) ); ?>">Display:</label>
			<br>

			<select id="<?php echo esc_attr( $this->get_field_id( 'display_what' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display_what' ) ); ?>" >

					<?php
					foreach ( $display_options as $thisoption ) {
						echo '<option value="' . esc_attr( $thisoption ) . '" ';
						if ( $thisoption === $display_what ) {
							echo ' selected ';
						}
							echo '>';
							echo esc_attr( $thisoption );
							echo '</option>';
					}
					?>

			</select>
		</p>

		<?php
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
		$instance['display_what'] = sanitize_text_field( $new_instance['display_what'] );
		return $instance;
	}
}

