<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Scheduler_Node_model extends WModel {
private $_copyingTask=false;
function validate(){
$this->validateDate('nextdate', true);
if(empty($this->viewname) && !empty($this->core))$this->viewname=$this->namekey;
if(!empty($this->ptype) && $this->ptype==2){
$cronparser=WClass::get('scheduler.cronparser');
$cronparser->checkCron($this->cron );
}
return parent::validate();
}
function copyValidate(){
$this->_copyingTask=true;
return true;
}
}