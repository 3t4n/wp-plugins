<?php
/**
 * Shortcode functions
 *
 * @author   	AyoThemes
 * @package   	Ayo Shortcodes
 * @since 		0.1
 * @copyright 	Copyright (c) 2013, AyoThemes
 * @license  	http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

/** Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'the_content', 'ayo_fix_shortcodes' );
/**
 * Fix WordPress Content formatting
 * 
 * @since  	0.1
 */
function ayo_fix_shortcodes( $content ){   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']', 
		']<br />' => ']'
	);
	$content = strtr( $content, $array );
	return $content;
}
	

add_shortcode( 'ayo_action', 'ayo_action_box' );
/**
 * Big text with icon button
 * This shortcode is not available at tinymce since Im not sure is this shortcode is appopriate
 * 
 * @since  	0.1
 */
function ayo_action_box( $atts, $content = null ) {

	$defaults = array(
		'url' 			=> '',
		'target'		=> '',
		'text'			=> '',
		'color' 		=> '#FFFFFF',			
		'background'	=> '#444444',			
		'icon'			=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );
	
	$url 		= ( $atts['url'] ) ?  'href="'. esc_url( $atts['url'] ).'"' : '';
	$target		= ( $atts['target'] ) ? 'target="'. $atts['target'] .'"' : '';
	$text 		= ( $atts['text'] ) ?  esc_attr( $atts['text'] ) : '';
	$color		= ( $atts['color'] ) ? 'color:'. $atts['color'] .';' : '';	
	$background	= ( $atts['background'] ) ? 'background-color: '. $atts['background'] .';' : '';
	$icon 		= ( $atts['icon'] ) ? '<div class="icon-action"><i class="icon-'. esc_attr( $atts['icon'] ) .'"></i></div>': '';
	$is_icon 	= ( $atts['icon'] ) ? 'padding-right: 52px' : '';

	$output = '<div class="ayo_action">';
	$output .= wpautop( htmlspecialchars_decode( $content ) );
	$output .= '</div>';

	if ( !empty( $url ) && !empty( $text ) ) {
		$output .= '<div class="action_button_wrap">';
		$output .= sprintf( '<a style="%1$s %2$s %3$s" %4$s %5$s>%6$s %7$s</a>', $background, $color, $is_icon, $target, $url,  esc_attr( $text ), $icon );
		$output .= '</div>';
	}
	
	return apply_filters( 'ayo_action_box', $output, $atts );

}

add_shortcode( 'ayo_alert', 'ayo_alert_shortcode' );
/**
 * Alert
 * 
 * @since  	0.1
 */
function ayo_alert_shortcode( $atts, $content = null ){
	$defaults = array(
		'column' 	=> '',
		'position'	=> '',
		'type'		=> '',
		'close'		=> 'true'
	);

	$atts = shortcode_atts( $defaults, $atts );

	$column 	= ( !empty( $atts['column'] ) ) ? ' ayo-'. esc_attr( $atts['column'] ) : '';
	$position 	= ( !empty( $atts['position'] ) ) ? ' ayo-'. esc_attr( $atts['position'] ) .'-column' : '';
	$type 		= ( !empty( $atts['type'] ) ) ? ' '. esc_attr( $atts['type'] ) : '';
	$close 		= ( $atts['close'] == 'true') ? '<button type="button" class="close" data-dismiss="alert">&times;</button>' : '';

	if ( $atts['close'] == 'true' && ! wp_script_is( 'bootstrap-alert', 'enqueue' ) )
		wp_enqueue_script( 'bootstrap-alert' );

	$output = sprintf( '<div class="ayo-alert-wrap fade in%1$s%2$s">%3$s', $column, $position, $close );
	$output .= sprintf( '<div class="ayo-alert %1$s">', $type );
	$output .= wpautop( do_shortcode( htmlspecialchars_decode ( $content ) ) );
	$output .= '</div></div>';

	if ( $atts['position'] == 'last' ) {
		$output .= '<div class="clear"></div>';
	}

	return apply_filters( 'ayo_alert_shortcode', $output, $atts );
}

add_shortcode( 'ayo_tooltip', 'ayo_tooltip_shortcode' );
/**
 * Alert
 * 
 * @since  	0.1
 */
