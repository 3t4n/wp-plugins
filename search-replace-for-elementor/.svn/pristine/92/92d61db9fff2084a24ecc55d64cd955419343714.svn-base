<?php
/**
 * Elementor data formatter.
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'ELEMSNR_Data_Formatter' ) ) {

	class ELEMSNR_Data_Formatter extends \RecursiveIteratorIterator {

		/**
		 * Search & replace settings.
		 */
		public $settings = array();

		/**
		 * Keep track of search phrase occurrences.
		 */
		public $count_occurrences = 0;

		/**
		 * Add JSON keywords for Elementor keys to count or search & replace the values.
		 */
		public $keys = array();

		/**
		 * Constructor.
		 */
		public function __construct( $iterator, $settings ) {
			parent::__construct( $iterator, self::SELF_FIRST );

			$this->count_occurrences = 0;

			$this->settings = array(
				'search_phrase'       => false,
				'replace_with_phrase' => false,
				'highlight'           => false,
				'is_text_only'        => false,
				'is_case_sensitive'   => false,
				'is_links'            => false,
				'is_images'           => false,
				'count'               => false,
				'regex'               => false,
			);

			$this->settings = array_merge( $this->settings, $settings );

			// Allow links only no matter scanned or not.
			if ( true === $this->settings['is_links'] || true === $this->settings['is_images'] ) {
				$this->keys = json_decode( ELEMSNR_URL_FIELD_KEYS_ARR, true );
			} else {
				// Add required field keys.
				$this->keys = json_decode( ELEMSNR_REQUIRED_FIELD_KEYS_ARR, true );

				// Merge default field keys as well.
				$this->keys = array_merge(
					$this->keys,
					json_decode( ELEMSNR_DEFAULT_FIELD_KEYS_ARR, true )
				);
			}
		}

		/**
		 * Extend RecursiveIterator `$itr->current()` function to for Search & Replace text (case-sensitive).
		 */
		#[\ReturnTypeWillChange]
		public function current() {
			$current = parent::current();

			// Do HTML regex search & replace.
			if ( true === $this->settings['regex'] && $this->settings['search_phrase'] ) {
				// Allow RegEx search & replace only for Text Editor widget.
				if ( 'editor' === parent::key() ) {
					$search_phrase       = html_entity_decode( $this->settings['search_phrase'] );
					$replace_with_phrase = html_entity_decode( $this->settings['replace_with_phrase'] );

					// Replaces double backslashes (\\) with a single backslash (\)
					$search_phrase       = str_replace( '\\\\', '\\', $search_phrase );
					$replace_with_phrase = str_replace( '\\\\', '\\', $replace_with_phrase );

					$regex_pattern = "~{$search_phrase}~mu";

					// Perform the replacement and assign the result back.
					$new_current = preg_replace( $regex_pattern, $replace_with_phrase, $current );

					if ( null !== $new_current ) {
						$current = $new_current;
					} else {
						// Handle regex errors.
						if ( preg_last_error() !== PREG_NO_ERROR ) {
							$elemsnr_admin = new ELEMSNR_Admin();
							$elemsnr_admin->print_json_message(
								0,
								'<strong>Regex Error:</strong> ' . ( function_exists( 'preg_last_error_msg' )
										? preg_last_error_msg()
										: $this->preg_last_error_msg() )
							);
						}
					}
				}
			} else {
				foreach ( $this->keys as $keyword ) {
					if ( parent::key() === $keyword ) {
						// Skip current elements that is array.
						if ( is_array( $current ) ) {
							continue;
						}

						// Count the number of occurrences for the search phrase.
						if ( true === $this->settings['count'] && $this->settings['search_phrase'] ) {
							// By default <a/> href inside `editor` and `text` data fields can search and repalce in Text-only mode.
							if ( true === $this->settings['is_text_only'] ) {
								// Allow <p><a><elsnr-highlight> tags for links within editor, title, etc.
								$current_no_tags = $this->strip_tags_with_whitespace( $current, '<p>,<a>,<elsnr-highlight>' );
							} else {
								$current_no_tags = wp_strip_all_tags( $current );
							}

							// Needle is case-sensitive.
							if ( true === $this->settings['is_case_sensitive'] ) {
								// Expect to have only 1 set with matches.
								preg_match_all(
									$this->preg_bound( $this->settings['search_phrase'], 'u' ),
									$current_no_tags,
									$matches
								);
							} else {
								preg_match_all(
									$this->preg_bound( $this->settings['search_phrase'], 'iu' ),
									$current_no_tags,
									$matches
								);
							}

							$this->count_occurrences += count( $matches[0] );
						}

						// Do case-sensitive search & replace.
						if ( $this->settings['search_phrase'] ) {
							if ( true === $this->settings['is_case_sensitive'] ) {
								// Only when we do `add_custom_tags()`.
								if ( $this->str_contains( 'elsnr-highlight', $this->settings['replace_with_phrase'] ) ) {
									$current = preg_replace(
										$this->preg_bound( $this->settings['search_phrase'], 'u' ),
										$this->preg_clean( $this->settings['replace_with_phrase'] ),
										$current
									);
								} else {
									$current = str_replace(
										$this->settings['search_phrase'],
										$this->settings['replace_with_phrase'],
										$current
									);
								}
							} else {
								// Overwrite replace with phrase with `current` for highlight we don't
								// want to change content for case-insensitive search and replace.
								if ( $this->str_contains( 'elsnr-highlight', $this->settings['replace_with_phrase'] ) ) {
									$replace_with_phrase_regex = '<elsnr-highlight>$0</elsnr-highlight>';

									// Perform case-insensitive search and replace with preserving the original casing.
									$current = preg_replace_callback(
										$this->preg_bound( $this->settings['search_phrase'], 'iu' ), // Add 'u' modifier for UTF-8 support.
										function( $matches ) {
											// Use $matches[0] to access the matched word.
											if ( filter_var( $matches[0], FILTER_VALIDATE_URL ) ) {
												// Need to add entities when search/replace text-only links which are in allowed tags.
												return "&lt;elsnr-highlight&gt;{$matches[0]}&lt;/elsnr-highlight&gt;";
											} else {
												$replace_with_phrase_regex = '<elsnr-highlight>$0</elsnr-highlight>';

												// If the search is shortcode don't clean/escape it.
												if ( preg_match_all( '/\[(\w+)(.*?)\]/', $matches[0], $_matches ) ) {
													$search_phrase = '~' . preg_quote( $matches[0], '~' ) . '~';
												} else {
													$search_phrase = '~\b' . $this->preg_clean( $matches[0] ) . '\b~u'; // Add 'u' modifier for UTF-8 support.
												}

												return preg_replace(
													$search_phrase,
													$replace_with_phrase_regex,
													$matches[0]
												);
											}
										},
										$current
									);
								} else {
									$current = str_ireplace(
										$this->settings['search_phrase'],
										$this->settings['replace_with_phrase'],
										$current
									);
								}
							}
						}
					}
				}
			}

			return $current;
		}

		/**
		 * Works same as PHP8 `str_contains()` function.
		 */
		public function str_contains( $needle, $haystack ) {
			return '' !== $needle && mb_strpos( $haystack, $needle ) !== false;
		}

		/**
		 * Case-insensitive version of the `substr_count()` function.
		 * NOTE: replaced with `preg_match_all` could be removed.
		 */
		public function substr_icount( $needle, $haystack ) {
			return substr_count( strtoupper( $haystack ), strtoupper( $needle ) );
		}

		/**
		 * Escape `preg_replace` or `preg_match` phrase and return as string or
		 * array case-sensitive or insensitive with boundaries.
		 * \b will not work if we have special chars begin/end of the word
		 */
		public function preg_bound( $phrase, $case_sensitive = '' ) {
			return '~(?<!\w)' . preg_quote( stripslashes( $phrase ), '/' ) . "(?!\w)~m{$case_sensitive}";
		}

		/**
		 * Used for I'm, you're etc "Quote content", etc. in search phrases.
		 */
		public function preg_clean( $phrase ) {
			return preg_quote( stripslashes( $phrase ), '/' );
		}

		/**
		 * Extend the `strip_tags()` PHP function to have white spaces between the words.
		 */
		public function strip_tags_with_whitespace( $html, $allowed_tags = '' ) {
			$html = str_replace( '<', ' <', $html );
			$html = strip_tags( $html, $allowed_tags );
			$html = preg_replace( '/\s\s+/', ' ', $html );
			$html = trim( $html );

			return $html;
		}

		/**
		 * Works same as PHP8 `preg_last_error_msg` function.
		 */
		public function preg_last_error_msg() {
			switch ( preg_last_error() ) {
				case PREG_NO_ERROR:
					return esc_html__( 'No error!', 'search-replace-for-elementor' );
				case PREG_INTERNAL_ERROR:
					return esc_html__( 'Internal error!', 'search-replace-for-elementor' );
				case PREG_BACKTRACK_LIMIT_ERROR:
					return esc_html__( 'Backtrack limit exhausted!', 'search-replace-for-elementor' );
				case PREG_RECURSION_LIMIT_ERROR:
					return esc_html__( 'Recursion limit exhausted!', 'search-replace-for-elementor' );
				case PREG_BAD_UTF8_ERROR:
					return esc_html__( 'Malformed UTF-8 characters, possibly incorrectly encoded!', 'search-replace-for-elementor' );
				case PREG_BAD_UTF8_OFFSET_ERROR:
					return esc_html__( 'The offset did not correspond to the beginning of a valid UTF-8 code point!', 'search-replace-for-elementor' );
				case PREG_JIT_STACKLIMIT_ERROR:
					return esc_html__( 'JIT stack limit exhausted!', 'search-replace-for-elementor' );
				default:
					return esc_html__( 'Unknown error!', 'search-replace-for-elementor' );
			}
		}
	}
}
