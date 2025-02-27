<?php

namespace TotalContest\Widgets;

use TotalContestVendors\TotalCore\Helpers\Arrays;

/**
 * Widget base class
 *
 * @package TotalContest\Widget
 * @since   1.0.0
 */
abstract class Base extends \WP_Widget {
	/**
	 * Outputs the content of the widget
	 *
	 * @param  array  $args
	 * @param  array  $instance
	 */
	public function widget( $args, $instance ) {
		echo wp_kses( $args['before_widget'], TotalContest( 'allowed-tags' ) );
		if ( ! empty( $instance['title'] ) ):
			echo wp_kses( $args['before_title'] . apply_filters( 'widget_title',
			                                                     $instance['title'] ) . $args['after_title'],
			              TotalContest( 'allowed-tags' ) );
		endif;
		echo wp_kses( $this->content( $args, $instance ), TotalContest( 'allowed-tags' ) );
		echo wp_kses( $args['after_widget'], TotalContest( 'allowed-tags' ) );
	}

	abstract function content( $args, $instance );

	/**
	 * Outputs the options form on admin
	 *
	 * @param  array  $instance  The widget options
	 */
	public function form( $instance ) {
		$instance = Arrays::parse( $instance, [ 'title' => '' ] );
		// Title field
		$fields['title'] = TotalContest( 'form.field.text' )->setOptions( [
			                                                                  'class' => 'widefat',
			                                                                  'name'  => esc_attr( $this->get_field_name( 'title' ) ),
			                                                                  'label' => esc_html__( 'Title:',
			                                                                                         'totalcontest' ),
		                                                                  ] )->setValue( $instance['title'] ?: '' );

		// Custom fields setup
		$fields = $this->fields( $fields, $instance );

		// Render all
		foreach ( $fields as $field ):
			echo '<p>' . wp_kses( $field->render(), TotalContest( 'allowed-tags' ) ) . '</p>';
		endforeach;
	}

	public function fields( $fields, $instance ) {
		return $fields;
	}

	/**
	 * Processing widget options on save
	 *
	 * @param  array  $new_instance  The new options
	 * @param  array  $old_instance  The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		array_walk( $new_instance, 'strip_tags' );

		return $new_instance;
	}
}
