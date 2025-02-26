<?php
/**
 * Get the Plugin Default Options.
 *
 * @link            https://aarambhathemes.com/
 * @since           WP React Setting 1.0.0
 *
 * @return array    Default Options
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_default_options' ) ) {

	function aarambha_kits_default_options() {
		$default_theme_options = array(
			'block-element-1'  => true,
			'block-element-2'  => true,
			'block-element-3'  => true,
			'block-element-4'  => true,
			'block-element-5'  => true,
			'block-element-6'  => true,
			'block-element-7'  => true,
			'block-element-8'  => true,
			'block-element-9'  => true,
			'block-element-10' => true,
			'block-element-11' => true,
			'block-element-12' => true,
			'block-element-13' => true,
			'block-element-14' => true,
			'block-element-15' => true,
			'block-element-16' => true,
			'block-element-17' => true,
			'block-element-18' => true,
			'block-element-19' => true,
			'block-element-20' => true,
			'block-element-21' => true,
			'block-widget-1'   => true,
			'block-widget-2'   => true,
			'block-widget-3'   => true,
			'block-widget-4'   => true,
			'block-widget-5'   => true,
			'block-widget-6'   => true,
			'block-widget-7'   => true,
			'block-widget-8'   => true,
			'block-widget-9'   => true,
		);
		return apply_filters( 'aarambha_kits_default_options', $default_theme_options );
	}
}

/**
 * Get the Plugin Saved Options.
 *
 * @link            https://aarambhathemes.com/
 * @since           WP React Setting 1.0.0
 *
 * @param string    $key optional option key
 * @return mixed    All Options Array Or Options Value
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_get_options' ) ) {

	function aarambha_kits_get_options( $key = '' ) {
		$options         = get_option( 'aarambha_kits_options' );
		$default_options = aarambha_kits_default_options();

		if ( ! empty( $key ) ) {
			if ( isset( $options[ $key ] ) ) {
				return $options[ $key ];
			}
			$value = isset( $default_options[ $key ] ) ? $default_options[ $key ] : '';
			return $value;
		} else {
			if ( ! is_array( $options ) ) {
				$options = array();
			}
			return array_merge( $default_options, $options );
		}
	}
}

/**
 * Delete the Plugin Saved Options.
 *
 * @link            https://aarambhathemes.com/
 * @since           WP React Setting 1.0.0
 *
 * @param string    $key optional option key
 * @return boolean  after delete or update option
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_delete_options' ) ) {

	function aarambha_kits_delete_options( $key = '' ) {

		if ( ! empty( $key ) ) {
			delete_option( $key );
			$g_options = aarambha_kits_get_options();
			if ( isset( $g_options[ $key ] ) ) {
				unset( $g_options[ $key ] );
				update_option( 'aarambha_kits_options', $g_options );
			}
		} else {
			delete_option( 'aarambha_kits_options' );
		}
		return false;
	}
}

/**
 * Check Aarambha Kits Pro Version
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.0
 *
 * @return boolean
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_pro_version' ) ) {

	function aarambha_kits_pro_version() {

		return ( class_exists( 'Aarambha_Kits_Pro' ) ) ? true : false;
	}
}

/**
 * Get an array of terms from a taxonomy.
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.0
 *
 * @param string|array $taxonomies See https://developer.wordpress.org/reference/functions/get_terms/ for details.
 * @return array
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_get_terms' ) ) {

	function aarambha_kits_get_terms( $taxonomies ) {
		$items = array();

		// Get the post types.
		$terms = get_terms(
			array(
				'taxonomy'   => $taxonomies,
				'hide_empty' => true,
			)
		);
		// Build the array.
		if ( $terms ) {
			foreach ( $terms as $term ) {
				$items[ $term->slug ] = esc_html( $term->name );
			}
		}
		return $items;
	}
}

/**
 * Return custom wp query arguments.
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.0
 *
 * @param   array   $settings
 * @param   string  $paged
 * @param   string  $post_type
 * @return  array   query argumenents in array
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_query_agrs' ) ) {

	function aarambha_kits_query_agrs( $settings, $paged, $post_type = 'post' ) {

		$args = array(
			'paged'               => absint( $paged ),
			'posts_per_page'      => 4,
			'post_status'         => 'publish',
			'no_rows_found'       => true,
			'ignore_sticky_posts' => true,
		);

		$new_args = array();
		// Post Type
		$new_args['post_type'] = sanitize_text_field( $post_type );

		// Posts Per Page
		if ( isset( $settings['base_posts_limit'] ) ) {
			$new_args['posts_per_page'] = absint( $settings['base_posts_limit'] );
		}

		// Order By
		if ( isset( $settings['base_orderby'] ) ) {
			$new_args['orderby'] = sanitize_key( $settings['base_orderby'] );
		}

		// Order
		if ( isset( $settings['base_order'] ) ) {
			$new_args['order'] = sanitize_key( $settings['base_order'] );
		}

		// Offset
		if ( isset( $settings['base_posts_offset'] ) && 0 < $settings['base_posts_offset'] ) {
			$offset             = absint( $settings['base_posts_offset'] );
			$post_per_page      = isset( $settings['base_posts_limit'] ) ? absint( $settings['base_posts_limit'] ) : 4;
			$new_offset         = $offset + ( ( $paged - 1 ) * $post_per_page );
			$new_args['offset'] = absint( $new_offset );
		}

		// Include/Exclude posts
		$excluded_posts = array();
		if ( isset( $settings['base_exclude_ids'] ) && $settings['base_exclude_ids'] !== '' ) {
			$excluded_posts = array_merge( $excluded_posts, explode( ',', sanitize_text_field( $settings['base_exclude_ids'] ) ) );
		}
		if ( ! empty( $excluded_posts ) ) {
			$new_args['post__not_in'] = wp_parse_id_list( $excluded_posts );
		}

		// post categories
		if ( ! empty( $settings['base_tax_category_post_filter'] ) ) {
			$new_args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => map_deep( wp_unslash( $settings['base_tax_category_post_filter'] ), 'sanitize_text_field' ),
			);
		}
		// post tags
		if ( ! empty( $settings['base_tax_post_tag_post_filter'] ) ) {
			$new_args['tax_query'][] = array(
				'taxonomy' => 'post_tag',
				'field'    => 'slug',
				'terms'    => map_deep( wp_unslash( $settings['base_tax_post_tag_post_filter'] ), 'sanitize_text_field' ),
			);
		}

		// Posts Offset
		if ( ! empty( $settings['base_posts_offset'] ) && $settings['base_posts_offset'] !== '' ) {
			$query_args['offset'] = absint( $settings['base_posts_offset'] );
		}

		return wp_parse_args( $new_args, $args );
	}
}

/**
 * Displays an optional post thumbnail.
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.0
 *
 * @param string    $size image size
 * @param string    $ratio image ratio
 * @return  void    html
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_post_thumbnail' ) ) {

	function aarambha_kits_post_thumbnail( $size = 'full', $ratio = '16x9', $md_ratio = null, $lg_ratio = null ) {

		if ( post_password_required() || is_attachment() ) {
			return;
		}
		$md_ratio = ( $md_ratio !== null ) ? $md_ratio : $ratio;
		$lg_ratio = ( $lg_ratio !== null ) ? $lg_ratio : $ratio;
		if ( has_post_thumbnail() ) :
			?>
			<figure class="post-featured-image" data-ratio="<?php echo esc_attr( $ratio ); ?>" data-md-ratio="<?php echo esc_attr( $md_ratio ); ?>" data-lg-ratio="<?php echo esc_attr( $lg_ratio ); ?>">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
					the_post_thumbnail(
						$size,
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
					?>
				</a>
			</figure>
		<?php else : ?>
			<figure class="post-featured-image" data-ratio="<?php echo esc_attr( $ratio ); ?>" data-md-ratio="<?php echo esc_attr( $md_ratio ); ?>" data-lg-ratio="<?php echo esc_attr( $lg_ratio ); ?>">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" alt="<?php esc_attr_e( 'Placeholder Image', 'aarambha-kits' ); ?>" />
				</a>
			</figure>
			<?php
		endif;
	}
}

/**
 * Display/Returns the category names for Elementor widgets.
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.0
 *
 * @param string    $size image size
 * @param string    $ratio image ratio
 * @return  void    html
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_post_category' ) ) {

	/**
	 * Display/Returns the category names for Elementor widgets.
	 *
	 * @param bool $display The option to display or echo the value.
	 *
	 * @return mixed
	 */
	function aarambha_kits_post_category( $display = 1 ) {

		$categories = get_the_category();
		$output     = '';

		if ( $categories ) {
			$output .= '<div class="entry-categories d-flex flex-wrap">';

			foreach ( $categories as $category ) {

				$output .= '<a class="post-category cat-item-' . absint( $category->term_id ) . '" href="' . esc_url( get_category_link( $category->term_id ) ) . '"  rel="category tag">' . esc_html( $category->cat_name ) . '</a>';
			}

			$output .= '</div>';

			if ( 1 == $display ) {
				echo wp_kses_post( $output );
			}
		}

		if ( 0 == $display ) {
			return $output;
		}
	}
}

