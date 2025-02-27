<?php
/**
 * Plugin Name: GPSR for WooCommerce
 * Description: Adding GPSR fields to WooCommerce products.
 * Version: 1.0.3
 * Requires at least: 6.0
 * Tested up to: 6.7
 * WC requires at least: 9.1
 * WC tested up to: 9.5
 * Author: WP Desk
 * Text domain: gpsr-for-woocommerce
 * Requires Plugins: woocommerce
 * License: GPLv3 or later
 */

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$plugin_version = '1.0.3';

// Add GPSR tab to product data tabs
add_filter( 'woocommerce_product_data_tabs', 'gpsr_wc_add_tab' );
function gpsr_wc_add_tab( $tabs ) {
	$tabs['gpsr_tab'] = [
		'label'    => __( 'GPSR', 'gpsr-for-woocommerce' ),
		'target'   => 'gpsr_product_data',
		'class'    => [ 'show_if_simple', 'show_if_variable' ],
		'priority' => 50,
	];

	return $tabs;
}

// Add GPSR fields to the custom tab
add_action( 'woocommerce_product_data_panels', 'gpsr_wc_add_tab_content' );
function gpsr_wc_add_tab_content() {
	global $post;

	echo '<div id="gpsr_product_data" class="panel woocommerce_options_panel" style="padding: 10px;">';

	// Display group
	echo '<div style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #c3c4c7;">';
	gpsr_wc_section_header( __( 'Place of field display', 'gpsr-for-woocommerce' ), 'fields' );
	echo '<div class="gpsr-field" style="padding-right: 80px">';
	woocommerce_wp_select(
		[
			'id'          => '_gpsr_visibility_option',
			'label'       => __( 'Place on the product page', 'gpsr-for-woocommerce' ),
			'description' => __( 'Select where to display the product', 'gpsr-for-woocommerce' ),
			'desc_tip'    => true,
			'options'     => [
				'before' => __( 'Above the add to cart button', 'gpsr-for-woocommerce' ),
				'after'  => __( 'Under the add to cart button', 'gpsr-for-woocommerce' ),
				'none'   => __( 'Do not display', 'gpsr-for-woocommerce' ),
			],
		]
	);
	echo '</div></div>';

	// Manufacturer Group
	echo '<div style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #c3c4c7;">';
	gpsr_wc_section_header( __( 'Manufacturer Details', 'gpsr-for-woocommerce' ), 'producer' );
	gpsr_wc_add_field( '_gpsr_manufacturer_name', __( 'Manufacturer Name', 'gpsr-for-woocommerce' ) );
	gpsr_wc_add_field( '_gpsr_manufacturer_address', __( 'Manufacturer Address', 'gpsr-for-woocommerce' ) );
	gpsr_wc_add_field( '_gpsr_manufacturer_email', __( 'Manufacturer Email', 'gpsr-for-woocommerce' ) );
	echo '</div>';

	// Importer Group
	echo '<div style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #c3c4c7;">';
	gpsr_wc_section_header( __( 'Importer Details', 'gpsr-for-woocommerce' ), 'importer' );
	gpsr_wc_add_field( '_gpsr_importer_name', __( 'Importer Name', 'gpsr-for-woocommerce' ) );
	gpsr_wc_add_field( '_gpsr_importer_address', __( 'Importer Address', 'gpsr-for-woocommerce' ) );
	gpsr_wc_add_field( '_gpsr_importer_email', __( 'Importer Email', 'gpsr-for-woocommerce' ) );
	echo '</div>';

	// Other Fields
	echo '<div style="padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #c3c4c7;">';
	gpsr_wc_section_header( __( 'Other Details', 'gpsr-for-woocommerce' ), 'others' );
	gpsr_wc_add_field( '_gpsr_trademark', __( 'Trademark', 'gpsr-for-woocommerce' ) );
	gpsr_wc_add_field( '_gpsr_certificates', __( 'Certificates', 'gpsr-for-woocommerce' ), 'textarea' );
	echo '</div>';

	// Usage Instructions with conditional logic
	echo '<div>';
	gpsr_wc_section_header( __( 'Usage Instructions', 'gpsr-for-woocommerce' ), 'instruction' );

	echo '<div class="js-gpsr-field-with-toggle gpsr-field">';
	// Instructions Type
	woocommerce_wp_select(
		[
			'id'          => '_gpsr_instructions_type',
			'label'       => __( 'Instructions Type', 'gpsr-for-woocommerce' ),
			'options'     => [
				''     => __( 'Choose instruction type', 'gpsr-for-woocommerce' ),
				'text' => __( 'Text', 'gpsr-for-woocommerce' ),
				'file' => __( 'File', 'gpsr-for-woocommerce' ),
			],
			'desc_tip'    => true,
			'description' => __( 'Choose whether to add instructions as text or file.', 'gpsr-for-woocommerce' ),
		]
	);
	gpsr_wc_field_toggle( '_gpsr_instructions_type', __( 'Instructions Type', 'gpsr-for-woocommerce' ) );

	echo '</div>';

	// Instructions Text
	echo '<div id="gpsr_instructions_text_container" class="form-field gpsr-field" style="display:none; padding-right: 80px;">';
	gpsr_wc_add_field( '_gpsr_instructions_text', __( 'Usage Instructions (Text)', 'gpsr-for-woocommerce' ), 'textarea', false );
	echo '</div>';

	// Instructions File URL with media library
	echo '<div id="gpsr_instructions_file_container" class="form-field gpsr-field" style="display:none; padding-right: 80px;">';
	echo '<p class="form-field">';
	echo ( '<label for="_gpsr_instructions_file">' . esc_html__( 'File URL:', 'gpsr-for-woocommerce' ) . '</label>' );
	echo '<input type="text" id="_gpsr_instructions_file" name="_gpsr_instructions_file" value="' . esc_attr( get_post_meta( get_the_ID(), '_gpsr_instructions_file', true ) ) . '" style="width:70%; margin-right: 10px;" />';
	echo '<button type="button" id="gpsr_file_upload_button" class="button">' . esc_html__( 'Select File', 'gpsr-for-woocommerce' ) . '</button>';
	echo '</p>';
	echo '</div>';

	echo '</div>';
	echo '</div>';
}

