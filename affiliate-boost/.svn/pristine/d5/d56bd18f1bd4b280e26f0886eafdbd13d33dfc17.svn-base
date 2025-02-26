<?php
/*
Plugin Name: Affiliate Boost
Description: Plugin para maximizar conversões redirecionando usuários para links de afiliados configuráveis, com integração fácil e opções de personalização.
Version: 1.0.3
Author: Luiz Jr. Fernandes / Guilherme Tetamanti
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define('ABPDOTES_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Inclui os arquivos necessários
include_once ABPDOTES_PLUGIN_DIR . 'admin-settings.php';
include_once ABPDOTES_PLUGIN_DIR . 'frontend-functions.php';



// Adiciona o campo de afiliado no editor de categorias
function abpdotes_add_affiliate_link_field($term) {
    // Obtém o valor do campo personalizado para a categoria atual
    $affiliate_link = get_term_meta($term->term_id, 'affiliate_link', true);
	wp_nonce_field('abp_save_affiliate_link', 'abp_affiliate_link_nonce');
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="affiliate_link"><?php esc_html_e('Link de Afiliado', 'affiliate-boost'); ?></label>
        </th>
        <td>
            <input type="url" id="affiliate_link" name="affiliate_link" value="<?php echo esc_attr($affiliate_link); ?>" placeholder="https://www...">
            <p class="description"><?php esc_html_e('Insira o link de afiliado para esta categoria.', 'affiliate-boost'); ?></p>
        </td>
    </tr>
    <?php
}
add_action('category_edit_form_fields', 'abpdotes_add_affiliate_link_field');


function abpdotes_save_affiliate_link_field($term_id) {
    // Verifique se o nonce é válido
    if (!isset($_POST['abp_affiliate_link_nonce']) || !check_admin_referer('abp_save_affiliate_link', 'abp_affiliate_link_nonce')) {
        return; // Se o nonce não for válido, não processe o formulário
    }

    // Verifique se o campo affiliate_link existe e não está vazio
    if (isset($_POST['affiliate_link']) && !empty($_POST['affiliate_link'])) {
        // Remove as barras invertidas       
        $affiliate_link = isset($_POST['affiliate_link']) ? sanitize_text_field(wp_unslash($_POST['affiliate_link'])) : '';

        // Sanitiza a URL para garantir que seja válida
        $affiliate_link = esc_url_raw($affiliate_link); // Garantindo a sanitização de URL
        
        // Se a URL for válida, atualiza o meta campo da categoria
        if ($affiliate_link) {
            update_term_meta($term_id, 'affiliate_link', $affiliate_link);
        } else {
            // Se a URL não for válida, deleta o meta campo
            delete_term_meta($term_id, 'affiliate_link');
        }
    } else {
        // Se o campo estiver vazio, remove o meta campo
        delete_term_meta($term_id, 'affiliate_link');
    }
}
add_action('edited_category', 'abpdotes_save_affiliate_link_field');