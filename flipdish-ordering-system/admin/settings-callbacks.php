<?php // Flipdish Ordering - Settings Callbacks

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}


// callback: Store configuration section
function flipdish_ordering_callback_section_configuration() {

	echo '<p>These settings configure your store setting with Flipdish</p>';

}

// callback: Display section
function flipdish_ordering_callback_section_display() {

	echo '<p>These settings configure your ordering system display</p>';

}

// callback: Payments section
function flipdish_ordering_callback_section_payments() {

	echo '<p>These settings configure your payment section</p>';

}

// callback: text field
function flipdish_ordering_callback_field_text( $args ) {

	$allowed_links_tags = array(
		'a' => array(
			'href'   => array(),
			'rel'    => array(),
			'target' => array(),
		),
	);

	$options = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );

	$_id   = isset( $args['id'] ) ? $args['id'] : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$value = isset( $options[ $_id ] ) ? sanitize_text_field( $options[ $_id ] ) : '';

	echo '<input 
        id="flipdish_ordering_options_' . esc_attr( $_id ) . '" 
        name="flipdish_ordering_options[' . esc_attr( $_id ) . ']" 
        type="text" 
        value="' . esc_attr( $value ) . '"
        >';
	echo '<br />';
	echo '<label for="flipdish_ordering_options_' . esc_attr( $_id ) . '">' . wp_kses( $label, $allowed_links_tags ) . '</label>';

}

// callback: textarea field
function flipdish_ordering_callback_field_textarea( $args ) {

	$allowed_links_tags = array(
		'a' => array(
			'href' => array(),
		),
	);

	$options = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );

	$_id   = isset( $args['id'] ) ? $args['id'] : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$allowed_tags = wp_kses_allowed_html( 'post' );

	$value = isset( $options[ $_id ] ) ? wp_kses( stripslashes_deep( $options[ $_id ] ), $allowed_tags ) : '';

	echo '<textarea 
            id="flipdish_ordering_options_' . esc_attr( $_id ) . '"
            name="flipdish_ordering_options[' . esc_attr( $_id ) . ']" 
            rows="5"
            cols="50"
            >' . esc_attr( $value ) . '</textarea><br />';
	echo '<label for="flipdish_ordering_options_' . esc_attr( $_id ) . '">' . wp_kses( $label, $allowed_links_tags ) . '</label>';

}

// callback: checkbox field
function flipdish_ordering_callback_field_checkbox( $args ) {

	$allowed_links_tags = array(
		'a' => array(
			'href' => array(),
		),
	);

	$options = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );

	$_id   = isset( $args['id'] ) ? $args['id'] : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$checked = isset( $options[ $_id ] ) ? checked( $options[ $_id ], 1, false ) : '';

	echo '<input 
        id="flipdish_ordering_options_' . esc_attr( $_id ) . '" 
        name="flipdish_ordering_options[' . esc_attr( $_id ) . ']" 
        type="checkbox" 
        value="1"
        ' . esc_attr( $checked ) . '
        >';
	echo '<br />';
	echo '<label for="flipdish_ordering_options_' . esc_attr( $_id ) . '">' . wp_kses( $label, $allowed_links_tags ) . '</label>';

}

// callback: select field
function flipdish_ordering_callback_field_select( $args ) {

	$allowed_links_tags = array(
		'a' => array(
			'href' => array(),
		),
	);

	$options = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );

	$_id        = isset( $args['id'] ) ? $args['id'] : '';
	$label_main = isset( $args['label'] ) ? $args['label'] : '';

	$selected_option = isset( $options[ $_id ] ) ? sanitize_text_field( $options[ $_id ] ) : '';

	$select_options = $args['options'];

	echo '<select 
            id="flipdish_ordering_options_' . esc_attr( $_id ) . '"
            name="flipdish_ordering_options[' . esc_attr( $_id ) . ']"
            >';

	foreach ( $select_options as $value => $option ) {

		$selected = selected( $selected_option === $value, true, false );

		echo '<option value="' . esc_attr( $value ) . '"' . esc_attr( $selected ) . '>' . esc_html( $option ) . '</option>';

	}

	echo '</select>';

	echo '<label for="flipdish_ordering_options_' . esc_attr( $_id ) . '">' . wp_kses( $label_main, $allowed_links_tags ) . '</label>';

}


// callback: radio field
function flipdish_ordering_callback_field_radio( $args ) {

	$allowed_links_tags = array(
		'a' => array(
			'href' => array(),
		),
	);

	$options = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );

	$_id        = isset( $args['id'] ) ? $args['id'] : '';
	$label_main = isset( $args['label'] ) ? $args['label'] : '';

	$selection_option = isset( $options[ $_id ] ) ? sanitize_text_field( $options[ $_id ] ) : '';

	$radio_options = $args['options'];

	foreach ( $radio_options as $value => $label ) {

		$checked = checked( $selection_option === $value, true, false );

		echo '<label><input 
                        name="flipdish_ordering_options[' . esc_attr( $_id ) . ']"
                        type="radio"
                        value="' . esc_attr( $value ) . '"
                        ' . esc_attr( $checked ) . '>';
		echo '<span>' . esc_html( $label ) . '</span></label><br />';

	};

	echo '<label for="flipdish_ordering_options_' . esc_attr( $_id ) . '">' . wp_kses( $label_main, $allowed_links_tags ) . '</label>';

}
