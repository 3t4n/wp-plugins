<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Scheduler_save_controller extends WController {
function save(){
$wid=self::getFormValue('wid','scheduler');
$schid=self::getFormValue('schid','scheduler');
parent::save();
if(empty($wid)) return true;
$prefScheduler=WPref::get($wid );
$editController=$prefScheduler->getPref('editcontroller','');
if(empty($editController)) return true;
if(empty($schid)){
$message=WMessage::get();
$message->userN('1236656718FWVX');
}else{
WPages::redirect('controller='.$editController.'&eid='.$schid );
}
return true;
}
}