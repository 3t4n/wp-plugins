<?php

function fvp_social_media_generate_buttons($content) {
	$share_posts = get_option( 'fvp_sm_share_posts_active', 1 );
	$share_front_page = get_option( 'fvp_sm_share_front_page_active', 0 );
	$share_pages = get_option( 'fvp_sm_share_pages_active', 0 );

	if ( ( is_single() && $share_posts )
	  	|| ( is_front_page() && $share_front_page )
			|| ( is_page() && $share_pages )
			){
		// Get current page _url and current page title
		$the_url = get_permalink();
		$title = str_replace( ' ', '%20', get_the_title());

		// Get Post Thumbnail for pinterest
		if ( has_post_thumbnail() )
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

		// Construct sharing _url
		$twitter_url = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$the_url.'&amp';
		$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='.$the_url;
		$whatsapp_url = 'whatsapp://send?text='.$title . ' ' . $the_url;
		$google_url = 'https://plus.google.com/share?url='.$the_url;
		$email_url = 'mailto:?Subject=' .$title. '&amp;Body=I%20saw%20this%20 ' .$the_url;
		$linkedin_url = 'https://www.linkedin.com/shareArticle?mini=true&amp;url=https://simplesharebuttons.com&amp;title='.$title;
		// $tumblr_url = 'https://www.tumblr.com/share?data-title=' .$title. '&amp;';

		// Based on popular demand added Pinterest too
		if ( has_post_thumbnail() ) {
			$pinterest_url = 'https://pinterest.com/pin/create/button/?url='.$the_url.'&amp;media='.$thumbnail[0].'&amp;description='.$title;
		} else {
			$pinterest_url = 'https://pinterest.com/pin/create/button/?url='.$the_url.'&amp;description='.$title;
		}

		// Take Social Buttons to show and order
		$shiring_items_order = get_option( 'fvp_sm_sharing_items_order', 'facebook,twitter,gplus,whatsapp,email' );
		if ( !empty($shiring_items_order) ) {
			$sharing_order = explode( ',', get_option( 'fvp_sm_sharing_items_order', 'facebook,twitter,gplus,whatsapp,email' ) );
		} else {
			return $content;
		}

		// Take type of sharing buttons (style) and text
		$icons_type = esc_attr( get_option( 'fvp_sm_buttons_type', 'type1' ) );
		$text = esc_attr( get_option( 'fvp_sm_buttons_text', '' ) );

		// Get place of buttons
		$place_to_show = esc_attr( get_option( 'fvp_sm_buttons_place', 'bottom' ) );

		if ( ($place_to_show == 'top') || ($place_to_show == 'both') ) {

		}

		// Add sharing buttons to a var
		$sharing_content = '<!-- Social Media Sharing by FVP, sharing buttons -->';
		$sharing_content .= '<div class="fvp-sm-social-icons fvp-sm-social-icons-'. $icons_type .'">';
		if ( !empty( $text ) )
			$sharing_content .= '<h5 class="fvp-sm-text">' .$text. '</h5>';

		$sharing_content .= '<ul>';

		$items_sharing_content = array();

		$items_sharing_content['twitter'] = '<li><a class="" rel="nofollow" title="Share on Twitter" href="'. $twitter_url .'" target="_blank"><div class="fvp-sm-item twitter"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>';
		$items_sharing_content['facebook'] = '<li><a class="" rel="nofollow" title="Share on Facebook" href="'.$facebook_url.'" target="_blank"><div class="fvp-sm-item facebook"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>';
		$items_sharing_content['whatsapp'] = '<li><a class="" rel="nofollow" title="Share on Whatsapp" href="'.$whatsapp_url.'" target="_blank"><div class="fvp-sm-item whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></div></a></li>';
		$items_sharing_content['gplus'] = '<li><a class="" rel="nofollow" title="Share on Google+" href="'.$google_url.'" target="_blank"><div class="fvp-sm-item gplus"><i class="fa fa-google-plus" aria-hidden="true"></i></div></a></li>';
		$items_sharing_content['email'] = '<li><a class="" rel="nofollow" title="Send by Email" href="'.$email_url.'" target="_blank"><div class="fvp-sm-item email"><i class="fa fa-envelope" aria-hidden="true"></i></div></a></li>';
		$items_sharing_content['linkedin'] = '<li><a class="" rel="nofollow" title="Share on Linkedin" href="'.$linkedin_url.'" target="_blank"><div class="fvp-sm-item linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>';
		$items_sharing_content['pinterest'] = '<li><a class="" rel="nofollow" title="Share on Pnterest" href="'.$pinterest_url.'" target="_blank"><div class="fvp-sm-item pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></div></a></li>';

		foreach ( $sharing_order as $network ) {
			$sharing_content .= $items_sharing_content[$network];
		}

		$sharing_content .= '</ul><div class="fvp-sm-clear"></div></div>';

		// Add sharing buttons to content
		if ( $place_to_show == 'both' ) {
			$content = $sharing_content . $content . $sharing_content;
		} else if ($place_to_show == 'top' ) {
			$content = $sharing_content . $content;
		} else {
			$content = $content . $sharing_content;
		}
	}

	return $content;
}
add_filter( 'the_content', 'fvp_social_media_generate_buttons');
