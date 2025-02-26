<?php

if (!defined('ABSPATH')) {
    exit();
}

class AvatarsEffectsOptions {

    public $avatarResizingEnambe;
    public $avatarWidth;
    public $avatarHeight;
    public $avatarBorderStylingEnambe;
    public $borderWidth;
    public $borderRadiusTopLeft;
    public $borderRadiusTopRight;
    public $borderRadiusBottomRight;
    public $borderRadiusBottomLeft;
    public $borderStyle;
    public $borderColor;
    public $avatarZoomEnable;
    public $avatarZoomSize;
    public $avatarShadowEnable;
    public $shadowXOffset;
    public $shadowYOffset;
    public $shadowBlur;
    public $shadowSpreed;
    public $shadowColor;
    public $avatarRotation;
    public $avatarRotateX;
    public $avatarRotateY;
    public $avatarRotateZ;
    public $enableAvatarCustomStyling;
    public $avatarContainerClasses;
    public $avatarCustomCss;
    public $pluginVersion;
    public static $OPTION_NAME = 'avatars_effects_options';

    public function __construct() {
        add_option(self::$OPTION_NAME, $this->defaultOptions());
        add_action('admin_post_save_aveff_options', array(&$this, 'saveOptions'));
        $this->initOptions();
    }

    /*
     * drawing the settings form
     */

    public function drawSettingsForm() {
        include_once 'html-options.php';
    }

    /**
     * Set default options
     */
    public function defaultOptions() {
        $default_options = array(
            "enable_avatar_resizing" => 0,
            "aveff_avatar_width" => '',
            "aveff_avatar_height" => '',
            "enable_avatar_border_styling" => 1,
            "aveff_border_width" => 3,
            "aveff_border_radius_top_left" => 30,
            "aveff_border_radius_top_right" => 30,
            "aveff_border_radius_bottom_right" => 30,
            "aveff_border_radius_bottom_left" => 30,
            "aveff_border_style" => "inset",
            "aveff_border_color" => "#1bba23",
            "enable_avatar_zoom" => 1,
            "avatar_zoom_size" => 1.4,
            "enable_avatar_shadow" => 1,
            "aveff_shadow_x_offset" => 0,
            "aveff_shadow_y_offset" => 5,
            "aveff_shadow_blur" => 16,
            "aveff_shadow_spreed" => -2,
            "aveff_shadow_color" => "#151216",
            "enable_avatar_rotation" => 0,
            "aveff_rotate_x" => 0,
            "aveff_rotate_y" => 0,
            "aveff_rotate_z" => 0,
            "enable_avatar_custom_styling" => 0,
            "avatar_container_classes" => "",
            "avatar_custom_css" => ""
        );
        return $default_options;
    }

    private function initOptions() {
        $defaultOptins = $this->defaultOptions();
        $savedOptions = get_option(self::$OPTION_NAME, array());
        $options = wp_parse_args($savedOptions, $defaultOptins);
        $this->avatarResizingEnambe = $options['enable_avatar_resizing'];
        $this->avatarWidth = $options['aveff_avatar_width'];
        $this->avatarHeight = $options['aveff_avatar_height'];
        $this->avatarBorderStylingEnambe = $options['enable_avatar_border_styling'];
        $this->borderWidth = $options['aveff_border_width'];
        $this->borderRadiusTopLeft = $options['aveff_border_radius_top_left'];
        $this->borderRadiusTopRight = $options['aveff_border_radius_top_right'];
        $this->borderRadiusBottomRight = $options['aveff_border_radius_bottom_right'];
        $this->borderRadiusBottomLeft = $options['aveff_border_radius_bottom_left'];
        $this->borderStyle = $options['aveff_border_style'];
        $this->borderColor = $options['aveff_border_color'];
        $this->avatarZoomEnable = $options['enable_avatar_zoom'];
        $this->avatarZoomSize = $options['avatar_zoom_size'];
        $this->avatarShadowEnable = $options['enable_avatar_shadow'];
        $this->shadowXOffset = $options['aveff_shadow_x_offset'];
        $this->shadowYOffset = $options['aveff_shadow_y_offset'];
        $this->shadowBlur = $options['aveff_shadow_blur'];
        $this->shadowSpreed = $options['aveff_shadow_spreed'];
        $this->shadowColor = $options['aveff_shadow_color'];
        $this->avatarRotation = $options['enable_avatar_rotation'];
        $this->avatarRotateX = $options['aveff_rotate_x'];
        $this->avatarRotateY = $options['aveff_rotate_y'];
        $this->avatarRotateZ = $options['aveff_rotate_z'];
        $this->enableAvatarCustomStyling = $options['enable_avatar_custom_styling'];
        $this->avatarContainerClasses = $options['avatar_container_classes'];
        $this->avatarCustomCss = $options['avatar_custom_css'];
    }

