<?php

namespace Smartemailing\Widgets;

use Smartemailing\Integrations\SmartEmailingApi;
use Smartemailing\Templates;

class WidgetWebform extends \WP_Widget {
	private $smart_emailing_api;
	private $templates;

	function __construct() {
		parent::__construct(
			'Smartemailing_Widget_WebForm',
			__( 'SmartEmailing - Web form', 'smartemailing' ),
			[
				'description' => __( 'Embed web form', 'smartemailing' ),
			],
		);
		$this->smart_emailing_api = smartemailing_container()->get( SmartEmailingApi::class );
		$this->templates          = smartemailing_container()->get( Templates::class );
	}

	public function widget( $args, $instance ) {
		// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
		$wfHtml = $this->templates->render_web_form(
			array(
				'webform_id' => $instance['webform_id'],
			),
		);

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo $wfHtml;
		echo $args['after_widget'];
		// phpcs:enable
	}

	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Web form', 'smartemailing' );
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Title:', 'smartemailing' ); ?>
			</label>

			<input class="widefat"
			       id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       type="text"
			       value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'webform_id' ) ); ?>">
				<?php esc_html_e( 'Web form:', 'smartemailing' ); ?>
			</label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'webform_id' ) ); ?>">
				<?php foreach ( $this->smart_emailing_api->get_webforms_options() as $webform ) { ?>
					<option value="<?php echo esc_attr( $webform['value'] ) ?>" <?php echo( isset( $instance['webform_id'] ) && esc_attr( $instance['webform_id'] ) == $webform['value'] ? 'selected' : '' ) ?>>#<?php echo esc_html( $webform['value'] ) ?>
						- <?php echo esc_html( $webform['label'] ) ?></option>
				<?php } ?>
			</select>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance               = [];
		$instance['title']      = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['webform_id'] = ( ! empty( $new_instance['webform_id'] ) ) ? wp_strip_all_tags( $new_instance['webform_id'] ) : '';

		return $instance;
	}
}
