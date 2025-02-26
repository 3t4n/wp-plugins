<?php

use Awesomesauce\Admin\AdminFields;
use Awesomesauce\GoogleFonts\GoogleFonts;
use Awesomesauce\Functions;
use Awesomesauce\Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

class AwesomesauceGlobalSettings {

    private $fields;

    public function __construct() {
        Functions::call_in_file('Admin/AdminFields.php');
        $this->fields = new AdminFields();
        $this->setup_page();
    }

    public function setup_page() {
        $this->fields->title('Gløbal settings <span class="awesomesauce_small_logo"><div class="awesomesauce_overlay"></div><img src="' . Awesomesauce::$plugin_url . '/Awesomesauce/Admin/Pages/small_logo.jpg" alt="Logo" class="awesomesauce_small_logo_img"></span>', 'h1');

        if ($this->awesomesauce_isset('awesomesauce_save')) {
            $this->save_settings();
            $this->fields->success();
        }

        $allowed_roles = $this->setup_roles();
        $this->capabilities_setup($allowed_roles);

        if ($this->awesomesauce_isset('awesomesauce_delete_google')) {
            $this->delete_google_fonts();
        }

        $this->render_form($allowed_roles);
    }

    private function save_settings() {
        if (!$this->awesomesauce_isset('awesomesauce_allowed_user_roles')) {
            Functions::save_option('allowed_user_roles', array());
        } else {
            Functions::save_option('allowed_user_roles');
        }
    }