    public function saveOptions() {
        if (function_exists('current_user_can') && !current_user_can('manage_options') && !wp_verify_nonce(filter_input(INPUT_POST, 'aveffe_option_field', FILTER_SANITIZE_STRING), 'aveffe_option')) {
            die(_e('Hacker?', "avatars-effects"));
        }
        $options['enable_avatar_resizing'] = filter_input(INPUT_POST, 'enable_avatar_resizing', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_avatar_width'] = filter_input(INPUT_POST, 'aveff_avatar_width', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_avatar_height'] = filter_input(INPUT_POST, 'aveff_avatar_height', FILTER_SANITIZE_NUMBER_INT);
        $options['enable_avatar_border_styling'] = filter_input(INPUT_POST, 'enable_avatar_border_styling', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_border_width'] = filter_input(INPUT_POST, 'aveff_border_width', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_border_radius_top_left'] = filter_input(INPUT_POST, 'aveff_border_radius_top_left', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_border_radius_top_right'] = filter_input(INPUT_POST, 'aveff_border_radius_top_right', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_border_radius_bottom_right'] = filter_input(INPUT_POST, 'aveff_border_radius_bottom_right', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_border_radius_bottom_left'] = filter_input(INPUT_POST, 'aveff_border_radius_bottom_left', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_border_style'] = filter_input(INPUT_POST, 'aveff_border_style', FILTER_SANITIZE_STRING);
        $options['aveff_border_color'] = filter_input(INPUT_POST, 'aveff_border_color', FILTER_SANITIZE_STRING);
        $options['enable_avatar_zoom'] = filter_input(INPUT_POST, 'enable_avatar_zoom', FILTER_SANITIZE_NUMBER_INT);
        $options['avatar_zoom_size'] = filter_input(INPUT_POST, 'avatar_zoom_size', FILTER_DEFAULT);
        $options['enable_avatar_shadow'] = filter_input(INPUT_POST, 'enable_avatar_shadow', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_shadow_x_offset'] = filter_input(INPUT_POST, 'aveff_shadow_x_offset', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_shadow_y_offset'] = filter_input(INPUT_POST, 'aveff_shadow_y_offset', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_shadow_blur'] = filter_input(INPUT_POST, 'aveff_shadow_blur', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_shadow_spreed'] = filter_input(INPUT_POST, 'aveff_shadow_spreed', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_shadow_color'] = filter_input(INPUT_POST, 'aveff_shadow_color', FILTER_SANITIZE_STRING);
        $options['enable_avatar_rotation'] = filter_input(INPUT_POST, 'enable_avatar_rotation', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_rotate_x'] = filter_input(INPUT_POST, 'aveff_rotate_x', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_rotate_y'] = filter_input(INPUT_POST, 'aveff_rotate_y', FILTER_SANITIZE_NUMBER_INT);
        $options['aveff_rotate_z'] = filter_input(INPUT_POST, 'aveff_rotate_z', FILTER_SANITIZE_NUMBER_INT);
        $options['enable_avatar_custom_styling'] = filter_input(INPUT_POST, 'enable_avatar_custom_styling', FILTER_SANITIZE_NUMBER_INT);
        $options['avatar_container_classes'] = filter_input(INPUT_POST, 'avatar_container_classes', FILTER_SANITIZE_STRING);
        $options['avatar_custom_css'] = filter_input(INPUT_POST, 'avatar_custom_css', FILTER_SANITIZE_STRING);
        update_option(self::$OPTION_NAME, $options);
        wp_redirect(admin_url('options-general.php?page=' . AvatarsEffects::PAGE_SETTINGS));
        exit();
    }

}
