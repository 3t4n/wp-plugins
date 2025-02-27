<?php

/**
 * Plugin Name: Player Barra WebRadio
 * Description: Player barra para webradio utilizando Iframe
 * Version: 0.9.0
 * Author: Matheus Carvalho
 * Author URI: http://matheus.bhz.br
 * License: GPLv2 or later
 */

 /**
  * Medidas de seguraça
  */
  if ( !defined('ABSPATH') ) {
    exit("Acesso negado");
  }

/**
 * Constantes PBW
 */

 define('PBW_PAGEINICIAL', 'playerbar-pageinicial');
 define('PBW_DIRETORIO_ABSOLUTO_DO_PLUGIN',plugin_dir_path(__FILE__));

 /**
  * Altera url da pagina home do site para url definida na constante PBW_PAGEINICIAL, ex:(http://localhost/?playerbar-pageinicial)
  * Cria uma nova pagina home com IFRAME, utilizando a url modifcada e url do player
  */
require_once(PBW_DIRETORIO_ABSOLUTO_DO_PLUGIN.'includes/modifica_url_homepage.php');
add_action('template_redirect', 'pbw_playerbar_container');

/**
 * Cria no menu do wordpess a pagina de cofigurações do plugin
 */
require_once(PBW_DIRETORIO_ABSOLUTO_DO_PLUGIN.'includes/menu_opcoes.php');

