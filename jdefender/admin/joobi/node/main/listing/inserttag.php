<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_CoreInserttag_listing extends WListings_default{
	function create() {
				if ( JOOBI_FRAMEWORK_TYPE == 'joomla' ) {
			$this->content = '<a onclick="if (window.parent) window.parent.insertWidget(\'{widget:alias|' . $this->value . '}\');" class="pointer"><span style="cursor:pointer;" class="label label-primary">' . WText::t('1379039270QKLD') . '</span></a>';
		} else {
									$widgetid = $this->getValue( 'widgetid' );
			$typeNamekey = $this->getValue( 'namekey', 'main.widgettype' );
			if ( 'wordpress.menus' == $typeNamekey ) {
				$tagName = 'joobipage';
				$tag = $this->getValue( 'tag' );
				$val = $this->getValue( 'val' );
				if ( !empty($val) ) {
					$tag = str_replace( '_1', '_' . $val, $tag );
				}			} else {
				$tagName = 'joobiwidget';
				$tag = $this->value;
			}
						$this->content = '<a onclick="if (window.parent) window.parent.insertWidget(\''. $tagName .'\',\''. $tag .'\');" class="pointer"><span style="cursor:pointer;" class="label label-primary">' . WText::t('1379039270QKLD') . '</span></a>';
		}
		return true;
	}
}