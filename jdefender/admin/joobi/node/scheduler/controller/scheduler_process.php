<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Scheduler_process_controller extends WController {
function process(){
$scheduleP=WPref::get('scheduler.node');
$scheduleP->updatePref('last_launched', time());
$cronType=WPref::load('PLIBRARY_NODE_CRON');
if($cronType >=5){
if( WPref::load('PSCHEDULER_NODE_USEPWD')){
$password=WGlobals::get('password','','','string');
if($password !=PSCHEDULER_NODE_PASSWORD ) return false;
}
$schedulerTasksO=WObject::get('scheduler.launchtasks');
$nbResults=$schedulerTasksO->process();
if($cronType==10){
$serviceping=WPref::load('PSCHEUDLER_NODE_SERVICEPING');
$delay=604800;if($serviceping < ( time() - $delay )){
$schePref=WPref::get('scheduler.node');
$schePref->updatePref('serviceping', time());
$schedulerCronC=WClass::get('scheduler.cron');
$schedulerCronC->pingCron();
}
}
$uid=WUser::get('uid');
if($uid > 0){
$message=WMessage::get();
$message->userS('1299163902NDIX');
$message->userN('1298294163YKW',array('$nbResults'=>$nbResults));
return false;
}else{
echo '<br>Scheduler working! '.$nbResults.' tasks.';
exit();
}
}else{
echo 'Cron turn off';
}
return true;
}
}