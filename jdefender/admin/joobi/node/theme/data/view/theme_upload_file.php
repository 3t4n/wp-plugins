<?php defined('JOOBI_SECURE') or die('J....');
class Data_theme_theme_upload_file_view extends WDataView{
var $yid=501238;
var $wid='#theme.node';
var $type=51;
var $params='autosave=1
subtitle=1';
var $namekey='theme_upload_file';
var $menu=13;
var $form=1;
var $icon='about';
var $rolid='#sadmin';
var $alias='Upload Theme File';
var $name='1207155379JNIN';
var $description='';
var $wname='';
var $wdescription='';
var $seotitle='';
var $seodescription='';
var $seokeywords='';
var $formsA=array(
array(
'type'=>'output.file',
'sid'=>0,
'required'=>1,
'readonly'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'',
'ordering'=>2,
'map'=>'x[file]',
'level'=>0,
'initial'=>'',
'hidden'=>0,
'fid'=>2457804,
'core'=>1,
'did'=>0,
'private'=>0,
'area'=>'',
'ref_yid'=>0,
'frame'=>0,
'rolid'=>'#allusers',
'namekey'=>'upload_theme_file_file',
'fdid'=>0,
'parentdft'=>0,
'checktype'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1307005987LSGY',
'description'=>'' ),
array(
'type'=>'output.select',
'sid'=>0,
'required'=>0,
'readonly'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'',
'ordering'=>3,
'map'=>'x[filetype]',
'level'=>0,
'initial'=>'',
'hidden'=>0,
'fid'=>2457805,
'core'=>1,
'did'=>'#theme#theme_file_type',
'private'=>0,
'area'=>'',
'ref_yid'=>0,
'frame'=>0,
'rolid'=>'#allusers',
'namekey'=>'upload_theme_file_filetype',
'fdid'=>0,
'parentdft'=>0,
'checktype'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1306927259HYXV',
'description'=>'1307005988CSSP' )
);

var $menusA=array(
array(
'type'=>4,
'publish'=>1,
'parent'=>0,
'params'=>'popclose=1
refresh=1
formvalidation=1',
'ordering'=>1,
'level'=>0,
'icon'=>'save',
'action'=>'processuploadthemefile(eid=eid)(type=type)',
'mid'=>7992,
'private'=>0,
'position'=>0,
'core'=>1,
'rolid'=>'#allusers',
'namekey'=>'upload_theme_file_done',
'faicon'=>'',
'color'=>'',
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1242282449PIPC',
'description'=>'' )
);
}