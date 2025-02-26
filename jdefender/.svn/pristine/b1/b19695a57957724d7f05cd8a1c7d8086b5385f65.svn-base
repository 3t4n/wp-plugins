<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class WListing_Coreinput extends WListings_default {
	function create() {
		static $mySids=array();
		static $firstButton = true;
		if ( $this->searchOn && !empty($this->mywordssearched) ) {
			$this->value = preg_replace( '#(' . str_replace( '#','\#', implode('|', $this->mywordssearched) ).')#i' , '<span class="search-highlight">$0</span>', $this->value );
		}		
		if ( ! isset($mySids[$this->element->sid]) ) {
			$temp=WModel::get($this->element->sid, 'data');
			$mySids[$this->element->sid] = $temp->pkey;
		}		
		$inputMap = $mySids[$this->element->sid] . '_' . $this->element->sid;
		$this->content = '<input class="form control" type="text" id="' . $this->name . $this->line.'" name="' . $this->name . '[' . $this->data->$inputMap . ']" value="'. $this->value . '" style="text-align:center" size="5" />';	
		return true;
	}
}
