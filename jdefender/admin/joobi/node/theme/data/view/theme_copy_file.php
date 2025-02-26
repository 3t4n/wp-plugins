<?php defined('JOOBI_SECURE') or die('J....');
class Data_theme_theme_copy_file_view extends WDataView{
var $yid=501235;
var $wid='#theme.node';
var $type=51;
var $params='autosave=1
subtitle=1';
var $namekey='theme_copy_file';
var $menu=13;
var $form=1;
var $icon='about';
var $rolid='#sadmin';
var $alias='Copy Theme File';
var $name='1206732372QTKK';
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
'required'=>1,
'readonly'=>0,
'publish'=>1,
'parent'=>0,
'params'=>'cncontain=,&*^%$#@!?()-
ws=1',
'ordering'=>1,
'map'=>'x[filenamecopy]',
'level'=>0,
'initial'=>'',
'hidden'=>0,
'fid'=>2457801,
'core'=>1,
'did'=>0,
'private'=>0,
'area'=>'',
'ref_yid'=>0,
'frame'=>0,
'rolid'=>'#allusers',
'namekey'=>'copy_theme_file_filenamecopy_1',
'fdid'=>0,
'parentdft'=>0,
'checktype'=>0,
'xsvisible'=>0,
'xshidden'=>0,
'devicevisible'=>'',
'devicehidden'=>'',
'name'=>'1307005987LSGX',
'description'=>'1307005988CSSO' )
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
'action'=>'processcopythemefile(eid=eid)(type=type)(filetype=filetype)(filename=filename)',
'mid'=>7975,
'private'=>0,
'position'=>0,
'core'=>1,
'rolid'=>'#allusers',
'namekey'=>'copy_theme_file_done',
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