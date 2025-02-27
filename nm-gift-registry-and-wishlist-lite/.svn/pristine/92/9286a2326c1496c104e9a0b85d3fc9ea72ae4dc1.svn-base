<?php

namespace NMGR\Lib;

use NMGR\Lib\Single;

defined( 'ABSPATH' ) || exit;

class Archive {

	public static function get_args( $atts = [] ) {
		$args = wp_parse_args(
			$atts,
			array(
				'title' => '',
				'show_header' => true,
				'show_title' => true,
				'show_results_count' => true,
				'type' => 'gift-registry',
			)
		);

		$args[ 'show_header' ] = filter_var( $args[ 'show_header' ], FILTER_VALIDATE_BOOLEAN );
		$args[ 'show_title' ] = filter_var( $args[ 'show_title' ], FILTER_VALIDATE_BOOLEAN );
		$args[ 'show_results_count' ] = filter_var( $args[ 'show_results_count' ], FILTER_VALIDATE_BOOLEAN );

		return apply_filters( 'nmgr_archive_template_args', $args );
	}

	/**
	 * Get the template for outputting wishlist archive results
	 *
	 * Works with search results too.
	 *
	 * This function or the shortcode attached to it should be used after wp_loaded hook
	 * as that is when the wp_query global exists.
	 *
	 * @param array $atts Attributes needed to compose the template.
	 * @param bool $echo Whether to echo or return the template.
	 */
	public static function get_template( $atts = array() ) {
		$single = new Single();
		$single->source = 'archive'; // Register that we are using the [nmgr_archive] shortcode or its block
		if ( !$single->is_page( 'archive' ) ) {
			return $single->get_template( $atts );
		}

		$template_args = static::get_args( $atts );
		$query_args = [];

		if ( isset( $_GET[ 'nmgr_s' ] ) || !empty( $template_args[ 'show_results_if_no_search_query' ] ) ) {
			// Set the search term when search wishlists or when displaying search templates if no search query
			$query_args[ 's' ] = static::get_search_query();

			// When searching wishlists, search in wishlist post meta
			if ( isset( $_GET[ 'nmgr_s' ] ) ) {
				add_filter( 'posts_search', array( __CLASS__, 'search_in_wishlist_postmeta' ) );
			}
		}

		if ( nmgr()->is_pro ) {
			// Exclude wishlists excluded from search results
			$excluded = get_option( 'nmgr_exclude_from_search', [] );
			if ( !empty( $excluded ) ) {
				$query_args[ 'post__not_in' ] = array_unique( $excluded );
			}

			// Exclude archived wishlists
			$query_args[ 'meta_query' ] = [
				'relation' => 'OR',
				[
					'key' => '_nmgr_archived',
					'compare' => 'NOT EXISTS'
				],
				[
					'key' => '_nmgr_archived',
					'value' => '1',
					'compare' => '!='
				],
			];
		}

		$query_args[ 'paged' ] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : '';
		$query_args[ 'post_type' ] = 'nm_gift_registry';

		if ( !empty( $template_args[ 'type' ] ) ) {
			$query_args[ 'tax_query' ] = array( array(
					'taxonomy' => 'nm_gift_registry_type',
					'field' => 'slug',
					'terms' => $template_args[ 'type' ],
					'operator' => 'IN',
				) );
		}

		ob_start();

		$the_query = new \WP_Query( $query_args );

		static::loop( $the_query, $template_args );

		return ob_get_clean();
	}

	/**
	 * Display posts found using the standard wishlist template.
	 *
	 * This function is meant to provide a consistent template for displaying wishlist posts
	 * on any nm_gift_registry archive page such as search, categories, tags, post_type_archive e.t.c.
	 * It also works with a custom $wp_query object.
	 *
	 * @param WP_Query $query Custom query object if provided. Uses global $wp_query by default.
	 * @param array $action_args The arguments supplied to the action hooks used in the function.
	 */
	public static function loop( $query = null, $action_args = array() ) {
		global $wp_query;

		$custom_query = is_a( $query, 'WP_Query' ) && !$query->is_main_query();
		$the_query = $query ? $query : $wp_query;
		$type = $action_args[ 'type' ] ?? null;

		if ( 'nm_gift_registry' !== $the_query->get( 'post_type' ) ) {
			return;
		}

		if ( $type && !nmgr_get_type_option( $type, 'enable' ) ) {
			return;
		}

		self::archive_header( $the_query, $action_args );
		self::archive_results_count_and_page_number( $the_query, $action_args );

		do_action_deprecated( 'nmgr_archive_header', [ $the_query, $action_args ], '5.6' );

		if ( $the_query->have_posts() ) :

			static::styles();

			do_action( 'nmgr_before_archive_loop', $the_query, $action_args );

			while ( $the_query->have_posts() ) :

				$the_query->the_post();

				static::content();

			endwhile;

			do_action( 'nmgr_after_archive_loop', $the_query, $action_args );

			/**
			 * Set the custom query to the global $wp_query object so that we can use
			 * wordpress default pagination
			 */
			if ( $custom_query ) {
				$GLOBALS[ 'wp_query' ] = $query;
			}

			nmgr_paging_nav();

			/**
			 * reset the global $wp_query object after pagination.
			 */
			if ( $custom_query ) :
				wp_reset_query();
			endif;

		else:

			do_action( 'nmgr_archive_no_results_found', $the_query, $action_args );

		endif;
	}

