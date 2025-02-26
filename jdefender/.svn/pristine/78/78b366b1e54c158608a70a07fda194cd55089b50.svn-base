<?php defined('JOOBI_SECURE') or die('J....');
class Data_library_dataset_constraints_table extends WDataTable{
var $name='dataset_constraints';
var $namekey='dataset.constraints';
var $dbtid=454;
var $rolid='#allusers';
var $type=1;
var $pkey='ctid';
var $suffix='constraints';
var $group='dataset';
var $domain=9;
var $export='0';
var $noaudit=1;
var $engine=7;
var $node='library';
var $columnsA=array(
array(
'dbcid'=>3165,
'name'=>'type',
'pkey'=>0,
'checkval'=>1,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>3,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'454type',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>5711,
'name'=>'namekey',
'pkey'=>0,
'checkval'=>1,
'type'=>14,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>4,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>50.0,
'export'=>1,
'namekey'=>'454namekey',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'uniqueID',
'fieldtype'=>'' ),
array(
'dbcid'=>6168,
'name'=>'dbtid',
'pkey'=>0,
'checkval'=>0,
'type'=>2,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>2,
'level'=>0,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'454dbtid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3163,
'name'=>'ctid',
'pkey'=>1,
'checkval'=>0,
'type'=>3,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>1,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>1,
'size'=>0.0,
'export'=>1,
'namekey'=>'454ctid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>11018,
'name'=>'modified',
'pkey'=>0,
'checkval'=>1,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>5,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>0,
'namekey'=>'modified454',
'core'=>1,
'columntype'=>1,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>455,
'ref_dbtid'=>454,
'name'=>'ctid',
'name2'=>'ctid',
'namekey'=>'FK_dataset_constraintsitems_ctid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>99,
'ref_table'=>'#library#dataset_constraintsitems' ),
array(
'dbtid'=>454,
'ref_dbtid'=>549,
'name'=>'dbtid',
'name2'=>'dbtid',
'namekey'=>'FK_dataset_tables_dbtid_constraints',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>99,
'ref_table'=>'#library#dataset_tables' )
);

var $contraintsA=array(
array(
'ctid'=>140,
'type'=>2,
'namekey'=>'IX_dataset_constraints_dbtid_type' ),
array(
'ctid'=>43909,
'type'=>1,
'namekey'=>'UK_dataset_constraints_namekey' )
);

var $contraintsItemsA=array(
array(
'ctid'=>43909,
'dbcid'=>5711,
'ordering'=>1 )
);
}