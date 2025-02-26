<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Scheduler_Cron_class extends WClasses {
public function checkCron(){
$servicepwd=WPref::load('PSCHEDULER_NODE_SERVICEPWD');
if(empty($servicepwd)){
$servicepwd=WTools::randomString( 18 );
$schePref=WPref::get('scheduler.node');
$schePref->updatePref('servicepwd',$servicepwd );
}
$data=new stdClass;
$data->url=JOOBI_SITE;
$data->username=WUser::get('username');
$data->email=WUser::get('email');
$data->type=3;
$data->pwd=$servicepwd;
$data->platform=JOOBI_FRAMEWORK;
$data->cronurl=WPages::linkPopUp('controller=scheduler&task=process'.URL_NO_FRAMEWORK, false);
$cronSiteURL=WPref::load('PAPPS_NODE_SERVICE');
$netcom=WNetcom::get();
$result=$netcom->send($cronSiteURL, 'serviceprovider','createcron',$data );
return $result;
}
public function pingCron(){
$servicepwd=WPref::load('PSCHEDULER_NODE_SERVICEPWD');
if(empty($servicepwd)){
return false;
}
$data=new stdClass;
$data->url=JOOBI_SITE;
$data->type=3;
$data->pwd=$servicepwd;
$data->platform=JOOBI_FRAMEWORK;
$data->cronurl=WPages::linkPopUp('controller=scheduler&task=process'.URL_NO_FRAMEWORK, false);
$cronSiteURL=WPref::load('PAPPS_NODE_SERVICE');
$netcom=WNetcom::get();
$result=$netcom->send($cronSiteURL, 'serviceprovider','pingcron',$data );
return $result;
}
public function desactivateCron(){
$servicepwd=WPref::load('PSCHEDULER_NODE_SERVICEPWD');
if(empty($servicepwd)){
return false;
}
$data=new stdClass;
$data->url=JOOBI_SITE;
$data->type=3;
$data->pwd=$servicepwd;
$data->platform=JOOBI_FRAMEWORK;
$data->cronurl=WPages::linkPopUp('controller=scheduler&task=process'.URL_NO_FRAMEWORK, false);
$cronSiteURL=WPref::load('PAPPS_NODE_SERVICE');
$netcom=WNetcom::get();
$result=$netcom->send($cronSiteURL, 'serviceprovider','disacticatecron',$data );
return $result;
}
}