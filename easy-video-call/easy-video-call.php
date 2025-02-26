<?php
/*
Plugin Name: Easy Video Call [GWE]
Plugin URI: https://getwebexperts.com/easy-video-call
Description: Easy Video Call is a simple plugin for making video call easily. To display the video call option simply add this [easy-video-call] shortcode inside your desired location.
Version: 2.0.0
Author: Get Web Experts
Author URI: https://getwebexperts.com/
Tags: video call, easy video call, agora, agora video call, group video call
Text Domain: easy-video-call
License: GPL v2 or later 
*/
function evc_activation_hook()
{
    // Save default settings or update settings upon activation
    $default_settings = array(
        'evc_video_wrapper_bg_color' => '#152238',
        'evc_button_bg_color' => '#152238',
        'evc_button_text_color' => '#fff',
        'evc_mik_camera_bg_color' => 'transparent',
        'evc_mik_camera_text_color' => '#fff',
        'evc_leave_call_bg_color' => '#EE4B2B',
        'evc_leave_call_text_color' => '#fff',
    );

    foreach ($default_settings as $setting => $value) {
        if (!get_option($setting)) {
            update_option($setting, $value);
        }
    }
}
register_activation_hook(__FILE__, "evc_activation_hook");

function evc_deactivation_hook()
{
}
register_deactivation_hook(__FILE__, "evc_deactivation_hook");

define("EVC_ASSETS_DIR", plugin_dir_url(__FILE__) . "assets/");
define("EVC_ASSETS_PUBLIC_DIR", plugin_dir_url(__FILE__) . "assets/public");
define("EVC_ASSETS_ADMIN_DIR", plugin_dir_url(__FILE__) . "assets/admin");
define('EVC_VERSION', time());


class easyVideoCall
{
    private $version;

    function __construct()
    {

        $this->version = time();

        add_action('plugins_loaded', array($this, 'load_textdomain'));
        add_action('wp_enqueue_scripts', array($this, 'load_front_assets'));
        add_action('admin_enqueue_scripts', array($this, 'load_admin_assets'));
    }

    function load_admin_assets($hook_suffix)
    {
        wp_enqueue_style('evc-admin-css', EVC_ASSETS_ADMIN_DIR . "/css/admin.css", null, $this->version);
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('evc-color-picker-js', plugins_url('evc-color-picker-script.js', __FILE__), array('wp-color-picker'), false, true);
    }

    function load_front_assets()
    {
        wp_enqueue_style('evc-main-css', EVC_ASSETS_PUBLIC_DIR . "/css/evcmain.css", null, $this->version);
        wp_enqueue_style('evc-all-fontawesome', EVC_ASSETS_PUBLIC_DIR . "/css/all.min.css", null, $this->version);
        wp_enqueue_style('evc-min-fontawesome', EVC_ASSETS_PUBLIC_DIR . "/css/fontawesome.min.css", null, $this->version);

        wp_enqueue_script('evc-agor-js', EVC_ASSETS_PUBLIC_DIR . "/js/AgoraRTC_N-4.7.3.js", null, $this->version, true);
        wp_enqueue_script('evc-main-js', EVC_ASSETS_PUBLIC_DIR . "/js/evcmain.js", null, $this->version, true);

        $evc_app_id = esc_attr(get_option("evc_app_id"));

        $evc_app_id_data = array(
            'name' => $evc_app_id
        );


        wp_localize_script('evc-main-js', 'evc_app_id', $evc_app_id_data);
    }


    function load_textdomain()
    {
        load_plugin_textdomain('easy-video-call', false, plugin_dir_url(__FILE__) . "/languages");
    }
}

new easyVideoCall();


//dynamic style of frontend

