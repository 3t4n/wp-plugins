<?php
if ( ! defined( 'ABSPATH' ) ) exit;

include dirname(__FILE__).'/includes/check_language.php';
include dirname(__FILE__).'/includes/check_id.php';

//List2Go Shortcode
function oaembed_list2go( $atts ) {
	$list = shortcode_atts( array(
		'displaymap' => '',
		'showheader' => '',
		'maxwidth' => '',
		'url' => '',
		),
	$atts
	);

	$shortcodeType = 'list';
	$url = $list['url'];
	$maxwidth = $list['maxwidth'];

	$listshow = oaembed_get_id( $url );

	$displayMap = $list['displaymap'];
	$showHeader = $list['showheader'];

	if ( $showHeader == 'false' ) {
		$noHeader = 'true';
	} else {
		$noHeader = 'false';
	}

	$options = get_option ( 'oaembedoptions' );
	$checkPoweredBy = $options['checkPoweredBy'];

	$language = oaembed_check_language();
	$frontend = oaembed_get_frontend( $url );

	if ( $maxwidth != '' ) {
		$maxwidth_str = 'max-width: '.esc_attr( $maxwidth ).'px';
	} else {
		$maxwidth_str = 'max-width: 100%';
	}

	if ( oaembed_check_published( $show ) == false ) {
		$embed = '<p style="color: #ff0000">'.__( 'Content is not published. Please publish your content', 'outdooractiveEmbed' ).'</p>';
	} else {
		if ( $frontend == 'www.outdooractive.com' || $frontend == '' ) {
			$embed = '<div style="min-width: 260px; '.$maxwidth_str.'"><script type="text/javascript" src="https://www.outdooractive.com/'.$language.'/embed/'.esc_attr( $show ).'/js?noHeader='. esc_attr($noHeader) .'&initMap='. esc_attr($displayMap) .'"></script>';
			/* add later, for pro: $noBranding=false */

			if ( $checkPoweredBy == 1 ) {
				$embed .= '<p><a href="https://www.outdooractive.com/r/'.esc_attr( $embed ).'/" target="_blank">'.__('learn more', 'outdooractiveEmbed').' ›</a></p>';
			}
			$embed .= '</div>';
		} else {

			$embed = '<div style="min-width: 260px; '.$maxwidth_str.'"><script type="text/javascript" src="https://www.outdooractive.com/'.$language.'/embed/'. esc_attr( $show ) .'/js?noHeader='. esc_attr($noHeader) . '&initMap='. esc_attr($displayMap) .'"></script>'; /* add later for pro $noBranding=false */
			/* add later for pro '$noBranding='.esc_attr($nobranding). */

			if ( $checkPoweredBy == 1 ) {
				$embed .= '<p><a title="'.__('Europes biggest Outdoor-Plattform', 'outdooractiveEmbed').'" href="https://www.outdooractive.com/" target="_blank">part of outdooractive</a></p>';
			 }
			 $embed .= '</div>';
		}
	}

	return $embed;
}

//Tour2Go Shortcode
function oaembed_tour2go( $atts ) {

	$embedAtts = shortcode_atts( array(
		'maxwidth' => '',
		'url' => '',
		'nobranding' => 'false'
		),
	$atts
	);

	$maxwidth = $embedAtts['maxwidth'];
	$url = $embedAtts['url'];
	/* $nobranding = $embedAtts['nobranding']; */

	$options = get_option( 'oaembedoptions' );
	$checkPoweredBy = $options['checkPoweredBy'];

	$show = oaembed_get_id( $url );
	$language = oaembed_check_language();
	$frontend = oaembed_get_frontend( $url );
	if ( $maxwidth != '' ) {
		$maxwidth_str = 'max-width: '.esc_attr( $maxwidth ).'px';

		if ( intval( $maxwidth ) <= 400 ) {
			$mw = 'true';
		} else {
			$mw = 'false';
		}
	} else {
		$maxwidth_str = 'max-width: 100%';
		$mw = 'false';
	}

	if ( oaembed_check_published( $show ) == false ) {
		$embed = '<p style="color: #ff0000">'.__( 'Content is not published. Please publish your content', 'outdooractiveEmbed' ).'</p>';
	} else {
		if ( $frontend == 'www.outdooractive.com' || $frontend == '' ) {
			$embed = '<div style="min-width: 260px; '.$maxwidth_str.'"><script type="text/javascript" src="https://www.outdooractive.com/'.$language.'/embed/'.esc_attr( $show ).'/js?mw='.$mw.'"></script>';
			/* add later, for pro: $noBranding=false */

			if ( $checkPoweredBy == 1 ) {
				$embed .= '<p><a href="https://www.outdooractive.com/r/'.esc_attr( $embed ).'/" target="_blank">'.__('learn more', 'outdooractiveEmbed').' ›</a></p>';
			}
			$embed .= '</div>';
		} else {
			if ( $frontend == 'regio.outdooractive.com' ) {
				$regioparts = explode( '/', $url );
				$regio = $regioparts[3];
				$srcurl = $frontend.'/'.$regio.'/'.$language.'/embed/'.$show;
			} else {
				$srcurl = $frontend.'/'.$language.'/embed/'.$show;
			}

			$embed = '<div style="min-width: 260px; '.$maxwidth_str.'"><script type="text/javascript" src="https://'.esc_attr( $srcurl ).'/js?mw='.$mw.'"></script>'; /* add later for pro $noBranding=false */
			/* add later for pro '$noBranding='.esc_attr($nobranding). */

			if ( $checkPoweredBy == 1 ) {
				$embed .= '<p><a title="'.__('Europes biggest Outdoor-Plattform', 'outdooractiveEmbed').'" href="https://www.outdooractive.com/" target="_blank">part of outdooractive</a></p>';
			 }
			 $embed .= '</div>';
		}
	}

	return $embed;
}

