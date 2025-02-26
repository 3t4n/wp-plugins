<?php
/************************
 * Simple Youtube Responsive - Shortcode functions
 ************************/
 
// Prevent accessed directly
if ( !defined('ABSPATH') ){
	die;
}


// Get shortcode atts
function eirudo_ytresponsive_shortcodeattr( $content, $regex, $search ) {
	preg_match( "/$regex/", $content, $shortcode_atts );
	
	$search = $search . '=';

	if ( empty( $shortcode_atts ) ) {
		return false;
	}

	$matches = array_filter( $shortcode_atts, function( $var ) use ( $search ) {
		return ( 0 === strpos( trim( $var ), $search ) );
	}
	);

	if ( empty( $matches ) ) {
		return false;
	}

	$tmpArray = array_values( $matches );

	$value_string = array_shift( $tmpArray );

	$val = str_replace( $search , '', $value_string );

	$val = str_replace( '"', '', $val );
	$val = str_replace( "'", '', $val );
	$val = strtok($val, ' ');
	return trim( $val );
}



// Hijack shortcode for AMP.
// Thanks to John Regan
// https://johnregan3.co/2016/08/03/a-comprehensive-guide-to-supporting-amp-in-wordpress/#handling-shortcodes
function eirudo_ytresponsive_amp( $content ) {
	global $shortcode_tags;
    if ( !function_exists('is_amp_endpoint') || ! is_amp_endpoint() || empty( $shortcode_tags ) || ! is_array( $shortcode_tags ) || ! has_shortcode($content, 'youtube') ) {
      return $content;
    }else{

		$regex = get_shortcode_regex( array( 'youtube' ) );
		preg_match_all('/'.$regex.'/s', $content, $matches);

		// Hitung jumlah shortcode 
		if( $matches ){
		  $jumlahs = count($matches[1]);
		}
		
		for($i=0; $i < $jumlahs; $i++){

		  if ($matches[2][$i] == 'youtube'){
			// Fix attr yang terkumpul
			$attr_str = str_replace (" ", "&", trim ($matches[3][$i]));
			$attr_str = str_replace ('"', '', $attr_str);

			  //  Parse the attributes
			$defaults = array (
			  'ratio' => '16:9',
			);

			// Join if default belum diset
			$attributes = wp_parse_args ($attr_str, $defaults);

			$videoID = false;
			$videoRatio = '16:9';
			
			if ( isset( $attributes['v'] ) ){
				$videoID = $attributes['v'];
			}else if( isset( $attributes['video'] ) ){
				$videoID = $attributes['video'];
			}

			// Jika video ID ada, proses
			if( $videoID ){
			  // Check ratio
			  if ( isset( $attributes['ratio'] ) ){
				  $videoRatio = $attributes['ratio'];
			  }

			  $ratio = explode(':', $videoRatio);
				$ratioX = floatval( $ratio[0] );
				$ratioY = floatval( $ratio[1] );
				$videoWidth = $ratioX * 40;
				$videoHeight = $ratioY * 40;

			  // Get img Thumb
			  if ( isset( $attributes['thumb'] ) ){
				$imgSrc = $attributes['thumb'];
			  }else{
				$imgSrc = 'https://i.ytimg.com/vi/'.$videoID.'/hqdefault_live.jpg';
			  }

			  $vidThumb = '<amp-img src="'.$imgSrc.'" placeholder layout="fill" />';

			  $newEmbed = '<p><amp-youtube width="'.$videoWidth.'" height="'.$videoHeight.'" layout="responsive" data-videoid="'.$videoID.'">'.$vidThumb.'</amp-youtube></p>';

			  
			  // Replace shortcode using AMP Code
			  $toReplace = $matches[0][$i];
			  $content = str_replace($toReplace, '[EIRUDOYTRESPONSIVE-'.$i.']', $content);
			  
			  $content = str_replace( '[EIRUDOYTRESPONSIVE-'.$i.']', $newEmbed, $content );

			}
		  }
		}
		// Output
		return $content;
	}
}
add_filter( 'the_content', 'eirudo_ytresponsive_amp' );

