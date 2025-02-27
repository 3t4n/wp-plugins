<?php

// Evitar acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Criar o menu principal e submenus
 */
function notificacoesWoo_menu() {
    add_menu_page(
        'WooCommerce Notificações',
        'WC Notificações',
        'manage_options',
        'notifications-woocommerce',
        'woo_wpp_settings_page_callback',
        plugins_url('notifications-woocommerce/assets/images/icon.png'),
        5
    );

    
}
add_action('admin_menu', 'notificacoesWoo_menu');

/**
 * Carregar Bootstrap no admin
 */
function woo_wpp_load_bootstrap() {
    $screen = get_current_screen();
    if ($screen->id === 'toplevel_page_notifications-woocommerce') {
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    }
}

add_action('admin_enqueue_scripts', 'woo_wpp_load_bootstrap');

/**
 * Registrar as configurações e campos
 */
function woo_wpp_register_settings() {
    $option_group = 'woo_wpp_settings';
    $option_name = 'woo_wpp_options';

    // Registrar a opção no banco de dados
    register_setting($option_group, $option_name, 'woo_wpp_sanitize_options');

    // Seção: Configurações
    add_settings_section('woo_wpp_config_section', '', '', 'woo-wpp-settings');
    add_settings_field('api_server', 'Servidor da API', 'woo_wpp_api_server_callback', 'woo-wpp-settings', 'woo_wpp_config_section');
    add_settings_field('wpp_administrador', 'Número do gerente da loja (opcional)', 'woo_wpp_admin_number_callback', 'woo-wpp-settings', 'woo_wpp_config_section');
    add_settings_field('currency_simbol', 'Símbolo', 'woo_wpp_currency_simbol_callback', 'woo-wpp-settings', 'woo_wpp_config_section');
    add_settings_field('debug', 'Debug', 'woo_wpp_debug_callback', 'woo-wpp-settings', 'woo_wpp_config_section');
    add_settings_field('wpp_drope_api_number', 'Número que irá fazer os envios', 'woo_wpp_drope_number_callback', 'woo-wpp-settings', 'woo_wpp_config_section');
    add_settings_field('drope_api', 'Token', 'woo_wpp_drope_token_callback', 'woo-wpp-settings', 'woo_wpp_config_section');

    // Seção: Mensagens para o Cliente
    add_settings_section('woo_wpp_client_messages_section', '', 'woo_wpp_messages_section_callback', 'woo_wpp_settings_client');
    add_settings_field('wpp_message', 'Primeira mensagem fixa', 'woo_wpp_message_callback', 'woo_wpp_settings_client', 'woo_wpp_client_messages_section');

    // Seção: Mensagens para o Administrador
    add_settings_section('woo_wpp_admin_messages_section', '', 'woo_wpp_messages_section_callback', 'woo_wpp_settings_admin');
    add_settings_field('wpp_message_admin', 'Primeira mensagem fixa', 'woo_wpp_message_admin_callback', 'woo_wpp_settings_admin', 'woo_wpp_admin_messages_section');

    $statuses = [
        'pendente_pagamento' => 'Pendente',
        'aguardando_pagamento' => 'Aguardando',
        'com_falha' => 'Malsucedido',
        'processando' => 'Processando',
        'completo' => 'Concluído',
        'estornado' => 'Reembolsado',
        'cancelado' => 'Cancelado'
    ];

    foreach ($statuses as $slug => $label) {
        add_settings_field("mensagem_enviada_status_$slug", "Status - $label", "woo_wpp_message_status_callback", 'woo_wpp_settings_client', 'woo_wpp_client_messages_section', ['status' => $slug]);
        add_settings_field("mensagem_enviada_status_{$slug}_admin", "Status - $label", "woo_wpp_message_status_admin_callback", 'woo_wpp_settings_admin', 'woo_wpp_admin_messages_section', ['status' => $slug]);
    }
}
add_action('admin_init', 'woo_wpp_register_settings');

/**
 * Função para sanitizar os dados
 */
