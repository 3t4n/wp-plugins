<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

class TGGH_Serializer {
    public $output;

    function write_int( $value, $digits ) {
        $this->output .= str_pad( $value, $digits, 0, STR_PAD_LEFT );
    }

    function write_string( $string, $length_digits ) {
        $this->write_int( strlen( $string ), $length_digits );
        $this->output .= $string;
    }
}

class TGGH_Deserializer {
    private $input;
    private $length;
    private $offset = 0;

    function __construct( $input ) {
        $this->input = $input;
        $this->length = strlen( $input );
    }

    function is_done() {
        return $this->offset >= $this->length;
    }

    function read_int( $digits ) {
        $data = substr( $this->input, $this->offset, $digits );
        $this->offset += $digits;
        return (int) $data;
    }

    function read_string( $length_digits ) {
        $string_length = $this->read_int( $length_digits );
        $string = substr( $this->input, $this->offset, $string_length );
        $this->offset += $string_length;
        return $string;
    }
}