function ayo_tooltip_shortcode( $atts, $content = null ){
	$defaults = array(
		'title'		=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );

	if ( ! wp_script_is( 'bootstrap-tooltip', 'enqueue' ) )
		wp_enqueue_script( 'bootstrap-tooltip' );

	$output = sprintf( '<a class="ayo-tooltip" href="#" data-toggle="tooltip" title="%s">%s</a>', $atts['title'], htmlspecialchars_decode ( $content ) );

	return apply_filters( 'ayo_tooltip_shortcode', $output, $atts );
}

add_shortcode( 'ayo_button', 'ayo_button_shortcode' );
/**
 * Inline button
 * 
 * @since  	0.1
 */
function ayo_button_shortcode( $atts, $content = null ){

	$defaults = array(
		'url'			=> '',
		'color'			=> '',
		'background'	=> '#444444',
		'size'			=> '',
		'target'		=> 'self',
		'rounded'		=> ''
	);

	$atts = shortcode_atts( $defaults, $atts );

	$url 		= ( $atts['url'] ) ?  'href="'. esc_url( $atts['url'] ) .'"' : '';
	$target		= ( $atts['target'] ) ? 'target="_'. $atts['target'] .'"' : '';
	$color		= ( $atts['color'] ) ? 'color:'. $atts['color'] .';' : '';
	$size		= ( $atts['size'] ) ? 'font-size:'. (int) $atts['size'] .'px;' : '';
	$background	= ( $atts['background'] ) ? 'background-color: '. $atts['background'] .';' : '';
	$rounded	= ( $atts['rounded'] == 'true' ) ? ' rounded' : '';

	$output = sprintf( '<a class="ayo-button%1$s" style="%2$s %3$s %4$s" %5$s %6$s>%7$s</a>', $rounded, $background, $color, $size, $target, $url, do_shortcode( htmlspecialchars_decode ( $content ) ) );

	return apply_filters( 'ayo_button_shortcode', $output, $atts );

}

add_shortcode( 'ayo_code', 'ayo_shortcode_codes' );
/**
 * Simple code wrapper
 * 
 * @since  	0.1
 */
function ayo_shortcode_codes ( $atts, $content = null ) {

	$defaults = array(
		'column' 	=> '',
		'position' 	=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );

	$column 	= ( !empty( $atts['column'] ) ) ? ' ayo-'. esc_attr( $atts['column'] ) : '';
	$position 	= ( !empty( $atts['position'] ) ) ? ' ayo-'. esc_attr( $atts['position'] ) .'-column' : '';
	
	$output = sprintf( '<div class="ayo-pre%1$s%2$s">', $column, $position );
	$output .= '<pre>'.  esc_attr( ayo_strip_autoformat( htmlspecialchars_decode( $content ) ) )  .'</pre>';
	$output .= '</div>';

	if ( $atts['position'] == 'last' ) {
		$output .= '<div class="clear"></div>';
	}

	return apply_filters( 'ayo_shortcode_codes', $output, $atts );

}

add_shortcode( 'ayo_email', 'ayo_safe_email' );
/**
 * Safe email from spam bot
 * 
 * @since  	0.1
 */
function ayo_safe_email( $atts, $content = null ){

	$defaults = array(
		'mailto' 	=> "false",
	);

	$atts = shortcode_atts( $defaults, $atts );

	if ( is_email( $content ) ) {
		if ( $atts['mailto'] == "true" ) {
			$output = '<a href="mailto:'. antispambot( $content ) .'">'. antispambot( $content ) .'</a>';
		} else {
			$output = antispambot( $content );
		}
	}


	return apply_filters( 'ayo_safe_email', $output, $atts );
}

add_shortcode( 'ayo_columns', 'ayo_column_shortcode' );
/**
 * Column Grid
 * 
 * @since  	0.1
 */
function ayo_column_shortcode( $atts, $content = null ){

	$defaults = array(
		'column' 	=> '',
		'position' 	=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );

	$column 	= ( !empty( $atts['column'] ) ) ? 'ayo-'. esc_attr( $atts['column'] ) : '';
	$position 	= ( !empty( $atts['position'] ) ) ? ' ayo-'. esc_attr( $atts['position'] ) .'-column' : '';

	$output = sprintf( '<div class="%1$s%2$s">%3$s</div>', 
						$column, 
						$position, 
						wpautop( do_shortcode( htmlspecialchars_decode ( $content ) ) ) );

	if ( $atts['position'] == 'last' ) {
		$output .= '<div class="clear"></div>';
	}

	return apply_filters( 'ayo_column_shortcode', $output, $atts );
}


