<?php defined('JOOBI_SECURE') or die('J....');
class Data_translation_translation_reference_table extends WDataTable{
var $name='translation_reference';
var $namekey='translation.reference';
var $dbtid=511;
var $rolid='#allusers';
var $type=30;
var $pkey='wid,imac';
var $suffix='reference';
var $group='translation';
var $domain=11;
var $export='0';
var $engine=7;
var $node='translation';
var $columnsA=array(
array(
'dbcid'=>3488,
'name'=>'wid',
'pkey'=>1,
'checkval'=>0,
'type'=>3,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>1,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'511wid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3490,
'name'=>'load',
'pkey'=>0,
'checkval'=>0,
'type'=>25,
'attributes'=>0,
'mandatory'=>1,
'default'=>0,
'ordering'=>3,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'511load',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6377,
'name'=>'imac',
'pkey'=>1,
'checkval'=>1,
'type'=>14,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>4,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>255.0,
'export'=>1,
'namekey'=>'imac511',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>511,
'ref_dbtid'=>5,
'name'=>'wid',
'name2'=>'wid',
'namekey'=>'FK_translation_reference_wid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#apps#extension_node' ),
array(
'dbtid'=>511,
'ref_dbtid'=>713,
'name'=>'imac',
'name2'=>'imac',
'namekey'=>'FK_translation_reference_imac',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#translation#translation_en' )
);

var $contraintsA=array(
array(
'ctid'=>65443,
'type'=>3,
'namekey'=>'PK_translation_reference_wid_imac' ),
array(
'ctid'=>65852,
'type'=>2,
'namekey'=>'IX_translation_reference_load' )
);
}