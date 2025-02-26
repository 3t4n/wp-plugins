<?php 
// nếu là mảng thì trả lại chính nó
// nêu là json và convert ok thì tra lại mảng, 
function adminz_maybeJson($json) {
    if (is_array($json)) {
        return $json;
    }
    $decoded = json_decode($json, true); // decode as an associative array
    if (json_last_error() == JSON_ERROR_NONE && is_array($decoded)) {
        return $decoded; // return the array if decode is successful and result is an array
    }
    return false; // return false otherwise
}

function adminz_preview_text( $text = "Please preview in front-end" ) {
	return do_shortcode( '[adminz_test content="' . $text . '"]' );
}

function adminz_test( $atts, $content = null ) {
    
    if(is_string($atts)){
		return '<div style="background: #71cedf; border: 2px dashed #000; display: flex; color: white; justify-content: center; align-items: center; "> ' . $atts . '</div>';
    }

	extract( shortcode_atts( array(
		'content' => 'Test',
	), $atts ) );
	return '<div style="background: #71cedf; border: 2px dashed #000; display: flex; color: white; justify-content: center; align-items: center; "> ' . $content . '</div>';
}

function adminz_get_settings($key = false, $property = 'settings'){
    global $adminz;
    if($key){
        // return false if not isset
        return $adminz[$key]->$property ?? false;
    }
    return $adminz;
}

function adminz_is_flatsome(){
    return (adminz_get_settings()['Flatsome'] ?? false) ? true : false;
}

// get or save data from $adminz_tmp
function adminz_tmp($name, $value = false){
    global $adminz;
    if(!$value or empty($value)){
        return $adminz['TMP'][$name] ?? $value;
    }
    $adminz['TMP'][$name] = $value;
    return $value;
}

function adminz_add_body_class($_class){
    add_filter('body_class', function($class) use($_class){
        return array_merge($class, (array)$_class);
    });
}

function adminz_is_flatsome_block($shortcode){
    return (adminz_is_flatsome() and str_starts_with( $shortcode, '[block' ));
}

function adminz_fix_override_post_global( $shortcode ) {
	// if shortcode = block in flatsome
	// see flatsome\wp-content\themes\flatsome\inc\post-types\post-type-ux-blocks.php
	// function block_shortcode, overridding global $post

	if ( adminz_is_flatsome() and str_starts_with( $shortcode, '[block' ) ) {
		global $post;
		adminz_tmp( 'adminz_post_global', $post );
	}
}

function adminz_get_override_post_global( $name ) {
	global $post;
	$post = adminz_tmp( $name );
}

function adminz_get_object_id() {
	if ( is_singular() ) {
		return [ 
			'object_type' => 'get_post_meta',
			'object_id'   => get_the_ID(),
		];
	}
	if ( is_category() || is_tag() || is_tax() ) {
		return [ 
			'object_type' => 'get_term_meta',
			'object_id'   => get_queried_object_id(),
		];
	}
	if ( is_home() ) {
		return [ 
			'object_type' => 'get_post_meta',
			'object_id'   => get_option( 'page_for_posts' ),
		];
	}
	if ( is_front_page() ) {
		return [ 
			'object_type' => 'get_post_meta',
			'object_id'   => get_option( 'page_on_front' ),
		];
	}
	if ( adminz_is_woocommerce() ) {
		if ( is_shop() ) {
			return [ 
				'object_type' => 'get_post_meta',
				'object_id'   => wc_get_page_id( 'shop' ),
			];
		} 
        if ( is_cart() ) {
			return [ 
				'object_type' => 'get_post_meta',
				'object_id'   => wc_get_page_id( 'cart' ),
			];
		} 
        if ( is_checkout() ) {
			return [ 
				'object_type' => 'get_post_meta',
				'object_id'   => wc_get_page_id( 'checkout' ),
			];
		} 
        if ( is_account_page() ) {
			return [ 
				'object_type' => 'get_post_meta',
				'object_id'   => wc_get_page_id( 'myaccount' ),
			];
		} 
        if ( is_product() ) {
			global $post;
			return [ 
				'object_type' => 'get_post_meta',
				'object_id'   => $post->ID
			];
		} 
        if ( is_product_category() ) {
			$term = get_queried_object();
			return [ 
				'object_type' => 'get_term_meta',
				'object_id'   => $term->term_id
			];
		} 
        if ( is_product_tag() ) {
			$term = get_queried_object();
			return [ 
				'object_type' => 'get_term_meta',
				'object_id'   => $term->term_id
			];
		}
	}

	return false;
}

function adminz_maybe_output_replace_icon( $output, $attr ) {
	if ( $attr['icon'] ?? '' ) {
		global $adminz;

		// remove "dashicons " 
		$icon_code = str_replace( 'dashicons ', '', $attr['icon'] );
		if (
			array_key_exists( $icon_code, $adminz['Icons']->icons ) ||
			array_key_exists( $icon_code, $adminz['Icons']->custom_icons ) ||
			array_key_exists( $icon_code, $adminz['Icons']->dashicons )
		) {
			$html_icon = adminz_get_icon( $icon_code );
			$output    = preg_replace( '/<i[^>]*>(.*?)<\/i>/', $html_icon, $output );
		}
	}
	return $output;
}