function evc_dynamic_style()
{
    //setting field get
    $evc_video_wrapper_bg_color = esc_attr(get_option('evc_video_wrapper_bg_color'));
    $evc_button_bg_color = esc_attr(get_option('evc_button_bg_color'));
    $evc_button_text_color = esc_attr(get_option('evc_button_text_color'));
    $evc_mik_camera_bg_color = esc_attr(get_option('evc_mik_camera_bg_color'));
    $evc_mik_camera_text_color = esc_attr(get_option('evc_mik_camera_text_color'));
    $evc_leave_call_bg_color = esc_attr(get_option('evc_leave_call_bg_color'));
    $evc_leave_call_text_color = esc_attr(get_option('evc_leave_call_text_color'));
?>
    <style>
        #evc-stream-wrapper {
            --evc-primary: <?php echo $evc_video_wrapper_bg_color === '' ? "#152238" : esc_attr($evc_video_wrapper_bg_color); ?>;
        }

        #evc-join-btn {
            --evc-primary: <?php echo $evc_button_bg_color === '' ? "#152238" : esc_attr($evc_button_bg_color); ?>;
            --evc-white: <?php echo $evc_button_text_color === '' ? "#fff" : esc_attr($evc_button_text_color); ?>;
        }

        .evc-video-call .fa,
        .evc-video-call .fa-solid {
            --evc-transparent: <?php echo $evc_mik_camera_bg_color === '' ? "transparent" : esc_attr($evc_mik_camera_bg_color); ?>;
            --evc-white: <?php echo $evc_mik_camera_text_color === '' ? "#fff" : esc_attr($evc_mik_camera_text_color); ?>;
        }

        #evc-leave-btn {
            --evc-red: <?php echo $evc_leave_call_bg_color === '' ? "#EE4B2B" : esc_attr($evc_leave_call_bg_color); ?>;
            --evc-white: <?php echo $evc_leave_call_text_color === '' ? "#fff" : esc_attr($evc_leave_call_text_color); ?>;
        }
    </style>
    <?php
}

add_action('wp_footer', 'evc_dynamic_style');

