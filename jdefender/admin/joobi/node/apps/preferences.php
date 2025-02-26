<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Default_apps_preferences {
var $autocheckupdate=1;
var $beta=1;
var $distribserver=1;
var $domain=31;
var $firstrefresh=0;
var $home_site='https://joobi.co';
var $nextcheck=0;
var $notemail=1;
var $request='http://register.joobi.co';
var $service='http://service.joobi.co';
var $showupdate=1;
var $hasupdate=0;
}
class Role_apps_preferences {
var $autocheckupdate='admin';
var $beta='allusers';
var $distribserver='sadmin';
var $domain='allusers';
var $firstrefresh='allusers';
var $home_site='admin';
var $nextcheck='allusers';
var $notemail='admin';
var $request='allusers';
var $service='allusers';
var $showupdate='manager';
var $hasupdate='manager';
}