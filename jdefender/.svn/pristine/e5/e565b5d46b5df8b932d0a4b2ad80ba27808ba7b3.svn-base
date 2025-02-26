<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Output_tour_controller extends WController {
function tour(){
$trid=WGlobals::get('trid');
$action=WGlobals::get('tract');
$yid=WGlobals::get('yid');
$designTourusersM=WModel::get('output.tourusers');
if(!empty($trid )){
$designTourusersM->whereE('trid',$trid );
$designTourusersM->whereE('yid', 0 );
$designTourusersM->whereE('uid', WUsers::get('uid'));
$designTourusersM->setVal('status', 9 );
$designTourusersM->update();
}elseif(!empty($yid )){
$designTourusersM->whereE('yid',$yid );
$designTourusersM->whereE('trid', 0 );
$designTourusersM->whereE('uid', WUsers::get('uid'));
$designTourusersM->setVal('status', 9 );
$designTourusersM->update();
}
exit;
}
}