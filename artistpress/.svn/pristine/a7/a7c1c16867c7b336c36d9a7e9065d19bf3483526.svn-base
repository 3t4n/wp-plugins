<?php
/**
 * The Template for displaying the single show.
 *
 * This template can be overridden by copying it and placing it in your themes main directory yourtheme/single-show.php.
 *
 * Rememeber to not edit it here because whenthe plugin is updated you will loose your changes.
 *
 * @see 	    http://artistpress-plugin.com/document/template-structure/
 * @author 		LTDI Studios
 * @package 	ArtistPress/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'artistpress' );

 
if ( have_posts() ) : while ( have_posts() ) : the_post();

	
	echo '<article id="artistPressArtist" class="artistBody">';
	
	/*
	*	If the Artist Name display setting is set to Yes, this function will display the artist's name.
	*/
	echo '<div class="row">' . artispressArtistTitle() . '</div>';
	
	echo '<div class="row">';
	/*
	*	This function will display the artist's photo.
	*/
	artispressArtistPhoto();


	/*
	*	This function will display the artist's details including phone number, email and web address and bio.
	*/
	artispressArtistDetails();

	echo '</div></article>';
	
endwhile;

else :

	/*
	*	This function will display the "No Artists" error message when there are no artist added.
	*/
	artispressNoArtists();

endif; 

get_footer('artistpress'); ?>