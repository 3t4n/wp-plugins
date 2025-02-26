<?php
/*
Plugin Name: ATP Chatbot
Description: Despliega el chatbot de ATP para atender tu web y captar clientes 24/7
Author: Ayuda T Pymes
Author URI: https://ayudatpymes.com/chatbot/
Version: 1.0.0
*/
// function installer(){
//   include('installer.php');
// }
if ( ! defined( 'ABSPATH' ) ) exit;
function atp_uninstaller(){
  include('uninstaller.php');
}
// register_activation_hook( __file__, 'installer' );
register_uninstall_hook(__FILE__, 'atp_uninstaller');

add_action("admin_menu", "atp_plugin_menu_pie");
function atp_plugin_menu_pie() {
  add_menu_page('ATP Chatbot', 'ATP Chatbot', 'manage_options', 'atp_menu_config_pie', 'atp_crear_menu_pie');
}


function atp_crear_menu_pie() {
  if($_POST && $_POST['codigo']) {
    if(strlen($_POST['codigo']) != 73){
      echo '<p class="no-instalar">el token no es válido, asegúrate de copiarlo correctamente</p>';
    }else{
      if ( !empty( $_POST['codigo'] ) ) {
        $texto = sanitize_text_field( $_POST['codigo'] );
        list($idEmpresa, $idChat) = explode("&", $texto);
        if(update_option('id_empresa', $idEmpresa) && update_option('id_chat', $idChat)) {
          echo '<p class="ok-instalar">Chatbot instalado correctamente <i class="far fa-check-circle"></i></p>';
        } else {
          echo '<p class="no-instalar">ERROR - Chatbot no se ha podido instalar</p>';
        }
      }else{
        echo '<p class="no-instalar">ERROR - Chatbot no se ha podido instalar</p>';
      }


    }
  }
    include('chatbotAlma.php');
}

add_action('wp_footer', 'atp_insertar_codigo');
function atp_insertar_codigo(){
  if($idEmpresa = get_option('id_empresa') && $idChat = get_option('id_chat')){
    wp_enqueue_style('atp_chatbot_css', 'https://assistant.almaintelligence.com:7777/stylesAndScripts/version2/iframe.css');
    wp_enqueue_script( 'atp_chatbot_js', 'https://assistant.almaintelligence.com:7777/stylesAndScripts/version2/iframe.js', array(), 2.0 , false);
    add_filter('script_loader_tag', 'atp_add_attributes_to_script', 10, 3);

  ?>
        <!-- Chatbot ALMA -->


        <div id="contenedorChatbot">
             <div id="iframeAlma" class="iframeAlma">
               <div class="superiorIframe">
                 <div class="fotoIframe">
                     <img  id="fotoAvatar" src="https://board.almaintelligence.com/images/users/default.png" data-skip-lazy="" alt="">
                 </div>
                 <div class="nombreIframe">
                   <label class="labelNombreBot"><span id="nombreAsistente">Alma</span><br>
                   <span class="labelDisponibilidadBot">Disponible ahora </span><span class="fuentePunto">●</span></label>
                 </div>
                 <div class="cerrarIframe">
                   <img id="imgCerrar" onclick="ActivarAlma()"  src="https://assistant.almaintelligence.com:7777/stylesAndScripts/version2/img/cruz.png">
                 </div>
               </div>
               <div class="contentIframe"><iframe id="iframeContainerAlma"
               src="https://assistant.almaintelligence.com:7777/comercial/?idDespacho=<?php echo ($valor_option = get_option('id_empresa'))? $valor_option : ''; ?>&idChatbot=<?php echo ($valor_option = get_option('id_chat'))? $valor_option : ''; ?>"
                 width="100%" height="100%"></iframe></div>
               <div id="inferiorIframe" class="inferiorIframe"></div>
             </div>
             <button id="buttonContainer" class="buttonContainer"onclick="ActivarAlma()" style="">
               <img class="imgAlma" id="imgAlma" src="https://assistant.almaintelligence.com:7777/stylesAndScripts/version2/img/botonIframe.png" alt="">
               <span id="notificacionAlma" class="notificacionAlma">1</span>
             </button>
         </div>
       <!-- Fin Chatbot ALMA -->

  <?php
}
};

function atp_add_attributes_to_script( $tag, $handle, $src ) {
  if ( 'atp_chatbot_js' === $handle ) {
    if($idEmpresa = get_option('id_empresa') && $idChat = get_option('id_chat')){
      $tag = '<script type="text/javascript" id="helper" src="' . esc_url( $src ) . '" data-idEmpresa="'.$valor_option = get_option('id_empresa').'" data-idChatbot="'.$valor_option = get_option('id_chat').'" ></script>';
    }
  }
  return $tag;
}

/* Función para excluir atributos */
function atp_rocket_lazyload_exclude_class( $attributes ) {
	$attributes[] = 'id="fotoAvatar"';

	return $attributes;
}
add_filter( 'rocket_lazyload_excluded_attributes', 'atp_rocket_lazyload_exclude_class' );



/* Función para excluir patrones */
function atp_rocket_lazyload_exclude_pattern( $pattern ) {
    $pattern[] = 'assistant.almaintelligence';
    return $pattern;
}
add_filter( 'rocket_lazyload_iframe_excluded_patterns', 'atp_rocket_lazyload_exclude_pattern' );


// https://ayudatpymes.com/wp-content/uploads/2020/06/favicon.png

function atp_load_admin_menu_icon() {

  wp_enqueue_style('atp_menu-icon-chatbot',plugins_url( 'css/menu-icon.css', __FILE__ ));
}

add_action('admin_enqueue_scripts', 'atp_load_admin_menu_icon');
