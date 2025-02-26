<?php

/* == NEW PROFILE FIELDS == */
function afc_new_contact_methods( $contactmethods ) {
	$contactmethods['afc_twitter'] = 'Twitter';
	$contactmethods['afc_facebook'] = 'Facebook';
	$contactmethods['afc_facebook_page'] = 'Facebook Page';
	$contactmethods['afc_gplus'] = 'Google Pluss';	
	$contactmethods['afc_linkedin'] = 'Linkedin';
	$contactmethods['afc_pinterest'] = 'Pinterest';
	return $contactmethods;
}
add_filter('user_contactmethods','afc_new_contact_methods');


/* == SOCIAL PROFILES LINKS == */
function afc_profile_buttons() {
	
	//checks for current author social profiles in wordpress profile information and
	//show a link to it profile page in each social networks it has

	$output = '<div class="afc-social-buttons">';
	
	$user_fb = get_the_author_meta( 'afc_facebook' );
	if( $user_fb ) {
		$output .= afc_fb_profile_button( $user_fb );
	}
	
	$user_fb_page = get_the_author_meta( 'afc_facebook_page' );
	if( $user_fb_page ) {
		$output .= afc_fb_page_button( $user_fb_page );
	}

	$user_tw = get_the_author_meta( 'afc_twitter' );
	if( $user_tw ) {
		$output .= afc_tw_profile_button( $user_tw );
	}

	$user_gplus = get_the_author_meta( 'afc_gplus' );
	if( $user_gplus ) {
		$output .= afc_gplus_profile_button( $user_gplus );
	}

	$user_linkedin = get_the_author_meta( 'afc_linkedin' );
	if( $user_linkedin ) {
		$output .= afc_linkedin_profile_button( $user_linkedin );
	}

	$user_pinterest = get_the_author_meta( 'afc_pinterest' );
	if( $user_pinterest ) {
		$output .= afc_pinterest_profile_button( $user_pinterest );
	}

	$output .= '</div>';
	
	return $output;

}


function afc_fb_profile_button( $user ) {
	$output = '<div id="fb-button"><a href="https://www.facebook.com/' . $user . '"><span class="fa fa-facebook"></span></a></div>';
	return $output;
}

function afc_fb_page_button( $user ) {
	$output = '<div id="fb-button"><a href="https://www.facebook.com/page/' . $user . '"><span class="fa fa-facebook"></span></a></div>';
	return $output;
}

function afc_tw_profile_button( $user ) {
	$output = '<div id="tw-button"><a href="https://twitter.com/' . $user . '"><span class="fa fa-twitter" ></span></a></div>';
	return $output;
}

function afc_gplus_profile_button( $user ) {
	$output = '<div id="gp-button"><a href="https://plus.google.com/' . $user . '"><span class="fa fa-google-plus"></span></a></div>';
	return $output;
}

function afc_linkedin_profile_button( $user ) {
	$output = '<div id="ln-button"><a href="http://www.linkedin.com/in/' . $user . '"><span class="fa fa-linkedin"></span></a></div>';
	return $output;
}

function afc_pinterest_profile_button( $user ) {
	$output = '<div id="pn-button"><a href="http://pinterest.com/' . $user . '/"><span class="fa fa-pinterest"></span></a></div>';
	return $output;
} ?>