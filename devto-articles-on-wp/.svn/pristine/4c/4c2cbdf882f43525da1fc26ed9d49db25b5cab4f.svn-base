<?php
namespace DevToWP;

defined( 'ABSPATH' ) || die();
/**
 * Making query for the shortcode
 *
 * @package DevToWP
 */

class DevQuery extends Engine {

    public static function dev_query($atts) {
        $atts = shortcode_atts(
            array(
                'user_name' => '',
                'post_count' => '-1',
                'layout' => 'single'
            ),
            $atts
        );

        if ( empty( $atts['user_name'] ) ) {
            return sprintf( "<p>%s</p>", esc_html__( 'Your dev.to User Name is not set in the shortcode.', 'devtowp' ) );
        }
        self::dev_to_get_posts($atts['user_name']);

        $data = self::$data;
        if ( !empty( $data ) && count($data) > $atts['post_count'] && $atts['post_count'] != -1 ) {
             $data = array_splice($data, 0, $atts['post_count'] );
        }

        ob_start();
            if ( !empty( $data ) ) {
                View::markup($data, $atts);
            } else {
             return sprintf( "<p>%s</p>", esc_html__( 'Nothing Found.', 'devtowp' ) );
            }
        return ob_get_clean();

    }

}
