<div class="acf-date">
    <?php
    
    global $acftt;
    
    if (!empty($instance['field']['is_sub'])) {
        $sub = true;
    } else {
        $sub = false;
    }
    
    if ($fo = $acftt->get_acf_field_object($instance, $sub)) { ?>
        
        <?php if ( !empty($instance['icon']['icon']) ) : ?>
            
            <span class="acf-date-icon">
                <?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <?php if ( !empty($instance['option']['before'])) : ?>
            
            <span class="acf-date-before">
                <?php echo wp_kses_post( $instance['option']['before'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <span class="acf-date-content">
            
            <?php
            
            if ($sub) {
                esc_html_e(get_sub_field($fo['key'], $fo['source']));
            } else {
                esc_html_e(get_field($fo['key'], $fo['source']));
            }
            
            ?>
            
        </span>
        
        <?php if ( !empty($instance['option']['after'])) : ?>
            
            <span class="acf-date-after">
                <?php echo wp_kses_post( $instance['option']['after'] ); ?>
            </span>
            
        <?php endif; ?>
        
    <?php } ?>
    
</div>
