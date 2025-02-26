<?php defined('JOOBI_SECURE') or die('J....');
class Data_library_eguillage_roles_table extends WDataTable{
var $name='eguillage_roles';
var $namekey='eguillage.roles';
var $dbtid=804;
var $rolid='#allusers';
var $type=10;
var $pkey='ctrid';
var $suffix='roles';
var $group='eguillage';
var $domain=51;
var $export=2;
var $engine=7;
var $node='library';
var $columnsA=array(
array(
'dbcid'=>7399,
'name'=>'ctrid',
'pkey'=>1,
'checkval'=>0,
'type'=>3,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>1,
'level'=>0,
'rolid'=>0,
'extra'=>1,
'size'=>0.0,
'export'=>1,
'namekey'=>'804ctrid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>7400,
'name'=>'rolid',
'pkey'=>0,
'checkval'=>0,
'type'=>2,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>2,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'rolid804',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>7401,
'name'=>'uid',
'pkey'=>0,
'checkval'=>0,
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
'namekey'=>'uid804',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'userID',
'fieldtype'=>'' ),
array(
'dbcid'=>7402,
'name'=>'modified',
'pkey'=>0,
'checkval'=>0,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>4,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'modified804',
'core'=>1,
'columntype'=>1,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>7407,
'name'=>'override',
'pkey'=>0,
'checkval'=>1,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>1,
'ordering'=>5,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'override804',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>804,
'ref_dbtid'=>475,
'name'=>'ctrid',
'name2'=>'ctrid',
'namekey'=>'FK_controller_ctrid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#library#eguillage_node' ),
array(
'dbtid'=>804,
'ref_dbtid'=>566,
'name'=>'rolid',
'name2'=>'rolid',
'namekey'=>'804_rolid_566',
'onupdate'=>1,
'ondelete'=>1,
'ordering'=>2,
'ref_table'=>'#role#role_node' ),
array(
'dbtid'=>804,
'ref_dbtid'=>232,
'name'=>'uid',
'name2'=>'uid',
'namekey'=>'804_uid_232',
'onupdate'=>1,
'ondelete'=>1,
'ordering'=>3,
'ref_table'=>'#users#members_node' )
);

var $contraintsA=array(
array(
'ctid'=>65709,
'type'=>3,
'namekey'=>'PK_eguillage_roles' )
);
}