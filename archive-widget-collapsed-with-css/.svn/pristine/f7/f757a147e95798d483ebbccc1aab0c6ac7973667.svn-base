<?php
class archive_widget_collapsed_with_css extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'archive_widget_collapsed_with_css',
			'description' => __( 'Displays an archive widget collapsed in CSS.', 'archive-widget-collapsed-with-css' ),
		);
		parent::__construct( 'archive_widget_collapsed_with_css', __( 'Archive widget collapsed with CSS', 'archive-widget-collapsed-with-css' ), $widget_ops );
		$this->alt_option_name = 'archive_widget_collapsed_with_css';
	}

	public function form( $instance ) {

		$ca = __( 'Collapse all', 'archive-widget-collapsed-with-css' );
		$dcty = __( 'Don\'t collapse latest year', 'archive-widget-collapsed-with-css' );
		$dca = __( 'Don\'t collapse all', 'archive-widget-collapsed-with-css' );
		$p1 = __( 'pattern 1', 'archive-widget-collapsed-with-css' );
		$p2 = __( 'pattern 2', 'archive-widget-collapsed-with-css' );
		$p3 = __( 'pattern 3', 'archive-widget-collapsed-with-css' );
		$p4 = __( 'pattern 4', 'archive-widget-collapsed-with-css' );

		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$posts_number = isset( $instance['awcwc_posts_number'] ) ? $instance['awcwc_posts_number'] : '';
		$display = isset( $instance['awcwc_collapse_display'] ) ? $instance['awcwc_collapse_display'] : $ca;
		$style = isset( $instance['awcwc_style'] ) ? $instance['awcwc_style'] : $p1;

		?>
	
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'archive-widget-collapsed-with-css' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p>
		<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'awcwc_posts_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'awcwc_posts_number')); ?>"<?php checked( $posts_number ,1 ); ?> />
		<label for="<?php echo esc_attr($this->get_field_id( 'awcwc_posts_number')); ?>"><?php esc_html_e( 'Show post count', 'archive-widget-collapsed-with-css' ); ?></label>
		</p>
			
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'awcwc_collapse_display' )); ?>"><?php esc_html_e( 'Default display:', 'archive-widget-collapsed-with-css' ); ?></label>
		<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'awcwc_collapse_display' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'awcwc_collapse_display' )); ?>">
		<?php
			$options = array( $ca, $dcty, $dca );
			foreach ($options as $option) {
		?>
		<option value="<?php echo esc_attr( $option );?>"<?php if ( $display == $option ) echo ' selected="selected"';?>><?php echo esc_attr( $option );?></option>
		<?php } ?>
		</select>
		</p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'awcwc_style' )); ?>"><?php esc_html_e( 'Style:', 'archive-widget-collapsed-with-css' ); ?></label>
		<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'awcwc_style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'awcwc_style' )); ?>">
		<?php
			$options = array( $p1, $p2, $p3, $p4 );
			foreach ($options as $option) {
		?>
		<option value="<?php echo esc_attr( $option );?>"<?php if ( $style == $option ) echo ' selected="selected"';?>><?php echo esc_attr( $option );?></option>
		<?php } ?>
		</select>
		</p>

<?php }

    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['awcwc_posts_number'] = isset( $new_instance['awcwc_posts_number'] );
		$instance['awcwc_collapse_display'] = sanitize_text_field( $new_instance['awcwc_collapse_display'] );
		$instance['awcwc_style'] = sanitize_text_field( $new_instance['awcwc_style'] );
		return $instance;
	}

	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$ca = __( 'Collapse all', 'archive-widget-collapsed-with-css' );
		$dcty = __( 'Don\'t collapse latest year', 'archive-widget-collapsed-with-css' );
		$dca = __( 'Don\'t collapse all', 'archive-widget-collapsed-with-css' );
		$p1 = __( 'pattern 1', 'archive-widget-collapsed-with-css' );
		$p2 = __( 'pattern 2', 'archive-widget-collapsed-with-css' );
		$p3 = __( 'pattern 3', 'archive-widget-collapsed-with-css' );
		$p4 = __( 'pattern 4', 'archive-widget-collapsed-with-css' );

		$title = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : __( 'Archives', 'archive-widget-collapsed-with-css' ), $instance, $this->id_base );
		$posts_number = isset( $instance['awcwc_posts_number'] ) ? $instance['awcwc_posts_number'] : '';
		$display = isset( $instance['awcwc_collapse_display'] ) ? $instance['awcwc_collapse_display'] : $ca;
		$style = isset( $instance['awcwc_style'] ) ? $instance['awcwc_style'] : $p1;

		$allowed_html = array(
			'input' => array( 'id' => array (), 'class' => array (), 'type' => array (), 'name' => array () ),
			'label' => array( 'id' => array (), 'class' => array (), 'for' => array (), ),
			'a' => array( 'id' => array (), 'class' => array (), 'href' => array () ),
			'div' => array( 'id' => array (), 'class' => array () ),
			'p' => array( 'id' => array (), 'class' => array () ),
			'span' => array( 'id' => array (), 'class' => array () ),
			'ul' => array( 'id' => array (), 'class' => array () ),
			'li' => array( 'id' => array (), 'class' => array () )
		);

		echo wp_kses_post( $args['before_widget'] );
		if ( $title ) echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
		archive_widget_collapsed_with_css_generate_html( $posts_number, $display, $style );
		echo wp_kses_post( $args['after_widget'] );

		archive_widget_collapsed_with_css_style( $style );

	}
}

function archive_widget_collapsed_with_css_register() {
    register_widget( 'archive_widget_collapsed_with_css' );
}
add_action( 'widgets_init', 'archive_widget_collapsed_with_css_register' );