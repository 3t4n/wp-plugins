<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Email_Cleanstats_scheduler extends Scheduler_Parent_class {
function process(){
$statisticsClean=WPref::load('PEMAIL_NODE_STATISTICS_CLEAN');
if(empty($statisticsClean)) return true;
$date=time() - $statisticsClean * 86400;
$emailStatisticsUserM=WModel::get('email.statisticsuser');
$emailStatisticsUserM->where('created','<',$date );
$emailStatisticsUserM->delete();
if( WExtension::exist('mailing.node')){
$emailStatisticsUserM=WModel::get('mailing.open');
$emailStatisticsUserM->where('created','<',$date );
$emailStatisticsUserM->delete();
}
return true;
}
}