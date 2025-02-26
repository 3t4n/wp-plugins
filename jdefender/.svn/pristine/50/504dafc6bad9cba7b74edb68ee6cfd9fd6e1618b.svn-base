<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Output_Pickliststyle_picklist extends WPicklist {
function create(){
$selectype=WGlobals::get('Main_Output_params_form_selectype', 0, 'global');
if($selectype==5){
$this->addElement( 21, 'Multiple Select box');
$this->addElement( 23, 'Checkbox List');
$this->addElement( 25, 'CheckBox in Multiple Select box');
}else{
$this->addElement( 21, 'Dropdown');
$this->addElement( 23, 'Radio List');
}
return true;
}}