function woo_wpp_sanitize_options($input) {
    $sanitized = [];
    $sanitized['api_server'] = sanitize_text_field($input['api_server'] ?? 'drope');
    $sanitized['wpp_administrador'] = sanitize_text_field($input['wpp_administrador'] ?? '');
    $sanitized['currency_simbol'] = sanitize_text_field($input['currency_simbol'] ?? 'R$');
    $sanitized['debug'] = sanitize_text_field($input['debug'] ?? 'nao');
    $sanitized['wpp_drope_api_number'] = sanitize_text_field($input['wpp_drope_api_number'] ?? '');
    $sanitized['drope_api'] = sanitize_text_field($input['drope_api'] ?? '');
    $sanitized['wpp_message'] = sanitize_textarea_field($input['wpp_message'] ?? '');
    $sanitized['wpp_message_admin'] = sanitize_textarea_field($input['wpp_message_admin'] ?? '');

    $statuses = ['pendente_pagamento', 'aguardando_pagamento', 'com_falha', 'processando', 'completo', 'estornado', 'cancelado'];
    foreach ($statuses as $status) {
        $sanitized["mensagem_enviada_status_$status"] = sanitize_textarea_field($input["mensagem_enviada_status_$status"] ?? '');
        $sanitized["mensagem_enviada_status_{$status}_admin"] = sanitize_textarea_field($input["mensagem_enviada_status_{$status}_admin"] ?? '');
    }
    return $sanitized;
}

function woo_wpp_messages_section_callback() {
    echo '<div class="alert alert-success" role="alert">';
    echo 'Para personalizar sua mensagem, você pode utilizar os shortcodes abaixo:<br><br>';
    echo '<b>[PEDIDO]</b> = Número do pedido<br>';
    echo '<b>[CLIENTE]</b> = Nome do cliente<br>';
    echo '<b>[ENDERECO]</b> = Endereço de entrega<br>';
    echo '<b>[PRODUTOS]</b> = Lista de produtos comprados + quantidade + valor total<br>';
    echo '<b>[TOTAL_PEDIDO]</b> = Total do pedido<br>';
    echo '<b>[TOTAL_FRETE]</b> = Total do frete<br>';
    echo '<b>[METODO_PAGAMENTO]</b> = Nome do método de pagamento<br>';
    echo '<b>[NOME_LOJA]</b> = Nome da loja<br><br>';
    echo 'Use <b>\n</b> para quebra de linha e emojis de <a href="https://fsymbols.com/pt/emoji/" target="_blank">este site</a>.';
    echo '</div>';
}

function woo_wpp_api_server_callback() {
    $options = get_option('woo_wpp_options');
    $value = $options['api_server'] ?? 'drope';
    echo "<select name='woo_wpp_options[api_server]' class='form-select'>";
    echo "<option value='drope'" . selected($value, 'drope', false) . ">DW-API</option>";
    echo "</select>";
    echo "<small class='form-text text-muted'>Escolha o servidor onde o plugin irá se comunicar.</small>";
}

function woo_wpp_admin_number_callback() {
    $options = get_option('woo_wpp_options');
    $value = $options['wpp_administrador'] ?? '';
    echo "<input type='text' name='woo_wpp_options[wpp_administrador]' value='$value' class='form-control'>";
    echo "<small class='form-text text-muted'>Formato: código do país + DDD + telefone, ex.: 5599123456789</small>";
}

function woo_wpp_currency_simbol_callback() {
    $options = get_option('woo_wpp_options');
    $value = $options['currency_simbol'] ?? 'R$';
    echo "<input type='text' name='woo_wpp_options[currency_simbol]' value='$value' class='form-control w-25'>";
    echo "<small class='form-text text-muted'>Símbolo da moeda (ex.: R$).</small>";
}

function woo_wpp_debug_callback() {
    $options = get_option('woo_wpp_options');
    $value = $options['debug'] ?? 'nao';
    echo "<select name='woo_wpp_options[debug]' class='form-select w-25'>";
    echo "<option value='sim'" . selected($value, 'sim', false) . ">Sim</option>";
    echo "<option value='nao'" . selected($value, 'nao', false) . ">Não</option>";
    echo "</select>";
    echo "<small class='form-text text-muted'>Ativar debug.</small>";
}

function woo_wpp_drope_number_callback() {
    $options = get_option('woo_wpp_options');
    $value = $options['wpp_drope_api_number'] ?? '';
    echo "<input type='text' name='woo_wpp_options[wpp_drope_api_number]' value='$value' class='form-control'>";
    echo "<small class='form-text text-muted'>Formato: código do país + DDD + telefone, ex.: 5599123456789</small>";
}

