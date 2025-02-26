<?php
/**
 * Customizer partials
 * 
 * @package Ridhi_Companion
 */

class Ridhi_Companion_Partials{

    public static function phone(){
        return esc_html( get_theme_mod( 'phone', __( '(222) 400-630', 'ridhi-companion' ) ) ); 
    }

    public static function email(){
        return esc_html( get_theme_mod( 'email', __( 'info@domail.com', 'ridhi-companion' ) ) ); 
    }

    public static function btn_label(){
        return esc_html( get_theme_mod( 'header_ctabtn_label', __( 'Booking', 'ridhi-companion' ) ) ); 
    }

    public static function home_about_title(){
        return esc_html( get_theme_mod( 'home_about_title', __( 'Hi! I\'m Samantha Walters', 'ridhi-companion' ) ) ); 
    }

    public static function home_about_content(){
        $defaults = new Ridhi_Companion_Dummy_Array();
        return wpautop( wp_kses_post( get_theme_mod( 'home_about_content', $defaults->default_about_content() ) ) );
    }

    public static function home_about_label(){
        return esc_html( get_theme_mod( 'home_about_label', __( 'More About Me', 'ridhi-companion' ) ) );
    }

    public static function service_title(){
        return esc_html( get_theme_mod( 'service_title', __( 'Services We Offer', 'ridhi-companion' ) ) );
    }

    public static function service_content(){
        return wpautop( wp_kses_post( get_theme_mod( 'service_content', __( 'Our commitment is to provice comprehensive quality care', 'ridhi-companion' ) ) ) );
    }

    public static function home_service_label(){
        return esc_html( get_theme_mod( 'home_service_label', __( 'Learn More', 'ridhi-companion' ) ) );
    }

    public static function client_title(){
        return esc_html( get_theme_mod( 'client_title', __( 'As Featured In', 'ridhi-companion' ) ) );
    }

    public static function team_title(){
        return esc_html( get_theme_mod( 'team_title', __( 'Our Team', 'ridhi-companion' ) ) );
    }

    public static function team_content(){
        return wpautop( wp_kses_post( get_theme_mod( 'team_content', __( 'It\'s complicated. I\'ve spent more than 20 years recommending various anti-virus programs as an essential part of any Window setup.', 'ridhi-companion' ) ) ) );
    }

    public static function testimonial_title(){
        return esc_html( get_theme_mod( 'testimonial_title', __( 'What they are saying', 'ridhi-companion' ) ) );
    }

    public static function contact_title(){
        return esc_html( get_theme_mod( 'contact_title', __( 'Let\'s Talk', 'ridhi-companion' ) ) );
    }

    public static function contact_content(){
        return wpautop( wp_kses_post( get_theme_mod( 'contact_content', __( 'Tell me your story or just say Hello!', 'ridhi-companion' ) ) ) );
    }

    public static function phone_label(){
        return esc_html( get_theme_mod( 'phone_label', __( 'Call Me', 'ridhi-companion' ) ) );
    }

    public static function email_label(){
        return esc_html( get_theme_mod( 'email_label', __( 'Email Me', 'ridhi-companion' ) ) );
    }

    public static function address_label(){
        return esc_html( get_theme_mod( 'address_label', __( 'Visit Me', 'ridhi-companion' ) ) );
    }

    public static function address(){
        return wpautop( wp_kses_post( get_theme_mod( 'address', __( 'Street Name, np. 14, 
        London, U.K, E14 2RF', 'ridhi-companion' ) ) ) );
    }

    public static function social_title(){
        return esc_html( get_theme_mod( 'social_title', __( 'Get Connected', 'ridhi-companion' ) ) );
    }
}