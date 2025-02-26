<?php defined('JOOBI_SECURE') or die('J....');
class Data_library_library_security_level_picklist extends WDataPicklist{
var $wid='#library.node';
var $outype=6;
var $map='security';
var $type=1;
var $did=378;
var $namekey='library_security_level';
var $first_all='0';
var $external='security';
var $lib_ext='0';
var $rolid='#manager';
var $alias='Security Level';
var $name='1217930839LUIP';
var $description='1302521446FVMH';
var $valuesA=array(
array(
'vid'=>1236,
'publish'=>1,
'params'=>'',
'ordering'=>1,
'level'=>0,
'rolid'=>'#allusers',
'value'=>10,
'valuetxt'=>'',
'premium'=>0,
'namekey'=>'library_security_level_high',
'core'=>1,
'color'=>1,
'parent'=>'',
'inputbox'=>0,
'name'=>'1227581114PJBY' ),
array(
'vid'=>1237,
'publish'=>1,
'params'=>'',
'ordering'=>2,
'level'=>0,
'rolid'=>'#allusers',
'value'=>5,
'valuetxt'=>'',
'premium'=>0,
'namekey'=>'library_security_level_medium',
'core'=>1,
'color'=>1,
'parent'=>'',
'inputbox'=>0,
'name'=>'1227581114PJBX' ),
array(
'vid'=>1238,
'publish'=>1,
'params'=>'',
'ordering'=>3,
'level'=>0,
'rolid'=>'#allusers',
'value'=>1,
'valuetxt'=>'',
'premium'=>0,
'namekey'=>'library_security_level_low',
'core'=>1,
'color'=>1,
'parent'=>'',
'inputbox'=>0,
'name'=>'1227581114PJBW' )
);
}