function woo_wpp_drope_token_callback() {
    $options = get_option('woo_wpp_options');
    $value = $options['drope_api'] ?? '';
    echo "<input type='text' name='woo_wpp_options[drope_api]' value='$value' class='form-control'>";
    echo "<small class='form-text text-muted'>Obtenha o Token <a href='https://painel.dw-api.com' target='_blank'>aqui</a>.</small>";
}

function woo_wpp_message_callback() {
    $options = get_option('woo_wpp_options');
    $value = $options['wpp_message'] ?? 'Olá [CLIENTE], temos uma atualização sobre o seu pedido 😍';
    echo "<textarea name='woo_wpp_options[wpp_message]' rows='4' class='form-control'>$value</textarea>";
}

function woo_wpp_message_admin_callback() {
    $options = get_option('woo_wpp_options');
    $value = $options['wpp_message_admin'] ?? 'Houve uma atualização 🥳';
    echo "<textarea name='woo_wpp_options[wpp_message_admin]' rows='4' class='form-control'>$value</textarea>";
}

function woo_wpp_message_status_callback($args) {
    $options = get_option('woo_wpp_options');
    $status = $args['status'];
    $defaults = [
        'pendente_pagamento' => 'Olá [CLIENTE] 🥰, acabamos de receber o seu pedido [PEDIDO] 🚀 e agora falta pouco para você concluir a sua compra.\nCaso tenha algum problema para efetuar seu pagamento, entre em contato com nosso suporte. 🙆🏽‍♂️',
        'aguardando_pagamento' => 'Olá [CLIENTE] 🥰, acabamos de receber o seu pedido [PEDIDO] 🚀 e agora falta pouco para você concluir a sua compra.\nCaso tenha algum problema para efetuar seu pagamento, entre em contato com nosso suporte. 🙆🏽‍♂️',
        'com_falha' => 'Olá [CLIENTE] 🥰, vimos aqui que houve uma falha no seu pagamento do pedido [PEDIDO], caso esteja com algum problema, sinta-se livre para entrar em contato com nosso suporte. 🙆🏽‍♂️',
        'processando' => 'Olá [CLIENTE] 🥰, recebemos o seu pedido [PEDIDO] e o mesmo agora está em separação.\n\nOs produtos da compra foram: [PRODUTOS] no valor total de [TOTAL_PEDIDO]. \n\nO pedido será entregue em [ENDERECO] \n\n*Obrigado pela compra!*',
        'completo' => 'Olá [CLIENTE] 🥰, o pedido [PEDIDO] foi concluído 🚀.\n\nConta pra nós, o que achou da experiência de compra em nossa loja? Seu feedback é muito importante pra nós 😍',
        'estornado' => 'Olá [CLIENTE] 🥰, o pedido [PEDIDO] foi reembolsado.\n\nSentimos muito que algo de errado tenha acontecido com seu pedido.',
        'cancelado' => 'Olá [CLIENTE] 🥰, o pedido [PEDIDO] foi cancelado.\n\nSe você acha que isso é um erro, entre em contato com nosso suporte.'
    ];
    $value = $options["mensagem_enviada_status_$status"] ?? $defaults[$status];
    echo "<textarea name='woo_wpp_options[mensagem_enviada_status_$status]' rows='4' class='form-control'>$value</textarea>";
}

function woo_wpp_message_status_admin_callback($args) {
    $options = get_option('woo_wpp_options');
    $status = $args['status'];
    $defaults = [
        'pendente_pagamento' => '🔥 Novo pedido: [PEDIDO] no valor de [TOTAL_PEDIDO]. \nStatus: Pendente',
        'aguardando_pagamento' => '🔥 Novo pedido: [PEDIDO] no valor de [TOTAL_PEDIDO]. \nStatus: Aguardando',
        'com_falha' => '❌ O pagamento do pedido [PEDIDO] no valor de [TOTAL_PEDIDO] foi malsucedido.',
        'processando' => '✅ O pedido [PEDIDO] no valor de [TOTAL_PEDIDO] foi pago.',
        'completo' => '✅ O pedido [PEDIDO] no valor de [TOTAL_PEDIDO] foi concluído.',
        'estornado' => '⛔ O pedido [PEDIDO] no valor de [TOTAL_PEDIDO] foi reembolsado.',
        'cancelado' => '⛔ O pedido [PEDIDO] no valor de [TOTAL_PEDIDO] foi cancelado.'
    ];
    $value = $options["mensagem_enviada_status_{$status}_admin"] ?? $defaults[$status];
    echo "<textarea name='woo_wpp_options[mensagem_enviada_status_{$status}_admin]' rows='4' class='form-control'>$value</textarea>";
}

