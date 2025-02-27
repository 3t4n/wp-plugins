<?php
/**
 * Shortcode controller.
 *
 * @package Super_Advent_Calendar
 * @author  Verdant Studio
 * @since   1.12.0
 */

namespace SuperAdventCalendar\Controllers;

/**
 * Exit when accessed directly.
 */
if ( ! defined( 'ABSPATH' )) {
	exit;
}

use SuperAdventCalendar\Interfaces\Controllers\ShortcodeControllerInterface;

/**
 * Shortcode controller.
 *
 * @since 1.12.0
 */
class ShortcodeController implements ShortcodeControllerInterface
{
	/**
	 * Flag to ensure script data is added only once.
	 *
	 * @var bool
	 */
	private static bool $data_added = false;

	/**
	 * Initialize events.
	 *
	 * @since 1.12.0
	 *
	 * @return void
	 */
	public function register()
	{
		add_action( 'init', array( $this, 'register_shortcodes' ) );
	}

	/**
	 * Register the shortcodes.
	 *
	 * @since 1.13.2
	 *
	 * @return void
	 */
	public function register_shortcodes()
	{
		add_shortcode( 'super-advent-calendar', array( $this, 'register_super_advent_calendar_shortcode' ) );
		add_shortcode( 'super-advent-calendar-link', array( $this, 'register_super_advent_calendar_link_shortcode' ) );
	}

	/**
	 * Enqueue script data to be added in the footer.
	 *
	 * @since 1.13.3
	 *
	 * @param array|string $attrs
	 * @return void
	 */
	private function enqueue_script_data( $attrs ) {
		if ( self::$data_added ) {
			return;
		}

		self::$data_added = true;

		add_filter(
			'script_loader_tag',
			function ( $tag, $handle ) use ( $attrs, &$data_added ) {
				if ( 'super-advent-calendar-advent-calendar-day-view-script' === $handle ) {
					$additional_data      = array(
						'postId' => $attrs['id'],
					);
					$additional_data_json = wp_json_encode( $additional_data );

					$tag       .= "<script>window.vsSacSettings = Object.assign(window.vsSacSettings || {}, $additional_data_json)</script>
";
					$data_added = true; // Set the flag to true after adding the data.
				}
				return $tag;
			},
			10,
			2
		);
	}

	/**
	 * Register the shortcode.
	 *
	 * @since 1.12.0
	 *
	 * @param array|string $attrs
	 * @return string
	 */
	public function register_super_advent_calendar_shortcode( $attrs ): string {
		// Set default attributes.
		$attributes = shortcode_atts(
			array(
				'id' => null,
			),
			$attrs
		);

		// Validate the post ID.
		$post_id     = $attributes['id'];
		$target_post = get_post( $post_id );

		// Enqueue the script data.
		$this->enqueue_script_data( $attributes );

		if ( empty( $post_id ) || ! $target_post ) {
			return '<p>' . __( 'Invalid advent calendar post id', 'super-advent-calendar' ) . '</p>';
		}

		// Check if the target post has content.
		if ( empty( $target_post->post_content ) ) {
			return '<p>' . __( 'The advent calendar content is empty', 'super-advent-calendar' ) . '</p>';
		}

		// Apply content filters to render Gutenberg blocks and shortcodes.
		return apply_filters( 'the_content', $target_post->post_content );
	}

	/**
	 * Register the link shortcode.
	 *
	 * @since 1.12.0
	 *
	 * @param array|string $attrs
	 * @return string
	 */
	public function register_super_advent_calendar_link_shortcode( $attrs ): string
	{
		$attributes = shortcode_atts(
			array(
				'url'  => '#',
				'text' => __( 'read more...', 'super-advent-calendar' ),
			),
			$attrs
		);

		return '<a href="' . esc_url( $attributes['url'] ) . '" target="_blank">' . esc_html( $attributes['text'] ) . '</a>';
	}
}
