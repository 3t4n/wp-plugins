<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://profiles.wordpress.org/nababurbd/
 * @since      1.0.0
 *
 * @package    App_Swiper_Slider
 * @subpackage App_Swiper_Slider/public/partials
 */


class Appswiperslider_Swiper_Slider_Public_Display
{


    /**
     * Load constructor
     */
    public function __construct()
    {
        // Enable post thumbnail support
        add_theme_support('post-thumbnails');

        // Add app-specific thumbnail size
        add_theme_support('app-thumbnails');
        add_image_size('app-thumbnail-size', 280, 600, true); // Exact crop: 280x600 pixels

        // Enqueue scripts for frontend
        add_action('wp_enqueue_scripts', array($this, 'appswiperslider_enqueue_frontend_inline_assets'));

        // Register shortcode for Swiper Slider or [appswiperslider posts_num="5" order="ASC" orderby="title" screen_cat="brand"]
        add_shortcode('appswiperslider', array($this, 'appswiperslider_app_swiper_slider_shortcode_callback'));
    }


    /**
     * Get plugin option with fallback.
     *
     * @param string $option
     * @param string $section
     * @param mixed $default
     * @return mixed
     */
    public function app_option($option, $section, $default = '')
    {
        $options = get_option($section, array());
        return isset($options[$option]) ? sanitize_text_field($options[$option]) : $default;
    }

    /**
     * Enqueue inline scripts and styles for settings
     */
    function appswiperslider_enqueue_frontend_inline_assets()
    {


        // Enqueue Main CSS
        wp_register_style(
            'app-swiper-slider-frontend-inline', // Unique handle for main css
            APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_URL . 'public/assets/css/app-swiper-slider-public.css',
            array(), // No dependencies
            APPSWIPERSLIDER_APP_SWIPER_SLIDER_VERSION,
            'all'
        );
        wp_enqueue_style('app-swiper-slider-frontend-inline');

        // Register the script with an empty source URL. This is a placeholder.
        wp_register_script('app-swiper-slider-frontend-inline', '', array('jquery', 'swiper-bundle.min-bundle'), APPSWIPERSLIDER_APP_SWIPER_SLIDER_VERSION, true);

        // Enqueue the registered script. This will allow us to add inline scripts to it.

        wp_enqueue_script('app-swiper-slider-frontend-inline');
        /**
         * Enqueue inline styles and scripts for settings API
         */
        $this->appswiperslider_app_swiper_slider_frontend_inline_styles();
        $this->appswiperslider_app_swiper_slider_frontend_inline_scripts();
    }

    /**
     * Enqueue inline styles for 
     */
    function appswiperslider_app_swiper_slider_frontend_inline_styles()
    {
        $nav_color = sanitize_hex_color($this->app_option('nav-color', 'app_screen_slider_other', '#f6435b'));
        $dots_color = sanitize_hex_color($this->app_option('dots-color', 'app_screen_slider_other', '#f6435b'));
        $dots_active_color = sanitize_hex_color($this->app_option('dots-hcolor', 'app_screen_slider_other', '#e92e47'));

        $inline_css = "
            .ass-app-swiper-slider .swiper-button-next,
  .ass-app-swiper-slider .swiper-button-prev {
      color: " . esc_attr($nav_color) . "; /* Customize arrow color */
  }
                   .ass-app-swiper-slider .swiper-pagination-bullet {
    transition: 0.4s;
    background-color: " . esc_attr($dots_color) . ";
    opacity: 1;
    outline: none;
  }
  
  .ass-app-swiper-slider .swiper-pagination-bullet-active {
    background: " . esc_attr($dots_active_color) . ";
    width: 50px;
    border-radius: 30px;
  }

 ";

        wp_add_inline_style('app-swiper-slider-frontend-inline', $inline_css);
    }

