<?php
/*
Plugin Name: Admin Pack by SITE CASEIRO
Plugin URI: http://www.sitecaseiro.com.br
Description: Insira uma imagem personalizada na pagina de login do WP, e configure o Rodap&eacute; da administra&ccedil;&atilde;o.
Author: Gustavo Soares Guerra
Version: 1.1
Author URI: http://www.sitecaseiro.com.br
*/

// Criar menu para o plugin no WP
function add_sc_plugin_admin_personalizado_menu() {
    add_options_page('Admin Pack by SC', 'Admin Pack by SC', 'manage_options', __FILE__, 'admin_sc_plugin_admin_personalizado');
}
add_action('admin_menu', 'add_sc_plugin_admin_personalizado_menu');

// Adicionar opcoes no DB
function set_sc_plugin_admin_personalizado_options() {
    add_option('sc_plugin_admin_personalizado_imagem','');
    add_option('sc_plugin_admin_personalizado_rodape','');
}
// Deleta opcoes quando o plugin &eacute; desinstalado
function unset_sc_plugin_admin_personalizado_options() {
        delete_option('sc_plugin_admin_personalizado_imagem');
        delete_option('sc_plugin_admin_personalizado_rodape');
}
// instrucoes ao instalar ou desistalar o plugin
register_activation_hook(__FILE__,'set_sc_plugin_admin_personalizado_options');
register_deactivation_hook(__FILE__,'unset_sc_plugin_admin_personalizado_options');

// Pagina de opcoes
function admin_sc_plugin_admin_personalizado() {
    ?>
    <div class="wrap">
        <div class="icon32" id="icon-scblog"><br /></div>
        <h2>Admin Pack by SITE CASEIRO</h2>
        <?php 
        if($_REQUEST['submit']) {
            update_sc_plugin_admin_personalizado_options();
        }
        print_sc_plugin_admin_personalizado_form();
        ?>
    </div>
    <?php
}
// Validar opcoes
function update_sc_plugin_admin_personalizado_options() {
    $correto = false;
    
       // Opcao do Imagem de login
    if ($_REQUEST['sc_plugin_admin_personalizado_imagem']) {
        update_option('sc_plugin_admin_personalizado_imagem', $_REQUEST['sc_plugin_admin_personalizado_imagem']);
        $correto = true;
    }
   // Opcao do rodapé do admin
    if ($_REQUEST['sc_plugin_admin_personalizado_rodape']) {
        update_option('sc_plugin_admin_personalizado_rodape', $_REQUEST['sc_plugin_admin_personalizado_rodape']);
        $correto = true;
    }
    if ($correto) {
        ?><div id="message" class="updated fade">
        <p><?php _e('Op&ccedil;&otilde;es salvas.'); ?></p>
        </div> <?php
    }
    else {
        ?><div id="message" class="error fade">
        <p><?php _e('Erro ao salvar as Configura&ccedil;&otilde;es!'); ?></p>
        </div><?php
    }
}

