<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://acewebx.com/
 * @since      1.0.0
 *
 * @package    Ace_whatsapp_chat_wp
 * @subpackage Ace_whatsapp_chat_wp/public/partials
 */
$get_setting_value = get_option( 'ace-whatsapp-setting-field' );
?>
<style type="text/css">
.ace-whatsapp-style { color:<?php echo  $get_setting_value['ace_whatsapp_txtbtn_color']; ?>;
						  background: <?php echo $get_setting_value['ace_whatsapp_btn_color']; ?>; }

.ace-whatsapp-style2:hover,.ace-whatsapp-style2:focus {
	background: <?php echo $get_setting_value['ace_whatsapp_hover_color'];  ?>; 
	color: <?php echo $get_setting_value['ace_whatsapp_txthover_color']; ?>;
	<?php if( $get_setting_value['ace_whatsapp_position_btn'] == 'right' ): echo "right: 10 !important;";
		  elseif ( $get_setting_value['ace_whatsapp_position_btn'] == 'left'): echo "left: 10 !important";
		  endif;
	 ?>
}

@media screen and (min-width: 480px){
	.ace-whatsapp-style{
		display: <?php if(!empty( $get_setting_value['ace_wp_mobile_display']) == 1):echo "none"; endif; ?>
	}
}


</style>
<link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<?php 
if( $get_setting_value['ace_whatsapp_position_btn'] == 'right' ): $pClass = "ace-whatsapp-right";
elseif ( $get_setting_value['ace_whatsapp_position_btn'] == 'left'): $pClass = "ace-whatsapp-left"; 
endif;

if( $get_setting_value['ace_whatsapp_position_vtl'] == 'top' ):	$vClass = "ace-whatsapp-top";
elseif( $get_setting_value['ace_whatsapp_position_vtl'] == 'center'  ):	$vClass = "ace-whatsapp-center";
elseif( $get_setting_value['ace_whatsapp_position_vtl'] == 'bottom'  ):	$vClass = "ace-whatsapp-bottom";
endif; ?>		

<a target="_blank" href="https://<?php 
	if (wp_is_mobile()):
	 echo "api";
    else: echo "web";
  	endif ?>.whatsapp.com/send?phone=<?php echo $get_setting_value['ace_whatsapp_no']; ?> &text=<?php echo  $get_setting_value['whatsapp_start_chat']; ?>" onclick="gtag('event', 'WhatsApp', {'event_action': 'whatsapp_chat', 'event_category': 'Chat', 'event_label': 'Chat_WhatsApp'});" class="ace-whatsapp-style ace-whatsapp-style2 <?php echo $pClass." ".$vClass; ?>" >
    <?php 
     echo "<i class='fab fa-whatsapp fab fa-whatsapp2'></i><span class='ace_whats_app_content2'></span>";
    ?>
 </a>