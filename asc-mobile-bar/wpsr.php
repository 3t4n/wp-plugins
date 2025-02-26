<?php
/**
 * Plugin Name:       ASC Mobile Bar
 * Plugin URI:        https://wordpress.org/plugins/asc-mobile-bar/
 * Description:       ASC Mobile Bar is a complete social media plugin to add native a floating mobile sharebar with complete control and customization.
 * Version:           1.0
 * Author:            agendasemprecheia(Jailson Pacagnan Santana)
 * Author URI:        https://www.agendasemprecheia.com/
 * Text Domain:       wpsr
 * License: GPLv2 or later (or compatible)
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

/*---------------ADMIN-----------------*/ 

function asc_mobile_bar_panel(){
    add_menu_page('ASC Mobile Bar', 'ASC Mobile Bar', 'manage_options', 'asc-mobile-bar', 'ascmb_func');
  }
  add_action('admin_menu', 'asc_mobile_bar_panel');
  
  function sanitize_checkbox_field( $input ) {
    if ( true === $input ) {
        return 1;
     } else {
        return 0;
     }
  }
  function validate_text($value){
    if ($value) {
      return $value;
    } else {
      return '';
    }
  }
  function validate_number($value){
    
    if (preg_match("/^[0-9]+$/", $value) === 1) {
      return $value;
    } else {
      return '';
    }
  }    
  function ascmb_func(){

    ?>
    <div class="wrap">
      <h2>ASC Mobile Bar</h2>
      </br>
    <?php
          if(array_key_exists('submit_scripts_update',$_POST)){
              $aux=validate_text(sanitize_textarea_field($_POST['custom_css']));
              update_option('ascmb_custom_css',stripslashes($aux));
              $aux=validate_text(sanitize_text_field($_POST['ddd_whatsapp']));
              update_option('ascmb_ddd_whatsapp',stripslashes($aux));
              $aux=validate_text(sanitize_text_field($_POST['WhatsApp_phone']));
              update_option('ascmb_WhatsApp_phone',stripslashes($aux));
              $aux=validate_text(sanitize_text_field($_POST['WhatsApp_message']));
              update_option('ascmb_WhatsApp_message',stripslashes($aux));
              $aux=validate_text(sanitize_text_field($_POST['ddd_telefone']));
              update_option('ascmb_ddd_telefone',stripslashes($aux));
              $aux=validate_text(sanitize_text_field($_POST['telefone']));
              update_option('ascmb_telefone',stripslashes($aux));
              $aux=validate_text(sanitize_text_field($_POST['mapa']));
              update_option('ascmb_mapa',stripslashes($aux));
              $aux=validate_text(sanitize_hex_color($_POST['WhatsApp_color']));
              update_option('ascmb_WhatsApp_color',stripslashes($aux));
              $aux=validate_text(sanitize_hex_color($_POST['whatsAppFont_color']));
              update_option('ascmb_whatsAppFont_color',stripslashes($aux));
              $aux=validate_text(sanitize_hex_color($_POST['telefone_color']));
              update_option('ascmb_telefone_color',stripslashes($aux));
              $aux=validate_text(sanitize_hex_color($_POST['telefoneFont_color']));
              update_option('ascmb_telefoneFont_color',stripslashes($aux));
              $aux=validate_text(sanitize_hex_color($_POST['share_color']));
              update_option('ascmb_share_color',stripslashes($aux));
              $aux=validate_text(sanitize_hex_color($_POST['shareFont_color']));
              update_option('ascmb_shareFont_color',stripslashes($aux));
              $aux=validate_text(sanitize_hex_color($_POST['mapa_color']));
              update_option('ascmb_mapa_color',stripslashes($aux));
              $aux=validate_text(sanitize_hex_color($_POST['mapaFont_color']));
              update_option('ascmb_mapaFont_color',stripslashes($aux));
              $aux=validate_text(sanitize_hex_color($_POST['Background_color']));
              update_option('ascmb_Background_color',stripslashes($aux));
              $aux=sanitize_checkbox_field(isset($_POST['checkWhatsApp']));
              update_option('ascmb_checkWhatsApp',stripslashes($aux));
              $aux=sanitize_checkbox_field(isset($_POST['checkTelefone']));
              update_option('ascmb_checkTelefone',stripslashes($aux));
              $aux=sanitize_checkbox_field(isset($_POST['checkMapa']));
              update_option('ascmb_checkMapa',stripslashes($aux));
              $aux=sanitize_checkbox_field(isset($_POST['checkShare']));
              update_option('ascmb_checkShare',stripslashes($aux));
              $aux=sanitize_checkbox_field(isset($_POST['checkBar']));
              update_option('ascmb_checkBar',stripslashes($aux));
             ?>
             
             <div id="serrings-error-updated" class="serrings-error-updated">
             <strong>Configurações Salvas!</strong>
             </div>
             </br>
             <?php
          }
          $custom_css=get_option('ascmb_custom_css','');
          $ddd_whatsapp=get_option('ascmb_ddd_whatsapp','48');
          $WhatsApp_phone=get_option('ascmb_WhatsApp_phone','');
          $WhatsApp_message=get_option('ascmb_WhatsApp_message','Oi, gostaria de agendar uma consulta');
          $ddd_telefone=get_option('ascmb_ddd_telefone','48');
          $telefone=get_option('ascmb_telefone','');  
          $mapa=get_option('ascmb_mapa','');
          $WhatsApp_color=get_option('ascmb_WhatsApp_color','#42af2b');
          $whatsAppFont_color=get_option('ascmb_whatsAppFont_color','#FFF');
          $telefone_color=get_option('ascmb_telefone_color','#1F1F1F');
          $telefoneFont_color=get_option('ascmb_telefoneFont_color','#FFF');
          $mapa_color=get_option('ascmb_mapa_color','#1F1F1F');
          $mapaFont_color=get_option('ascmb_mapaFont_color','#FFF');
          $share_color=get_option('ascmb_share_color','#1F1F1F');
          $shareFont_color=get_option('ascmb_shareFont_color','#FFF');
          $Background_color=get_option('ascmb_Background_color','#ffffff');
          $checkWhatsApp=get_option('ascmb_checkWhatsApp',false);
          $checkTelefone=get_option('ascmb_checkTelefone',false);
          $checkMapa=get_option('ascmb_checkMapa',false);
          $checkShare=get_option('ascmb_checkShare',false);
          $checkBar=get_option('ascmb_checkBar',false);
?>
            <form method="post" action="">
              <label for="checkBar" class="label labelC">Ativar/Desativar Barra</label>
              <label class="switch">
                <input type="checkbox" name="checkBar" <?php if ($checkBar) echo 'checked="checked"'; ?>  id="checkBar" onclick='handleCheckBar(this);' />
                <span class="slider round"></span>
              </label>
              <label for="checkShare" class="label labelC">Ativar/Desativar botão de compartilhar</label>
                <label class="switch">
                  <input type="checkbox" name="checkShare" <?php if ($checkShare) echo 'checked="checked"'; ?>  id="checkBar" />
                  <span class="slider round"></span>
                </label>
              <br/>
              <div id="options" <?php if ($checkBar){ ?> style="display:block;" <?php }else{?> style="display:none;" <?php } ?>>
                <div class="link" >
                  <div id="checkW" class="checkOptions" <?php if ($checkWhatsApp){ ?> style="display:block;" <?php }else{?> style="display:none;" <?php } ?>>
                  <label for="ddd_whatsapp" style="float: left;margin-right: 1.5%;" class="label">DDD</label>
                  <label for="WhatsApp_phone" class="label">  WhatsApp</label>
                  <input type="text"  class="mini-text" name="ddd_whatsapp" placeholder="DDD" value="<?php print  esc_attr($ddd_whatsapp);?>" />
                  <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="medium-text" name="WhatsApp_phone" placeholder="(Deixe em Branco caso não queira)" value="<?php print esc_attr($WhatsApp_phone);?>"/>
                  <label for="WhatsApp_message" class="label">Mensagem Automática do WhatsApp</label>
                  <input type="text"  class="large-text" id="WhatsApp_message" name="WhatsApp_message" placeholder="Digite aqui sua mensagem automática" value="<?php print esc_attr($WhatsApp_message);?>" />
                  </div>
                  <label for="checkWhatsApp" class="label labelC">Ativar/Desativar WhatsApp</label>
                  <label class="switch">
                    <input type="checkbox" name="checkWhatsApp" <?php if ($checkWhatsApp) echo 'checked="checked"'; ?>  id="checkBar" onclick='handleCheck(this,"checkW");' />
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="link">
                  <div id="checkT" class="checkOptions" <?php if ($checkTelefone){ ?> style="display:block;" <?php }else{?> style="display:none;" <?php } ?>>
                  <label for="ddd_telefone" style="float: left;margin-right: 1.5%;" class="label">DDD</label>
                  <label for="telefone" class="label">  Telefone</label>
                  <input type="text"  class="mini-text" name="ddd_telefone" placeholder="DDD" value="<?php print esc_attr($ddd_telefone);?>" />
                  <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="medium-text" name="telefone" value="<?php print esc_attr($telefone);?>"/>
                  </div>
                  <label for="checkTelefone" class="label labelC">Ativar/Desativar Telefone</label>
                  <label class="switch">
                    <input type="checkbox" name="checkTelefone" <?php if ($checkTelefone) echo 'checked="checked"'; ?>  id="checkBar" onclick='handleCheck(this,"checkT");' />
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="link">
                  <div id="checkM" class="checkOptions" <?php if ($checkMapa){ ?> style="display:block;" <?php }else{?> style="display:none;" <?php } ?>>
                  <label for="mapa" class="label">Localização</label>
                  <input type="text" class="large-text" name="mapa" value="<?php print esc_attr($mapa);?>"/>
                  </div>
                  <label for="checkMapa" class="label labelC ">Ativar/Desativar Mapa</label>
                  <label class="switch">
                    <input type="checkbox" name="checkMapa" <?php if ($checkMapa) echo 'checked="checked"'; ?>  id="checkBar" onclick='handleCheck(this,"checkM");' />
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <br/>
              <br/>
              <div class="configs">
                <div class="config-color">
                      <div class="color">
                      <label for="telefone_color" class="label labelC">Cor do botão do Telefone</label>
                      <input type="color" id="telefone_color" name="telefone_color" value="<?php print esc_attr($telefone_color);?>">
                      </div>
                      <div class="color">
                      <label for="telefoneFont_color" class="label labelC">Cor da fonte do telefone</label>
                      <input type="color" id="telefoneFont_color" name="telefoneFont_color" value="<?php print esc_attr($telefoneFont_color);?>">
                      </div>
                      <div class="color">
                      <label for="WhatsApp_color" class="label labelC">Cor do botão do WhatsApp</label>
                      <input type="color" id="WhatsApp_color" name="WhatsApp_color" value="<?php print esc_attr($WhatsApp_color);?>">
                      </div>
                      <div class="color">
                      <label for="whatsAppFont_color" class="label labelC">Cor da fonte do WhatsApp</label>
                      <input type="color" id="whatsAppFont_color" name="whatsAppFont_color" value="<?php print esc_attr($whatsAppFont_color);?>">
                      </div>
                      <div class="color">
                      <label for="mapa_color" class="label labelC">Cor do botão do Mapa</label>
                      <input type="color" id="mapa_color" name="mapa_color" value="<?php print esc_attr($mapa_color);?>">
                      </div>
                      <div class="color">
                      <label for="mapaFont_color" class="label labelC">Cor da fonte do mapa</label>
                      <input type="color" id="mapaFont_color" name="mapaFont_color" value="<?php print esc_attr($mapaFont_color);?>">
                      </div>
                      <div class="color">
                      <label for="share_color" class="label labelC">Cor do botão Compartilhar</label>
                      <input type="color" id="share_color" name="share_color" value="<?php print esc_attr($share_color);?>">
                      </div>
                      <div class="color">
                      <label for="shareFont_color" class="label labelC">Cor da fonte do compartilhar</label>
                      <input type="color" id="shareFont_color" name="shareFont_color" value="<?php print esc_attr($shareFont_color);?>">                    
                      </div>
                      <div class="color">
                      <label for="Background_color" class="label labelC">Cor de fundo da barra</label>
                      <input type="color" id="Background_color" name="Background_color" value="<?php print esc_attr($Background_color);?>">
                      <div>
                      <input type="button" id="default_color" class="button" value="Restaurar Padrões" onClick="defaultConfig();" />
                      <input type="submit" name="submit_scripts_update" class="button button-primary btnSaveASCMB" value="Salvar"/>
                      </div>
                </div> 
                </div>   
                <div class="custom-inputs" >
                          <label for="custom_css" class="label">CSS Personalizado</label>
                          <textarea id="custom_css" class="textarea" name="custom_css" rows="10" cols="70"><?php print esc_textarea($custom_css);?></textarea>
                </div>
              </div>  
              </div>  
            </form>
    </div>
<?php 
  }


