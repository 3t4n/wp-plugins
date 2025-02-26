<?php defined('JOOBI_SECURE') or die('J....');
class Data_space_space_members_table extends WDataTable{
public $name='space_members';
public $namekey='space.members';
public $dbtid=680;
public $rolid='#allusers';
public $type=30;
public $pkey='wsid,uid';
public $suffix='members';
public $group='space';
public $domain=51;
public $export=2;
public $engine=7;
public $node='space';
public $foreignsA=array(
array(
'dbtid'=>680,
'ref_dbtid'=>677,
'name'=>'wsid',
'name2'=>'wsid',
'namekey'=>'FK_space_members_wsid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>1,
'ref_table'=>'#space#space_node' ),
array(
'dbtid'=>680,
'ref_dbtid'=>232,
'name'=>'uid',
'name2'=>'uid',
'namekey'=>'FK_space_members_uid',
'onupdate'=>3,
'ondelete'=>3,
'ordering'=>2,
'ref_table'=>'#users#members_node' )
);
}