<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Editor_Quill_addon extends Editor_Get_class {
	private static $_ctEditor = 0;
	var $editorName = 'media';
	public function load() {
		static $onlyOnce=true;
		if ( $onlyOnce ) {
			WPage::addCSSFile( 'main/quill/quill.snow.css', 'inc', 'https://cdn.quilljs.com/1.2.4/quill.snow.css' );
			WPage::addJSFile( 'main/quill/quill.js', 'inc', 'https://cdn.quilljs.com/1.2.4/quill.js' );
			$onlyOnce = false;
		}
		self::$_ctEditor++;
		$jsOpt = "";
		$js = "";
		if ( empty($this->height) ) $this->height = '150px';
		if ( empty( $this->editorName ) ) $this->editorName = '';
		switch( $this->editorName ) {
			case 'advanced':
				$jsOpt .= "var tlbrOpt" . self::$_ctEditor . "=[['bold','italic','underline','strike'],['blockquote']";
				$jsOpt .= ",[{'size':['small',false,'large','huge']}],[{'header':[1,2,3,4,5,6,false]}]";
				$jsOpt .= ",[{'list':'ordered'},{'list':'bullet'}],[{'indent':'-1'},{'indent':'+1'}]];";
				break;
			case 'media':
				$jsOpt .= "var tlbrOpt" . self::$_ctEditor . "=[['bold','italic','underline','strike'],['link','image'],[{'align':[]}]";
				$jsOpt .= ",[{'list':'ordered'},{'list':'bullet'}],[{'script':'sub'},{'script':'super'}],[{'indent':'-1'},{'indent':'+1'}]";	
				$jsOpt .= ",[{'size':['small',false,'large','huge']}],[{'header':[1,2,3,4,5,6,false]}]";
				$jsOpt .= ",[{'color':[]},{'background':[]}]";	
				$jsOpt .= "];";
				break;
			case 'full':
				$jsOpt .= "var tlbrOpt" . self::$_ctEditor . "=[['bold','italic','underline','strike'],['blockquote','code-block']";
				$jsOpt .= ",['link','image'],[{'align':[]}]";
				$jsOpt .= ",[{'list':'ordered'},{'list':'bullet'}],[{'script':'sub'},{'script':'super'}],[{'indent':'-1'},{'indent':'+1'}],[{'direction':'rtl'}]";	
				$jsOpt .= ",[{'size':['small',false,'large','huge']}],[{'header':[1,2,3,4,5,6,false]}]";
				$jsOpt .= ",[{'color':[]},{'background':[]}]";	
				$jsOpt .= ",['clean']";
				$jsOpt .= "];";
				break;
			case 'basic':
			default:
				$jsOpt .= "var tlbrOpt" . self::$_ctEditor . "=[['bold','italic','underline'],[{'list':'ordered'},{'list':'bullet'}],[{'indent':'-1'},{'indent':'+1'}]];";
				break;
		}
		$js .= "var qll" . self::$_ctEditor . "=new Quill('#Box" . $this->id . "'";
		if ( !empty($jsOpt) ) {
			WPage::addJSScript( $jsOpt );
			$js .= ",{modules:{toolbar:tlbrOpt" . self::$_ctEditor . "},theme:'snow'});";
		} else {
			$js .= ",{theme:'snow'});";
		}
		$js .= "jCore.mpA['" . $this->id . "']='" . $this->name . "';";
		WPage::addJSScript( $js );
		return;
	}
	public function display() {
		$content = parent::display();
		$extra = parent::extra();
		$html = '';
		$html .= '<input name="trucs[' . $this->element->sid . '][' . $this->element->map . ']" type="hidden">';
		$html .= '<div id="Box' . $this->id . '"';
		$html .= ' style="min-height:' . $this->height . '"';
		$html .= '>';
		$html .= '</div>';
		$this->content = str_replace( "\n", '', $this->content );
		$js = "";
		$js .= "qll" . self::$_ctEditor . ".clipboard.dangerouslyPasteHTML(0,'" . addslashes( $this->content ) . "');";
		WPage::addJSScript( $js );
		return $html;
	}
	public function getEditorName() {
		$nicEdit['quill.basic'] = 'Quill - Basic';
		$nicEdit['quill.advanced'] = 'Quill - Advanced';
		$nicEdit['quill.media'] = 'Quill - Links and Media';
		$nicEdit['quill.full'] = 'Quill - Complete';
		return $nicEdit;
	}
	function getContent($fieldName) {
		$html = WGlobals::get( $fieldName, '', 'POST' );	
		return $html;
	}
}