add_shortcode( 'ayo_divider', 'ayo_divider_shortcode' );
/**
 * Divider Shortcode
 * 	
 * @since 	0.1
 */
function ayo_divider_shortcode( $atts ) {
	$defaults = array(
		'title'		=> '',
		'type'		=> ''
	);

	$atts = shortcode_atts( $defaults, $atts );	

	$output = sprintf( '<div class="divider %s">', esc_attr( $atts['type'] ) );
	$output .= ( $atts['title'] ) ? sprintf( '<div class="divider_title">%s</div>', esc_attr( $atts['type'] ) ) : '' ;
	$output .= '</div>';

	return apply_filters( 'ayo_divider_shortcode', $output, $atts );
}


add_shortcode( 'ayo_icon', 'ayo_fontawesome_shortcode' );
/**
 * Fontawesome shortcode
 * 	
 * @since 	0.1
 */
function ayo_fontawesome_shortcode( $atts ) {

	$defaults = array(
		'icon'  	=> 'adjust',
		'color' 	=> '',
		'size'		=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );

	$icon		= ( !empty( $atts['icon'] ) )	? 'icon-'. esc_attr( $atts['icon'] ) : '';
	$color		= ( !empty( $atts['color'] ) ) ? 'color:'. $atts['color'] .';' : '';
	$size		= ( !empty( $atts['size'] ) ) ? 'font-size:'. (int) $atts['size'] .'px;' : '';
	$style		= ( !empty( $color ) || !empty( $size ) ) ? ' style="'. $color .''. $size .'"' : '';

	$output = sprintf( '<i class="%1$s"%2$s></i>', $icon, $style );

	return apply_filters( 'ayo_fontawesome_shortcode', $output, $atts );

}

add_shortcode( 'ayo_progress', 'ayo_progress_shortcode' );
/**
 * Skillbar shortcode
 * 	
 * @since 	0.1
 */
function ayo_progress_shortcode( $atts ) {

	$defaults = array(
		'title'  		=> '',
		'percentage' 	=> '',
		'background'	=> '',
		'color'			=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );

	$percentage = ( ! empty( $atts['percentage'] ) ) ? ' data-percentage="'. $atts['percentage'] .'%"' : '';

	$background = ( ! empty( $atts['background'] ) ) ? 'background-color:'. $atts['background'] .';': '';
	$color = ( ! empty( $atts['color'] ) ) ? ' color:'. $atts['color'] . ';': '';
	$style = ( ! empty( $atts['background'] ) || ! empty( $atts['color'] ) ) ? ' style="'. $background . $color .'"' : '';

	$output = sprintf( '<div class="ayo-progress"%s>',  $percentage );
	if ( $atts['title'] )
		$output .= sprintf( '<div class="ayo-progress-title"%s><span>%s &ndash; <small>%s</small></span></div>', $style, $atts['title'], $atts['percentage'].'%' );
	$output .= sprintf( '<div class="ayo-progress-bar"%s></div>', $style );
	$output .= '</div><!-- end .ayo-progress -->';


	return apply_filters( 'ayo_progress_shortcode', $output, $atts );

}

add_shortcode( 'ayo_testimonial', 'ayo_testimonial_shortcode' );
/**
 * Testimonial shortcode
 * 	
 * @since 	0.1
 */
