<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use DavidWenner\ATestimonialBuilder\ATBS_LayoutMapper;
use DavidWenner\ATestimonialBuilder\ATBS_Handlers;

class ATBS_Shortcodes {

    public function __construct()
    {
        add_shortcode('atbs_widget', [$this, 'atbs_widget_render']);
    }

    /**
     * atbs_widget_render
     * @param array $atts
     * @returm mixed
     */
    public function atbs_widget_render($atts = [])
    {
        $atts = shortcode_atts(array(
            'layout_id' => ATBS_LayoutMapper::LAYOUT_HORIZON,
                ), $atts);
        if (isset($atts['layout_id'])) {

            $identify = ATBS_Handlers::atbs_get_user_identity();
            $func = 'atbs_widget_script' . $atts['layout_id'];
            if (method_exists(__CLASS__, $func)) {
                return call_user_func_array([__CLASS__, $func], [$identify]);
            }
            return null;
        }
    }

    /**
     * horizon widget
     * @param string $identify
     * @return string
     */
    public function atbs_widget_script1($identify)
    {
        wp_register_script('a-testimonial-builder-horizon-widget', ATBS_URL . 'assets/js/horizon/horizonwidget.min.js', array(), '1.0.0', true);
        wp_enqueue_script('a-testimonial-builder-horizon-widget');
        // Localize the script with new data
        wp_add_inline_script('a-testimonial-builder-horizon-widget', '
        document.addEventListener("DOMContentLoaded", function() {
            VrHorizon.init({
                hashurl: "myyux*8F44%7Cniljyx3%7Bthfqwjkjwjshjx3htr4ox4mtwn%7Fts4mtwn%7Fts%7Cniljy3rns3ox5",
                identify: "' . esc_js($identify) . '",
                container: "#horizonWidget"
            });
        });
    ');
        return '<div id="horizonWidget"></div>';
    }

    /**
     * matrix widget
     * @param string $identify
     * @return string
     */
    public function atbs_widget_script2($identify)
    {
        wp_register_script('a-testimonial-builder-matrix-widget', ATBS_URL . 'assets/js/matrix/matrixwidget.min.js', array(), '1.0.0', true);
        wp_enqueue_script('a-testimonial-builder-matrix-widget');
        // Localize the script with new data
        wp_add_inline_script('a-testimonial-builder-matrix-widget', '
        document.addEventListener("DOMContentLoaded", function() {
            VrMatrix.init({
                hashurl: "myyux*8F44%7Cniljyx3%7Bthfqwjkjwjshjx3htr4ox4mtwn%7Fts4mtwn%7Fts%7Cniljy3rns3ox5",
                identify: "' . esc_js($identify) . '",
                container: "#matrixWidget"
            });
        });
    ');
        return '<div id="matrixWidget"></div>';
    }

    /**
     * masonry widget
     * @param string $identify
     * @return string
     */
    public function atbs_widget_script3($identify)
    {
        wp_register_script('a-testimonial-builder-masonry-widget', ATBS_URL . 'assets/js/masonry/masonrywidget.min.js', array(), '1.0.0', true);
        wp_enqueue_script('a-testimonial-builder-masonry-widget');
        // Localize the script with new data
        wp_add_inline_script('a-testimonial-builder-masonry-widget', '
        document.addEventListener("DOMContentLoaded", function() {
            VrMasonry.init({
                hashurl: "myyux*8F44%7Cniljyx3%7Bthfqwjkjwjshjx3htr4ox4mtwn%7Fts4mtwn%7Fts%7Cniljy3rns3ox5",
                identify: "' . esc_js($identify) . '",
                container: "#masonryWidget"
            });
        });
    ');
        return '<div id="masonryWidget"></div>';
    }

    /**
     * band widget
     * @param string $identify
     * @return string
     */
    public function atbs_widget_script4($identify)
    {
        wp_register_script('a-testimonial-builder-band-widget', ATBS_URL . 'assets/js/band/bandwidget.min.js', array(), '1.0.0', true);
        wp_enqueue_script('a-testimonial-builder-band-widget');
        // Localize the script with new data
        wp_add_inline_script('a-testimonial-builder-band-widget', '
        document.addEventListener("DOMContentLoaded", function() {
            VrBand.init({
                hashurl: "myyux*8F44%7Cniljyx3%7Bthfqwjkjwjshjx3htr4ox4mtwn%7Fts4mtwn%7Fts%7Cniljy3rns3ox5",
                identify: "' . esc_js($identify) . '",
                container: "#bandWidget"
            });
        });
    ');
        return '<div id="bandWidget"></div>';
    }

    /**
     * square widget
     * @param string $identify
     * @return string
     */
    public function atbs_widget_script5($identify)
    {
        wp_enqueue_script('a-testimonial-builder-square-widget', ATBS_URL . 'assets/js/square/squarewidget.min.js', array(), '1.0.0', true);
        wp_enqueue_script('a-testimonial-builder-square-widget');
        // Localize the script with new data
        wp_add_inline_script('a-testimonial-builder-square-widget', '
        document.addEventListener("DOMContentLoaded", function() {
            VrSquare.init({
                hashurl: "myyux*8F44%7Cniljyx3%7Bthfqwjkjwjshjx3htr4ox4mtwn%7Fts4mtwn%7Fts%7Cniljy3rns3ox5",
                identify: "' . esc_js($identify) . '",
                container: "#squareWidget"
            });
        });
    ');
        return '<div id="squareWidget"></div>';
    }
}
