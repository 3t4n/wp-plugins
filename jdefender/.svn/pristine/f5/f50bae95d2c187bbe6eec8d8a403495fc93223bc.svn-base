<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Email_CoreYesnouser_listing extends WListings_default{
function create(){
static $addLegend=array();
$valueTo=array( 7, 2, 0, 1 );
$aLabel=array( WText::t('1206732410ICCJ'), WText::t('1304525968YBL'), WText::t('1237260381RHQN'), WText::t('1231383373PREE'));
$aImg=array('cancel','yes','cancel','preferences');
$key=array_search($this->value, $valueTo );
$this->valueTo=$valueTo[$key];
$script=$this->elementJS();
if(isset($this->element->style))$style='style="'. $this->element->style .'" ';
else $style='';
$image=WView::getLegend($aImg[$key], $aLabel[$key], 'standard');
if(!isset($this->element->infonly) && !isset($this->element->lien)){
$this->content='<a href="#" onclick="'.$script.'" title="'.$aLabel[$key].'">';
$this->content .=$image;
$this->content .='</a>';
}else{
$this->content=$image;
}
return true;
}
}