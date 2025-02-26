<?php


class DWKB_Widget_Article extends WP_Widget {
	public function __construct() {
		$widget_ops = array( 'classname' => 'widget_recent_entries', 'description' => 'Show Your Knowledgebase Article as List.' );
		parent::__construct( 'article', 'DWKB: Article', $widget_ops );
		$this->alt_option_name = 'dwkb_widget_article';
	}

	public function widget( $args, $instance ) {
		$category_style = '';
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;

		$order_by = ( ! empty( $instance['order_by'] ) ) ? $instance['order_by'] : 'date';
		$order = ( ! empty( $instance['order'] ) ) ? $instance['order'] : 'asc';

		if ( 'popularity' == $order_by ) {
			$query = array(
				'post_type' => 'dwkb',
				'posts_per_page' => $number,
				'no_found_rows' => true,
				'post_status' => 'publish',
				'orderby' => 'meta_value_num',
				'order' => $order,
				'meta_key' => 'dwkb_post_views_count'
				);
		} else {
			$query = array(
				'post_type' => 'dwkb',
				'posts_per_page' => $number,
				'no_found_rows' => true,
				'post_status' => 'publish',
				'orderby' => $order_by,
				'order' => $order
				);
		}



		$r = new WP_Query( apply_filters( 'dwkb_widget_article', $query ) );

		if ( $r->have_posts() ) :
			?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) : ?>
		<?php echo $args['before_title']; ?>
		<?php echo wp_kses_post( $title ); ?>
		<?php echo $args['after_title']; ?>
	<?php endif; ?>
	<div class="widget-content">
			<ul class="list-unstyled">
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
	</div>
<?php echo $args['after_widget']; ?>
<?php
wp_reset_postdata();

endif;
}

public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['number'] = (int) $new_instance['number'];
	$instance['order_by'] = strip_tags( $new_instance['order_by'] );
	$instance['order'] = strip_tags( $new_instance['order'] );
	return $instance;
}

public function form( $instance ) {

	$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
	$order_by = isset( $instance['order_by'] ) ? esc_attr( $instance['order_by'] ) : 'date';
	$order = isset( $instance['order'] ) ? esc_attr( $instance['order'] ) : 'asc';
	?>
	<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'dwkb' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of articles to show:', 'dwkb' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'order_by' ) ); ?>"><?php _e( 'Order By', 'dwkb' ) ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order_by' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order_by' ) ); ?>">
					<option value="date" <?php selected( $order_by, 'date' ) ?>><?php _e( 'Related', 'dwkb' ); ?></option>
					<option value="rand" <?php selected( $order_by, 'rand' ) ?>><?php _e( 'Random', 'dwkb' ); ?></option>
					<option value="popularity" <?php selected( $order_by, 'popularity' ) ?>><?php _e( 'Popularity', 'dwkb' ); ?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php _e( 'Order', 'dwkb' ) ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>">
					<option value="asc" <?php selected( $order, 'asc' ) ?>><?php _e( 'ASC', 'dwkb' ); ?></option>
					<option value="desc" <?php selected( $order, 'desc' ) ?>><?php _e( 'DESC', 'dwkb' ); ?></option>
				</select>
			</p>
			<?php
		}
	}
