<?php defined('JOOBI_SECURE') or die('J....');
class Data_library_layout_dropset_table extends WDataTable{
var $name='layout_dropset';
var $namekey='layout.dropset';
var $dbtid=180;
var $rolid='#allusers';
var $type=30;
var $pkey='did,yid';
var $suffix='dropset';
var $group='layout';
var $domain=9;
var $export='0';
var $noaudit=1;
var $engine=7;
var $node='library';
var $columnsA=array(
array(
'dbcid'=>1231,
'name'=>'did',
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
'namekey'=>'180did',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>1232,
'name'=>'yid',
'pkey'=>1,
'checkval'=>0,
'type'=>3,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>2,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'180yid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>2697,
'name'=>'ordering',
'pkey'=>0,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>7,
'ordering'=>3,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>1,
'size'=>0.0,
'export'=>1,
'namekey'=>'180ordering',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>180,
'ref_dbtid'=>2,
'name'=>'yid',
'name2'=>'yid',
'namekey'=>'FK_layout_dropset_yid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#library#layout_node' ),
array(
'dbtid'=>180,
'ref_dbtid'=>4,
'name'=>'did',
'name2'=>'did',
'namekey'=>'FK_layout_dropset_did',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#library#dropset_node' )
);

var $contraintsA=array(
array(
'ctid'=>65389,
'type'=>3,
'namekey'=>'PK_view_picklist_did_yid' )
);
}