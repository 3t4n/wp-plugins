<?php defined('JOOBI_SECURE') or die('J....');
class Data_space_space_theme_table extends WDataTable{
var $name='space_theme';
var $namekey='space.theme';
var $dbtid=3429;
var $rolid='#allusers';
var $type=1;
var $pkey='wsid,size,device';
var $domain=51;
var $export=2;
var $engine=7;
var $node='space';
var $columnsA=array(
array(
'dbcid'=>10654,
'name'=>'wsid',
'pkey'=>1,
'checkval'=>0,
'type'=>2,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>1,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'3429wsid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>10655,
'name'=>'size',
'pkey'=>1,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>2,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'3429size',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>10656,
'name'=>'device',
'pkey'=>1,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>3,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'3429device',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>10657,
'name'=>'tmid',
'pkey'=>0,
'checkval'=>1,
'type'=>3,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>4,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'tmid3429',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>3429,
'ref_dbtid'=>451,
'name'=>'tmid',
'name2'=>'tmid',
'namekey'=>'FK_space_theme_tmid',
'onupdate'=>1,
'ondelete'=>1,
'ordering'=>1,
'ref_table'=>'#theme#theme_node' ),
array(
'dbtid'=>3465,
'ref_dbtid'=>3429,
'name'=>'size',
'name2'=>'size',
'namekey'=>'FK_backup_node_size',
'onupdate'=>1,
'ondelete'=>1,
'ordering'=>99,
'ref_table'=>'#backup#backup_node' )
);

var $contraintsA=array(
array(
'ctid'=>66204,
'type'=>3,
'namekey'=>'PK_space_theme' )
);
}