/**
 * Display the post meta html content
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.0
 *
 * @param array     $post_meta
 * @return  void    html
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_post_meta' ) ) {

	function aarambha_kits_post_meta( $post_meta = null ) {

		if ( $post_meta ) {
			ksort( $post_meta );

			echo '<div class="aarambha-kits-entry-meta d-flex flex-wrap align-items-center">';

			foreach ( $post_meta as $key => $value ) {
				// Tags
				if ( $value['type'] === 'tag' && 'post' === get_post_type() ) {
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'aarambha-kits' ) );
					if ( $tags_list ) {
						/* translators: 1: list of tags. */
						printf( '<div class="tag-list">%1$s</div>', wp_kses_post( $tags_list ) );
					}
				}
				// Author
				if ( $value['type'] === 'author' ) {
					$author_avatar = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'aarambha_kits_meta_avatar_size', 20 ) );
					$byline        = '<span class="author vcard">' . esc_html( get_the_author() ) . '</span>';
					printf( '<div class="byline"><a class="url fn n d-flex align-items-center" href="%1$s">%2$s %3$s</a></div>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), wp_kses_post( $author_avatar ), wp_kses_post( $byline ) );
				}
				// Date
				if ( $value['type'] === 'date' ) {

					$time_string = '<time class="entry-date post-meta-item published updated" datetime="%1$s">%2$s</time>';

					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
					}

					$time_string = sprintf(
						$time_string,
						esc_attr( get_the_date( DATE_W3C ) ),
						esc_html( get_the_date() ),
						esc_attr( get_the_modified_date( DATE_W3C ) ),
						esc_html( get_the_modified_date() )
					);

					printf( '<div class="post-date"><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '" rel="bookmark">%1$s</a></div>', $time_string );
				}
				// Comment
				if ( $value['type'] === 'comment' ) {
					if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
						echo '<div class="comments-link">';
						/* translators: %s: Post title. Only visible to screen readers. */
						comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'aarambha-kits' ), get_the_title() ) );
						echo '</div>';
					}
				}
				// Post Views
				if ( $value['type'] === 'post-views' ) {
					echo '<div class="post-views">';
					echo wp_kses_post( Aarambha_Kits_Post_Views::get_instance()->post_views_display( get_the_ID() ) );
					echo '</div>';
				}
				// Read Time
				if ( $value['type'] === 'read-time' ) {
					echo '<div class="post-read-time">';
					aarambha_kits_read_time();
					echo '</div>';

				}
			}
			echo '</div><!-- .aarambha-kits-entry-meta -->';
		}
	}
}

