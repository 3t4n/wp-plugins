<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Cdsfw_Current_Date_Shortcode {

   /**
     * The single instance of the class.
     */
    protected static $instance;

    /**
     * Constructor.
     * Adds filters to execute shortcodes in necessary places.
     *
     * @since 1.0
     */
    private function __construct() {
        add_shortcode( 'current-date', array( $this, 'cdsfw_current_date_shortcode' ) );
    }

    /**
     * Returns an instance of the class.
     *
     * @since 1.0
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Current Date Shortcode implementation.
     *
     * @since 1.0
     */
    public function cdsfw_current_date_shortcode( $atts ) {
        $atts = shortcode_atts(
            array(
                'format' => 'jS F Y',
                'size'   => '',
                'color'  => ''
            ), $atts
        );

        $format = sanitize_text_field( $atts['format'] );

        $size_attr  = isset( $atts['size'] ) ? esc_attr( $atts['size'] ) : '';
        $color_attr = isset( $atts['color'] ) ? esc_attr( $atts['color'] ) : '';

        $date_output = $this->cdsfw_get_formatted_date( $format );

        return "<span class='cdsfw-current-date' style='font-size:$size_attr; color:$color_attr;'>$date_output</span>";
    }

    /**
     * Get formatted date based on the provided format.
     *
     * @since 1.0
     */
    private function cdsfw_get_formatted_date( $format ) {
        $date_output = date_i18n( $format );

        // Adjust output for special case where format is 'z'
        if ( $format === 'z' ) {
            $date_output += 1;
        }

        return $date_output;
    }
}

// Initialize the shortcode
Cdsfw_Current_Date_Shortcode::get_instance();
