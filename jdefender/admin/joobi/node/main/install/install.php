<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Node_install extends WInstall {
	private $libraryReaddata = null;
	private $dictionaryM = null;
	public function install(&$object) {
		if ( !empty( $this->newInstall ) || (property_exists($object, 'newInstall' ) && $object->newInstall) ) {
						$fileC = WGet::file();
			$directory = JOOBI_DS_NODE . 'main/install/images/';
			$fileC->move( $directory . 'mgopencosmeticabold.ttf', JOOBI_DS_MEDIA . 'fonts/mgopencosmeticabold/mgopencosmeticabold.ttf', 'force' );
			$fileC->move( $directory . 'StayPuft.sfd', JOOBI_DS_MEDIA . 'fonts/staypuft/StayPuft.sfd', 'force' );
			$fileC->move( $directory . 'staypuft.ttf', JOOBI_DS_MEDIA . 'fonts/staypuft/staypuft.ttf', 'force' );
						$themeM = WModel::get( 'theme' );
			$themeM->whereE( 'namekey', 'joomla.admin.theme' );
			$themeM->setVal( 'premium', 0 );
			$themeM->update();
			$themeM->whereIn( 'type', array( 1, 3 ) );
			$themeM->setVal( 'premium', 0 );
			$themeM->update();
						if ( 'wordpress' == JOOBI_FRAMEWORK_TYPE ) {
				$themeM->whereE( 'namekey', 'wp40.site.theme' );
				$themeM->setVal( 'premium', 1 );
				$themeM->update();
			} else {
				$themeM->whereE( 'namekey', 'joomla30.site.theme' );
				$themeM->setVal( 'premium', 1 );
				$themeM->update();
			}
			$themeM->whereE( 'namekey', 'vendors30.site.theme' );
			$themeM->setVal( 'premium', 1 );
			$themeM->update();
			$this->_insertDefaultPreferences4Themes();
			$this->_createDefaultSpace();
			WText::load( 'main.node' );
			$schedulerInstallC = WClass::get( 'scheduler.install', null, 'class', false );
			if ( !empty($schedulerInstallC) ) $schedulerInstallC->newScheduler(
				'main.checkupdate.scheduler'
			, WText::t('1347916591IUDQ')
			, WText::t('1302519272IRLM')
			, 100				, 86400				, 60				, 1					);
			if ( !empty($schedulerInstallC) ) $schedulerInstallC->newScheduler(
				'main.optimize.scheduler'
			, WText::t('1439907829EIGO')
			, WText::t('1439907829EIGP')
			, 200				, 3600				, 60				, 1					);
			if ( !empty($schedulerInstallC) ) $schedulerInstallC->newScheduler(
				'email.queue.scheduler'
			, WText::t('1374608348GDGV')
			, WText::t('1374608348GDGW')
			, 1				, 60				, 60				, 1					);
			if ( !empty($schedulerInstallC) ) $schedulerInstallC->newScheduler(
				'email.cleanstats.scheduler'
			, WText::t('1391607531FXMD')
			, WText::t('1391607531FXME')
			, 50				, 86400				, 60				, 1					);
			$installWidgetsC = WClass::get( 'install.widgets' );
			$installWidgetsC->installWidgetType(
				'main.time'
				, 'Time widget'
				, 'Time'
				, 'Allow you to add formatted time in any content.'
				, 17				);
			$installWidgetsC = WClass::get( 'install.widgets' );
			$installWidgetsC->installTable( 'main.credentialtype', $this->_installValuesA() );
			WText::load( 'role.node' );
									$roleM = WTable::get( 'role_node', 'main_userdata', 'rolid' );
			$roleM->makeLJ( 'role_trans', 'main_userdata', 'rolid' );
			$lgid = 1;
			$roleM->whereLanguage( 1, $lgid );
			$roleM->remember( 'Role1-all_Roles', true, 'Model_role_node' );
			$roleM->select( array( 'name', 'description' ), 1 );
			$roleM->select( array( 'rolid', 'namekey' ) );
									$rolesA = $roleM->load( 'ol' );					
			if ( !empty($rolesA) ) {
				if ( !isset($this->libraryReaddata) ) $this->libraryReaddata = WClass::get( 'library.readdata' );
				if ( !isset($this->dictionaryM) ) $this->dictionaryM = WTable::get( 'translation_en', 'main_translation' );
				foreach( $rolesA as $role ) {
					$this->_insertLanguage( 'name', $role->rolid, $role->name );
					$this->_insertLanguage( 'description', $role->rolid, $role->description );
				}	
			}			
									$installWidgetsC = WClass::get( 'install.widgets' );
			$installStatus = $installWidgetsC->installWidgets( 'main.node' );
			$mainPref = WPref::get( 'main.node' );
			$mainPref->updatePref( 'fixrole', 1 );
			$this->_insertEmailTemplate( 'default', 'Default Mail', 'The default newsletter theme.' );
		} else {
		}
				$file = WGet::file();
		if ( ! $file->exist( JOOBI_DS_ROOT . 'remote.php' ) ) {
			$fileContent = '<?php $_REQUEST["option"]="com_japps";$_REQUEST["page"]="japps";define("JOOBI_REMOTE_ACCESS",true);include("index.php");';
			$file->write( JOOBI_DS_ROOT . 'remote.php', $fileContent, 'overwrite' );
		}		
						$libraryCMSMenuC = WAddon::get( 'api.' . JOOBI_FRAMEWORK . '.cmsmenu' );
		$libraryCMSMenuC->installModulePreferencesFile();
		return true;
	}
	public function addExtensions() {
				$extension = new stdClass;
		$extension->namekey = 'main.system.plugin';
		$extension->name = 'Joobi - Replace widgets';
		$extension->folder = 'system';
		$extension->type = 50;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|main|plugin';
		$extension->core = 1;
		$extension->params = 'publish=0';
		$extension->description = 'Replace tags and widgets in Joomla components / pages.';
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
				$extension = new stdClass;
		$extension->namekey = 'main.content.plugin';
		$extension->name = 'Joobi - Repalce Widgets in Articles';
		$extension->folder = 'content';
		$extension->type = 50;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|main|plugin';
		$extension->core = 1;
		$extension->params = 'publish=0';
		$extension->description = 'Replace tags and widgets in Joomla contents / articles.';
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
				$extension = new stdClass;
		$extension->namekey = 'main.button.plugin';
		$extension->name = 'Joobi - Widgets button';
		$extension->folder = 'editors-xtd';
		$extension->type = 50;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|main|plugin';
		$extension->core = 1;
		$extension->params = 'publish=1';
		$extension->description = 'Insert Widgets into a content.';
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
				$extension = new stdClass;
		$extension->namekey = 'main.design.module';
		$extension->name = 'Joobi - Design Module';
		$extension->folder = 'design';
		$extension->type = 25;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|main|module';
		$extension->core = 1;
		$extension->params = "publish=1\nposition=position-7\naccess=3";
		$extension->description = 'Module to edit views and change translations directly from the front-end of the site';
		$libraryCMSMenuC = WAddon::get( 'api.' . JOOBI_FRAMEWORK . '.cmsmenu' );
		$extension->install = $libraryCMSMenuC->modulePreferences();
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
				$extension = new stdClass;
		$extension->namekey = 'main.googletranslate.module';
		$extension->name = 'Joobi - Automatic Language Translator ( Google )';
		$extension->folder = 'login';
		$extension->type = 25;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|main|module';
		$extension->core = 1;
		$extension->params = "publish=0\nposition=position-7\nordering=99\nwidgetView=main_googletranslate_module";
		$extension->description = 'Language pick-list to automatically translate the site with Google translate API.';
		$libraryCMSMenuC = WAddon::get( 'api.' . JOOBI_FRAMEWORK . '.cmsmenu' );
		$extension->install = $libraryCMSMenuC->modulePreferences();
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
	}
	public function addWidgets() {
				$allWidgetsA = array();
				$widget = new stdClass;
		$widget->namekey = 'firstname';
		$widget->alias = 'First Name';
		$widget->name = 'First Name';
		$widget->description = 'Display the first name of the user.';
		$widget->framework_type = 13;
		$widget->core = 1;
		$widget->widgetType = 'users.user';
		$widget->params = 'select=firstname';
				$allWidgetsA[] = $widget;
				$widget = new stdClass;
		$widget->namekey = 'name';
		$widget->alias = 'Name';
		$widget->name = 'Name';
		$widget->description = 'Display the name of the user.';
		$widget->framework_type = 13;
		$widget->core = 1;
		$widget->widgetType = 'users.user';
		$widget->params = 'select=name';
				$allWidgetsA[] = $widget;
		$widget = new stdClass;
		$widget->namekey = 'lastname';
		$widget->alias = 'Last Name';
		$widget->name = 'Last Name';
		$widget->description = 'Display the last name of the user.';
		$widget->framework_type = 13;
		$widget->core = 1;
		$widget->widgetType = 'users.user';
		$widget->params = 'select=lastname';
				$allWidgetsA[] = $widget;
		$widget = new stdClass;
		$widget->namekey = 'username';
		$widget->alias = 'Username';
		$widget->name = 'Username';
		$widget->description = 'Display the username of the user.';
		$widget->framework_type = 13;
		$widget->core = 1;
		$widget->widgetType = 'users.user';
		$widget->params = 'select=username';
				$allWidgetsA[] = $widget;
		$widget = new stdClass;
		$widget->namekey = 'email';
		$widget->alias = 'Email';
		$widget->name = 'Email';
		$widget->description = 'Display the email of the user.';
		$widget->framework_type = 13;
		$widget->core = 1;
		$widget->widgetType = 'users.user';
		$widget->params = 'select=email';
				$allWidgetsA[] = $widget;
		$widget = new stdClass;
		$widget->namekey = 'company';
		$widget->alias = 'Company';
		$widget->name = 'Company';
		$widget->description = 'Display the company name defined in the general preferences.';
		$widget->framework_type = 13;
		$widget->core = 1;
		$widget->widgetType = 'users.user';
		$widget->params = 'select=company
convert=1';
				$allWidgetsA[] = $widget;
		$widget = new stdClass;
		$widget->namekey = 'companyaddress';
		$widget->alias = 'Company Address';
		$widget->name = 'Company Address';
		$widget->description = 'Display the address of the company defined in the general preferences.';
		$widget->framework_type = 13;
		$widget->core = 1;
		$widget->widgetType = 'users.user';
		$widget->params = 'select=companyaddress
convert=1';
				$allWidgetsA[] = $widget;
		$widget = new stdClass;
		$widget->namekey = 'companyphone';
		$widget->alias = 'Company Phone';
		$widget->name = 'Company Phone';
		$widget->description = 'Display the company phone defined in the general preferences.';
		$widget->framework_type = 13;
		$widget->core = 1;
		$widget->widgetType = 'users.user';
		$widget->params = 'select=companyphone
convert=1';
				$allWidgetsA[] = $widget;
		$widget = new stdClass;
		$widget->namekey = 'companyemail';
		$widget->alias = 'Company email';
		$widget->name = 'Company email';
		$widget->description = 'Display the company email defined in the general preferences.';
		$widget->framework_type = 13;
		$widget->core = 1;
		$widget->widgetType = 'users.user';
		$widget->params = 'select=companyemail
convert=1';
				$allWidgetsA[] = $widget;
		return $allWidgetsA;
	}
	private function _insertEmailTemplate($namekey,$name,$description) {
		$path = JOOBI_DS_THEME . 'mail/' . $namekey;	
		$folderS = WGet::folder();
		if ( ! $folderS->exist( $path ) ) {
			$folderS->move( JOOBI_DS_NODE . 'main/install/mails/' . $namekey, $path, true );
			$fileS = WGet::file();
			$fileS->copy( $path . '/index2.html', $path . '/index.html' );
			$fileS->delete( $path . '/index2.html' );
						$themeInstallC = WClass::get( 'theme.install' );
						$themeInstallC->installDefaultTheme( 106, $namekey, $namekey, $name, $description );
		}	
	}	
	private function _insertLanguage($prop,$eid,$text) {
		$imac = array_search( $text, WText::$vocab );
		if ( empty($imac) ) return false;
		$this->dictionaryM->setVal( 'auto', 5 );			$this->dictionaryM->setVal( 'text', $text );
		$this->dictionaryM->setVal( 'imac', $imac );
		$this->dictionaryM->insertIgnore();
		$this->libraryReaddata->getTranslation( $imac, 'role.node', $eid, 'role_trans', $prop );
	}	
	private function _installCredentialType($namekey,$alias,$category=11) {
		$credentialTypeM = WModel::get( 'main.credentialtype' );
		$credentialTypeM->namekey = $namekey;
		$credentialTypeM->alias = $alias;
		$credentialTypeM->category = $category;
		$credentialTypeM->core = 1;
		$credentialTypeM->rolid = 1;
		$credentialTypeM->publish = 1;
		$credentialTypeM->setIgnore();
		$credentialTypeM->save();
	}	
 	private function _createDefaultSpace() {
				$spaceM = WModel::get( 'space' );
		$spaceM->namekey = 'site';
		$spaceM->alias = 'Space for Users in the site';
		$spaceM->setChild( 'spacetrans', 'name', 'Users' );
		$spaceM->setChild( 'spacetrans', 'description', 'Default Space for Users within Joomla theme' );
		$spaceM->publish = 1;
		$spaceM->core = 1;
		$spaceM->type = 1;
				if ( 'wordpress' == JOOBI_FRAMEWORK_TYPE ) {
			$spaceM->theme = 'wp40.site.theme';
		} else {
			$spaceM->theme = 'joomla30.site.theme';
		}		
		$spaceM->controller = 'users';
		$spaceM->menu = 'users_node_horizontalmenu_fe';
		$spaceM->rolid = WRole::getRole( 'registered' );
		$spaceM->frameworktheme = 1;
		$spaceM->save();
 	}
	private function _insertDefaultPreferences4Themes() {
		$joomlaSite30 = 'font_awesome=auto
image_responsive=1
image_style=rounded
nav_logoname=Nav
nav_brand=fa-home
nav_uselogo=1
nav_showicon=1
form_tabfade=1
pane_color=1
pane_icon=1
pagination=1
tooltip_html=1
button_icon=1
button_color=1
wizard_color=1
toolbar_color=1
toolbar_group=1
toolbar_icon=1
table_maxlist=10
table_condensed=1
table_hover=1
table_striped=1
table_columniconcolor=1
table_buttoncolor=1
table_buttonicon=1
table_buttontext=0
catalog_container=panel
catalog_starcolor=warning
catalog_starsize=large
catalog_addcarticon=fa-shopping-cart
catalog_addcartcolor=primary
catalog_addcartsize=xlarge
catalog_reviewicon=fa-comment
catalog_reviewcolor=default
catalog_reviewsize=xsmall
catalog_detailicon=fa-eye
catalog_detailcolor=success
catalog_detailsize=small
catalog_questioncolor=warning
catalog_questionsize=small
catalog_viewallicon=fa-eye
catalog_viewallcolor=default
catalog_viewallsize=small
catalog_carticon=fa-shopping-cart
catalog_cartcolor=primary
catalog_cartsize=standard
catalog_vendorsregistericon=fa-check-square-o
catalog_vendorsregistercolor=primary
catalog_vendorsregistersize=small
socialicon_group=0
socialicon_showcount=1
socialicon_size=small
catalog_cartupdateicon=fa-refresh
catalog_cartupdatecolor=primary
catalog_cartupdatesize=standard
catalog_cartpreviousicon=fa-chevron-left
catalog_cartpreviouscolor=warning
catalog_cartprevioussize=standard
catalog_cartpreviousiconposition=left
catalog_cartnexticon=fa-chevron-right
catalog_cartnextcolor=success
catalog_cartnextsize=standard
catalog_cartnexticonposition=right
catalog_viewmapicon=fa-globe
catalog_viewmapsize=xsmall
catalog_editaddressicon=fa-map-marker
catalog_editaddresscolor=fa-map-marker				
catalog_editaddresssize=primary';
		if ( 'joomla' == JOOBI_FRAMEWORK_TYPE ) {
			$themeInstallC = WClass::get( 'theme.install' );
			$themeInstallC->installDefaultTheme( 1, 'joomla30.site.theme', 'joomla30', 'Joomla Responsive Theme', 'The main theme to integrate Joobi Apps to Joomla. The theme responsive and built with bootstrap.', $joomlaSite30 );
		} elseif ( 'wordpress' == JOOBI_FRAMEWORK_TYPE ) {
			$themeInstallC = WClass::get( 'theme.install' );
			$themeInstallC->installDefaultTheme( 1, 'wp40.site.theme', 'wp40', 'WordPress Responsive Theme', 'The main theme to integrate Joobi Apps to WordPress.', $joomlaSite30 );
		}		
	}
	private function _installValuesA() {
		return array(
  array('crdidtype' => '1','namekey' => 'local','alias' => 'Local Disk','rolid' => '1','core' => '1','publish' => '1','category' => '3'),
  array('crdidtype' => '2','namekey' => 's3','alias' => 'Amazon S3','rolid' => '7','core' => '1','publish' => '1','category' => '3'),
  array('crdidtype' => '3','namekey' => 'dropbox','alias' => 'Dropbox','rolid' => '7','core' => '0','publish' => '0','category' => '3'),
  array('crdidtype' => '4','namekey' => 'drive','alias' => 'Google Drive','rolid' => '7','core' => '0','publish' => '0','category' => '3'),
  array('crdidtype' => '5','namekey' => 'twitter','alias' => 'Twitter','rolid' => '3','core' => '1','publish' => '1','category' => '7'),
  array('crdidtype' => '6','namekey' => 'facebook','alias' => 'Facebook','rolid' => '3','core' => '1','publish' => '1','category' => '7'),
  array('crdidtype' => '7','namekey' => 'googleapi','alias' => 'Google API','rolid' => '3','core' => '1','publish' => '1','category' => '11'),
  array('crdidtype' => '8','namekey' => 'infusionsoft','alias' => 'InfusionSoft','rolid' => '8','core' => '1','publish' => '1','category' => '11'),
  array('crdidtype' => '9','namekey' => 'recaptcha','alias' => 'reCaptcha','rolid' => '1','core' => '1','publish' => '1','category' => '11'),
  array('crdidtype' => '10','namekey' => 'flexnet','alias' => 'Flexnet','rolid' => '1','core' => '1','publish' => '1','category' => '11'),
  array('crdidtype' => 'null','namekey' => 'slack','alias' => 'Slack','rolid' => '1','core' => '1','publish' => '1','category' => '7')				
);
	}		
}