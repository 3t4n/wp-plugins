<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class WForm_Corewidget extends WForms_default {
	private static $_i = 0;
	function create() {
		return $this->show();
	}
	function show() {
				$this->element->notitle = 1;
		$this->element->spantit = 1;
		if ( empty( $this->element->widgetid ) ) return false;
		$outputwidgetsC = WClass::get( 'output.widgets' );
		$this->content = $outputwidgetsC->renderWidget( $this->element->widgetid, $this->nodeID, $this->formName, $this->yid, $this->element->namekey, $this->element->fid, true );
		if ( empty($this->content) ) return false;
		$yidReturn = WView::generateID( 'formWidget', $this->element->fid );
		$HTML = '<div id="' . $yidReturn . '"';
		if ( !empty($this->element->classes) ) {
			$this->element->classes = str_replace( 'form-control' , '', $this->element->classes );
			$this->element->classes = trim($this->element->classes);
			if ( !empty($this->element->classes) ) $HTML .= ' class="' . $this->element->classes . '"';
		}		if ( !empty($this->element->style) ) $HTML .= ' style="' . $this->element->style . '"';
		$HTML .= '>' . $this->content . '</div>';
		$this->content = $HTML;
		return true;
	}
}