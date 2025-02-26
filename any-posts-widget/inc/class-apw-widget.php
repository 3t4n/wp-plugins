<?php
/**
 * Class widget
 *
 * @package Any_Posts_Widget
 */

/**
 * Class APW_Widget
 */
class APW_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'any-posts',
			esc_html__( 'APW: Any Posts', 'any-posts-widget' ),
			array(
				'description' => esc_html__( 'Allow choose some any posts manually', 'any-posts-widget' ),
				'classname'   => 'widget-any-posts',
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] );
		}

		if ( ! empty( $instance['posts'] ) ) {

			$query = new WP_Query( apply_filters( 'apw_posts_widget_query_args', array(
				'nopaging'            => true,
				'post__in'            => $instance['posts'],
				'orderby'             => 'post__in',
				'ignore_sticky_posts' => true,
			), $instance, $args ) );

			$template_file = ANY_POSTS_WIDGET_PATH . 'templates/loop.php';

			if ( locate_template( 'any-posts-widget/loop.php' ) ) {
				$template_file = locate_template( 'any-posts-widget/loop.php' );
			}

			if ( $query->have_posts() ) {
				echo wp_kses_post( apply_filters( 'apw_list_posts_open', '<ul class="any-posts">' ) );

				while ( $query->have_posts() ) {
					$query->the_post();

					include $template_file;
				}

				echo wp_kses_post( apply_filters( 'apw_list_posts_close', '</ul>' ) );

				wp_reset_postdata();
			}
		}

		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$post_ids = ! empty( $instance['posts'] ) ? $instance['posts'] : array();

		$select_post_name = $this->get_field_name( 'posts' ) . '[]';
		$posts = apw_get_posts_opt();
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'any-posts-widget' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<div class="js-apw-widget-settings apw-widget-settings">
			<label><?php esc_html_e( 'Posts', 'any-posts-widget' ); ?></label>

			<ul class="js-apw-widget-settings-posts apw-widget-settings-posts" data-select-post-name="<?php echo esc_attr( $select_post_name ); ?>">
				<?php foreach ( $post_ids as $post_id ) : ?>
					<li>
						<span class="icon-move dashicons dashicons-move"></span>

						<select class="widefat" name="<?php echo esc_attr( $select_post_name ); ?>">
							<?php
							foreach ( $posts as $post ) {
								printf(
									'<option value="%1$s" %2$s>%3$s</option>',
									intval( $post->ID ),
									selected( $post->ID, $post_id, false ),
									esc_html( $post->post_title )
								);
							}
							?>
						</select>

						<a href="#" class="remove-btn js-apw-widget-settings-remove-btn">
							<span class="dashicons dashicons-no-alt"></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>

			<button type="button" class="button js-apw-widget-settings-add-btn"><?php esc_html_e( 'Add post', 'any-posts-widget' ); ?></button>
		</div>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['posts'] = ( ! empty( $new_instance['posts'] ) ) ? array_map( 'absint', $new_instance['posts'] ) : array();

		return $instance;
	}
}

/**
 * Register widget.
 */
function apw_widget_register() {
	register_widget( 'APW_Widget' );
}
add_action( 'widgets_init', 'apw_widget_register' );

/**
 * Enqueue neccesary scripts in backend.
 */
function apw_widget_backend_scripts() {
	if ( 'widgets' !== get_current_screen()->id ) {
		return;
	}

	wp_enqueue_style( 'apw-settings', ANY_POSTS_WIDGET_URL . 'assets/css/apw-settings.css' );

	wp_enqueue_script( 'apw-settings', ANY_POSTS_WIDGET_URL . 'assets/js/apw-settings.js', array( 'underscore', 'wp-util', 'jquery', 'jquery-ui-sortable' ), ANY_POSTS_WIDGET_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'apw_widget_backend_scripts' );

/**
 * Enqueue frontend scripts.
 */
function apw_widget_frontend_scripts() {
	wp_enqueue_style( 'apw-widget', ANY_POSTS_WIDGET_URL . 'assets/css/widget.css' );
}
add_action( 'wp_enqueue_scripts', 'apw_widget_frontend_scripts' );

/**
 * Get option posts.
 *
 * @return array
 */
function apw_get_posts_opt() {
	return get_posts( array(
		'nopaging' => true,
		'orderby'  => 'title',
		'order'    => 'asc',
	) );
}

/**
 * Print template for settings.
 */
function apw_widget_backend_template() {
	if ( 'widgets' !== get_current_screen()->id ) {
		return;
	}
	?>


	<script type="text/html" id="tmpl-apw-widget-select-post">

		<li>
			<span class="icon-move dashicons dashicons-move"></span>

			<select name="{{ data.name }}" class="widefat">
				<?php
				$posts = apw_get_posts_opt();

				foreach ( $posts as $post ) {
					printf(
						'<option value="%1$s">%2$s</option>',
						intval( $post->ID ),
						esc_html( $post->post_title )
					);
				}
				?>
			</select>

			<a href="#" class="remove-btn js-apw-widget-settings-remove-btn">
				<span class="dashicons dashicons-no-alt"></span>
			</a>
		</li>

	</script>
	<?php
}
add_action( 'admin_footer', 'apw_widget_backend_template' );
