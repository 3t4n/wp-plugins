<?php defined('JOOBI_SECURE') or die('J....');
class Data_security_security_activity_report_view extends WDataView{
var $yid=501659;
var $wizard=1;
var $wid='#security.node';
var $type=2;
var $params='report=1
axisstyle=combined
advancedchart=1
graphtype=Column';
var $namekey='security_activity_report';
var $menu=1;
var $level=50;
var $dropdown=3;
var $sid='#security.activity';
var $form=1;
var $icon='report';
var $rolid='#admin';
var $alias='Activity Report';
var $faicon='fa-pie-chart';
var $name='1382379426ZSE';
var $description='1470801676TGQJ';
var $wname='1382462210SRPY';
var $wdescription='1382462210SRPZ';
var $seotitle='';
var $seodescription='';
var $seokeywords='';
var $listingsA=array(
array(
'type'=>'output.text',
'sid'=>'#security.activity',
'search'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'dsict=19
chartaxis=1d',
'ordering'=>1,
'map'=>'created',
'lid'=>16011,
'level'=>25,
'hidden'=>0,
'core'=>1,
'did'=>0,
'ref_wid'=>0,
'rolid'=>'#admin',
'namekey'=>'security_activity_report_created',
'fdid'=>0,
'parentdft'=>0,
'advsearch'=>0,
'advordering'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1242282413PMNG',
'description'=>'1382379425HFVE',
'textlink'=>'' ),
array(
'type'=>'output.text',
'sid'=>'#security.activity',
'search'=>0,
'publish'=>0,
'parent'=>0,
'params'=>'dsict=2
chartaxis=2d
align=center',
'ordering'=>2,
'map'=>'actid',
'lid'=>16013,
'level'=>0,
'hidden'=>0,
'core'=>1,
'did'=>0,
'ref_wid'=>0,
'rolid'=>'#allusers',
'namekey'=>'security_activity_report_actid',
'fdid'=>0,
'parentdft'=>0,
'advsearch'=>0,
'advordering'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1382669590HPPQ',
'description'=>'1382669590HPQC',
'textlink'=>'' ),
array(
'type'=>'output.text',
'sid'=>'#security.activity',
'search'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'dsict=5
chartaxis=2d
align=center',
'ordering'=>3,
'map'=>'newuser',
'lid'=>16029,
'level'=>0,
'hidden'=>0,
'core'=>1,
'did'=>0,
'ref_wid'=>0,
'rolid'=>'#allusers',
'namekey'=>'security_activity_report_actid_copy1422',
'fdid'=>0,
'parentdft'=>0,
'advsearch'=>0,
'advordering'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1382669590HPPW',
'description'=>'',
'textlink'=>'' ),
array(
'type'=>'output.text',
'sid'=>'#security.activity',
'search'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'dsict=5
chartaxis=2d
align=center',
'ordering'=>5,
'map'=>'returning',
'lid'=>16012,
'level'=>0,
'hidden'=>0,
'core'=>1,
'did'=>0,
'ref_wid'=>0,
'rolid'=>'#allusers',
'namekey'=>'security_activity_report_returningcount',
'fdid'=>0,
'parentdft'=>0,
'advsearch'=>0,
'advordering'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1382669590HPPP',
'description'=>'1382669590HPQB',
'textlink'=>'' ),
array(
'type'=>'output.text',
'sid'=>'#security.activitypages',
'search'=>0,
'publish'=>0,
'parent'=>0,
'params'=>'dsict=2
chartaxis=2d',
'ordering'=>6,
'map'=>'actpgid',
'lid'=>16028,
'level'=>0,
'hidden'=>0,
'core'=>1,
'did'=>0,
'ref_wid'=>0,
'rolid'=>'#allusers',
'namekey'=>'security_activity_report_activitypages_actpgid',
'fdid'=>0,
'parentdft'=>0,
'advsearch'=>0,
'advordering'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1382669590HPPV',
'description'=>'1382669590HPQE',
'textlink'=>'' )
);

var $menusA=array(
array(
'type'=>101,
'publish'=>1,
'parent'=>0,
'params'=>'',
'ordering'=>255,
'level'=>0,
'icon'=>'wizard',
'action'=>'',
'mid'=>14283,
'private'=>0,
'position'=>0,
'core'=>1,
'rolid'=>'#allusers',
'namekey'=>'48a1odz72m',
'faicon'=>'',
'color'=>'',
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1206732391QBUR',
'description'=>'' )
);

var $picklistA=array(
array(
'did'=>'#security#security_space_picklist',
'ordering'=>1 ),
array(
'did'=>'#security#security_country_pickliost',
'ordering'=>'0' ),
array(
'did'=>'#security#security_blockedvisitor_picklist',
'ordering'=>2 )
);
}