<?php

/**
 * Evitar acesso direto ao arquivo
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Função auxiliar para coletar dados do pedido
 */
function notificacoesWoo_get_order_data($order_id) {
    $options = get_option('woo_wpp_options', []);
    $currency_simbol = $options['currency_simbol'] ?? 'R$';

    // Obter informações do pedido
    $order = wc_get_order($order_id);
    if (!$order) {
        return false;
    }

    $data = [
        'order_id' => $order_id,
        'name' => $order->get_billing_first_name(),
        'phone' => notificacoesWoo_number_internationalization($order->get_billing_country(), $order->get_billing_phone()),
        'wpp_admin' => $options['wpp_administrador'] ?? '',
        'order_total' => $currency_simbol . $order->get_total(),
        'shipping_total' => $currency_simbol . $order->get_total_shipping(),
        'payment_method' => $order->get_payment_method_title(),
        'payment_method_code' => $order->get_payment_method(),
        'address' => implode(', ', array_filter([
            $order->get_billing_address_1(),
            $order->get_billing_address_2(),
            $order->get_billing_city(),
            $order->get_billing_state(),
            $order->get_billing_postcode(),
            $order->get_billing_country()
        ])) . '.',
        'product_list' => '',
        'cotas' => '',
        'rastreio' => ''
    ];

    // Obter lista de produtos
    $products = [];
    foreach ($order->get_items() as $item) {
        $products[] = sprintf(
            '%s (%dund. - %s)',
            $item->get_name(),
            $item->get_quantity(),
            $currency_simbol . $item->get_total()
        );
    }
    $data['product_list'] = implode(', ', $products);

    // Obter números de rifa (se plugin ativo)
    if (is_plugin_active('plugin-rifa-drope/plugin-rifa-drope.php')) {
        $cotas = [];
        foreach ($order->get_items() as $item) {
            if ($numeros = $item->get_meta('billing_cotasescolhidas')) {
                $numeros_array = array_filter(explode(',', $numeros));
                $cotas = array_merge($cotas, $numeros_array);
            }
        }
        $data['cotas'] = implode(', ', $cotas);
    }

    return $data;
}

/**
 * Função principal para lidar com todos os status de pedido
 */
function notificacoesWoo_handle_order_status($order_id, $status) {
    $options = get_option('woo_wpp_options', []);

    // Mapear status para mensagens
    $status_messages = [
        'pending_mp' => ['mensagem_enviada_status_aguardando_pagamento', 'mensagem_enviada_status_aguardando_pagamento_admin'],
        'pending' => ['mensagem_enviada_status_pendente_pagamento', 'mensagem_enviada_status_pendente_pagamento_admin'],
        'on-hold' => ['mensagem_enviada_status_aguardando_pagamento', 'mensagem_enviada_status_aguardando_pagamento_admin'],
        'failed' => ['mensagem_enviada_status_com_falha', 'mensagem_enviada_status_com_falha_admin'],
        'processing' => ['mensagem_enviada_status_processando', 'mensagem_enviada_status_processando_admin'],
        'completed' => ['mensagem_enviada_status_completo', 'mensagem_enviada_status_completo_admin'],
        'refunded' => ['mensagem_enviada_status_estornado', 'mensagem_enviada_status_estornado_admin'],
        'cancelled' => ['mensagem_enviada_status_cancelado', 'mensagem_enviada_status_cancelado_admin']
    ];

    // Verificar se o status é válido
    if (!isset($status_messages[$status])) {
        return;
    }

    // Obter mensagens específicas do status
    [$notify_client_key, $notify_admin_key] = $status_messages[$status];
    $notify_client = $options[$notify_client_key] ?? '';
    $notify_admin = $options[$notify_admin_key] ?? '';

    // Coletar dados do pedido
    $data = notificacoesWoo_get_order_data($order_id);
    if (!$data) {
        return;
    }

    // Condição específica para pending_mp (Mercado Pago)
    if ($status === 'pending_mp') {
        $excluded_methods = [
            'cod', 'bacs', 'pix_gateway', 'wc_piggly_pix_gateway', 
            'pagarme-banking-ticket', 'paghiper_pix', 
            'woo-pagarme-payments-pix', 'woo-pagarme-payments-credit_card', 
            'wc_pagarme_pix_payment_geteway'
        ];
        if (in_array($data['payment_method_code'], $excluded_methods)) {
            return;
        }
    }

    // Condição específica para processing (Rifa Drope)
    if ($status === 'processing' && function_exists('get_field')) {
        if (is_plugin_active('plugin-rifa-drope/plugin-rifa-drope.php') && get_field('numeros_aleatorios_quando', 99991) === 'Normal (pós confirmação de pagamento)') {
            return;
        }
    }

    // Enviar mensagem
    return notificacoesWoo_send_message(
        $data['order_id'],
        $data['name'],
        $data['product_list'],
        $data['address'],
        $data['order_total'],
        $data['shipping_total'],
        $data['payment_method'],
        $data['cotas'],
        $data['phone'],
        $notify_client,
        $data['wpp_admin'],
        $notify_admin,
        $data['rastreio']
    );
}

/**
 * Funções específicas chamando a função principal
 */
function notificacoesWoo_pendente_mp($order_id) {
    return notificacoesWoo_handle_order_status($order_id, 'pending_mp');
}

function notificacoesWoo_pendente($order_id) {
    return notificacoesWoo_handle_order_status($order_id, 'pending');
}

function notificacoesWoo_onhold($order_id) {
    return notificacoesWoo_handle_order_status($order_id, 'on-hold');
}

function notificacoesWoo_falhou($order_id) {
    return notificacoesWoo_handle_order_status($order_id, 'failed');
}

function notificacoesWoo_processando($order_id) {
    return notificacoesWoo_handle_order_status($order_id, 'processing');
}

function notificacoesWoo_completo($order_id) {
    return notificacoesWoo_handle_order_status($order_id, 'completed');
}

function notificacoesWoo_estornado($order_id) {
    return notificacoesWoo_handle_order_status($order_id, 'refunded');
}

function notificacoesWoo_cancelado($order_id) {
    return notificacoesWoo_handle_order_status($order_id, 'cancelled');
}