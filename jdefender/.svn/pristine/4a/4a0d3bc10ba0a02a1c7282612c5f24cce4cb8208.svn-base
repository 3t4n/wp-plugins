<?php defined('JOOBI_SECURE') or die('J....');
class Data_scheduler_scheduler_processes_table extends WDataTable{
var $name='scheduler_processes';
var $namekey='scheduler.processes';
var $dbtid=919;
var $rolid='#allusers';
var $type=1;
var $pkey='pcsid';
var $suffix='processes';
var $group='scheduler';
var $domain=51;
var $export=2;
var $engine=7;
var $node='scheduler';
var $columnsA=array(
array(
'dbcid'=>8427,
'name'=>'pcsid',
'pkey'=>1,
'checkval'=>0,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>1,
'level'=>0,
'rolid'=>0,
'extra'=>1,
'size'=>0.0,
'export'=>1,
'namekey'=>'919pcsid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>8428,
'name'=>'schid',
'pkey'=>0,
'checkval'=>1,
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
'namekey'=>'schid919',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>8429,
'name'=>'created',
'pkey'=>0,
'checkval'=>1,
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
'namekey'=>'created919',
'core'=>1,
'columntype'=>1,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>919,
'ref_dbtid'=>460,
'name'=>'schid',
'name2'=>'schid',
'namekey'=>'FK_scheduler_processes_schid',
'onupdate'=>1,
'ondelete'=>1,
'ordering'=>1,
'ref_table'=>'#scheduler#scheduler_node' )
);

var $contraintsA=array(
array(
'ctid'=>65871,
'type'=>3,
'namekey'=>'PK_scheduler_process' ),
array(
'ctid'=>65873,
'type'=>2,
'namekey'=>'IX_scheduler_processes_schid' )
);
}