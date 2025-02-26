<?php
/*
Plugin Name: Autor Buscar Página
Plugin URI: http://malnuer.es/php/traducir-author-search-y-page-en-las-url-de-wordpress/
Description: Permite editar las palabras base para <em>Autor</em>, <em>Buscar</em> y <em>Página</em> desde "<strong>Ajustes > Enlaces permanentes</strong>"
Version: 1.0
Author: Manuel Martínez Fernández (@malnuer)
Author URI: http://malnuer.es/
*/

if ( !defined('WPINC') ) { exit; }

new AutorBuscarPagina;

class AutorBuscarPagina {


  public function __construct() {
    add_action( 'init' , array( &$this , 'setAutorBuscarPagina' ) );
    add_action( 'admin_init' , array( &$this , 'adminAutorBuscarPagina' ) );
  }


  public function setAutorBuscarPagina(){
    global $wp_rewrite;

    $abp_autor  = get_option( 'abp_autor',  '' );
    $abp_buscar = get_option( 'abp_buscar', '' );
    $abp_pagina = get_option( 'abp_pagina', '' );

    $wp_rewrite->author_base        = ($abp_autor!='')?  $abp_autor  : 'author'; 
    $wp_rewrite->search_base        = ($abp_buscar!='')? $abp_buscar : 'search'; 
    $wp_rewrite->pagination_base    = ($abp_pagina!='')? $abp_pagina : 'page';

  }


  public function adminAutorBuscarPagina() {
    global $pagenow;

    if ( $pagenow == "options-permalink.php" ) {

      if ( isset($_POST['abp_autor'])  ) { update_option("abp_autor",  $_POST['abp_autor']); }
      if ( isset($_POST['abp_buscar']) ) { update_option("abp_buscar", $_POST['abp_buscar']); }
      if ( isset($_POST['abp_pagina']) ) { update_option("abp_pagina", $_POST['abp_pagina']); }

      add_settings_field('abp_autor',  '<label for="abp_autor">Autor base</label>',   array(&$this, 'abp_autor_render'),  'permalink', 'optional' );
      add_settings_field('abp_buscar', '<label for="abp_buscar">Buscar base</label>', array(&$this, 'abp_buscar_render'), 'permalink', 'optional' );
      add_settings_field('abp_pagina', '<label for="abp_pagina">Página base</label>', array(&$this, 'abp_pagina_render'), 'permalink', 'optional' );

      flush_rewrite_rules();
    }
  }
  

  public function abp_autor_render() {
    ?><input id='abp_autor' name='abp_autor' type='text' class="regular-text code" value='<?php echo get_option( 'abp_autor' ); ?>'><?php
  }

  public function abp_buscar_render() {
    ?><input id='abp_buscar' name='abp_buscar' type='text' class="regular-text code" value='<?php echo get_option( 'abp_buscar' ); ?>'><?php
  }

  public function abp_pagina_render() {
    ?><input id='abp_pagina' name='abp_pagina' type='text' class="regular-text code" value='<?php echo get_option( 'abp_pagina' ); ?>'><?php
  }

}