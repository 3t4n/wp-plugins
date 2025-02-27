<?php
/**
 * Class DV_User
 *
 * This class add some shortcode for logged in (current user) information
 */

class DV_User
{
    public function initialize()
    {

        add_shortcode( 'user-if', array($this,'is_user_logged_in'));
        add_shortcode( 'user-info', array($this,'user_shortcode'));

    }

    public function is_user_logged_in( $attributes, $content )
    {

        if ( is_user_logged_in() ) {
            return do_shortcode($content);
        } else {
            return null;
        }

    }

    public function user_shortcode( $attributes )
    {
        $field = '';

        extract( shortcode_atts( array(
            'field' => 'general',
        ), $attributes ) );

        if ( empty($field) || !is_user_logged_in() ) {
            return null;
        }

        $current_user = wp_get_current_user();

        switch ( strtolower($field) ) {
            case 'username':
                $data = esc_html( $current_user->user_login );
                break;
            case 'email':
                $data = esc_html( $current_user->user_email );
                break;
            case 'firstname':
                $data = esc_html( $current_user->user_firstname );
                break;
            case 'lastname':
                $data = esc_html( $current_user->user_lastname );
                break;
            case 'id':
                $data = esc_html( $current_user->ID );
                break;
            case 'name':
            default:
                $data = esc_html( $current_user->display_name );
                break;
        }

        return $data;
    }

}
