<?php
    //css
    function es_assets_styles_load() {
        wp_register_style( 'es-assets-menu', plugins_url( '/assets/styles/menu.css', __FILE__));
        wp_enqueue_style( 'es-assets-menu' );
        if(!empty($_GET['page']) && strpos(sanitize_text_field($_GET['page']),'es-plugin') == 0) {
            wp_register_style( 'es-assets-styles', plugins_url( '/assets/styles/styles.css', __FILE__));
            wp_enqueue_style( 'es-assets-styles');
            // wp_enqueue_style('es-assets-styles', plugins_url('/assets/styles/styles.css', __FILE__), array('es-assets-menu'), '1.0');
    
            wp_register_style( 'es-assets-grapes', plugins_url( '/assets/js/grapes/css/grapes.min.css', __FILE__));
            wp_enqueue_style( 'es-assets-grapes' );
    
            wp_register_style( 'es-assets-grapes-preset', plugins_url( '/assets/js/grapes/preset/grapesjs-preset-newsletter.css', __FILE__));
            wp_enqueue_style( 'es-assets-grapes-preset' );
            
        }
    }
    add_action( 'admin_init','es_assets_styles_load');

    //js
    function es_assets_js_load() {
        if (!empty($_GET['page']) && strpos(sanitize_text_field($_GET['page']),'es-plugin') == 0) {
            //libs
            wp_enqueue_script('es-axios-js', plugins_url('/assets/js/axios.js', __FILE__));
            wp_enqueue_script('es-vue-js', plugins_url('/assets/js/vue.js', __FILE__));
            wp_enqueue_script('es-duallistbox', plugins_url('/assets/js/dual-listbox.js', __FILE__));

            wp_enqueue_script('es-vue-datepicker', plugins_url('/assets/js/datepicker/vue-datepicker.js', __FILE__));
            wp_enqueue_script('es-vue-datepicker-es', plugins_url('/assets/js/datepicker/es.js', __FILE__));

            //grapes
            wp_enqueue_script('es-grapes', plugins_url('/assets/js/grapes/grapes.min.js', __FILE__));
            wp_enqueue_script('es-grapes-preset', plugins_url('/assets/js/grapes/preset/grapesjs-preset-newsletter.min.js', __FILE__));
            wp_enqueue_script('es-grapes-translate', plugins_url('/lang/grapesjs/es.js', __FILE__));

            //grapes plugins
            wp_enqueue_script('es-grapes-customcode', plugins_url('/assets/js/grapes/plugins/grapesjs-custom-code.min.js', __FILE__));
            wp_enqueue_script('es-grapes-postWordpress', plugins_url('/assets/js/grapes/plugins/post-wordpress.js', __FILE__));
            wp_enqueue_script('es-grapes-imagesGallery', plugins_url('/assets/js/grapes/plugins/images-gallery.js', __FILE__));
            wp_enqueue_script('es-grapes-content-center', plugins_url('/assets/js/grapes/plugins/content-center.js', __FILE__));
            wp_enqueue_script('es-grapes-rte-extender', plugins_url('/assets/js/grapes/plugins/rte-extended.js', __FILE__));

        }
    }
    add_action('admin_init','es_assets_js_load');