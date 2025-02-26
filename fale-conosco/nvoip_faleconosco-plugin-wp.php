<?php

/**
 * @package Nvoip
 */
/*
Plugin Name: Fale Conosco
Plugin URI: https://www.nvoip.com.br
Description: Facilitate communication between you and your website visitors, through call requests, chat and whatsapp, all in one place.
Version: 1.0.2
Author: Nvoip
License:  https://www.nvoip.com.br/documentos/termo-de-uso.pdf
*/

class Nvoip_FC_Plugin {

  public function __construct()
  {
	  
    add_action('admin_menu', array($this, 'create_plugin_settings_page'));
    add_action('admin_init', array($this, 'setup_sections'));
    add_action('admin_init', array($this, 'setup_fields'));
	add_action("wp_footer","faleConoscoRender");
	add_shortcode("nvoip_faleconosco","faleConoscoShortcode");

	  function faleConoscoRender(){
		$modeView = get_option('modeView');
		$callMe = get_option('callMe');
		$callMe_Token = get_option('callMe_Token');
		$chatNvoip = get_option('chatNvoip');
		$chatNvoip_Token = get_option('chatNvoip_Token');
		$whatsApp = get_option('whatsApp');
		$ColorNvoipIcon = get_option('ColorNvoipIcon');
		$ColorCallmeIcon = get_option('ColorCallmeIcon');
		$ColorMaisImIcon = get_option('ColorMaisImIcon');
		$ColorWppIcon = get_option('ColorWppIcon');
		$ImgLogoIcon= get_option('ImgLogoIcon');
		$sideOption = get_option('sideOption');
		$ImgLogo = get_option('ImgLogo');
		$TextContactBalloon = get_option('TextContactBalloon');
		//whatsapp
		$TextContactWhatsapp = get_option('TextContactWhatsapp');
		$select_Cod_Pais_hidden = get_option('select_Cod_Pais_hidden');
		$NumberContactWhatsapp = get_option('NumberContactWhatsapp');
		$Number_Contact_Whatsapp_hidden = get_option('Number_Contact_Whatsapp_hidden');
		
		//callme
		$ColorPrimary = get_option('ColorPrimary');
		$ColorBorder = get_option('ColorBorder');
		$ColorBackgroundCallme = get_option('ColorBackgroundCallme');
		$TxtFirstParagraphCallmeFirstPage = get_option('TxtFirstParagraphCallmeFirstPage');
		$TxtSecondParagraphCallmeFirstPage = get_option('TxtSecondParagraphCallmeFirstPage');
		$TxtFirstParagraphCallmeSecondPage = get_option('TxtFirstParagraphCallmeSecondPage');
		$TxtFirstParagraphCallmeThirdPage = get_option('TxtFirstParagraphCallmeThirdPage');
		$TxtSecondParagraphCallmeThirdPage = get_option('TxtSecondParagraphCallmeThirdPage');
			  
		  echo '
		  
		   
		   
						

						<div id="included-content-faleConosco""></div>
				<style> 
						.nvoipIcon {
								width: 40px;
								margin-top: 13%;
								margin-left: 0px;
							}
						/* Cores Icones */
						.menuT12{
						background-color:'.esc_html($ColorNvoipIcon).';
						cursor:pointer;
						}
						.callMe{
						background-color:'.esc_html($ColorCallmeIcon).';
						cursor:pointer
						}
						.chat{
						background-color:'.esc_html($ColorMaisImIcon).';
						cursor:pointer
						}
						.whatsapp{
						background-color:'.esc_html($ColorWppIcon).';
						cursor:pointer
						}
						
						.icon.callMe:hover{
						background-color:'.esc_html($ColorCallmeIcon).';
						cursor:pointer
						}
						.icon.chat:hover{
						background-color:'.esc_html($ColorMaisImIcon).';
						cursor:pointer
						}
						.icon.whatsapp:hover{
						background-color:'.esc_html($ColorWppIcon).';
						cursor:pointer
						}
// 						.nvoipDivIcon{
// 						height: 30px;
// 						width:30px;
// 						}
						.nvoipIcon{
// 						height:30px;
// 						width:30px;
						margin-top:0px !important;
						}
						#mais-support-widget #mais-support-after-chat-area header{
						display:flex;
						align-items:center;
						justify-content:center;
						}
						/* Cores CallMe */
						
						
						.popupwindow-popup{
						background-color:'.esc_html($ColorBackgroundCallme).';
						border:1px solid '.esc_html($ColorBorder).'
						}
						.popuptab-popup{
						border-right:1px solid '.esc_html($ColorBorder).'
						}
						.PopupTabActive{
						color:'.esc_html($colorPrimary).'
						}
						
						
						.submitbutton-now{
						background-color:'.esc_html($colorPrimary).'
						}
						.submitbtn-callmelater{
							background-color:'.esc_html($colorPrimary).'
						}
						.submitbtn-sendmessage{
							background-color:'.esc_html($colorPrimary).'
						}
						.PopupTabActive .popupicon-popup svg{
						fill:'.esc_html($colorPrimary).'
						}
						
						.popuptabgroup-popup{
						border-bottom: 1px solid '.esc_html($colorBorder).'
						}
						
						/* Dimensões da logo */
						
						
						.nvoipDivIcon{
						display:flex;
						border-radius:45px;
//  						background:url('.esc_html($ImgLogoIcon).');
						background-size: 100%;
  						animation: pulse-orange 3s  infinite;
						}
						@keyframes pulse-orange {
							0% {
							  box-shadow: 0 0 0 0px '.esc_html($ColorNvoipIcon).'92;
							}
							
							100% {
 							  box-shadow: 0 0 0 40px '.esc_html($ColorNvoipIcon).'00;
							}
						  }
						  
						.nvoipIcon{
// 						display:none;
						}
						
					
						.logo-callme{
						width:'.esc_html($WidthLogo).'px !important;
						height:'.esc_html($HeigthLogo).'px!important;
						}
						
						
						/*Textos Primeira Pagina*/
						
						.textitem-callmenow{
						font-size:0
						}
						.textitem-callmenow:nth-child(1)::before{
						content:"'.esc_html($TxtFirstParagraphCallmeFirstPage).'";
						font-size:19px !important
						}
						.textitem-callmenow:nth-child(2)::before{
						content:"'.esc_html($TxtSecondParagraphCallmeFirstPage).'";
						font-size:19px !important
						}
						/*Textos Segunda Pagina*/
						.textitem-callmelater{
						font-size:0
						}
						.textitem-callmelater:nth-child(1)::before{
						content:"'.esc_html($TxtFirstParagraphCallmeSecondPage).'";
						font-size:19px !important
						}
						/*Textos Terceira Pagina*/
						.textitem-sendmessage{
						font-size:0
						}
						.textitem-sendmessage:nth-child(1)::before{
						content:"'.esc_html($TxtFirstParagraphCallmeThirdPage).'";
						font-size:19px !important
						}
						.textitem-sendmessage:nth-child(2)::before{
						content:"'.esc_html($TxtSecondParagraphCallmeThirdPage).'";
						font-size:19px !important
						}
						
						/* Textos Alertas 1ª Pagina */
						
						#ErrorLabel_165759114016993436{
						font-size:0px
						}
						#ErrorLabel_165759114016993436::before{
						content:"'.esc_html($TxtAlertNumberErrorFirstPage).'";
			  			font-size:10px  !important
						}
						
						/* Textos Alertas 2ª Pagina */
						
						#ErrorLabel_165759114016920425{
						font-size:0px
						}
						#ErrorLabel_165759114016920425::before{
						content:"'.esc_html($TxtAlertNumberErrorFirstPage).'";
			  			font-size:10px  !important
						}
							/* Textos Alertas 3ª Pagina */
						
						#ErrorLabel_165759114016920425{
						font-size:0px
						}
						#ErrorLabel_165759114016920425::before{
						content:"'.esc_html($TxtAlertNumberErrorFirstPage).'";
			  			font-size:10px  !important
						}
						
						/* Alinhamento Callme */
						.popuptabgroup-popup{
						margin-bottom:20px
						}
						.popupcontentelement-popup{
						padding: 20px 20px 0
						}
						.submitbutton-now{
						margin-top:43px
						}
						.inputcontainer-now{
						margin-top:37px
						}
						footer.help-popup{
						padding:0px;
						}
						input.input-now{
						font-size:16px;
						}
						input.time-callmelater{
						margin-bottom:0px;
						}
						input.phone2-callmelater{
						font-size:16px;
						margin-bottom:0px
						}
						input.date-callmelater{
						font-size:16px;
						margin-bottom:0px
						}
						input.phone2-callmelater{
						font-size:16px;
						margin-bottom:0px
						}
						input.name-sendmessage{
						font-size:16px;
						margin-bottom:0px
						}
						textarea.textarea-sendmessage{
						font-size:16px;
						margin-bottom:0px
						}
						input.email-sendmessage{
						font-size:16px;
						margin-bottom:0px;
						}
						div.popuplabel-popup{
						font-size:14px
						}
						
						
				</style>
						
						
						
				<script>
				if('.esc_html($modeView).' == "1"){
						let iconView ="'.esc_html($ImgLogoIcon).'"
						
						let sideOption = "right"
						sideOption = "'.esc_html($sideOption).'"
						if (sideOption == 1){
						sideOption = "left"
						} else {
						sideOption = "right"
						}
						let chatVisible  = ""
						chatVisible ="'.esc_html($chatNvoip).'"
						if (chatVisible == 1){
						 chatVisible = false
						} else {
						chatVisible = true
						}
						
						let wppVisible = ""
						wppVisible = "'.esc_html($whatsApp).'"
						if (wppVisible == 1){
						 wppVisible = false
						} else {
						wppVisible = true
						}
						let callmeVisible = ""
						callmeVisible="'.esc_html($callMe).'"
						if (callmeVisible == 1){
						 callmeVisible = false
						} else {
						callmeVisible = true
						}
						
				
						  (function(win, doc, scriptTag, jsFile, token, element) {
            win.addEventListener("load", function() {
                win.top.chatNvoip || (function() {
                    element = doc.createElement(scriptTag);
                    scriptTag = doc.getElementsByTagName(scriptTag)[0];
                    element.src = "https://nvoipcom.s3.sa-east-1.amazonaws.com/public/faleConosco/embed.js"
                    element.id = "chatNvoip";
                    element.charset = "utf-8";
                    element.setAttribute("wpp-contact-number","'.esc_html($NumberContactWhatsapp).'")
                    element.setAttribute("wpp-contact-text","'.esc_html($TextContactWhatsapp).'")
                    element.setAttribute("balloontxt", "'.esc_html($TextContactBalloon).'");
                    element.setAttribute("position", sideOption);
                    element.setAttribute("wpp-visible", wppVisible);
                    element.setAttribute("chat-visible", chatVisible);
                    element.setAttribute("callme-visible", callmeVisible);
                    element.setAttribute("tokenchat", "'.esc_html($chatNvoip_Token).'");
                    element.setAttribute("tokencallme", "'.esc_html($callMe_Token).'");
					
                    scriptTag.parentNode.insertBefore(element, scriptTag);
                })()
            })
        })(window, document, "script", "https://nvoipcom.s3.sa-east-1.amazonaws.com/public/faleConosco/embed.js");
		

     setTimeout(()=>{
// 	 if (iconView === ""){
// 	 document.querySelector(".nvoipIcon").style.display = "flex"
// 	 }
             document.querySelector("#div-callMe").addEventListener("click", ()=>{
			 document.getElementsByClassName("textitem-callmenow")[1].style.display ="none"
			 let inputCel = document.getElementsByClassName("inputcontainer-now")[0]
			 let secondText = document.createElement("div")
			 secondText.setAttribute("class","second-text-now")
			 secondText.innerHTML = "'.esc_html($TxtSecondParagraphCallmeFirstPage).'"
			 secondText.style.fontSize = "19px"
			 inputCel.parentElement.insertBefore(secondText, inputCel);
			 
			document.getElementsByClassName("help-popup")[0].innerHTML= "Desenvolvido por "
  			let clickHere = document.createElement("a")
			clickHere.setAttribute("class", "clickHere")
 			clickHere.href = "https://www.nvoip.com.br"
			clickHere.style.marginLeft ="3px"
			clickHere.target= "_blank"
 			clickHere.innerHTML = "Nvoip"
			document.getElementsByClassName("help-popup")[0].appendChild(clickHere)
			
			
   			document.getElementsByClassName("popuptab-popup")[0].addEventListener("click", ()=>{
				 
				 setTimeout(()=>{
				 let inputCel = document.getElementsByClassName("inputcontainer-now")[0]
				 
				 if(document.querySelector(".second-text-now") === null){
				 if(document.getElementsByClassName("textitem-callmenow")[1] != null){
				 document.getElementsByClassName("textitem-callmenow")[1].style.display ="none"}
					 let secondText = document.createElement("div")
					 secondText.setAttribute("class","second-text-now")
					 secondText.innerHTML = "'.esc_html($TxtSecondParagraphCallmeFirstPage).'"
					secondText.style.fontSize = "19px"
					inputCel.parentElement.insertBefore(secondText, inputCel);
					}
					},230)
 	 })
	 
	 
          document.querySelector(".logo-callme").src = "'.esc_html($ImgLogo).'"
			 
 			

          })
	 },1000)
 	}
						</script>';
	  }

	  
	  function faleConoscoShortcode(){
		  echo '
						

						<div id="included-content-faleConosco""></div>		
				<script>
						let iconView ="'.esc_html($ImgLogoIcon).'"
						
						let sideOption = "right"
						sideOption = "'.esc_html($sideOption).'"
						if (sideOption == 1){
						sideOption = "left"
						} else {
						sideOption = "right"
						}
						let chatVisible  = ""
						chatVisible ="'.esc_html($chatNvoip).'"
						if (chatVisible == 1){
						 chatVisible = false
						} else {
						chatVisible = true
						}
						
						let wppVisible = ""
						wppVisible = "'.esc_html($whatsApp).'"
						if (wppVisible == 1){
						 wppVisible = false
						} else {
						wppVisible = true
						}
						let callmeVisible = ""
						callmeVisible="'.esc_html($callMe).'"
						if (callmeVisible == 1){
						 callmeVisible = false
						} else {
						callmeVisible = true
						}
						
						  (function(win, doc, scriptTag, jsFile, token, element) {
            win.addEventListener("load", function() {
                win.top.chatNvoip || (function() {
                    element = doc.createElement(scriptTag);
                    scriptTag = doc.getElementsByTagName(scriptTag)[0];
                    element.src = "https://nvoipcom.s3.sa-east-1.amazonaws.com/public/faleConosco/embed.js"
                    element.id = "chatNvoip";
                    element.charset = "utf-8";
                    element.setAttribute("wpp-contact-number", "'.esc_html($NumberContactWhatsapp).'")
                    element.setAttribute("wpp-contact-text", "'.esc_html($TextContactWhatsapp).'")
                    element.setAttribute("balloontxt", "'.esc_html($TextContactBalloon).'");
                    element.setAttribute("position", sideOption);
                    element.setAttribute("wpp-visible", wppVisible);
                    element.setAttribute("chat-visible", chatVisible);
                    element.setAttribute("callme-visible", callmeVisible);
                    element.setAttribute("tokenchat", "'.esc_html($chatNvoip_Token).'");
                    element.setAttribute("tokencallme", "'.esc_html($callMe_Token).'");
					
                    scriptTag.parentNode.insertBefore(element, scriptTag);
                })()
            })
        })(window, document, "script", "https://nvoipcom.s3.sa-east-1.amazonaws.com/public/faleConosco/embed.js");
		

     setTimeout(()=>{
// 	 if (iconView === ""){
// 	 document.querySelector(".nvoipIcon").style.display = "flex"
// 	 }
             document.querySelector("#div-callMe").addEventListener("click", ()=>{
			 if(document.getElementsByClassName("textitem-callmenow")[1] !=null){
			 document.getElementsByClassName("textitem-callmenow")[1].style.display ="none"}
			 let inputCel = document.getElementsByClassName("inputcontainer-now")[0]
			 let secondText = document.createElement("div")
			 secondText.setAttribute("class","second-text-now")
			 secondText.innerHTML = "'.esc_html($TxtSecondParagraphCallmeFirstPage).'"
			 secondText.style.fontSize = "19px"
			 inputCel.parentElement.insertBefore(secondText, inputCel);
			 
			document.getElementsByClassName("help-popup")[0].innerHTML= "Desenvolvido por "
  			let clickHere = document.createElement("a")
			clickHere.setAttribute("class", "clickHere")
 			clickHere.href = "https://www.nvoip.com.br"
			clickHere.style.marginLeft ="3px"
			clickHere.target= "_blank"
 			clickHere.innerHTML = "Nvoip"
			document.getElementsByClassName("help-popup")[0].appendChild(clickHere)
			
			
   			document.getElementsByClassName("popuptab-popup")[0].addEventListener("click", ()=>{
				 
				 setTimeout(()=>{
				 let inputCel = document.getElementsByClassName("inputcontainer-now")[0]
				 
				 if(document.querySelector(".second-text-now") === null){
				 if(document.getElementsByClassName("textitem-callmenow")[1] != null){
				 document.getElementsByClassName("textitem-callmenow")[1].style.display ="none"}
					 let secondText = document.createElement("div")
					 secondText.setAttribute("class","second-text-now")
					 secondText.innerHTML = "'.esc_html($TxtSecondParagraphCallmeFirstPage).'"
					secondText.style.fontSize = "19px"
					inputCel.parentElement.insertBefore(secondText, inputCel);
					}
					},230)
 	 })
	 
	 
          document.querySelector(".logo-callme").src = "'.esc_html($ImgLogo).'"
			 
 			

          })
	 },1000)
 	
						</script>';
	  }
  }

  public function create_plugin_settings_page()
  {
    $page_title = 'Nvoip Fale Conosco Configurações';
    $menu_title = 'Fale Conosco';
    $capability = 'manage_options';
    $slug = 'nvoip_FC_fields';
    $callback = array($this, 'plugin_settings_page_content');
    $icon = plugin_dir_url(__FILE__) . 'images/icon_nvoip.png';
    $position = 20;
    add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
  }
  public function setup_sections()
  {		add_settings_section('our_first_section', 'Defina o modo de exibição do Fale Conosco em suas páginas', array($this, 'section_callback'), 'nvoip_FC_fields');
	   add_settings_section('our_second_section', 'Defina os itens que serão exibidos no Fale Conosco', array($this, 'section_callback'), 'nvoip_FC_fields');
	   add_settings_section('our_color_section', 'Defina as cores dos ícones', array($this, 'section_callback'), 'nvoip_FC_fields');
	  add_settings_section('our_contact_section', 'Defina qual será o número de contato do whatsapp', array($this, 'section_callback'), 'nvoip_FC_fields');
	  add_settings_section('our_text_wpp_section', 'Defina a mensagem padrão enviada pelo whatsapp', array($this, 'section_callback'), 'nvoip_FC_fields');
	  add_settings_section('our_first_son_section', 'Defina qual o lado da página que o ícone será renderizado', array($this, 'section_callback'), 'nvoip_FC_fields');
// 	  add_settings_section('our_first_son_icon_section', 'Insira a logo que será exibida no ícone do Fale Conosco', array($this, 'section_callback'), 'nvoip_FC_fields');
	 
	  add_settings_section('our_txt_balloon_section', 'Defina o texto que será exibido no balão de diálogo', array($this, 'section_callback'), 'nvoip_FC_fields');
	   add_settings_section('our_color_section', 'Defina as cores dos ícones', array($this, 'section_callback'), 'nvoip_FC_fields');
        add_settings_section('our_third_section', 'Insira a logo que será exibida na tela', array($this, 'section_callback'), 'nvoip_FC_fields');
// 		add_settings_section('our_fourth_section', 'Defina as dimensões da logo', array($this, 'section_callback'), 'nvoip_FC_fields');
		add_settings_section('our_fifth_section', 'Defina as cores da tela', array($this, 'section_callback'), 'nvoip_FC_fields');
		add_settings_section('our_sixth_section', 'Defina os texto da aba Me Ligue Agora', array($this, 'section_callback'), 'nvoip_FC_fields');
		add_settings_section('our_seventh_section', 'Defina o texto da aba Me Ligue Depois', array($this, 'section_callback'), 'nvoip_FC_fields');
	    add_settings_section('our_eighth_section', 'Defina os texto da aba Deixe Sua Mensagem', array($this, 'section_callback'), 'nvoip_FC_fields');
	 
	  
  }
	
	
	

  public function section_callback($arguments)
  {
    switch ($arguments['id']) {
      case 'our_first_section':
        echo '';
        break;
        case 'our_second_section':
          echo '';
          break;
    }
  }

  public function setup_fields()
  {
    $fields = array(
	array(
        'uid' => 'modeView',
        'label' => 'Modo de exibição:',
        'section' => 'our_first_section',
        'type' => 'modeView',
      ),
	array(
        'uid' => 'callMe',
        'label' => 'Telefonia',
        'section' => 'our_second_section',
        'type' => 'callMe',
      ),
		array(
        'uid' => 'callMe_Token',
        'label' => 'Insira a tag de telefonia:',
        'section' => 'our_second_section',
        'type' => 'callMe_Token',
      ),
		
	array(
        'uid' => 'chatNvoip',
        'label' => 'Chat',
        'section' => 'our_second_section',
        'type' => 'chatNvoip',
      ),
		array(
        'uid' => 'chatNvoip_Token',
        'label' => 'Insira a tag do chat:',
        'section' => 'our_second_section',
        'type' => 'callMe_Token',
      ),
	
		array(
        'uid' => 'whatsApp',
        'label' => 'Whatsapp',
        'section' => 'our_second_section',
        'type' => 'whatsApp',
      ),
	
	
	 array(
        'uid' => 'ColorCallmeIcon',
        'label' => 'Ícone Telefonia:',
        'section' => 'our_color_section',
        'type' => 'color',
			),
		array(
        'uid' => 'ColorNvoipIcon',
        'label' => 'Ícone Fale Conosco:',
        'section' => 'our_color_section',
        'type' => 'color',
			),
	 
	 array(
        'uid' => 'ColorMaisImIcon',
        'label' => 'Ícone Chat:',
        'section' => 'our_color_section',
        'type' => 'color',
			),
	 
	array(
        'uid' => 'TextContactBalloon',
        'label' => 'Texto do balão de diálogo:',
        'section' => 'our_txt_balloon_section',
        'type' => 'text',
			),
	array(
        'uid' => 'TextContactWhatsapp',
        'label' => 'Insira a mensagem:',
        'section' => 'our_text_wpp_section',
        'type' => 'text',
			),
	array(
        'uid' => 'select_Cod_Pais_hidden',
        'section' => 'our_text_wpp_section',
        'type' => 'selectCodPaishidden',
			),
		
// 	 array(
//         'uid' => 'Public_Callme',
//         'label' => 'Public Token Telefonia:',
//         'section' => 'our_first_section',
//         'type' => 'text',
// 			),
// 	array(
//         'uid' => 'Public_Chat',
//         'label' => 'Public Token Chat:',
//         'section' => 'our_first_section',
//         'type' => 'text',
// 			),
	array(
        'uid' => 'NumberContactWhatsapp',
        'label' => 'Whatsapp:',
        'section' => 'our_contact_section',
        'type' => 'whatsappNumber',
			),
		array(
        'uid' => 'Number_Contact_Whatsapp_hidden',
        'section' => 'our_contact_section',
        'type' => 'whatsappNumberhidden',
			),
	 array(
        'uid' => 'ImgLogoIcon',
        'label' => 'Link da imagem:',
        'section' => 'our_first_son_icon_section',
        'type' => 'img',
			),
	 array(
        'uid' => 'sideOption',
        'label' => 'Lado:',
        'section' => 'our_first_son_section',
        'type' => 'radio',
		
	 ),
     array(
        'uid' => 'ImgLogo',
        'label' => 'Link da imagem:',
        'section' => 'our_third_section',
        'type' => 'imgMeligue',
			),
// 	 array(
//         'uid' => 'HeigthLogo',
//         'label' => 'Altura:',
//         'section' => 'our_fourth_section',
//         'type' => 'rangeHeight',
// 			),
// 	 array(
//         'uid' => 'WidthLogo',
//         'label' => 'Largura:',
//         'section' => 'our_fourth_section',
//         'type' => 'rangeWidth',
// 			),
	 
	 array(
        'uid' => 'ColorPrimary',
        'label' => 'Cor Primaria:',
        'section' => 'our_fifth_section',
        'type' => 'color',
			),
	 array(
        'uid' => 'ColorBorder',
        'label' => 'Cor da borda:',
        'section' => 'our_fifth_section',
        'type' => 'color',
			),
	 array(
        'uid' => 'ColorBackgroundCallme',
        'label' => 'Cor do fundo:',
        'section' => 'our_fifth_section',
        'type' => 'color',
			),
	 array(
        'uid' => 'TxtFirstParagraphCallmeFirstPage',
        'label' => 'Texto da 1ª linha:',
        'section' => 'our_sixth_section',
        'type' => 'meliguetext',
			),
	 array(
        'uid' => 'TxtSecondParagraphCallmeFirstPage',
        'label' => 'Texto da 2ª linha:',
        'section' => 'our_sixth_section',
        'type' => 'meliguetext',
			),

		
	 array(
        'uid' => 'TxtFirstParagraphCallmeSecondPage',
        'label' => 'Texto da 1ª linha:',
        'section' => 'our_seventh_section',
        'type' => 'meliguetext',
			), 
	 array(
        'uid' => 'TxtFirstParagraphCallmeThirdPage',
        'label' => 'Texto da 1ª linha:',
        'section' => 'our_eighth_section',
        'type' => 'meliguetext',
			),
	 array(
        'uid' => 'TxtSecondParagraphCallmeThirdPage',
        'label' => 'Texto da 2ª linha:',
        'section' => 'our_eighth_section',
        'type' => 'meliguetext',
			),
	
	
	
		
    );
    foreach ($fields as $field) {
      add_settings_field($field['uid'], $field['label'], array($this, 'field_callback'), 'nvoip_FC_fields', $field['section'], $field);
      register_setting('nvoip_FC_fields', $field['uid']);
    }
  }


  public function field_callback($arguments)
  {
    $value = get_option( $arguments['uid'] );
	$checked = get_option( $arguments['uid']);

    if( ! $value ) {
      if (isset($arguments['default'])) {
        $value = $arguments['default'];
      } else {
        $value = '';
      }
    }
	
    switch ($arguments['type']) {
    case 'text':
        printf('<input class="--input" type="text" name="%1$s" id="%1$s" placeholder="%2$s" value="%3$s" style="border-radius:30px">', $arguments['uid'], $arguments['placeholder'], $value);
        break;
		
		case 'callMe_Token':
			printf('<input class="--input" type="text" name="%1$s" id="%1$s" placeholder="%2$s" value="%3$s" style="border-radius:30px;height: 35px;width: 450px;" maxlength="70">', $arguments['uid'], $arguments['placeholder'], $value);
		break;
	case 'meliguetext':
        printf('<input class="--input" type="text" name="%1$s" id="%1$s" placeholder="%2$s" value="%3$s" style="border-radius:30px;height: 35px;width: 600px;" maxlength="70">', $arguments['uid'], $arguments['placeholder'], $value);
        break;
	case 'imgMeligue':
			printf('<input class="header_logo_url_me_ligue" type="text" name="%1$s" id="input-logo"  value="%3$s"  style="border-radius:30px">', $arguments['uid'], $arguments['placeholder'], $value);
			printf('<img class="header_logo_url_me_ligue" type="text" name="%1$s" id="img-preview-logo"  src="%3$s"  style="display:none;">', $arguments['uid'], $arguments['placeholder'], $value);
			printf('
                <a href="#" class="header_logo_upload_me_ligue">Upload</a>');
			break;
	case 'img':
			printf('<input class="header_logo_url" type="text" name="%1$s" id="img-preview-fc"  value="%3$s"  style="border-radius:30px">', $arguments['uid'], $arguments['placeholder'], $value);
			printf('<img class="header_logo_url" type="text" name="%1$s" id="img-preview-fc"  src="%3$s"  style="display:none;">', $arguments['uid'], $arguments['placeholder'], $value);
			printf('
                <a href="#" class="header_logo_upload">Upload</a>');
			break;
	case 'color':
			printf('<input class="--input" type="color" name="%1$s" id="%1$s" placeholder="%2$s" value="%3$s" >', $arguments['uid'], $arguments['placeholder'], $value);
			break;
	case 'radio':
       printf('<label>Esquerdo</label><input class="--input" min="1" max="2" type="range" name="%1$s"  id="%1$s" value="%3$s"><label>Direito</label>', $arguments['uid'], $arguments['placeholder'], $value);
		break;
	case 'modeView':
			
       printf('<label>Todas as páginas</label><input class="--input" min="1" max="2" type="range" name="%1$s"  id="%1$s" value="%3$s" onchange="toggleModeView(this.value);"><label>Páginas específicas</label>', $arguments['uid'], $arguments['placeholder'], $value);
		break;
	case 'callMe':
       printf('<input class="--input" min="1" max="2" type="range" name="%1$s"  id="%1$s" value="%3$s" onchange="toggleCallme(this.value);"style="
    width: 40px;
"><label id="toggleCallme"></label>', $arguments['uid'], $arguments['placeholder'], $value);
		break;
	case 'chatNvoip':
       printf('<input class="--input" min="1" max="2" type="range" name="%1$s"  id="%1$s" value="%3$s" onchange="toggleChat(this.value);"style="
    width: 40px;
"><label id="toggleChat"></label>', $arguments['uid'], $arguments['placeholder'], $value);
		break;
    case 'whatsApp':
       printf('<input class="--input" min="1" max="2" type="range" name="%1$s"  id="%1$s" value="%3$s" onchange="toggleWpp(this.value);"style="
    width: 40px;
"><label id="toggleWpp"></label>', $arguments['uid'], $arguments['placeholder'], $value);
			
		break;
		
// 	case 'rangeHeight':
//         printf('<input class="--input" min="1" max="50" type="range" name="%1$s"  id="%1$s" value="%3$s" onchange="updateTextInputHeight(this.value);"><label id="Height">%3$s px</label>', $arguments['uid'], $arguments['placeholder'], $value);
// 		break;
// 	case 'rangeWidth':
//         printf('<input class="--input" min="1" max="285" type="range" name="%1$s"  id="%1$s" value="%3$s" onchange="updateTextInputWidth(this.value);"><label id="Width">%3$s px</label>', $arguments['uid'], $arguments['placeholder'], $value);
// 		break;
		case 'whatsappNumber':
			printf('<input class="--input" type="text" name="%1$s" id="%1$s" placeholder="551199999999" value="%3$s" style="border-radius:30px">', $arguments['uid'], $arguments['placeholder'], $value);
			
        break;
			case 'whatsappNumberhidden':
			printf('<input class="--input" type="hidden" name="%1$s" id="%1$s" placeholder="%2$s" value="%3$s" style="border-radius:30px">', $arguments['uid'], $arguments['placeholder'], $value);
        break;
			case 'selectCodPaishidden':
			printf('<input class="--input" type="hidden" name="%1$s" id="%1$s" placeholder="%2$s" value="%3$s" style="border-radius:30px">', $arguments['uid'], $arguments['placeholder'], $value);
        break;
			
    }
  }

  public function admin_notice()
  { ?>
    <div class="notice notice-success is-dismissible" style="position:absolute;top:2%;right:3%;border-radius:5px;">
      <p>Seus dados foram atualizados!</p>
    </div>
	
<?php
	  
  }
 
  public function plugin_settings_page_content()
  { 
  ?>
	

    <div class="wrap-" style="padding:20px; padding-top:2px;border-radius:10px;background:#fff;border:1px solid #e8dede !important;margin-top:20px;margin-right:20px;">
		<div class="img-not-valid" style="font-weight: 600;display:flex;position:fixed;right: 5%;border-radius: 7px;background: #dd2a2a;box-shadow: 1px 1px 6px 1px;top: 40px;">
		
      <div id="alert-img-logo" style="
    
    display: flex;
    align-items: center;
    color: #fff;
    height: 40px;
    padding-right: 27px;
    padding-left: 21px;
    border-radius: 4px;

">Imagem com tamanho não permitido</div>
    	</div>
		
<div style="font-weight: 600;display: flex;justify-content: center;position: absolute;right: 3%;border-radius: 7px;margin-top: 7px;"><svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 Z M12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 Z M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M12,6 C14.209139,6 16,7.790861 16,10 C16,11.7948083 14.8179062,13.3135239 13.1897963,13.8200688 L13,13.8739825 L13,14 C13,14.5522847 12.5522847,15 12,15 C11.4871642,15 11.0644928,14.6139598 11.0067277,14.1166211 L11,14 L11,13 C11,12.4871642 11.3860402,12.0644928 11.8833789,12.0067277 L12.1492623,11.9945143 C13.1841222,11.9181651 14,11.0543618 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,10.5522847 9.55228475,11 9,11 C8.44771525,11 8,10.5522847 8,10 C8,7.790861 9.790861,6 12,6 Z"/>
</svg>
</div>
      <div>
		  <h2 style="margin-bottom:25px;font-size:35px">Fale Conosco Nvoip</h2> 
		  <h5 style="margin-bottom:10px;margin-top:4px;margin-left:3px;font-size:14px;font-weight:initial;">
			  O Fale Conosco é um plugin que tem por objetivo facilitar a comunicação entre visitantes de seu site e sua empresa, por meio de telefonia, chat e whatsapp, tudo isso em um só lugar.
		  </h5>
		  
	</div>
		<div>
		  <h5 style="margin-bottom:15px;margin-top:25px;font-size:25px">Configurações</h5> 
			<h5 style="margin-bottom:10px;margin-top:4px;margin-left:3px;font-size:14px;font-weight:initial;">
			Para utilizar os recursos de chat e telefonia deste plugin é necessário ter uma conta na <a href="https://www.nvoip.com.br" target="_blank" style="text-decoration:none;cursor:pointer;">Nvoip</a> e para ter acesso ao public token de telefonia basta entrar em contato com nosso time de atendimento pelo número 0800 878 3122.
				 </h5>
	</div>
	<div style="display:flex; margin-bottom:10px ">
			<div id="geral" class="select" style="
			display:flex;
			justify-content:center;
			align-items:center;
			height:30px;
			width:60px;
			margin-right: 20px;
			background: #c7c1bedb;
			color:#fff;
			border-radius: 20px;
			font-weight:bold;
			cursor:pointer;"
				 >
				Geral
			</div>
			<div id="telefonia" style="display:flex;
			justify-content:center;
			align-items:center;
			height:30px;
			width:85px;
			margin-right: 20px;
			background: #c7c1bedb;
			color:#fff;
			border-radius: 20px;
			font-weight:bold;
			cursor:pointer;">
				Telefonia
			</div>
			<div id="whatsapp"style="display:flex;
			justify-content:center;
			align-items:center;
			height:30px;
			width:85px;
			margin-right: 20px;
			background: #c7c1bedb;
			color:#fff;
			border-radius: 20px;
			font-weight:bold;
			cursor:pointer;"
				 >
				Whatsapp
			</div>
		</div>
		<div id="warning-wpp" style="display:none">
			<p   style="font-size: 14px;font-weight:400;">
				Insira o código do país, em seguida o código de área e número do whatsapp.
			</p>
		</div>
		<div id="indice-mode-view" class="always-render" style="display:none">
			<p   style="font-size: 14px;font-weight:400;">
				 O modo de exibição "Todas as páginas" permitirá que o Fale Conosco seja exibido em todas as páginas.
			</p>
		</div>
		<div id="indice-mode-view" class="short-code" style="display:none">
			<p   style="font-size: 14px;font-weight:400;">
				O modo de exibição "Páginas específicas" permitirá que o Fale Conosco seja exibido em páginas específicas. Para isso basta inserir o shortCode [nvoip_faleconosco] na página desejada.
			</p>
		</div>
		
      <?php
	 
   
      if (isset($_GET['settings-updated']) && $_GET['settings-updated']) {
        $this->admin_notice();
      }
      ?>
      <form class="--form" 
			method="post" 
			action="options.php" 
			style="padding:20px;border-radius:10px;background:#f7f7f782;border:1px solid #e8dede !important">
<!--  		  <div id="conteudo-pagina-lida"style="height: 368px;width: 440px;border-radius:10px;background:#fff;border:1px solid #e8dede !important;position: absolute;right: 4%;">  -->
			
			 
<!-- 		  </div> -->
		  
        <?php
        $this->_nap = '';
        if (get_option('Public_token_FC') !== null) {
          $this->_nap = get_option('Public_token_FC', '');
        }if(function_exists( 'wp_enqueue_media' )){
				wp_enqueue_media();
			}else{
				wp_enqueue_style('thickbox');
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
			}
	  
        settings_fields('nvoip_FC_fields');
	  
        do_settings_sections('nvoip_FC_fields');
	  
        ?>
		  
        <button id='submit-Form-Nvoip' style='cursor:pointer;display: none;width: 15%;height: 35px;border-radius: 17px;background-color: #f37435;color: #fff;border: 1px;align-items: center;justify-content: center;align-content: center;flex-direction: column-reverse;'>Salvar</button>
		  <div id='botao-submit' onclick="validateFields()" style='cursor:pointer;display: flex;width: 20%;height: 35px;border-radius: 17px;background-color: #f37435;color: #fff;border: 1px;align-items: center;justify-content: center;align-content: center;flex-direction: column-reverse;'>Salvar</div>
       
      </form>
		
		<script>
	let inputNumberWpp = document.querySelector("#NumberContactWhatsapp")
	let botaoSubmit = document.querySelector("#botao-submit")
	let submitFormNvoip = document.querySelector("#submit-Form-Nvoip")
	let imgLogoMeLigue = document.querySelector("#input-logo")
	let imgPreview = document.querySelector("#img-preview-logo")
	let alertImgLogo =  document.querySelector(".img-not-valid")
	function validateFields() {
		 imgPreview.src = imgLogoMeLigue.value
		setTimeout(()=>{
			if (document.querySelector("#toggleCallme").innerHTML == "Habilitado" && document.querySelector("#callMe_Token").value == ''){
				document.querySelector("#callMe_Token").style.borderColor = "#e30909"
				document.querySelector("#geral").click()
				document.querySelector("#callMe_Token").focus()
				document.querySelector("#alert-img-logo").innerHTML = "Public Token não inserido."
				alertImgLogo.classList.add("show-alert")
				document.addEventListener("click", () =>{
					alertImgLogo.classList.remove("show-alert") })
				
			} if (document.querySelector("#toggleChat").innerHTML == "Habilitado" && document.querySelector("#chatNvoip_Token").value == ''){
				document.querySelector("#chatNvoip_Token").style.borderColor = "#e30909"
				document.querySelector("#geral").click()
				document.querySelector("#chatNvoip_Token").focus()
				document.querySelector("#alert-img-logo").innerHTML = "Public Token não inserido."
				alertImgLogo.classList.add("show-alert")
				document.addEventListener("click", () =>{
					alertImgLogo.classList.remove("show-alert") })
				
			} else if (document.querySelector("#toggleWpp").innerHTML == "Habilitado" && document.querySelector("#NumberContactWhatsapp").value == ''){
				document.querySelector("#NumberContactWhatsapp").style.borderColor = "#e30909"
				document.querySelector("#whatsapp").click()
				document.querySelector("#NumberContactWhatsapp").focus()
				document.querySelector("#alert-img-logo").innerHTML = "Número do whatsapp não inserido."
				alertImgLogo.classList.add("show-alert")
				document.addEventListener("click", () =>{
					alertImgLogo.classList.remove("show-alert") })
				
			}
			
			else if(imgPreview.naturalWidth > 285 
			
			   || imgPreview.naturalHeight > 50
			  ){
				imgLogoMeLigue.style.borderColor = "#e30909"
				document.querySelector("#telefonia").click()
				imgLogoMeLigue.focus()
				document.querySelector("#alert-img-logo").innerHTML = "Imagem com tamanho não permitido."
				alertImgLogo.classList.add("show-alert")
				document.addEventListener("click", () =>{
					alertImgLogo.classList.remove("show-alert") })
			} else {
				
				submitFormNvoip.click()
			}
					   },100)
		
	}
			document.getElementsByTagName("h2")[1].appendChild(document.querySelector(".short-code"))
			document.getElementsByTagName("h2")[1].appendChild(document.querySelector(".always-render"))
				document.getElementsByTagName("h2")[1].style.marginBottom = 0
		document.getElementsByTagName("tr")[2].style.display = "none"
		document.getElementsByTagName("tr")[4].style.display = "none"	
			let arrayGeral = [
				document.getElementsByTagName("h2")[1],
				document.getElementsByClassName("form-table")[0],
				document.getElementsByTagName("h2")[2],
				document.getElementsByClassName("form-table")[1],
				document.getElementsByTagName("h2")[3],
				document.getElementsByClassName("form-table")[2],
				document.getElementsByTagName("h2")[6],
				document.getElementsByClassName("form-table")[5],
				document.getElementsByTagName("h2")[7],
				document.getElementsByClassName("form-table")[6],
				
			]
			let arrayTelefonia = [
				document.getElementsByTagName("h2")[8],
				document.getElementsByClassName("form-table")[7],
				document.getElementsByTagName("h2")[9],
				document.getElementsByClassName("form-table")[8],
// 				document.getElementsByTagName("h2")[10],
// 				document.getElementsByClassName("form-table")[9],
				document.getElementsByTagName("h2")[10],
				document.getElementsByClassName("form-table")[9],
				document.getElementsByTagName("h2")[11],
				document.getElementsByClassName("form-table")[10],
				document.getElementsByTagName("h2")[12],
				document.getElementsByClassName("form-table")[11],
				
				
			]
			let arrayWhatsapp = [
				document.getElementsByTagName("h2")[4],
				document.getElementsByClassName("form-table")[3],
				document.getElementsByTagName("h2")[5],
				document.getElementsByClassName("form-table")[4],
			]
			
				for(let i=0; i < arrayGeral.length; i++){
				arrayGeral[i].style.display = "block"
					
				}
				for(let i=0; i< arrayTelefonia.length;i++){
					arrayTelefonia[i].style.display = "none"
				}
				for(let i=0;i< arrayWhatsapp.length;i++){
					arrayWhatsapp[i].style.display="none"
				}
			
			document.querySelector("#geral").addEventListener("click",() =>{
				document.querySelector("#geral").setAttribute("class", "select")
				document.querySelector("#telefonia").removeAttribute("class")
				document.querySelector("#whatsapp").removeAttribute("class")
				for(let i=0; i < arrayGeral.length; i++){
				arrayGeral[i].style.display = "block"
					
			}
				for(let i=0; i< arrayTelefonia.length;i++){
					arrayTelefonia[i].style.display = "none"
				}
				for(let i=0;i< arrayWhatsapp.length;i++){
					arrayWhatsapp[i].style.display="none"
				}
			})
			document.querySelector("#telefonia").addEventListener("click",() =>{
				document.querySelector("#telefonia").setAttribute("class", "select")
				document.querySelector("#geral").removeAttribute("class")
				document.querySelector("#whatsapp").removeAttribute("class")
				for(let i=0; i < arrayGeral.length; i++){
				arrayGeral[i].style.display = "none"
			}
				for(let i=0; i< arrayTelefonia.length;i++){
					arrayTelefonia[i].style.display = "block"
				}
				for(let i=0;i< arrayWhatsapp.length;i++){
					arrayWhatsapp[i].style.display="none"
				}
			})
			document.querySelector("#whatsapp").addEventListener("click",() =>{
				document.querySelector("#whatsapp").setAttribute("class", "select")
				document.querySelector("#geral").removeAttribute("class")
				document.querySelector("#telefonia").removeAttribute("class")
				document.getElementsByTagName("h2")[4].appendChild(document.querySelector("#warning-wpp"))
				document.getElementsByTagName("h2")[4].style.marginBottom = 0
				for(let i=0;i< arrayWhatsapp.length;i++){
					arrayWhatsapp[i].style.display="block"
				}
				for(i=0; i < arrayGeral.length; i++){
				arrayGeral[i].style.display = "none"
				}
				for(let i=0; i< arrayTelefonia.length;i++){
					arrayTelefonia[i].style.display = "none"
				}
				document.querySelector("#warning-wpp").style.display = "flex"
			})
// 	inputNumberWpp.addEventListener('mouseover',()=>{
// 		document.querySelector("#warning-wpp").style.display = "flex"
// 		document.querySelector("#warning-wpp").classList.add("show-warning-wpp")
// 	})
// 	inputNumberWpp.addEventListener('onmouseover',()=>{
// 		document.querySelector("#warning-wpp").style.display = "flex"
// 	})	
    jQuery(document).ready(function($) {
        $('.header_logo_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload da Imagem'
                },
                multiple: false
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.header_logo').attr('src', attachment.url);
                $('.header_logo_url').val(attachment.url);
	
            })
            .open();
        });
    });
			
			    jQuery(document).ready(function($) {
        $('.header_logo_upload_me_ligue').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload da Imagem'
                },
                multiple: false
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.header_logo_me_ligue').attr('src', attachment.url);
                $('.header_logo_url_me_ligue').val(attachment.url);
	
            })
            .open();
        });
    });
