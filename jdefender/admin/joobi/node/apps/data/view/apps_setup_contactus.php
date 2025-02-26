<?php defined('JOOBI_SECURE') or die('J....');
class Data_apps_apps_setup_contactus_view extends WDataView{
var $yid=1023;
var $wizard=1;
var $wid='#apps.node';
var $type=51;
var $params='autosave=1
subtitle=1';
var $namekey='apps_setup_contactus';
var $menu=13;
var $form=1;
var $icon='help';
var $rolid='#allusers';
var $alias='support';
var $name='1213183509OYOB';
var $description='1470784870OXXU';
var $wname='1210244238DTYK';
var $wdescription='1227579895DREU';
var $seotitle='';
var $seodescription='';
var $seokeywords='';
var $formsA=array(
array(
'type'=>'output.select',
'sid'=>0,
'required'=>1,
'readonly'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'',
'ordering'=>2,
'map'=>'x[reason]',
'level'=>0,
'initial'=>'',
'hidden'=>0,
'fid'=>458371,
'core'=>1,
'did'=>'#apps#apps_reason',
'private'=>0,
'area'=>'',
'ref_yid'=>0,
'frame'=>0,
'rolid'=>'#allusers',
'namekey'=>'setup_contactus_reason',
'fdid'=>0,
'parentdft'=>0,
'checktype'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1206732400OXCG',
'description'=>'1213107632HHOT' )
);

var $menusA=array(
array(
'type'=>1,
'publish'=>1,
'parent'=>0,
'params'=>'',
'ordering'=>1,
'level'=>0,
'icon'=>'send',
'action'=>'send',
'mid'=>1471,
'private'=>0,
'position'=>0,
'core'=>1,
'rolid'=>'#allusers',
'namekey'=>'setup_contactus_send',
'faicon'=>'fa-envelope',
'color'=>'',
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1206732400OWXC',
'description'=>'' ),
array(
'type'=>5,
'publish'=>1,
'parent'=>0,
'params'=>'',
'ordering'=>2,
'level'=>0,
'icon'=>'cancel',
'action'=>'cancel',
'mid'=>1472,
'private'=>0,
'position'=>0,
'core'=>1,
'rolid'=>'#allusers',
'namekey'=>'setup_contactus_cancel',
'faicon'=>'',
'color'=>'',
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1206732393CXVV',
'description'=>'' )
);
}