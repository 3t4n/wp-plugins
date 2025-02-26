<?php
/**
 * The Template for displaying the single gallery.
 *
 * This template can be overridden by copying it and placing it in your themes main directory yourtheme/single-gallery.php.
 *
 * Rememeber to not edit it here because when the plugin is updated you will loose your changes.
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

?>

<section id="album" class="albumBody" >

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php 

			$post_meta_data = get_post_custom($post->ID);   
      		
      		if(isset($post_meta_data['artistpress_images'][0])){
				
					/*
					*	If the Gallery Name display setting is set to Yes, this function will display the artist's name.
					*/
			        echo artispressGalleryTitle();

			        /*
					*	This function display the gallery body.  It must have the argument $post to function properly. 
					*/
			        echo artispressGalleryBody($post);

			}else{
				
				/*
				*	This function display the warning is not images have been added to the gallery.
				*/
      			echo artispressGalleryNoImages();
      		}
			
			endwhile;
        	wp_reset_postdata();
			else : 

	    	/*
			*	This function displays the warning if no galleries have been addded to the site.
			*/
  			echo artispressNoGallery();
        	
    		endif;

	    	/*
			*	This function displays the return to album link when the gallery has been added to a album.
			*/
			//echo artispressReturnToAlbumLink();

			?>
   
			</section> 

<?php get_footer('artistpress'); ?>

