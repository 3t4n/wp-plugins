<?php defined('JOOBI_SECURE') or die('J....');
class Data_users_users_reset_password_view extends WDataView{
var $yid=502076;
var $wid='#users.node';
var $type=51;
var $namekey='users_reset_password';
var $menu=13;
var $frontend=1;
var $form=1;
var $rolid='#allusers';
var $alias='Reset Your Password';
var $useredit=1;
var $name='1410373235PUIM';
var $description='';
var $wname='';
var $wdescription='';
var $seotitle='';
var $seodescription='';
var $seokeywords='';
var $formsA=array(
array(
'type'=>'output.text',
'sid'=>0,
'required'=>0,
'readonly'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'width=50',
'ordering'=>1,
'map'=>'x[email]',
'level'=>0,
'initial'=>'',
'hidden'=>0,
'fid'=>2468718,
'core'=>1,
'did'=>0,
'private'=>0,
'area'=>'',
'ref_yid'=>0,
'frame'=>0,
'rolid'=>'#allusers',
'namekey'=>'users_reset_password_email',
'fdid'=>0,
'parentdft'=>0,
'checktype'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1410384293KGZU',
'description'=>'1410384294EKCN' )
);

var $menusA=array(
array(
'type'=>1,
'publish'=>1,
'parent'=>0,
'params'=>'',
'ordering'=>1,
'level'=>0,
'icon'=>'default',
'action'=>'resetpwd',
'mid'=>12966,
'private'=>0,
'position'=>0,
'core'=>1,
'rolid'=>'#allusers',
'namekey'=>'users_reset_password_resetpwd',
'faicon'=>'fa-lock',
'color'=>'warning',
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1206732412DAEJ',
'description'=>'' )
);
}