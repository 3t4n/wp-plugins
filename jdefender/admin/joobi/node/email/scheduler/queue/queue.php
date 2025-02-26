<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Email_Queue_scheduler extends Scheduler_Parent_class {
function process(){
$max=WPref::load('PEMAIL_NODE_QUEUE_MAX_EMAIL');
if($max < 1)$max=50;
$time=time();
$cronNxt=WPref::load('PEMAIL_NODE_NEXTCRON');
if($cronNxt > $time){
return true;
}
$cronFrq=WPref::load('PEMAIL_NODE_QUEUE_MAX_FREQ');
$nextdate=intval($cronNxt ) + intval($cronFrq );
if($nextdate <=$time)$nextdate=$time + intval($cronFrq );
$emailPref=WPref::get('email.node');
$emailPref->updatePref('nextcron',$nextdate );
if( WExtension::exist('campaign.node')){
$campaignQueueC=WClass::get('campaign.queue');
$campaignQueueC->processCampaignQueue(true);
}
if($this->continueProcess()){
$emailQueueC=WClass::get('email.queue');
$emailQueueC->processQueue(false, 0, $max );
}
return true;
}
}