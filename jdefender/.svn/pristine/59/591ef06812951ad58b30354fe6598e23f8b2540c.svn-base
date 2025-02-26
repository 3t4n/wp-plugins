<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_Users_listings_view extends Output_Listings_class {
function prepareView(){
if(!WExtension::exist('main.node'))$this->removeElements( array('users_listings_users_ip','users_listings_users_login_report'));
$map='rolid';
$yid=WView::get('users_listings','yid');
$did=WView::picklist('users_roles_listing','', null, 'did');
$val=WGlobals::getUserState('v-'.$yid.'-'.$did.'-pick3list-'.$map, $map, null );
if(empty($val )){
$this->removeElements('users_listing_rolid_filter');
}else{
WGlobals::set('rolid',$val );
}
return true;
}
}