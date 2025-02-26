<?php
/*
Plugin Name: Daily Quotes by Jar of Quotes
Plugin URI: http://www.jarofquotes.com
Description: This plugin adds a custom widget to show daily quotes. Go to Appearance -> Widgets to customize.
Version: 1.0
Author: Jar of Quotes
Author URI: https://www.jarofquotes.com
License: GPL2
*/

class Daily_Quotes_By_Jar_Of_Quotes extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'Daily_Quotes_By_Jar_Of_Quotes',
			__( 'Daily Quotes by Jar of Quotes', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'title'    => '',
			'text'     => '',
			'textarea' => '',
			'checkbox' => '',
			'select'   => '',
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>


		

		

		<?php // Dropdown ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e( 'Select', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select' ); ?>" id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat">
			<?php
			// Your options array
			$options = array(
				''        => __( 'Select', 'text_domain' ),
				'image' => __( 'Image only', 'text_domain' ),
				'text' => __( 'Text only', 'text_domain' ),
				'both' => __( 'Both', 'text_domain' ),
			);

			// Loop through options and add each one to the select dropdown
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select, $key, false ) . '>'. $name . '</option>';

			} ?>
			</select>
		</p>



		<?php // Checkbox ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $text ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php _e( 'More Quotes?', 'text_domain' ); ?></label>
		</p>

	<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['text']     = isset( $new_instance['text'] ) ? wp_strip_all_tags( $new_instance['text'] ) : '';
		
		$instance['select']   = isset( $new_instance['select'] ) ? wp_strip_all_tags( $new_instance['select'] ) : '';
		return $instance;
	}

	// Display the widget
	public function widget( $args, $instance ) {

		extract( $args );

		// Check the widget options
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		
		$select   = isset( $instance['select'] ) ? $instance['select'] : '';

		$text     = isset( $instance['text'] ) ? $instance['text'] : '';

		// WordPress core before_widget hook (always include )
		echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box">';

			// Display widget title if defined
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			$url = "";

			if ( $text ) {
				$url = '<a target="_blank" href="https://www.jarofquotes.com">More quotes</a>';
			}
			$quote = file_get_contents('https://www.jarofquotes.com/webapi.php');
			$quote = json_decode( $quote, true );
			// Display select field
			if ( $select == 'image' ) {
				echo "<img src='".$quote[0]['img_url']."' /><br>";
				echo $url;
			} else if ( $select == 'text' ) {
				echo "<p>".$quote[0]['quote']." - ".$quote[0]['author']."</p>";
				echo $url;
			} else if ( $select == 'both' ) {
				echo "<img src='".$quote[0]['img_url']."' /><br>";
				echo "<p>".$quote[0]['quote']." - ".$quote[0]['author']."</p>";
				echo $url;
			}


		echo '</div>';

		// WordPress core after_widget hook (always include )
		echo $after_widget;

	}

}

// Register the widget
function dqbjoq_my_register_custom_widget() {
	register_widget( 'Daily_Quotes_By_Jar_Of_Quotes' );
}
add_action( 'widgets_init', 'dqbjoq_my_register_custom_widget' );