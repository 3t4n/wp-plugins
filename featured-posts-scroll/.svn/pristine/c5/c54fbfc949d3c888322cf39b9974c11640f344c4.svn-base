<?php 
    if ( isset($_POST['fps_opt_hidden']) && $_POST['fps_opt_hidden'] == 'Y' ) {
        /* Numeric Variables */
        $variables = array (
            'fps_max_posts',
            'fps_textbg_alpha',
            'fps_dropshadow_x',
            'fps_dropshadow_y',
            'fps_dropshadow_blur',
            'fps_dropshadow_spread',
            'fps_outer_dropshadow_x',
            'fps_outer_dropshadow_y',
            'fps_outer_dropshadow_blur',
            'fps_outer_dropshadow_spread',
            'fps_height',
            'fps_width',
            'fps_selectedslide_dropshadow_x',
            'fps_selectedslide_dropshadow_y',
            'fps_selectedslide_dropshadow_blur',
            'fps_selectedslide_dropshadow_spread',
            'fps_unselectedslide_dropshadow_x',
            'fps_unselectedslide_dropshadow_y',
            'fps_unselectedslide_dropshadow_blur',
            'fps_unselectedslide_dropshadow_spread',
            'fps_slide_textshadow_x',
            'fps_slide_textshadow_y',
            'fps_slide_textshadow_blur',
            'fps_scroll_speed',
            'fps_scroll_fadeInSpeed',
            'fps_scroll_fadeOutSpeed',
            'fps_scroll_interval'
        );

        foreach ($variables as $var) {
            $var_value = $_POST[$var];
            if ( is_numeric($var_value) )
                update_option($var, $var_value);
            else
                $error[] = "ERROR: ".$var." - Must be a number.";
        }




        /* Text Variables */
       $variables = array (
            'fps_title_color',
            'fps_excerpt_color',
            'fps_heading_color',
            'fps_heading_text',
            'fps_bg_color',
            'fps_textbg_color',
            'fps_innershadow_color',
            'fps_outershadow_color',
            'fps_arrow_color',
            'fps_corner_radius',
            'fps_outer_corner_radius',
            'fps_slide_bgradius',
            'fps_arrow_position',
            'fps_arrow_custom_url',
            'fps_selectedslide_textcolor',
            'fps_unselectedslide_textcolor',
            'fps_selectedslide_bgcolor',
            'fps_unselectedslide_bgcolor',
            'fps_selectedslide_dropshadow_color',
            'fps_unselectedslide_dropshadow_color',
            'fps_slide_textshadow_color',
            'fps_title_font',
            'fps_excerpt_font',
            'fps_heading_font',
            'fps_selectedslide_font',
            'fps_unselectedslide_font',
            'fps_title_fontstyle',
            'fps_excerpt_fontstyle',
            'fps_heading_fontstyle',
            'fps_selectedslide_fontstyle',
            'fps_unselectedslide_fontstyle',
            'fps_title_fontvariant',
            'fps_excerpt_fontvariant',
            'fps_heading_fontvariant',
            'fps_selectedslide_fontvariant',
            'fps_unselectedslide_fontvariant',
            'fps_title_fontweight',
            'fps_excerpt_fontweight',
            'fps_heading_fontweight',
            'fps_selectedslide_fontweight',
            'fps_unselectedslide_fontweight',
            'fps_title_fontsize',
            'fps_excerpt_fontsize',
            'fps_heading_fontsize',
            'fps_selectedslide_fontsize',
            'fps_unselectedslide_fontsize',
            'fps_title_fontheight',
            'fps_excerpt_fontheight',
            'fps_heading_fontheight',
            'fps_selectedslide_fontheight',
            'fps_unselectedslide_fontheight',
            'fps_image_bg_color'

        );

        foreach ($variables as $var) {
            $var_value = $_POST[$var];
            update_option($var, $var_value);
        }



        /* Boolean Variables */
        $variables = array (
            'fps_image_full_size',
            'fps_display_title',
            'fps_display_excerpt',
            'fps_display_heading',
            'fps_autoscroll',
            'fps_display_slidenumbers',
            'fps_selectedslide_bold',
            'fps_selectedslide_italics',
            'fps_unselectedslide_bold',
            'fps_unselectedslide_italics',
            'fps_selectedslide_inset',
            'fps_unselectedslide_inset',
            'fps_image_scale',
            'fps_image_height_noscale',
            'fps_image_width_noscale',
            'fps_image_height_stretch',
            'fps_image_width_stretch',
            'fps_enable_static_caching'

        );

        foreach ($variables as $var) {
            $var_value = isset($_POST[$var]) ? 1:0;
            update_option($var, $var_value);
        }




        if( empty($error) )
        { 
            ?>
            <div class="updated"><p><strong><?php _e('Settings Saved.', 'wp-rp' ); ?></strong></p></div>
            <?php

            if (get_option('fps_enable_static_caching') == '1')
            {
                fps_generate_js();
                fps_generate_css();
            }
        }
        else
        { 
            ?>
            <div class="error"><p><strong>
            <?php 
            
            foreach ( $error as $key=>$val ) {
                _e($val); 
                echo "<br/>";    
            }

            ?>
            </strong></p></div>
            <?php 
        }
    }
?>

<?php
    function fps_generate_js()
    {
        ob_start();

        include(WP_PLUGIN_DIR.'/featured-posts-scroll/js/fps.js.php');

        $file_contents = ob_get_contents();
        $file_path = WP_PLUGIN_DIR.'/featured-posts-scroll/js/fps.js';
        $ret_val = file_put_contents($file_path, $file_contents);
        
        ob_end_clean();

        if (!($ret_val === FALSE))
        {
            ?>
            <div class="updated"><p><strong><?php _e('FPS Static JavaScript files updated.', 'wp-rp' ); ?></strong></p></div>
            <?php
        }
        else
        {
            ?>
            <div class="error"><p><strong><?php _e('FPS Static JavaScript files could not be updated.<br/>You may need to temporarily change the permissions of the '.WP_PLUGIN_DIR.'/featured-posts-scroll/js directory. See plugin FAQ for details.<br/>Plugin will continue to operate normally but at sub-optimal performance until this issue is resolved.', 'wp-rp' ); ?></strong></p></div>
            <?php
        }
    }

    function fps_generate_css()
    {
        ob_start();

        include(WP_PLUGIN_DIR.'/featured-posts-scroll/css/fps.css.php');

        $file_contents = ob_get_contents();
        $file_path = WP_PLUGIN_DIR.'/featured-posts-scroll/css/fps.css';
        $ret_val = file_put_contents($file_path, $file_contents);
        
        ob_end_clean();

        if (!($ret_val === FALSE))
        {
            ?>
            <div class="updated"><p><strong><?php _e('FPS Static CSS files updated.', 'wp-rp' ); ?></strong></p></div>
            <?php
        }
        else
        {
            ?>
            <div class="error"><p><strong><?php _e('FPS Static CSS files could not be updated.<br/>You may need to temporarily change the permissions of the '.WP_PLUGIN_DIR.'/featured-posts-scroll/css directory. See plugin FAQ for details.<br/>Plugin will continue to operate normally but at sub-optimal performance until this issue is resolved.', 'wp-rp' ); ?></strong></p></div>
            <?php
        }
    }
?>