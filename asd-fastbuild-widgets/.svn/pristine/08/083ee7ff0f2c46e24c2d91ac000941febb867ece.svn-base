<?php
/**
 * Defines the ASD_PillsNavWidget class
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
 *   class ASD_PillsNavWidget
 *   displays address information from Site Data admin panel options
 *  ------------------------------------------------------------------------- */
class ASD_PillsNavWidget extends ASD_Widget {


	/** ----------------------------------------------------------------------------
	 *   constructor
	 *  ------------------------------------------------------------------------- */
	public function __construct() {
		parent::__construct( false, 'ASD Pills Nav Widget' );
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
		$usemenu       = ! empty( $instance['usemenu'] ) ? esc_attr( $instance['usemenu'] ) : 'None';
		$msp_nav_class = 'nav menu nav-pills nav-stacked';
					wp_nav_menu(
						array(
							'menu'       => $usemenu,
							'depth'      => 1,
							'container'  => false,
							'menu_class' => $msp_nav_class,
							'walker'     => new wp_bootstrap_navwalker(),
						)
					);

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

		$usemenu = ! empty( $instance['usemenu'] ) ? esc_attr( $instance['usemenu'] ) : 'None';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'usemenu' ) ); ?>">Menu:</label>
			<br>
			<select id="<?php echo esc_attr( $this->get_field_id( 'usemenu' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'usemenu' ) ); ?>"  >
			<?php
			$regmenus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
			foreach ( $regmenus as $regmenu ) {
				$navmenu = wp_get_nav_menu_object( $regmenu );
				echo '<option value="' . esc_attr( $navmenu->name ) . '"';
				if ( $usemenu === $navmenu->name ) {
					echo ' selected="selected" ';
				}
				echo '>';
				echo esc_attr( $navmenu->name );
				echo '</option>';
			}
			echo '</select>';
			echo '</p>';

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
		$instance['usemenu']      = sanitize_text_field( $new_instance['usemenu'] );
		return $instance;
	}

}

