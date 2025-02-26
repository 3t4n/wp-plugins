<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Role_Node_install extends WInstall {
public function install(&$object)  {
if(!empty($this->newInstall ) || (property_exists($object, 'newInstall') && $object->newInstall)){
}
return true;
}
public function addExtensions(){
if( JOOBI_FRAMEWORK_TYPE !='joomla') return true;
$extension=new stdClass;
$extension->namekey='role.content.plugin';
$extension->name='Joobi - Role Restriction to Joomla Articles';
$extension->folder='content';
$extension->type=50;
$extension->publish=1;
$extension->certify=1;
$extension->destination='node|role|plugin';
$extension->core=1;
$extension->params='publish=0';
$extension->description='';
if($this->insertNewExtension($extension ))$this->installExtension($extension->namekey );
$extension=new stdClass;
$extension->namekey='role.system.plugin';
$extension->name='Joobi - Role Restriction for Joomla Components';
$extension->folder='system';
$extension->type=50;
$extension->publish=1;
$extension->certify=1;
$extension->destination='node|role|plugin';
$extension->core=1;
$extension->params='publish=0';
$extension->description='';
if($this->insertNewExtension($extension ))$this->installExtension($extension->namekey );
}
}