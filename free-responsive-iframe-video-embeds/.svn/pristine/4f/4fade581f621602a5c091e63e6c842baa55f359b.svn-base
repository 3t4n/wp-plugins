<?php
/*
Plugin Name: Free Responsive iframe Video Embeds
Plugin URI: http://wordpress.org/plugins/free-responsive-iframe-video-embeds/
Description: Use the [iplayerhd] shortcode to easily add responsive iframe-based video embeds to your website (YouTube, Vimeo, iPlayerHD and more...)
Version: 1.0.6
Author: iPlayerHD
Author URI: http://iplayerhd.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
*/

wp_oembed_add_provider(
  '/https?\:\/\/(.+)?(iplayerhd\.com)\/(playerframe|player\/video)\/.*/',
  'https://iplayerhd.com/player/video/oembed',
  true
);

function iplayerhd_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('iplayerhd-embed', plugins_url('/iplayerhd-embed.js', __FILE__), array('jquery'));
    wp_enqueue_style('iplayerhd-embed-style', plugins_url('/iplayerhd-embed.css', __FILE__));
}

function iplayerhd_shortcode( $atts ) {

	$iplayerhd_atts = shortcode_atts(array(
		'src' => 'https://iplayerhd.com/player/video/5ae4df93-5734-4e29-9f2e-15ff9056b7e4?cbartype=auto',
		'width' => '640',
		'height' => '360',
		'frameborder' => '0',
		'allowtransparency' => 'true',
		'scrolling' => 'no',
		'allowfullscreen' => '',
		'mozallowfullscreen' => '',
		'webkitallowfullscreen' => '',
		'oallowfullscreen' => '',
		'msallowfullscreen' => '',
        'player-mode' => 'video',
        'popup' => 'false'
	), $atts);

    $baseEmbedUrl = '';
    $popup = 0;

	$iframeatts = '';
	$iframeattsnosrc = '';
	foreach( $iplayerhd_atts as $attr => $value ) {
        if ( $value != '' ) {
            $iframeatts .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
            if (strcmp(esc_attr($attr), 'src') != 0) {
                $iframeattsnosrc .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
            }
        } else {
            $iframeatts .= ' ' . esc_attr( $attr );
            $iframeattsnosrc .= ' ' . esc_attr( $attr );
        }
        if (strcmp(esc_attr($attr), 'src') == 0) {
            $baseEmbedUrl = esc_attr($value);
            $ioqm = strrpos($baseEmbedUrl, '?');
            $rawEmbedUrl = $baseEmbedUrl;
            if ($ioqm > 0) {
                $rawEmbedUrl = substr($baseEmbedUrl, 0, $ioqm);
            }
        }
        if (((strcmp(esc_attr($attr), 'popup') == 0) && (strcmp(esc_attr($value), 'true') == 0))
        || ((strcmp(esc_attr($attr), 'popover') == 0) && (strcmp(esc_attr($value), 'true') == 0))) {
            $popup = 1;
        }
	}

	$html = '<div class="iplayerhd-embed">';
	if ($popup) {
        $html .= '<a class="iplayerhd-popup"><img src="';
        $html .= $rawEmbedUrl . '/playButton" /></a>';
        $html .= '<div class="iplayerhd-overlay"><div><div class="iplayerhd-videoWrapper">';
        $html .= '<iframe ' . $iframeattsnosrc . ' framesrc="' . $baseEmbedUrl . '">';
        $html .= '</iframe></div></div></div>';
    } else {
        $html .= '<div class="iplayerhd-videoWrapper iplayerhd-video">';
        $html .= '<iframe ' . $iframeatts . '></iframe></div>'."\n";
    }
    $html .= '</div>';

	return $html;
}

add_action( 'wp_enqueue_scripts', 'iplayerhd_enqueue_scripts' );
add_shortcode( 'iplayerhd', 'iplayerhd_shortcode' );
