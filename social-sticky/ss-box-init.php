<?php

// Like box size
$ss_box_width = $options[ 'Width' ];
$ss_box_height = $options[ 'Height' ];

// SVG size	
$ss_svg = $effect_size*2;

// Left, top, right, bottom value for like box style
if ( $position == 'Left' ) 
	$ss_likebox_ltrb = vsprintf( "left:%dpx; bottom:%dpx;",array(-( $options[ 'Width' ]), -( $options[ 'Height' ] ) ) );
else
	$ss_likebox_ltrb = vsprintf( "right:%dpx; bottom:%dpx;",array(-( $options[ 'Width' ]), -( $options[ 'Height' ] ) ) );

/*
Some values for effect Arc or Triangle.
Note: Make sure "ss_arc_id" same as with ss.js file.
*/
$ss_arc_id = ( $position == 'Left' ? "arc-left-bottom" : "arc-right-bottom" );

if ( $effect_type == 'ArcOut' ) {
	$ss_arc_cx = ( $position == 'Left' ? 0 : $ss_svg);
	$ss_arc_cy = ( $position == 'Left' ? $ss_svg : $ss_svg);
}
else if ( $effect_type == 'ArcIn' || $effect_type == 'TriangleCorner' ) {
	$ss_arc_cx = $effect_size;
	$ss_arc_cy = $effect_size;
}

if ( $position == 'Left' )
	$ss_arcOut_path_d = vsprintf( "M %d,%d  A %d,%d %d %d,%d %d,%d l %d %d l %d %d z",array(0, $ss_svg/2, $ss_svg/2, $ss_svg/2, 0, 0, 1, $ss_svg/2, $ss_svg, -$ss_svg/2, 0, 0, -$ss_svg/2) );
else
	$ss_arcOut_path_d = vsprintf( "M %d,%d  A %d,%d %d %d,%d %d,%d l %d %d l %d %d z", array ( $ss_svg, $ss_svg/2, $ss_svg/2, $ss_svg/2, 0, 0, 0, $ss_svg/2, $ss_svg, $ss_svg/2, 0, 0, -$ss_svg/2) );

if ( $position == 'Left' )
	$ss_arcIn_path_d = vsprintf( "M %d,%d  A %d,%d %d %d,%d %d,%d l %d %d l %d %d z",array(0, $ss_svg/2, $ss_svg/2, $ss_svg/2, 0, 0, 0, $ss_svg/2, $ss_svg, -$ss_svg/2, 0, 0, -$ss_svg/2) );
else 
	$ss_arcIn_path_d = vsprintf( "M %d,%d  A %d,%d %d %d,%d %d,%d l %d %d l %d %d z", array ( $ss_svg, $ss_svg/2, $ss_svg/2, $ss_svg/2, 0, 0, 1, $ss_svg/2, $ss_svg, $ss_svg/2, 0, 0, -$ss_svg/2) );

$ss_triangle_w = $effect_size/4;
if ( $position == 'Left' ) {
	$ss_triangleCorner_path_d = vsprintf( "M%d %d  L%d %d L%d %d L%d %d Z",array(0, $ss_svg/2, 0, $ss_svg, $ss_svg/2, $ss_svg, $ss_triangle_w, $ss_svg - $ss_triangle_w) );
} 
else {
	$ss_triangleCorner_path_d = vsprintf( "M%d %d  L%d %d L%d %d L%d %d Z", array ( $ss_svg, $ss_svg/2, $ss_svg, $ss_svg, $ss_svg/2, $ss_svg, $ss_svg - $ss_triangle_w, $ss_svg - $ss_triangle_w) );
}

$ss_grad_EffectArcOut_x1 = ( $position == 'Left' ? "70%" : "30%" );
$ss_grad_EffectArcOut_y1 = ( $position == 'Left' ? "30%" : "30%" );
$ss_grad_EffectArcOut_x2 = ( $position == 'Left' ? "0%" : "100%" );
$ss_grad_EffectArcOut_y2 = ( $position == 'Left' ? "100%" : "100%" );

$ss_grad_EffectArcIn_x1 = ( $position == 'Left' ? "30%" : "70%" );
$ss_grad_EffectArcIn_y1 = ( $position == 'Left' ? "70%" : "70%" );
$ss_grad_EffectArcIn_x2 = ( $position == 'Left' ? "0%" : "100%" );
$ss_grad_EffectArcIn_y2 = ( $position == 'Left' ? "100%" : "100%" );

$ss_grad_TriangleCorner_x1 = ( $position == 'Left' ? "50%" : "50%" );
$ss_grad_TriangleCorner_y1 = ( $position == 'Left' ? "50%" : "50%" );
$ss_grad_TriangleCorner_x2 = ( $position == 'Left' ? "0%" : "100%" );
$ss_grad_TriangleCorner_y2 = ( $position == 'Left' ? "0%" : "100%" );

/*
Some values for logo social.
Note: Make sure "ss_logo_id" same as with ss.js file.
*/
$ss_logo_id = ( $position == 'Left' ? "logo-left-bottom" : "logo-right-bottom" );
$ss_logo_x = ( $position == 'Left' ? 0 : $ss_svg );
$ss_logo_y = ( $ss_svg/2 );
$ss_logo_w = 30;
$ss_logo_h = $ss_logo_w;

if ( $effect_type == 'ArcOut' )
	$ss_logo_rotate_value = ( $position == 'Left' ? -45 : 45 );
else if ( $effect_type == 'ArcIn' || $effect_type == 'TriangleCorner' )
	$ss_logo_rotate_value = ( $position == 'Left' ? 45 : -45 );

/*
Rotate value for each logo animation.
*/
if ( $effect_type == 'ArcOut' ) {
	$ss_animation_min = ( $position == 'Left' ? 25 : -65 );
	$ss_animation_max = ( $position == 'Left' ? 65 : -25 );
}
else if ( $effect_type == 'ArcIn' || $effect_type == 'TriangleCorner' ) {
	$ss_animation_min = ( $position == 'Left' ? -55 : 35 );
	$ss_animation_max = ( $position == 'Left' ? -35 : 55 );
}

// These ids will be used to make transform with ss-effect.
if ( $effect_type == 'ArcOut' )
	$ss_animation_id = ( $position == 'Left' ? "ArcOutLeft" : "ArcOutRight" );
else if ( $effect_type == 'ArcIn' )
	$ss_animation_id = ( $position == 'Left' ? "ArcInLeft" : "ArcInRight" );
else if ( $effect_type == 'TriangleCorner' )
	$ss_animation_id = ( $position == 'Left' ? "TriangleLeft" : "TriangleRight" );

/*
Type effect:
	1 : Right Bottom Effect
	2 : Left Bottom Effect
	3 : Left Top Effect
	4 : Right Top Effect
*/
if ( $effect_type == 'ArcOut' )
	$ss_animation_index = ( $position == 'Left' ? 2 : 1);
else if ( $effect_type == 'ArcIn' || $effect_type == 'TriangleCorner' )
	$ss_animation_index = ( $position == 'Left' ? 4 : 3);
?>