//Option Page Start
class evc_Settings_Page
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'evc_create_settings'));
        add_action('admin_init', array($this, 'evc_setup_sections'));
        add_action('admin_init', array($this, 'evc_setup_fields'));
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'evc_settings_link'));
    }

    public function evc_settings_link($links)
    {
        $newlink = sprintf("<a href='%s'>%s</a>", 'options-general.php?page=evc', __('Settings', 'evc'));
        $links[] = $newlink;
        return $links;
    }



    public function evc_create_settings()
    {
        $page_title = __('Easy Video Call', 'easy-video-call');
        $menu_title = __('Easy Video Call', 'easy-video-call');
        $capability = 'manage_options';
        $slug       = 'evc';
        $callback   = array($this, 'evc_settings_content');
        add_options_page($page_title, $menu_title, $capability, $slug, $callback);
    }

    public function evc_settings_content()
    { ?>
        <div class="wrap">
            <h1><?php echo __('Easy Video Call', 'easy-video-call'); ?></h1>
            <p><?php echo __('To get <b>App Id</b> you need to sign-up <a href="https://www.agora.io/">Agora.io</a>. Then login there > Go to dashboard > Left hand side you will get your App ID > Just copy it and then add this ID to setting page App ID field > Save it', 'easy-video-call') ?></p>
            <p><b><?php echo __('Where you want to display just use this short code [easy-video-call]', 'easy-video-call') ?></b></p>
            <form method="POST" action="options.php" class="evc_form">
                <?php
                settings_fields('evc');
                do_settings_sections('evc');
                submit_button();
                ?>
            </form>
        </div> <?php
            }

            public function evc_setup_sections()
            {
                add_settings_section('evc_section', 'Easy Video Call', array(), 'evc');
            }

            public function evc_setup_fields()
            {
                $fields = array(
                    array(
                        'label'       => __('App ID', 'evc'),
                        'id'          => 'evc_app_id',
                        'type'        => 'textarea',
                        'section'     => 'evc_section',
                        'placeholder' => __('App ID', 'evc'),
                    ),
                    array(
                        'label'       => __('Change Button Text', 'evc'),
                        'id'          => 'evc_button_text',
                        'type'        => 'textarea',
                        'section'     => 'evc_section',
                        'placeholder' => __('Button Text', 'evc'),
                        'desc'        => __('Default Button Text: Start Call'),
                    ),
                    array(
                        'label'       => __('Video Wrapper Background Color', 'evc'),
                        'id'          => 'evc_video_wrapper_bg_color',
                        'type'        => 'text',
                        'section'     => 'evc_section',
                        'desc'        => __('Default Video Wrapper Background Color: #152238'),
                    ),

                    array(
                        'label'       => __('Start Call Button Background Color', 'evc'),
                        'id'          => 'evc_button_bg_color',
                        'type'        => 'text',
                        'section'     => 'evc_section',
                        'desc'        => __('Default Start Call Button Background Color: #152238'),
                    ),

                    array(
                        'label'       => __('Start Call Button Text Color', 'evc'),
                        'id'          => 'evc_button_text_color',
                        'type'        => 'text',
                        'section'     => 'evc_section',
                        'desc'        => __('Default Start Call Button Text Color: #ffffff'),
                    ),

                    array(
                        'label'       => __('Mik & Camera Icon Background Color', 'evc'),
                        'id'          => 'evc_mik_camera_bg_color',
                        'type'        => 'text',
                        'section'     => 'evc_section',
                        'desc'        => __('Default Mik & Camera Icon Background Color: transparent'),
                    ),
                    array(
                        'label'       => __('Mik & Camera Icon Text Color', 'evc'),
                        'id'          => 'evc_mik_camera_text_color',
                        'type'        => 'text',
                        'section'     => 'evc_section',
                        'desc'        => __('Default Mik & Camera Icon Background Color: #fff'),
                    ),
                    array(
                        'label'       => __('Leave Call Icon Background Color', 'evc'),
                        'id'          => 'evc_leave_call_bg_color',
                        'type'        => 'text',
                        'section'     => 'evc_section',
                        'desc'        => __('Default Leave Call Icon Background Color: #EE4B2B'),
                    ),

                    array(
                        'label'       => __('Leave Call Icon Text Color', 'evc'),
                        'id'          => 'evc_leave_call_text_color',
                        'type'        => 'text',
                        'section'     => 'evc_section',
                        'desc'        => __('Default Leave Call Icon Text Color: #fff'),
                    ),


                );
                foreach ($fields as $field) {
                    add_settings_field($field['id'], $field['label'], array(
                        $this,
                        'evc_field_callback'
                    ), 'evc', $field['section'], $field);
                    register_setting('evc', $field['id']);
                }
            }
            public function evc_field_callback($field)
            {
                $value = get_option($field['id']);
                switch ($field['type']) {
                    case 'textarea':
                        printf(

                            '<textarea class="evc_setting_form_field" name="%1$s" id="%1$s" placeholder="%2$s">%3$s</textarea>',
                            $field['id'],
                            isset($field['placeholder']) ? $field['placeholder'] : '',
                            $value
                        );
                        break;
                    default:
                        printf(
                            '<input class="my-color-field evc_setting_form_field" name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s"/>',
                            $field['id'],
                            $field['type'],
                            isset($field['placeholder']) ? $field['placeholder'] : '',
                            $value
                        );
                        break;
                }
                if (isset($field['desc'])) {
                    if ($desc = $field['desc']) {
                        printf('<p class="description">%s </p>', $desc);
                    }
                }
            }
        }
        new evc_Settings_Page();
        //Option Page End



        //Shortcode
        function evc_videocall_shortcode($attr, $content = null)
        {
            ob_start();
            $evc_button_text = esc_attr(get_option('evc_button_text'));
                ?>
    <div class="evc-video-call">
        <button id="evc-join-btn"><?php echo $evc_button_text === "" ? "Start Call" : $evc_button_text;
                                    ?></button>
        <div id="evc-stream-wrapper">
            <div id="evc-video-streams"></div>
            <div id="evc-stream-controls">
                <i class="fa-solid fa-xmark" id="evc-leave-btn"></i>
                <i class="fa fa-microphone" id="evc-mic-btn" aria-hidden="true"></i>
                <i class="fa fa-video-camera" id="evc-camera-btn" aria-hidden="true"></i>
            </div>
        </div>
    </div>
<?php
            return ob_get_clean();
        }
        add_shortcode("easy-video-call", "evc_videocall_shortcode");