/*---------------Functions-----------------*/ 
function load_style_ASCMB() {
  wp_enqueue_style( 'ASC-Mobile-Bar-Front-Style', plugins_url( '/style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_style', 'load_style_ASCMB' );
add_action( 'wp_enqueue_scripts', 'load_style_ASCMB' );
function load_scripts_ASCMB_ADMIN() {
  wp_enqueue_script( 'ASC-Mobile-Bar-Admin-Script', plugins_url( '/scriptAdmin.js', __FILE__ ) );
  
}
add_action( 'admin_print_scripts', 'load_scripts_ASCMB_ADMIN' );
function load_style_ASCMB_ADMIN() {
  wp_enqueue_style( 'ASC-Mobile-Bar-Admin-Style', plugins_url( '/styleAdmin.css', __FILE__ ) );
}
add_action( 'admin_print_styles', 'load_style_ASCMB_ADMIN' );

function ascmb_display(){
    $checkBar=get_option('ascmb_checkBar',false);
    $custom_css='<style>'.get_option('ascmb_custom_css','').'</style>';
    $checkShare=get_option('ascmb_checkShare',false);
    $checkWhatsApp=get_option('ascmb_checkWhatsApp',false);
    $checkTelefone=get_option('ascmb_checkTelefone',false);
    $checkMapa=get_option('ascmb_checkMapa',false);
    $ddd_whatsapp=get_option('ascmb_ddd_whatsapp','48');
    $WhatsApp_phone=get_option('ascmb_WhatsApp_phone','');
    $WhatsApp_message=get_option('ascmb_WhatsApp_message','Oi, gostaria de agendar uma consulta');
    $ddd_telefone=get_option('ascmb_ddd_telefone','48');
    $telefone=get_option('ascmb_telefone','');
    $mapa=get_option('ascmb_mapa','');
    $share_color=get_option('ascmb_share_color','#42af2b');
    $shareFont_color=get_option('ascmb_shareFont_color','#FFF');
    $mapa_color=get_option('ascmb_mapa_color','#42af2b');
    $mapaFont_color=get_option('ascmb_mapaFont_color','#FFF');
    $WhatsApp_color=get_option('ascmb_WhatsApp_color','#42af2b');
    $whatsAppFont_color=get_option('ascmb_whatsAppFont_color','#FFF');
    $telefone_color=get_option('ascmb_telefone_color','#1F1F1F');
    $telefoneFont_color=get_option('ascmb_telefoneFont_color','#FFF');
    $Background_color=get_option('ascmb_Background_color','#ffffff');
    $size=0;
    $siteURL=get_site_url();
    $mapaContent='';
    $whatsAppContent='';
    $telefoneContent='';
    $btnShare='';
    if($checkTelefone){
      $size++;
    }
    if($checkWhatsApp){
      $size++;
    }
    if($checkMapa){
      $size++;
    }
    if($checkShare){
    $btnShare='<div class="size-3"><a style="background-color:'.$share_color.';border-color:'.$share_color.';color:'.$shareFont_color.';" class="button big round menu y-move asc-mobile-desktop white bg-color1 border-color1 share-button" onclick="share();" >'
.'<i class="fa fa-share-alt"></i></a><script>function share(){ if (navigator.share !== undefined) { navigator.share({'
.'          url: "'.esc_url($siteURL).'",}).then(() => console.log("Successful share")).catch((error) => console.log("Error sharing", error));}'
.'ga(\'send\', \'event\', \'share\', \'asc-mobile\', \'botao 1\');fbq(\'trackCustom\', \'share\');}</script></div>';
    }else{
      $btnShare='';
    }
    
    if($checkTelefone){
      $telefoneContent='<div class="size-'.$size.'">'.'<a style="background-color:'.$telefone_color.' ;border-color:'.$telefone_color.';color:'.$telefoneFont_color.' ;" class="button big round menu y-move asc-mobile-desktop white bg-color1 border-color1" href="tel:'.$telefone.'" onclick="ligar();">'
.'<i class="fa fa-phone"></i>'.(($size<3) ? ' Ligar' :'').'</a><script>'."function ligar(){ga('send', 'event', 'ligacao', 'asc-mobile', 'botao 1'); fbq('trackCustom', 'ligacao');}</script></div>";
    }else{
      $telefoneContent='';
    }
    
    if($checkWhatsApp){
    $whatsAppContent='<div class="size-'.$size.'"><a style="background-color:'.$WhatsApp_color.' ;border-color:'.$WhatsApp_color.';color:'.$whatsAppFont_color.';" class="button big round menu y-move asc-mobile-desktop white bg-color2 border-color2" href="https://api.whatsapp.com/send?phone=55'.$ddd_whatsapp.$WhatsApp_phone.'&amp;text='.$WhatsApp_message.'" onclick=" whatsApp();">'
.'<i class="fa fa-whatsapp"></i>'.(($size<3) ? ' Whatsapp' :'' ).'</a><script>'."function whatsApp(){ga('send', 'event', 'whatsapp message', 'asc-mobile', 'botao 1'); fbq('trackCustom', 'whatsapp');}</script></div>";
    }else{
      $whatsAppContent='';
    }
    
    if($checkMapa){
      $mapaContent='<div class="size-'.$size.'"><a style="background-color:'.$mapa_color.' ;border-color:'.$mapa_color.';color:'.$mapaFont_color.';" class="button big round menu y-move asc-mobile-desktop white bg-color2 border-color2" href="'.$mapa.'" onclick=" mapa();">'
.'<i class="fa fa-map-marker"></i>'.(($size<3) ? ' Mapa' :'' ).'</a><script>'."function mapa(){ga('send', 'event', 'mapa', 'asc-mobile', 'botao 1'); fbq('trackCustom', 'mapa');}</script></div>";
    }else{
      $mapaContent='';
    }

    $contentBar= <<<HEREDOC
<div id="barra-ligacao" style="background-color:{$Background_color} ;" class="col-xs-12 bg-white asc-barra-ligacao asc-mobile">
{$btnShare} {$whatsAppContent} {$telefoneContent} {$mapaContent} {$custom_css}
</div>
HEREDOC;

    if ( wp_is_mobile() && $checkBar){

      print   $contentBar;
     
   
    }
}

add_action('wp_footer','ascmb_display');


?>