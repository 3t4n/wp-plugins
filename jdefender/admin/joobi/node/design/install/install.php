<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_Node_install extends WInstall {
	public function install(&$object) {
		if ( !empty( $this->newInstall ) || (property_exists($object, 'newInstall') && $object->newInstall) ) {
			WText::load( 'design.node' );
			$installWidgetsC = WClass::get( 'install.widgets' );
			$installWidgetsC->installWidgetType(
				'design.button'
				, 'Button'
				, WText::t('1219769905FKPU')
			, WText::t('1400708734QLWH')
			, 19				);
			$installWidgetsC->installWidgetType(
				'design.icon'
				, 'Bootstrap Font Awesome Icon'
				, 'Font Awesome Icon'
			, 'Create a font awesome icon'
			, 19				);
			$installWidgetsC = WClass::get( 'install.widgets' );
			$installWidgetsC->installTable( 'design.fields', $this->_installValuesA() );
			$languagesA = WApplication::availLanguages( 'lgid', 'all' );
			foreach( $languagesA as $lgid ) {
								$installWidgetsC->installTable( 'design.fieldstrans', $this->_installValuesTransA( $lgid ) );
			}				
		} else {
			$designModelM = WModel::get( 'design.model' );
			$designModelM->makeLJ( 'design.modelfields', 'sid', 'sid' );
						$designModelM->whereE( 'fields', 1 );
			$designModelM->select( 'fdid', 1, 'nb', 'count' );
			$designModelM->select( 'sid' );
			$designModelM->select( 'totalcustom' );
			$designModelM->groupBy( 'sid' );
			$modelA = $designModelM->load( 'ol' );
			foreach( $modelA as $field ) {
				if ( empty($field->nb) || $field->nb == $field->totalcustom ) continue;
				$designModelM->whereE( 'sid', $field->sid );
				$designModelM->setVal( 'totalcustom', $field->nb );
				$designModelM->update();
			}			
		}
		return true;
	}
	private function _installValuesA() {
		return array(
				array('fieldid' => '1','namekey' => 'output.publish','alias' => 'Publish','core' => '1','publish' => '1','params' => 'columntype=1
columnmamdatory=1','listing' => 'output.publish','form' => 'output.publish','real' => '0','ordering' => '1','category' => '70','visible' => '1','translate' => '0'),
				array('fieldid' => '2','namekey' => 'output.yesno','alias' => 'Yes / No','core' => '1','publish' => '1','params' => 'columntype=1
columnattributes=1
columnmamdatory=1','listing' => 'output.yesno','form' => 'output.yesno','real' => '0','ordering' => '8','category' => '1','visible' => '1','translate' => '0'),
				array('fieldid' => '3','namekey' => 'output.textarea','alias' => 'Textarea','core' => '1','publish' => '1','params' => 'columntype=16
columnmamdatory=1','listing' => 'main.textarea','form' => 'output.textarea','real' => '0','ordering' => '3','category' => '1','visible' => '1','translate' => '0'),
				array('fieldid' => '4','namekey' => 'output.text','alias' => 'text','core' => '1','publish' => '1','params' => 'columntype=14
columnmamdatory=1
columnsize=255
trunchar=...','listing' => 'output.text','form' => 'output.text','real' => '0','ordering' => '1','category' => '1','visible' => '1','translate' => '0'),
				array('fieldid' => '5','namekey' => 'output.datetime','alias' => 'Date and Time','core' => '1','publish' => '1','params' => 'columntype=4
columnattributes=1
columnmamdatory=1
formatdate=8
dateformat=2','listing' => 'output.datetime','form' => 'output.datetime','real' => '0','ordering' => '7','category' => '1','visible' => '1','translate' => '0'),
				array('fieldid' => '6','namekey' => 'output.dateonly','alias' => 'Date','core' => '1','publish' => '1','params' => 'columntype=4
columnattributes=1
columnmamdatory=1
formatdate=7
dateformat=1','listing' => 'output.dateonly','form' => 'output.dateonly','real' => '0','ordering' => '6','category' => '1','visible' => '1','translate' => '0'),
				array('fieldid' => '7','namekey' => 'output.media','alias' => 'File','core' => '1','publish' => '1','params' => 'columntype=4
columnattributes=1
columnmamdatory=1','listing' => 'output.media','form' => 'output.media','real' => '0','ordering' => '1','category' => '50','visible' => '1','translate' => '0'),
				array('fieldid' => '8','namekey' => 'output.email','alias' => 'Email','core' => '1','publish' => '1','params' => 'columntype=14
columnmamdatory=1
columnsize=150','listing' => 'output.email','form' => 'output.email','real' => '0','ordering' => '2','category' => '70','visible' => '1','translate' => '0'),
				array('fieldid' => '9','namekey' => 'output.numeric','alias' => 'Number','core' => '1','publish' => '1','params' => 'columntype=4
columnattributes=1
columnmamdatory=1','listing' => 'main.simple','form' => 'output.numeric','real' => '0','ordering' => '1','category' => '20','visible' => '1','translate' => '0'),
				array('fieldid' => '10','namekey' => 'main.percent','alias' => 'Percentage','core' => '1','publish' => '1','params' => 'columntype=1
columnattributes=1
columnmamdatory=1','listing' => 'main.percent','form' => 'main.percent','real' => '0','ordering' => '2','category' => '20','visible' => '1','translate' => '0'),
				array('fieldid' => '11','namekey' => 'output.password','alias' => 'Password','core' => '1','publish' => '1','params' => 'columntype=14
columnmamdatory=1
columnsize=100','listing' => 'main.password','form' => 'output.password','real' => '0','ordering' => '3','category' => '70','visible' => '1','translate' => '0'),
				array('fieldid' => '12','namekey' => 'main.yesnoreverse','alias' => 'Yes / No Reversed','core' => '1','publish' => '1','params' => 'columntype=1
columnattributes=1
columnmamdatory=1
columndefault=1','listing' => 'main.yesnoreverse','form' => 'main.yesnoreverse','real' => '0','ordering' => '4','category' => '70','visible' => '1','translate' => '0'),
				array('fieldid' => '13','namekey' => 'main.url','alias' => 'URL','core' => '1','publish' => '1','params' => 'columntype=14
columnmamdatory=1
columnsize=255
urllstclickable=1
urllisttext=Link
urllsttarget=_blank
width=60
urlclickable=1
urltarget=_blank
urldefault=http://','listing' => 'main.url','form' => 'main.url','real' => '0','ordering' => '9','category' => '1','visible' => '1','translate' => '0'),
				array('fieldid' => '14','namekey' => 'output.select','alias' => 'Pick-list','core' => '1','publish' => '1','params' => 'columntype=14
columnmamdatory=1
columnsize=254
selectype=3
selectstyle=7','listing' => 'output.selectone','form' => 'output.select','real' => '0','ordering' => '5','category' => '1','visible' => '1','translate' => '0'),
				array('fieldid' => '15','namekey' => 'main.trans','alias' => 'Translated Text','core' => '1','publish' => '1','params' => 'columntype=14
columnmamdatory=1
columnsize=255','listing' => 'output.text','form' => 'main.trans','real' => '0','ordering' => '2','category' => '1','visible' => '1','translate' => '1'),
				array('fieldid' => '16','namekey' => 'main.transarea','alias' => 'Translated textarea','core' => '1','publish' => '1','params' => 'columntype=16
columnmamdatory=1','listing' => 'main.textarea','form' => 'main.transarea','real' => '0','ordering' => '4','category' => '1','visible' => '1','translate' => '1'),
				array('fieldid' => '17','namekey' => 'main.phpcustom','alias' => 'Custom PHP','core' => '1','publish' => '1','params' => 'columntype=14
columnmamdatory=1
columnsize=254','listing' => 'main.phpcustom','form' => 'main.phpcustom','real' => '0','ordering' => '9','category' => '90','visible' => '1','translate' => '0'),
				array('fieldid' => '18','namekey' => 'output.image','alias' => 'Image','core' => '1','publish' => '1','params' => 'columntype=4
columnattributes=1
columnmamdatory=1','listing' => 'output.image','form' => 'output.image','real' => '0','ordering' => '2','category' => '50','visible' => '1','translate' => '0'),
				array('fieldid' => '19','namekey' => 'main.money','alias' => 'Price','core' => '1','publish' => '1','params' => 'columntype=8
columnattributes=1
columnmamdatory=1
columnsize=15,4','listing' => 'main.money','form' => 'main.money','real' => '0','ordering' => '8','category' => '90','visible' => '1','translate' => '0'),
				array('fieldid' => '20','namekey' => 'main.phpcustom','alias' => 'Custom PHP','core' => '1','publish' => '1','params' => 'columntype=14
columnmamdatory=1
columnsize=254','listing' => 'main.phpcustom','form' => 'main.phpcustom','real' => '0','ordering' => '9','category' => '90','visible' => '1','translate' => '0')
		);
	}
	private function _installValuesTransA($lgid=1) {
		return array(
			array('fieldid' => '1','lgid' => $lgid,'name' => 'Publish','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '2','lgid' => $lgid,'name' => 'Yes / No','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '3','lgid' => $lgid,'name' => 'Textarea','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '4','lgid' => $lgid,'name' => 'Text','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '5','lgid' => $lgid,'name' => 'Date and Time','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '6','lgid' => $lgid,'name' => 'Date','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '7','lgid' => $lgid,'name' => 'File','description' => 'Upload a file.','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '8','lgid' => $lgid,'name' => 'Email','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '9','lgid' => $lgid,'name' => 'Number','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '10','lgid' => $lgid,'name' => 'Percentage','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '11','lgid' => $lgid,'name' => 'Password','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '12','lgid' => $lgid,'name' => 'Yes / No Reversed','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '13','lgid' => $lgid,'name' => 'Link','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '14','lgid' => $lgid,'name' => 'Pick-list','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '15','lgid' => $lgid,'name' => 'Translated Text','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '16','lgid' => $lgid,'name' => 'Translated textarea','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '17','lgid' => $lgid,'name' => 'Custom PHP','description' => 'Field enabling to write some PHP code.','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '18','lgid' => $lgid,'name' => 'Image','description' => '','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '19','lgid' => $lgid,'name' => 'Price','description' => 'Use to define and show a price.','auto' => '1','fromlgid' => '1'),
			array('fieldid' => '20','lgid' => $lgid,'name' => 'Custom PHP','description' => 'Field enabling to write some PHP code.','auto' => '1','fromlgid' => '1')				
		);
	}	
}