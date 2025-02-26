<?php defined('JOOBI_SECURE') or die('J....');
class Data_main_redirect_sef_table extends WDataTable{
var $name='redirect_sef';
var $namekey='redirect.sef';
var $dbtid=3495;
var $rolid='#allusers';
var $type=1;
var $pkey='sefid';
var $domain=51;
var $export=2;
var $engine=5;
var $node='main';
var $columnsA=array(
array(
'dbcid'=>11108,
'name'=>'sefid',
'pkey'=>1,
'checkval'=>0,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>1,
'level'=>0,
'rolid'=>0,
'extra'=>1,
'size'=>0.0,
'export'=>1,
'namekey'=>'3495sefid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>11109,
'name'=>'namekey',
'pkey'=>0,
'checkval'=>0,
'type'=>14,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>2,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>250.0,
'export'=>1,
'namekey'=>'namekey3495',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>11110,
'name'=>'lgid',
'pkey'=>0,
'checkval'=>1,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>1,
'ordering'=>3,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'lgid3495',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>11111,
'name'=>'controller',
'pkey'=>0,
'checkval'=>1,
'type'=>14,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>4,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>100.0,
'export'=>1,
'namekey'=>'controller3495',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>11112,
'name'=>'task',
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
'size'=>100.0,
'export'=>1,
'namekey'=>'task3495',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>11113,
'name'=>'eid',
'pkey'=>0,
'checkval'=>1,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>6,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'eid3495',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>11114,
'name'=>'others',
'pkey'=>0,
'checkval'=>1,
'type'=>14,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>7,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>254.0,
'export'=>1,
'namekey'=>'others3495',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>3495,
'ref_dbtid'=>199,
'name'=>'lgid',
'name2'=>'lgid',
'namekey'=>'FK_redirect_sef_lgid',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>99,
'ref_table'=>'#library#language_node' )
);

var $contraintsA=array(
array(
'ctid'=>66352,
'type'=>3,
'namekey'=>'PK_redirect_sef' ),
array(
'ctid'=>66353,
'type'=>1,
'namekey'=>'UK_redirect_sef_namekey' ),
array(
'ctid'=>66354,
'type'=>2,
'namekey'=>'IX_redirect_sef_all' )
);

var $contraintsItemsA=array(
array(
'ctid'=>66353,
'dbcid'=>11109,
'ordering'=>5 )
);
}