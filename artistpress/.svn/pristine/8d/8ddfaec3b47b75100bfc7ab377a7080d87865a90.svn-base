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

get_header( 'artistpress' ); ?>



<div id="show-<?php the_id(); ?>" class="showBody">
    
    <?php artistpressShowTitle(); ?>

        <div class="row">
        
        
            <?php artistpressShowArtwork(); ?>
            
            <?php artistpressShowInformation(); ?>
        
        
        </div>

        <div class="row">
            <?php artistpressShowMap(); ?>
        </div>     

    <div class="clear"></div>
</div>
<?php get_footer('artistpress'); ?>