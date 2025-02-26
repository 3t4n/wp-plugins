<?php defined('JOOBI_SECURE') or die('J....');
class Data_security_ip_node_table extends WDataTable{
var $name='ip_node';
var $namekey='ip.node';
var $dbtid=724;
var $rolid='#allusers';
var $type=1;
var $pkey='ipid';
var $suffix='node';
var $group='ip';
var $domain=87;
var $export=2;
var $engine=7;
var $node='security';
var $columnsA=array(
array(
'dbcid'=>6949,
'name'=>'ipid',
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
'namekey'=>'724ipid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6950,
'name'=>'from',
'pkey'=>0,
'checkval'=>1,
'type'=>7,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>2,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'from724',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6952,
'name'=>'to',
'pkey'=>0,
'checkval'=>1,
'type'=>7,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>3,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'to724',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6953,
'name'=>'ctyid',
'pkey'=>0,
'checkval'=>1,
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
'namekey'=>'ctyid724',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>11143,
'name'=>'created',
'pkey'=>0,
'checkval'=>1,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>1456900000,
'ordering'=>5,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'created724',
'core'=>1,
'columntype'=>1,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>724,
'ref_dbtid'=>200,
'name'=>'ctyid',
'name2'=>'ctyid',
'namekey'=>'ctyid',
'onupdate'=>1,
'ondelete'=>1,
'ordering'=>1,
'ref_table'=>'#countries#country_node' ),
array(
'dbtid'=>3344,
'ref_dbtid'=>724,
'name'=>'ctyid',
'name2'=>'ctyid',
'namekey'=>'FK_activity_node_ctyid',
'onupdate'=>1,
'ondelete'=>1,
'ordering'=>1,
'ref_table'=>'#security#activity_node' )
);

var $contraintsA=array(
array(
'ctid'=>65653,
'type'=>3,
'namekey'=>'PK_ip_node' ),
array(
'ctid'=>66206,
'type'=>1,
'namekey'=>'UK_ip_node_to_from' )
);

var $contraintsItemsA=array(
array(
'ctid'=>66206,
'dbcid'=>6950,
'ordering'=>1 ),
array(
'ctid'=>66206,
'dbcid'=>6952,
'ordering'=>1 )
);
}