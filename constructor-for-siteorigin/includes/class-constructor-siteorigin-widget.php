<?php /**
	   * Widget for displaying content from a post
	   *
	   * Class SiteOrigin_Panels_Widgets_PostContent
	   */
class Constructor_SiteOrigin_Panels_Widgets_PostContent extends WP_Widget {
	function __construct() {
		parent::__construct(
			'constructor-siteorigin-panels-post-content',
			__( 'Constructor for SiteOrigin', 'constructor-siteorigin' ),
			array(
				'description' => __( 'Displays content from the current post.', 'constructor-siteorigin' ),
			)
		);
	}

	function widget( $args, $instance ) {
		if ( is_admin() ) { return;
		}

		echo $args['before_widget'];
		$content = apply_filters( 'siteorigin_panels_widget_post_content', $this->default_content( $instance['type'], $instance['wrapper'], $instance['class'], $instance['custom'] ) );
		echo $content;
		echo $args['after_widget'];

	}

	/**
	 * The default content for post types
	 *
	 * @param $type
	 * @return string
	 */
	function default_content( $type, $wrapper, $class, $custom ) {
		global $post;
		if ( empty( $post ) ) { return;
		}

		switch ( $type ) {
			case 'post_title' :
				return '<h1 class="entry-title">' . $post->post_title . '</h1>';
			case 'featured' :
				if ( ! has_post_thumbnail() ) { return '';
				}
				return '<' . esc_attr( $wrapper ) . ' class="' . esc_attr( $class ) . '">' . wp_kses_post( get_the_post_thumbnail( $post->ID ) ) . '</' . esc_attr( $wrapper ) . '>';
			case 'post_author' :
				if ( ! get_post_author( $post->ID ) ) { return '';
				}
				return '<' . esc_attr( $wrapper ) . ' class="' . esc_attr( $class ) . '">' . esc_html( get_post_author( $post->ID ) ) . '</' . esc_attr( $wrapper ) . '>';
			case 'post_date' :
				if ( ! get_the_date( $post->ID ) ) { return '';
				}
				return '<' . esc_attr( $wrapper ) . ' class="' . esc_attr( $class ) . '">' . esc_html( get_the_date( $post->ID ) ) . '</' . esc_attr( $wrapper ) . '>';

			case 'post_excerpt' :
				if ( ! has_excerpt( $post->ID ) ) { return '';
				}
				return '<' . esc_attr( $wrapper ) . ' class="' . esc_attr( $class ) . '">' . esc_html( get_the_excerpt( $post->ID ) ) . '</' . esc_attr( $wrapper ) . '>';

			case 'comment_count' :
				if ( ! get_comments_number( $post->ID ) ) { return '';
				}
				return '<' . esc_attr( $wrapper ) . ' class="' . esc_attr( $class ) . '">' . esc_html( get_comments_number( $post->ID ) ) . '</' . esc_attr( $wrapper ) . '>';

			case 'category' :
				if ( ! has_term( '', 'category', $post->ID ) ) { return '';
				}
						return '<' . esc_attr( $wrapper ) . ' class="' . esc_attr( $class ) . '">' . wp_kses_post( get_the_term_list( $post->ID, 'category', '', ', ', '' ) ) . '</' . esc_attr( $wrapper ) . '>';

			case 'event-categories' :
				if ( ! has_term( '', 'event-categories', $post->ID ) ) { return '';
				}
						return '<' . esc_attr( $wrapper ) . ' class="' . esc_attr( $class ) . '">' . wp_kses_post( get_the_term_list( $post->ID, 'event-categories', '', ', ', '' ) ) . '</' . esc_attr( $wrapper ) . '>';
			default :
				if ( $custom ) {
					$type_value = (get_post_meta( $post->ID, $custom, true ) ) ? get_post_meta( $post->ID, $custom, true ) : null;
				} else {
					$type_value = (get_post_meta( $post->ID, $type, true ) ) ? get_post_meta( $post->ID, $type, true ) : null;
				}
				if ( ! $type_value ) { return '';
				}
				return '<' . esc_attr( $wrapper ) . ' class="' . esc_attr( $class ) . '">' . esc_html( $type_value ) . '</' . esc_attr( $wrapper ) . '>';
		}// End switch().

	}

