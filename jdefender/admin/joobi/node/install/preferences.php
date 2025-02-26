<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Default_install_preferences {
var $affiliate='';
var $distrib_server5='';
var $distrib_website='';
var $distrib_website_beta='';
var $distrib_website_beta_time=1429215000;
var $distrib_website_dev='';
var $fresh='';
var $installdebug=0;
var $installdetails=0;
var $install_params=0;
var $install_status=0;
var $license='';
var $showjCenter='';
var $distrib_edit=0;
var $maindistrib='http://server.joobi.co';
var $libinstalled=0;
var $skippack=0; }
class Role_install_preferences {
var $affiliate='allusers';
var $distrib_server5='allusers';
var $distrib_website='allusers';
var $distrib_website_beta='sadmin';
var $distrib_website_beta_time='allusers';
var $distrib_website_dev='sadmin';
var $fresh='allusers';
var $installdebug='admin';
var $installdetails='admin';
var $install_params='manager';
var $install_status='manager';
var $license='allusers';
var $showjCenter='allusers';
var $distrib_edit='sadmin';
var $maindistrib='admin';
var $libinstalled='manager';
var $skippack='manager';
}