// Formulario de opcoes
function print_sc_plugin_admin_personalizado_form() {
    $default_imagem = get_option('sc_plugin_admin_personalizado_imagem');
    $default_rodape = get_option('sc_plugin_admin_personalizado_rodape');
    $sc_plugin_admin_personalizado_dir = get_bloginfo('url') . '/wp-content/plugins/admin-pack-by-site-caseiro/';
    ?>
    <form action="" method="post">
    <h3 style="margin: 20px 0 -5px;"><?php _e('Logo personalizada no login do WordPress'); ?></h3>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="imagem_op"><?php _e('Coloque a URL de alguma imagem de 310x70 (px) para substituir a logo do WordPress no login.'); ?></label></th>
            <td>
                <legend class="screen-reader-text"><span><?php _e('Logo personaliza no login do WordPress'); ?></span></legend>
                    <p>
                        <textarea class="medium-text code" id="imagem_op" cols="50" rows="2" name="sc_plugin_admin_personalizado_imagem"><?php echo stripcslashes($default_imagem); ?></textarea>
                        <br />
                        <span class="description"><?php _e('Exemplo: http://seublog.com.br/imagem.png'); ?></span>
                    </p>
            </td>
        </tr>
    </table>
    <h3 style="margin: 20px 0 -5px;"><?php _e('Alterar o Rodap&eacute;'); ?></h3>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="rodape_op"><?php _e('Escreva um texto para o Rodap&eacute; da administra&ccedil;&atilde;o do seu WordPress.'); ?></label></th>
            <td>
                <fieldset>
                    <legend class="screen-reader-text"><span><?php _e('Alterar o Rodapé'); ?></span></legend>
                    <p>
                        <textarea class="medium-text code" id="rodape_op" cols="50" rows="4" name="sc_plugin_admin_personalizado_rodape"><?php echo stripcslashes($default_rodape); ?></textarea>
                        <br />
                        <span class="description"><?php _e('Tags HTML e PHP s&atilde;o permitidas apenas para colocar efeitos e links no texto!'); ?></span>
                    </p>
                </fieldset>
            </td>
        </tr>
    </table>
    <p class="submit">
        <input type="submit" class="button-primary" name="submit" value="Salvar Configura&ccedil;&otilde;es" />
    </p>
    <p>
        <a href="http://www.kinghost.com.br/promo/SCDESCONTO10.html" target="_blank" title="Desconto KingHost">
            <img style="border:none;" src="<?php echo $sc_plugin_admin_personalizado_dir; ?>/kinghost.png" alt="Desconto KingHost" />
        </a>
        <a href="http://www.sitecaseiro.com.br" target="_blank" title="SITE CASEIRO - Crie um blog de qualidade e de graça com o Blogger e WordPress">
            <img style="border:none;" src="<?php echo $sc_plugin_admin_personalizado_dir; ?>/sitecaseiro.png" alt="SITE CASEIRO - Crie um blog de qualidade e de graça com o Blogger e WordPress" />
        </a>
    </p>
    </form>
<?php
}
// CSS pagina de opcoes
function sc_plugin_admin_personalizado_add_css_menu() {
$scblog_logo = get_bloginfo('url') . '/wp-content/plugins/admin-pack-by-site-caseiro/scblog-logo.png';
echo '
<style type="text/css">
#icon-scblog {
    background: url("'.$scblog_logo.'") no-repeat scroll 5px 0 #fff;
}
</style>
';
}
add_action('admin_head', 'sc_plugin_admin_personalizado_add_css_menu');
// Adiciona imagem personalizada de login no WP
function sc_plugin_admin_personalizado() {
echo '
<style type="text/css">
h1 a {background:url('. stripcslashes(get_option('sc_plugin_admin_personalizado_imagem')) .') 50% 50% no-repeat !important;}
</style>
';
}
add_action('login_head', 'sc_plugin_admin_personalizado');
function sc_plugin_admin_personalizado_login_url() {
echo bloginfo('url');
}
add_filter('login_headerurl', 'sc_plugin_admin_personalizado_login_url');
function sc_plugin_admin_personalizado_login_title() {
echo bloginfo('name');
}
add_filter('login_headertitle', 'sc_plugin_admin_personalizado_login_title');

// Adiciona texto personalizada no rodapé da administração do WP
function sc_plugin_admin_personalizado_rodape () {
echo '
<style type="text/css">
#footer-upgrade {visibility:hidden !important;}
#footer-left {float:right !important;}
</style>
';
}
add_action('admin_head', 'sc_plugin_admin_personalizado_rodape');
function sc_plugin_admin_personalizado_rodape_admin () {
echo ''. stripcslashes(get_option('sc_plugin_admin_personalizado_rodape')) .'';
}
add_filter('admin_footer_text', 'sc_plugin_admin_personalizado_rodape_admin');

?>