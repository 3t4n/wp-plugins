<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Translation_install_controller extends WController {
public function install(){
$lgid=WGlobals::get('lgid', 0 );
if(empty($lgid)) WPages::redirect('controller=translation&task=listing');
$cache=WCache::get();
$cache->resetCache();
WPage::addJSLibrary('rootscript');
WPage::addJSFile('js/install.1.1.js');
if(isset($_SESSION['joobi']['installwithminilib'] )){
unset($_SESSION['joobi']['installwithminilib'] );
}
$LanguagesM=WModel::get('library.languages');
$LanguagesM->whereE('lgid',$lgid );
$obj=$LanguagesM->load('o',array('code','name','lgid'));
if(!class_exists('Install_Node_Install')) require_once( JOOBI_DS_NODE.'install/install/install.php');
Install_Node_install::accessInstallData('set','importLangs',  array($obj ));
return true;
}
}