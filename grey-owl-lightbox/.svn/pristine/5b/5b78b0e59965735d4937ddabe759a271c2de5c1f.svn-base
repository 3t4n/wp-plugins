<?php
class GreyOwllightboxOBJ{
    static private $fields_list_data = array();
    static private $fields_list      = array();
    static private $default_values   = array();
    static private $fields_values    = array();
    static private $all_functions    = array();
    static private $parameters       = array();
    static public function set_ajax_callback_parameters( $params = array() ){
        self::$parameters = $params;
    }
    static public function get_ajax_callback_parameters(){
        $return_parameters = self::$parameters;
        self::$parameters = array();
        return $return_parameters;
    }
    static public function set_ajax_callback( $fn_key, $callback ){
        if( is_callable( $callback ) ){
            self::$all_functions[ $fn_key ] = $callback;
        } else {
            self::$all_functions[ $fn_key ] = function(){ return 'not exist'; };
        }
    }
    static public function get_ajax_callback( $fn_key, $params ){
        if( isset( self::$all_functions[ $fn_key ] ) ){
            $callback = self::$all_functions[ $fn_key ];
            return $callback( $params );
        } else {
            return 'not exist';
        }
    }
    static public function gol_callback_exists( $fn_key ){
        if( isset( self::$all_functions[ $fn_key ] ) ){
            return true;
        } else {
            return false;
        }
    }
    static public function start_obj( $data_array ){
        self::$fields_list_data = $data_array;
        self::default_fields_value();
        self::fields_value();
    }
    static private function default_fields_value(){
        if( is_array( self::$fields_list_data ) && self::$fields_list_data ){
            foreach ( self::$fields_list_data as $value ) {
                if( isset( $value['row'] ) && is_array( $value['row'] ) && $value['row'] ){
                    foreach ( $value['row'] as $column ) {
                        if( $column['type'] == 'checkbox' ){
                            self::$default_values[ $column['name'] ] = '0';
                        } elseif( isset( $column['default'] ) ) {
                            self::$default_values[ $column['name'] ] = $column['default'];
                        } else {
                            self::$default_values[ $column['name'] ] = '';
                        }
                        self::$fields_list[] = $column['name'];
                    }
                }
            }
        }
    }
    static private function fields_value(){
        if( is_array( self::$fields_list_data ) && self::$fields_list_data ){
            foreach ( self::$fields_list_data as $value ) {
                if( isset( $value['row'] ) && is_array( $value['row'] ) && $value['row'] ){
                    foreach ( $value['row'] as $column ) {
                        $fild_value = get_option( $column['name'] );
                        if( $fild_value === false || $fild_value == '' ){
                            self::$fields_values[ $column['name'] ] = self::$default_values[ $column['name'] ];
                        } else {
                            self::$fields_values[ $column['name'] ] = $fild_value;
                        }
                    }
                }
            }
        }
    }
    static public function get_field_value( $key ){
        if( isset( self::$fields_values[ $key ] ) ){
            $decoded_value = self::grey_owl_lightbox_decode( self::$fields_values[ $key ] );
            return $decoded_value;
        }
    }
    static public function the_field_value( $key ){
        echo self::get_field_value( $key );
    }
    static public function get_fields_list(){
        return self::$fields_list_data;
    }
    static public function save_lightbox_data( $data = array() ){
        if( is_array( $data ) && isset( $data['gol_submit_form'] ) ){
            foreach ( self::$fields_list as $value_key ) {
                if( isset( $data[ $value_key ] ) ){
                    $save_val = self::grey_owl_lightbox_encode( $data[ $value_key ] );
                    update_option( $value_key, $save_val, false );
                } else {
                    $save_val = self::grey_owl_lightbox_encode( self::$default_values[ $value_key ] );
                    update_option( $value_key, self::$default_values[ $value_key ], false );
                }
            }
            self::start_obj( self::$fields_list_data );
        }
    }
    static public function grey_owl_lightbox_encode( $code ){
        $code = stripslashes( $code );
        $code = trim( $code );
        $code = preg_replace( ['/</', '/>/', "/'/", '/"/'],['&#60;', '&#62;', '&#39;', '&#34;'], $code );
        return $code;
    }
    static public function grey_owl_lightbox_decode( $code ){
        $code = preg_replace(['/&#60;/', '/&#62;/', '/&#39;/', '/&#34;/'], ['<', '>', "'", '"'], $code);
        stripslashes( $code );
        return $code;
    }
}
GreyOwllightboxOBJ::start_obj( gol_fields_list_array() );
