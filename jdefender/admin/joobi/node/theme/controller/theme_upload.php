<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Theme_upload_controller extends WController {
function upload(){
$appsUploadC=WClass::get('apps.upload');
$status=$appsUploadC->uploadINstallPackage();
if(!$status ) return true;
return true;
}
}