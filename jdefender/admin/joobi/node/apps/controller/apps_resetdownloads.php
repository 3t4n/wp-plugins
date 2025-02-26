<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Apps_resetdownloads_controller extends WController {
function resetdownloads(){
$fileS=WGet::folder();
$fileS->delete( JOOBI_DS_USER.'downloads/packages');
$this->userS('1429564804LHII');
WPage::redirect('controller=apps&task=preferences');
return true;
}
}