/**
 * Renderizar a página de configurações WhatsApp com Bootstrap e abas
 */
function woo_wpp_settings_page_callback() {
?>
	<style>.grid-container{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;padding-top:10px}.grid-item{border:1px solid #ddd;border-radius:8px;padding:15px;text-align:center;background:#fff;box-shadow:2px 2px 10px rgba(0,0,0,.1)}.grid-item img{width:100%;height:auto;border-radius:5px}.grid-footer{display:flex;align-items:center;justify-content:space-between;margin-top:10px}.grid-footer h3{font-size:16px;margin:0;flex:1;text-align:left;padding-right:10px}.grid-footer a{padding:8px 12px;background:#007bff;color:#fff;text-decoration:none;border-radius:5px;font-weight:700;white-space:nowrap}.grid-footer a:hover{background:#0056b3}@media (max-width:768px){.grid-container{grid-template-columns:repeat(2,1fr)}}@media (max-width:480px){.grid-container{grid-template-columns:1fr}}.woo-wpp-notificacoes-card{background:#fff;padding:20px;border-radius:8px;border:1px solid #c3c4c7;max-width:96%;margin-top:20px}</style>
	<form method="post" action="options.php">
		<?php settings_fields('woo_wpp_settings'); ?>
		<!-- Seção Mensagens com Abas -->
		<div class="woo-wpp-notificacoes-card">
			<div class="card-body">
				<ul class="nav nav-tabs" id="messageTabs" role="tablist" style="border-bottom:none;">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="config-tab" data-bs-toggle="tab" data-bs-target="#config-messages" type="button" role="tab" aria-controls="config-messages" aria-selected="true">Configurações</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="client-tab" data-bs-toggle="tab" data-bs-target="#client-messages" type="button" role="tab" aria-controls="client-messages" aria-selected="false">Mensagens para o cliente</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-messages" type="button" role="tab" aria-controls="admin-messages" aria-selected="false">Mensagens para o gerente</button>
					</li>
				</ul>
				<div class="tab-content mt-2" id="messageTabsContent">
					<!-- Aba Configurações -->
					<div class="tab-pane fade show active" id="config-messages" role="tabpanel" aria-labelledby="config-tab">
						<?php do_settings_sections('woo-wpp-settings'); ?>
					</div>
					<!-- Aba Cliente -->
					<div class="tab-pane fade" id="client-messages" role="tabpanel" aria-labelledby="client-tab">
						<?php do_settings_sections('woo_wpp_settings_client'); ?>
					</div>
					<!-- Aba Administrador -->
					<div class="tab-pane fade" id="admin-messages" role="tabpanel" aria-labelledby="admin-tab">
						<?php do_settings_sections('woo_wpp_settings_admin'); ?>
					</div>
				</div>
			</div>
			<?php submit_button('Salvar Configurações', 'primary', 'submit', true, ['class' => 'btn btn-primary']); ?>
		</div>
	</form>
	<div class="woo-wpp-notificacoes-card">
		<h3 class="el-license-title"><?php _e("Outras licenças", 'notifications-woocommerce'); ?> </h3>
		<p><?php _e("Veja outras licenças oferecidas pela DROPE e turbine seus projetos.", 'notifications-woocommerce'); ?></p>
		<hr>
		<?php
		$json_url = "https://dropestore.com/produtos.json";
		$json_data = file_get_contents($json_url);
		$produtos = json_decode($json_data, true);
		if (!$produtos) {
			echo "<p>Erro ao carregar os produtos.</p>";
			exit;
		}
		?>
		<div class="grid-container">
			<?php foreach ($produtos as $produto) : ?>
				<div class="grid-item">
					<img src="<?= htmlspecialchars($produto['image']) ?>" alt="<?= htmlspecialchars($produto['name']) ?>">
					<div class="grid-footer">
						<h3><?= htmlspecialchars($produto['name']) ?></h3>
						<a href="<?= htmlspecialchars($produto['link']) ?>" target="_blank">Saber mais</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php
}

