<?php defined('JOOBI_SECURE') or die('J....');
class Data_library_layout_multiformstrans_table extends WDataTable{
var $name='layout_multiformstrans';
var $namekey='layout.multiformstrans';
var $dbtid=482;
var $rolid='#allusers';
var $type=20;
var $pkey='fid,lgid';
var $suffix='multiformstrans';
var $group='layout';
var $domain=9;
var $export='0';
var $noaudit=1;
var $engine=7;
var $node='library';
var $columnsA=array(
array(
'dbcid'=>3410,
'name'=>'fid',
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
'namekey'=>'482fid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3411,
'name'=>'lgid',
'pkey'=>1,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>2,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'482lgid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3412,
'name'=>'name',
'pkey'=>0,
'checkval'=>0,
'type'=>14,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>3,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>255.0,
'export'=>1,
'namekey'=>'482name',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3413,
'name'=>'description',
'pkey'=>0,
'checkval'=>0,
'type'=>16,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>4,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'482description',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6824,
'name'=>'auto',
'pkey'=>0,
'checkval'=>0,
'type'=>1,
'attributes'=>0,
'mandatory'=>1,
'default'=>2,
'ordering'=>99,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>0,
'namekey'=>'auto482',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6825,
'name'=>'fromlgid',
'pkey'=>0,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>99,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>0,
'namekey'=>'fromlgid482',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>482,
'ref_dbtid'=>1,
'name'=>'fid',
'name2'=>'fid',
'namekey'=>'FK_layout_multiformstrans_fid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#library#layout_multiforms' ),
array(
'dbtid'=>482,
'ref_dbtid'=>199,
'name'=>'lgid',
'name2'=>'lgid',
'namekey'=>'FK_layout_multiformstrans_lgid',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#library#language_node' )
);

var $contraintsA=array(
array(
'ctid'=>65431,
'type'=>3,
'namekey'=>'PK_view_formstrans_fid_lgid' )
);
}