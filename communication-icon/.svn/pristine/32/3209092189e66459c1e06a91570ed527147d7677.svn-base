<?php
/*
Plugin Name: Communication Icon
Description: A plugin for managing communication icons.
Version: 1.2
Author: Mehmet Salih Karaca
Author URI: https://karacasoft.com.tr
Requires at least: 4.7
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/



if ( ! defined( 'ABSPATH' ) ) {
    exit; // Doğrudan erişim engellendi
}

function communication_icon_settings_menu()
{
    add_menu_page(
        'Communication Icon Settings',
        'Communication Icon',
        'manage_options',
        'communication-icon-settings',
        'communication_icon_settings_page',
        'dashicons-communication',
        100
    );
}
add_action('admin_menu', 'communication_icon_settings_menu');

function communication_icon_settings_page()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $message = '';
    if (isset($_POST['communication_icon_settings']) && check_admin_referer('communication_icon_settings_save', 'communication_icon_nonce')) {
        if (isset($_POST['communication_icon_image'])) {
            update_option('communication_icon_image', sanitize_text_field(wp_unslash($_POST['communication_icon_image'])));
        }
        if (isset($_POST['communication_phone_number'])) {
            $phone_number = sanitize_text_field(wp_unslash($_POST['communication_phone_number']));
            if (preg_match('/^\d+$/', $phone_number)) {
                update_option('communication_phone_number', $phone_number);
            } else {
                $message = '<div class="error"><p>' . esc_html__('Invalid phone number format.', 'communication-icon') . '</p></div>';
            }
        }
        if (empty($message)) {
            $message = '<div class="updated"><p>' . esc_html__('Settings saved successfully.', 'communication-icon') . '</p></div>';
        }
    }

    $icon_image = get_option('communication_icon_image', plugin_dir_url(__FILE__) . 'img/default-icon.png');
    $phone_number = get_option('communication_phone_number', '900000000000');
?>
    <div class="wrap">
        <h1><?php esc_html_e('Communication Icon Settings', 'communication-icon'); ?></h1>
        <?php echo wp_kses_post($message); ?>
        <form method="post">
            <?php wp_nonce_field('communication_icon_settings_save', 'communication_icon_nonce'); ?>
            <input type="hidden" name="communication_icon_settings" value="1">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Communication Icon URL', 'communication-icon'); ?></th>
                    <td>
                        <input type="text" id="communication_icon_image" name="communication_icon_image" value="<?php echo esc_url($icon_image); ?>" style="width: 80%;" />
                        <button type="button" class="button" id="upload_image_button"><?php esc_html_e('Select Media', 'communication-icon'); ?></button>
                        <p class="description"><?php esc_html_e('Enter the URL of the image or select it from the media library.', 'communication-icon'); ?></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Phone Number', 'communication-icon'); ?></th>
                    <td>
                        <input type="text" name="communication_phone_number" value="<?php echo esc_attr($phone_number); ?>" style="width: 100%;" />
                        <p class="description"><?php esc_html_e('Enter the phone number in international format, e.g., 900000000000', 'communication-icon'); ?></p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

// Yönetici panelinde CSS ve JavaScript dosyalarını yükleyelim
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_media(); // Medya yükleme desteği (örneğin resim seçim)
    wp_register_script('communication-icon-admin-js', plugin_dir_url(__FILE__) . 'js/admin.js', ['jquery', 'wp-i18n'], '1.0', true);
    wp_enqueue_script('communication-icon-admin-js');
    wp_enqueue_style('communication-icon-admin-css', plugin_dir_url(__FILE__) . 'css/admin-style.css', [], '1.0', 'all');
});

// Ön yüz (frontend) için CSS ve JavaScript dosyalarını yükleyelim
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('communication-icon-css', plugin_dir_url(__FILE__) . 'css/style.css', [], '1.0', 'all');
    wp_enqueue_script('communication-icon-front-js', plugin_dir_url(__FILE__) . 'js/front.js', ['jquery'], '1.0', true);
});


function communication_icon_html()
{
    $icon_image_id = get_option('communication_icon_image');
    $phone_number = esc_attr(get_option('communication_phone_number', '900000000000'));

    if (empty($icon_image_id)) {
        $icon_image_id = plugin_dir_url(__FILE__) . 'img/default-icon.png';
    }

    // Attempt to get the image via wp_get_attachment_image
    $icon_image_html = wp_get_attachment_image($icon_image_id, 'full');

    // If wp_get_attachment_image fails, fall back to using a direct <img> tag
    if (!$icon_image_html) {
        $icon_image_html = '<img src="' . esc_url($icon_image_id) . '" alt="' . esc_attr__('Communication', 'communication-icon') . '" style="width: 60px; height: 60px;">';
    }

    if (!empty($icon_image_html) && !empty($phone_number)) {
        echo '<div id="communication-icon">';
        echo '<a href="https://wa.me/' . esc_attr($phone_number) . '" target="_blank" rel="noopener noreferrer">';
        echo wp_kses_post($icon_image_html);  // Escape output for HTML
        echo '</a>';
        echo '</div>';
    }
}

add_action('wp_footer', 'communication_icon_html');
