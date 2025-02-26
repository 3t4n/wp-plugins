<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement('main.form.submit');
class Users_CoreLoginbutton_form extends WForm_submit {
public function create(){
$status=parent::create();
$objButtonO=WPage::newBluePrint('button');
$objButtonO->text=$this->content;
$objButtonO->type='standard';
$objButtonO->float='right';
$objButtonO->icon='next';
$objButtonO->color='success';
$this->content=WPage::renderBluePrint('button',$objButtonO );
return $status;
}
}