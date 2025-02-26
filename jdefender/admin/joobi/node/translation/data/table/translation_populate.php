<?php defined('JOOBI_SECURE') or die('J....');
class Data_translation_translation_populate_table extends WDataTable{
var $name='translation_populate';
var $namekey='translation.populate';
var $dbtid=712;
var $rolid='#allusers';
var $type=1;
var $pkey='dbcid,eid';
var $suffix='populate';
var $group='translation';
var $domain=11;
var $export='0';
var $noaudit=1;
var $engine=7;
var $node='translation';
var $columnsA=array(
array(
'dbcid'=>6778,
'name'=>'dbcid',
'pkey'=>1,
'checkval'=>0,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>1,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'712dbcid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6779,
'name'=>'eid',
'pkey'=>1,
'checkval'=>0,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>2,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'712eid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6780,
'name'=>'imac',
'pkey'=>0,
'checkval'=>1,
'type'=>14,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>3,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>50.0,
'export'=>1,
'namekey'=>'imac712',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>7134,
'name'=>'wid',
'pkey'=>0,
'checkval'=>0,
'type'=>3,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>4,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'wid712',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>712,
'ref_dbtid'=>616,
'name'=>'dbcid',
'name2'=>'dbcid',
'namekey'=>'dbcid populate column',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#library#dataset_columns' ),
array(
'dbtid'=>712,
'ref_dbtid'=>5,
'name'=>'wid',
'name2'=>'wid',
'namekey'=>'translation_populate_extension_wid',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#apps#extension_node' )
);

var $contraintsA=array(
array(
'ctid'=>65635,
'type'=>3,
'namekey'=>'PK_translation_populate|main_translation' ),
array(
'ctid'=>65891,
'type'=>2,
'namekey'=>'IX_translation_populate_wid' ),
array(
'ctid'=>66385,
'type'=>2,
'namekey'=>'IX_translation_populate_imac' )
);
}