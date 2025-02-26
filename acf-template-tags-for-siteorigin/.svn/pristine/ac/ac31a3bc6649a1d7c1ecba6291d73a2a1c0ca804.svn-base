<div class="acf-email">
    <?php
    
    global $acftt;
    
    if (!empty($instance['field']['is_sub'])) {
        $sub = true;
    } else {
        $sub = false;
    }
    
    if ($fo = $acftt->get_acf_field_object($instance, $sub)) { ?>
        
        <?php if ( !empty($instance['icon']['icon']) ) : ?>
            
            <span class="acf-email-icon">
                <?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <?php if ( !empty($instance['option']['before'])) : ?>
            
            <span class="acf-email-before">
                <?php echo wp_kses_post( $instance['option']['before'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <?php
        
        if ($instance['email']['display_as'] == 'raw_email') {
            if ($sub) {
                the_sub_field($fo['key'], $fo['source']);
            } else {
                the_field($fo['key'], $fo['source']);
            }
        }
        
        if ($instance['email']['display_as'] == 'linked_email') {
            
            if ($sub) {
                ?>
                <a href="mailto:<?php esc_url(the_sub_field($fo['key'], $fo['source'])); ?>"><?php esc_url(the_sub_field($fo['key'], $fo['source'])); ?></a>
                <?php
            } else {
                ?>
                <a href="mailto:<?php esc_url(the_field($fo['key'], $fo['source'])); ?>"><?php esc_url(the_field($fo['key'], $fo['source'])); ?></a>
                <?php
            }
            
        }
        
        if ($instance['email']['display_as'] == 'linked_text') {
            
            if ($sub) {
                ?>
                <a href="mailto:<?php esc_url(the_sub_field($fo['key'], $fo['source'])); ?>"><?php esc_html_e($instance['email']['linked_text']); ?></a>
                <?php
            } else {
                ?>
                <a href="mailto:<?php esc_url(the_field($fo['key'], $fo['source'])); ?>"><?php esc_html_e($instance['email']['linked_text']); ?></a>
                <?php
            }
        }
        
        ?>
        
        <?php if ( !empty($instance['option']['after'])) : ?>
            
            <span class="acf-email-after">
                <?php echo wp_kses_post( $instance['option']['after'] ); ?>
            </span>
            
        <?php endif; ?>
        
    <?php } ?>
    
    
    
</div>
