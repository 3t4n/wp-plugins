<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Accountable_Press_Widget extends \WP_Widget {

	public function __construct() {
		parent::__construct(
			'accountable_press',
			__( 'Accountable Press Seal', 'accountable-press' )
		);
	}

	public function widget( $args, $instance ) {
		$account_id = get_option( 'accountable_press_account_id', '0' );

		$size = isset( $instance['size'] ) ? $instance['size'] : 'medium';

		echo $args['before_widget'];
		echo accountable_press_render_seal( $account_id, $size );
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$size = isset( $instance['size'] ) ? $instance['size'] : 'medium';

		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_attr_e( 'Seal Size:', 'accountable-press' ); ?></label> 
				<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
					<option value="small" <?php selected( $size, 'small', true ); ?>><?php _e( 'Small', 'accountable-press' ); ?></option>
					<option value="medium" <?php selected( $size, 'medium', true ); ?>><?php _e( 'Medium', 'accountable-press' ); ?></option>
					<option value="large" <?php selected( $size, 'large', true ); ?>><?php _e( 'Large', 'accountable-press' ); ?></option>
				<select>
			</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['size'] = ( ! empty( $new_instance['size'] ) ) ? sanitize_text_field( $new_instance['size'] ) : '';

		return $instance;
	}

}