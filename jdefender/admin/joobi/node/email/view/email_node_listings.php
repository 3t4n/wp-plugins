<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Email_Email_node_listings_view extends Output_Listings_class {
function prepareView(){
$type=WPref::load('PEMAIL_NODE_TYPE');
if(!empty($type) && 'html'==$type){
$this->removeElements('mail_node_listings_mail_html');
}
return true;
}
}