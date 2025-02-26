<?php
/*
Plugin Name: Fashion Slider
Plugin URI: https://tishonator.com/product/fashion-slider-pro
Description: Configure a Responsive Fashion Slider and insert it in any Page or Post as a Shortcode. Admin slide fields for title, text, image.
Author: tishonator
Version: 1.0.1
Author URI: http://tishonator.com/
Contributors: tishonator
Text Domain: fashion-slider
*/

if ( !class_exists('tishonator_FashionSliderPlugin') ) :

    /**
     * Register the plugin.
     *
     * Display the administration panel, insert JavaScript etc.
     */
    class tishonator_FashionSliderPlugin {
        
    	/**
    	 * Instance object
    	 *
    	 * @var object
    	 * @see get_instance()
    	 */
    	protected static $instance = NULL;

        /**
         * an array with all Slider settings
         */
        private $settings = array();

        /**
         * Constructor
         */
        public function __construct() {}

        /**
         * Setup
         */
        public function setup() {

            register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );

            if ( is_admin() ) { // admin actions

                add_action('admin_menu', array(&$this, 'add_admin_page'));

                add_action('admin_enqueue_scripts', array(&$this, 'admin_scripts'));
            }

            add_action( 'init', array(&$this, 'register_shortcode') );
        }

        public function register_shortcode() {

            add_shortcode( 'fashion-slider', array(&$this, 'display_shortcode') );
        }

        public function display_shortcode($atts) {

            $result = '';

            $options = get_option( 'fashion_slider_options' );
            
            if ( ! $options )
                return $result;

            // Add jquery.sequence.js
            wp_register_script('fashion-slider-jquery-sequence',
                plugins_url('js/jquery.sequence.js', __FILE__), array('jquery') );

            wp_enqueue_script('fashion-slider-jquery-sequence',
                    plugins_url('js/jquery.sequence.js', __FILE__), array('jquery') );

            // CSS
            wp_register_style('fashion-slider_css',
                plugins_url('css/fashion-slider.css', __FILE__), true);

            wp_enqueue_style( 'fashion-slider_css',
                plugins_url('css/fashion-slider.css', __FILE__), array() );

            $result .= '<div class="sequence-theme">';
            $result .= '<div id="sequence">';

            $result .= '<img class="sequence-prev" src="'
                        . esc_url( plugins_url('img/bt-prev.png', __FILE__) )
                        . '" alt="' . esc_attr( __('Previous', 'fashion-slider') ) . '" />';

            $result .= '<img class="sequence-next" src="'
                        . esc_url( plugins_url('img/bt-next.png', __FILE__) )
                        . '" alt="' . esc_attr( __('Next', 'fashion-slider') ) . '" />';

            $result .= '<ul class="sequence-canvas">';

            for ( $slideNumber = 1; $slideNumber <= 3; ++$slideNumber ) {

                $slideTitle = array_key_exists('slide_' . $slideNumber . '_title', $options)
                                ? $options[ 'slide_' . $slideNumber . '_title' ] : '';

                $slideText = array_key_exists('slide_' . $slideNumber . '_text', $options)
                                ? $options[ 'slide_' . $slideNumber . '_text' ] : '';

                $slideImage = array_key_exists('slide_' . $slideNumber . '_image', $options)
                                ? $options[ 'slide_' . $slideNumber . '_image' ] : '';

                if ( $slideImage ) {

                    if ( $slideNumber == 1 ) {
                        $result .= '<li class="animate-in">';
                    } else {
                        $result .= '<li>';
                    }                 

                    $result .= '<h2 class="title">' . esc_attr($slideTitle) . '</h2>';
                    $result .= '<div class="subtitle">';
                    $result .= esc_attr($slideText);
                    $result .= '</div>';
                    $result .= '<img class="model" src="' . esc_url($slideImage)
                                        . '" alt="' . esc_attr($slideTitle) . '" />';
                    $result .= '</li>';
                }
            }

            $result .= '</ul>';
            $result .= '<ul class="sequence-pagination">';

            for ( $slideNumber = 1; $slideNumber <= 3; ++$slideNumber ) {

                $slideTitle = array_key_exists('slide_' . $slideNumber . '_title', $options)
                                ? $options[ 'slide_' . $slideNumber . '_title' ] : '';

                $slideImage = array_key_exists('slide_' . $slideNumber . '_image', $options)
                                ? $options[ 'slide_' . $slideNumber . '_image' ] : '';

                if ( $slideImage ) {

                    $result .= '<li><img src="' . esc_url($slideImage) . '" alt="'
                                    . esc_attr($slideTitle) . '" /></li>';
                }
            }

            $result .= '</ul>';
            $result .= '</div>';
            $result .= '</div>';

            return $result;
        }

        public function admin_scripts($hook) {

            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');

            wp_register_script('fashion_slider_upload_media', plugins_url('js/upload-media.js', __FILE__), array('jquery'));
            wp_enqueue_script('fashion_slider_upload_media');

            wp_enqueue_style('thickbox');
        }

    	/**
    	 * Used to access the instance
         *
         * @return object - class instance
    	 */
    	public static function get_instance() {

    		if ( NULL === self::$instance ) {
                self::$instance = new self();
            }

    		return self::$instance;
    	}

        /**
         * Unregister plugin settings on deactivating the plugin
         */
        public function deactivate() {

            unregister_setting('fashion_slider', 'fashion_slider_options');
        }

        /** 
         * Print the Section text
         */
        public function print_section_info() {}

        public function admin_init_settings() {
            
            register_setting('fashion_slider', 'fashion_slider_options');

            // add separate sections for each of Sliders
            add_settings_section( 'fashion_slider_section',
                __( 'Slider Settings', 'fashion-slider' ),
                array(&$this, 'print_section_info'),
                'fashion_slider' );

            for ( $i = 1; $i <= 3; ++$i ) {

                // Slide Title
                add_settings_field(
                    'slide_' . $i . '_title',
                    sprintf( __( 'Slide %s Title', 'fashion-slider' ), $i ),
                    array(&$this, 'input_callback'),
                    'fashion_slider',
                    'fashion_slider_section',
                    [ 'id' => 'slide_' . $i . '_title',
                      'page' =>  'fashion_slider_options' ]
                );

                // Slide Navigation Title
                add_settings_field(
                    'slide_' . $i . '_text',
                    sprintf( __( 'Slide %s Content', 'fashion-slider' ), $i ),
                    array(&$this, 'textarea_callback'),
                    'fashion_slider',
                    'fashion_slider_section',
                    [ 'id' => 'slide_' . $i . '_text',
                      'page' =>  'fashion_slider_options' ]
                );

                // Slide Image
                add_settings_field(
                    'slide_' . $i . '_image',
                    sprintf( __( 'Slide %s Image', 'fashion-slider' ), $i ),
                    array(&$this, 'image_callback'),
                    'fashion_slider',
                    'fashion_slider_section',
                    [ 'id' => 'slide_' . $i . '_image',
                      'page' =>  'fashion_slider_options' ]
                );
            }
        }

        public function textarea_callback($args) {

            // get the value of the setting we've registered with register_setting()
            $options = get_option( $args['page'] );
 
            // output the field

            $fieldValue = $options && $args['id'] && array_key_exists(esc_attr( $args['id'] ), $options)
                                ? $options[ esc_attr( $args['id'] ) ] : '';
            ?>

            <textarea id="<?php echo esc_attr( $args['page'] . '[' . $args['id'] . ']' ); ?>"
                name = "<?php echo esc_attr( $args['page'] . '[' . $args['id'] . ']' ); ?>"
                rows="10" cols="39"><?php echo esc_attr($fieldValue); ?></textarea>
            <?php
        }

        public function input_callback($args) {

            // get the value of the setting we've registered with register_setting()
            $options = get_option( $args['page'] );
 
            // output the field
            $fieldValue = ($options && $args['id'] && array_key_exists(esc_attr( $args['id'] ), $options))
                                ? $options[ esc_attr( $args['id'] ) ] : 
                                    (array_key_exists('default_val', $args) ? $args['default_val'] : '');
            ?>

            <input type="text" id="<?php echo esc_attr( $args['page'] . '[' . $args['id'] . ']' ); ?>"
                name="<?php echo esc_attr( $args['page'] . '[' . $args['id'] . ']' ); ?>"
                class="regular-text"
                value="<?php echo esc_attr( $fieldValue ); ?>" />
<?php
        }

        public function image_callback($args) {

            // get the value of the setting we've registered with register_setting()
            $options = get_option( $args['page'] );
 
            // output the field

            $fieldValue = $options && $args['id'] && array_key_exists(esc_attr( $args['id'] ), $options)
                                ? $options[ esc_attr( $args['id'] ) ] : '';
            ?>

            <input type="text" id="<?php echo esc_attr( $args['page'] . '[' . $args['id'] . ']' ); ?>"
                name="<?php echo esc_attr($args['page'] . '[' . $args['id'] . ']' ); ?>"
                class="regular-text"
                value="<?php echo esc_attr( $fieldValue ); ?>" />
            <input class="upload_image_button button button-primary" type="button"
                   value="<?php _e('Change Image', 'fashion-slider'); ?>" />

            <p><img class="slider-img-preview" <?php if ( $fieldValue ) : ?> src="<?php echo esc_attr($fieldValue); ?>" <?php endif; ?> style="max-width:300px;height:auto;" /><p>
<?php         
        }

        public function add_admin_page() {

            add_menu_page( __('Fashion Slider Settings', 'fashion-slider'),
                __('Fashion Slider', 'fashion-slider'), 'manage_options',
                'fashion-slider.php', array(&$this, 'show_settings'),
                'dashicons-format-gallery', 6 );

            //call register settings function
            add_action( 'admin_init', array(&$this, 'admin_init_settings') );
        }

        /**
         * Display the settings page.
         */
        public function show_settings() { ?>

            <div class="wrap">
                <div id="icon-options-general" class="icon32"></div>

                <div class="notice notice-info"> 
                    <p><strong><?php _e('Upgrade to Fashion Slider PRO Plugin', 'fashion-slider'); ?>:</strong></p>
                    <ul>
                        <li><?php _e('Configure Up to 10 Different Sliders', 'fashion-slider'); ?></li>
                        <li><?php _e('Insert Up to 10 Slides per Slider', 'fashion-slider'); ?></li>
                        <li><?php _e('Admin Options: Colors, Background, Height, Speed', 'fashion-slider'); ?></li>
                    </ul>
                    <a href="https://tishonator.com/product/fashion-slider-pro" class="button-primary">
                        <?php _e('Upgrade to Fashion Slider PRO Plugin', 'fashion-slider'); ?>
                    </a>
                    <p></p>
                </div>

                <h2><?php _e('Fashion Slider Settings', 'fashion-slider'); ?></h2>

                <form action="options.php" method="post">
                    <?php settings_fields('fashion_slider'); ?>
                    <?php do_settings_sections('fashion_slider'); ?>
                    
                    <h3>
                      Usage
                    </h3>
                    <p>
                        <?php _e('Use the shortcode', 'fashion-slider'); ?> <code>[fashion-slider]</code> <?php echo _e( 'to display Slider to any page or post.', 'fashion-slider' ); ?>
                    </p>
                    <?php submit_button(); ?>
              </form>
            </div>
    <?php
        }
    }

endif; // tishonator_FashionSliderPlugin

add_action('plugins_loaded', array( tishonator_FashionSliderPlugin::get_instance(), 'setup' ), 10);
