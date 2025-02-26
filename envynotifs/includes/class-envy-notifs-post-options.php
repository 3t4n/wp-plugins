<?php

// Notifs Bar Button URL Options
add_action( 'add_meta_boxes', 'envy_notifs_custom_button_box' );

if ( ! function_exists( 'envy_notifs_custom_button_box' ) ) :

    function envy_notifs_custom_button_box($post){
        add_meta_box('envy_notifs_btn_meta_box', __( 'Notifs Bar Button URL', 'envy-notifs') , 'envy_notifs_custom_element_grid_class_meta_box', 'envynotifs', 'normal' , 'high');
    }

endif;

add_action('save_post', 'envy_notifs_btn_save_metabox');

if ( ! function_exists( 'envy_notifs_btn_save_metabox' ) ) :

    function envy_notifs_btn_save_metabox(){ 
        global $post;
        if( isset( $_POST["custom_element_grid_class"] ) ){

            $envy_notifs_meta_element_class = sanitize_text_field( $_POST['custom_element_grid_class'] );

            update_post_meta($post->ID, 'custom_element_grid_class_meta_box', $envy_notifs_meta_element_class);
        }
    }

endif;

if ( ! function_exists( 'envy_notifs_custom_element_grid_class_meta_box' ) ) :

    function envy_notifs_custom_element_grid_class_meta_box($post){
        $meta_element_class = get_post_meta($post->ID, 'custom_element_grid_class_meta_box', true);
        ?>   
        <input type="text" name="custom_element_grid_class" id="custom_element_grid_class" value="<?php echo esc_attr( $meta_element_class ); ?>" class="widefat" ?>
        <?php
    }

endif;
