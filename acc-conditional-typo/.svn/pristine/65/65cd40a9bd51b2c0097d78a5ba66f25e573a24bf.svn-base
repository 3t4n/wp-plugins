<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://grandplugin.com
 * @since      1.0.0
 *
 * @package    ACC_Conditional_Typo
 * @subpackage ACC_Conditional_Typo/public/partials
 */

// Selected HTML List.
$acc_html_tag_list = '';
if ( isset( $acc_value['gpacc_option_tab']['acc_html_tags'] ) && ! empty( $acc_value['gpacc_option_tab']['acc_html_tags'] ) ) {

	$acc_html_tag_list = implode( ', ', $acc_value['gpacc_option_tab']['acc_html_tags'] );
}

// Selectors.
$acc_selectors = '';
if ( ! empty( $acc_value['gpacc_option_tab']['acc_selector_repeater'][0]['acc_selectors'] ) ) {

	$acc_selectors = array_column( $acc_value['gpacc_option_tab']['acc_selector_repeater'], 'acc_selectors' );
	$acc_selectors = implode( ', ', $acc_selectors );
}

// Load External Libraries.
if ( $acc_value['gpacc_option_tab']['acc_library_fontawesome_load'] ) {

	wp_enqueue_style( 'acc--fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css', array(), '5.12.0', 'all' );
}

// Get all links.
$acc_lib_load_cdn_link_list = array_column( $acc_value['gpacc_option_tab']['acc_lib_load_repeater'], 'acc_lib_load_cdn_link' );

// Check if all link fields are empty.
if ( array_filter( $acc_lib_load_cdn_link_list ) ) {

	foreach ( $acc_value['gpacc_option_tab']['acc_lib_load_repeater'] as $acc_cdn_link_repeater_key => $acc_cdn_link_repeater_value ) {

		// If the first key's value is 1. If the switch key is on.
		if ( $acc_cdn_link_repeater_value['acc_is_lib_cdn_load'] ) {

			// Check whether remote URL has a valid extension CSS or JS.
			if ( preg_match( '/\.(css)$/i', $acc_cdn_link_repeater_value['acc_lib_load_cdn_link'] ) ) {

				wp_enqueue_style( uniqid(), $acc_cdn_link_repeater_value['acc_lib_load_cdn_link'] );
			} elseif ( preg_match( '/\.(js)$/i', $acc_cdn_link_repeater_value['acc_lib_load_cdn_link'] ) ) {

				wp_enqueue_script( uniqid(), $acc_cdn_link_repeater_value['acc_lib_load_cdn_link'] );
			}
		}
	}
}

// Typography.
if ( isset( $acc_value['gpacc_option_tab']['acc_typo'] ) && ! empty( $acc_value['gpacc_option_tab']['acc_typo'] ) ) {

	$acc_typo = $acc_value['gpacc_option_tab']['acc_typo'];

	// Enqueue Google Font.
	if ( $acc_value['gpacc_option_tab']['gpacc_tag_typo_load'] ) {

		$wpgpacc_unique_id       = uniqid();
		$wpgpacc_enqueue_fonts   = array();
		$wpgpacc_variant         = ( isset( $acc_typo['font-weight'] ) ) ? ':' . $acc_typo['font-weight'] : '';
		$wpgpacc_subset          = isset( $acc_typo['subset'] ) ? ':' . $acc_typo['subset'] : '';
		$wpgpacc_enqueue_fonts[] = $acc_typo['font-family'] . $wpgpacc_variant . $wpgpacc_subset;

		if ( ! empty( $wpgpacc_enqueue_fonts ) ) {

			wp_enqueue_style( 'wpgpacc--google-fonts' . $wpgpacc_unique_id, esc_url( add_query_arg( 'family', rawurlencode( implode( '|', $wpgpacc_enqueue_fonts ) ), '//fonts.googleapis.com/css' ) ), array(), $this->version );
		}
	} // Enqueue Google Font.
}

// Executing Styles.
if ( ! empty( $acc_html_tag_list ) || ! empty( $acc_selectors ) || ! empty( $acc_value['gpacc_option_tab']['gpacc_code_editor_css'] ) ) {

	$acc_selector_separator = '';
	if ( ! empty( $acc_html_tag_list ) && ! empty( $acc_selectors ) ) {

		$acc_selector_separator = ', ';
	}

	$acc_background_rule_style = '';
	if ( 'gradient' !== $acc_value['gpacc_option_tab']['acc_background_type'] ) {

		$acc_background_rule_style = $acc_value['gpacc_option_tab']['acc_background_image'];
	} else {

		$acc_background_rule_style = $acc_value['gpacc_option_tab']['acc_background_gradient'];
	}

	$acc_css_rules = '<style>';
	if ( ! empty( $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc_dimensions'] ) ) || ! empty( $this->gpacc_get_typos( $acc_typo ) ) || ! empty( $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc_margin'], 'margin' ) ) || ! empty( $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc_padding'], 'padding' ) ) || ! empty( $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc-border'], 'border' ) ) || ! empty( $this->gpacc_get_background( $acc_background_rule_style ) ) ) {

		$acc_css_rules .= $acc_html_tag_list . $acc_selector_separator . $acc_selectors . '{' . $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc_dimensions'] ) . $this->gpacc_get_typos( $acc_typo ) . $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc_margin'], 'margin' ) . $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc_padding'], 'padding' ) . $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc-border'], 'border' ) . $this->gpacc_get_background( $acc_background_rule_style ) . '}';
	}
	if ( ! empty( $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc_color_group'] ) ) ) {

		$acc_css_rules .= $acc_html_tag_list . $acc_selector_separator . $acc_selectors . ':hover{' . $this->gpacc_get_design( $acc_value['gpacc_option_tab']['acc_color_group'] ) . '}';
	}
	$acc_css_rules .= $acc_value['gpacc_option_tab']['gpacc_code_editor_css'];
	$acc_css_rules .= '</style>';
	echo $acc_css_rules;
}

// Executing Script.
$gpacc_code_editor_js = $acc_value['gpacc_option_tab']['gpacc_code_editor_js'];

if ( ! empty( $gpacc_code_editor_js ) ) {

	echo "<script>
	(function( $ ) {
		'use strict';
		$( document ).ready(function() {
		{$gpacc_code_editor_js}
		});
	})( jQuery );
	</script>";
}
