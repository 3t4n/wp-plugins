<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Wordpress_Node_install extends WInstall {
	public function install(&$object) {
		try{
			if ( !empty( $this->newInstall ) || (property_exists($object, 'newInstall') && $object->newInstall) ) {
				WText::load( 'wordpress.node' );
				$installWidgetsC = WClass::get( 'install.widgets' );
				$installWidgetsC->installWidgetType(
					'wordpress.menus'
					, "Joobi Menus"
					, WText::t('1431633303POEA')
					, WText::t('1431633304FVNB')
					, 3					);
								$prefM = WPref::get( 'users.node' );
								$prefM->updatePref( 'framework_be', 'wordpress' );
				$prefM->updatePref( 'framework_be', 'wordpress' );
				$prefM->updatePref( 'activationmethod', 'none' );		
				if ( !empty( $this->newInstall ) || (property_exists($object, 'newInstall') && $object->newInstall) ) {
					$joomla30 = 'font_awesome=1
image_responsive=1
image_style=rounded
nav_logoname=app-joobi-logo
nav_brand=Nav
nav_uselogo=1
pagination=11
nav_showicon=1
form_tabfade=1
pane_color=1
pane_icon=1
tooltip_html=1
alert_dismiss=1
alert_collapse=1
button_icon=1
button_color=1
view_icon=1
wizard_color=1
toolbar_color=1
toolbar_group=1
toolbar_icon=1
table_maxlist=20
table_hover=1
table_striped=1
table_columniconcolor=1
table_buttonicon=1
table_buttontext=1';
					$themeInstallC = WClass::get( 'theme.install' );
					$themeInstallC->installDefaultTheme( 2, 'wp40.admin.theme', 'wp40', 'WordPress Responsive Admin Theme', 'A responsive template to integrate Joobi Apps in WordPress admin.', $joomla30 );
				}								
			}
		} catch (Exception $e) {
			WMessage::log( "\n install <br> " . $e->getMessage(), 'users_install' );
		}
		return true;
	}
	public function addExtensions() {
				if ( JOOBI_FRAMEWORK_TYPE != 'wordpress' ) return true;
				$extension = new stdClass;
		$extension->namekey = 'wordpress.quickicons.module';
		$extension->name = 'Joobi - Joobi Quick Icons';
		$extension->folder = 'quickicons';
		$extension->type = 25;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|wordpress|module';
		$extension->core = 1;
		$extension->params = "position=icon\npublish=1\naccess=1\nclient=1\nordering=1";
		$extension->description = '';
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
	}
}