	public static function content() {
		$wishlist = nmgr_get_wishlist( get_the_ID() );
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'nmgr-archive-content' ); ?>>
			<?php if ( nmgr()->is_pro && ($wishlist->get_thumbnail() || $wishlist->get_background_image_id()) ) : ?>
				<div class="entry-thumbnail nmgr-col">
					<a href="<?php echo esc_url( $wishlist->get_permalink() ); ?>" rel="bookmark">
						<?php
						if ( $wishlist->get_thumbnail() ) {
							echo $wishlist->get_thumbnail();
						} else {
							echo $wishlist->get_background_thumbnail();
						}
						?>
					</a>
				</div>
			<?php endif; ?>

			<div class="entry-content nmgr-col">
				<h2 class="entry-title nmgr-title">
					<a href="<?php echo esc_url( $wishlist->get_permalink() ); ?>" rel="bookmark">
						<?php echo esc_html( $wishlist->get_title() ); ?>
					</a>
				</h2>
				<?php
				if ( $wishlist->get_event_date() || $wishlist->get_full_name() ) {
					echo "<p class='nmgr-details'>";
					$wishlist->get_full_name() ? printf( '<span class="nmgr-full-name">%s</span>', esc_html( $wishlist->get_full_name() ) ) : '';
					$wishlist->get_event_date() ? printf(
								'<span class="nmgr-event-date">%1$s <span class="nmgr-date">%2$s</span></span>',
								esc_html( nmgr()->is_pro ?
										__( 'Event date:', 'nm-gift-registry' ) :
										__( 'Event date:', 'nm-gift-registry-lite' ) ),
								esc_html( nmgr_format_date( $wishlist->get_event_date() ) )
							) : '';
					echo "</p>";
				}
				?>
			</div>

			<div class="entry-action nmgr-col">
				<a href="<?php echo esc_url( $wishlist->get_permalink() ); ?>" class="button" rel="bookmark">
					<?php
					echo esc_html( nmgr()->is_pro ?
							__( 'View', 'nm-gift-registry' ) :
							__( 'View', 'nm-gift-registry-lite' )
					);
					?>
				</a>
			</div>

