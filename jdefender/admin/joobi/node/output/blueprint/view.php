<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class WRender_View_blueprint extends Theme_Render_class {
private $_data=null;
private static $_formIcon=null;
  public function render($data){
  $this->_data=$data;
  if(!isset(self::$_formIcon)) self::$_formIcon=$this->value('view.icon');
  if($data->action=='header') return  $this->_addHeader();
  }
private function _addHeader(){
$formId=isset($this->_data->view->formObj->name)?$this->_data->view->formObj->name : $this->_data->view->firstFormName;
$forceHeader=WGlobals::get('viewTitle','','global');
if(!empty($forceHeader))$this->_data->view->name=$forceHeader;
$DIVheader='';
if($this->_data->view->firstFormName==$formId){
$haveTitle=$this->_data->view->menu % 5;
if($haveTitle){
$text='';
if(!empty($this->_data->view->name) && ( IS_ADMIN || PLIBRARY_NODE_PAGETITLE )){
$text=$this->_data->view->name;
if(!empty($this->_data->view->pageTitle))$text .=' : ';
}
if(!empty($this->_data->view->pageTitle)){
$text .='<small><small>'.$this->_data->view->pageTitle.'</small></small>' ;
}
}
if(!empty($text)){
$currentURL=WView::getURI();
if( WRole::isAdmin('manager')){
$existingA=WGlobals::getSession('smartMenu','recent');
if(empty($existingA))$existingA=array();
$dlnkPos=strpos($currentURL, 'controller=');
$flnk=substr($currentURL, $dlnkPos );
$text2=str_replace( array('<small><small>','</small></small>'), '',$text );
$text2=str_replace('[ '. WText::t('1206732361LXFE').' ] ','',$text2 );
if( strlen($text2) > 30){
$text2=substr($text2, 0, 30 ). '...';
}
if(isset($existingA[$flnk])){
unset($existingA[$flnk] );
}$existingA[$flnk]=$text2;
$maxHistory=20;
if( count($existingA) > $maxHistory ) array_shift($existingA );
WGlobals::setSession('smartMenu','recent',$existingA );
}
$currentURL=WGlobals::filter($currentURL, 'string');
$text='<a title="Refresh" href="'.$currentURL.'">'.$text.'</a>';
if( self::$_formIcon && !empty($this->_data->view->faicon)){
$span='<i class="fa '.$this->_data->view->faicon.' text-primary"></i>';
}else{
$span='';
}
$DIVheader='<h1>'.$span ;
$DIVheader .=$text .  '</h1>';
}
}
$directEditIcon=WGlobals::get('directEditIcon','','global');
$html='<div class="clearfix">';
$html .='<div class="page-header pull-left">';$html .=$DIVheader . $directEditIcon;
$html .='</div>';
if(!empty($this->_data->headerMenus )){
$html .='<div class="pull-right">';
$html .=$this->_data->headerMenus;
$html .='</div>';
}
$html .='</div>';
return $html;
}
}