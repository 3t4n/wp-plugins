<?php
/**
 * Plugin Name: Integration of Bitrix24 with Contact Form 7
 * Plugin URI: https://alexosmanov.ru/blog/tpost/3ne7kes721-plagin-integratsii-bitriks24-s-contact-f
 * Description: Плагин для интеграции Битрикс24 с контактной формой 7. Подробные инструкции по настройке плагина доступны на веб-сайте автора.
 * Version: 1.5.3
 * Author: Alex Osmanov
 * Author URI: https://alexosmanov.ru
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * PHP requires at least: 7.0
 * WP requires at least: 5.0
 * Tested up to: 6.7.1
 */

class CF7Bitrix24IntegrationPlugin
{
    public function __construct()
    {
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);

        add_action('admin_menu', [$this, 'addSettingsPage']);
        add_action('admin_init', [$this, 'registerSettings']);
        add_action('wpcf7_form_elements', [$this, 'addHiddenFields']);
        add_action('wpcf7_before_send_mail', [$this, 'sendDataToBitrix24']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueStyles']);
    }

    public function activate()
    {
        // Действия при активации.
    }

    public function deactivate()
    {
        // Действия при деактивации.
    }

    public function addSettingsPage()
    {
        add_menu_page(
            'CF7 Bitrix24 Integration Settings',
            'CF7 Bitrix24 Integration',
            'manage_options',
            'cf7_bitrix24_integration_plugin',
            [$this, 'renderSettingsPage']
        );
    }

