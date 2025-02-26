<div class="acf-file">
    <?php
    
    global $acftt;
    
    if (!empty($instance['field']['is_sub'])) {
        $sub = true;
    } else {
        $sub = false;
    }
    
    if ($fo = $acftt->get_acf_field_object($instance, $sub)) { ?>
        
        <?php if ( !empty($instance['icon']['icon']) ) : ?>
            
            <span class="acf-file-icon">
                <?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <?php if ( !empty($instance['option']['before'])) : ?>
            
            <span class="acf-file-before">
                <?php echo wp_kses_post( $instance['option']['before'] ); ?>
            </span>
            
        <?php endif; ?>
        
        <span class="acf-file-content">
            
            <?php
            
            if ($fo['field_object']['type'] == 'file') {
                
                if ($instance['file']['display_as'] == 'raw_url') {
                    if ($sub) {
                        echo esc_url(get_sub_field($fo['key'], $fo['source'])['url']);
                    } else {
                        echo esc_url(get_field($fo['key'], $fo['source'])['url']);
                    }
                }
                
                if ($instance['file']['display_as'] == 'linked_url') {
                    if ($sub) {
                        ?>
                        <a href="<?php echo esc_url(get_sub_field($fo['key'], $fo['source'])['url']); ?>"><?php echo esc_url(get_sub_field($fo['key'], $fo['source'])['url']); ?></a>
                        <?php
                    } else {
                        ?>
                        <a href="<?php echo esc_url(get_field($fo['key'], $fo['source'])['url']); ?>"><?php echo esc_url(get_field($fo['key'], $fo['source'])['url']); ?></a>
                        <?php
                    }
                }
                
                if ($instance['file']['display_as'] == 'linked_title') {
                    if ($sub) {
                        ?>
                        <a href="<?php echo esc_url(get_sub_field($fo['key'], $fo['source'])['url']); ?>"><?php esc_html_e(get_sub_field($fo['key'], $fo['source'])['title']); ?></a>
                        <?php
                    } else {
                        ?>
                        <a href="<?php echo esc_url(get_field($fo['key'], $fo['source'])['url']); ?>"><?php esc_html_e(get_field($fo['key'], $fo['source'])['title']); ?></a>
                        <?php
                    }
                }
                
                if ($instance['file']['display_as'] == 'linked_text') {
                    if ($sub) {
                        ?>
                        <a href="<?php echo esc_url(get_sub_field($fo['key'], $fo['source'])['url']); ?>"><?php echo esc_html($instance['file']['linked_text']); ?></a>
                        <?php
                    } else {
                        ?>
                        <a href="<?php echo esc_url(get_field($fo['key'], $fo['source'])['url']); ?>"><?php echo esc_html($instance['file']['linked_text']); ?></a>
                        <?php
                    }
                }
            }
            
            ?>
            
        </span>
        
        <?php if ( !empty($instance['option']['after'])) : ?>
            
            <span class="acf-file-after">
                <?php echo wp_kses_post( $instance['option']['after'] ); ?>
            </span>
            
        <?php endif; ?>
        
    <?php } ?>
    
</div>
