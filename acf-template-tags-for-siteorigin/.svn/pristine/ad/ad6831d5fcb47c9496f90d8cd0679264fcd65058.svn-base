<div class="acf-number">
    <?php
    
    global $acftt;
    
    if (!empty($instance['field']['is_sub'])) {
        $sub = true;
    } else {
        $sub = false;
    }
    
    if ($fo = $acftt->get_acf_field_object($instance, $sub)) { ?>
        
        <?php if ( !empty($instance['icon']['icon']) ) : ?>
            
            <span class="acf-number-icon">
                <?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <?php if ( !empty($instance['option']['before'])) : ?>
            
            <span class="acf-number-before">
                <?php echo wp_kses_post( $instance['option']['before'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <span class="acf-number-content">
            
            <?php
            
            if ( $instance['number']['display_as'] == 'raw_number' ) {
                if ($sub) {
                    
                    echo esc_html(get_sub_field($fo['key'], $fo['source']));
                } else {
                    echo esc_html(get_field($fo['key'], $fo['source']));
                }
            }
            
            if ( $instance['number']['display_as'] == 'formatted_number' ) {
                if ($sub) {
                    echo number_format(intval(get_sub_field($fo['key'], $fo['source'])), $instance['number']['decimals'], $instance['number']['decimal_point'], $instance['number']['separator']);
                } else {
                    echo number_format(intval(get_field($fo['key'], $fo['source'])), $instance['number']['decimals'], $instance['number']['decimal_point'], $instance['number']['separator']);
                }
            }
            
            ?>
            
        </span>
        
        <?php if ( !empty($instance['option']['after'])) : ?>
            
            <span class="acf-number-after">
                <?php echo wp_kses_post( $instance['option']['after'] ); ?>
            </span>
            
        <?php endif; ?>
        
    <?php } ?>
    
</div>
