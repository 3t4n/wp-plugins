<?php defined('JOOBI_SECURE') or die('J....');
class Data_security_security_ip_status_listing_picklist extends WDataPicklist{
var $wid='#security.node';
var $outype=6;
var $map='status';
var $type=1;
var $did=1147;
var $namekey='security_ip_status_listing';
var $first_all='0';
var $lib_ext='0';
var $sid='#security.ipblocked';
var $rolid='#allusers';
var $alias='IP status';
var $name='1470801675JRAF';
var $description='';
var $valuesA=array(
array(
'vid'=>1067,
'publish'=>1,
'params'=>'',
'ordering'=>1,
'level'=>0,
'rolid'=>'#allusers',
'value'=>0,
'valuetxt'=>'',
'premium'=>0,
'namekey'=>'security_ip_status_listing_any',
'core'=>1,
'color'=>'',
'parent'=>'',
'inputbox'=>0,
'name'=>'1453566970CLZN' ),
array(
'vid'=>1063,
'publish'=>1,
'params'=>'',
'ordering'=>2,
'level'=>0,
'rolid'=>'#allusers',
'value'=>1,
'valuetxt'=>'',
'premium'=>0,
'namekey'=>'security_ip_status_listing_active',
'core'=>1,
'color'=>'',
'parent'=>'',
'inputbox'=>0,
'name'=>'1237967983CGYC' ),
array(
'vid'=>1064,
'publish'=>1,
'params'=>'',
'ordering'=>3,
'level'=>0,
'rolid'=>'#allusers',
'value'=>3,
'valuetxt'=>'',
'premium'=>0,
'namekey'=>'security_ip_status_listing_whitelist',
'core'=>1,
'color'=>'',
'parent'=>'',
'inputbox'=>0,
'name'=>'1242282454BFXW' ),
array(
'vid'=>1066,
'publish'=>1,
'params'=>'',
'ordering'=>4,
'level'=>0,
'rolid'=>'#allusers',
'value'=>5,
'valuetxt'=>'',
'premium'=>0,
'namekey'=>'security_ip_status_listing_blocked',
'core'=>1,
'color'=>1,
'parent'=>'',
'inputbox'=>0,
'name'=>'1242282446GIMB' ),
array(
'vid'=>1065,
'publish'=>1,
'params'=>'',
'ordering'=>5,
'level'=>0,
'rolid'=>'#allusers',
'value'=>7,
'valuetxt'=>'',
'premium'=>0,
'namekey'=>'security_ip_status_listing_blacklist',
'core'=>1,
'color'=>'',
'parent'=>'',
'inputbox'=>0,
'name'=>'1453344545SNXH' )
);
}