<?php
/**
 * Elementor search and replace.
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'Elementor_Search_Replace' ) ) {

	class Elementor_Search_Replace {
		/**
		 * Calculate the runtime for the search and replace script.
		 */
		public $runtime;

		public $compact_mode;

		/**
		 * Consturctor.
		 */
		public function __construct() {
			$this->compact_mode = ''; // No

			$this->compact_mode = get_option( 'elemsnr_compact_mode', $this->compact_mode );
		}

		/**
		 * Initializator.
		 */
		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		/**
		 * WP is loaded.
		 */
		public function on_loaded() {}

		/**
		 * Add custom tags to highlight search phrases found.
		 */
		public function add_custom_tags( $elementor_data, $settings, $is_links, $is_images ) {
			if ( $is_links || $is_images ) {
				$replace_with_phrase = $settings['search_phrase'];
			} else {
				$replace_with_phrase = "<elsnr-highlight>{$settings['search_phrase']}</elsnr-highlight>";
			}

			return $this->search_and_replace(
				$elementor_data,
				array_merge(
					$settings,
					array( 'replace_with_phrase' => $replace_with_phrase ),
				),
				'add-tags'
			);
		}

		/**
		 * Clean up the custom <elsnr-highlight> tags.
		 */
		public function remove_custom_tags( $elementor_data, $settings ) {
			return $this->search_and_replace(
				$elementor_data,
				array_merge(
					$settings,
					array(
						'search_phrase'       => array(
							'<elsnr-highlight>',
							'</elsnr-highlight>',
							'&lt;elsnr-highlight&gt;',
							'&lt;/elsnr-highlight&gt;',
						),
						'replace_with_phrase' => '',
					),
				),
				'remove-tags'
			);
		}

		/**
		 * Count all occurrences for the search phrase.
		 */
		public function count_search_occurrences( $elementor_data, $settings ) {
			return $this->search_and_replace(
				$elementor_data,
				array_merge(
					$settings,
					array( 'count' => true ),
				),
				'count'
			);
		}

		/**
		 * Do the actual search and replace with highlighted custom tags.
		 */
		public function do_search_and_replace( $elementor_data, $settings, $is_links, $is_images ) {
			if ( $is_links || $is_images ) {
				$search_phrase       = $settings['search_phrase'];
				$replace_with_phrase = $settings['replace_with_phrase'];
			} else {
				// Need to work with I'm, you're, "Quote" etc. use stripslashes().
				$search_phrase       = stripslashes( $settings['search_phrase'] );
				$replace_with_phrase = stripslashes( $settings['replace_with_phrase'] );

				// Use entities when we search/replace links in <a> with text-only.
				if ( filter_var( $search_phrase, FILTER_VALIDATE_URL ) ) {
					$search_phrase = "&lt;elsnr-highlight&gt;{$search_phrase}&lt;/elsnr-highlight&gt;";
				} else {
					$search_phrase = "<elsnr-highlight>{$search_phrase}</elsnr-highlight>";
				}
			}

			return $this->search_and_replace(
				$elementor_data,
				array_merge(
					$settings,
					array(
						'search_phrase'       => $search_phrase,
						'replace_with_phrase' => $replace_with_phrase,
					),
				),
				'search-and-replace'
			);
		}

		/**
		 * Iterate the array recursively and update the matched key/value with user input.
		 */
		public function search_and_replace( $elementor_data, $settings, $action ) {
			// Elementor data MUST be an array, not NULL or string.
			if ( ! is_array( $elementor_data ) ) {
				return false;
			}

			$iterator = new ELEMSNR_Data_Formatter( new \RecursiveArrayIterator( $elementor_data ), $settings );

			$start = microtime( true );

			$iterator_data_new           = array();
			$iterator_data_counter       = 0;
			$iterator->count_occurrences = 0;

			// Get the Elementor iterator all new values in temp array.
			foreach ( $iterator as $key => $value ) {
				foreach ( $iterator->keys as $id => $keyword ) {
					if ( $keyword === $key ) {
						$iterator_data_new[] = $value;
					}
				}
			}

			// Update the original elementor data with the iterator.
			foreach ( $iterator as $key => $iterator_data ) {
				if ( is_array( $iterator_data ) ) {
					foreach ( $iterator_data as $keyword => $value ) {
						if ( in_array( $keyword, $iterator->keys, true ) ) {
							$replacement_value         = stripslashes( $iterator_data_new[ $iterator_data_counter ] );
							$iterator_data[ $keyword ] = $replacement_value;
							$iterator_data_counter++;

							if ( 'url' === $keyword ) {
								// To handle Image replacement we will need to update the ID as well.
								if ( attachment_url_to_postid( $replacement_value ) ) {
									$iterator_data['id'] = attachment_url_to_postid( $replacement_value );
								}

								if ( 'remove-tags' === $action || strtolower( $value ) === strtolower( $settings['search_phrase'] ) ) {
									// Check if Elementor Pro is activated, '_css_classes' no avail in Free.
									if ( is_plugin_active( 'elementor-pro/elementor-pro.php' ) ) {
										// Add custom highlight class to the of URLs and Images.
										$sub_iterator = $iterator->getSubIterator( $iterator->getDepth() );

										if ( ! $sub_iterator->offsetExists( '_css_classes' ) ) {
											$sub_iterator->offsetSet( '_css_classes', '' );
										}

										$css_classes = $this->update_css_classes( $sub_iterator->offsetGet( '_css_classes' ), $action );
										$sub_iterator->offsetSet( '_css_classes', $css_classes );

										// Recreate the original array structure with highlighter data.
										$this->merge_into_iterator( $iterator, $sub_iterator );
									}
								}

								// Update replacement value and handle image replacement.
								if ( attachment_url_to_postid( $replacement_value ) ) {
									$iterator_data['id'] = attachment_url_to_postid( $replacement_value );
								}
							}

							// Recreate the original array structure with replacement data.
							$this->merge_into_iterator( $iterator, $iterator_data );
						}
					}
				}
			}

			// Return number of occurances ONLY if we need the count.
			if ( true === $settings['count'] ) {
				return $iterator->count_occurrences;
			}

			// This is the original elementor data updated with custom values.
			$elementor_data = $iterator->getArrayCopy();

			$this->runtime = round( microtime( true ) - $start, 2 );

			return $elementor_data;
		}

		/**
		 * Modify and update CSS classes to highlight Image and URLs containers.
		 */
		public function update_css_classes( $css_classes, $action ) {
			$css_classes = trim( preg_replace( '~elsnr-highlight~m', '', $css_classes ) );

			// In case we have search-replace || remove-tags actions we don't need the
			// custom class, which is removed with the line above.
			if ( 'search-replace' !== $action && 'remove-tags' !== $action ) {
				$css_classes .= ' elsnr-highlight';
			}

			return $css_classes;
		}

		/**
		 * Recreate the original array structure.
		 */
		public function merge_into_iterator( $iterator, $iterator_data ) {
			for ( $sub_depth = $iterator->getDepth(); $sub_depth >= 0; $sub_depth-- ) {
				$sub_iterator = $iterator->getSubIterator( $sub_depth );

				if ( $sub_depth === $iterator->getDepth() ) {
					$sub_iterator->offsetSet( $sub_iterator->key(), $iterator_data );
				} else {
					$sub_iterator->offsetSet( $sub_iterator->key(), $iterator->getSubIterator( $sub_depth + 1 )->getArrayCopy() );
				}
			}
		}

		/**
		 * Update Elementor _elementor_data postmeta.
		 */
		public function update_postmeta( $post_id, $elementor_data ) {
			if ( empty( $elementor_data ) ) {
				return;
			}

			// https://developer.wordpress.org/reference/functions/update_post_meta/#workaround
			update_metadata( 'post', $post_id, '_elementor_data', wp_slash( wp_json_encode( $elementor_data, JSON_UNESCAPED_UNICODE ) ) );

			// Clear Elementor cache
			\Elementor\Plugin::$instance->files_manager->clear_cache();

			// Update post content to trigger a refresh
			wp_update_post(
				array(
					'ID'                => $post_id,
					'post_modified'     => current_time( 'mysql' ),
					'post_modified_gmt' => current_time( 'mysql', 1 ),
				)
			);

			// Optionally, trigger content regeneration
			$elementor = \Elementor\Plugin::$instance;
			$elementor->frontend->get_builder_content_for_display( $post_id );

			// Optional: Flush object cache if using object caching
			wp_cache_flush();
		}

		/**
		 * Check if multiple array keys exist in an array.
		 * TODO: Not used anymore to be removed in the next major release!
		 */
		function array_keys_exist( $array, $keys ) {
			$check = false;

			if ( ! is_array( $keys ) ) {
				$keys = func_get_args();
				array_shift( $keys );
			}

			foreach ( $keys as $key ) {
				if ( isset( $array[ $key ] ) || array_key_exists( $key, $array ) ) {
					$check = true;
				}
			}

			return $check;
		}

		/**
		 * Use transients to manage number of HTML Regexp request per hour.
		 */
		public function update_regex_limit() {
			if ( false === get_option( 'elemsnr_replace_html_regex' )
				|| false === get_transient( 'elemsnr_replace_html_regex' ) ) {
				set_transient( 'elemsnr_replace_html_regex', 10, 12 * HOUR_IN_SECONDS );
				update_option( 'elemsnr_replace_html_regex', get_transient( 'elemsnr_replace_html_regex' ) );
			} else {
				update_option( 'elemsnr_replace_html_regex', get_option( 'elemsnr_replace_html_regex' ) - 1 );
			}
		}
	}

	$elemsnr = new Elementor_Search_Replace();
	$elemsnr->init();
}
