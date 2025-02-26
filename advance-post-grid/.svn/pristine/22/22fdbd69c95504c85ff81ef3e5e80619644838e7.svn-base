<?php
/**
 * Plugin Name:       Advance Post Grid
 * Plugin URI         https://weboptics.co/
 * Description:       Block to add post type with advance options.
 * Requires at least: 6.1
 * Requires PHP:      7.2
 * Version:           1.1.1
 * Author:            WebOptics
 * Author URI:        https://github.com/weboptics
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       advance-post-grid
 *
 * @package CreateBlock
 */

// disallow direct access.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register class for plugin init
 */
class WO_APG_Init {

	/**
	 * Initial function
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'block_advance_post_grid_block_init' ) );

	}
	/**
	 * Registers the block using the metadata loaded from the `block.json` file.
	 * Behind the scenes, it registers also all assets so they can be enqueued
	 * through the block editor in the corresponding context.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	public function block_advance_post_grid_block_init() {
		register_block_type( __DIR__ . '/build' );
	}

	/**
	 * Calculate Read Time
	 *
	 * @param string $content content string.
	 */
	public static function calculate_read_time( $content ) {
		$word_count       = str_word_count( strip_tags( $content ) );
		$words_per_minute = 200;
		$read_time        = ceil( $word_count / $words_per_minute );
		return $read_time;
	}