// Include YouTube AMP Scripts
function eirudo_ytresponsive_amp_js() {
?><script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script><?php
}
add_action( 'amp_post_template_head', 'eirudo_ytresponsive_amp_js' );


// YouTube Responsive
function eirudo_ytresponsive( $a ) {
	$html = '';
	$uniqid = uniqid();
	$erdyt_options = $GLOBALS['erdyt_options'];
	
	$atts = shortcode_atts( array(
		'v' => '',
		'video' => '',
		'id' => '',
  		'style' => '',
		'title' => '',
		'start' => '',
		'end' => '',
		'param' => '',
		'thumb' => '',
		'controls' => '',
		'lazyload' => $erdyt_options['lazyload'],
		'maxwidth' => $erdyt_options['maxwidth'],
		'ratio' => $erdyt_options['ratio'],
		'center' => $erdyt_options['centered'],
		'autoplay' => $erdyt_options['autoplay'],
		'loop' => $erdyt_options['loop'],
		'allowfullscreen' => $erdyt_options['allowfullscreen'],
		'class' => $erdyt_options['classes'],
		'imgq' => $erdyt_options['thumb'],
	), $a );
	
	// Sanitize allow
	$videoId			= ( !empty( $atts['video'] ) ) ? esc_attr( $atts['video'] ) : '';
	$videoId			= ( !empty( $atts['v'] ) ) ? esc_attr( $atts['v'] ) : ''; // Overwrite if using v instead
	
	// If video ID is empty, skip to return empty output 
	
	if( !empty( $videoId ) ){
		
		$divId				= ( !empty( $atts['id'] ) ) ? esc_attr( $atts['id'] ) : 'erdyt-' . $uniqid;
		$divClasses			= ( !empty( $atts['class'] ) ) ? ' '.esc_attr( $atts['class'] ) : '';
		$titleAttr			= ( !empty( $atts['title'] ) ) ? 'title="' . esc_attr( $atts['title'] ) . '"' : '';
		$ratio				= ( !empty( $atts['ratio'] ) ) ? esc_attr( $atts['ratio'] ) : '16:9';
		$maxWidth			= ( !empty( $atts['maxwidth'] ) ) ? 'max-width:'.esc_attr( $atts['maxwidth'] ).';' : '';
		$centered			= ( !empty( $atts['center'] ) ) ? eirudo_ytrp_stringtobool(esc_attr( $atts['center'] )) : false;
		$centered			= $centered ? 'margin-left:auto;margin-right:auto;' : '';
		$style				= ( !empty( $atts['style'] ) ) ? esc_attr( $atts['style'] ) : '';
		
		$lazyload			= ( !empty( $atts['lazyload'] ) ) ? eirudo_ytrp_stringtobool( esc_attr( $atts['lazyload'] ) ) : false;
		$imgThumb			= ( !empty( $atts['thumb'] ) ) ? esc_url( esc_attr( $atts['thumb'] ) ) : false;
		$imgQuality			= ( !empty( $atts['imgq'] ) ) ? esc_attr( $atts['imgq'] ) : 'hqdefault';
		
		$params				= ( !empty( $atts['param'] ) ) ? esc_attr( $atts['param'] ) : false;
		$playStart			= ( !empty( $atts['start'] ) ) ? esc_attr( $atts['start'] ) :false;
		$playEnd			= ( !empty( $atts['end'] ) ) ? esc_attr( $atts['end'] ) : false;
		$loop				= ( !empty( $atts['loop'] ) ) ? eirudo_ytrp_stringtobool( esc_attr( $atts['loop'] ) ) : true;
		$autoPlay			= ( !empty( $atts['autoplay'] ) ) ? eirudo_ytrp_stringtobool( esc_attr( $atts['autoplay'] ) ) : false;
		$allowFullscreen	= ( !empty( $atts['allowfullscreen'] ) ) ? eirudo_ytrp_stringtobool( esc_attr( $atts['allowfullscreen'] ) ) : true;
		$controls			= ( !empty( $atts['controls'] ) ) ? eirudo_ytrp_stringtobool( esc_attr( $atts['controls'] ) ) : true;
		
		// Since it's lazyload, autoplay is true
		if( $lazyload ){
			$autoPlay = true;
		}

		// Ratio generator
		$ratio = explode( ':', $ratio );
			$ratioX = floatval( $ratio[0] );
			$ratioY = floatval( $ratio[1] );
			$setRatio = ( floatval($ratioY) / floatval($ratioX) ) * 100;
			$cssRatio = 'padding-bottom:' . $setRatio . '%;';
			
		//CSS 
		$divStyle = 'display:block;position:relative;clear:both;width:100%;' . $maxWidth . $centered . $style;


		// Combine values
		$paramArray = array();
		
		// If custom params, insert to array
		if( $params ){
			$params = strtolower( $params );
			$params = explode( '&', $params );
			
			// Fix to int-value params while converting boolean value to int
			foreach( $params as $i => $p ){
				$pTemp = explode( '=', $p);
				$paramArray[$pTemp[0]] = $pTemp[1];
			}
		}
		
		// Override params from attribute 
		if($playStart){ $paramArray['start'] = $playStart; }
		if($playEnd){ $paramArray['end'] = $playEnd; }
		if($loop){ $paramArray['loop'] = $loop; }
		if($autoPlay){ $paramArray['autoplay'] = $autoPlay; }
		if(!$allowFullscreen){ $paramArray['fs'] = $allowFullscreen; }
		if(!$controls){ $paramArray['controls'] = $controls; }
		
		// Set as param format
		$paramsFixed = '';
		foreach( $paramArray as $i => $p ){
			$paramsFixed .= $i . '=' . $p;
			if( array_key_last($paramArray) != $i ){
				$paramsFixed .= '&';
			}else{
				$paramsFixed .= '&rel=0';
			}
		}
		
		
		// Jika ada params, add ?
		if( !empty($paramsFixed) ){
			$paramsFixed = '?'.$paramsFixed;
		}
		
		// Create HTML
		if( $lazyload ){		
			// Build div wrapper
			if( !$imgThumb ){
				$imgThumb = esc_url('https://i.ytimg.com/vi/' . $videoId . '/' . $imgQuality . '.jpg');
			}
			$withTitle = !empty( $titleAttr ) ? 'data-' . $titleAttr : '';
			$embedContent = '<div class="erd-ytplay" id="erdytp-' . $videoId . '-' . $uniqid . '" data-vid="' . $videoId . '"' . $withTitle . ' ' . $titleAttr . '  data-src="'.esc_url('https://www.youtube.com/embed/'.$videoId.$paramsFixed).'"'.(eirudo_ytrp_stringtobool($allowFullscreen) ? ' data-allowfullscreen="true"':'').'><img src="' . $imgThumb . '" alt="' . ( !empty( $atts['title'] ) ? esc_attr( $atts['title'] ) : 'YouTube Video' ) . '" /></div>';
		}else{
			// Build iframe embed
			$withTitle = !empty( $titleAttr ) ? ' ' . $titleAttr : '';
			$embedContent = '<iframe id="erdyti-' . $uniqid . '"' . $withTitle . ' src="'.esc_url('https://www.youtube.com/embed/'.$videoId.$paramsFixed).'" frameborder="0"'.(eirudo_ytrp_stringtobool($allowFullscreen) ? ' allowfullscreen=""':'').'></iframe>';
		}
		
		$html = '<div id="' . $divId . '" data-id="' . $videoId . '" class="erd-youtube-responsive' . $divClasses . '" style="' . $divStyle . '"><div style="' . $cssRatio . '">' . $embedContent . '</div></div>';
		
		// Check settings if only embed in shortcode page 
		//if ( $erdyt_options['printedscripts'] == 'embedonly' ){
			//add_action( 'wp_enqueue_scripts', 'eirudo_ytresponsive_scripts' );
		//}
	}else{
		$html = esc_html_e( 'Video ID not provided: Please check your shortcode.', 'simple-youtube-responsive');
	}
	return $html;
}
add_shortcode( 'youtube', 'eirudo_ytresponsive' );