<?php
if( !class_exists( 'autoketing_Helper' ) ){
    class autoketingHelper{
        public static function sanitize_params_submitted( $value, $type_content = 'text' ) {
		$value = wp_unslash( $value );
		if ( is_string( $value ) ) {
                    switch ( $type_content ) {
			case 'html':
                            $value = wp_kses_post( $value );
                            break;
			case 'textarea' :
                            $value = sanitize_textarea_field( $value );
                            break;
			default:
                            $value = sanitize_text_field( wp_unslash( $value ) );
                    }
		} elseif ( is_array( $value ) ) {
                    foreach ( $value as $k => $v ) {
                        $value[$k] = self::sanitize_params_submitted( $v, $type_content );
                    }                
                }
            return $value;
	}
    }
}

