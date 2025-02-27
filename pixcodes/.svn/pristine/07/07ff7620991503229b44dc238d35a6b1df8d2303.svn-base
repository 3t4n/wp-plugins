<?php

$output = '<i class="pixcode  pixcode--icon  icon-' . esc_attr( $name ) . '  ' . esc_attr( $type ) . '  ' . esc_attr( $size ) . '  ' . esc_attr( $class ) . '"></i>';

if ( ! empty( $link ) ) {
	$link = ' href="' . esc_url( $link ) . '" ';

	if ( ! empty( $link_target_blank ) ) {
		$link .= ' target="_blank" ';
	}

	$output = '<a class="pixcode-icon-link" ' . $link . '">' . $output . '</a>';
}

echo $output;
