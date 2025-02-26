<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
WView::includeElement( 'form.select' );
class Main_CoreWidgetid_form extends WForm_select {
	function create() {
		$status = parent::create();
		$this->content = '<div style="float:left;">' . $this->content . '</div>';
		$this->content .= '<div style="float:left; padding-left:10px">';
		if ( $this->getValue( 'widgetid' ) ) {
			$link = WPage::link( 'controller=main-widgets&task=edit&eid=' . $this->value );
		} else {
			$link = WPage::link( 'controller=main-widgets&task=add' );
		}
		$objButtonO = WPage::newBluePrint( 'button' );
		$objButtonO->text = WText::t('1357059105KDVU');
		$objButtonO->type = 'infoLink';
		$objButtonO->link = $link;
		$objButtonO->color = 'success';
		$objButtonO->popUpIs = true;
		$objButtonO->popUpHeight = '90%';
		$objButtonO->popUpWidth = '90%';
		$objButtonO->icon = 'fa-edit';
		$this->content .= WPage::renderBluePrint( 'button', $objButtonO );
		$this->content .= '</div>';
		return $status;
	}
}