</script>
	<style>
		input#Public_Callme{
			width:300px
		}
		input#Public_Chat{
			width:300px
		}
.select{
	background:#f37435 !important;
}
	
		.img-not-valid{
			opacity: 0;
    		pointer-events: none;
			transition: opacity .3s linear;
		}
		div.show-alert {
			opacity: 1;
			transition: opacity .3s linear;
		}
		
#modeView {
	 -moz-appearance: none;
  -webkit-appearance: none;
  height: 7px;
  width: 40px;
  border-radius: 5px;  
  background: #d3d3d3;
  outline: none;
  -webkit-transition: .2s;
}

#modeView::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  border-radius: 50%; 
  background: #f37435;
  cursor: pointer;
}
	

#modeView::-moz-range-thumb {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #f37435;
  cursor: pointer;
	border:0px
}
		
#sideOption {
  -webkit-appearance: none;
  height: 7px;
  width: 40px;
  border-radius: 5px;  
  background: #d3d3d3;
  outline: none;
  -webkit-transition: .2s;
}

#sideOption::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  border-radius: 50%; 
  background: #f37435;
  cursor: pointer;
}
		

#sideOption::-moz-range-thumb {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #f37435;
  cursor: pointer;
	border:0px
}
#whatsApp {
  -webkit-appearance: none;
  height: 7px;
  border-radius: 5px;  
  background: #d3d3d3;
  outline: none;
  -webkit-transition: .2s;
}

