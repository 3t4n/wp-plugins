<?php
namespace PicPoints;

class Frontend {
    public function __construct() {
        add_filter( 'no_texturize_shortcodes', [ $this, "no_texturize_shortcodes"], 25 );
        add_shortcode( PICPOINTS_SHORTCODE_NAME, [ $this, "shortcode" ] );
    }

    private function init() {
        wp_enqueue_style( "picpoints-main", PICPOINTS_PLUGIN_URL . "assets/css/main.css", [], PICPOINTS_PLUGIN_VERSION );
    }

    private function sanitizeClass( $class ) {
        $sanitized_class = preg_replace("/[^a-zA-Z0-9-_]/", "", $class);
        return $sanitized_class;
    }

    public function no_texturize_shortcodes( $shortcodes ) {
        $shortcodes[] = 'picpoints';
        return $shortcodes;
    }

    public function shortcode( $atts = [], $content = null ) {
        $atts = array_change_key_case( $atts, CASE_LOWER );
        $defaults = [
            "img"    => null,
            "class"  => null
        ];
        $atts = shortcode_atts( $defaults, $atts );

        if ( $atts["img"] == null ) {
            return;
        }

        $img = esc_url( sanitize_url( $atts["img"], FILTER_SANITIZE_URL ) );
        $class = $atts["class"] !== null ? escp_attr( $this->sanitizeClass( sanitize_text_field( $atts["class"] ) ) ) : null;

        $this->init();

        $data = "<div class='pnts-container" . ( $class !== null ? " {$class}" : "" ) . "'>";
        $data .= "<img src='{$img}'>";

        if ( !empty( $content ) ) {
            $pattern = get_shortcode_regex( [ "hotspot" ] );

            if ( preg_match_all( '/'. $pattern .'/s', $content, $matches ) && array_key_exists( 2, $matches ) && in_array( "hotspot", $matches[2] ) ) {
                $data .= "<div class='pnts-hotspots'>";

                foreach ( $matches[3] as $value ) {
                    $atts = shortcode_parse_atts( $value );
                    $atts = array_change_key_case( $atts, CASE_LOWER );
                    $defaults = [
                        "x" => 0,
                        "y" => 0,
                        "link" => null
                    ];
                    $atts = shortcode_atts( $defaults, $atts );

                    $x = esc_attr( intval( $atts["x"] ) );
                    $y = esc_attr( intval( $atts["y"] ) );
                    $link = esc_url( $atts["link"] !== null ? sanitize_url( $atts[ "link" ] ) : "#");

                    $data .= "<a class='pnts-hotspot' href='{$link}' style='left:{$x}%;top:{$y}%;'></a>";
                }

                $data .= "</div>";
            }
        }

        $data .= "</div>";
        return wp_kses_post( $data );
    }
}