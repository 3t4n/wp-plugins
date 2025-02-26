<?php
/**
 * Defines all functions for the artist templates
 *
 * @author      LTDI Studios
 * @package     ArtistPress/public/includes
 * @version     1.0.0
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}  


/**
 * Creates the Title for the ArtistPress Artist template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artispressArtistTitle() {
	$artistOptions 		= get_option('artistpress_artist_settings');
	$artistOptionName 	= sanitize_text_field($artistOptions['artist_name']);

	if ($artistOptionName  == 'yes'){
		echo '<h1 class="title">' . get_the_title() . '</h1>';;
	}
}

/**
 * Creates the Artist Photo for the ArtistPress Artist template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artispressArtistPhoto() {
	echo '<div id="artistPhoto" class="artistPhoto">';
	the_post_thumbnail();
	echo '</div>';
}

/**
 * Creates the Artist Details for the ArtistPress Artist template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artispressArtistDetails() {
	
	$artistOptions 			= get_option('artistpress_artist_settings');
	$artistOptionPhone 		= sanitize_text_field($artistOptions['artist_phone']);
	$artistOptionPhoneLink 	= sanitize_text_field($artistOptions['artist_phone_link']);
	$artistOptionEmail 		= sanitize_text_field($artistOptions['artist_email']);
	$artistOptionWeb 		= sanitize_text_field($artistOptions['artist_web']);
	$artistOptionBio		= sanitize_text_field($artistOptions['artist_bio']);
	
	$artistID      			= esc_html(get_the_ID());
	$artistPhone   			= esc_html( get_post_meta($artistID, 'artistpress_artist_phone_number', true) );
	$artistEmail   			= sanitize_email( get_post_meta($artistID, 'artistpress_artist_email_address', true) );
	$artistWebsite 			= esc_url( get_post_meta($artistID, 'artistpress_artist_web_address', true));
	$artistBio     			= esc_html( get_post_meta($artistID, 'artistpress_artist_bio', true) );

	echo '<div id="artistInfo" class="artistInfo">';
	echo '<div class="row">';
	echo '<div class="artistDetails">';
	echo '<ul>';
	
	if ($artistOptionPhone == 'yes'){
		if ($artistOptionPhoneLink  == 'yes'){
				echo '<li><strong>Phone:</strong> <a href="tel:'. $artistPhone .'">' . $artistPhone . '</a></li>';
			}else{
				echo '<li><strong>Phone:</strong> ' . $artistPhone . '</li>';
			}
		}
	if ($artistOptionEmail == 'yes'){
		echo '<li><strong>Email:</strong> ' . $artistEmail . '</li>';
	}
	if ($artistOptionWeb == 'yes'){
		echo '<li><strong>Website:</strong> ' . $artistWebsite . '</li>';
	}
	echo '</ul>';
	echo '<div class="clear"></div>';
	
	echo '</div>';

	if ($artistOptionBio == 'yes'){
		echo '<div class="artistAdInfo"><h2>Biography:</h2><span>' . $artistBio . '</span></div>';
	}
	echo '</div></div>';
}

/**
 * Creates the No Artists error message for the ArtistPress Artist template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artispressNoArtists(){
	echo '<article id="artistPressArtist" class="artistBody">';
	echo '<p>Sorry! No artists have been added to this site.</p>';
	echo '</div></article>';
}

?>