<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class WRender_Menu_classData {
var $subtype=null;
var $elements=array();
var $firstFormName='';
var $wid=0;
var $namekey='';
var $type=0;
var $nestedView=false;
var $menuSize=0;
var $formID='';
var $formInfoO=null;
var $typeForm=false;
}
class WRender_Menu_blueprint extends Theme_Render_class {
  public function render($data){
  if(empty($data->elements )) return '';
  $html='';
  switch($data->subtype){
  case 110:
  $html=WPage::renderBluePrint('menupanel',$data );
  break;
  case 115:
  case 117:
  $html=WPage::renderBluePrint('menustandard',$data );
  break;
  default:
  $html=WPage::renderBluePrint('menuview',$data );
  break;
  }
return $html;
  }
}
class WButtons_default extends WButtons_standard {
}
