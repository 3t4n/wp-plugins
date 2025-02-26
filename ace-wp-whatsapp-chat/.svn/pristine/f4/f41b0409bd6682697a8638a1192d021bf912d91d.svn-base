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
$get_setting_group = get_option( 'ace_WA_group_info' ); ?>
<style type="text/css">
 .ace-whatsapp-group{ background: <?php echo $get_setting_group['whatsapp_btn_color']; ?>; }
 a.ace-whatsapp-group.ace-whatsapp-group2:hover{ background: <?php echo $get_setting_group['whatsapp_hover_color']; ?>; }
 .ace_widget_content_ h4, .ace_widget_content_ p,.ace_image_outer i { color:<?php echo  $get_setting_group['whatsapp_txtbtn_color']; ?>;}
	
  .ace_image_outer {
    border-style: solid;
    border-width: 3px;
    border-color: transparent;
    border-radius: 50%;
    background-color: transparent;
    width: unset;
    height: unset;
    overflow: unset;
    position: static;
}

.ace_image_outer i {
    font-size: 39px;
    text-align: center;
    position: relative;
    left: 18px;
    top: 16px;
}
.ace_widget_content_ {
    padding-left: 35px;
}
a.ace-whatsapp-group.ace-whatsapp-group2:hover i, a.ace-whatsapp-group.ace-whatsapp-group2:hover p, a.ace-whatsapp-group.ace-whatsapp-group2:hover h4 {
    color:<?php echo  $get_setting_group['whatsapp_txthover_color']; ?>;
}
</style>

  <div class="acw_suser ">
      <a target="_blank" href="https://web.whatsapp.com/accept?code=<?php echo $get_setting_group['whatsapp_groupId']; ?>" class="ace-whatsapp-group ace-whatsapp-group2" >
      	<div class="ace_widget_user_image">
      		<div class="ace_image_outer">
      		  <i class="fas fa-users"></i> 
           </div> 
      	</div>
      	<div class="ace_widget_content_">
      		<h4> <?php echo $get_setting_group['whatsapp_content']; ?></h4>
          	<p> <?php echo $get_setting_group['whatsapp_desc']; ?>  </p>
      	</div>
      </a>
  </div>


