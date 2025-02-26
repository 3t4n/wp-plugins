<?php

if ( ! class_exists( 'About_Author_Box_Settings' ) ) {

    /**
     * Create an admin page and define the settings
     * Uses the About_Author_Box_Settings_API closs
     *
     * @since 1.0.0
     */
    class About_Author_Box_Settings {

        private $settings_api;

        /**
         * Constructor
         *
         * @since 1.0.0
         */
        function __construct() {

            // instance of the settings API
            $this->settings_api = new About_Author_Box_Settings_API;

            // add the admin page
            add_action( 'admin_menu', array( $this, 'add_admin_page' ) );

            // pass the section and settings data to the API class
            add_action( 'admin_init', array( $this, 'admin_init' ), 9 );

            // custom welcome page
            add_action( 'about_author_box_settings_api_display_about_author_box_general_settings_section', array( $this, 'display_welcome_page' ) );

            // plugin action links
            add_filter( 'plugin_action_links', array( $this, 'plugin_action_links' ), 10, 2 );

        }

        /**
         * Pass the sectiona and settings data to the API class
         *
         * @since 1.0.0
         */
        function admin_init() {

            $this->settings_api->set_sections( $this->get_sections() );
            $this->settings_api->set_fields( $this->get_fields() );

        }

        /**
         * Define sections
         *
         * @since 1.0.0
         */
        public static function get_sections() {

            // array of sections
            $sections = array(
                array(
                    'id' => 'about_author_box_general_settings_section',
                    'title' => esc_html__( 'Welcome', 'about-author-box' ),
                    'parent' => 'about_author_box',
                    'page' => 'about_author_box_general_settings_page',
                    'option' => 'about_author_box_general_settings',
                    'display' => false,
                ),
                array(
                    'id' => 'about_author_box_before_content_settings_section',
                    'title' => esc_html__( 'Before Content', 'about-author-box' ),
                    'parent' => 'about_author_box',
                    'page' => 'about_author_box_before_content_settings_page',
                    'option' => 'about_author_box_before_content_settings',
                ),
                array(
                    'id' => 'about_author_box_after_content_settings_section',
                    'title' => esc_html__( 'After Content', 'about-author-box' ),
                    'parent' => 'about_author_box',
                    'page' => 'about_author_box_after_content_settings_page',
                    'option' => 'about_author_box_after_content_settings',
                ),
                array(
                    'id' => 'about_author_box_shortcode_settings_section',
                    'title' => esc_html__( 'Shortcode', 'about-author-box' ),
                    'parent' => 'about_author_box',
                    'page' => 'about_author_box_shortcode_settings_page',
                    'option' => 'about_author_box_shortcode_settings',
                ),
            );

            // pass it back
            return $sections;

        }

        /**
         * Define fields
         *
         * @since 1.0.0
         */
        public static function get_fields() {

            // start with an empty array which we populate below
            $fields = array();

            // general settings
            $fields['about_author_box_general_settings_section'] = array(

            );

            // before content settings
            $fields['about_author_box_before_content_settings_section'] = array(
                array(
                    'id' => 'enabled',
                    'title' => esc_html__( 'Enable/Disable', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the author box show before the content.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Enabled', 'about-author-box' ),
                        '0' => esc_html__( 'Disabled', 'about-author-box' ),
                    ),
                    'default' => '0',
                ),
                array(
                    'id' => 'avatar',
                    'title' => esc_html__( 'Avatar', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the user avatar show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'avatar_size',
                    'title' => esc_html__( 'Avatar Size', 'about-author-box' ),
                    'descr' => esc_html__( 'Which size should the avatar be ( in pixels ).', 'about-author-box' ),
                    'type' => 'number',
                    'default' => '25',
                ),
                array(
                    'id' => 'avatar_style',
                    'title' => esc_html__( 'Avatar Style', 'about-author-box' ),
                    'descr' => esc_html__( 'What style should the avatar be.', 'about-author-box' ),
                    'type' => 'select',
                    'choices' => array(
                        'square' => esc_html__( 'Square', 'about-author-box' ),
                        'rounded' => esc_html__( 'Rounded', 'about-author-box' ),
                        'circle' => esc_html__( 'Circle', 'about-author-box' ),
                    ),
                    'default' => 'circle',
                ),
                array(
                    'id' => 'avatar_position',
                    'title' => esc_html__( 'Avatar Position', 'about-author-box' ),
                    'descr' => esc_html__( 'Where should the avatar be positioned.', 'about-author-box' ),
                    'type' => 'select',
                    'page' => 'about-author-after-post-content',
                    'section' => 'about_author_box_about-author-after-post-content_section',
                    'choices' => array(
                        'left' => esc_html__( 'Left', 'about-author-box' ),
                        'right' => esc_html__( 'Right', 'about-author-box' ),
                    ),
                    'default' => 'left',
                ),
                array(
                    'id' => 'name',
                    'title' => esc_html__( 'Name', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the name show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'date',
                    'title' => esc_html__( 'Date', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the post publish date show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'bio',
                    'title' => esc_html__( 'Bio', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the user bio (description) show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '0',
                ),
                array(
                    'id' => 'social',
                    'title' => esc_html__( 'Social Links', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the social links show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '0',
                ),
                array(
                    'id' => 'style_border',
                    'title' => esc_html__( 'Style - Border', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the author box be wrapped in a border.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        'none' => esc_html__( 'None', 'about-author-box' ),
                        'full' => esc_html__( 'Full', 'about-author-box' ),
                        'horizontal' => esc_html__( 'Horizontal', 'about-author-box' ),
                    ),
                    'default' => 'none',
                ),
            );

            // after content settings
            $fields['about_author_box_after_content_settings_section'] = array(
                array(
                    'id' => 'enabled',
                    'title' => esc_html__( 'Enable/Disable', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the author box show after the content.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Enabled', 'about-author-box' ),
                        '0' => esc_html__( 'Disabled', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'avatar',
                    'title' => esc_html__( 'Avatar', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the user avatar show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'avatar_size',
                    'title' => esc_html__( 'Avatar Size', 'about-author-box' ),
                    'descr' => esc_html__( 'Which size should the avatar be ( in pixels ).', 'about-author-box' ),
                    'type' => 'number',
                    'default' => '120',
                ),
                array(
                    'id' => 'avatar_style',
                    'title' => esc_html__( 'Avatar Style', 'about-author-box' ),
                    'descr' => esc_html__( 'What style should the avatar be.', 'about-author-box' ),
                    'type' => 'select',
                    'choices' => array(
                        'square' => esc_html__( 'Square', 'about-author-box' ),
                        'rounded' => esc_html__( 'Rounded', 'about-author-box' ),
                        'circle' => esc_html__( 'Circle', 'about-author-box' ),
                    ),
                    'default' => 'square',
                ),
                array(
                    'id' => 'avatar_position',
                    'title' => esc_html__( 'Avatar Position', 'about-author-box' ),
                    'descr' => esc_html__( 'Where should the avatar be positioned.', 'about-author-box' ),
                    'type' => 'select',
                    'page' => 'about-author-after-post-content',
                    'section' => 'about_author_box_about-author-after-post-content_section',
                    'choices' => array(
                        'left' => esc_html__( 'Left', 'about-author-box' ),
                        'right' => esc_html__( 'Right', 'about-author-box' ),
                    ),
                    'default' => 'left',
                ),
                array(
                    'id' => 'name',
                    'title' => esc_html__( 'Name', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the name show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'date',
                    'title' => esc_html__( 'Date', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the post publish date show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'bio',
                    'title' => esc_html__( 'Bio', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the user bio (description) show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'social',
                    'title' => esc_html__( 'Social Links', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the social links show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'style_border',
                    'title' => esc_html__( 'Style - Border', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the author box be wrapped in a border.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        'none' => esc_html__( 'None', 'about-author-box' ),
                        'full' => esc_html__( 'Full', 'about-author-box' ),
                        'horizontal' => esc_html__( 'Horizontal', 'about-author-box' ),
                    ),
                    'default' => 'none',
                ),
            );

             // after content settings
             $fields['about_author_box_shortcode_settings_section'] = array(
                array(
                    'id' => 'enabled',
                    'title' => esc_html__( 'Enable/Disable', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the author box show when the shortcode is called.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Enabled', 'about-author-box' ),
                        '0' => esc_html__( 'Disabled', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'avatar',
                    'title' => esc_html__( 'Avatar', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the user avatar show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'avatar_size',
                    'title' => esc_html__( 'Avatar Size', 'about-author-box' ),
                    'descr' => esc_html__( 'Which size should the avatar be ( in pixels ).', 'about-author-box' ),
                    'type' => 'number',
                    'default' => '120',
                ),
                array(
                    'id' => 'avatar_style',
                    'title' => esc_html__( 'Avatar Style', 'about-author-box' ),
                    'descr' => esc_html__( 'What style should the avatar be.', 'about-author-box' ),
                    'type' => 'select',
                    'choices' => array(
                        'square' => esc_html__( 'Square', 'about-author-box' ),
                        'rounded' => esc_html__( 'Rounded', 'about-author-box' ),
                        'circle' => esc_html__( 'Circle', 'about-author-box' ),
                    ),
                    'default' => 'square',
                ),
                array(
                    'id' => 'avatar_position',
                    'title' => esc_html__( 'Avatar Position', 'about-author-box' ),
                    'descr' => esc_html__( 'Where should the avatar be positioned.', 'about-author-box' ),
                    'type' => 'select',
                    'page' => 'about-author-after-post-content',
                    'section' => 'about_author_box_about-author-after-post-content_section',
                    'choices' => array(
                        'left' => esc_html__( 'Left', 'about-author-box' ),
                        'right' => esc_html__( 'Right', 'about-author-box' ),
                    ),
                    'default' => 'left',
                ),
                array(
                    'id' => 'name',
                    'title' => esc_html__( 'Name', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the name show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'date',
                    'title' => esc_html__( 'Date', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the post publish date show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'bio',
                    'title' => esc_html__( 'Bio', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the user bio (description) show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'social',
                    'title' => esc_html__( 'Social Links', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the social links show.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        '1' => esc_html__( 'Show', 'about-author-box' ),
                        '0' => esc_html__( 'Hide', 'about-author-box' ),
                    ),
                    'default' => '1',
                ),
                array(
                    'id' => 'style_border',
                    'title' => esc_html__( 'Style - Border', 'about-author-box' ),
                    'descr' => esc_html__( 'Should the author box be wrapped in a border.', 'about-author-box' ),
                    'type' => 'radio',
                    'choices' => array(
                        'none' => esc_html__( 'None', 'about-author-box' ),
                        'full' => esc_html__( 'Full', 'about-author-box' ),
                        'horizontal' => esc_html__( 'Horizontal', 'about-author-box' ),
                    ),
                    'default' => 'none',
                ),
            );

            // pass it back
            return $fields;

        }

        /**
         * Add the admin page
         *
         * @since 1.0.0
         */
        function add_admin_page() {

            $parent = 'options-general.php';
            $page_title = esc_html__( 'Author Box', 'about-author-box' );
            $menu_title = esc_html__( 'Author Box', 'about-author-box' );
            $capability = 'manage_options';
            $slug = 'about_author_box';
            $function = array( $this, 'display_admin_page' );

            add_submenu_page(
                $parent,
                $page_title,
                $menu_title,
                $capability,
                $slug,
                $function
            );

        }

        /**
         * Display the admin page
         *
         * @since 1.0.0
         */
        function display_admin_page() {

            ?>
            <div class="wrap">
                <?php
                    $this->settings_api->display_navigation();
                    $this->settings_api->display_content();
                ?>
            </div>
            <?php

        }

        /**
         * Display welcome page
         *
         * @since 1.0.0
         */
        function display_welcome_page() {
            ?>
            <style type="text/css">
                .about-author-box-columns {
                    overflow: hidden;
                    margin-top: 20px;
                    max-width: 800px;
                }
                    .about-author-box-column {
                        margin-bottom: 20px;
                        width: 48%;
                        margin-right: 4%;
                        float: left;
                    }
                    .about-author-box-column-full {
                        clear: both;
                        margin-bottom: 20px;
                        width: 100%;
                    }
                    .about-author-box-column:nth-child(2n) {
                        margin-right: 0;
                    }
                    .about-author-box-column:nth-child(2n+1) {
                        clear: both;
                    }
                        .about-author-box-column-inner {
                            padding: 20px;
                            background: #fff;
                            border: 1px solid rgba( 0, 0, 0, 0.1 );
                        }
                            .about-author-box-column h2 {
                                margin-top: 0;
                            }
                            .about-author-box-column h3 {
                                margin-top: 0;
                                font-size: 14px;
                            }
                            .about-author-box-column ul {
                                list-style-type: disc;
                                list-style-position: inside;
                            }
            </style>

            <div class="about-author-box-columns">

                <div class="about-author-box-column">
                    <div class="about-author-box-column-inner">
                        <h2><?php esc_html_e( 'Welcome to About Author Box', 'about-author-box' ); ?></h2>
                        <p><?php echo wp_kses(
                            __( 'At the top you will see a tabbed navigation area.<br>That\'s where you can change settings for the author boxes that show before the content, after the post content and when called with a shortcode.', 'about-author-box' ),
                            array(
                                'br' => array(),
                            )
                        ); ?></p>
                        <h3><?php esc_html_e( 'Issues & Suggestions', 'about-author-box' ); ?></h3>
                        <p><?php echo wp_kses(
                            __( 'If you run into any issues or have suggestion on how to improve the plugin please do let us know on the plugin\'s <a target="_blank" href="https://wordpress.org/support/plugin/about-author-box/">support page</a>.', 'about-author-box' ),
                            array(
                                'a' => array(
                                    'target' => array(),
                                    'href'   => array(),
                                ),
                            )
                        ); ?></p>
                    </div><!-- .about-author-box-column-inner -->
                </div><!-- .about-author-box-column -->

                <div class="about-author-box-column">
                    <div class="about-author-box-column-inner">

                        <p style="margin:0;"><a href="https://www.wpkube.com" rel="nofollow" target="_blank"><img src="<?php echo esc_url( ABOUT_AUTHOR_BOX_URL ); ?>/images/author-logo.png" /></a></p>
                        <p>This plugin is maintained by <a href="https://www.wpkube.com" rel="nofollow" target="_blank">WPKube</a>, a WordPress resource site where you can find helpful guides like how to <a href="https://www.wpkube.com/list-building-wordpress-plugins/" rel="nofollow" target="_blank">choose the right list building plugin</a>, <a href="https://www.wpkube.com/install-wordpress" rel="nofollow" target="_blank">how to install WordPress</a>, <a href="https://www.wpkube.com/best-wordpress-hosting/" rel="nofollow" target="_blank">choose the best WordPress hosting</a>, and more. </p>
                        <p>They also have a huge collection of <a href="https://www.wpkube.com/coupons/" rel="nofollow" target="_blank">exclusive deals</a> on various plugins and hosting services such as <a href="https://www.wpkube.com/coupons/wpengine-coupon/" rel="nofollow" target="_blank">WPEngine</a>, <a href="https://www.wpkube.com/coupons/siteground-coupon/" rel="nofollow" target="_blank">SiteGround</a>, etc.</p>
                    </div><!-- .about-author-box-column-inner -->
                </div><!-- .about-author-box-column -->

                <div class="about-author-box-column-full">
                    <div class="about-author-box-column-inner">

                        <h2><?php esc_html_e( 'Shortcode', 'about-author-box' ); ?></h2>

                        <p><?php echo wp_kses(
                            __( 'Aside of the automatic display <strong>before post content</strong> and <strong>after post content</strong> you can also use a shortcode to display an author box. The shortcode is <code>[about_author_box]</code>', 'about-author-box' ),
                            array(
                                'strong' => array(),
                                'code'   => array(),
                            )
                        ); ?></p>

                        <p><?php esc_html_e( 'You can change the default settings for the shortcode in the "Shortcode" ( top menu ). You can also pass parameters as part of the shortcode which overwrite those settings.', 'about-author-box' ); ?></p>

                        <p><strong><?php esc_html_e( 'Accepted parameters are:', 'about-author-box' ); ?></strong></p>

                        <ul>
                            <li><?php esc_html_e( 'avatar ( 1 or 0, 1 to show 0 to hide )', 'about-author-box' ); ?></li>
                            <li><?php esc_html_e( 'avatar_size ( numeric value, default 120 )', 'about-author-box' ); ?></li>
                            <li><?php esc_html_e( 'avatar_style ( square/rounded/circle )', 'about-author-box' ); ?></li>
                            <li><?php esc_html_e( 'avatar_position ( left/right )', 'about-author-box' ); ?></li>
                            <li><?php esc_html_e( 'name ( 1 or 0, 1 to show 0 to hide ))', 'about-author-box' ); ?></li>
                            <li><?php esc_html_e( 'date ( 1 or 0, 1 to show 0 to hide )', 'about-author-box' ); ?></li>
                            <li><?php esc_html_e( 'bio ( 1 or 0, 1 to show 0 to hide )', 'about-author-box' ); ?></li>
                            <li><?php esc_html_e( 'social  ( 1 or 0, 1 to show 0 to hide )', 'about-author-box' ); ?></li>
                            <li><?php esc_html_e( 'style_border ( none/horizontal/full )', 'about-author-box' ); ?></li>
                        </ul>

                        <p><?php esc_html_e( 'Example usage:', 'about-author-box' ); ?></p>

                        <p><code>[about_author_box avatar_size="90" bio="no" style_border="horizontal"]</code></p>

                    </div><!-- .about-author-box-column-inner -->
                </div><!-- .about-author-box-column -->

            </div><!-- .about-author-box-columns -->
            <?php
        }

        /**
         * Plugins row action links
         *
         * @since 1.0.0
         */
        function plugin_action_links( $links, $file ) {

            if ( $file == 'about-author-box/about-author-box.php' ) {
                $settings_link = '<a href="' . admin_url( 'options-general.php?page=about_author_box' ) . '">' . esc_html__( 'Settings', 'about-author-box' ) . '</a>';
                array_unshift( $links, $settings_link );
            }

            return $links;

        }

    }

}

new About_Author_Box_Settings();

/**
 * Get options
 *
 * @since 1.0.0
 */
function about_author_box_get_option( $option_id = false ) {

    // all settings data
    $fields = About_Author_Box_Settings::get_fields();
    $sections = About_Author_Box_Settings::get_sections();

    // get section ID
    $section_id = false;
    foreach ( $sections as $section ) {
        if ( $section['option'] == $option_id ) {
            $section_id = $section['id'];
        }
    }

    // no section ID, go back
    if ( ! $section_id ) {
        return false;
    }

    // generate defaults
    $defaults = array();
    foreach ( $fields[$section_id] as $field ) {
        if ( isset( $field['default'] ) ) {
            $defaults[$field['id']] = $field['default'];
        } else {
            $defaults[$field['id']] = '';
        }
    }

    // user defined
	$user_defined = get_option( $option_id, array() );

	// combine
	$option = array_merge( $defaults, $user_defined );

	// pass it back
	return $option;

}
