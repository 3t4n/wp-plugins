<?php


class DWKB_Widget_Category extends WP_Widget {
	public function __construct() {
		$widget_ops = array( 'classname' => 'widget_categories', 'description' => 'Show Your Knowledgebase Categories as List.' );
		parent::__construct( 'category', 'DWKB: Categoies', $widget_ops );
		$this->alt_option_name = 'dwkb_widget_category';
	}

	public function widget( $args, $instance ) {
		$category_style = '';
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		
		$cat_args = array(
			'orderby'       => 'terms_order', 
			'order'         => 'ASC',
			'hide_empty'    => true,
			'parent'        => 0,
			'number'        => $number
			);
		$terms = get_terms( 'dwkb_category', $cat_args );

		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) : ?>
		<?php echo $args['before_title']; ?>
		<?php echo wp_kses_post( $title ); ?>
		<?php echo $args['after_title']; ?>
	<?php endif; ?>
	<div class="widget-content">
			<ul >
				<?php if ( ! empty( $terms ) ) {
					foreach ( $terms as $taxonomy ) {
						$term_name = $taxonomy->name;
						$term_slug = $taxonomy->slug;
						$term_link = get_term_link( $term_slug, 'dwkb_category' );
						?>
						<li><a href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a></li>
						<?php 
					} 
				} ?>
			</ul>
	</div>
	<?php echo $args['after_widget']; ?>
	<?php
	wp_reset_postdata();
}

public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['number'] = (int) $new_instance['number'];
	return $instance;
}

public function form( $instance ) {

	$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
	?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'dwkb' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of categories to show:', 'dwkb' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
	</p>
		<?php
	}
}
