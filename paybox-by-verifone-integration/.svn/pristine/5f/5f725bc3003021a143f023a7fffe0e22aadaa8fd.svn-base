<?php
/**
 * Paybox Admin.
 *
 * @class Paybox
 * @version	1.0.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Paybox_Admin class.
 * Create menu etc...
 */
class Paybox_Admin {

    private $general_settings_key = 'paybox_general_settings';
    private $standard_settings_key = 'paybox_standard_settings';
    private $x_settings_key = 'paybox_x_settings';
    private $plugin_options_key = 'paybox_options';
    private $plugin_settings_tabs = array();
    protected $form_fields;
    protected $tabs;

    function __construct() {
        $this->tabs['general'] = array(
            'key' => 'paybox_general',
            'title' => __('Présentation', 'paybox'),
            'section_title' => __('Présentation paybox title', 'paybox'),
            'section_description' => __('Présentation paybox description', 'paybox'),
            'option_title' => __('', 'paybox')
        );
        $this->tabs['standard'] = array(
            'key' => 'paybox_standard',
            'title' => __('Paybox Standard', 'paybox'),
            'section_title' => __('Réglage Paybox standard', 'paybox'),
            'section_description' => __('Réglage Paybox standard description', 'paybox'),
            'option_title' => __('Option Paybox standard', 'paybox')
        );
        $this->tabs['x'] = array(
            'key' => 'paybox_x',
            'title' => __('Paybox 3 times', 'paybox'),
            'section_title' => __('Réglage Paybox 3 times', 'paybox'),
            'section_description' => __('Réglage Paybox 3 times description', 'paybox'),
            'option_title' => __('Option Paybox 3 times', 'paybox')
        );
        $this->tabs['state'] = array(
            'key' => 'paybox_state',
            'title' => __('Etat des extensions', 'paybox'),
            'section_title' => __('Etat des extensions', 'paybox'),
            'section_description' => __('Etat des extensions', 'paybox'),
            'option_title' => __('Etat', 'paybox')
        );

        $this->tabs['shortcode'] = array(
            'key' => 'shortcode',
            'title' => __('Shortcodes', 'paybox'),
            'section_title' => '',
            'section_description' => '',
            'option_title' => ''
        );

        add_action('init', array(&$this, 'load_settings'));
        add_action('admin_init', array(&$this, 'register_settings'));
        add_action('admin_menu', array(&$this, 'add_admin_menus'));
        add_action('paybox_settings_save', array(&$this, 'save'));
        if (!empty($_POST)) {
            do_action('paybox_settings_save');
        }
    }

    function load_settings() {
        foreach ($this->tabs as $key => $value) {
            $alias = $key . '_settings';
            $settings_key = $value['key'] . '_settings';
            $this->$alias = (array) get_option($settings_key);
        }
    }

    function register_settings() {
        foreach ($this->tabs as $key => $value) {
            $settings_key = $value['key'] . '_settings';
            $this->plugin_settings_tabs[$settings_key] = $value['title'];
            register_setting($settings_key, $settings_key);
            $section = 'section_' . $key;
            add_settings_section($section, $value['section_title'], array(&$this, 'section_desc'), $settings_key);
            add_settings_field($key . '_option', $value['option_title'], array(&$this, 'field_option'), $settings_key, $section, array('key' => $key, 'settings_key' => $settings_key));
        }
    }

    function section_desc($params) {
        $key = str_replace('section_', '', $params['id']);

        switch ($key) {
            case 'general':
                $template = plugin_dir_path(dirname(__FILE__)) . 'template/presentation.php';
                load_template($template);
                break;
            case 'shortcode':
                $template = plugin_dir_path(dirname(__FILE__)) . 'template/shortcode.php';
                load_template($template);
                break;
            case 'state':
                $template = plugin_dir_path(dirname(__FILE__)) . 'template/state.php';
                load_template($template);
                break;
            case 'standard':
            case 'x':
                echo $this->tabs[$key]['section_description'];
                break;
        }
    }

    function field_option($params) {
        $alias = $params['key'] . '_settings';
        switch ($params['key']) {
            case 'general':
                $template = plugin_dir_path(dirname(__FILE__)) . 'template/presentation.php';
                load_template($template);
                break;
            case 'standard':
                echo Paybox_Helper::generateForm($params['key'], $this->$alias, $params['settings_key']);
                break;
            case 'x':
                echo Paybox_Helper::generateForm('3' . $params['key'], $this->$alias, $params['settings_key']);
                break;
            case 'state':
                break;
        }
    }

    function add_admin_menus() {
        add_options_page(
                __('Paybox Settings', 'paybox'), __('Paybox', 'paybox'), 'manage_options', $this->plugin_options_key, array($this, 'plugin_options_page')
        );
    }

    function plugin_options_page() {
        $tab = isset($_GET['tab']) ? $_GET['tab'] : $this->tabs['general']['key'] . '_settings';
        ?>
        <div class="wrap">
            <?php $this->plugin_options_tabs(); ?>
            <form method="post" action="options.php">
                <?php wp_nonce_field('update-options'); ?>
                <?php settings_fields($tab); ?>
                <?php do_settings_sections($tab); ?>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    public function plugin_options_tabs() {
        $current_tab = isset($_GET['tab']) ? $_GET['tab'] : $this->tabs['general']['key'] . '_settings';
        screen_icon();
        echo '<h2 class="nav-tab-wrapper">';
        foreach ($this->plugin_settings_tabs as $tab_key => $tab_caption) {
            $active = $current_tab == $tab_key ? 'nav-tab-active' : '';
            echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->plugin_options_key . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';
        }
        echo '</h2>';
    }

    public function save() {
        require_once( 'paybox-encrypt.php' );
        $crypto = new PayboxEncrypt();
        if (!isset($_POST['crypted'])) {
            if (isset($_POST["paybox_standard_settings"]["hmackey"])) {
                $_POST["paybox_standard_settings"]["hmackey"] = $crypto->encrypt($_POST["paybox_standard_settings"]["hmackey"]);
            }
            if (isset($_POST["paybox_x_settings"]["hmackey"])) {
                $_POST["paybox_x_settings"]["hmackey"] = $crypto->encrypt($_POST["paybox_x_settings"]["hmackey"]);
            }

            $_POST['crypted'] = true;
        }
    }

}

if (is_admin()) {
    $my_settings_page = new Paybox_Admin();
}
