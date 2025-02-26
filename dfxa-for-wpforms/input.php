<?php 


class DFXA_Input{

    public static function get_value( $field ){
        
        $default_value = $field['default_value'];
        $default_value = preg_replace('/^\[|\]$/', '', $default_value);

        if( is_admin() ){
            return sanitize_text_field( "[$default_value]" );
        }

        $code = sanitize_text_field( $default_value );
        $value = do_shortcode( "[$code]" );
        return sanitize_text_field( $value );
    }


    public static function get_url(){

        $url = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_url(  wp_unslash( $_SERVER['REQUEST_URI'] ) ) : ''; 
        $url = sanitize_url( $url );

        if (is_multisite() && !is_subdomain_install()) {
            $url = network_home_url( $url, 'url');
        } else {
            $url = home_url( $url, 'url');
        }

        return esc_url( $url );
    }


    public static function get_referrer(){
        $url = isset($_SERVER['HTTP_REFERER']) ? sanitize_url(  wp_unslash( $_SERVER['HTTP_REFERER'] ) ): '';
        return esc_url( $url );

    }


    public static function get_bloginfo( $atts ){ 
        $atts = shortcode_atts( array( 'key' => '' ), $atts );
        $key  = sanitize_text_field( $atts['key' ]);
        $info = get_bloginfo( $key );
        return sanitize_text_field( $info );
    }


    public static function get_post_var( $atts ){

        $atts = shortcode_atts( 
                    array( 
                        'key' => '',
                        'post_id' => ''
                    ), 
                    $atts 
                );

        $post_id  = (int) $atts['post_id'];
        $key  = sanitize_text_field( $atts['key']);
        $info = get_post_field( $key, $post_id );
        return sanitize_text_field( $info );
    }


    public static function get_custom_field( $atts ){

        $atts = shortcode_atts( 
                    array( 
                        'key' => '',
                        'post_id' => ''
                    ), 
                    $atts 
                );

        $post_id  = (int) $atts['post_id'];
        $key  = sanitize_text_field( $atts['key']);
        $info = get_post_meta( $post_id, $key, true );
        return sanitize_text_field( $info );
    }


    public static function get_param( $atts ){
        $atts = shortcode_atts( 
                    array( 'key' => '' ), 
                    $atts 
                );
        
        $key  = sanitize_text_field( $atts['key'] );
        return isset( $_GET[ $key ]) ? sanitize_text_field( wp_unslash( $_GET[ $key ] ) ) : '';
    }

}



