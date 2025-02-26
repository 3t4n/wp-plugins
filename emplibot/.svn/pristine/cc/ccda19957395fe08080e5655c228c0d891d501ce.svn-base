<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Emplibot {
    private $emplibot_options;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'emplibot_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'emplibot_page_init' ) );
    }

    public function emplibot_add_plugin_page() {
        add_menu_page(
            'Emplibot', // page_title
            'Emplibot', // menu_title
            'manage_options', // capability
            'emplibot', // menu_slug
            array( $this, 'emplibot_create_admin_page' ), // function
            dirname(plugin_dir_url(__FILE__)) . '/' . 'assets/icon-menu-20x20.png', // icon_url
            8 // position
        );
    }

    public function emplibot_create_admin_page() {
        $this->emplibot_options = get_option( 'emplibot_options' ); ?>

        <div class="wrap">
            <h2 style="display: flex; align-items: center;">
                <img src="<?php echo esc_url(dirname(plugin_dir_url(__FILE__)) . '/' . 'assets/icon-128x128.png') ?>" 
                    alt="Icon" 
                    style="height: 64px; margin-right: 10px;">
                Emplibot
            </h2>
            <?php 
                $emplibot_options = get_option('emplibot_options');
                if (!is_array($emplibot_options) || (!array_key_exists('plugin_key', $emplibot_options) || strlen($emplibot_options['plugin_key']) == 0)) {
                    echo '<p>Create your account and get the plugin key at <a href="' . esc_url('https://emplibot.com') . '" target="_blank">Emplibot</a></p>';
                } else {
                    echo '<p>Visit the <a href="' . esc_url('https://app.emplibot.com') . '" target="_blank">Emplibot Dashboard</a></p>';
                }
            ?>
            <p></p>
            <?php settings_errors(); ?>

            <form method="post" action="options.php">
                <?php
                    settings_fields( 'emplibot_option_group' );
                    do_settings_sections( 'emplibot-admin' );
                    submit_button();
                ?>
            </form>
        </div>

        <?php 
    }

    public function emplibot_page_init() {
        register_setting(
            'emplibot_option_group', // option_group
            'emplibot_options', // option_name
            array( $this, 'emplibot_sanitize' ) // sanitize_callback
        );

        add_settings_section(
            'emplibot_setting_section', // id
            'Settings', // title
            array( $this, 'emplibot_section_info' ), // callback
            'emplibot-admin' // page
        );

        add_settings_field(
            'post_type', // id
            'Blog Post Datatype', // title
            array( $this, 'post_type_callback' ), // callback
            'emplibot-admin', // page
            'emplibot_setting_section' // section
        );

        add_settings_field(
            'plugin_key', // id
            'Plugin Key', // title
            array( $this, 'plugin_key_callback' ), // callback
            'emplibot-admin', // page
            'emplibot_setting_section' // section
        );
    }

    public function emplibot_sanitize($input) {
        $sanitary_values = array();
        if ( isset( $input['post_type'] ) ) {
            $sanitary_values['post_type'] = sanitize_key($input['post_type']);
        }

        if ( isset( $input['plugin_key'] ) ) {
            $plugin_key = trim($input['plugin_key']);

            if ( empty( $plugin_key ) ) {
                // Add error message if plugin key is empty
                add_settings_error(
                    'emplibot_plugin_key', // Setting slug
                    'emplibot_plugin_key_error', // Error code
                    'Plugin Key cannot be empty.', // Error message
                    'error' // Type of message
                );
                add_settings_error(
                    'emplibot_plugin_key', // Setting slug
                    'emplibot_plugin_key_error', // Error code
                    '<p>Create your account and get your plugin key at: <a href="https://emplibot.com" target="_blank">Emplibot</a></p>', // Error message
                    'error' // Type of message
                );
                // Do not save the empty key
                $emplibot_options = get_option('emplibot_options');
                if (is_array($emplibot_options) && array_key_exists('plugin_key', $emplibot_options)) {
                    $sanitary_values['plugin_key'] = $emplibot_options['plugin_key'];
                } else {
                    $sanitary_values['plugin_key'] = "";
                }
            } else {
                $sanitary_values['plugin_key'] = sanitize_text_field( $plugin_key );
            }
        }

        return $sanitary_values;
    }

    public function emplibot_section_info() {
        
    }


    public function post_type_callback() {
        ?> 
        <select name="emplibot_options[post_type]" id="post_type">
        <?php
            $post_types = get_post_types(array('public' => true), 'objects');
            $emplibot_options = get_option( 'emplibot_options' );
    
            if (is_array($emplibot_options)) {
                $blog_post_type = $emplibot_options['post_type'];
            } else {
                $blog_post_type = "";
            }
    
            foreach ($post_types as $post_type) {
                if ($post_type->name !== 'revision' && $post_type->name === $blog_post_type) {
                    echo '<option selected value="' . esc_attr($post_type->name) . '">' . esc_html($post_type->label) . '</option>';
                } else if($post_type->name !== 'revision') {
                    echo '<option value="' . esc_attr($post_type->name) . '">' . esc_html($post_type->label) . '</option>';
                }
            }
        ?>
        </select> 
        <?php
    }


    public function plugin_key_callback() {
        $emplibot_options = get_option( 'emplibot_options' );
        $plugin_key = (is_array($emplibot_options) && isset($emplibot_options['plugin_key'])) ? $emplibot_options['plugin_key'] : '';
        echo '<input type="text" name="emplibot_options[plugin_key]" value="' . esc_attr($plugin_key) . '" />';
    
    }
}