	function update( $new, $old ) {
		return $new;
	}

	function form( $instance ) {
		$default_types = array(
			'post_author' => 'Author',
		  	'post_date' => 'Date',
		  	'post_title' => 'Title',
		  	'post_excerpt' => 'Excerpt',
		  	'comment_count' => 'Comment count',
		  	'featured' => 'Fetured Image',
		  	'category' => 'Post Categories',

		);

		if ( class_exists( 'EM_Events' ) ) :
			$default_types = wp_parse_args($default_types, array(
					'_event_start_time' => 'Event Start Time',
				  	'_event_end_time' => 'Event End Time',
				  	'_event_all_day' => 'Event All Day',
				  	'_event_start_date' => 'Event Start Date',
				  	'_event_end_date' => 'Event End Date',
				  	'_event_spaces' => 'Event Spaces',
			  		'_location_id' => 'Event Location',
			  		'event-categories' => 'Event Categories',

			));

		endif;
		if ( function_exists( 'wp_review_user_review_type' ) ) :

			$default_types = wp_parse_args($default_types, array(
					'wp_review_desc_title' => 'Review Titlw',

			));

		endif;

		$current_screen = get_current_screen();

		$instance = wp_parse_args($instance, array(
			'type' => 'post_title',
			'class' => 'constructor-siteorigin',
			'wrapper' => 'div',
			'custom' => '',
		));

		$wrappers = apply_filters('constructor_siteorigin_wrappers', array(
			'' => __( 'None', 'constructor-siteorigin' ),
			'h1' => 'h1',
			'h2' => 'h2',
			'h3' => 'h3',
			'h4' => 'h4',
			'h5' => 'h5',
			'h6' => 'h6',
			'span' => 'span',
			'p' => 'p',
			'div' => 'div',
			'aside' => 'aside',
			'article' => 'article',
			'header' => 'header',
			'footer' => 'footer',
			'address' => 'address',
			'mark' => 'mark',
			'figure' => 'figure',
			'figurecaption' => 'figurecaption',

		));

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'type' ) ?>"><?php _e( 'Display Content', 'constructor-siteorigin' ) ?></label>
			<select id="<?php echo $this->get_field_id( 'type' ) ?>" name="<?php echo $this->get_field_name( 'type' ) ?>">
				<?php foreach ( $default_types as $type_id => $title ) : ?>
					<option value="<?php echo esc_attr( $type_id ) ?>" <?php selected( $type_id, $instance['type'] ) ?>><?php echo esc_html( $title ) ?></option>
				<?php endforeach ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'wrapper' ) ?>"><?php _e( 'Wrapper Container', 'constructor-siteorigin' ) ?></label>
			<select id="<?php echo $this->get_field_id( 'wrapper' ) ?>" name="<?php echo $this->get_field_name( 'wrapper' ) ?>">
				<?php foreach ( $wrappers as $wrapper_id => $wrapper_title ) : ?>
					<option value="<?php echo esc_attr( $wrapper_id ) ?>" <?php selected( $wrapper_id, $instance['wrapper'] ) ?>><?php echo esc_html( $wrapper_title ) ?></option>
				<?php endforeach ?>
			</select>
		</p>

		<p>
				<label for="<?php echo $this->get_field_id( 'class' ) ?>"><?php _e( 'Wrapper Class', 'constructor-siteorigin' ) ?></label>
				<input type="text"  id="<?php echo $this->get_field_id( 'class' ) ?>" name="<?php echo $this->get_field_name( 'class' ) ?>" value="<?php echo esc_attr( $instance['class'] ) ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'custom' ) ?>"><?php _e( 'Custom Meta Key', 'constructor-siteorigin' ) ?></label>
				<input type="text"  id="<?php echo $this->get_field_id( 'custom' ) ?>" name="<?php echo $this->get_field_name( 'custom' ) ?>" value="<?php echo esc_attr( $instance['custom'] ) ?>" />
			</p>
		<?php
	}
}
