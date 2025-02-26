<?php
/**
 * Consentimento de Cookies LGPD
 *
 * @package   Privally
 * @copyright Copyright (C) 2018, Privally - go@privally.io
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 * @wordpress-plugin
 * Plugin Name: Consentimento de Cookies LGPD
 * Version:     1.1.2
 * Plugin URI:  https://privally.io/plugins/wordpress/consentimento-de-cookies-lgpd
 * Description: Este plugin foi projetado para ajudar você a preparar seu website para as regulamentações LGPD relacionadas a cookies.
 * Author:      Privally
 * Author URI:  https://privally.io/
 * Text Domain: privally
 * License:     GPL v3
 *
 * O QUE É LGPD?
 *
 * A Lei Geral de Proteção de Dados (LGPD) é uma lei brasileira destinada a fortalecer e unificar 
 * a proteção de dados pessoais dos cidadãos do Brasil.
 * Para saber mais, acesse https://privally.io/.
 */

// Set the wordpress functions
add_action('wp_head', 'privally_p1_wp_head');
add_action('admin_menu', 'privally_p1_admin_menu');
add_action('admin_init', 'privally_p1_register_settings');

// Put the privally bar on website
function privally_p1_wp_head(){
	$privally_app_code = esc_attr( get_option('privally_app_code') );
	if(!empty($privally_app_code)){
    	?><script type="text/javascript" id="PrivallyApp" src="https://app.privally.io/app.js" pid="<?php echo $privally_app_code; ?>" psrc="wp" async></script><?php
  }
}

// Set the admin menu for this plugin
function privally_p1_admin_menu() {
    add_options_page(
    	'Consentimento de Cookies LGPD', 
    	'Consentimento de Cookies LGPD', 
    	'manage_options', 
    	'functions',
    	'privally_p1_options_page');
}

// Register the vars of this plugin
function privally_p1_register_settings(){
	register_setting('privally-p1-plugin-settings', 'privally_app_code');
}

// Build the options page of plugin
function privally_p1_options_page(){
?>
    <div class="wrap">
      <h2>Consentimento de Cookies LGPD Privally</h2>
      
      <h3>O que &eacute; LGPD?</h3>

      <p>A Lei Geral de Prote&ccedil;&atilde;o de Dados (LGPD) &eacute; uma lei brasileira destinada a fortalecer e unificar a prote&ccedil;&atilde;o de dados pessoais dos cidad&atilde;os do Brasil. Para saber mais, acesse <a href="https://privally.io/" target="_blank">https://privally.io/</a>.</p>

      <h3>LGPD e Consentimento de Cookies</h3>

      <p>A LGDP afirma que, como propriet&aacute;rio de um site, voc&ecirc; n&atilde;o pode presumir que um usu&aacute;rio tenha optado pelos cookies usados ​​em seu site, o que chamamos de consentimento impl&iacute;cito. O usu&aacute;rio deve realizar uma op&ccedil;&atilde;o positiva, expl&iacute;cita, uma &quot;a&ccedil;&atilde;o afirmativa&quot; para sinalizar seu consentimento para o uso de cookies e os mesmos n&atilde;o pode ser for&ccedil;ado a optar pelo uso de cookies.</p>

      <p>Na pr&aacute;tica, n&atilde;o &eacute; poss&iacute;vel sequer rastrear nossos usu&aacute;rios com o Google Analytics sem que os mesmos forne&ccedil;am seu consentimento consciente, informados por voc&ecirc; sobre o que cada Cookie faz.</p>

      <h3>Como este plugin funciona</h3>

      <p>Este plug-in foi projetado para ajudar voc&ecirc; a preparar seu website para as exig&ecirc;ncias da LGPD e GDPR relacionadas a cookies.</p>

      <p>Para configurar seu plugin de <b>&quot;Consentimento de Cookies LGPD&quot;</b>, siga os passos:</p>    	

      <ol>
        <li>Cadastre-se seu site gratuitamente no Portal Privally (<a href="https://www.privally.io/portal/" target="_blank">https://www.privally.io/portal/</a>).</li>
        <li>Informe seu <b>C&oacute;digo Privally</b> no formulário abaixo.</li>
        <li>Crie uma p&aacute;gina com o t&iacute;tulo de &quot;Pol&iacute;tica de Privacidade&quot; e adicione o shortcode <b>[privacy-policy]</b> no corpo da p&aacute;gina.</li>
      </ol>

      <p>&nbsp;</p>

      <form action="options.php" method="post">
        <?php
          settings_fields('privally-p1-plugin-settings');
          do_settings_sections('privally-p1-plugin-settings');
        ?>
        <table>            
            <tr>
                <th>C&oacute;digo Privally</th>
                <td><input type="text" placeholder="C&oacute;digo Privally" name="privally_app_code" value="<?php echo esc_attr( get_option('privally_app_code') ); ?>" size="20" /></td>
            </tr>           
            <tr>
                <td><?php submit_button(); ?></td>
            </tr> 
        </table>
      </form>
    </div>
<?php
}

function privally_p1_policy_shorcode($atts) {
      $html = '';

      $privally_app_code = esc_attr( get_option('privally_app_code') );
      if(!empty($privally_app_code)){
        $html = '<script type="text/javascript" id="PrivallyPolicy" src="https://app.privally.io/policy.js" pid="'.$privally_app_code.'" psrc="wp" async></script>';
      }

      return $html;
}

add_shortcode('privacy-policy', 'privally_p1_policy_shorcode');