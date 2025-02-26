<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Editor_Ckeditor_addon extends Editor_Get_class {
	function load() {
						WPage::addJSFile( 'main/ckeditor/ckeditor.js', 'inc', '', 'ForceFalse' );
	}
	function display() {
		static $onlyOnce = true;
		$this->rows = 0;
		$this->cols = 0;
		if ( empty($this->width) ) $this->width = '100%';
		if ( empty($this->height) ) $this->height = '100%';
				$content = parent::display();
				$extra = '<script language="javascript" type="text/javascript">
function insertWidget(ny){
var editorName="' . $this->editorName . '";
CKEDITOR.instances["' . $this->id . '"].insertText(ny);
}
</script>';
		$toolbar = $this->editorName;
				$name = parent::getName();
		$id = parent::getId();
		WText::load( 'editor.node' );
		$placeholderStr = WText::t('1460990092NBVH');
		$lang = WLanguage::get( WUser::get( 'lgid' ), 'code' );
		if ( $toolbar == 'inline' ) $toolbar = 'ckfull';
		if ( $toolbar == 'inline' ) {
			$script .= 'CKEDITOR.inline("' . $id . '",{toolbar:"' . $toolbar . '"';				if ( empty($this->content) ) $script .= ',placeholder:"' . $placeholderStr . '"';							if ( 'en' != $lang ) $script .= ',language:"' . $lang . '"';				$script .= '});';		
			WPage::addJS( $script );
			$html = ' <div id="' . $id . '" class="ckEditor"';
			if ( !empty($this->width) || !empty($this->height) ) {
				$html .= ' style="';
				if ( !empty($this->width) ) $html .= 'width:' . $this->width .';';
				if ( !empty($this->height) ) $html .= 'height:' . $this->height;
				$html .= '"';
			}			$html .= '>' . $this->content . '</div> ';
			return  $html . $extra;
		} else {
			if ( $onlyOnce ) {
				$ckString = 'CKEDITOR.disableAutoInline=true;';
				WPage::addJS( $ckString, 'text/javascript', true );
				$onlyOnce = false;
			}			
			$html = ' <div class="ckEditor"';
			if ( !empty($this->width) || !empty($this->height) ) {
				$html .= ' style="';
				if ( !empty($this->width) ) $html .= 'width:' . $this->width .';';
				if ( !empty($this->height) ) $html .= 'height:' . $this->height;
				$html .= '"';
			}			$html .= '>' . $content . '</div> ';
			$script = '<script language="javascript" type="text/javascript">';
			$script .= 'CKEDITOR.replace("' . $name . '",{toolbar:"' . $toolbar . '"';				if ( empty($this->content) ) $script .= ',placeholder:"' . $placeholderStr . '"';				if ( 'en' != $lang ) $script .= ',language:"' . $lang . '"';
			if ( !empty($this->height) ) $script .= ',height:"' . $this->height . '"';
						$script .= '});';
			$script .= '
var onLoadValue = document.getElementById( \'' . $id . '\' ).value;
for (var i in CKEDITOR.instances) {
	CKEDITOR.instances[i].on(\'change\', function() {
		CKEDITOR.instances.' . $id . '.updateElement();
	});
}
</script>';																
			return  $html . $script . $extra;
		}
	}
	function getEditorName() {
		$ckEditor['ckeditor.ckbasic'] = 'CKEditor - Basic';
		$ckEditor['ckeditor.ckstandard'] = 'CKEditor - Standard';
		$ckEditor['ckeditor.ckfull'] = 'CKEditor - Full';
		$ckEditor['ckeditor.inline'] = 'CKEditor - Inline';
		return $ckEditor;
	}
}