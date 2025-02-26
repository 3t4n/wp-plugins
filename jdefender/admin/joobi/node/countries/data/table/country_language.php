<?php defined('JOOBI_SECURE') or die('J....');
class Data_countries_country_language_table extends WDataTable{
var $name='country_language';
var $namekey='country.language';
var $dbtid=734;
var $rolid='#allusers';
var $type=30;
var $pkey='ctyid,lgid';
var $suffix='language';
var $group='country';
var $domain=51;
var $export=2;
var $engine=7;
var $node='countries';
var $columnsA=array(
array(
'dbcid'=>7030,
'name'=>'ctyid',
'pkey'=>1,
'checkval'=>0,
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
'namekey'=>'734ctyid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>7031,
'name'=>'lgid',
'pkey'=>1,
'checkval'=>0,
'type'=>1,
'attributes'=>1,
'mandatory'=>1,
'default'=>'',
'ordering'=>2,
'level'=>0,
'rolid'=>0,
'extra'=>0,
'size'=>4.0,
'export'=>1,
'namekey'=>'734lgid',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' ),
array(
'dbcid'=>7032,
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
'namekey'=>'ordering734',
'core'=>1,
'columntype'=>0,
'noaudit'=>0,
'readable'=>'',
'fieldtype'=>'' )
);

var $foreignsA=array(
array(
'dbtid'=>734,
'ref_dbtid'=>200,
'name'=>'ctyid',
'name2'=>'ctyid',
'namekey'=>'FK_country.language_ctyid',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#countries#country_node' ),
array(
'dbtid'=>734,
'ref_dbtid'=>199,
'name'=>'lgid',
'name2'=>'lgid',
'namekey'=>'FK_country.language_lgid',
'onupdate'=>1,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#library#language_node' )
);

var $contraintsA=array(
array(
'ctid'=>65663,
'type'=>3,
'namekey'=>'PK_country_language' )
);
}