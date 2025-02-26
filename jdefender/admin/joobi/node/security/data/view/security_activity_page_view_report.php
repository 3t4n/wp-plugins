<?php defined('JOOBI_SECURE') or die('J....');
class Data_security_security_activity_page_view_report_view extends WDataView{
var $yid=501661;
var $wizard=1;
var $wid='#security.node';
var $type=2;
var $params='report=1
axisstyle=compared
advancedchart=1
graphtype=Column';
var $namekey='security_activity_page_view_report';
var $menu=1;
var $level=50;
var $dropdown=3;
var $sid='#security.activitypages';
var $form=1;
var $icon='report';
var $rolid='#admin';
var $alias='Page Views Report';
var $faicon='fa-pie-chart';
var $name='1382669591GNWL';
var $description='1470801676TGQL';
var $wname='1382462210SRPY';
var $wdescription='1382462210SRPZ';
var $seotitle='';
var $seodescription='';
var $seokeywords='';
var $listingsA=array(
array(
'type'=>'output.text',
'sid'=>'#security.activitypages',
'search'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'dsict=19
chartaxis=1d',
'ordering'=>1,
'map'=>'created',
'lid'=>16019,
'level'=>50,
'hidden'=>0,
'core'=>1,
'did'=>0,
'ref_wid'=>0,
'rolid'=>'#admin',
'namekey'=>'security_activity_page_report_created',
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
'sid'=>'#security.activitypages',
'search'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'dsict=2
chartaxis=2d',
'ordering'=>2,
'map'=>'actpgid',
'lid'=>16017,
'level'=>50,
'hidden'=>0,
'core'=>1,
'did'=>0,
'ref_wid'=>0,
'rolid'=>'#admin',
'namekey'=>'security_activity_page_report_actpgid',
'fdid'=>0,
'parentdft'=>0,
'advsearch'=>0,
'advordering'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1382669590HPPS',
'description'=>'1382462209HHTP',
'textlink'=>'' ),
array(
'type'=>'output.text',
'sid'=>'#security.activity',
'search'=>0,
'publish'=>0,
'parent'=>0,
'params'=>'dsict=5
chartaxis=2d',
'ordering'=>3,
'map'=>'returningcount',
'lid'=>16018,
'level'=>0,
'hidden'=>0,
'core'=>1,
'did'=>0,
'ref_wid'=>0,
'rolid'=>'#allusers',
'namekey'=>'security_activity_report_returningcount_copy7577_copy4790',
'fdid'=>0,
'parentdft'=>0,
'advsearch'=>0,
'advordering'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1382379425HFVC',
'description'=>'1382379425HFVF',
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
'mid'=>14282,
'private'=>0,
'position'=>0,
'core'=>1,
'rolid'=>'#allusers',
'namekey'=>'48a1n7z72m',
'faicon'=>'',
'color'=>'',
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1206732391QBUR',
'description'=>'' )
);
}