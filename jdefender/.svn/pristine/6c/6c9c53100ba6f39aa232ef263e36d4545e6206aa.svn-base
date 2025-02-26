<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Scheduler_System_plugin extends WPlugin {
function onAfterRender(){
$controller=WGlobals::get('controller');
if($controller=='scheduler-processes' || $controller=='scheduler') return;
$cronType=WPref::load('PLIBRARY_NODE_CRON');
if($cronType==5){
$cronNext=WPref::load('PLIBRARY_NODE_NEXTCRON');
if($cronNext < time() && $cronNext > 99){
if(!defined('PSCHEDULER_NODE_USEPWD')) WPref::get('scheduler.node');
if( PSCHEDULER_NODE_USEPWD){
$password='&password='.PSCHEDULER_NODE_PASSWORD;
}else{
$password='';
}
$uniqueName1=rand( 100000000, 999999999 );
$uniqueName2=rand( 100000000, 999999999 );
$finalUnique='&unique='.$uniqueName1.'C'.$uniqueName2;
$url=JOOBI_SITE . WPage::linkNoSEF('controller=scheduler&task=process'.$password . $finalUnique, 'popup');
$schedulerClass=WClass::get('scheduler.triggerurl');
$schedulerClass->launch($url, 45 );
}
}
}
}