//Hut2Go Shortcode
function oaembed_hut2go( $atts ) {

	$embedAtts = shortcode_atts( array(
		'maxwidth' => '',
		'url' => '',
		'nobranding' => 'false'
		),
	$atts
	);

	$maxwidth = $embedAtts['maxwidth'];
	$url = $embedAtts['url'];
	/* $nobranding = $embedAtts['nobranding']; */

	$options = get_option( 'oaembedoptions' );
	$checkPoweredBy = $options['checkPoweredBy'];

	$show = oaembed_get_id( $url );
	$language = oaembed_check_language();
	$frontend = oaembed_get_frontend( $url );
	if ( $maxwidth != '' ) {
		$maxwidth_str = 'max-width: '.esc_attr( $maxwidth ).'px';

		if ( intval( $maxwidth ) <= 400 ) {
			$mw = 'true';
		} else {
			$mw = 'false';
		}
	} else {
		$maxwidth_str = 'max-width: 100%';
		$mw = 'false';
	}

	if ( oaembed_check_published( $show ) == false ) {
		$embed = '<p style="color: #ff0000">'.__( 'Content is not published. Please publish your content', 'outdooractiveEmbed' ).'</p>';
	} else {
		if ( $frontend == 'www.outdooractive.com' || $frontend == '' ) {
			$embed = '<div style="min-width: 260px; '.$maxwidth_str.'"><script type="text/javascript" src="https://www.outdooractive.com/'.$language.'/embed/'.esc_attr( $show ).'/js?mw='.$mw.'"></script>';
			/* add later, for pro: $noBranding=false */

			if ( $checkPoweredBy == 1 ) {
				$embed .= '<p><a href="https://www.outdooractive.com/r/'.esc_attr( $embed ).'/" target="_blank">'.__('learn more', 'outdooractiveEmbed').' ›</a></p>';
			}
			$embed .= '</div>';
		} else {
			if ( $frontend == 'regio.outdooractive.com' ) {
				$regioparts = explode( '/', $url );
				$regio = $regioparts[3];
				$srcurl = $frontend.'/'.$regio.'/'.$language.'/embed/'.$show;
			} else {
				$srcurl = $frontend.'/'.$language.'/embed/'.$show;
			}

			$embed = '<div style="min-width: 260px; '.$maxwidth_str.'"><script type="text/javascript" src="https://'.esc_attr( $srcurl ).'/js?mw='.$mw.'"></script>'; /* add later for pro $noBranding=false */
			/* add later for pro '$noBranding='.esc_attr($nobranding). */

			if ( $checkPoweredBy == 1 ) {
				$embed .= '<p><a title="'.__('Europes biggest Outdoor-Plattform', 'outdooractiveEmbed').'" href="https://www.outdooractive.com/" target="_blank">part of outdooractive</a></p>';
			 }
			 $embed .= '</div>';
		}
	}

	return $embed;
}

function oaembed_embed( $atts ) {
	$embedAtts = shortcode_atts( array(
		'maxwidth' => '',
		'url' => '',
		'usepro' => false,
		),
	$atts
	);

	$maxwidth = $embedAtts['maxwidth'];
	$url = $embedAtts['url'];
	$usePro = (string)$embedAtts['usepro'];

	$options = get_option( 'oaembedoptions' );
	$usrName = $options['usrName'];
	$proKey = $options['proKey'];

	$show = oaembed_get_id( $url );
	$language = oaembed_check_language();
	$frontend = oaembed_get_frontend( $url );

	if ( $maxwidth != '' ) {
		$maxwidth_str = 'max-width: '.esc_attr( $maxwidth ).'px';

		if ( intval( $maxwidth ) <= 400 ) {
			$mw = 'true';
		} else {
			$mw = 'false';
		}
	} else {
		$maxwidth_str = 'max-width: 100%';
		$mw = 'false';
	}

	if ( oaembed_check_published( $show ) == false ) {
		$embed = '<p style="color: #ff0000">'.__( 'Content is not published. Please publish your content', 'outdooractiveEmbed' ).'</p>';
	} else {

		$parameter = 'mw='.$mw;
		if ( $usrName != '' && $proKey != '' && $usePro == 'true') {
			$parameter .= '&usr='.$usrName.'&key='.$proKey;
		}

		if ( $frontend == 'www.outdooractive.com' || $frontend == '' ) {
			$embed = '<div style="min-width: 260px; '.$maxwidth_str.'"><script type="text/javascript" src="https://www.outdooractive.com/'.$language.'/embed/'.esc_attr( $show ).'/js?'.$parameter.'"></script>';
			$embed .= '</div>';
		} else {
			if ( $frontend == 'regio.outdooractive.com' ) {
				$regioparts = explode( '/', $url );
				$regio = $regioparts[3];
				$srcurl = $frontend.'/'.$regio.'/'.$language.'/embed/'.$show;
			} else {
				$srcurl = $frontend.'/'.$language.'/embed/'.$show;
			}

			$embed = '<div style="min-width: 260px; '.$maxwidth_str.'"><script type="text/javascript" src="https://'.esc_attr( $srcurl ).'/js?'. esc_attr($parameter) .'"></script>';
			$embed .= '</div>';
		}
	}

	return $embed;
}

//Register Shortcodes
add_shortcode( 'list2go', 'oaembed_list2go' );
add_shortcode( 'tour2go', 'oaembed_tour2go' );
add_shortcode( 'hut2go', 'oaembed_hut2go' );
add_shortcode( 'oaembed', 'oaembed_embed' );

?>