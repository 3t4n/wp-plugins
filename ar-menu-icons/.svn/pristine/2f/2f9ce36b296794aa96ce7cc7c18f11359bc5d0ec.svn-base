<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

if ( ! class_exists( 'armicn_admin_settings' ) ) {

    class armicn_admin_settings {

        private $armicn_options;

        public function __construct() {   
            add_action( 'admin_menu', [ $this, 'armicn_register' ] );
            add_action( 'admin_init', [ $this, 'armicn_settings' ] );   
        }   
    
        // Register menu page
        public function armicn_register() {
            add_menu_page(
                __( 'AR Menu Icons', 'ar-menu-icons' ), 
                __( 'AR Menu Icons', 'ar-menu-icons' ), 
                'manage_options', 
                'armicn-global-settings', 
                [ $this, 'armicn_plugin_page' ], 
                'dashicons-list-view', 
                100
            );
        }

        // Register settings
        public function armicn_settings() {

            $settins_sanitize_args = array(
                'type' => 'array',
                'sanitize_callback' => [ $this, 'sanitize_armicn_options' ],
                'default' => null,
            );

            register_setting( 
                'armicn_options_group', 
                'armicn_options' ,
                $settins_sanitize_args
            );

            add_settings_section(
                'armicn_setting_section', 
                '', 
                [ $this, 'armicn_settings_section' ], 
                'armicn-menu-settings'
            );

            add_settings_field(
                'armicn_width', 
                __( 'Width', 'ar-menu-icons' ), 
                [ $this, 'armicn_render_menu_opts' ], 
                'armicn-menu-settings', 
                'armicn_setting_section'
            );
        }

        // Define the dynamic sanitization function
        public function sanitize_armicn_options($input) {
            
            $sanitized_options = array();
        
            foreach ($input as $key => $value) {
                if (is_numeric($value)) {
                    // Sanitize numeric values
                    $sanitized_options[$key] = absint($value); // Adjust as needed for floats, e.g., `floatval($value)`
                } elseif (is_string($value)) {
                    // Sanitize text values
                    $sanitized_options[$key] = sanitize_text_field($value);
                } elseif (is_array($value)) {
                    // Recursively sanitize arrays if needed
                    $sanitized_options[$key] = array_map('sanitize_text_field', $value);
                } else {
                    // Fallback sanitization
                    $sanitized_options[$key] = sanitize_text_field($value);
                }
            }
        
            return $sanitized_options;
        }

        // Define settings fields
        public function armicn_get_settings_fields() {
            return [
                'style_fields' => [
                    [
                        'id'    => 'icon_color',
                        'name'  => 'icon_color',
                        'type'  => 'wpcolor',
                        'label' => __( 'Color', 'ar-menu-icons' ),
                    ],
                    [
                        'id'    => 'icon_font_size',
                        'name'  => 'icon_font_size',
                        'type'  => 'text',
                        'label' => __( 'Size', 'ar-menu-icons' ),
                        'placeholder' => '14px',
                        'ex_text' => __( 'for ex: 14px', 'ar-menu-icons' ),
                    ],
                    [
                        'id'    => 'icon_margin',
                        'name'  => 'icon_margin',
                        'type'  => 'text',
                        'label' => __( 'Margin', 'ar-menu-icons' ),
                        'placeholder' => '0 5px 0 5px',
                        'ex_text' => __( 'for ex: 0 5px 0 5px', 'ar-menu-icons' ),
                    ],
                ]
            ];
        }

        // Render the plugin page
        public function armicn_plugin_page() {
            $this->armicn_options = get_option( 'armicn_options' );
            ?>
            <h1><?php esc_html_e( 'AR Menu Icon Settings', 'ar-menu-icons' ); ?></h1>
            <?php settings_errors(); ?>
            <div class="armicn-settings-tabs-container">
                <form method="POST" action="options.php">
                    <div class="tabs armicn-settings-tabs">
                        <ul id="tabs-nav">
                            <li class="active"><a href="#tab_menu_welcome"><?php esc_html_e( 'Welcome', 'ar-menu-icons' ); ?></a></li>
                            <li><a href="#tab_menu_styles"><?php esc_html_e( 'General options', 'ar-menu-icons' ); ?></a></li>
                            <li><a href="#tab_menu_features"><?php esc_html_e( 'Premium', 'ar-menu-icons' ); ?></a></li>
                        </ul>
                        <div class="tab-contents-wrapper">
                            <div id="tab_menu_welcome" class="tab-content">
                                <div class="tab-section">
                                    <h1><?php esc_html_e( 'Welcome to AR Menu Icons', 'ar-menu-icons' ); ?></h1>
                                    <p><?php esc_html_e( 'The **AR Menu Icons** plugin is a powerful tool for WordPress users, enabling you to easily add icons to your menu items. It supports a wide range of popular icon libraries, including DashIcon, FontAwesome, Elusive Icon, Elegant Icon, Generic Icon, Foundation Icon, Themify Icon, and Fontello. Additionally, you can also upload custom SVG or image icons, providing complete flexibility to enhance your site\'s navigation with beautiful icons. Perfect for adding a visual touch to menus, this plugin is both versatile and easy to use.', 'ar-menu-icons' ); ?></p>
                                </div>
                                <div class="tab-section">
                                    <h1><?php esc_html_e( 'Demo', 'ar-menu-icons' ); ?></h1>
                                    <p><?php esc_html_e( 'Thank you for choosing the **AR Menu Icons** plugin for WordPress! With this powerful tool, you can effortlessly enhance your website\'s navigation by adding icons to your menu items. 

                                        We invite you to explore our demo and test the premium features firsthand. The premium version unlocks even more advanced customization options, allowing you to create visually appealing and highly functional menus tailored to your site’s needs. Thank you again for choosing **AR Menu Icons**—enhancing your website\'s navigation has never been easier!', 'ar-menu-icons' ); ?></p>
                                    <a href="http://arsyntax.com/plugins/ar-menu-icons/demos" class="button-secondary"><?php esc_html_e( 'View Demos', 'ar-menu-icons' ); ?></a>
                                </div>
                                <div class="tab-section">
                                    <h1><?php esc_html_e( 'Support', 'ar-menu-icons' ); ?></h1>
                                    <p><?php esc_html_e( 'If you have any questions or encounter any issues, please don’t hesitate to reach out to us via our ticket system. You can also join our community to connect with other **AR Menu Icons** users, share experiences, and get insights on how to make the most of the plugin. We’re here to help!', 'ar-menu-icons' ); ?></p>
                                    <a href="http://arsyntax.com/contact" class="button-secondary"><?php esc_html_e( 'Submit ticket', 'ar-menu-icons' ); ?></a>
                                </div>
                            </div>
                            <div id="tab_menu_styles" class="tab-content" style="display: none;">
                                <?php 
                                    settings_fields( 'armicn_options_group' ); 
                                    do_settings_sections( 'armicn-menu-settings' ); 
                                ?>
                            </div>
                            <div id="tab_menu_features" class="tab-content" style="display: none;">
                            <div class="tab-header">
                                    <h1><?php esc_html_e( 'Premium', 'ar-menu-icons' ); ?></h1>
                                    <p>
                                        <?php esc_html_e( 'Unlock the capabilities of AR Menu Icons PRO, which allows you to use all icon libraries.
                                        Here is the compaire of our premium vs free features.', 'ar-menu-icons' ); 
                                        ?>
                                        
                                    </p>
                                    <div class="armicn-features-list-wrapper">
                                    <div class="armicn-features-list armicn-features-list-free">
                                        <h3><?php esc_html_e( 'Free Features', 'ar-menu-icons' ); ?></h3>
                                        <ul>
                                            <li><span class="dashicons dashicons-yes-alt"></span>DashIcon</li>
                                            <li><span class="dashicons dashicons-no-alt"></span>Fontawesome Icon</li>
                                            <li><span class="dashicons dashicons-no-alt"></span>Elusive Icon</li>
                                            <li><span class="dashicons dashicons-no-alt"></span>Elegant Icon</li>
                                            <li><span class="dashicons dashicons-no-alt"></span>Generic Icon</li>
                                            <li><span class="dashicons dashicons-no-alt"></span>Foundation Icon</li>
                                            <li><span class="dashicons dashicons-no-alt"></span>Themify Icon</li>
                                            <li><span class="dashicons dashicons-no-alt"></span>Fontello Icon</li>
                                            <li><span class="dashicons dashicons-no-alt"></span>SVG or Image Icon</li>
                                        </ul>
                                    </div>
                                    <div class="armicn-features-list armicn-features-list-free">
                                        <h3><?php esc_html_e( 'Premium Features', 'ar-menu-icons' ); ?></h3>
                                        <ul>
                                            <li><span class="dashicons dashicons-yes-alt"></span>DashIcon</li>
                                            <li><span class="dashicons dashicons-yes-alt"></span>Fontawesome Icon</li>
                                            <li><span class="dashicons dashicons-yes-alt"></span>Elusive Icon</li>
                                            <li><span class="dashicons dashicons-yes-alt"></span>Elegant Icon</li>
                                            <li><span class="dashicons dashicons-yes-alt"></span>Generic Icon</li>
                                            <li><span class="dashicons dashicons-yes-alt"></span>Foundation Icon</li>
                                            <li><span class="dashicons dashicons-yes-alt"></span>Themify Icon</li>
                                            <li><span class="dashicons dashicons-yes-alt"></span>Fontello Icon</li>
                                            <li><span class="dashicons dashicons-yes-alt"></span>SVG or Image Icon</li>
                                        </ul>
                                    </div>
                                </div>
                                    <a href="http://arsyntax.com/contact" class="button-primary">Purchase Now</a>
                                    <a href="http://arsyntax.com/plugins/ar-menu-icons/demos" class="button-secondary">View Demos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php submit_button(); ?>
                </form>
            </div>
            <?php
        }

        public function armicn_settings_section() { }

        public function armicn_render_menu_opts() {
            $armicn_settings_fields = $this->armicn_get_settings_fields();
            $armicn_item_icon_position = $this->armicn_options['icon_position'] ?? '';

            foreach ( $armicn_settings_fields['style_fields'] as $field ) {
                $value = $this->armicn_options[ $field['name'] ] ?? '';
                $placeholder = $field['placeholder'] ?? '';
                $ex_text = $field['ex_text'] ?? '';

                printf(
                    '<div class="settings-item">
                        <label>%s</label>
                        <input type="%s" name="armicn_options[%s]" value="%s" placeholder="%s" />
                        <span>%s</span>
                    </div>',
                    esc_html( $field['label'] ),
                    esc_html( $field['type'] ),
                    esc_attr( $field['name'] ),
                    esc_attr( $value ),
                    esc_attr( $placeholder ),
                    esc_html( $ex_text )
                );
            }
            ?>
            <div class="settings-item">
                <label><?php esc_html_e( 'Position', 'ar-menu-icons' ); ?></label>
                <select name="armicn_options[icon_position]" id="icon_position_select">
                    <option value=""><?php esc_html_e( 'Default', 'ar-menu-icons' ); ?></option>
                    <option value="left" <?php selected( $armicn_item_icon_position, 'left' ); ?>><?php esc_html_e( 'Left', 'ar-menu-icons' ); ?></option>
                    <option value="right" <?php selected( $armicn_item_icon_position, 'right' ); ?>><?php esc_html_e( 'Right', 'ar-menu-icons' ); ?></option>
                </select>
            </div>
            <?php
        }
    }

    new armicn_admin_settings();
}
