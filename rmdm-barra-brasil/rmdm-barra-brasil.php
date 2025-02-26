<?php

/**
  Plugin Name: RMDM Barra Brasil
  Description: Insere a barra do governo brasileiro no wordpress, permitindo selecionar entre as versões IDG-1 e IDG2.
  Version: 2.1.1
  Plugin URI: https://github.com/hexemeister/rmdm-barra-brasil.git
  Author: Renato Moraes
  License: GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class RmdmBarraBrasil {
  function __construct() {
    add_action('admin_menu', array($this, 'RMDM_BARRA_BRASIL_adminPage'));
    add_action('admin_init', array($this, 'RMDM_BARRA_BRASIL_settings'));
    $this->RMDM_BARRA_BRASIL_initBar();
  }

function RMDM_BARRA_BRASIL_initBar() {
  $result = get_option('bb_model')=='1'
      ? require_once 'barra-brasil-IDG1'.DIRECTORY_SEPARATOR.'barra-brasil-idg1.php' 
      : require_once 'barra-brasil-IDG2'.DIRECTORY_SEPARATOR.'barra-brasil-idg2.php';
  $barra = new RmdmBarraBrasil\RmdmBarraBrasil();
}

  function RMDM_BARRA_BRASIL_settings() {
    add_settings_section('wcp_first_section', null, null, 'barra-brasil-settings-page');
    add_settings_field('bb_model', 'Modelo de Barra Brasil', array($this, 'RMDM_BARRA_BRASIL_locationHTML'), 'barra-brasil-settings-page', 'wcp_first_section');
    register_setting('rmdmbarrabrasil', 'bb_model', array('sanitize_callback' => array($this, 'RMDM_BARRA_BRASIL_sanitizeBar'), 'default' => '2'));
  }

function RMDM_BARRA_BRASIL_sanitizeBar($input) {
  if ($input != '1' AND $input != '2') {
    add_settings_error('bb_model', 'wcp_location_error', 'O modelo escolhido de Barra Brasil deve ser IDG 1 ou IDG 2!');
    return get_option('bb_model');
  }
  return $input;
}

function RMDM_BARRA_BRASIL_locationHTML() { ?>
  <select name="bb_model">
    <option value="2" <?php selected(get_option('bb_model'), '2') ?>>IDG 2</option>
    <option value="1" <?php selected(get_option('bb_model'), '1') ?>>IDG 1</option>
  </select>
<?php }

  function RMDM_BARRA_BRASIL_adminPage() {
    add_options_page('Barra Brasil Configuração', 'Barra Brasil Config', 'manage_options', 'barra-brasil-settings-page', array($this, 'RMDM_BARRA_BRASIL_Content_HTML'));
  }
  
  function RMDM_BARRA_BRASIL_Content_HTML() { ?>
    <div class="wrap">
      <h1>RMDM Barra Brasil Settings</h1>
      <form action="options.php" method="POST">
        <?php
          settings_fields('rmdmbarrabrasil');
          do_settings_sections('barra-brasil-settings-page');
          submit_button();
        ?>
      </form>
      <p style="font-style: italic;">criado por <a href="https://github.com/hexemeister/rmdm-barra-brasil" target="_blank">Renato Moraes</a></p>
    </div>
  <?php }
}

$rmdmBarraBrasil = new RmdmBarraBrasil();
