<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package     chat-whatsapp
 * @subpackage  chat-whatsapp/src/Frontend
 * @author      ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\ChatWhatsapp\Frontend;

use ThemeAtelier\ChatWhatsapp\Frontend\Templates\items\Buttons;
use ThemeAtelier\ChatWhatsapp\Frontend\Templates\ButtonTemplate;
use ThemeAtelier\ChatWhatsapp\Frontend\Templates\FormTemplate;
use ThemeAtelier\ChatWhatsapp\Frontend\Templates\SingleTemplate;
use ThemeAtelier\ChatWhatsapp\Frontend\Templates\WooButton;
use ThemeAtelier\ChatWhatsapp\Helpers\Helpers;

/**
 * The Frontend class to manage all public facing stuffs.
 *
 * @since 1.0.0
 */
class Frontend
{
    /**
     * The slug of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_slug   The slug of this plugin.
     */
    private $plugin_slug;

    /**
     * The min of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $min   The slug of this plugin.
     */
    private $min;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name       The name of the plugin.
     * @param      string $version    The version of this plugin.
     */
    public function __construct()
    {
        $this->min = defined('WP_DEBUG') && WP_DEBUG ? '' : '.min';

        add_action('wp_footer', array($this, 'chat_whatsapp_content'));
        add_action('wp_ajax_handle_form_submission', [$this, 'handle_form_submission']);
        add_action('wp_ajax_nopriv_handle_form_submission', [$this, 'handle_form_submission']);
        $wooButton = new WooButton();
        $options = get_option('cwp_option');
        $wooCommerce_button = isset($options['wooCommerce_button']) ? $options['wooCommerce_button'] : '';
        $button_position = isset($options['wooCommerce_button_position']) ? $options['wooCommerce_button_position'] : 'after';

        if ($wooCommerce_button) {
            add_action("woocommerce_{$button_position}_add_to_cart_form", array($wooButton, 'woo_button'));
        }
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public static function enqueue_scripts()
    {
        $options                 = get_option('cwp_option');
        $wa_custom_css             = isset($options['whatsapp-custom-css']) ? $options['whatsapp-custom-css'] : '';
        $wa_custom_js              = isset($options['whatsapp-custom-js']) ? $options['whatsapp-custom-js'] : '';
        $auto_show_popup         = isset($options['autoshow-popup']) ? $options['autoshow-popup'] : '';
        $auto_open_popup_timeout = isset($options['auto_open_popup_timeout']) ? $options['auto_open_popup_timeout'] : 0;
        wp_enqueue_style('ico-font');
        wp_enqueue_style('chat-whatsapp-style');
        $custom_css = '';
        include 'dynamic-css/dynamic-css.php';

        if ($wa_custom_css) {
            $custom_css .= $wa_custom_css;
        }

        wp_add_inline_style('chat-whatsapp-style', $custom_css);
        wp_enqueue_script('moment', array('jquery'), '1.0', true);
        wp_enqueue_script('moment-timezone-with-data');
        wp_enqueue_script('chat-whatsapp-script');
        $frontend_scripts = array(
            'autoShowPopup'        => $auto_show_popup,
            'autoOpenPopupTimeout' => $auto_open_popup_timeout,
        );
        wp_localize_script('chat-whatsapp-script', 'whatshelp_frontend_script', $frontend_scripts);
        if (! empty($wa_custom_js)) {
            wp_add_inline_script('chat-whatsapp-script', $wa_custom_js);
        }
        wp_localize_script(
            'chat-whatsapp-script',
            'frontend_scripts',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce'   => wp_create_nonce('chat_whatsapp_nonce'),
            )
        );
    }

	public function chat_whatsapp_content()
    {
        $options = get_option('cwp_option');
        $bubble_include_page = isset($options['bubble_include_page']) ? $options['bubble_include_page'] : '';
        $bubble_exclude_page = isset($options['bubble_exclude_page']) ? $options['bubble_exclude_page'] : '';
        $whatsapp_message_template = isset($options['whatsapp_message_template']) ? $options['whatsapp_message_template'] : '';
        $whatsapp_number = isset($options['opt-number']) ? $options['opt-number'] : '';
        $circle_animation = isset($options['circle-animation']) ? $options['circle-animation'] : '1';
        $chat_type = isset($options['chat_layout']) ? $options['chat_layout'] : 'form';
        $random         = wp_rand(1, 13);
        $bubble_type = Buttons::buttons($options);

        $should_display_element = Helpers::should_display_element($options);
        if ($should_display_element) {
            self::render_chat_template($chat_type, $options, $bubble_type, $random, $whatsapp_message_template, $whatsapp_number);
        }
    }

    public static function render_chat_template($chat_type, $options, $bubble_type, $random, $whatsapp_message_template, $whatsapp_number)
    {
        switch ($chat_type) {
            case 'off':
            break;
            case 'button':
                ButtonTemplate::buttonTemplate($options, $bubble_type);
                break;
            case 'agent':
                SingleTemplate::singleTemplate($options, $bubble_type, $random, $whatsapp_message_template, $whatsapp_number);
                break;
            case 'form':
                FormTemplate::formTemplate($options, $bubble_type, $random, $whatsapp_message_template, $whatsapp_number);
            break;

            default:

        }
    }

    public function handle_form_submission()
    {

        // Verify the nonce
        if (!isset($_POST['nonce']) || !wp_verify_nonce(wp_unslash($_POST['nonce']), 'chat_whatsapp_nonce')) {
            wp_send_json_error('Invalid nonce');
            wp_die();
        }

        // Sanitize and retrieve POST data
        $name = sanitize_text_field(wp_unslash($_POST['name']));
        $message = sanitize_textarea_field(wp_unslash($_POST['message']));
        $whatsapp_template = sanitize_text_field(wp_unslash($_POST['template']));
        $whatsapp_number  = sanitize_text_field(wp_unslash($_POST['agent']));
        $currentURL = sanitize_url(wp_unslash($_POST['current_url']));

        // Prepare variables for the template
        $date = gmdate('F j, Y, H:i (h:i A) (\G\M\T O)');
        $siteURL = get_site_url();
        $variables = array('{name}', '{message}', '{date}',  '{siteURL}', '{currentURL}');
        $values = array($name, $message, $date, $siteURL, $currentURL);
        $text = trim(str_replace($variables, $values, $whatsapp_template));
        $whatsAppURL = 'https://wa.me/' . esc_attr($whatsapp_number) . '?text=' . urlencode($text);

        // Send the WhatsApp URL back to the client
        wp_send_json_success(array('whatsAppURL' => $whatsAppURL));

        wp_die(); // Terminate immediately and return a proper response
    }
}