    /**
     * inline scripts for frontend
     */
    function appswiperslider_app_swiper_slider_frontend_inline_scripts()
    {

        // Retrieve options from the backend
        $app_stop_hover = $this->app_option('stop-onhover', 'app_basics', 'false') === 'true' ? true : false;
        $app_stop_loop = $this->app_option('loop', 'app_basics', 'true') === 'true' ? true : false;

        $app_auto_play_speed = intval($this->app_option('auto-play-speed', 'app_basics', 2000));
        $app_auto_play_timeout = intval($this->app_option('auto-play-timeout', 'app_basics', 1000));

        $app_cover_stretch = intval($this->app_option('cover-flow-stretch', 'app_basics', 80));
        $app_cover_depth = intval($this->app_option('cover-flow-depth', 'app_basics', 300));


        $app_auto_play = $this->app_option('auto-play', 'app_basics', 'true') === 'true' ? true : false;


        // Prepare JavaScript for Swiper.js
        $inline_js = "
            if (jQuery('.app-swiper-slider-active').length > 0) {
                var swiper = new Swiper('.app-swiper-slider-active', {
                    // Swiper configuration
                    autoplay: " . ($app_auto_play == 'true' ? wp_json_encode([
            'delay' => $app_auto_play_timeout,
            'disableOnInteraction' => false,
            'pauseOnMouseEnter' => $app_stop_hover,
        ]) : "false") . ",
                    speed: " . esc_js($app_auto_play_speed) . ",
                    loop: " . esc_js($app_stop_loop) . ",
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    effect: 'coverflow',
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    coverflowEffect: {
                        rotate: 0,
                        stretch: " . esc_js($app_cover_stretch) . ",
                        depth: " . esc_js($app_cover_depth) . ",
                        modifier: 1,
                        slideShadows: false,
                    }

                });
            }
        ";

        wp_add_inline_script('app-swiper-slider-frontend-inline', $inline_js);
    }



    /**
     * Adds a related posts carousel to the content of a single post.
     *
     * This method checks if the current post is singular and determines if the related
     * posts carousel should be displayed based on plugin settings. It appends the carousel
     * to the content if all conditions are met.
     *
     * @param string $content The original post content.
     *
     * @return string Modified content with the related posts carousel, or the original content.
     */
    public function appswiperslider_app_swiper_slider_shortcode_callback($atts)
    {

        // Sanitize attributes
        $atts = shortcode_atts(
            array(
                'posts_num' => '-1', // Display post per page
                'order' => 'DESC', // Default to date for DESC
                'orderby' => 'date',
                'screen_cat' => '',
                'title' => 'App Screen',
            ),
            $atts,
            'appswiperslider'
        );

        // Allowed values for orde and orderby 
        $allowed_orderby = ['random', 'date', 'title', 'ID', 'name'];
        $allowed_order = ['DESC', 'ASC'];

        // Custom option logic (default fallback options)
        $default_orderby = $this->app_option('order-by', 'app_basics', 'random');
        $default_orderby = in_array($default_orderby, $allowed_orderby, true) ? $allowed_orderby : 'random';

        $default_order = $this->app_option('order', 'app_basics', 'DESC');
        $default_order = in_array($default_order, $allowed_order, true) ? $default_order : 'DESC';

        // Use shortcode attributes or fallback to defaults 
        $orderby = in_array(sanitize_key($atts['orderby']), $allowed_orderby, true) ? $atts['orderby'] : $default_orderby;
        $order = in_array(sanitize_key($atts['order']), $allowed_order, true) ? $atts['order'] : $default_order;

        $args = array(
            'post_type' => 'app_mainscreen',
            'posts_per_page' => intval($atts['posts_num']),
            'orderby'        => $orderby === 'random' ? 'rand' : $orderby, // Convert 'random' to 'rand'
            'order'          => $order,
        );

        // Set up the Tax query with performance consideration
        if (!empty($atts['screen_cat'])) {
            $slug = sanitize_text_field($atts['screen_cat']); //Sanitize user input for safety

            // Optimize the tax_query with specific field and perator for taxonomy terms,
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'appswiperslider_cat',
                    'field' => 'slug',
                    'terms' => array($slug),
                    'operator' => 'IN',
                )
            );
        }
        // Retrieve options from the backend
        $app_show_nav = $this->app_option('nav-val', 'app_advanced', 'true') === 'true' ? true : false;
        $app_show_dots = $this->app_option('dots-val', 'app_advanced', 'true') === 'true' ? true : false;


        ob_start(); ?>


        <!-- Start App Screenshoot Area -->
        <section class="ass-app-swiper-slider">

            <!-- Swiper -->
            <div class="app-swiper-slider-active swiper-container">
                <div class="swiper-wrapper">

                    <?php
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) {
                            $query->the_post(); ?>
                            <div class="swiper-slide">
                                <div class="screenshots-image">
                                    <?php if (has_post_thumbnail()) {

                                        the_post_thumbnail('app-thumbnail-size', array('class' => 'img', 'alt' => get_the_title(), 'title' => get_the_title()));
                                    } else {
                                        echo '<p>No Thumbnail Available</p>';
                                    } ?>
                                </div>
                            </div>
                    <?php   }
                        wp_reset_postdata();
                    endif;
                    ?>
                    <!-- Add Pagination -->
                </div>
                <!-- Pagination -->
                <?php if ($app_show_dots == 1): ?>
                    <div class="swiper-pagination"></div>
                <?php endif; ?>
                <!-- Navigation Arrows -->
                <?php if ($app_show_nav == 1): ?>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                <?php endif; ?>
                <!-- Scrollbar -->

            </div>

        </section>
        <!-- End App Screenshoot Area -->


<?php

        $content = ob_get_clean();
        return $content;
    }
}
