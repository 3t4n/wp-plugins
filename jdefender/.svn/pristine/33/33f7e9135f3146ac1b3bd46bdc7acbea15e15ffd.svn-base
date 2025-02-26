<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_CoreStatus_listing extends WListings_default{
function create(){
$wid=$this->getValue('wid');
$enabled=$this->getValue('enabled');
$this->content='<div id="status_'.$wid.'">';
$CURRENT_VERSION=$this->getValue('userversion');
$LEVEL=$this->getValue('level');
$PUBLISH=$this->getValue('publish');
$v1=$this->getValue('userversion');
$v2=$this->getValue('userlversion');
if($this->getValue('beta')){
$this->content .='<span class="label label-success"><big>'.WText::t('1232547361JEQR'). '</big></span>';
}
if($enabled==2){
$this->content .='<span class="label label-warning"><big>'.WText::t('1466031476DZXS'). '</big></span>';
$this->content .='<div class="clearfix"><small>'.WApplication::date( WTools::dateFormat('date'), $this->getValue('modified')). '</small></div>';
}elseif($PUBLISH==1){
if( version_compare($v1, $v2, ">=" )){
$this->content .='<span class="label label-success"><big>'.WText::t('1441368075IKSL'). '</big></span>';
}elseif(!empty($wid)){
if($LEVEL){
$sx1Type=(int)$this->getValue('ltype');
}
$link=WPage::linkAdmin('controller=apps&task=show&eid='.$wid );
$this->content .='<div class="gradelist">';
$objButtonO=WPage::newBluePrint('button');
$objButtonO->type='standard-plus';
$objButtonO->link=$link;
$objButtonO->text=WText::t('1389125413BAER');
$objButtonO->icon='fa-refresh';
$objButtonO->color='danger';
$this->content .=WPage::renderBluePrint('button',$objButtonO );
$this->content .='</div>';
}
$this->content .='<div class="clearfix"><small>'.WApplication::date( WTools::dateFormat('date-time'), $this->getValue('modified')). '</small></div>';
}elseif($PUBLISH==0){
$link=WPage::linkAdmin('controller=apps&task=show&eid='.$wid );
$this->content .='<div class="gradelist">';
$objButtonO=WPage::newBluePrint('button');
$objButtonO->type='standard-plus';
$objButtonO->link=$link;
$objButtonO->text=WText::t('1349115733NNHN');
$objButtonO->icon='fa-sign-out';
$objButtonO->color='success';
$this->content .=WPage::renderBluePrint('button',$objButtonO );
$this->content .='</div>';
}
$this->content .='</div>';
return true;
}}