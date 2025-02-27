<?php

function trgb_course_grid_custom_button_text( $button_text = '', $course_id = 0 ) {

    if(empty($course_id)) {
        return $button_text;
    }
    $course_meta = get_post_meta($course_id);
    if(empty($course_meta)) {
        return $button_text;
    }
    if(empty($course_meta['_ld_price_type'])) {
        return $button_text;
    }
    $price_type = $course_meta['_ld_price_type'][0];
    if(empty($price_type)) {
        return $button_text;
    }

	if(!is_user_logged_in()) {
		$output = get_option('trgb_' . $price_type . '_non_logged_text');
		return (!empty($output)) ? esc_html( $output ) : $button_text;
	}

	$output = '';

	$user = wp_get_current_user();
	$has_access   = sfwd_lms_has_access( $course_id, $user->ID );
	$is_completed = learndash_course_completed( $user->ID, $course_id );

	if($has_access && $is_completed) {
		$output = get_option('trgb_' . $price_type . '_completed_text');
		if(!empty($output)) {
			return esc_html( $output );
		}
	}
	
	$user_status = ($has_access) ? 'enrolled' : 'non_enrolled';
	$output = get_option('trgb_' . $price_type . '_' . $user_status . '_text');

	if(empty($output)) {
		return $button_text;
	}
	return esc_html( $output );
}


function trgb_course_grid_custom_button_style($item_html, $post, $shortcode_atts, $user_id) {

	$to_find = [
		'role' => 'button',
		'class' => 'btn',
		'class' => 'btn-primary',
	];

	$visitor = !$user_id;
	$user_status = ($visitor) ? 'non_logged' : 'non_enrolled';
	if($user_id && sfwd_lms_has_access( $post->ID, $user_id )) {
		$user_status = 'enrolled';
	}
	if($user_id && learndash_course_completed( $user_id, $post->ID )) {
		$user_status = 'completed';
	}

	$color = get_option("trgb_all_{$user_status}_color" );
    $background_color = get_option("trgb_all_{$user_status}_background_color" );
    $font_size = get_option("trgb_all_{$user_status}_font_size" );
    $uppercase = get_option("trgb_all_{$user_status}_uppercase" );
    $border_color = get_option("trgb_all_{$user_status}_border_color" );
	$border_radius = get_option("trgb_all_{$user_status}_border_radius" );
	

	//completed fallsback to enrolled
	if($user_status === 'completed') {
		if(empty($color)) {
			$color = get_option("trgb_all_enrolled_color" );
		} 
		if(empty($background_color)) {
			$background_color = get_option("trgb_all_enrolled_background_color" );
		}
		if(empty($font_size)) {
			$font_size = get_option("trgb_all_enrolled_font_size" );
		} 
		if(empty($uppercase)) {
			$uppercase = get_option("trgb_all_enrolled_uppercase" );
		}
		if(empty($border_color)) {
			$border_color = get_option("trgb_all_enrolled_border_color" );
		}
		if(empty($border_radius)) {
			$border_radius = get_option("trgb_all_enrolled_border_radius" );
		}
	}
	
	$styling_array = [
		'color' => $color,
		'background-color' => $background_color,
		'font-size' => $font_size,
		'border-color' => $border_color,
		'border-radius' => $border_radius,
	];

	if($uppercase) {
		$styling_array['text-transform'] = 'uppercase';
	}

	$serialized_style = '';
	foreach($styling_array as $key => $value) {
		if(empty($value)) {
			continue;
		}
		$serialized_style .= "$key:$value;";
	}
	if(empty($serialized_style)) {
		return $item_html;
	}

	$item_html = mb_convert_encoding($item_html, 'HTML-ENTITIES', "UTF-8");
	@$dom = new DOMDocument();
	@$dom->loadHTML($item_html);
	if(!$dom) {
		return $item_html;
	}
	$xpath = new DomXPath($dom);
	if(!$xpath) {
		return $item_html;
	}
	foreach ($to_find as $attr => $cl) {
		$nodeList = $xpath->query("//*[contains(concat(' ', normalize-space(@$attr), ' '), ' $cl ')]");
		if($nodeList && $nodeList->length) { 
			break;
		}
	} 
	if(!$nodeList || !$nodeList->length) {
		return $item_html;
	}
	
	$target_element = $nodeList->item(0);
	$target_element->setAttribute('style', $serialized_style);
	
	return $dom->saveHTML();
}