	/**
	 * Pagination Function
	 *
	 * The pagination function to display pagination on any archive page
	 *
	 * @param number $pages are total number of pages.
	 * @param array  $args is a array of pagination settings.
	 *
	 * @return void|string
	 */
	public static function pagination( $pages = '', $args = array() ) {
		$showitems                 = $args['showitems'] ?? 5;
		$first_last                = $args['first_last'] ?? true;
		$prev_next                 = $args['prev_next'] ?? true;
		$show_range                = $args['show_range'] ?? true;
		$has_dotted                = $args['has_dotted'] ?? false;
		$is_ajax                   = $args['is_ajax'] ?? false;
		$class_name                = $args['class_name'] ?? '';
		$ajax_paged                = $args['paged'] ?? 1;
		$pagination_unique_classes = 'pagination-' . $class_name;
		if ( true === $is_ajax ) {
			$paged = $ajax_paged;
		} else {
			$paged = $ajax_paged;
		}

		if ( '' === $pages ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( ! $pages ) {
				$pages = 1;
			}
		}
		if ( $is_ajax ) {
			$html = '';
			if ( 1 !== $pages ) {
				$pagination_unique_classes .= ' ajax-pagination-' . $class_name;

				$html .= '<div class="pagination">';

				// Previous button.
				if ( $paged > 1 ) {
					$html .= '<span role="button" data-value="' . ( $paged - 1 ) . '" class="' . esc_html( $pagination_unique_classes ) . ' pre-page d-flex" title="previous">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M19 12H6M6 12L11 7M6 12L11 17" stroke="#228476" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>';
				} else {
					$html .= '<span role="button" class="pre-page d-flex disabled" title="previous">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M19 12H6M6 12L11 7M6 12L11 17" stroke="#228476" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>';
				}
				// Numbered pagination.
				$html .= '<div class="pagination-numbers">';
				if ( $paged > 2 ) {
					$html .= '<span role="button" data-value="1" class="' . esc_html( $pagination_unique_classes ) . ' inactive">1</span>';
					if ( $paged > 3 ) {
						$html .= '<div class="' . esc_html( $pagination_unique_classes ) . ' pagination-dots">…</div>';
					}
				}

				// Display a range of page numbers around the current page.
				for ( $i = max( 1, $paged - 1 ); $i <= min( $pages, $paged + 1 ); $i++ ) {
					if ( $i === $paged ) {
						$html .= '<span class="' . esc_html( $pagination_unique_classes ) . ' current">' . esc_html( $i ) . '</span>';
					} else {
						$html .= '<span role="button" data-value="' . esc_html( $i ) . '" class="' . esc_html( $pagination_unique_classes ) . ' inactive">' . esc_html( $i ) . '</span>';
					}
				}

				// Add dots and the last page number if needed.
				if ( $paged < $pages - 1 ) {
					if ( $paged < $pages - 2 ) {
						$html .= '<div class="' . esc_html( $pagination_unique_classes ) . ' pagination-dots">…</div>';
					}
					$html .= '<span role="button" data-value="' . esc_html( $pages ) . '" class="' . esc_html( $pagination_unique_classes ) . ' inactive">' . esc_html( $pages ) . '</span>';
				}
				$html .= '</div>';

				// Next button.
				if ( $paged < $pages ) {
					$html .= '<span role="button" data-value="' . ( $paged + 1 ) . '" class="' . esc_html( $pagination_unique_classes ) . ' next-page d-flex" title="next">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M5 12H18M18 12L13 7M18 12L13 17" stroke="#228476" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>';
				} else {
					$html .= '<span class="next-page d-flex disabled" title="next">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M5 12H18M18 12L13 7M18 12L13 17" stroke="#228476" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>';
				}

				$html .= '</div>';
			}
			return $html;

		} else {
			if ( 1 !== $pages ) {
				echo '<div class="pagination">';

				// Previous button.
				if ( $paged > 1 ) {
					echo '<a href="' . esc_url( get_pagenum_link( $paged - 1 ) ) . '" class="pre-page d-flex" title="previous">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M19 12H6M6 12L11 7M6 12L11 17" stroke="#228476" stroke-width="2"
								stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</a>';
				} else {
					echo '<span role="button" class="pre-page d-flex disabled" title="previous">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M19 12H6M6 12L11 7M6 12L11 17" stroke="#228476" stroke-width="2"
								stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</span>';
				}
				// Numbered pagination.
				echo '<div class="pagination-numbers">';
				if ( $paged > 2 ) {
					echo '<a href="' . esc_url( get_pagenum_link( 1 ) ) . '" class="inactive">1</a>';
					if ( $paged > 3 ) {
						echo '<div class="pagination-dots">…</div>';
					}
				}

				// Display a range of page numbers around the current page.
				for ( $i = max( 1, $paged - 1 ); $i <= min( $pages, $paged + 1 ); $i++ ) {
					if ( $i === $paged ) {
						echo '<span class="current">' . esc_html( $i ) . '</span>';
					} else {
						echo '<a href="' . esc_url( get_pagenum_link( $i ) ) . '" class="inactive">' . esc_html( $i ) . '</a>';
					}
				}

				// Add dots and the last page number if needed.
				if ( $paged < $pages - 1 ) {
					if ( $paged < $pages - 2 ) {
						echo '<div class="pagination-dots">…</div>';
					}
					echo '<a href="' . esc_url( get_pagenum_link( $pages ) ) . '" class="inactive">' . esc_html( $pages ) . '</a>';
				}
				echo '</div>';

				// Next button.
				if ( $paged < $pages ) {
					echo '<a href="' . esc_url( get_pagenum_link( $paged + 1 ) ) . '" class="next-page d-flex" title="next">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M5 12H18M18 12L13 7M18 12L13 17" stroke="#228476" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" />
							</svg>
					</a>';
				} else {
					echo '<span class="next-page d-flex disabled" title="next">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M5 12H18M18 12L13 7M18 12L13 17" stroke="#228476" stroke-width="2"
									stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>';
				}

				echo '</div>';
			}
		}
	}

	/**
	 * Get current page url
	 */
	public static function get_current_page_url() {

		$protocol = ( ! empty( $_SERVER['HTTPS'] ) && 'off' !== $_SERVER['HTTPS'] ) || ( ! empty( $_SERVER['SERVER_PORT'] ) && 443 === $_SERVER['SERVER_PORT'] ) ? 'https://' : 'http://';
		if ( isset( $_SERVER['HTTP_HOST'] ) && isset( $_SERVER['REQUEST_URI'] ) ) {

			$url = esc_url( wp_unslash( $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ) );
			return $url;
		}
		return null;

	}

	/**
	 * Get page number from url
	 *
	 * @param string $url page url.
	 */
	public static function get_page_number_from_url( $url ) {
		$pattern = '/\/page\/(\d+)\//';

		if ( preg_match( $pattern, $url, $matches ) ) {
			return isset( $matches[1] ) ? (int) $matches[1] : null;
		}
		return null;
	}



}
new WO_APG_Init();
