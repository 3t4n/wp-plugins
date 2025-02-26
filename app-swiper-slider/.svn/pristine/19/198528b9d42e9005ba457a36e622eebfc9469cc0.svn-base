<?php


if (!class_exists('Appswiperslider_App_Screen_Slider_Settings')):
    class Appswiperslider_App_Screen_Slider_Settings
    {


        private $settings_api;

        public function __construct()
        {
            $this->settings_api = new Appswiperslider_App_Screen_Slider_Settings_API();
            // add_action('admin_init', [$this, 'settings_admin_init']);
            // add_action('admin_menu', [$this, 'settings_admin_submenu_callback']);
        }


        public function settings_admin_init()
        {

            // Save settings 
            $this->settings_api->set_sections($this->get_settings_sections());
            $this->settings_api->set_fields($this->get_settings_fields());

            // Initialize settings 
            $this->settings_api->settings_admin_init();
        }

        public function admin_menu()
        {
            add_options_page(
                'edit.php?post_type=appswiperslider',
                'Settings API',
                'delete_posts',
                'settings_api_test',
                [$this, 'plugin_page']
            );
        }

        public function settings_admin_submenu_callback()
        {
            add_submenu_page(
                'edit.php?post_type=appswiperslider',
                'App Settings',
                'App Settings',
                'manage_options',
                'app-settings',
                [$this, 'plugin_page']
            );
        }

        public function get_settings_sections()
        {
            $sections = array(

                array(
                    'id' => 'app_basics',
                    'title' => __('Basic Settings', 'app-swiper-slider')
                ),
                array(
                    'id' => 'app_advanced',
                    'title' => __('Advanced Settings', 'app-swiper-slider')
                ),
                array(
                    'id' => 'app_screen_slider_other',
                    'title' => __('General Styeling', 'app-swiper-slider')
                ),
                array(
                    'id' => 'app_shortcodes',
                    'title' => __('Shortcodes', 'app-swiper-slider')
                )
            );

            return $sections;
        }

        /**
         * Return all the settings fields 
         * @return array settings fields
         */

        function get_settings_fields()
        {
            $settings_fields = array(

                'app_basics' => array(
                    array(
                        'name' => 'auto-play',
                        'label' => __('Auto Play', 'app-swiper-slider'),
                        'type' => 'radio',
                        'default' => 'false',
                        'options' => array(
                            'true' => 'Yes',
                            'false' => 'No'
                        )
                    ),
                    array(
                        'name'    => 'order-by',
                        'label'   => __('Order By', 'app-swiper-slider'),
                        'type'    => 'select',
                        'default' => 'date',
                        'options' => array(
                            'date'           => __('Date', 'app-swiper-slider'),
                            'rand'           => __('Random', 'app-swiper-slider'),
                            'title'          => __('Title', 'app-swiper-slider'),
                            'comment_count'  => __('Comment Count', 'app-swiper-slider'),
                            'modified'       => __('Last Modified', 'app-swiper-slider'),
                            'menu_order'     => __('Menu Order', 'app-swiper-slider'),
                        ),
                    ),

                    array(
                        'name'    => 'order',
                        'label'   => __('Order', 'app-swiper-slider'),
                        'type'    => 'select',
                        'default' => 'DESC',
                        'options' => array(
                            'ASC'  => __('Ascending', 'app-swiper-slider'),
                            'DESC' => __('Descending', 'app-swiper-slider'),
                        ),
                    ),
                    array(
                        'name' => 'cover-flow-stretch',
                        'label' => __('Add cover flow Stretch', 'app-swiper-slider'),
                        'type' => 'number',
                        'desc' => __('Set cover flow Effect Stretch', 'app-swiper-slider'),
                        'default' => '80',
                        'sanitize_callback' => 'intval'
                    ),
                    array(
                        'name' => 'cover-flow-depth',
                        'label' => __('Add cover flow Depth', 'app-swiper-slider'),
                        'type' => 'number',
                        'desc' => __('Set cover flow Effect Depth', 'app-swiper-slider'),
                        'default' => '300',
                        'sanitize_callback' => 'intval'
                    ),
                    array(
                        'name' => 'auto-play-timeout',
                        'label' => __('Auto Play Timeout', 'app-swiper-slider'),
                        'type' => 'number',
                        'desc' => __('Set timeout Speed', 'app-swiper-slider'),
                        'default' => '1000',
                        'sanitize_callback' => 'intval'
                    ),
                    array(
                        'name' => 'auto-play-speed',
                        'label' => __('Auto Play Speed', 'app-swiper-slider'),
                        'desc' => __('Set autoplay Speed', 'app-swiper-slider'),
                        'type' => 'text',
                        'default' => '2000',
                        'sanitize_callback' => 'intval'
                    ),


                    array(
                        'name' => 'stop-onhover',
                        'label' => __('Stop On Hover', 'app-swiper-slider'),
                        'type' => 'radio',
                        'default' => 'false',
                        'options' => array(
                            'true' => 'Yes',
                            'false' => 'No'
                        )
                    ),

                    array(
                        'name' => 'loop',
                        'label' => __('Carousel loop', 'app-swiper-slider'),
                        'type' => 'radio',
                        'default' => 'false',
                        'options' => array(
                            'true' => 'Yes',
                            'false' => 'No'
                        )
                    ),



                ),

                'app_advanced' => array(

                    array(
                        'name' => 'nav-val',
                        'label' => __('Show Navigation ', 'app-swiper-slider'),
                        'type' => 'radio',
                        'default' => 'true',
                        'options' => array(
                            'true' => 'Yes',
                            'false' => 'No'
                        )
                    ),

                    array(
                        'name' => 'dots-val',
                        'label' => __('Show Dots ', 'app-swiper-slider'),
                        'type' => 'radio',
                        'default' => 'true',
                        'options' => array(
                            'true' => 'Yes',
                            'false' => 'No'
                        )
                    ),
                    array(
                        'name' => 'app-crop-img',
                        'label' => __('Crop Logo Image', 'app-swiper-slider'),
                        'desc' => __(
                            'Crop logo Images, if they are in different sizes. It will resizes and crops Images automatically.',
                            'app-swiper-slider'
                        ),
                        'default' => 'no',
                        'type' => 'radio',
                        'options' => array(
                            'yes' => __('Yes', 'app-swiper-slider'),
                            'no' => __('No', 'app-swiper-slider')
                        )
                    ),
                    array(
                        'name' => 'appcrop-img-width',
                        'label' => __('Expected logo Image Cropping Width', 'app-swiper-slider'),
                        'type' => 'number',
                        'default' => '280',
                        'desc' => __('recomended size 160 .No need to add px', 'app-swiper-slider'),
                        'sanitize_callback' => 'intval'
                    ),
                    array(
                        'name' => 'app-crop-img-height',
                        'label' => __('Expected Logo Image Cropping height', 'app-swiper-slider'),
                        'type' => 'number',
                        'default' => '600',
                        'desc' => __('recomended size 90 .No need to add px', 'app-swiper-slider'),
                        'sanitize_callback' => 'intval'
                    ),



                ),
                'app_screen_slider_other' => array(

                    array(
                        'name' => 'nav-color',
                        'label' => __('Navigation Color', 'app-swiper-slider'),
                        'desc' => __('Change Navigation Color for all style', 'app-swiper-slider'),
                        'type' => 'color',
                        'default' => '#01dc58'
                    ),
                    array(
                        'name' => 'nav-hcolor',
                        'label' => __('Navigation Hover Color', 'app-swiper-slider'),
                        'desc' => __('Change Navigation hover Color for all style', 'app-swiper-slider'),
                        'type' => 'color',
                        'default' => '#0575e6'
                    ),
                    array(
                        'name' => 'dots-color',
                        'label' => __('Dots Color', 'app-swiper-slider'),
                        'desc' => __('Change Dots Color for all style', 'app-swiper-slider'),
                        'type' => 'color',
                        'default' => '#01dc58'
                    ),
                    array(
                        'name' => 'dots-hcolor',
                        'label' => __('Dots Hover Color', 'app-swiper-slider'),
                        'desc' => __('Change Dots Hover Color for all style', 'app-swiper-slider'),
                        'type' => 'color',
                        'default' => '#0575e6'
                    ),
                ),
                'app_shortcodes' => array(

                    array(
                        'name' => 'shortcode',
                        'label' => __('Shortcode:', 'app-swiper-slider'),
                        'type' => 'text',
                        'default' => '[appswiperslider]',
                        'desc' => __('Copy this shortcode and paste on page or post where you want to display Mobile app Screen.', 'app-swiper-slider'),
                        'sanitize_callback' => 'intval'
                    ),
                    array(
                        'name' => 'shortcode-php',
                        'label' => __('PHP Code:', 'app-swiper-slider'),
                        'type' => 'text',
                        'default' => '<?php echo do_shortcode("[appswiperslider]"); ?>',
                        'desc' => __('Copy this shortcode and paste on page or post where you want to display Mobile app Screen.Use PHP code to
your themes
file to display them.', 'app-swiper-slider'),
                        'sanitize_callback' => 'intval'
                    )



                ),
            );

            return $settings_fields;
        }

        function plugin_page()
        {
            echo '<div class="wrap-setting-app-wooslider">';
            echo '<div class="app-setting">';

            $this->settings_api->show_navigation();
            $this->settings_api->show_forms();

            echo '</div>';
?>
            <div class="app-info-wrap">


                <div class="app-info-box">
                    <h3 class="app-info-box-title">Hire Me For Custom Project</h1>
                        <p>

                            <?php
                            // Define the image URL from the plugin assets directory
                            $image_url = plugins_url('../../assets/img/me.png', __FILE__);

                            // Display image directly using the correct URL
                            echo '<img alt="Author" src="' . esc_url($image_url) . '" class="avatar avatar-100 photo" height="200" width="200">';
                            ?>



                        </p>
                        <p>
                            <a class="button button-primary" target="_blank" href="mailto:nababurdev@gmail.com">
                                <?php esc_html_e('Hire me', 'app-swiper-slider'); ?>
                            </a>
                            <a class="button button-primary" target="_blank" href="https://profiles.wordpress.org/nababurbd/">
                                <?php esc_html_e('Wordpress profile', 'app-swiper-slider'); ?>
                            </a>
                            <a class="button button-primary" target="_blank" href="https://www.linkedin.com/in/nababur/">
                                <?php esc_html_e('Linkedin', 'app-swiper-slider'); ?>
                            </a>
                            <a class="button button-secondary" target="_blank"
                                href="https://api.whatsapp.com/send?phone=8801717090233">
                                <?php esc_html_e('DM Whatsapp', 'app-swiper-slider'); ?>
                            </a>
                        </p>
                        <p>
                            <a target="_blank" href="https://nababur.com">My portfolio => www.nababur.com</a>
                        </p>


                </div>

                <div class="app-info-box">
                    <h3 class="app-info-box-title"> Social Networks </h1>
                        <ul class="pro-features">
                            <li><a class="" href="https://profiles.wordpress.org/nababurbd/" target="_blank">Wordpress</a>
                            </li>
                            <li><a class="" href="https://www.linkedin.com/in/nababur/" target="_blank">Linkedin</a>
                            </li>
                            <li><a class="" href="https://www.facebook.com/nababur/" target="_blank">Facebook</a>
                            </li>
                            <li><a class="" href="https://twitter.com/nababurbd" target="_blank">Twitter</a></li>
                            <li><a class="" href="https://www.youtube.com/@Codewithnababur" target="_blank">Youtube</a></li>
                        </ul>
                        <p>Thanks</p>
                </div>

            </div>

<?php
            echo '</div>';
        }

        /**
         * Get all the pages
         * @return array page names with key value pairs
         */

        function get_pages()
        {
            $pages = get_pages();
            $pages_options = array();
            if ($pages) {
                foreach ($pages as $page) {
                    $pages_options[$page->ID] = $page->post_title;
                }
            }

            return $pages_options;
        }
    }

endif;
