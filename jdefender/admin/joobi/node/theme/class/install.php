<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Theme_Install_class extends WClasses {
public function installDefaultTheme($type,$namekey,$folder,$themeName,$description='',$params=null,$premium=1){
$themeM=WModel::get('theme');
if(empty($themeM)){
return false;
}
$themeM->tmid=null;
$themeM->setChild('themetrans','name',$themeName );
$themeM->setChild('themetrans','description',$description );
$themeM->namekey=$namekey;
$themeM->folder=$folder;
$themeM->publish=1;
$themeM->core=1;
$themeM->availability=1;
$themeM->type=$type;
$themeM->ordering=1;
$themeM->premium=$premium;
$themeM->alias=$themeName.' theme';
if(!empty($params))$themeM->params=$params;
$themeM->created=time();
$themeM->modified=time();
$themeM->save();
return true;
}
}