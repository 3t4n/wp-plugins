<?php
function acf_snippet_get_image( $selector = '', $postId = false, $args = null ) {

	$defaults = array(
		'size'    => 'full',
		'alt'     => '',
		'id'      => '',
		'class'   => '',
		'title'   => false,
		'srcset'  => false,
		'loading' => 'lazy',
		'link'    => false
	);

	$args = wp_parse_args( $args, $defaults );

	if ( $postId === true ) {
		$image = get_sub_field($selector);
	} else {
		$image = get_field( $selector, $postId );
	}

	if ( empty( $image ) or !is_array($image) ) {
		return false;
	}

	$output = '';

	if ( array_key_exists( $args['size'], $image['sizes'] ) ) {
		$src = $image['sizes'][$args['size']];
		$width = $image['sizes'][$args['size'].'-width'];
		$height = $image['sizes'][$args['size'].'-width'];
	} else {
		$src = $image['url'];
		$width = $image['width'];
		$height = $image['height'];
	}

	if ( $args['srcset'] == true ) {
		$srcSet = wp_get_attachment_image_srcset( $image['ID'], $args['size'] );
	}

	if ( empty($args['alt']) or $args['alt'] == 'alt' ) {
		$alt = $image['alt'];
	} elseif ( array_key_exists( $args['alt'], $image ) ) {
		$alt = $image[$args['alt']];
	} else {
		$alt = $args['alt'];
	}

	if ( $args['title'] !== false ) {
		if ( $args['title'] === true ) {
			$title = $image['title'];
		} elseif ( array_key_exists( (string)$args['title'], $image ) ) {
			$title = $image[$args['title']];
		} else {
			$title = $args['title'];
		}
	}

	if ( $args['link'] !== false ) {
		$output .= '<a '.
		           ( !empty($args['link']['href'] ) ? ' href="'.$args['link']['href'].'"' : '') .
		           ( !empty($args['link']['target'] ) ? ' target="'.$args['link']['target'].'"' : '') .
		           ( !empty($args['link']['class'] ) ? ' class="'.$args['link']['class'].'"' : '') .
		           ( !empty($args['link']['id'] ) ? ' id="'.$args['link']['id'].'"' : '') .
		           ( !empty($args['link']['title'] ) ? ' title="'.esc_attr($args['link']['title']).'"' : '') .
		           '>';
	}

	$output .= '<img 
						src="'.$src.'" 
						width="'.$width.'" 
						height="'.$height.'" 
						alt="'.esc_attr($alt).'"'.
	           ( isset( $title ) ? ' title="'.esc_attr($title).'"' : '') .
	           ( !empty( $args['class'] ) ? ' class="'.$args['class'].'"' : '') .
	           ( !empty( $args['id'] ) ? ' id="'.$args['id'].'"' : '') .
	           ( $args['loading']!='auto' ? ' loading="'.$args['loading'].'"' : '') .
	           ( !empty( $srcSet ) ? ' srcset="'.$srcSet.'"' : '') .
	           ' />';


	if ( $args['link'] !== false ) {
		$output .= '</a>';
	}

	$output = apply_filters( 'acf_snippet_get_image', $output );

	return $output;

}

function acf_snippet_the_image( $selector = '', $postId = false, $args = null ) {

	echo acf_snippet_get_image( $selector, $postId, $args );

}