		</article>
		<?php
	}

	public static function get_search_template_args( $atts = [] ) {
		$args_unfiltered = nmgr_merge_args(
			array(
				'show_form' => true,
				'show_results' => true,
				'form_action' => nmgr_get_url(),
				'show_results_if_no_search_query' => true,
				'input_required' => false,
				'input_placeholder' => sprintf(
					/* translators: %s: wishlist type title */
					nmgr()->is_pro ? __( 'Search %s&hellip;', 'nm-gift-registry' ) : __( 'Search %s&hellip;', 'nm-gift-registry-lite' ),
					nmgr_get_type_title( '', true )
				),
				'submit_button_text' => apply_filters( 'nmgr_search_submit_button_text',
					nmgr()->is_pro ?
					_x( 'Search', 'submit button', 'nm-gift-registry' ) :
					_x( 'Search', 'submit button', 'nm-gift-registry-lite' )
				),
				'hidden_fields' => array() // for now hidden fields can only be added via code and not shortcode
			),
			( array ) $atts
		);

		$args = wp_parse_args( filter_var_array( $args_unfiltered, array(
			'show_form' => FILTER_VALIDATE_BOOLEAN,
			'show_results' => FILTER_VALIDATE_BOOLEAN,
			'form_action' => FILTER_SANITIZE_URL,
			'show_results_if_no_search_query' => FILTER_VALIDATE_BOOLEAN,
			'input_required' => FILTER_VALIDATE_BOOLEAN,
			'input_placeholder' => FILTER_DEFAULT,
			'submit_button_text' => FILTER_DEFAULT,
			) ), $args_unfiltered );

		return apply_filters( 'nmgr_search_template_args', $args );
	}

	/**
	 * Get the wishlist search template
	 * This includes the search form and search results, depending on the arguments provided
	 *
	 * @param type $atts Attributes needed to compose the template
	 * @param boolean $echo Whether to echo the template. Default false.
	 * @return string Template html
	 */
	public static function get_search_template( $atts = '' ) {
		$args = static::get_search_template_args( $atts );

		$template = '';

		if ( !$args[ 'show_results_if_no_search_query' ] && !static::get_search_query() ) {
			$args[ 'show_results' ] = false;
		}

		if ( $args[ 'show_form' ] ) {
			$vars = array(
				'form_action' => $args[ 'form_action' ],
				'input_name' => 'nmgr_s',
				'input_value' => self::get_search_query(),
				'input_placeholder' => $args[ 'input_placeholder' ],
				'input_required' => $args[ 'input_required' ],
				'hidden_fields' => array_filter( ( array ) $args[ 'hidden_fields' ] ),
				'submit_button_text' => $args[ 'submit_button_text' ],
			);

			$temp = static::search_form( $vars );

			$template .= apply_filters( 'nmgr_search_form', $temp, $vars );
		}

		if ( $args[ 'show_results' ] ) {
			$template .= static::get_template( $args );
		}

		return $template;
	}

	public static function get_search_results_template( $atts = [] ) {
		$defaults = [ 'show_form' => false ];
		return static::get_search_template( wp_parse_args( $atts, $defaults ) );
	}

	/**
	 * Get the search form for finding a wishlist on the frontend
	 */
	public static function get_search_form( $args = [] ) {
		$defaults = array(
			'show_results' => false,
			'form_action' => nmgr_get_url(),
		);

		return static::get_search_template( wp_parse_args( $args, $defaults ) );
	}

	public static function get_search_query() {
		$s = $_GET[ 'nmgr_s' ] ?? '';
		return sanitize_text_field( wp_unslash( apply_filters( 'nmgr_get_search_query', $s ) ) );
	}

	public static function search_form( $args ) {
		ob_start();
		$form_action = $args[ 'form_action' ];
		$input_name = $args[ 'input_name' ];
		$input_placeholder = $args[ 'input_placeholder' ];
		$input_required = $args[ 'input_required' ];
		$input_value = $args[ 'input_value' ];
		$submit_button_text = $args[ 'submit_button_text' ];
		$hidden_fields = $args[ 'hidden_fields' ];
		?>
		<form role="search" method="get" class="nmgr-search-form" style="display:flex;"
					action="<?php echo esc_url( $form_action ); ?>">
			<label class="screen-reader-text" for="<?php echo esc_attr( $input_name ); ?>">
				<?php
				echo esc_html( nmgr()->is_pro ?
						__( 'Search for:', 'nm-gift-registry' ) :
						__( 'Search for:', 'nm-gift-registry-lite' )
				);
				?>
			</label>
			<input type="search"
						 class="search-field"
						 placeholder="<?php echo esc_attr( $input_placeholder ); ?>"
						 value="<?php echo esc_attr( stripslashes( $input_value ) ); ?>"
						 <?php echo (!empty( $input_required )) ? 'required' : ''; ?>
						 style="flex-grow:1;margin-right:.09375em;"
						 name="<?php echo esc_attr( $input_name ); ?>" />
						 <?php if ( $submit_button_text ) : ?>
				<button type="submit">
					<?php echo esc_html( $submit_button_text ); ?>
				</button>
			<?php endif; ?>
			<?php
			if ( isset( $hidden_fields ) && !empty( $hidden_fields ) ) :
				foreach ( $hidden_fields as $key => $value ) :
					?>
					<input type="hidden"
								 name="<?php echo esc_html( $key ); ?>"
								 value="<?php echo esc_html( $value ); ?>" />
								 <?php
							 endforeach;
						 endif;
						 ?>
		</form>
		<?php
		return ob_get_clean();
	}

	public static function archive_header( $query, $args ) {
		if ( $args[ 'show_header' ] ?? true ) :
			?>
			<header class="nmgr-archive-header" style="text-align:center;">
				<?php
				if ( $args[ 'show_title' ] ?? true ) :
					if ( !empty( $args[ 'title' ] ) ) {
						$title = $args[ 'title' ];
					} elseif ( $query->is_search() ) {
						$title = sprintf(
							/* translators: %s: search query */
							nmgr()->is_pro ? __( 'Search results for: &ldquo;%s&rdquo;', 'nm-gift-registry' ) : __( 'Search results for: &ldquo;%s&rdquo;', 'nm-gift-registry-lite' ),
							self::get_search_query()
						);
					} else {
						$title = get_the_archive_title();
					}

					$title = apply_filters( 'nmgr_archive_title', $title, $query, $args );

					if ( $title ) :
						?>
						<h2 class="nmgr-archive-title">
							<?php echo wp_kses_post( $title ); ?>
						</h2>
						<?php
					endif;
				endif;

				do_action_deprecated( 'nmgr_after_archive_title', [ $query, $args ], '5.6' );
				?>
			</header>
			<?php
		endif;
	}

	public static function archive_results_count_and_page_number( $query, $args ) {
		$show_on_page = apply_filters_deprecated( 'nmgr_show_archive_results_count', [ $args[ 'show_results_count' ] ], '5.6' );

		if ( $show_on_page ) :
			?>
			<p class="nmgr-archive-results-metadata" style="text-align:center;">
				<?php
				$results_found = '<span class="results-found">' . sprintf(
						/* translators: %d: total results */
						nmgr()->is_pro ? _n( '%d result found', '%d results found', $query->found_posts, 'nm-gift-registry' ) : _n( '%d result found', '%d results found', $query->found_posts, 'nm-gift-registry-lite' ),
						( int ) $query->found_posts
					) . '</span>';

				if ( get_query_var( 'paged' ) ) {
					$results_found .= '<span class="page-number">' . sprintf(
							/* translators: %s: page number */
							nmgr()->is_pro ? __( '&nbsp;&ndash; Page %s', 'nm-gift-registry' ) : __( '&nbsp;&ndash; Page %s', 'nm-gift-registry-lite' ),
							get_query_var( 'paged' )
						) . '</span>';
				}
				echo $results_found;
				?>
			</p>
			<?php
		endif;
	}

	/**
	 * Improve the default wishlist post type search to also search in certain postmeta fields
	 */
	public static function search_in_wishlist_postmeta( $where ) {
		global $wpdb;

		// Include password protected wishlists in search results
		if ( nmgr()->is_pro && !is_user_logged_in() ) {
			$pattern = " AND ({$wpdb->prefix}posts.post_password = '')";
			$where = str_replace( $pattern, '', $where );
		}

		// Locations in postmeta table to search for search term
		$meta_keys_to_search = apply_filters( 'nmgr_meta_keys_to_search', array(
			'_last_name',
			'_first_name',
			'_partner_first_name',
			'_partner_last_name',
			'_email'
			) );

		$meta_args = array( 'relation' => 'OR' );

		foreach ( $meta_keys_to_search as $key ) {
			$meta_args[] = array(
				'key' => $key,
				'value' => self::get_search_query(),
				'compare' => 'like',
			);
		}

		// Use WP_Meta_Query to compose sql for future maintenance
		$meta_query = new \WP_Meta_Query( $meta_args );
		$sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );

		$search_post_ids = array();
		$found_post_ids = $wpdb->get_col( "SELECT ID FROM {$wpdb->posts} " . $sql[ 'join' ] . $sql[ 'where' ] );

		if ( count( $found_post_ids ) > 0 ) {
			$search_post_ids = array_filter( array_unique( array_map( 'absint', $found_post_ids ) ) );
		}

		if ( count( $search_post_ids ) > 0 ) {
			$where = str_replace(
				'AND (((',
				"AND ( ({$wpdb->posts}.ID IN (" . implode( ',', $search_post_ids ) . ")) OR ((",
				$where
			);
		}

		return $where;
	}

	public static function styles() {
		?>
		<style>
			.nmgr-archive-content {
				padding: 0.9375em;
				display: flex;
				align-items: center;
				flex-flow: column;
				background-color: #f8f8f8;
			}
			.nmgr-archive-content:not(:last-child) {
				margin-bottom: 2em;
			}
			.nmgr-archive-content .entry-content {
				flex-grow: 1;
			}
			.nmgr-archive-content .nmgr-post-thumbnail {
				width: 7.5em;
				height: auto;
				margin: 0;
			}
			.nmgr-archive-content .entry-thumbnail a {
				display: block;
			}
			.nmgr-archive-content .nmgr-col {
				margin-left: 0.625em;
				margin-right: 0.625em;
			}
			.nmgr-archive-content .nmgr-full-name,
			.nmgr-archive-content .nmgr-event-date {
				display: block;
			}
			@media (min-width: 767px) {
				.nmgr-archive-content {
					flex-flow: row;
					justify-content: space-between;
					align-items: flex-start;
					padding: 2.5em;
				}
			}
			.nmgr-archive-content ~ nav.pagination {
				padding: 2.617924em 0;
				text-align: center;
			}
			.nmgr-archive-content ~ nav.pagination .page-numbers {
				display: inline-block;
				list-style: none;
				margin: 0;
				padding: 0.3342343017em 0.875em;
				background-color: rgba(0, 0, 0, 0.025);
			}
			.nmgr-archive-content ~ nav.pagination .page-numbers:hover {
				background-color: rgba(0, 0, 0, 0.05);
			}
			.nmgr-archive-content ~ nav.pagination .page-numbers.current {
				background-color: #e6e6e6;
			}
		</style>
		<?php
	}

}
