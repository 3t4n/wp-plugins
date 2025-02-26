<?php
/**
 * Social media icons widgets for Alley Themes
 *
 * @package alley business toolkit
 * @since version 1.0.0
 */
$theme = wp_get_theme();
if ( 'Home Services' == $theme->name || 'Home Services' == $theme->parent_theme  ):
		class Alley_Social_Icons_Widget extends WP_Widget {
			public function __construct() {
			    parent::__construct(
			      'alley_themes_social_media_icons', 
			      __( 'Alley Themes Social Icons', 'alley-business-toolkit' ), 
			      array( 'description' => __( 'Social Media Widgets for Alley Themes', 'alley-business-toolkit' ), ) // Args
			    );
			}
			
			/**
			   * Outputs the content of the widget
			   *
			   * @param array $args
			   * @param array $instance
			   */
			public function widget( $args, $instance ) {
				echo wp_kses_post($args['before_widget']);
				if ( ! empty( $instance['title'] ) ) {
					echo wp_kses_post($args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title']);
				}

				ob_start();
				require ALLEY_BUSINESS_TOOLKIT_PATH . 'public/social-media.php';
				$strrr= ob_get_clean();
				echo wp_kses_post($strrr);
				echo wp_kses_post($args['after_widget']);
				
			}
			
			/**
				* Outputs the options form on admin
				*
				* @param array $instance The widget options
				*/
			public function form( $instance ) {
				$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Follow us ', 'alley-business-toolkit' );
				?>
				<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'alley-business-toolkit' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
				</p>
				<?php 
			}
			
			/**
				* Processing widget options on save
				*
				* @param array $new_instance The new options
				* @param array $old_instance The previous options
				*/
			public function update( $new_instance, $old_instance ) {
				$instance = array();
				$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
				return $instance;
			}
			
		}
		function register_alley_themes_social_media_widget() {
		    register_widget( 'Alley_Social_Icons_Widget' );
		}
		add_action( 'widgets_init', 'register_alley_themes_social_media_widget' );
	endif;
