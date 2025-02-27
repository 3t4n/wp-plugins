<?php
/**
 * Timeline Express Single Column TinyMCE shortcode generator fields
 *
 * @since 2.0.0
 */
final class Timeline_Express_No_Icons_TinyMCE {

	public function __construct() {

		add_action( 'init', [ $this, 'generate_fields' ], PHP_INT_MAX );

	}

	/**
	 * Add new fields to the shortcode generator.
	 *
	 * @since 2.0.0
	 */
	public function generate_fields() {

		if ( ! function_exists( 'timeline_express_shortcode_generator_field' ) ) {

			return;

		}

		$plural_name = strtolower( (string) apply_filters( 'timeline_express_plural_name', esc_html__( 'announcements', 'timeline-express-pro' ) ) );

		$single_column_fields = [
			[
				'attribute' => 'no-icons', // used by our helper function only.
				'type'      => 'checkbox',
				'classes'   => 'no-icons',
				'label'     => esc_html__( 'No Icons', 'timeline-express-pro' ),
				'tooltip'   => esc_html__( 'Disable icons for this timeline.', 'timeline-express-no-icons-add-on' ),
			],
		];

		timeline_express_shortcode_generator_field( $single_column_fields );

	}

}

new Timeline_Express_No_Icons_TinyMCE;
