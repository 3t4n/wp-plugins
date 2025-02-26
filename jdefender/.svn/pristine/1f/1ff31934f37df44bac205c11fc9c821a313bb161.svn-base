<?php defined('JOOBI_SECURE') or die('J....');
class Data_apps_extension_level_table extends WDataTable{
var $name='extension_level';
var $namekey='extension.level';
var $dbtid=509;
var $rolid='#allusers';
var $type=1;
var $pkey='lwid';
var $suffix='level';
var $group='extension';
var $domain=9;
var $export='0';
var $noaudit=1;
var $engine=7;
var $node='apps';
var $columnsA=array(
array(
'dbcid'=>3478,
'name'=>'wid',
'pkey'=>0,
'checkval'=>0,
'type'=>3,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>3,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'509wid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3479,
'name'=>'level',
'pkey'=>0,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>2,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'509level',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6326,
'name'=>'namekey',
'pkey'=>0,
'checkval'=>1,
'type'=>14,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>5,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>50.0,
'export'=>1,
'namekey'=>'namekey509',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'uniqueID',
'fieldtype'=>'' ),
array(
'dbcid'=>3477,
'name'=>'lwid',
'pkey'=>1,
'checkval'=>0,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>1,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>1,
'size'=>0.0,
'export'=>1,
'namekey'=>'509lwid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3525,
'name'=>'status',
'pkey'=>0,
'checkval'=>0,
'type'=>1,
'attributes'=>0,
'mandatory'=>1,
'default'=>0,
'ordering'=>4,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'509status',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>665,
'ref_dbtid'=>509,
'name'=>'lwid',
'name2'=>'lwid',
'namekey'=>'665_lwid_509',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>3,
'ref_table'=>'#apps#extension_cmsversion' ),
array(
'dbtid'=>510,
'ref_dbtid'=>509,
'name'=>'lwid',
'name2'=>'lwid',
'namekey'=>'FK_extension_leveltrans_lwid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>99,
'ref_table'=>'#apps#extension_leveltrans' )
);

var $contraintsA=array(
array(
'ctid'=>4215,
'type'=>1,
'namekey'=>'UK_extension_level_wid_level' ),
array(
'ctid'=>65548,
'type'=>1,
'namekey'=>'UK_namekey_extension_level' )
);

var $contraintsItemsA=array(
array(
'ctid'=>4215,
'dbcid'=>3478,
'ordering'=>1 ),
array(
'ctid'=>4215,
'dbcid'=>3479,
'ordering'=>2 ),
array(
'ctid'=>65548,
'dbcid'=>6326,
'ordering'=>5 )
);
}