    private function awesomesauce_isset($name) {
        if (isset($_POST[$name]) && (!isset($_POST['awesomesauce_global_settings_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['awesomesauce_global_settings_nonce'])), 'awesomesauce_save_global_settings'))) {
            wp_die(esc_html('Nonce verification failed'));
        } else if (isset($_POST[$name])) {
            return true;
        } else {
            return false;
        }
    }

    private function setup_roles() {
        $allowed_roles = Functions::get_option('allowed_user_roles');
        if (empty($allowed_roles)) {
            $allowed_roles = array();
        }
        $allowed_roles[] = 'administrator';

        return $allowed_roles;
    }

    private function get_all_roles() {
        global $wp_roles;
        $roles     = $wp_roles->get_names();
        $all_roles = array();

        foreach ($roles as $role => $label) {
            if ($role != 'administrator') {
                $all_roles[] = $role;
            }
        }

        return $all_roles;
    }


    private function capabilities_setup($allowed_roles) {
        $all_roles = $this->get_all_roles();

        $capabilities = array(
            'edit_awesomesauce_block',
            'read_awesomesauce_block',
            'delete_awesomesauce_block',
            'edit_awesomesauce_blocks',
            'edit_others_awesomesauce_blocks',
            'delete_awesomesauce_blocks',
            'publish_awesomesauce_blocks',
            'read_private_awesomesauce_blocks',
            'delete_private_awesomesauce_blocks',
            'delete_published_awesomesauce_blocks',
            'delete_others_awesomesauce_blocks',
            'edit_private_awesomesauce_blocks',
            'edit_published_awesomesauce_blocks',
            'create_awesomesauce_blocks'
        );

        foreach ($all_roles as $role) {
            $wp_role = get_role($role);

            foreach ($capabilities as $capability) {
                if (!in_array($role, $allowed_roles)) {
                    $wp_role->remove_cap($capability);
                } else {
                    $wp_role->add_cap($capability);
                }
            }
        }
    }

    private function delete_google_fonts() {
        Functions::call_in_file('GoogleFonts/GoogleFonts.php');
        GoogleFonts::delete_local_fonts();
        $this->fields->success('Font files deleted!');
    }

    private function render_form($allowed_roles) {
        echo '<form method="post" id="awesomesauce_global_settings">';

        wp_nonce_field('awesomesauce_save_global_settings', 'awesomesauce_global_settings_nonce');

        $this->fields->title('Breakpoints', 'h3', '', array('style' => 'margin-top:0;'));

        $this->fields->title('Tablet view');
        Functions::save_option('tablet_breakpoint');
        $this->fields->size_input(Functions::get_option('tablet_breakpoint', '1200'), 'tablet_breakpoint', 'Starts under given pixel', 'px', array(
            'min' => '600',
            'max' => '2000'
        ));

        $this->fields->title('Mobile view');
        Functions::save_option('mobile_breakpoint');
        $this->fields->size_input(Functions::get_option('mobile_breakpoint', '600'), 'mobile_breakpoint', 'Starts under given pixel', 'px', array(
            'min' => '400',
            'max' => '1200'
        ));

        $this->fields->title('Files and codes', 'h3');
        $this->fields->title('Load Google fonts');
        Functions::save_option('load_google_fonts');
        $this->fields->select(Functions::get_option('load_google_fonts', 1, true), 'load_google_fonts', array(
            0 => 'no',
            1 => 'yes',
            2 => 'store and load from local storage'
        ), true);

        if (file_exists(Awesomesauce::$uploads_folder_path . '/awesomesauce_google_fonts')) {
            $this->fields->html($this->fields->input('Delete stored Google font files', 'delete_google', 'submit'), 'div', array('class' => 'awesomesauce_setting_container'));
        }

        $this->fields->title('Google fonts <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display" target="_blank">font-display</a> value');
        Functions::save_option('google_fonts_display');
        $this->fields->select(Functions::get_option('google_fonts_display', 'auto'), 'google_fonts_display', array(
            'auto',
            'swap',
            'block',
            'fallback',
            'optional',
        ));

        $this->fields->divider();

        $this->fields->title('Force fullwidth calculation delay');
        Functions::save_option('force_fullwidth_delay');
        $this->fields->ms_input(Functions::get_option('force_fullwidth_delay', '0'), 'force_fullwidth_delay', 'The force fullwidth option can use a delay, to wait more for your page to become built up. The fullwidth calculation will happen after this delay, to know the width and position of the block.', array(
            'min' => '0',
            'max' => '5000'
        ));

        $this->fields->title('Resize observer delay');
        Functions::save_option('resize_observer_delay');
        $this->fields->ms_input(Functions::get_option('resize_observer_delay', '200'), 'resize_observer_delay', 'Canvas elements are being drawn with given sizes. Upon browser/js/css resize, these elements need to be redrawn, and that happens after this delay.', array(
            'min' => '0',
            'max' => '5000'
        ));

        $this->fields->title('In view delay');
        Functions::save_option('in_view_delay');
        $this->fields->ms_input(Functions::get_option('in_view_delay', '500'), 'in_view_delay', 'Some animations only start, when their block comes into the screen plus this delay. The delay allows visitors to scroll to the block completely before the animation starts.', array(
            'min' => '0',
            'max' => '5000'
        ));

        $this->fields->divider();

        $this->fields->title('Custom CSS');
        Functions::save_option('custom_css');
        $this->fields->textarea(Functions::get_option('custom_css', ''), 'custom_css', '.example {' . PHP_EOL . '&nbsp;&nbsp;color: red;' . PHP_EOL . '}');

        $this->fields->title('Debug system');
        Functions::save_option('debug');
        $this->fields->yes_no(Functions::get_option('debug', '0'), 'debug');


        $this->fields->title('Interface', 'h3');
        $this->fields->title('Position of block settings in admin area');
        Functions::save_option('block_settings_position');
        $this->fields->select(Functions::get_option('block_settings_position', 0, true), 'block_settings_position', array(
            0 => 'center',
            1 => 'center side',
            2 => 'right sidebar',
        ), true);

        $this->fields->title('Access', 'h3');
        $this->fields->title('Allowed non-administrator user roles to access Awesomesauce admin area');
        $this->fields->multiselect($allowed_roles, 'allowed_user_roles', $this->get_all_roles(), array('administrator'));

        echo '<br>';
        $this->fields->input('Save', 'save', 'submit', array(), true);
        echo '</form>';
    }
}

new AwesomesauceGlobalSettings();

global $awesomesauce_docs_link;
$awesomesauce_docs_link = "http://awesomesauce.great-site.net/docs/awesomesauce-blocks-documentation/configuration/global-settings/#content";

?>