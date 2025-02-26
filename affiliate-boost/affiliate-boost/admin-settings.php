<?php
function abpdotes_register_settings() {
    // Funções de sanitização
    function abpdotes_sanitize_delay($value) {
        return intval($value); // Garantir que seja um número inteiro
    }

    function abpdotes_sanitize_session_lifetime($value) {
        return intval($value); // Garantir que seja um número inteiro
    }

    function abpdotes_sanitize_event_trigger($value) {
        $valid_values = ['load', 'click', 'exit', 'scroll']; // Defina os valores válidos
        return in_array($value, $valid_values) ? $value : 'click'; // Retorne o valor se válido ou um valor padrão
    }

    function abpdotes_sanitize_onoff($value) {
        $valid_values = ['active', 'inactive']; // Defina os valores válidos
        return in_array($value, $valid_values) ? $value : 'inactive'; // Retorne o valor se válido ou um valor padrão
    }

    // Registra as opções antigas com sanitização
    add_option('abpdotes_delay', 10); // Tempo de espera padrão em s
    add_option('abpdotes_session_lifetime', 1); // Tempo de sessão em dias
    add_option('abpdotes_event_trigger', 'click'); // Evento padrão: "Primeiro Clique"
    add_option('abpdotes_onoff', 'active');

    // Registra as opções no banco de dados com sanitização
    register_setting('abpdotes_options_group', 'abpdotes_delay', 'abpdotes_sanitize_delay');
    register_setting('abpdotes_options_group', 'abpdotes_session_lifetime', 'abpdotes_sanitize_session_lifetime');
    register_setting('abpdotes_options_group', 'abpdotes_event_trigger', 'abpdotes_sanitize_event_trigger');
    register_setting('abpdotes_options_group', 'abpdotes_onoff', 'abpdotes_sanitize_onoff');
}

add_action('admin_init', 'abpdotes_register_settings');


function abpdotes_register_options_page() {
    add_options_page('Affiliate Boost', 'Affiliate Boost', 'manage_options', 'abpdotes', 'abpdotes_options_page');
}
add_action('admin_menu', 'abpdotes_register_options_page');

function abpdotes_options_page() {
    ?>
    <div>
        <h2><?php esc_html_e('Configurações do Affiliate Boost ', 'affiliate-boost'); ?></h2>
        <form method="post" action="options.php">
            <?php settings_fields('abpdotes_options_group'); ?>
            <p>
            <label><?php esc_html_e('Tempo de Espera (segundos):', 'affiliate-boost'); ?></label><br>
            <input type="number" name="abpdotes_delay" value="<?php echo esc_attr(get_option('abpdotes_delay')); ?>" /><br />
            </p>

            <p>
            <label><?php esc_html_e('Duração da Sessão (dias):', 'affiliate-boost'); ?></label><br>
            <input type="number" name="abpdotes_session_lifetime" value="<?php echo  esc_attr(get_option('abpdotes_session_lifetime')); ?>" /><br />
            </p>

            <p>
            <label><?php esc_html_e('Evento para abrir o link de afiliado:', 'affiliate-boost'); ?></label><br>
            <select name="abpdotes_event_trigger">
                <option value="load" <?php selected(get_option('abpdotes_event_trigger'), 'load'); ?>> <?php esc_html_e('Carregar a Página', 'affiliate-boost'); ?></option>
                <option value="click" <?php selected(get_option('abpdotes_event_trigger'), 'click'); ?>> <?php esc_html_e('Primeiro Clique', 'affiliate-boost'); ?></option>
                <option value="exit" <?php selected(get_option('abpdotes_event_trigger'), 'exit'); ?>> <?php esc_html_e('Tentativa de Saída do Navegador', 'affiliate-boost'); ?></option>
                <option value="scroll" <?php selected(get_option('abpdotes_event_trigger'), 'scroll'); ?>> <?php esc_html_e('Primeira Rolagem do Mouse', 'affiliate-boost'); ?></option> 
            </select></p>
            <p>
            <label><?php esc_html_e('Status do Plugin:', 'affiliate-boost'); ?></label><br>
            <select name="abpdotes_onoff">
                <option value="active" <?php selected(get_option('abpdotes_onoff'), 'active'); ?>><?php esc_html_e('Ativo', 'affiliate-boost'); ?></option>
                <option value="inactive" <?php selected(get_option('abpdotes_onoff'), 'inactive'); ?>><?php esc_html_e('Inativo', 'affiliate-boost'); ?></option>
            </select>
            </p>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
