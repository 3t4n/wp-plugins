<?php defined('JOOBI_SECURE') or die('J....');
class Data_design_layout_fields_table extends WDataTable{
var $name='layout_fields';
var $namekey='layout.fields';
var $dbtid=999;
var $rolid='#allusers';
var $type=30;
var $pkey='yid,fdid';
var $domain=9;
var $export=2;
var $noaudit=1;
var $engine=7;
var $node='design';
var $columnsA=array(
array(
'dbcid'=>9124,
'name'=>'yid',
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
'namekey'=>'999yid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>9125,
'name'=>'fdid',
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
'namekey'=>'999fdid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>9132,
'name'=>'parent',
'pkey'=>0,
'checkval'=>1,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>3,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'parent999',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>999,
'ref_dbtid'=>2,
'name'=>'yid',
'name2'=>'yid',
'namekey'=>'FK_layout_fields_yid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#library#layout_node' ),
array(
'dbtid'=>999,
'ref_dbtid'=>994,
'name'=>'fdid',
'name2'=>'fdid',
'namekey'=>'FK_layout_fields_fdid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#design#model_fields' ),
array(
'dbtid'=>999,
'ref_dbtid'=>999,
'name'=>'parent',
'name2'=>'parent',
'namekey'=>'FK_layout_fields_parent',
'onupdate'=>1,
'ondelete'=>1,
'ordering'=>99,
'ref_table'=>'#design#layout_fields' )
);

var $contraintsA=array(
array(
'ctid'=>65979,
'type'=>3,
'namekey'=>'PK_layout_fields|main_library' )
);
}