<?php
add_shortcode( 'AuthorFacebookPageFeed', 'afpw_shortcode' );
function afpw_shortcode( $atts ) {

	$afpw_facebook_page_atts = shortcode_atts( array(
		'href'                  => '',
		'width'                 => '340',
		'height'                => '500',
		'hide_cover'            => 'false',
		'show_facepile'         => 'false',
		'align'                 => 'initial',
		'tabs'                  => 'timeline',
		'show_cta'              => 'true',
		'small_header'          => 'false',
		'adapt_container_width' => 'true',
		'enable_author_fb_feed' => false,
	), $atts );

    if(is_single() && $instance['enable_author_facebook_feed'] && get_option('afpw_enable_authors_fb_page'))
        if($fb_page_url=get_the_author_meta('fb_page_url', get_the_author_meta('ID')))
            $afpw_facebook_page_atts['href'] = strip_tags( $fb_page_url );

	$output = '<!-- This Facebook Page Feed was generated with Facebook Author Page Feed Widget & plugin v' . AFPW_PLUGIN_VERSION . ' - https://www.psdtohtmlcloud.com/author-facebook-page-widget/ -->';

	//* Wrapper for alignment
	$output .= '<div id="simple-facebook-widget" style="text-align:' . esc_attr( $afpw_facebook_page_atts['align'] ) . ';">';

	//* Main Facebook Feed
	$output .= '<div class="fb-page" ';
	if ( false !== strpos( $afpw_facebook_page_atts['href'], 'facebook.com' ) ) {
		$output .= 'data-href="' . esc_attr( $afpw_facebook_page_atts['href'] ) . '" ';
	} else {
		$output .= 'data-href="https://facebook.com/' . esc_attr( $afpw_facebook_page_atts['href'] ) . '" ';
	}
	$output .= 'data-width="' . esc_attr( $afpw_facebook_page_atts['width'] ) . '" ';
	$output .= 'data-height="' . esc_attr( $afpw_facebook_page_atts['height'] ) . '" ';
	$output .= 'data-hide-cover="' . esc_attr( $afpw_facebook_page_atts['hide_cover'] ) . '" ';
	$output .= 'data-show-facepile="' . esc_attr( $afpw_facebook_page_atts['show_facepile'] ) . '" ';
	$output .= 'data-tabs="' . esc_attr( $afpw_facebook_page_atts['tabs'] ) . '" ';
	$output .= 'data-hide-cta="' . esc_attr( $afpw_facebook_page_atts['show_cta'] ) . '" ';
	$output .= 'data-small-header="' . esc_attr( $afpw_facebook_page_atts['small_header'] ) . '" ';
	$output .= 'data-adapt-container-width="' . esc_attr( $afpw_facebook_page_atts['adapt_container_width'] ) . '">';
	$output .= '</div>';

	$output .= '</div>';

	$output .= '<!-- End Simple Facebook Page Plugin (Shortcode) -->';

	return $output;
}
?>