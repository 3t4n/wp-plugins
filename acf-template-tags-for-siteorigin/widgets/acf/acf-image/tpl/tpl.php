<div class="acf-image">
    <?php
    
    global $acftt;
    
    if (!empty($instance['field']['is_sub'])) {
        $sub = true;
    } else {
        $sub = false;
    }
    
    if ($fo = $acftt->get_acf_field_object($instance, $sub)) { ?>
        
        <?php
        
        if ($instance['image']['size'] == 'full') {
            
            if ($sub) {
                
                $image_url = esc_url(get_sub_field($fo['key'], $fo['source'])['url']);
                
            } else {
                
                $image_url = esc_url(get_field($fo['key'], $fo['source'])['url']);
                
            }
            
        } else {
            
            if ($sub) {
                
                $image_url = esc_url(get_sub_field($fo['key'], $fo['source'])['sizes'][$instance['image']['size']]);
                
            } else {
                
                $image_url = esc_url(get_field($fo['key'], $fo['source'])['sizes'][$instance['image']['size']]);
                
            }
            
        }
        
        ?>
        
        <?php if ( !empty($instance['image']['post_object_link']) ) : ?>
            
            <a href="<?php echo get_permalink($fo['post_object']); ?>">
                
            <?php endif; ?>
            
            <img src="<?php echo $image_url; ?>">
            
            <?php if ( !empty($instance['image']['post_object_link']) ) : ?>
                
            </a>
            
        <?php endif; ?>
        
    <?php } ?>
    
</div>
