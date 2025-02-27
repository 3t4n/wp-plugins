<?php
if (!defined('ABSPATH'))
{
	exit;
}


class ECPT_Text_Sliders extends WP_Widget {

	function __construct() {
		load_plugin_textdomain( 'text-sliders' );
		
		parent::__construct(
			'text_sliders',
			__( 'Text Sliders' , 'text-sliders'),
			array( 'description' => __( 'Display the text sliders on sidebar' , 'text-sliders') )
		);
	}

	function form( $instance ) {
		if ( $instance && isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		else {
			$title = __( 'Text Sliders' , 'text-sliders' );
		}
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:' , 'text-sliders'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function widget( $args, $instance ) {
		if ( ! isset( $instance['title'] ) ) {
			$instance['title'] = __( 'Text Sliders' , 'text-sliders' );
		}

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}
		
		$text_slider_widget = ecpt_text_slider_testimonial_shortcode();

		
		echo $text_slider_widget;
		echo $args['after_widget'];
	}
}

function ecpt_text_sliders_register_widgets() {
	register_widget( 'ECPT_Text_Sliders' );
}

add_action( 'widgets_init', 'ecpt_text_sliders_register_widgets' );
