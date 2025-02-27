<?php
if (!defined('ABSPATH')) { exit; }

class CHATBOTCOM_Components {
    public static $url = CHATBOTCOM_ADMIN_URL.'components/';
    public static $dir = CHATBOTCOM_ADMIN_DIR.'components/';

    public static function registerScripts () {
        wp_enqueue_style(CHATBOTCOM_ASSETS_PREFIX.'tpl-switch', self::$url.'tpl-switch/tpl-switch.css');
        wp_enqueue_style(CHATBOTCOM_ASSETS_PREFIX.'tpl-header', self::$url.'tpl-header/tpl-header.css');
        wp_enqueue_style(CHATBOTCOM_ASSETS_PREFIX.'tpl-button', self::$url.'tpl-button/tpl-button.css');
    }
    public static function tplSwitch ($label, $name, $checked) {
        require self::$dir.'tpl-switch/tpl-switch.php';
    }
    public static function tplCreateLink () {
        require self::$dir.'tpl-create-link/tpl-create-link.php';
    }
    public static function tplDisconnectLink () {
        require self::$dir.'tpl-disconnect-link/tpl-disconnect-link.php';
    }
    public static function tplHeader ($header, $description) {
        require self::$dir.'tpl-header/tpl-header.php';
    }
    public static function tplButtonButton ($title, $size, $id = '') {
        require self::$dir.'tpl-button/tpl-button-button.php';
    }
    public static function tplButtonLink ($title, $size, $url = '', $blank = false) {
        require self::$dir.'tpl-button/tpl-button-link.php';
    }
    public static function tplButtonSubmit ($title, $size, $id = '') {
        require self::$dir.'tpl-button/tpl-button-submit.php';
    }
}
