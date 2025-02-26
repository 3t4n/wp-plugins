<?php
/*
Plugin Name: AGY Social
Description: Adiciona um ícone do Whatsapp no rodapé do site.
Version: 1.4
Author: Agencia Yes - Lennon Oliveira
Author URI: https://www.agenciayes.com.br
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: agy-social
Requires PHP: 7.0
Domain Path: /languages
*/

function agy_social_enqueue_styles()
{
    wp_enqueue_style(
        'agy-social-style', // Handle único
        plugins_url('assets/style.css', __FILE__), // Caminho para o arquivo
        array(), // Dependências
        '1.4' // Versão
    );
}
add_action('wp_enqueue_scripts', 'agy_social_enqueue_styles'); // Front-end
add_action('admin_enqueue_scripts', 'agy_social_enqueue_styles'); // Painel Admin


// Adiciona o item de menu no painel administrativo
add_action('admin_menu', 'agysocial_footer_menu');

function agysocial_footer_menu()
{
    add_menu_page(
        'AGY Social Settings',
        'AGY Social',
        'manage_options',
        'agysocial-footer-settings',
        'agysocial_footer_settings_page',
        'dashicons-whatsapp',
        100
    );
}

// Registra o domínio de tradução (para versões antigas do WordPress)
function agy_social_load_textdomain()
{
    load_plugin_textdomain('agy-social', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

add_action('init', 'agy_social_load_textdomain');


// Cria a página de configurações do plugin
function agysocial_footer_settings_page()
{
    ?>
    <div class="wrap fontstyle">
        <h1><?php esc_html_e('Configurações do AGY Social', 'agy-social'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('agysocial-footer-settings-group');
            do_settings_sections('agysocial-footer-settings-group');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Ativar Whatsapp no Rodapé', 'agy-social'); ?></th>
                    <td>
                        <label class="switch">
                            <input type="checkbox" name="agysocial_footer_enabled" value="1" <?php checked(get_option('agysocial_footer_enabled'), '1'); ?>>
                            <span class="slider"></span>
                        </label>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" cl><?php esc_html_e('Número do Whatsapp', 'agy-social'); ?></th>
                    <td>
                        <input type="text" name="agysocial_footer_number"
                            value="<?php echo esc_attr(get_option('agysocial_footer_number')); ?>" />
                        <p><?php esc_html_e('Digite o código do seu país Ex: 55', 'agy-social'); ?></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Lado do Ícone', 'agy-social'); ?></th>
                    <td>
                        <select name="agysocial_footer_position">
                            <option value="right" <?php selected(get_option('agysocial_footer_position'), 'right'); ?>>
                                <?php esc_html_e('Direita', 'agy-social'); ?>
                            </option>
                            <option value="left" <?php selected(get_option('agysocial_footer_position'), 'left'); ?>>
                                <?php esc_html_e('Esquerda', 'agy-social'); ?>
                            </option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e('Estilo do Ícone', 'agy-social'); ?></th>
                    <td class="rolagem">
                        <div style="display: flex; gap: 20px;">
                            <label style="text-align: center;">
                                <input type="radio" name="agysocial_footer_style" value="1" <?php checked(get_option('agysocial_footer_style'), '1'); ?>>
                                <video autoplay loop muted playsinline
                                    style="width:110px;height:110px;display:block;margin:auto;">
                                    <source src="<?php echo esc_url(plugins_url('assets/whats.webm', __FILE__)); ?>"
                                        tylabelideo/webm">
                                </video>
                                <span>AGY Social 1</span>
                            </label>

                            <label style="text-align: center;">
                                <input type="radio" name="agysocial_footer_style" value="2" <?php checked(get_option('agysocial_footer_style'), '2'); ?>>
                                <video autoplay loop muted playsinline
                                    style="width:110px;height:110px;display:block;margin:auto;">
                                    <source src="<?php echo esc_url(plugins_url('assets/whats2.webm', __FILE__)); ?>"
                                        type="video/webm">
                                </video>
                                <span>AGY Social 2</span>
                            </label>

                            <label style="text-align: center;">
                                <input type="radio" name="agysocial_footer_style" value="5" <?php checked(get_option('agysocial_footer_style'), '5'); ?>>
                                <img src="<?php echo esc_url(plugins_url('assets/whats5.png', __FILE__)); ?>"
                                    alt="<?php esc_attr_e('Imagem Whatsapp 5', 'agy-social'); ?>"
                                    style="width:100px;height:100px;display:block;margin:auto;">
                                <span>AGY Social 3</span>
                            </label>


                            <label style="text-align: center;">
                                <input type="radio" name="agysocial_footer_style" value="6" <?php checked(get_option('agysocial_footer_style'), '6'); ?>>
                                <img src="<?php echo esc_url(plugins_url('assets/whats6.png', __FILE__)); ?>"
                                    alt="<?php esc_attr_e('Imagem Whatsapp 6', 'agy-social'); ?>"
                                    style="width:120px;height:120px;display:block;margin:auto;">
                                <span>AGY Social 4</span>
                            </label>


                            <label style="text-align: center;">
                                <input type="radio" name="agysocial_footer_style" value="7" <?php checked(get_option('agysocial_footer_style'), '7'); ?>>
                                <img src="<?php echo esc_url(plugins_url('assets/whats7.png', __FILE__)); ?>"
                                    alt="<?php esc_attr_e('Imagem Whatsapp 7', 'agy-social'); ?>"
                                    style="width:100px;height:100px;display:block;margin:auto;">
                                <span>AGY Social 5</span>
                            </label>

                            <label style="text-align: center;">
                                <input type="radio" name="agysocial_footer_style" value="3" <?php checked(get_option('agysocial_footer_style'), '3'); ?>>
                                <img class="imgmenor" src="<?php echo esc_url(plugins_url('assets/whats3.png', __FILE__)); ?>
" alt="<?php esc_attr_e('Imagem Whatsapp 3', 'agy-social'); ?>"
                                    style="width:200px;height:58px;display:block;margin:auto;">
                                <span>AGY Social 6</span>
                            </label>

                            <label style="text-align: center;">
                                <input type="radio" name="agysocial_footer_style" value="4" <?php checked(get_option('agysocial_footer_style'), '4'); ?>>
                                <img class="imgmenor"
                                    src="<?php echo esc_url(plugins_url('assets/whats4.png', __FILE__)); ?>"
                                    alt="<?php esc_attr_e('Imagem Whatsapp 4', 'agy-social'); ?>"
                                    style="width:200px;height:46px;display:block;margin:auto;">
                                <span>AGY Social 7</span>
                            </label>

                        </div>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Registra as configurações do plugin
add_action('admin_init', 'agysocial_footer_settings');

function agysocial_footer_settings()
{
    register_setting(
        'agysocial-footer-settings-group', 
        'agysocial_footer_enabled', 
        array(
            'type'              => 'boolean',
            'sanitize_callback' => 'rest_sanitize_boolean', // Sanitiza como booleano
        )
    );
    register_setting(
        'agysocial-footer-settings-group', 
        'agysocial_footer_number', 
        array(
            'type'              => 'string',
            'sanitize_callback' => 'sanitize_text_field', // Sanitiza como texto
        )
    );
    register_setting(
        'agysocial-footer-settings-group', 
        'agysocial_footer_position', 
        array(
            'type'              => 'string',
            'sanitize_callback' => 'sanitize_text_field', // Sanitiza como texto
        )
    );
    register_setting(
        'agysocial-footer-settings-group', 
        'agysocial_footer_style', 
        array(
            'type'              => 'string',
            'sanitize_callback' => 'sanitize_text_field', // Sanitiza como texto
        )
    );
}

// Adiciona o ícone do Whatsapp no rodapé do site
add_action('wp_footer', 'agysocial_footer');



function agysocial_footer()
{
    $enabled = get_option('agysocial_footer_enabled');
    $agysocial_number = get_option('agysocial_footer_number');
    $position = get_option('agysocial_footer_position', 'right');
    $style = get_option('agysocial_footer_style', '1');
    $style_css = $position === 'right' ? 'right:10px;' : 'left:10px;';

    if ($enabled && $agysocial_number) {
        $output = '<div style="position:fixed;bottom:10px;' . $style_css . 'z-index:1000;">';

        switch ($style) {
            case '1':
                $output .= '<a href="https://wa.me/' . esc_attr($agysocial_number) . '" target="_blank">
                                <video autoplay loop muted playsinline style="width:110px;height:110px;">
                                    <source src="' . plugins_url('assets/whats.webm', __FILE__) . '" type="video/webm">
                                </video>
                            </a>';
                break;
            case '2':
                $output .= '<a href="https://wa.me/' . esc_attr($agysocial_number) . '" target="_blank">
                                <video autoplay loop muted playsinline style="width:110px;height:110px;">
                                    <source src="' . plugins_url('assets/whats2.webm', __FILE__) . '" type="video/webm">
                                </video>
                            </a>';
                break;
            case '3':
                $output .= '<a href="https://wa.me/' . esc_attr($agysocial_number) . '" target="_blank">
                                <img src="' . plugins_url('assets/whats3.png', __FILE__) . '" alt="AGY SOCIAL 3" style="width:200px;height:58px;">
                            </a>';
                break;
            case '4':
                $output .= '<a href="https://wa.me/' . esc_attr($agysocial_number) . '" target="_blank">
                                <img src="' . plugins_url('assets/whats4.png', __FILE__) . '" alt="AGY SOCIAL 4" style="width:200px;height:46px;">
                            </a>';
                break;

            case '5':
                $output .= '<a href="https://wa.me/' . esc_attr($agysocial_number) . '" target="_blank">
                                    <img src="' . plugins_url('assets/whats5.png', __FILE__) . '" alt="AGY SOCIAL 5" style="width:100px;height:100px;">
                                </a>';
                break;

            case '6':
                $output .= '<a href="https://wa.me/' . esc_attr($agysocial_number) . '" target="_blank">
                                        <img src="' . plugins_url('assets/whats6.png', __FILE__) . '" alt="AGY SOCIAL 6" style="width:120px;height:120px;">
                                    </a>';
                break;

            case '7':
                $output .= '<a href="https://wa.me/' . esc_attr($agysocial_number) . '" target="_blank">
                                            <img src="' . plugins_url('assets/whats7.png', __FILE__) . '" alt="AGY SOCIAL 7" style="width:100px;height:100px;">
                                        </a>';
                break;
        }

        $output .= '</div>';
        echo wp_kses($output, array(
            'div' => array('style' => array()),
            'img' => array('src' => array(), 'alt' => array(), 'style' => array()),
            'video' => array('autoplay' => true, 'loop' => true, 'muted' => true, 'playsinline' => true, 'style' => true),
            'source' => array('src' => array(), 'type' => array()),
            'a' => array('href' => array(), 'target' => array()),
        ));
    }
}
?>