<?php defined('JOOBI_SECURE') or die('J....');
class Data_currency_currency_country_table extends WDataTable{
var $name='currency_country';
var $namekey='currency.country';
var $dbtid=690;
var $rolid='#allusers';
var $type=30;
var $pkey='ctyid,curid';
var $suffix='country';
var $group='currency';
var $domain=51;
var $export=2;
var $engine=7;
var $node='currency';
var $columnsA=array(
array(
'dbcid'=>6653,
'name'=>'curid',
'pkey'=>1,
'checkval'=>1,
'type'=>4,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>2,
'level'=>0,
'rolid'=>0,
'extra'=>1,
'size'=>0.0,
'export'=>1,
'namekey'=>'690curid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>6654,
'name'=>'ctyid',
'pkey'=>1,
'checkval'=>1,
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
'namekey'=>'ctyid690',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>7034,
'name'=>'ordering',
'pkey'=>0,
'checkval'=>1,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>0,
'ordering'=>3,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>0.0,
'export'=>1,
'namekey'=>'ordering690',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>690,
'ref_dbtid'=>624,
'name'=>'curid',
'name2'=>'curid',
'namekey'=>'FK_currency.country_curid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#currency#currency_node' ),
array(
'dbtid'=>690,
'ref_dbtid'=>200,
'name'=>'ctyid',
'name2'=>'ctyid',
'namekey'=>'FK_currency.country_ctyid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#countries#country_node' )
);

var $contraintsA=array(
array(
'ctid'=>65612,
'type'=>3,
'namekey'=>'PK_currency_country' )
);
}