#whatsApp::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  border-radius: 50%; 
  background: 
#f37435;
  cursor: pointer;
}

#whatsApp::-moz-range-thumb {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #f37435;
  cursor: pointer;
	border:0px
}
		
#chatNvoip {
  -webkit-appearance: none;
  height: 7px;
  border-radius: 5px;  
  background: #d3d3d3;
  outline: none;
  -webkit-transition: .2s;
}

#chatNvoip::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  border-radius: 50%; 
  background: 
#f37435;
  cursor: pointer;
}

#chatNvoip::-moz-range-thumb {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #f37435;
  cursor: pointer;
	border:0px
}

#callMe{
  -webkit-appearance: none;
  height: 7px;
  border-radius: 5px;  
  background: #d3d3d3;
  outline: none;
  -webkit-transition: .2s;
}

#callMe::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  border-radius: 50%; 
  background: 
#f37435;
  cursor: pointer;
}

#callMe::-moz-range-thumb {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #f37435;
  cursor: pointer;
	border:0px
}
		
		
#HeigthLogo{
  -webkit-appearance: none;
  height: 7px;
  border-radius: 5px;  
  background: #d3d3d3;
  outline: none;
  -webkit-transition: .2s;
}

#HeigthLogo::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  border-radius: 50%; 
  background: 
