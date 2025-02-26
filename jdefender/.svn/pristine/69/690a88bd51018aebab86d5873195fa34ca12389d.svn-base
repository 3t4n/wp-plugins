<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_CoreDesign_module extends WModule {
	function create() {
				if ( !WUser::isRegistered() ) return '';
		$this->content = '<div class="btn-group-vertical">';
		if ( WRole::hasRole( 'manager' ) ) {
						$directEdit = WPref::load( 'PMAIN_NODE_DIRECT_EDIT_MODULES' );
			$link = WPage::link( 'controller=main-module&task=directmodule&val=' . $directEdit );
			$text = WText::t('1381500293NYJE');
			$this->content .= $this->_createButton( $link, $text, 'success', 'fa-edit' );
		}
				$directEdit = ( 'translate' == WPref::load( 'PMAIN_NODE_DIRECT_MODIFY' ) ? 1 : 0 );
		$link = WPage::link( 'controller=main-module&task=directtranslate&val=' . $directEdit );
		$text = WText::t('1358515337PTMS');
		$this->content .= $this->_createButton( $link, $text, 'warning', 'fa-language' );
				$directEdit = ( 'edit' == WPref::load( 'PMAIN_NODE_DIRECT_MODIFY' ) ? 1 : 0 );
		$link = WPage::link( 'controller=main-module&task=directedit&val=' . $directEdit );
		$text = WText::t('1206732400OWXQ');
		$this->content .= $this->_createButton( $link, $text, 'danger', 'fa-edit' );
				$dbgqry = WPref::load( 'PLIBRARY_NODE_DBGERR' );			$link = WPage::link( 'controller=main-module&task=debugsite&val=' . $dbgqry );
		$text = WText::t('1206732400OWXN');
		$this->content .= $this->_createButton( $link, $text, 'warning', 'fa-code' );
				$dbgqry = WPref::load( 'PLIBRARY_NODE_DBGQRY' );
		$link = WPage::link( 'controller=main-module&task=query&val=' . $dbgqry );
		$text = WText::t('1491833003IVCO');
		$this->content .= $this->_createButton( $link, $text, 'info', 'fa-eye' );
				$link = WPage::link( 'controller=main-module&task=cache' );
		$text = WText::t('1473439229SQKC');
		$this->content .= $this->_createButton( $link, $text, 'primary', 'fa-trash-o' );
		$this->content .= '</div>';
		return $this->content;
	}
	private function _createButton($link,$text,$color='primary',$icon='') {
		$objButtonO = WPage::newBluePrint( 'button' );
		$objButtonO->text = $text;
		$objButtonO->link = $link;
		$objButtonO->type = 'infoLink';
		$objButtonO->color = $color;
		$objButtonO->icon = $icon;
		$objButtonO->wrapperDiv = 'designButton';
		$html = WPage::renderBluePrint( 'button', $objButtonO );
		return $html;
	}
}