<?php
/*
Plugin Name: Firmao LiveChat
Plugin URI: https://firmao.pl?ref2=wpchatplugin
Author: Firmao
License: GPLv2 or later
Version: 1.0.7
Text Domain: firmao-livechat
Domain Path: /languages
Description: Embeds Firmao LiveChat widget to your site
*/

add_action("wp_footer", "add_firmao_live_chat_widget");

function add_firmao_live_chat_widget() {
?>
		<div id="chatContentHolder" style="position: fixed;right: 10px;bottom: 0px;width: 320px;">
			 <div id="chatContent" style="position:absolute; left: 10px; bottom: -5px; height: 37px; background-color: #0061cd; color: #d1ddff; border-radius: 5px; padding: 6px 30px 6px 8px; width: 300px; font-family: arial; line-height: 20px; font-size: 14px;">
				 <div id="toolbar" class="header">
					Porozmawiaj z nami
					<?php
						if (esc_attr( get_option('firmao_organization_identifier') ) != "") { 
							echo '<div style="font-size: 11px; float: right;">Czat z <a style="color: #d1ddff;" href="https://firmao.pl?ref2=chat2" onclick="return doNotAllowPropagation(event);" target="_blank">Firmao.pl</a> CRM</div>';
						}
					?>
				 </div>
			 </div>
			 <?php 
				if (esc_attr( get_option('firmao_organization_identifier') ) != "") { 
					echo '<script src="https://system.firmao.pl:8443/js/chatPlugin/ChatPlugin.js" id="firmao_chat" data-org-identifier="'
					. esc_attr( get_option('firmao_organization_identifier') )
					. '" '
					. htmlspecialchars( get_option('firmao_additional_parameters'), ENT_NOQUOTES )
					. '></script>';
				}
			?>
		</div>
<?php
}

add_action( 'init', 'firmao_live_chat_text_domain' );

function firmao_live_chat_text_domain() {
	load_plugin_textdomain( 'firmao-livechat', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

add_action('admin_menu', 'firmao_live_chat_create_menu');

function firmao_live_chat_create_menu() {

	//create new top-level menu
	add_submenu_page('options-general.php', __('Firmao LiveChat Settings', 'firmao-livechat'), __('Firmao LiveChat Settings', 'firmao-livechat'), 'administrator', 'firmao_live_chat_settings_page', 'firmao_live_chat_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_firmao_live_chat_settings_page' );
}


function register_firmao_live_chat_settings_page() {
	//register our settings
	register_setting( 'firmao_live_chat-settings-group', 'firmao_organization_identifier' );
	register_setting( 'firmao_live_chat-settings-group', 'firmao_additional_parameters' );
}

function firmao_live_chat_settings_page() {
?>
<div class="wrap">
<h1>Firmao LiveChat Plugin</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'firmao_live_chat-settings-group' ); ?>
    <?php do_settings_sections( 'firmao_live_chat-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e( 'Organization Identifier', 'firmao-livechat' ) ?></th>
        <td><input type="text" name="firmao_organization_identifier" value="<?php echo esc_attr( get_option('firmao_organization_identifier') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row"><?php _e( 'Other Options', 'firmao-livechat' ) ?></th>
        <td><input type="text" name="firmao_additional_parameters" value="<?php echo esc_attr( get_option('firmao_additional_parameters') ); ?>" /></td>
        </tr>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php
}

register_uninstall_hook(__FILE__, 'firmao_live_chat_uninstall');

function firmao_live_chat_uninstall() {
	unregister_setting( 'firmao_live_chat-settings-group', 'firmao_organization_identifier' );
	unregister_setting( 'firmao_live_chat-settings-group', 'firmao_additional_parameters' );
}