    public function renderSettingsPage()
    {
        ?>
        <div class="wrap cf7-bitrix24">
            <h2>CF7 Bitrix24</h2>
            <form method="post" action="options.php">
                <?php settings_fields('cf7_bitrix24_integration_plugin_options'); ?>
                <?php do_settings_sections('cf7_bitrix24_integration_plugin'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Bitrix24 URL:</th>
                        <td><input type="text" name="cf7_bitrix24_url" value="<?php echo esc_attr(get_option('cf7_bitrix24_url')); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Bitrix24 логин:</th>
                        <td><input type="text" name="cf7_bitrix24_user_login" value="<?php echo esc_attr(get_option('cf7_bitrix24_user_login')); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Bitrix24 пароль:</th>
                        <td><input type="password" name="cf7_bitrix24_user_password" value="<?php echo esc_attr(get_option('cf7_bitrix24_user_password')); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Bitrix24 пользовательское поле (например, UF_CRM_...):</th>
                        <td><input type="text" name="cf7_bitrix24_custom_field" value="<?php echo esc_attr(get_option('cf7_bitrix24_custom_field')); ?>" /></td>
                    </tr>
                </table>
                <?php submit_button('Сохранить', 'primary', 'submit', true, ['class' => 'submit-button']); ?>
            </form>
        </div>
        <?php
    }

    public function registerSettings()
    {
        register_setting('cf7_bitrix24_integration_plugin_options', 'cf7_bitrix24_url', 'sanitize_text_field');
        register_setting('cf7_bitrix24_integration_plugin_options', 'cf7_bitrix24_user_login', 'sanitize_text_field');
        register_setting('cf7_bitrix24_integration_plugin_options', 'cf7_bitrix24_user_password', 'sanitize_text_field');
        register_setting('cf7_bitrix24_integration_plugin_options', 'cf7_bitrix24_custom_field', 'sanitize_text_field');
    }

    public function addHiddenFields($content)
    {
        $page_url = esc_url($_SERVER['REQUEST_URI']);
        $hidden_field = '<input type="hidden" name="cf7_current_page" value="' . $page_url . '" />';
        return $content . $hidden_field;
    }

    public function sendDataToBitrix24($contact_form)
{
    $submission = WPCF7_Submission::get_instance();
    if ($submission) {
        $posted_data = $submission->get_posted_data();

        $api_url = get_option('cf7_bitrix24_url');
        $user_login = get_option('cf7_bitrix24_user_login');
        $user_password = get_option('cf7_bitrix24_user_password');
        $custom_field = get_option('cf7_bitrix24_custom_field');

        // Данные UTM и текущая страница
        $utm_source = sanitize_text_field($posted_data['utm_source'] ?? '');
        $utm_medium = sanitize_text_field($posted_data['utm_medium'] ?? '');
        $utm_campaign = sanitize_text_field($posted_data['utm_campaign'] ?? '');
        $utm_content = sanitize_text_field($posted_data['utm_content'] ?? '');
        $utm_term = sanitize_text_field($posted_data['utm_term'] ?? '');
        $current_page = sanitize_text_field($posted_data['cf7_current_page'] ?? '');

        // Значение для комментариев
        $comments = !empty($posted_data['your-message']) ? sanitize_textarea_field($posted_data['your-message']) : 'Комментарий отсутствует';

        // Значение для компании
        $company = !empty($posted_data['your-company']) ? sanitize_text_field($posted_data['your-company']) : 'Компания не указана';

        if ($api_url && $user_login && $user_password) {
            $request_data = [
                'FIELDS' => [
                    'TITLE' => 'Новый лид',
                    'NAME' => sanitize_text_field($posted_data['your-name'] ?? ''),
                    'COMPANY_TITLE' => $company, // Новое поле для компании
                    'COMMENTS' => $comments,
                    'EMAIL' => [
                        [
                            'VALUE' => sanitize_email($posted_data['your-email'] ?? ''),
                            'VALUE_TYPE' => 'WORK',
                        ],
                    ],
                    'PHONE' => [
                        [
                            'VALUE' => sanitize_text_field($posted_data['your-phone'] ?? ''),
                            'VALUE_TYPE' => 'WORK',
                        ],
                    ],
                    'UTM_SOURCE' => $utm_source,
                    'UTM_MEDIUM' => $utm_medium,
                    'UTM_CAMPAIGN' => $utm_campaign,
                    'UTM_CONTENT' => $utm_content,
                    'UTM_TERM' => $utm_term,
                ],
            ];

                // Добавление пользовательского поля, если оно заполнено
                if (!empty($custom_field)) {
                    $request_data['FIELDS'][$custom_field] = $current_page;
                }

                // Логирование данных перед отправкой
                $this->write_log("Request Data: " . json_encode($request_data));

                $response = wp_remote_post($api_url, [
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'body' => json_encode($request_data),
                    'timeout' => 15,
                ]);

                // Логирование и проверка ответа
                $this->write_log("Response: " . print_r($response, true));

                if (is_wp_error($response)) {
                    $error_message = $response->get_error_message();
                    $this->write_log("Error: " . $error_message);

                    wp_mail(get_option('admin_email'), 'CF7 Bitrix24 Integration Error', 'Error: ' . $error_message);
                } else {
                    $http_code = wp_remote_retrieve_response_code($response);
                    $body = wp_remote_retrieve_body($response);
                    if ($http_code !== 200) {
                        $error_message = wp_remote_retrieve_response_message($response);
                        $this->write_log("Error: HTTP $http_code - $error_message | Body: $body");
                        wp_mail(get_option('admin_email'), 'CF7 Bitrix24 Integration Error', 'Error: HTTP ' . $http_code . ' - ' . $error_message);
                    } else {
                        $this->write_log("Success: HTTP $http_code | Body: $body");
                    }
                }
            }
        }
    }

    public function write_log($log_message)
    {
        $log_file = plugin_dir_path(__FILE__) . 'cf7-bitrix24-log.txt';
        if (!file_exists($log_file)) {
            touch($log_file);
        }
        error_log("\n" . date("Y-m-d H:i:s") . " - " . $log_message . "\n", 3, $log_file);
    }

    public function enqueueStyles()
    {
        wp_enqueue_style('cf7_bitrix24_integration_styles', plugin_dir_url(__FILE__) . 'cf7-bitrix24-styles.css');
    }
}

new CF7Bitrix24IntegrationPlugin();
?>
