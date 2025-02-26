<?php
// Função para obter o link de afiliado da categoria mais profunda
function abpdotes_get_affiliate_link_by_deepest_category() {
    if (is_single()) {
        $categories = get_the_category();

        if ($categories && !is_wp_error($categories)) {
            // Ordena as categorias pela profundidade: as categorias filhas ficam primeiro
            usort($categories, function($a, $b) {
                return count(get_ancestors($b->term_id, 'category')) - count(get_ancestors($a->term_id, 'category'));
            });

            // Procura o link de afiliado na categoria mais profunda
            foreach ($categories as $category) {
                $affiliate_link = get_term_meta($category->term_id, 'affiliate_link', true);
                if ($affiliate_link) {
                    return esc_url($affiliate_link);
                }
            }
        }
    }
    return false;
}
// Carrega scripts no frontend
function abpdotes_enqueue_scripts() {
     if (is_user_logged_in()) {
        return; // Se o usuário estiver logado, não carrega o script
    }
    $plugin_status = get_option('abpdotes_onoff', 'active'); // Valor padrão: 'active'
    if ($plugin_status !== 'active') {
        return; // Se não estiver ativo, não injeta o script
    }
    
    $affiliate_link = abpdotes_get_affiliate_link_by_deepest_category();

    if  ($affiliate_link == ""){
        return;
    }

    wp_enqueue_script('affiliate-boost-js', plugins_url('assets/js/affiliate-boost.js', __FILE__), array('jquery'), '1.0', true);

    // Configuração de dados para o JavaScript
    wp_localize_script('affiliate-boost-js', 'affiliateBoostData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'delay' => get_option('abpdotes_delay', 5), // Padrão  (5 segundos)
        'session_lifetime' => get_option('abpdotes_session_lifetime', 1), // Padrão 1 dia
        'link' => esc_url($affiliate_link),
        'event_trigger' => get_option('abpdotes_event_trigger', 'click') 
    ));
}
add_action('wp_enqueue_scripts', 'abpdotes_enqueue_scripts');

?>
