<?php

if(!class_exists('Remove_And_Rearrange_Menu_Settings'))
{
    class Remove_And_Rearrange_Menu_Settings{
        
        public function __construct()
        {
            add_action('wp_ajax_menus_retrive', array( $this, 'wp_ajax_menus_callback' ) );
            add_action('wp_ajax_nopriv_menus_retrive', array( $this, 'wp_ajax_menus_callback' ) );
        }


        public function wp_ajax_menus_callback()
        {
            $locations = get_nav_menu_locations();
            $mr_menu = wp_get_nav_menu_object( $_POST['menuparentId'] );
            $menu_items = wp_get_nav_menu_items( $mr_menu->term_id, array( 'post_status' => 'any' ) );
            $html = '';
            $allowed_html = array( 'option' => array( 'value' => array() ) );
            
            foreach ($menu_items as $menu_itemm)
            {
                 $value = sprintf( 'Below %s' , $menu_itemm->title ) ;

                 $html .= '<option value="'. esc_attr( $menu_itemm->ID ) .'"> '. esc_html( $value ) . '</option>';
            }
            //echo sanitize_text_field( $html ); // phpcs:ignore
            echo wp_kses( $html, $allowed_html );
            wp_die();
        }



    }       
    new Remove_And_Rearrange_Menu_Settings;

}

?>