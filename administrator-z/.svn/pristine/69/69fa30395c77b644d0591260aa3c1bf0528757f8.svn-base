<?php
// sửa element
add_filter( 'ux_builder_shortcode_data', function ($data, $tag) {
	if ( $tag == 'ux_menu_link' ) {
        // echo "<pre>"; print_r($data); echo "</pre>"; die;
		// dành cho dashicons
		foreach ( adminz_get_list_icons() as $key => $value ) {
			if ( str_starts_with( $key, 'dashicons' ) ) {
				$data['options']['icon']['options'][ "dashicons $key" ] = $value;
			} else {
				$data['options']['icon']['options'][ $key ] = $value;
			}
		}
	}
	return $data;
}, 10, 2 );


add_filter( 'do_shortcode_tag', function ($output, $tag, $attr, $m) {
	if ( $tag == 'ux_menu_link' ) {

		// icon
		$output = adminz_maybe_output_replace_icon( $output, $attr );
	}
	return $output;
}, 10, 4 );