<?php

require( 'available-apis/class-headless-site-available-apis.php' );
require( 'create-custom-api/class-headless-site-create-custom-api.php' );
require( 'headless-settings/class-headless-site-headless-settings.php' );
require( 'support/class-headless-site-support.php' );

function mo_headless_site_main_menu() {
	$currenttab = "";
	if(isset($_GET['tab']))
		$currenttab = sanitize_text_field($_GET['tab']);

	Mo_Headless_Site_Admin_Menu::show_menu($currenttab);
	echo '<div id="mo_headless_settings">';
	echo '<table style="width:100%;">
			<tr>
				<td style="vertical-align:top;width:65%;">';
					Mo_Headless_Site_Admin_Menu::show_tab( $currenttab );
					echo "</td>";
					Mo_Headless_Site_Admin_Menu::show_support_sidebar( $currenttab );
	echo '</tr>
		</table>
		</div>';
}

class Mo_Headless_Site_Admin_Menu {
	public static function show_menu($currenttab) {
		?> <div class="wrap">
				<div><img style="float:left;" src="<?php echo dirname(plugin_dir_url( __FILE__ ));?>/images/logo.png"></div>
		</div>
		<div class="wrap">
            <h1>
                miniOrange Headless site
            </h1>
        </div>
        <div>
        	<h2>
        		<a id="tab-config" class="nav-tab <?php if($currenttab == 'apis') echo 'nav-tab-active';?>" href="admin.php?page=mo_headless_settings&tab=apis">Available APIs</a>
				<a id="tab-attrmapping" class="nav-tab <?php if($currenttab == 'customapi') echo 'nav-tab-active';?>" href="admin.php?page=mo_headless_settings&tab=customapi">Create Custom API</a>
				<a id="tab-signinsettings" class="nav-tab <?php if($currenttab == 'headlesssettings') echo 'nav-tab-active';?>" href="admin.php?page=mo_headless_settings&tab=headlesssettings">Headless Settings</a>
        	</h2>
        </div> 
        <?php
	}

	public static function show_tab($currenttab) {
		if( $currenttab == 'apis') {
			Mo_Headless_Site_Available_APIs::available_apis();
		} else if( $currenttab == 'customapi' ) {
			Mo_Headless_Site_Create_Custom_API::create_custom_api();
		} else if( $currenttab == 'headlesssettings' ) {
			Mo_Headless_Site_Headless_Settings::headless_settings();
		} else if( isset($_GET['action']) && sanitize_text_field($_GET['action']) === 'edit' && isset($_GET['api']) ) {
			Mo_Headless_Site_Create_Custom_API::custom_api_wp_edit_api(sanitize_text_field($_GET['api']));
		} else if( isset($_GET['action']) && sanitize_text_field($_GET['action']) === 'delete' && isset($_GET['api']) ) {
			Mo_Headless_Site_Create_Custom_API::custom_api_wp_delete_api(sanitize_text_field($_GET['api']));
		} else {
			Mo_Headless_Site_Available_APIs::available_apis();
		}
	}

	public static function show_support_sidebar($currenttab) {
		echo '<td style="vertical-align:top;padding-left:1%;">';
		echo Mo_Headless_Site_Support::support();
		echo '</td>';
	}
}