function gpsr_wc_section_header( string $title, string $shortcode ) {
	global $post;

	echo '<div style="display: flex; justify-content: space-between; align-items: center">';
	echo '<h3>' . esc_html( $title ) . '</h3>';
	echo '<p><code>[gpsr_' . esc_html( $shortcode ) . ' id="' . esc_html( $post->ID ) . '"]</code></p>';
	echo '</div>';
}

// Tiptool function to add fields
function gpsr_wc_add_field( $id, $label, $type = 'text', $is_toggleable = true ) {
	echo $is_toggleable ? '<div class="js-gpsr-field-with-toggle gpsr-field">' : '';

	if ( $type === 'textarea' ) {
		woocommerce_wp_textarea_input(
			[
				'id'          => $id,
				'label'       => $label,
				'desc_tip'    => true,
				/* translators: %s: field label */
				'description' => sprintf( __( 'Enter the %s.', 'gpsr-for-woocommerce' ), strtolower( $label ) ),
			]
		);
	} else {
		woocommerce_wp_text_input(
			[
				'id'          => $id,
				'label'       => $label,
				'desc_tip'    => true,
				/* translators: %s: field label */
				'description' => sprintf( __( 'Enter the %s.', 'gpsr-for-woocommerce' ), strtolower( $label ) ),
			]
		);
	}

	if ( ! $is_toggleable ) {
		return;
	}

	gpsr_wc_field_toggle( $id, $label );
	echo '</div>';
}

// Add field toggle switch
function gpsr_wc_field_toggle( $field, $label ) {
	global $post;
	$is_checked = get_post_meta( $post->ID, $field . '_toggle', true );
	echo '<label class="gpsr-switch" style="margin-left: 15px; margin-bottom: 0;">
        <input type="checkbox" name="' . esc_attr( $field ) . '_toggle" ' . checked( ( $is_checked === '' ) ? '1' : $is_checked, '1', false ) . ' />
        <span class="gpsr-slider gpsr-round"></span>
      </label>';
	/* translators: %s: field label */
	echo wc_help_tip( sprintf( __( 'Enable/Disable %s field. Does not apply to shortcode', 'gpsr-for-woocommerce' ), strtolower( $label ) ), false );
}


// Saving GPSR fields
add_action( 'woocommerce_process_product_meta', 'gpsr_wc_save_fields' );
function gpsr_wc_save_fields( $post_id ) {
	// phpcs:disable WordPress.Security.NonceVerification.Missing -- handled by WooCommerce before this hook
	$base_fields = [
		'_gpsr_manufacturer_name',
		'_gpsr_manufacturer_address',
		'_gpsr_manufacturer_email',
		'_gpsr_importer_name',
		'_gpsr_importer_address',
		'_gpsr_importer_email',
		'_gpsr_trademark',
		'_gpsr_certificates',
		'_gpsr_instructions_type',
		'_gpsr_instructions_text',
		'_gpsr_instructions_file',
		'_gpsr_visibility_option',
	];

	$fields = [];

	// Add fields and their toggle fields
	foreach ( $base_fields as $field ) {
		$fields[] = $field;
		$fields[] = $field . '_toggle';
	}

	foreach ( $fields as $field ) {
		if ( str_contains( $field, '_toggle' ) ) {
			$toggle_value = isset( $_POST[ $field ] ) ? '1' : '0';
			update_post_meta( $post_id, $field, $toggle_value );
		} elseif ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}
	// phpcs:enable
}

