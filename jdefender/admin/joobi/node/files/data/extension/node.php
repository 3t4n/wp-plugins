<?php defined('JOOBI_SECURE') or die('J....');
class Data_Files_Node_extension extends WDataExtension{
var $publish=1;
var $folder='files';
var $wid=85;
var $type=150;
var $name='Files';
var $destination='node';
var $trans=1;
var $certify=1;
var $namekey='files.node';
var $version=6688;
var $lversion=6688;
var $pref=1;
var $install='';
var $dependencyA=array('images.node'
);
}