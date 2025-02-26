<?php
/*
 * Plugin Name: Avatar Effects
 * Description: Plugin for customizing users avatars
 * Version: 1.0.0
 * Author: gVectors Team
 * Author URI: http://gvectors.com/
 * Text Domain: avatars-effects
 * Domain Path: /languages/
 */

if (!defined('ABSPATH')) {
    exit();
}
include_once 'options/AvatarsEffectsOptions.php';

define('AVEFF_DS', DIRECTORY_SEPARATOR);
define('AVEFF_DIR_PATH', dirname(__FILE__));
define('AVEFF_DIR_NAME', basename(AVEFF_DIR_PATH));
define('AVEFF_PLUGIN_URL', plugins_url());

class AvatarsEffects {

    private $options;
    private $version;

    // Constants
    const PAGE_SETTINGS = "avatars_effects";

    public function __construct() {
        $this->plugin_url = plugin_dir_url(__FILE__);
        $this->options = new AvatarsEffectsOptions();

        add_action("admin_enqueue_scripts", array(&$this, "aveff_admin_styles"), 7);
        add_action("wp_enqueue_scripts", array(&$this, "aveff_front_styles"), 7);

        add_action('admin_menu', array(&$this, 'addSettings'), 8);
        if (!is_admin()) {
            add_filter('get_avatar', array(&$this, 'change_exesting_avatar'), 999999999, 2);
        }
        add_action('wp_footer', array(&$this, 'initDynamicCss'));
    }

    /**
     * add submenu to settings in admin page
     */
    public function addSettings() {
        add_submenu_page("options-general.php", __("Avatar Effects", "avatars-effects"), __("Avatar Effects", "avatars-effects"), "manage_options", AvatarsEffects::PAGE_SETTINGS, array(&$this->options, "drawSettingsForm"));
    }

    /*
     * checking a version
     */

    /**
     * Dynamic css which will be written in the head of document
     * using the values of fields from addons settings
     */
    public function initDynamicCss() {
        ?>
        <style type='text/css'>
            aveff_avatar
            <?php
            $avatarContainerClassesArray = explode(",", $this->options->avatarContainerClasses);
            foreach ($avatarContainerClassesArray as $avatarContainerClass) {
                ?>
                ,div:not(#wpadminbar) <?php echo $avatarContainerClass; ?> .aveff_avatar_parent > .avatar

            <?php } ?>
            {
                <?php
                if ($this->options->avatarResizingEnambe) {
                    if ($this->options->avatarWidth !== '') {
                        ?>width: <?php echo $this->options->avatarWidth; ?>px; max-width: none;<?php } ?>
                    <?php if ($this->options->avatarHeight !== '') { ?>height: <?php echo $this->options->avatarHeight; ?>px;<?php
                    }
                }
                ?>
                <?php
                if ($this->options->avatarBorderStylingEnambe) {
                    if ($this->options->borderWidth !== '') {
                        ?>border-width: <?php echo $this->options->borderWidth; ?>px;<?php } ?>
                    <?php if ($this->options->borderStyle !== '') { ?>border-style: <?php echo $this->options->borderStyle; ?>;<?php } ?>
                    <?php if ($this->options->borderColor !== '') { ?>border-color: <?php echo $this->options->borderColor; ?>;<?php } ?>
                    <?php if ($this->options->borderRadiusTopLeft !== '') { ?>border-top-left-radius: <?php echo $this->options->borderRadiusTopLeft; ?>%;<?php } ?>
                    <?php if ($this->options->borderRadiusTopRight !== '') { ?>border-top-right-radius: <?php echo $this->options->borderRadiusTopRight; ?>%;<?php } ?>
                    <?php if ($this->options->borderRadiusBottomRight !== '') { ?>border-bottom-right-radius: <?php echo $this->options->borderRadiusBottomRight; ?>%;<?php } ?>
                    <?php if ($this->options->borderRadiusBottomLeft !== '') { ?>border-bottom-left-radius: <?php echo $this->options->borderRadiusBottomLeft; ?>%;<?php
                    }
                }
                ?>
                <?php if ($this->options->avatarShadowEnable) { ?>box-shadow: <?php echo $this->options->shadowXOffset . "px " . $this->options->shadowYOffset . "px " . $this->options->shadowBlur . "px " . $this->options->shadowSpreed . "px " . $this->options->shadowColor; ?>;<?php } ?>
                <?php if ($this->options->avatarRotation) { ?>
                    transform: perspective(100px) 
                    <?php
                    if ($this->options->avatarRotateX !== "") {
                        echo "rotateX(" . $this->options->avatarRotateX . "deg)";
                    }
                    if ($this->options->avatarRotateY !== "") {
                        echo " rotateY(" . $this->options->avatarRotateY . "deg)";
                    }
                    if ($this->options->avatarRotateZ !== "") {
                        echo " rotateZ(" . $this->options->avatarRotateZ . "deg)";
                    }
                }
                ?>
            }
            <?php if ($this->options->avatarZoomEnable) { ?>
                div:not(#wpadminbar) .aveff_avatar_parent > .avatar{
                    /*position: relative;*/
                    z-index: 20;
                    transition: all .6s;
                }
                aveff_avatar <?php foreach ($avatarContainerClassesArray as $avatarContainerClass) { ?>

                    ,div:not(#wpadminbar) <?php echo $avatarContainerClass; ?> .aveff_avatar_parent > .avatar:hover
                <?php } ?>
                {
                    transform: scale(<?php echo $this->options->avatarZoomSize; ?>);
                }    

                <?php
            }
            if ($this->options->enableAvatarCustomStyling) {
                echo $this->options->avatarCustomCss;
            }
            ?>

        </style>
        <?php
    }

    /**
     * Connecting css and js files to admin page
     */
    public function aveff_admin_styles() {
        wp_register_script('avatars_effects_admin_style', plugins_url('/assets/js/avatars_effects_admin_min.js', __FILE__), null, $this->version);
        wp_enqueue_script('avatars_effects_admin_style');

        wp_register_style('avatars_effects_admin_script', plugins_url('/assets/css/avatars_effects_admin_min.css', __FILE__), null, $this->version);
        wp_enqueue_style('avatars_effects_admin_script');
    }

    /**
     * Connecting css and js files to front page
     */
    public function aveff_front_styles() {

        wp_register_style("avatars_effects_front_style", plugins_url("/assets/css/avatars_effects_front_min.css", __FILE__), null, $this->options->pluginVersion);
        wp_enqueue_style("avatars_effects_front_style");
        wp_enqueue_script('jquery');
        wp_register_script("avatars_effects_front_script", plugins_url("/assets/js/avatars_effects_front_min.js", __FILE__), null, $this->options->pluginVersion);
        wp_enqueue_script("avatars_effects_front_script");
    }

    /**
     * Setting a parent element to each avatar
     */
    public function change_exesting_avatar($avatar, $id_or_email) {
        $avatar = "<div class='aveff_avatar_parent'>" . $avatar . "</div>";
        return $avatar;
    }

}

$crazyAvatar = new AvatarsEffects();





