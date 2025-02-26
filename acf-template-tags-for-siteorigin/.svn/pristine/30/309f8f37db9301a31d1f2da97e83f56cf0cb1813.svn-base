<div class="the_post_thumbnail">
    
    <?php if ( has_post_thumbnail() ) : ?>
        
        <?php
        
        $link = false;
        
        $size = empty( $instance['option']['image_size'] ) ? 'full' : $instance['option']['image_size'];
        
        if ( !empty($instance['option']['link']) ) {
            $link = get_permalink();
        }
        
        if ( !empty($instance['option']['external_link']) ) {
            $link = esc_url( $instance['option']['external_link'] );
        }
        
        ?>
        
        <?php if ( $link ) : ?>
            
            <a href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>">
                
            <?php endif; ?>
            
            <?php the_post_thumbnail($size); ?>
            
            <?php if ( $link ) : ?>
                
            </a>
            
        <?php endif; ?>
        
    <?php endif; ?>
    
</div>
