<?php defined('JOOBI_SECURE') or die('J....');
class Data_role_role_members_table extends WDataTable{
var $name='role_members';
var $namekey='role.members';
var $dbtid=702;
var $rolid='#allusers';
var $type=30;
var $pkey='uid,rolid';
var $suffix='members';
var $group='role';
var $domain=51;
var $export=2;
var $engine=7;
var $node='role';
var $columnsA=array(
array(
'dbcid'=>6705,
'name'=>'uid',
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
'namekey'=>'702uid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'userID',
'fieldtype'=>'' ),
array(
'dbcid'=>6706,
'name'=>'rolid',
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
'namekey'=>'702rolid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>702,
'ref_dbtid'=>232,
'name'=>'uid',
'name2'=>'uid',
'namekey'=>'FK_role_members_uid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#users#members_node' ),
array(
'dbtid'=>702,
'ref_dbtid'=>566,
'name'=>'rolid',
'name2'=>'rolid',
'namekey'=>'FK_role_members_rolid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#role#role_node' )
);

var $contraintsA=array(
array(
'ctid'=>65622,
'type'=>3,
'namekey'=>'PK_role_members' )
);
}