/**
 * Functionaly for display content with characters or words with limiation
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.0
 *
 * @param int       $length content length
 * @param string    $content_type content type as characters or words
 * @param string    $end content suffix as null or string
 * @return  void    html
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_content_limit' ) ) {

	function aarambha_kits_content_limit( $length = 150, $content_type = 'characters', $end = null ) {

		global $post;

		$end          = $end ? $end : '';
		$post_excerpt = $post->post_excerpt;

		if ( ! empty( $post_excerpt ) ) {

			$post_excerpt = apply_filters( 'the_excerpt', $post_excerpt );

			if ( $content_type == 'characters' ) {
				$post_excerpt = strip_tags( $post_excerpt );
				$post_excerpt = substr( $post_excerpt, 0, $length );
				$post_excerpt = substr( $post_excerpt, 0, strrpos( $post_excerpt, ' ' ) );
				$post_excerpt = trim( preg_replace( '/\s+/', ' ', $post_excerpt ) );
				$post_excerpt = $post_excerpt . $end;
			} else {

				$post_excerpt = wp_trim_words( $post_excerpt, $length, $end );
			}

			echo wpautop( wp_kses_post( $post_excerpt ) );

		} else {

			$post_content = $post->post_content;
			$post_content = apply_filters( 'the_content', $post_content );
			$post_content = preg_replace( '@\[caption[^\]]*?\].*?\[\/caption]@si', '', $post_content );
			$post_content = preg_replace( '@<script[^>]*?>.*?</script>@si', '', $post_content );
			$post_content = preg_replace( '@<style[^>]*?>.*?</style>@si', '', $post_content );
			$post_content = preg_replace( ' (\[.*?\])', '', $post_content );
			$post_content = strip_shortcodes( $post_content );
			$post_content = strip_tags( $post_content );

			if ( $content_type == 'characters' ) {

				$post_content = substr( $post_content, 0, $length );
				$post_content = substr( $post_content, 0, strrpos( $post_content, ' ' ) );
				$post_content = trim( preg_replace( '/\s+/', ' ', $post_content ) );
				$post_content = $post_content . $end;
			} else {

				$post_content = wp_trim_words( $post_content, $length, $end );
			}

			echo wpautop( wp_kses_post( $post_content ) );
		}
	}
}

/**
 * Functionaly for reading time for the post content
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.0
 *
 * @return  void    html content
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_read_time' ) ) {

	function aarambha_kits_read_time() {

		global $post;
		// get the content
		$the_content = $post->post_content;
		// count the number of words
		$words = str_word_count( strip_tags( $the_content ) );
		// COUNT THE NUMBER OF IMAGES
		$image_count = substr_count( $the_content, '<img' );
		// rounding off and deviding per 200 words per minute
		$minute = floor( $words / 200 );
		// rounding off to get the seconds
		$second = floor( $words % 200 / ( 200 / 60 ) );
		// READING TIME OF IMAGES - 10 SECONDS PER IMAGE
		$image_time = ( $image_count * 10 ) / 60;
		// ADD READING TIME OF TEXTS AND IMAGES
		$total_time = round( $minute + $image_time );

		// calculate the amount of time needed to read
		$estimate = ( $total_time >= 1 )
					? $total_time . esc_html__( ' Min', 'aarambha-kits' ) . ', ' . $second . esc_html__( ' Sec', 'aarambha-kits' )
					: $second . esc_html__( ' Sec', 'aarambha-kits' );
		// create output
		$output = '<span class="calculated-time">' . $estimate . ' ' . esc_html__( 'Read', 'aarambha-kits' ) . '</span>';
		// return the estimate
		echo wp_kses_post( $output );
	}
}

/**
 * Functionaly for removing array element from multidimension array
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.0
 *
 * @param array     $array multidimention array
 * @param string    $key array index key
 * @param array     $values search values in array from multidementional array
 * @return array    list of array
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_remove_element' ) ) {

	function aarambha_kits_remove_element( $array, $key, $values ) {
		foreach ( $array as $subKey => $subArray ) {
			if ( in_array( $subArray[ $key ], $values ) ) {
				unset( $array[ $subKey ] );
			}
		}
		return $array;
	}
}

/**
 * Functionaly sanitize checkbox
 *
 * @link            https://aarambhathemes.com/
 * @since           1.0.1
 *
 * @param string    $checked boolen value
 * @return boolean
 *
 * @package         Aarambha_Kits
 * @author          Aarambha Themes <aarambhathemes@gmail.com>
 */
if ( ! function_exists( 'aarambha_kits_sanitize_checkbox' ) ) {
	function aarambha_kits_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
}