//Display GPSR fields on the front-end conditionally based on the option selected
add_action( 'woocommerce_single_product_summary', 'gpsr_wc_set_display_fields_hook', 1 );
function gpsr_wc_set_display_fields_hook() {
	if ( ! is_product() || ! gpsr_wc_should_display() ) {
		return;
	}

	global $post;
	$visibility_option = get_post_meta( $post->ID, '_gpsr_visibility_option', true );

	if ( $visibility_option === 'none' ) {
		return;
	}

	if ( $visibility_option === 'after' ) {
		add_action( 'woocommerce_after_add_to_cart_button', 'gpsr_wc_display_fields', 10 );

		return;
	}

	add_action( 'woocommerce_before_add_to_cart_button', 'gpsr_wc_display_fields', 10 );
}

// Display GPSR fields on the front-end
function gpsr_wc_display_fields() {
	global $post;
	echo '<div class="gpsr-fields">';
	echo '<h3>' . esc_html__( 'Product Details', 'gpsr-for-woocommerce' ) . '</h3>';

	$fields = gpsr_wc_get_fields();

	foreach ( $fields as $key => $label ) {
		if ( gpsr_wc_is_field_enabled( $post->ID, $key ) ) {
			$value = get_post_meta( $post->ID, $key, true );
			if ( ! empty( $value ) ) {
				echo '<p><strong>' . esc_html( $label ) . ':</strong> ' . esc_html( $value ) . '</p>';
			}
		}
	}

	if ( gpsr_wc_is_field_enabled( $post->ID, '_gpsr_instructions_type' ) ) {
		echo wp_kses_post( gpsr_wc_get_instruction( $post->ID ) );
	}

	echo '</div>';
}

// Enqueue admin script for intruction types
add_action( 'admin_enqueue_scripts', 'gpsr_wc_enqueue_admin_scripts' );
function gpsr_wc_enqueue_admin_scripts( $hook ) {
	if ( $hook === 'post.php' || $hook === 'post-new.php' ) {
		wp_enqueue_media();
		wp_enqueue_script(
			'gpsr-conditional-logic-script',
			plugin_dir_url( __FILE__ ) . 'assets/admin-logic.js',
			[ 'jquery', 'wp-i18n' ],
			'1.0',
			true
		);
		wp_enqueue_style( 'gpsr-admin-style', plugin_dir_url( __FILE__ ) . 'assets/index.css', [], '1.0' );
	}
}

// Shortcodes
add_shortcode( 'gpsr_fields', 'gpsr_wc_shortcode_fields' );
add_shortcode( 'gpsr_producer', 'gpsr_wc_shortcode_producer' );
add_shortcode( 'gpsr_importer', 'gpsr_wc_shortcode_importer' );
add_shortcode( 'gpsr_others', 'gpsr_wc_shortcode_others' );
add_shortcode( 'gpsr_instruction', 'gpsr_wc_shortcode_instruction' );

function gpsr_wc_shortcode_producer( $atts ) {
	return gpsr_wc_shortcode_fields_by_group( $atts, 'producer' );
}

function gpsr_wc_shortcode_importer( $atts ) {
	return gpsr_wc_shortcode_fields_by_group( $atts, 'importer' );
}


function gpsr_wc_shortcode_others( $atts ) {
	return gpsr_wc_shortcode_fields_by_group( $atts, 'others' );
}

function gpsr_wc_shortcode_instruction( $atts ) {
	$atts       = shortcode_atts( [ 'id' => null ], $atts, 'gpsr_instruction' );
	$product_id = $atts['id'] ? intval( $atts['id'] ) : get_the_ID();
	if ( ! $product_id ) {
		return '';
	}

	return gpsr_wc_get_instruction( $product_id );
}

function gpsr_wc_shortcode_fields( $atts ) {
	$atts       = shortcode_atts( [ 'id' => null ], $atts, 'gpsr_fields' );
	$product_id = $atts['id'] ? intval( $atts['id'] ) : get_the_ID();
	if ( ! $product_id ) {
		return '';
	}

	$fields = gpsr_wc_get_fields();

	$output = '<div class="gpsr-fields">';
	foreach ( $fields as $key => $label ) {
		if ( ! gpsr_wc_is_field_enabled( $product_id, $key ) ) {
			continue;
		}

		$value = get_post_meta( $product_id, $key, true );
		if ( ! empty( $value ) ) {
			$output .= '<p><strong>' . esc_html( $label ) . ':</strong> ' . esc_html( $value ) . '</p>';
		}
	}

	$output .= gpsr_wc_get_instruction( $product_id );
	$output .= '</div>';

	return $output;
}

