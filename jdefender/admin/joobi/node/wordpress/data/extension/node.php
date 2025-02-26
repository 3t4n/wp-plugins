<?php defined('JOOBI_SECURE') or die('J....');
class Data_Wordpress_Node_extension extends WDataExtension{
var $publish=1;
var $folder='wordpress';
var $wid=1928;
var $type=150;
var $name='WordpPress';
var $destination='node';
var $trans=1;
var $certify=1;
var $namekey='wordpress.node';
var $version=457;
var $lversion=457;
var $install='';
var $framework=10;
var $description='1473290976SXEE';
var $descriptionTxt='Specific class for WordpPress';
var $dependencyA=array('theme.node','wp40.admin.theme'
);

var $dependancyA=array(
array(
'namekey'=>'wp40.admin.theme',
'version'=>559,
'type'=>101 )
);
}