<?php

/**
 * Quando acessar pagina principal do wordpress, diz para carregar o iframe.
 * @param string $url Endereço original da pagina home
 * @return string Endereço modificado da pagaina home
 */
function pbw_playerbar_container() {
	$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

	if (rtrim($url, '/') != rtrim(get_bloginfo('url'), '/') || isset($_GET[PBW_PAGEINICIAL]) || false !== strpos( $_SERVER['REQUEST_URI'], PBW_PAGEINICIAL )) {
    $_SERVER['REQUEST_URI'] = '/';
    unset( $_GET[PBW_PAGEINICIAL] );
    unset( $_REQUEST[PBW_PAGEINICIAL] );
		return;
	}
	
  $content_url = get_bloginfo( 'url') . '/?' . PBW_PAGEINICIAL;

	ob_start();
  $header_template = locate_template( array( 'header.php' ));
  if ('' != $header_template) {
    include($header_template);
  }
	$header_content = ob_get_contents();
	ob_end_clean();

  preg_match_all('#<meta[^<>]*>#', $header_content, $meta_tags);
  $meta_tags = implode("\n", $meta_tags[0]);

  preg_match_all('#<title[^<>]*>[^<>]*<\s*/\s*title\s*>#', $header_content, $title_tag);
  $title_tag = $title_tag[0][0];

  unset($header_content);

  /**
   * Cria uma nova pagina home com IFRAME, utilizando a url modifcada e url do player
   */
	include(PBW_DIRETORIO_ABSOLUTO_DO_PLUGIN.'includes/templates/pagina_iframe_conteudo.php');
	die();
}