<?php defined('JOOBI_SECURE') or die('J....');
class Data_library_dropset_valuestrans_table extends WDataTable{
var $name='dropset_valuestrans';
var $namekey='dropset.valuestrans';
var $dbtid=541;
var $rolid='#allusers';
var $type=20;
var $pkey='vid,lgid';
var $suffix='valuestrans';
var $group='dropset';
var $domain=9;
var $export='0';
var $noaudit=1;
var $engine=7;
var $node='library';
var $columnsA=array(
array(
'dbcid'=>3715,
'name'=>'vid',
'pkey'=>1,
'checkval'=>0,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>1,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'541vid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>5494,
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
'size'=>4.0,
'export'=>1,
'namekey'=>'541lgid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3717,
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
'namekey'=>'541name',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6856,
'name'=>'auto',
'pkey'=>0,
'checkval'=>0,
'type'=>1,
'attributes'=>0,
'mandatory'=>1,
'default'=>2,
'ordering'=>5,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>0,
'namekey'=>'auto541',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6857,
'name'=>'fromlgid',
'pkey'=>0,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>4,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>0,
'namekey'=>'fromlgid541',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>541,
'ref_dbtid'=>6,
'name'=>'vid',
'name2'=>'vid',
'namekey'=>'FK_picklist_valuestrans_vid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>99,
'ref_table'=>'#library#dropset_values' ),
array(
'dbtid'=>541,
'ref_dbtid'=>199,
'name'=>'lgid',
'name2'=>'lgid',
'namekey'=>'FK_picklist_valuestrans_lgid',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>99,
'ref_table'=>'#library#language_node' )
);

var $contraintsA=array(
array(
'ctid'=>65456,
'type'=>3,
'namekey'=>'PK_picklist_valuestrans_vid_lgid' )
);
}