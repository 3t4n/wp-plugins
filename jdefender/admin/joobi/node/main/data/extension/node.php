<?php defined('JOOBI_SECURE') or die('J....');
class Data_Main_Node_extension extends WDataExtension{
var $publish=1;
var $folder='main';
var $wid=1749;
var $type=150;
var $name='Main';
var $destination='node';
var $trans=1;
var $certify=1;
var $namekey='main.node';
var $version=4443;
var $lversion=4443;
var $pref=1;
var $install='';
var $showconfig='0';
var $description='1470785171DQYU';
var $descriptionTxt='Main node for the applications.
Any application needs to include this node';
var $dependencyA=array('countries.node','scheduler.node','space.node','events.node','newzletter.node','jomsocial.node','design.node','main.includes','joomla30.site.theme','wp40.site.theme','japps.application','wpbootstrap.site.theme','Facebook.includes','twitter.includes'
);

var $dependancyA=array(
array(
'namekey'=>'main.includes',
'version'=>2761,
'type'=>175 ),
array(
'namekey'=>'joomla30.site.theme',
'version'=>2242,
'type'=>102 ),
array(
'namekey'=>'wp40.site.theme',
'version'=>468,
'type'=>102 ),
array(
'namekey'=>'wpbootstrap.site.theme',
'version'=>317,
'type'=>102 ),
array(
'namekey'=>'Facebook.includes',
'version'=>1464,
'type'=>175 ),
array(
'namekey'=>'twitter.includes',
'version'=>1363,
'type'=>175 )
);
}