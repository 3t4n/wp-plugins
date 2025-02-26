<?php

// html tags

if ( $instance['option']['html_tag'] != 'none' ) {
    
    $html_before = '<' . wp_kses_post(esc_html($instance['option']['html_tag'])) . '>';
    $html_after = '</' . wp_kses_post(esc_html($instance['option']['html_tag'])) . '>';
    
} else {
    $html_before = '';
    $html_after = '';
}

?>


<div class="acf-text">
    <?php
    
    global $acftt;
    
    if (!empty($instance['field']['is_sub'])) {
        $sub = true;
    } else {
        $sub = false;
    }
    
    if ($fo = $acftt->get_acf_field_object($instance, $sub)) { ?>
        
        <?php echo $html_before; ?>
        
        <?php if ( !empty($instance['icon']['icon']) ) : ?>
            
            <span class="acf-text-icon">
                <?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <?php if ( !empty($instance['option']['before'])) : ?>
            
            <span class="acf-text-before">
                <?php echo wp_kses_post( $instance['option']['before'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <span class="acf-text-content">
            
            <?php
            
            if (!$sub) {
                
                wp_kses_post(the_field($fo['key'], $fo['source']));
                
            } else {
                
                wp_kses_post(the_sub_field($fo['key'], $fo['source']));
                
            }
            
            ?>
            
        </span>
        
        <?php if ( !empty($instance['option']['after'])) : ?>
            
            <span class="acf-text-after">
                <?php echo wp_kses_post( $instance['option']['after'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <?php echo $html_after; ?>
        
    <?php } ?>
    
</div>
