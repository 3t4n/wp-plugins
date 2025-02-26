<?php defined('JOOBI_SECURE') or die('J....');
class Data_users_members_lang_table extends WDataTable{
var $name='members_lang';
var $namekey='members.lang';
var $dbtid=264;
var $rolid='#allusers';
var $type=30;
var $pkey='uid,lgid';
var $suffix='lang';
var $group='members';
var $domain=51;
var $export=2;
var $engine=7;
var $node='users';
var $columnsA=array(
array(
'dbcid'=>1651,
'name'=>'uid',
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
'namekey'=>'264uid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'userID',
'fieldtype'=>'' ),
array(
'dbcid'=>1652,
'name'=>'lgid',
'pkey'=>1,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>1,
'ordering'=>2,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'264lgid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>2682,
'name'=>'ordering',
'pkey'=>0,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>3,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>1,
'size'=>0.0,
'export'=>1,
'namekey'=>'264ordering',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>264,
'ref_dbtid'=>232,
'name'=>'uid',
'name2'=>'uid',
'namekey'=>'FK_members_lang_uid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>99,
'ref_table'=>'#users#members_node' ),
array(
'dbtid'=>264,
'ref_dbtid'=>199,
'name'=>'lgid',
'name2'=>'lgid',
'namekey'=>'FK_members_lang_lgid',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>99,
'ref_table'=>'#library#language_node' )
);

var $contraintsA=array(
array(
'ctid'=>65398,
'type'=>3,
'namekey'=>'PK_members_language_uid_lgid' )
);
}