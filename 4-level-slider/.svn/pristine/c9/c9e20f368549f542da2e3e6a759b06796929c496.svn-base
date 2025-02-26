<?php
    //CSS ADDED IN HEAD
    function fls_header_style() {
        $circle_color = get_option('fls_circle_color', '#FFFFFF');
        $circle_active_color = get_option('fls_circle_active_color', '#f8931f');
        ?>
            <style type="text/css">
                .fls-slider-name span { 
                    background: <?php echo $circle_color; ?>;
                    color: <?php echo $circle_active_color; ?>;
                }
                .fls-slider-name.active span {
                    background: <?php echo $circle_active_color; ?>;
                    color: <?php echo $circle_color; ?>;
                }
            </style>
        <?php
    }
    add_action('wp_head', 'fls_header_style');


    //ADMIN SCRIPTS
    function four_level_slider_admin_scripts() {
        wp_enqueue_media();
        global $post;
        if(isset($post->ID)) {
            wp_enqueue_media( array( 
                'post' => $post->ID, 
            ) );
        }

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'my-script-handle', plugins_url('../dist/js/fls-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
        wp_enqueue_script( 'fls-image-upload', plugins_url('../dist/js/fls-media-uploader.js', __FILE__ ) );
        wp_register_style( 'fls-admin-style', plugins_url('../dist/css/fls-admin-style.css', __FILE__ ) );
        wp_enqueue_style( 'fls-admin-style');
    }
    add_action( 'admin_enqueue_scripts','four_level_slider_admin_scripts' );


    //FRONTEND SCRIPTS
    function four_level_slider_front_scripts() {
        wp_register_style( 'fls-front-style', '' . plugins_url('../dist/css/fls-front-style.css', __FILE__ ) );
        wp_enqueue_style( 'fls-front-style');
        wp_enqueue_script('jquery');
        wp_enqueue_script( 'fls-image-slider', plugins_url('../dist/js/fls-image-slider.js', __FILE__ ) );
        wp_enqueue_style( 'fls-roboto-condesend', 'https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap', false );
    }  
    add_action( 'wp_enqueue_scripts', 'four_level_slider_front_scripts' );