function ayo_testimonial_shortcode( $atts, $content = null ) {

	$defaults = array(
		'column'	=> '',
		'position'	=> '',
		'name'  	=> '',
		'email' 	=> '',
		'company'	=> '',
		'url'		=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );

	$column 	= ( !empty( $atts['column'] ) ) ? ' ayo-'. esc_attr( $atts['column'] ) : '';
	$position 	= ( !empty( $atts['position'] ) ) ? ' ayo-'. esc_attr( $atts['position'] ) .'-column' : '';

	$email 		= ( !empty( $atts['email'] ) ) ? '<span class="ayo_testimonial_photo">'. get_avatar( $atts['email'], '92', '', esc_attr( $atts['name'] ) ).'</span>': '';
	$email_on 	= ( !empty( $atts['email'] ) ) ? ' style="padding-bottom: 74px;"' : '';

	$output = sprintf( '<div class="ayo-testimonial_wrap%1$s%2$s">', $column, $position );
	$output .= sprintf('<div class="ayo-testimonial"%s>', $email_on );
	$output .= wpautop( htmlspecialchars_decode( $content ) );
	/** Start span */
	$output .= '<span class="ayo-testimonial-name ">';
	if ( !empty( $atts['name'] ) ) {
		$output .= esc_attr( $atts['name'] );
	}
	if ( !empty( $atts['company'] ) && !empty( $atts['url'] ) ) {
		$output .= ' &ndash; <a title="'. esc_attr( $atts['company'] ) .'" href="'. esc_url( $atts['url'] ) .'">'. esc_attr( $atts['company'] ).'</a>';
	} elseif ( !empty( $atts['company'] ) ) {
		$output .= ' &ndash; '. esc_attr( $atts['company'] );
	}
	$output .= '</span>';
	/** End span */
	if ( is_email( $atts['email'] ) ) {
		$output .= $email;
	}
	$output .= '</div><!-- end .ayo_testimonial --></div><!-- end .ayo-testimonial-wrap -->';

	if ( $atts['position'] == 'last' ) {
		$output .= '<div class="clear"></div>';
	}

    return apply_filters( 'ayo_testimonial_shortcode', $output, $atts );

}

add_shortcode( 'ayo_notes', 'ayo_notes_shortcode' );
/**
 * Notes shortcode
 * 	
 * @since 	0.1
 */
function ayo_notes_shortcode( $atts, $content = null ) {

	$defaults = array(
		'column'	=> '',
		'position'	=> '',
		'style' 	=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );

	$style 		= ( !empty( $atts['style'] ) ) ? ' '.esc_attr( $atts['style'] ) : '' ;
	$column 	= ( !empty( $atts['column'] ) ) ? ' ayo-'. esc_attr( $atts['column'] ) : '';
	$position 	= ( !empty( $atts['position'] ) ) ? ' ayo-'. esc_attr( $atts['position'] ) .'-column' : '';

	$output = sprintf( '<div class="ayo-notes_wrap%1$s%2$s">', $column, $position );
	$output .= sprintf( '<div class="ayo-notes%1$s">%2$s</div>',  $style, wpautop( do_shortcode( htmlspecialchars_decode ( $content ) ) ) );
	$output .= '</div>';
	if ( $atts['position'] == 'last' ) {
		$output .= '<div class="clear"></div>';
	}
	
    return apply_filters( 'ayo_notes_shortcode', $output, $atts );

}

add_shortcode( 'ayo_pricing', 'ayo_pricing_table_shorcode' );
/**
 * Pricing Table Shortcode
 * 	
 * @since 	0.1
 */
function ayo_pricing_table_shorcode( $atts, $content = null ) {

	$defaults = array(
		'column'		=> '',
		'position'		=> '',
		'background'	=> '#444',
		'color'			=> '#fff',
		'plan' 			=> '',
		'price'			=> '',
		'per'			=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );

	$column 	= ( !empty( $atts['column'] ) ) ? ' ayo-'. esc_attr( $atts['column'] ) : '';
	$position 	= ( !empty( $atts['position'] ) ) ? ' ayo-'. esc_attr( $atts['position'] ) .'-column' : '';
	$background = ( !empty( $atts['background'] ) ) ? ' style="background-color:'. $atts['background'] .'"' : '';
	$color 		= ( !empty( $atts['color'] ) ) ? ' style="color:'. $atts['color'] .'"' : '';

	$plan 		= ( !empty( $atts['plan'] ) ) ? sprintf( '<h4 class="ayo_pricing_title"%1$s>%2$s</h4>', $color, esc_attr( $atts['plan'] ) ) : '';
	$price 		= ( !empty( $atts['price'] ) ) ? sprintf('<p class="ayo_pricing_value"%1$s>%2$s</p>', $color, $atts['price'] ) : '';
	$per 		= ( !empty( $atts['per'] ) ) ? sprintf( '<p%1$s>%2$s</p>', $color, esc_attr( $atts['per'] ) ) : '';

	$content = !empty( $content ) ? explode( "\n", trim( $content ) ) : array();

	$output = sprintf( '<div class="ayo-pricing%1$s%2$s"%3$s>', $column, $position, $background );
	$output .= '<div class="ayo-pricing-header">';
	$output .= sprintf( '%1$s %2$s %3$s', $plan, $price, $per );
	$output .= '</div><!-- end .ayo_pricing_header --><ul>';

	foreach( $content as $feature ) {
		$output .= '<li class="ayo-pricing-plan">'. do_shortcode( htmlspecialchars_decode( ayo_strip_autoformat( $feature ) ) ) .'</li>';
	}	

	$output .= '</ul>';
	$output .= '</div><!-- end .ayo-pricing -->';

	if ( $atts['position'] == 'last' ) {
		$output .= '<div class="clear"></div>';
	}

	return apply_filters( 'ayo_pricing_table_shorcode', $output, $atts );

}

