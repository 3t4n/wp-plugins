<?php
/*
Plugin Name: A.R.M.Y. VideoSlider
Description: Enhance your website with the A.R.M.Y. VideoSlider plugin! Easily showcase a collection of your favorite videos using embedded iframes.
Version: 1.3
Text Domain: army_videoslider
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'ARMY_VIDEOSLIDER_VERSION', '1.3' );

class ARMY_VideoSlider {

    private static $instance;

    public static function init() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new ARMY_VideoSlider();
        }
        return self::$instance;
    }

    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_shortcode( 'army_videoslider', array( $this, 'render_shortcode' ) );
        add_filter( 'plugin_row_meta', array( $this, 'add_social_links' ), 10, 2 );
    }

    public function enqueue_scripts() {
        wp_enqueue_style( 'font-awesome', plugins_url( 'assets/css/font-awesome.min.css', __FILE__ ), array(), '6.4.2' );
        wp_enqueue_script( 'army_videoslider', plugins_url( 'assets/js/army_videoslider.js', __FILE__ ), array('jquery'), ARMY_VIDEOSLIDER_VERSION, true );
        wp_enqueue_style( 'army_videoslider', plugins_url( 'assets/css/style.css', __FILE__ ), array(), ARMY_VIDEOSLIDER_VERSION );
    }

    public function render_shortcode( $atts ) {
        $atts = shortcode_atts( array(
            'video_links' => '',
            'skin'       => 'default',
        ), $atts, 'army_videoslider' );

        $video_links = explode( ',', $atts['video_links'] );

        ob_start(); ?>

        <div class="slideshow-container dashed-animation">

            <?php foreach ( $video_links as $index => $link ) : ?>
                <div class="mySlides">
                    <iframe
                        src="<?php echo esc_url( $link ); ?>"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
            <?php endforeach; ?>

            <div class="custom-controls">
                <a class="custom-prev" onclick="plusSlides(-1)">
                    <img src="<?php echo esc_url( plugins_url( 'assets/img/left_arrow.png', __FILE__ ) ); ?>" alt="Previous Slide" width="60" height="60">
                </a>
                <a class="custom-next" onclick="plusSlides(1)">
                    <img src="<?php echo esc_url( plugins_url( 'assets/img/right_arrow.png', __FILE__ ) ); ?>" alt="Next Slide" width="60" height="60">
                </a>
            </div>

        </div>

        <?php
        return ob_get_clean();
    }

    public function add_social_links( $links, $file ) {
        if( strpos( $file, 'army_videoslider.php' ) !== false ) {
            $links[] = '<span style="color: black;">By</span> <a href="https://freddydeveloper.com/">FreddyDeveloper</a>';
            
            $social_links = array(
                '<a href="https://x.com/freddydeveloper/" target="_blank"><img src="' . esc_url( plugins_url( 'assets/img/x.svg', __FILE__ ) ) . '" alt="X" width="13" height="13"></a>',
                '<a href="https://instagram.com/freddydeveloper/" target="_blank"><img src="' . esc_url( plugins_url( 'assets/img/instagram.png', __FILE__ ) ) . '" alt="Instagram" width="13" height="13"></a>',
            );

            $links = array_merge( $links, $social_links );
        }

        return $links;
    }
}

ARMY_VideoSlider::init();