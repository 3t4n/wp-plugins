<?php
/**
 * Defines the ASD_SocialIconsWidget class
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
 *   class ASD_SocialIconsWidget
 *   displays address information from Site Data admin panel options
 *  ------------------------------------------------------------------------- */
class ASD_SocialIconsWidget extends ASD_Widget {

	/** ----------------------------------------------------------------------------
	 *   constructor
	 *  ------------------------------------------------------------------------- */
	public function __construct() {
		parent::__construct( false, 'ASD Social Icons Widget' );
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

		echo '<div class="asd-socialiconwidget">';
		$this->print_social_icon( 'facebook', $instance );
		$this->print_social_icon( 'gplus', $instance );
		$this->print_social_icon( 'instagram', $instance );
		$this->print_social_icon( 'linkedin', $instance );
		$this->print_social_icon( 'pinterest', $instance );
		$this->print_social_icon( 'twitter', $instance );
		$this->print_social_icon( 'yelp', $instance );
		$this->print_social_icon( 'youtube', $instance );
		echo '</div>';

		$this->widget_end( $args, $instance );
	}



	/** ----------------------------------------------------------------------------
	 *   function print_social_icon ( $medium , $instance )
	 *   shortcut function to print out social media icon from minimal params
	 *  ----------------------------------------------------------------------------
	 *
	 *   @param Array $medium -   social media site.
	 *   @param Array $instance -  widget instance.
	 */
	protected function print_social_icon( $medium, $instance ) {
		$optionfield = esc_attr( 'asd_fastbuild_social_' . $medium );
		$mediumclass = esc_attr( 'asd-social-' . $medium );

		if ( get_option( $optionfield )['text_string'] ) {
			echo '<a target="_blank" href="' . esc_attr( get_option( $optionfield )['text_string'] ) . '">';
			echo '<div class="asd-socialicon ' . sanitize_html_class( $mediumclass ) . '">';

			echo '<img src="';
			echo esc_url_raw( ASD_FASTBUILD_URL ) . 'images/social/' . esc_attr( $instance['colorscheme'] ) . '/' . esc_attr( $medium ) . '.png';
			echo '" />';
			echo '</div>';
			echo '</a>';
		}
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

		$colorscheme  = ! empty( $instance['colorscheme'] ) ? esc_attr( $instance['colorscheme'] ) : 'logo1-white-on-color';
		$colorschemes = array(
			'Logo 1 White on Color' => 'logo1-white-on-color',
			'Logo 1 Color on Clear' => 'logo1-color-on-clear',
			'Logo 1 White on Clear' => 'logo1-white-on-clear',
			'Logo 1 Black on Clear' => 'logo1-black-on-clear',
		);
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'colorscheme' ) ); ?>">Color Scheme:</label>
			<br>
			<select id="<?php echo esc_attr( $this->get_field_id( 'colorscheme' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'colorscheme' ) ); ?>" >

			<?php
			foreach ( $colorschemes as $cs ) {
				echo '<option value="' . esc_attr( $cs ) . '" ';
				if ( $cs === $colorscheme ) {
					echo ' selected ';
				}
				echo '>';
				echo esc_attr( $cs );
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
		$instance['colorscheme']  = sanitize_text_field( $new_instance['colorscheme'] );
		return $instance;
	}
}

