<?php
/*

Copy this file to your theme folder.

add following code in a template, too:

<?php get_template_part( 'hero','slider-content' ); ?>

*/
?>
<section id="featured" class="hero reset <?php echo $classes; ?>" style="height:<?php echo $height; ?>; width:<?php echo $width; ?>">
	<ul class="features">
<?php
	foreach( $my_query->posts as $slide ):
	?>

    	<li class="feature">
    		<?php if( has_post_thumbnail( $slide->ID ) ): ?>
            <div class="photo"><?php echo get_the_post_thumbnail( $slide->ID, 'hero' ); ?></div>
            <?php if( 'photo' != $style ) : ?>
            <div class="thumb"><?php echo get_the_post_thumbnail( $slide->ID, $style ); ?></div>
            <?php endif;// style = thumbnail ?>
            <div class="shadow"></div>
            <?php endif; ?>
            <div class="summary">
           		<h1 class="title"><?php echo apply_filters( 'the_title', $slide->post_title, $slide->ID ); ?></h1>
                <div class="lead-in">
                	<?php echo has_excerpt( $slide->ID ) ? apply_filters( 'the_excerpt', $slide->post_excerpt ) : apply_filters( 'the_content', $slide->post_content ); ?>
                    <?php
					$meta = get_post_meta( $slide->ID, 'abt-heroes', true );
					
					if ( isset( $meta['text'] ) && !empty($meta['text']) ):
						$buttonLink = ( !empty( $meta['link'] ) ) ? $meta['link'] : '#';
					?>
                    	<p class="button"><a href="<?php echo $buttonLink; ?>"><?php echo $meta['text']; ?></a></p>
                    <?php endif; ?>
                </div>
            </div>
        </li>
        
 <?php endforeach; ?>
        
    </ul>
    
</section>