function gpsr_wc_shortcode_fields_by_group( $atts, $group ) {
	$groups = [
		'producer' => [
			'_gpsr_manufacturer_name'    => __( 'Manufacturer Name', 'gpsr-for-woocommerce' ),
			'_gpsr_manufacturer_address' => __( 'Manufacturer Address', 'gpsr-for-woocommerce' ),
			'_gpsr_manufacturer_email'   => __( 'Manufacturer Email', 'gpsr-for-woocommerce' ),
		],
		'importer' => [
			'_gpsr_importer_name'    => __( 'Importer Name', 'gpsr-for-woocommerce' ),
			'_gpsr_importer_address' => __( 'Importer Address', 'gpsr-for-woocommerce' ),
			'_gpsr_importer_email'   => __( 'Importer Email', 'gpsr-for-woocommerce' ),
		],
		'others'   => [
			'_gpsr_trademark'    => __( 'Trademark', 'gpsr-for-woocommerce' ),
			'_gpsr_certificates' => __( 'Certificates', 'gpsr-for-woocommerce' ),
		],
	];

	$fields     = $groups[ $group ] ?? [];
	$atts       = shortcode_atts( [ 'id' => null ], $atts );
	$product_id = $atts['id'] ? intval( $atts['id'] ) : get_the_ID();
	if ( ! $product_id ) {
		return '';
	}

	$output = '<div class="gpsr-fields">';
	foreach ( $fields as $key => $label ) {
		$value = get_post_meta( $product_id, $key, true );
		if ( ! empty( $value ) ) {
			$output .= '<p><strong>' . esc_html( $label ) . ':</strong> ' . esc_html( $value ) . '</p>';
		}
	}
	$output .= '</div>';

	return $output;
}

function gpsr_wc_is_field_enabled( int $product_id, string $field ) {
	$is_toggle = get_post_meta( $product_id, $field . '_toggle', true );

	// Prevents disabling after plugin update
	return $is_toggle === '1' || $is_toggle === '';
}

function gpsr_wc_get_fields() {
	return [
		'_gpsr_manufacturer_name'    => __( 'Manufacturer Name', 'gpsr-for-woocommerce' ),
		'_gpsr_manufacturer_address' => __( 'Manufacturer Address', 'gpsr-for-woocommerce' ),
		'_gpsr_manufacturer_email'   => __( 'Manufacturer Email', 'gpsr-for-woocommerce' ),
		'_gpsr_importer_name'        => __( 'Importer Name', 'gpsr-for-woocommerce' ),
		'_gpsr_importer_address'     => __( 'Importer Address', 'gpsr-for-woocommerce' ),
		'_gpsr_importer_email'       => __( 'Importer Email', 'gpsr-for-woocommerce' ),
		'_gpsr_trademark'            => __( 'Trademark', 'gpsr-for-woocommerce' ),
		'_gpsr_certificates'         => __( 'Certificates', 'gpsr-for-woocommerce' ),
	];
}

function gpsr_wc_get_instruction( $product_id ) {
	$instructions_type = get_post_meta( $product_id, '_gpsr_instructions_type', true );
	$content           = '';

	if ( empty( $instructions_type ) ) {
		return '';
	}

	if ( $instructions_type === 'text' ) {
		$text    = get_post_meta( $product_id, '_gpsr_instructions_text', true );
		$content = esc_html( $text );
	}

	if ( $instructions_type === 'file' ) {
		$file    = get_post_meta( $product_id, '_gpsr_instructions_file', true );
		$content = sprintf(
			'<a href="%s" target="_blank">%s</a>',
			esc_url( $file ),
			esc_html__( 'Download File', 'gpsr-for-woocommerce' )
		);
	}

	return sprintf(
		'<p><strong>%s</strong> %s</p>',
		esc_html__( 'Usage Instructions:', 'gpsr-for-woocommerce' ),
		$content
	);
}

/*
 * Check if the product has any GPSR fields filled in
 */
function gpsr_wc_should_display() {
	global $post;
	$fields = gpsr_wc_get_fields();

	foreach ( $fields as $key => $label ) {
		$value = get_post_meta( $post->ID, $key, true );
		if ( ! empty( $value ) ) {
			return true;
		}
	}

	return false;
}
