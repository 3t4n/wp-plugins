<?php defined('JOOBI_SECURE') or die('J....');
class Data_library_dataset_constraintsitems_table extends WDataTable{
var $name='dataset_constraintsitems';
var $namekey='dataset.constraintsitems';
var $dbtid=455;
var $rolid='#allusers';
var $type=30;
var $pkey='dbcid,ctid';
var $suffix='constraintsitems';
var $group='dataset';
var $domain=9;
var $export='0';
var $noaudit=1;
var $engine=7;
var $node='library';
var $columnsA=array(
array(
'dbcid'=>3166,
'name'=>'ctid',
'pkey'=>1,
'checkval'=>0,
'type'=>2,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>1,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>1,
'size'=>0.0,
'export'=>1,
'namekey'=>'455ctid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3168,
'name'=>'ordering',
'pkey'=>0,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>5,
'ordering'=>4,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'455ordering',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6210,
'name'=>'dbcid',
'pkey'=>1,
'checkval'=>0,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>2,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'dbcid455',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>3169,
'name'=>'sort',
'pkey'=>0,
'checkval'=>0,
'type'=>25,
'attributes'=>0,
'mandatory'=>1,
'default'=>'',
'ordering'=>5,
'level'=>1,
'rolid'=>'#allusers',
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'455sort',
'core'=>1,
'columntype'=>0,
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
'ref_table'=>'#library#dataset_constraints' ),
array(
'dbtid'=>455,
'ref_dbtid'=>616,
'name'=>'dbcid',
'name2'=>'dbcid',
'namekey'=>'FK_foreign_dataset_tables_constraintsitems',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>99,
'ref_table'=>'#library#dataset_columns' )
);

var $contraintsA=array(
array(
'ctid'=>65426,
'type'=>3,
'namekey'=>'PK_model_constraintsitems_ctid_feid' ),
array(
'ctid'=>66271,
'type'=>2,
'namekey'=>'IX_dataset_constraintsitems_ordering' )
);
}