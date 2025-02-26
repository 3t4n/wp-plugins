<?php
/**
 * Plugin Name: Axioma AI
 * Plugin URI: https://axiomabot.com/
 * Description: Embed your AxiomaBot chatbot on any Wordpress site.
 * Version: 1.0.0
 * Author: AxiomaBot
 * Author URI: https://axiomabot.com/
 * License: GPL2
 **/

if (!defined('ABSPATH')) {
    exit;
}

class Axiomabot
{
    public function init()
    {
        if (is_admin()) {
            $this->initAdmin();
        } else {
            $this->initBot();
        }
    }

    private function initBot()
    {
        add_action( 'wp_footer', function () {$this->renderBot();});
    }

    private function renderBot()
    {
        $settings = get_option('axiomabot_settings');
        if (isset($settings['axiomabot_key'])) {
            wp_enqueue_script(
                'axiomabot-init',
                'https://app.axiomabot.com/widget.js',
                [],
                '1.0',
                [
                    'in_footer' => true,
                    'strategy' => 'async',
                ]
            );
            wp_add_inline_script(
                'axiomabot-init',
                sprintf('let axiomabot={key: \'%s\'};', esc_html($settings['axiomabot_key'])),
                'before'
            );
        }
    }

    private function initAdmin()
    {
        add_action('admin_menu', function () {$this->adminMenu();});
        add_action('admin_init', function () {$this->adminSettings();});
    }

    private function adminMenu()
    {
        add_menu_page(
            'Axiomabot',
            'Axiomabot',
            'manage_options',
            'axiomabot',
            [$this, 'adminPageRender']
        );
    }

    public function adminPageRender()
    {
        ?>
        <div class="wrap">
            <h2>Axiomabot</h2>
            <form method="post" action="options.php">
                <?php
                settings_fields('axiomabot');
                do_settings_sections('axiomabot');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    private function adminSettings()
    {
        register_setting(
            'axiomabot',
            'axiomabot_settings',
            [$this, 'sanitize']
        );

        add_settings_section(
            'axiomabot_settings',
            'Axiomabot Settings',
            [$this, 'sectionInfo'],
            'axiomabot'
        );

        add_settings_field(
            'axiomabot_key',
            'Chatbbot ID',
            [$this, 'renderInput'],
            'axiomabot',
            'axiomabot_settings'
        );
    }

    public function sanitize($input)
    {
        $new_input = [];

        if (isset($input['axiomabot_key'])) {
            $new_input['axiomabot_key'] = sanitize_text_field($input['axiomabot_key']);
        }

        return $new_input;
    }

    public function sectionInfo()
    {
        print 'Enter your chatbot key:';
    }

    public function renderInput()
    {
        $settings = get_option('axiomabot_settings');
        printf(
            '<input type="text" style="width: 300px" id="axiomabot_key" name="axiomabot_settings[axiomabot_key]" value="%s" />',
            isset($settings['axiomabot_key']) ? esc_attr($settings['axiomabot_key']) : ''
        );
    }
}

(new Axiomabot())->init();