#f37435;
  cursor: pointer;
}

#HeigthLogo::-moz-range-thumb {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #f37435;
  cursor: pointer;
	border:0px
}
		
#WidthLogo::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  border-radius: 50%; 
  background: 
#f37435;
  cursor: pointer;
}
#WidthLogo{
  -webkit-appearance: none;
  height: 7px;
  border-radius: 5px;  
  background: #d3d3d3;
  outline: none;
  -webkit-transition: .2s;
}
#WidthLogo::-moz-range-thumb {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #f37435;
  cursor: pointer;
	border:0px
}
		
	</style>
    <script>
		function toggleModeView(res){
			if(res !=1){
				document.querySelector(".always-render").style.display = "none";
				document.querySelector(".short-code").style.display = "flex";
			}
			else{
				document.querySelector(".always-render").style.display = "flex";
				document.querySelector(".short-code").style.display = "none";
			}
		}
		function toggleRequestModeView(){
			if (document.querySelector("#modeView").value != 1){
				document.querySelector(".always-render").style.display = "none";
				document.querySelector(".short-code").style.display = "flex";
			}else{
				document.querySelector(".always-render").style.display = "flex";
				document.querySelector(".short-code").style.display = "none";
			}
		}
		 toggleRequestModeView()
		
		 function toggleCallme(callme){
			 if (callme != 1){
			 document.getElementById('toggleCallme').innerHTML= "Habilitado";
				 document.getElementsByTagName("tr")[2].style.display = "table-row";
			 } else {
				 document.getElementById('toggleCallme').innerHTML= "Desabilitado"; 
				  document.getElementsByTagName("tr")[2].style.display = "none"
			 }
		 }
		 function toggleCallmeRequest() {
			 if (document.querySelector("#callMe").value != 1){
			 document.getElementById('toggleCallme').innerHTML= "Habilitado"; 
				 document.getElementsByTagName("tr")[2].style.display = "table-row";
			 } else {
				 document.getElementById('toggleCallme').innerHTML= "Desabilitado"; 
				  document.getElementsByTagName("tr")[2].style.display = "none";
				
			 }
		 }
		 toggleCallmeRequest()
		 
		 function toggleChat(chat){
			 if (chat != 1){
			 document.getElementById('toggleChat').innerHTML= "Habilitado"; 
				  document.getElementsByTagName("tr")[4].style.display = "table-row";
				 
			 } else {
				 document.getElementById('toggleChat').innerHTML= "Desabilitado"; 
				  document.getElementsByTagName("tr")[4].style.display = "none";
				 
			 }
		 }
		 function toggleChatRequest() {
			 if (document.querySelector("#chatNvoip").value != 1){
			 document.getElementById('toggleChat').innerHTML= "Habilitado"; 
				 document.getElementsByTagName("tr")[4].style.display = "table-row";
			 } else {
				 document.getElementById('toggleChat').innerHTML= "Desabilitado"; 
				 document.getElementsByTagName("tr")[4].style.display = "none";
			 }
		 }
		 toggleChatRequest()
		 
		 
		 function toggleWpp(wpp){
			 if (wpp != 1){
			 document.getElementById('toggleWpp').innerHTML= "Habilitado"; 
				 
			 } else {
				 document.getElementById('toggleWpp').innerHTML= "Desabilitado"; 
				 
			 }
		 }
		 function toggleWppRequest() {
			 if (document.querySelector("#whatsApp").value != 1){
			 document.getElementById('toggleWpp').innerHTML= "Habilitado"; 
			 } else {
				 document.getElementById('toggleWpp').innerHTML= "Desabilitado"; 
			 }
		 }
		 toggleWppRequest()
		 
		 
// 		 function updateTextInputHeight(val) {
//           document.getElementById('Height').innerHTML=val + " px"; 
			 
//         }
// 		  function updateTextInputWidth(val) {
//           document.getElementById('Width').innerHTML=val + " px"; 
			 
//         }
		 
     
       
     </script>
    </div><?php
  }
}

new Nvoip_FC_Plugin();