add_shortcode( 'ayo_gmaps', 'ayo_google_maps_shortcode' );
/**
 * Simple Google Maps Shortcode
 * 
 * Modification version
 * 	
 * @since 		0.1
 * @link 		http://pippinsplugins.com/simple-google-maps-short-code
 * @version 	0.1.2
 */
function ayo_google_maps_shortcode( $atts, $content = null ) {
	
	$atts = shortcode_atts(
		array(
			'column'	=> '',
			'position'	=> '',
			'title'		=> '',
			'address' 	=> false,
			'height' 	=> '400px',
			'zoom'		=> '15',
		),
		$atts
	);

	$column 	= ( !empty( $atts['column'] ) ) ? 'ayo-'. esc_attr( $atts['column'] ) : '';
	$position 	= ( !empty( $atts['position'] ) ) ? ' ayo-'. esc_attr( $atts['position'] ) .'-column' : '';
	$address 	= $atts['address'];
	$title 		= ( !empty( $atts['title'] ) ) ? '<h4>'. esc_attr( $atts['title'] ) .'</h4>' : '';

	$content 	= str_replace( array( "\n", "\t", "\r" ), '', do_shortcode( htmlspecialchars_decode( wpautop( $content ) ) ) );
	$content 	= ( !empty( $content ) ) ? $content : '';

	if( $address ) :

		wp_print_scripts( 'google-maps-api' );

		$coordinates = ayo_get_map_coordinates( $address );

		if( !is_array( $coordinates ) )
			return;

		$map_id = uniqid( 'ayo_map_' ); // generate a unique ID for this map

		ob_start(); ?>
		<div class="ayo-map-canvas_wrap <?php echo esc_attr( $column ); ?> <?php echo esc_attr( $position ); ?>">
		<div class="ayo-map-canvas" id="<?php echo esc_attr( $map_id ); ?>" style="height: <?php echo esc_attr( $atts['height'] ); ?>;"></div>
	    </div>
	    <?php
			if ( $atts['position'] == 'last' ) {
				echo '<div class="clear"></div>';
			}
	    ?>
	    <script type="text/javascript">	    
			var map_<?php echo $map_id; ?>;
			function pw_run_map_<?php echo $map_id ; ?>(){
				var location = new google.maps.LatLng("<?php echo $coordinates['lat']; ?>", "<?php echo $coordinates['lng']; ?>");
				var map_options = {
					zoom: <?php echo $atts['zoom'];?>,
					center: location,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				map_<?php echo $map_id ; ?> = new google.maps.Map(document.getElementById("<?php echo $map_id ; ?>"), map_options);
				var marker_<?php echo $map_id; ?> = new google.maps.Marker({
				position: location,
				map: map_<?php echo $map_id ; ?>
				});
				<?php if ( !empty( $title ) || !empty( $content ) ) :?>
				    var infoWindow_<?php echo $map_id ; ?> = new google.maps.InfoWindow;
				    var onMarkerClick = function() {
				      var marker = this;
				      var latLng = marker.getPosition();
				      infoWindow_<?php echo $map_id ; ?>.setContent('<div class="ayo_gmaps_content"><?php echo $title; ?><?php echo $content; ?></div>');
				      infoWindow_<?php echo $map_id ; ?>.open(map_<?php echo $map_id; ?>, marker);
				    };
				    google.maps.event.addListener(map_<?php echo $map_id; ?>, 'click', function() {
				      infoWindow_<?php echo $map_id ; ?>.close();
				    });
				    google.maps.event.addListener(marker_<?php echo $map_id; ?>, 'click', onMarkerClick);
				<?php endif;?>
			}
			google.maps.event.addDomListener( window, 'load', function() {
				pw_run_map_<?php echo $map_id ; ?>();
			});
		</script>
		<?php
	endif;

	return ob_get_clean();
   
}

add_shortcode( 'ayo_social', 'ayo_social_profile' );
/**
 * Social Profile Shortcode
 * 	
 * @since 	0.1
 * @todo 	I know WordPress people is sensitive in capital P
 */
function ayo_social_profile( $atts ) {

	$defaults = array(
		'background'    => '',
		'color'       	=> '',
		'profile'  		=> '',
		'size' 			=> '',
		'url'			=> '',
	);

	$atts = shortcode_atts( $defaults, $atts );

	$background = ( ! empty( $atts['background'] ) ) ? 'background-color:'. $atts['background'] .';' : '';
	$color 		= ( ! empty( $atts['color'] ) ) ? 'color:'. $atts['color'] .';' : '';
	$size 		= ( ! empty( $atts['size'] ) ) ? 'font-size:'. (int)$atts['size'] .'px;' : '';

	$profile 	= ( $atts['profile'] == 'wordpress' ) ? 'WordPress' : ucwords( $atts['profile'] );

	$style 		= ( ! empty( $background ) || ! empty( $color ) || ! empty( $size ) ) ? 'style="'.$background.$color.$size.'"' : '';

	$output = sprintf( '<a %1$s class="ayosocial %2$s" href="%4$s" title="%3$s"><i class="ayoicon-%2$s"></i></a>', $style, esc_attr( strtolower( $atts['profile'] ) ), $profile, esc_url( $atts['url'] ) );

	return apply_filters( 'ayo_social_profile', $output, $atts );

}

add_shortcode( 'ayo_tweets', 'ayo_latest_tweet_shortcode' );
/**
 * Latest Tweet
 * 	
 * @since 	0.2
 */
function ayo_latest_tweet_shortcode( $atts ) {

	$defaults = array(
		'column'		=> '',
		'position'		=> '',
		'screen_name'	=> '',
		'tweets'       	=> '3',
		'hide_replies' 	=> 'true',
	);

	$atts = shortcode_atts( $defaults, $atts );

	if ( ! class_exists( 'StormTwitter') ) {
		return ayo_require_plugin( 'oauth-twitter-feed-for-developers', 'oAuth Twitter Feed for Developers' );
	}

	$column 	= ( $atts['column'] ) ? ' ayo-'. esc_attr( $atts['column'] ) : '' ;
	$position 	= ( $atts['position'] ) ? ' ayo-'. esc_attr( $atts['position'] ) .'-column' : '' ;

	$screen_name = ( ! empty( $atts['screen_name'] ) ) ? $atts['screen_name'] : get_option( 'tdf_user_timeline' );

	$hide_replies = ( $atts['hide_replies'] == 'false' ) ? false : true;

	$options = array(
		'trim_user'			=> true,
		'exclude_replies'	=> $hide_replies,
		'include_rts'		=> false );

	$tweets = getTweets( (int) $atts['tweets'], $screen_name, $options );

	$output = sprintf( '<div class="ayo-latest-tweets%s%s">', $column, $position );

	$output .= '<ul>';

	if( is_array( $tweets ) ){

		foreach( $tweets as $tweet ){

		$the_tweet = $tweet['text'];

			$output .= '<li><i class="icon-twitter"></i>';

	        $output .= '<span class="the-tweet">'. ayo_link_twitterify( $the_tweet ) .'</span>';

	        $output .= 
	        sprintf( '<span class="timestamp" title="%3$s - %4$s"><a href="https://twitter.com/%1$s/status/%2$s" target="_blank" rel="nofollow">%3$s - %4$s</a></span>', 
	        	$screen_name, 
	        	$tweet['id_str'],
	        	date( 'h:i A', strtotime( $tweet['created_at']. '- 8 hours' ) ),
	        	date( 'M d', strtotime( $tweet['created_at'] ) ) );

	        $output .= '</li>';

		}

	}

	$output .= '</ul>';

	$output .= '</div>';

	if ( $atts['position'] == 'last' ) {
		$output .= '<div class="clear"></div>';
	}

    return apply_filters( 'ayo_latest_tweet_shortcode', $output, $atts );

}