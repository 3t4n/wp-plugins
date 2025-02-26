<?php
/**
 * APL Widget Child Class
 *
 * Updater object to Advanced Post List
 *
 * @link https://github.com/EkoJr/advanced-post-list/
 *
 * @package advanced-post-list
 * @since 0.3.0
 */

/**
 * APL Widget
 *
 * Updates APL's database.
 *
 * @link http://codex.wordpress.org/Widgets_API
 *
 * @since 0.3.0
 */
class APL_Widget extends WP_Widget {
	/**
	 * Constructor
	 *
	 * @since 0.3.0
	 */
	public function __construct() {
		parent::__construct(
			'advanced-post-list_default',
			__( 'Advanced Post Lists', 'advanced-post-list' ),
			array( 'description' => __( 'Display preset post lists', 'advanced-post-list' ) )
		);
	}

	/**
	 * Widget
	 *
	 * This code displays the widget on the screen.
	 *
	 * @since 0.3.0
	 *
	 * @global  APL_Core  $advanced_post_list
	 * @param   array     $args
	 * @param   ?         $instance
	 */
	public function widget( $args, $instance ) {
		global $advanced_post_list;
		extract( $args );

		echo esc_html( $before_widget );
		if ( ! empty( $instance['title'] ) ) {
			printf(
				'%1$s%2$s%3$s',
				esc_html( $before_title ),
				esc_html( $instance['title'] ),
				esc_html( $after_title )
			);
		}

		echo wp_kses( $advanced_post_list->display_post_list( $instance['apl_preset'] ), apl_allowed_tags_before() );

		echo esc_html( $after_widget );
	}

	/**
	 * Form
	 *
	 * @since 0.3.0
	 *
	 * @param type $instance
	 */
	public function form( $instance ) {
		$preset_db = new APL_Preset_Db( 'default' );

		$html_options = '';
		foreach ( $preset_db->_preset_db as $key => $value ) {
			if ( isset( $instance['apl_preset'] ) && $key === $instance['apl_preset'] ) {
				$html_options .= sprintf(
					'<option value="%s" selected="selected">%s</option>',
					$key
				);
			} else {
				$html_options .= sprintf(
					'<option value="%s">%s</option>',
					$key
				);
			}
		}

		printf(
			'
			<div>
				<label for="%1$s">Title:</label>
				<input type="text" class="widefat" name="%1$s" id="%1$s" value="%2$s" />
				<br />
				<br />
				<label for="%3$s">Preset Name:</label>
				<select class="widefat" name="%3$s" id="%3$s">
					%4$s
				</select>
				<br />
				<br />
			</div>
			',
			esc_html( $this->get_field_id( 'title' ) ),
			( isset( $instance['title'] ) ) ? esc_html( $instance['title'] ) : '',
			esc_html( $this->get_field_id( 'apl_preset' ) ),
			esc_html( $html_options )
		);
	}

	/**
	 * Update
	 *
	 * Updates the settings.
	 *
	 * @since 0.3.0
	 *
	 * @param type $new_instance
	 * @param type $old_instance
	 * @return type
	 */
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
