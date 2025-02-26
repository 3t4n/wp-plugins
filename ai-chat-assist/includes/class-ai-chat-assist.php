<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('ACACHAT_AiChatAssistAdmin')) {

    class ACACHAT_AiChatAssistAdmin
    {
        private $prefix;

        /**
         * Constructor method
         *
         * @param string $prefix The prefix of this plugin.
         *
         * @return void
         */
        public function __construct($prefix)
        {
            $this->prefix = $prefix;
            add_action("admin_menu", [$this, "acachat_add_settings_page"]);
            add_action("admin_init", [$this, "acachat_register_settings"]);
            add_action("wp_ajax_save_acachat_api_key", [$this, "acachat_save_api_key"]);
            add_action("admin_enqueue_scripts", [$this, "acachat_enqueue_scripts"]);
            add_action("wp_footer", [$this, "acachat_enqueue_footer_html_design"]);
            add_action("wp_enqueue_scripts", [$this, "acachat_enqueue_bot_scripts"]);
        }

        /**
         * Enqueue the footer script for the chatbot if the API key is set
         *
         * @return void
         */
        public function acachat_enqueue_bot_scripts()  {
            $acachat_api_key = get_option($this->prefix . '_api_key'); 
            if (!empty($acachat_api_key)) { 
                wp_enqueue_style(
                    'ai-assist-bot-styles', 
                    plugin_dir_url(__DIR__) . "assets/css/ai-assist-bot-style.css", 
                    [], 
                    '1.0.0', 
                    'all'
                );
                wp_enqueue_script(
                    'ai-assist-bot-script',
                    'https://cdn.jsdelivr.net/gh/Open-infotech/AiAssistJsLibForWeb@feature/version2.0/src/v1/7/bundle.js?key=' . urlencode($acachat_api_key),
                    [], 
                    '1.0.0', 
                    true
                );                
            } 

        }

        /**
         * Add the HTML tag to the footer of the page
         *
         * The ai-assist-bot tag is used by the JavaScript library to render the chatbot.
         * This function is hooked into the wp_footer action which is triggered by WordPress
         * in the footer of the page
         *
         * @return void
         */
        public function acachat_enqueue_footer_html_design() { 
            echo '<ai-assist-bot></ai-assist-bot>';
        }

        /**
         * Add the settings page for the plugin
         *
         * Uses the add_menu_page function to add a new admin menu page
         *
         * @return void
         */

        public function acachat_add_settings_page()
        {
            $icon_url = plugins_url("assets/images/logo.png", __DIR__);
            add_menu_page(
                "AI Chat Assist",
                "AI Chat Assist",
                "manage_options",
                $this->prefix . "-settings",
                [$this, "acachat_render_settings_page"],
                $icon_url
            );
        }

        /**
         * Render the settings page for the plugin
         *
         * This function will output the HTML for the settings page
         *
         * @return void
         */
    
        public function acachat_render_settings_page()
        {
            $image_url1 = plugin_dir_url(__DIR__) . 'assets/images/star1.png';
            $image_url3 = plugin_dir_url(__DIR__) . 'assets/images/star3.png';
            $image_url4 = plugin_dir_url(__DIR__) . 'assets/images/cloud1.png';
            $image_url5 = plugin_dir_url(__DIR__) . 'assets/images/navbar.png';
        
            ?>
            <div class="acachat_wrapper">
                <div class="background">
                    <!-- Output images using wp_get_attachment_image() -->
                    <img src="<?php echo esc_url($image_url1); ?>" class="star star1" />
                    <img src="<?php echo esc_url($image_url3); ?>" class="star star3" />
                    <img src="<?php echo esc_url($image_url4); ?>" class="cloud cloud1" />
                </div>
                <div class="navbar_image">
                    <img src="<?php echo esc_url($image_url5); ?>" class="acachat_wrapper_navbar" />
                </div>
                <div class="d-flex justify-content-start align-items-center" style="margin-left: 150px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="main">
                                    <div class="box">
                                        <form id="ai_chat_assist" method="post">
                                            <?php wp_nonce_field( "acachat_api_key_nonce", "acachat_api_key_nonce" ); ?>
                                            <div class="key">
                                                <h3><?php echo esc_html__( 'Setup Your Key', 'ai-chat-assist' ); ?></h3>
                                                <h5 class="api"><?php echo esc_html__( 'API Key:', 'ai-chat-assist' ); ?></h5>
                                                <div class="api-key">
                                                    ?
                                                    <span class="tooltiptext"><?php echo esc_html__( 'Enter Your API Key', 'ai-chat-assist' ); ?></span>
                                                </div>
                                                <input type="email" class="new" id="acachat_api_key" aria-describedby="emailHelp"
                                                    value="<?php echo esc_attr( get_option( $this->prefix . "_api_key" ) ); ?>" />
                                                <div class="btns">
                                                    <button class="btn save_changes" id="save_acachat_api_key" type="button"><?php echo esc_html__( 'Save Changes', 'ai-chat-assist' ); ?></button>
                                                </div>
                                            </div>
                                            <div id="response_message" style="margin-left: 50px"></div>
                                        </form>
        
                                    </div>
                                    <p class="para" style="font-size: 17px">
                                        <?php echo esc_html__( 'If you have not generated the API Key,', 'ai-chat-assist' ); ?> <a href="<?php echo esc_url(ACACHAT_CHAT_ASSIST_SITE_URL); ?>" target="_blank" class="click"><?php echo esc_html__( 'Click Here', 'ai-chat-assist' ); ?></a> <?php echo esc_html__( 'to generate the API Key.', 'ai-chat-assist' ); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        

        

        /**
         * Register settings for the options page
         *
         * @return void
         */
        public function acachat_register_settings()
        {
            register_setting($this->prefix . "_options", $this->prefix . "_options", [
                $this,
                "acachat_validate_options",
            ]);
            add_settings_section("acachat_api_settings", "", "", $this->prefix);
            add_settings_field(
                $this->prefix . "_api_key",
                "API Key :",
                [$this, "acachat_setting_api_key"],
                $this->prefix,
                "acachat_api_settings"
            );
        }

        /**
         * Validate the options for the settings page
         *
         * @param array $input The input values from the settings page
         *
         * @return array The validated and sanitized options
         */
        public function acachat_validate_options($input)
        {
            $newinput = [];
            if (isset($input["api_key"])) {
                $newinput["api_key"] = sanitize_text_field(trim($input["api_key"]) ); 
            } else {
                $newinput["api_key"] = ''; 
            }
        
            return $newinput;
        }
        
        

        /**
         * Renders the input field for the API key in the settings page.
         *
         * Retrieves the stored API key from the database and displays it
         * in a text input field with a tooltip for user guidance.
         */
        public function acachat_setting_api_key()
        {
            $acachat_api_key = get_option($this->prefix . "_api_key"); ?>
            <div class="acachat_tooltip">
                <div class="tooltip-icon">?</div>
                <?php
                        echo esc_html( "<input id='" . esc_attr($this->prefix . '_api_key') . "' name='" . esc_attr($this->prefix . '_api_key') . "' type='text' value='" . esc_attr($api_key) . "' />" );
                        settings_errors($this->prefix . "_api_key");
                        ?>
                <span class="acachat_tooltiptext"><?php echo esc_html__('Enter your API key here', 'ai-chat-assist'); ?></span>
            </div>
            <?php
        }

        /**
         * Enqueue styles and scripts for the admin interface.
         *
         * This function enqueues the necessary CSS and JavaScript files required
         * for the plugin's admin settings page. It includes jQuery, a custom
         * admin style, and a custom admin script. It also localizes a script
         * with the AJAX URL for use in JavaScript.
         */
        public function acachat_enqueue_scripts() {
            $screen = get_current_screen();
        
            if ($screen && $screen->id === "toplevel_page_acachat-settings") {
                wp_enqueue_style(
                    "chatassist-admin-style",
                    plugin_dir_url(__DIR__) . "assets/css/acachat-admin-style.css",
                    [],
                    "1.0.0"
                );
        
                wp_enqueue_script(
                    "chatassist-admin-script",
                    plugin_dir_url(__DIR__) . "assets/js/acachat-admin-script.js",
                    ["jquery"],
                    "1.0.0",
                    true
                );
        
                wp_enqueue_style(
                    "bootstrap-css",
                    plugin_dir_url(__DIR__) . "assets/css/bootstrap.min.css",
                    [],
                    "4.0.0"
                );
        
                wp_enqueue_script(
                    "bootstrap-js",
                    plugin_dir_url(__DIR__) . "assets/js/bootstrap.bundle.min.js",
                    ["jquery"],
                    "4.0.0", 
                    true
                );
        
                wp_localize_script("chatassist-admin-script", "chatAssist", [
                    "ajax_url" => admin_url("admin-ajax.php"),
                ]);
            }
        }
        
        

        /**
         * Validates a given API key by making a POST request to the ChatAssist
         * API. The request includes the current website URL and the path '/',
         * and the API key is passed as a query parameter. If the request is
         * successful (200 status code), the API key is valid.
         *
         * @param string $acachat_api_key The API key to validate.
         *
         * @return bool True if the API key is valid, false otherwise.
         */
        public function acachat_validate_api_key($acachat_api_key)
        {
            $response = wp_remote_get(
                ACACHAT_CHAT_ASSIST_API_URL . "?secret_key=" . $acachat_api_key,
                [
                    "method" => "POST",
                    "body" => [
                        "website" => preg_replace("/^https?:\/\//","", get_site_url()),
                        "path" => "/",
                    ],
                ]
            );

            if (is_wp_error($response)) {
                return false;
            }

            $http_code = wp_remote_retrieve_response_code($response);

            if ($http_code == 200) {
                return true;
            }

            return false;
        }

        /**
         * Save an API key for the plugin. This function is called via an AJAX request
         * and expects an 'api_key' parameter to be passed in the $_POST array. If the
         * API key is valid, it will be saved to the database and a JSON success message
         * will be returned. If the API key is invalid, a JSON error message will be
         * returned. If the user does not have permission to perform this action, a JSON
         * error message will be returned.
         *
         * @uses acachat_validate_api_key
         * @uses update_option
         * @uses wp_send_json_success
         * @uses wp_send_json_error
         * @uses wp_die
         */
    
        public function acachat_save_api_key()
        {
            $nonce = isset($_POST["acachat_api_key_nonce"])
                ? sanitize_text_field(wp_unslash($_POST["acachat_api_key_nonce"]))
                : "";

            if (
                empty($nonce) ||
                !wp_verify_nonce(
                    $nonce,
                    $this->prefix . "_api_key_nonce"
                )
            ) {
                wp_send_json_error(esc_html__("Nonce verification failed. Please try again.", 'ai-chat-assist'));
            }

            if (current_user_can("manage_options")) {
                if (isset($_POST["acachat_api_key"])) {
                    $acachat_api_key = sanitize_text_field(wp_unslash($_POST["acachat_api_key"]));
                    if ($this->acachat_validate_api_key($acachat_api_key)) {
                        update_option($this->prefix . "_api_key", $acachat_api_key);
                        wp_send_json_success(esc_html__("API Key saved successfully!", 'ai-chat-assist'));
                    } else {
                        wp_send_json_error(esc_html__("Your API key is invalid.", 'ai-chat-assist'));
                    }
                } else {
                    wp_send_json_error(esc_html__("API key not provided.", 'ai-chat-assist'));
                }
            } else {
                wp_send_json_error(
                    esc_html__("You do not have permission to perform this action.", 'ai-chat-assist')
                );
            }

            wp_die();
        }


    }

}

new ACACHAT_AiChatAssistAdmin("acachat");