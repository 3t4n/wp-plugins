<?php defined('JOOBI_SECURE') or die('J....');
class Data_install_extension_dependency_table extends WDataTable{
var $name='extension_dependency';
var $namekey='extension.dependency';
var $dbtid=352;
var $rolid='#allusers';
var $type=30;
var $pkey='exdpid';
var $suffix='dependency';
var $group='extension';
var $domain=9;
var $export='0';
var $noaudit=1;
var $engine=7;
var $node='install';
var $columnsA=array(
array(
'dbcid'=>1991,
'name'=>'wid',
'pkey'=>0,
'checkval'=>0,
'type'=>3,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>2,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'352wid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>1992,
'name'=>'ref_wid',
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
'namekey'=>'352ref_wid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>11099,
'name'=>'exdpid',
'pkey'=>1,
'checkval'=>0,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>1,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>0,
'namekey'=>'exdpid352',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>352,
'ref_dbtid'=>5,
'name'=>'wid',
'name2'=>'wid',
'namekey'=>'FK_extension_dependency_wid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#apps#extension_node' ),
array(
'dbtid'=>352,
'ref_dbtid'=>5,
'name'=>'ref_wid',
'name2'=>'wid',
'namekey'=>'FK_extension_dependency_ref_wid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#apps#extension_node' )
);

var $contraintsA=array(
array(
'ctid'=>65413,
'type'=>3,
'namekey'=>'PK_extension_dependency_exdpid' ),
array(
'ctid'=>66351,
'type'=>1,
'namekey'=>'UK_extension_dependency_wid_wid_ref' )
);

var $contraintsItemsA=array(
array(
'ctid'=>66351,
'dbcid'=>1991,
'ordering'=>1 ),
array(
'ctid'=>66351,
'dbcid'=>1992,
'ordering'=>2 )
);
}