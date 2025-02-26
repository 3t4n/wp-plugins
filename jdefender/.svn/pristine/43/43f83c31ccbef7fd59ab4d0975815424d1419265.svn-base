<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_popup_class extends WClasses {
	protected $popupContent = '';
	static protected $_currentID = 0;
	const default_ID = 'ppp_PnkB';
	protected $displayType = 'standard';
	protected $openEvent = 'visitevery';
	protected $delay = 0;
	protected $position = 'center';
	protected $animationIn = 'fadeIn';
	protected $animationOut = 'fadeOut';
	protected $btnName = '';
	protected $defaultCloseBtn = true;
	protected $duration = 500;
	protected $width = 400;
	protected $height = 0;
	protected $eventHandlers = array();
	protected $_id = null;
	protected $_execOnceID = 0;
	protected $showOnceType = 'page';
	function __construct() {
		parent::__construct();
		$this->_id = self::default_ID . ++self::$_currentID;
	}	
	public function commitPopup() {
		static $count=0;
		if ( 'mobile' == JOOBI_FRAMEWORK_TYPE ) return '';
				switch( $this->openEvent ) {
			case "visitfirst":
			case "pageclosefirst":									$myCookie = WGlobals::getCookie( $this->_id . '_showOnce', false );
				if ( $myCookie ) return '';
				WGlobals::setCookie( $this->_id . '_showOnce', true, time() + 60*60*24*365 );					break;
			case "visitevery":
			case "pagecloseevery":									$mySession = WGlobals::getSession( 'popupDisplay', $this->_id . '_showOnce', false );
				if ( $mySession ) return '';
				$mySession = WGlobals::setSession( 'popupDisplay', $this->_id . '_showOnce', true );
				break;
			case 'none':
			default:
				break;
		}			
				if ( empty( $this->popupContent ) ) {
			$this->adminE( 'There is no content for the popup!' );
			return '';
		}		
		if ( empty($this->displayType) || 'standard' == $this->displayType ) {
			return $this->popupContent;
		}		
		$delay = $this->delay;
		$count++;
		$popupOpenerID = 'ppp' . $count . 'PnkJ';
		$returnedHTML = '';
		switch( $this->openEvent ) {
			case "pageclose":
			case "pageclosefirst":				case "pagecloseevery":					$this->addLeaveHandler($delay);
				break;
			case "manual_click":
				$this->addClickHandler( "#" . $popupOpenerID, $delay );
				break;
			case "scroll":
				$this->addScrollHandler( $delay );
				break;
			case "visitfirst":
			case "visitevery":
			case "pageloads":				default:
				$this->addDelayHandler( $delay );
				break;
		}		
		WPage::addCSSFile( 'css/animate.css' );
		WPage::addCSSFile( 'css/jquery.modalbox.css' );
		WPage::addJSFile( 'js/jquery.modalbox.js' );
		WPage::addCSSScript( $this->getCSS() );
		$jsOnLoad = '';
		foreach( $this->eventHandlers as $event ) {
			$delay = $event['delay'];
			switch ( $event['type'] ) {
				case 'click':
					if ( empty($this->btnName) ) $this->btnName = WText::t('1463688236EAYE');
					$objButtonO = WPage::newBluePrint( 'button' );
					$objButtonO->id = $popupOpenerID;
					$objButtonO->type = 'button';
					$objButtonO->text = $this->btnName;
					$objButtonO->color = 'success';
					$returnedHTML = WPage::renderBluePrint( 'button', $objButtonO );
					$selector = $event['param'];
					$jsOnLoad .= "jQuery('$selector').click(
					function(){" . $this->js_addDelay( $delay, $this->js_openPopup(true) ) . "});";
					break;
				case 'leave':
					WPage::addJSFile( 'js/ouibounce.js' );
					$jsOnLoad .= $this->js_addDelay($delay, "ouibounce(false, {callback: function() {" . $this->js_openPopup() . "}, aggressive: true });"); 					break;
				case 'scroll':
					$jsOnScroll = "jQuery(window).scroll(function() {" .
							$this->js_addDelay($delay,
							$this->js_openPopup()
							)
							. "});";
							$jsOnLoad .= $this->js_addDelay( 1000, $jsOnScroll ); 							break;
				case 'delay':
					$jsOnLoad .= $this->js_addDelay( $delay, $this->js_openPopup() );
					break;
				default:
										break;
			}			
		}	
		$html = $this->generatePopupHTML();
		$js = "
jQuery(function() {
jQuery('body').prepend(`$html`);
$jsOnLoad
});";
		WPage::addJSScript( $js );
		$uid = $this->getID();
		$spacer = $this->getID() . "_spacer";
		if ($this->displayType === 'infobar' ) {
			$js = '';
			if ( $this->position == 'bottom' ) {
				$js = "jQuery('body').append(jQuery('<div id=\"$spacer\"/>').hide().width('100%').height(jQuery('#$uid > .inner').innerHeight()));
				jQuery('#$uid > .inner').css('margin-top', -1 * jQuery('#$uid > .inner').innerHeight());";
			} elseif ($this->position != 'left' && $this->position != 'right')  { 				$js = "jQuery('body').prepend(jQuery('<div id=\"$spacer\"/>').hide().width('100%').height(jQuery('#$uid > .inner').innerHeight()));";
			}	
			if ($this->position != 'left' && $this->position != 'right') {
				$js .= "
				jQuery('#$uid').on('modalBox:afterOpen', function(){
				jQuery('#$spacer').slideDown($this->duration);
			});
			jQuery('#$uid').on('modalBox:beforeClose', function(){
			jQuery('#$spacer').slideUp($this->duration);
			});";
			}
			WPage::addJSScript( $js );
		}	
		if ( $this->displayType == 'popup' && ( $this->position == 'bottom' || $this->position == 'bottomright' || $this->position == 'bottomleft' ) ) {
			WPage::addJSScript( "jQuery('#$uid > .inner').css('margin-top', -1 * jQuery('#$uid > .inner').innerHeight());" );
		}	
		return $returnedHTML;
	}			
	protected function getCSS() {
		$uid = $this->getID();
		$width = $this->width ? $this->width . 'px' : 'auto';
		$height = $this->height ? $this->height . 'px' : 'auto';
		$halfWidth = $this->width ? '-' . $this->width/2 . 'px' : 'auto';
		$negativeWidth = $this->width ? '-' . $this->width . 'px' : 'auto';
		if ( $this->displayType == 'popup' ) {
			$popupCSS = "
#$uid {	
outline: none;
overflow: hidden;
}
#$uid > div.inner {
position: fixed;
margin: 0 0;
width:  $width;
height: $height;
overflow: inherit;
}";
		if ( $this->position == 'topleft' ) {
			return $popupCSS . "  
#$uid > div.inner {
top: 0;
left: 0;
}";
			}
			if ($this->position == 'top') {
return $popupCSS . "
#$uid > div.inner {
top: 0;
left: 50%;
}";
			}
			if ($this->position == 'topright') {
return  $popupCSS . "
#$uid > div.inner {
top: 0;
right: 0;
margin-left: $negativeWidth;
}";
			}
			if ($this->position == 'right') {
return $popupCSS . "
#$uid > div.inner {
top: 0;
right: 0;
margin-left: $negativeWidth;
}";
			}
			if ($this->position == 'bottomright') {
return $popupCSS . "
#$uid > div.inner {  
bottom: 0;
right: 0;
margin-left: $negativeWidth;
}";
			}
			if ($this->position == 'bottom') {
return $popupCSS . "
#$uid > div.inner {   
bottom: 0;
left: 50%;
margin-left: $halfWidth;
}";
			}
			if ($this->position == 'bottomleft') {
return $popupCSS . "
#$uid > div.inner {
bottom: 0;
left: 0;
margin: 0 0;
}";
			}
			return $popupCSS . "
#$uid > div.inner {  
left: 50%;
margin: 0 0;
margin-left: $halfWidth;
}";
		} else if ($this->displayType == 'infobar' ) {
			$infobarCSS = "
			#$uid {
width:  100%;
height: 0;
overflow: visible;
background-color: transparent;
outline: none;
			}
			#$uid > div.inner {
margin: 0 0;
width:  100%;
display: block;
box-shadow: 1px 1px 2px 0 rgba(66,66,66,.6);
			}";
			if ($this->position == 'bottom') {
return $infobarCSS . "
#$uid {
top: auto;
bottom: 0;
left: 0;
}";
			}
			if ($this->position == 'left') {
return $infobarCSS . "
#$uid {
top: 0;
left: 0;
height: 100%;
width:  $width;
}
#$uid > div.inner {
height: 100%;
width: $width;
}";
			}
			if ( $this->position == 'right' ) {
				return $infobarCSS . "
	#$uid {
top: 0;
right: 0;
height: 100%;
width:  $width;
}
#$uid > div.inner {
height: 100%;
width: $width;
}";
			}
						return $infobarCSS . "
#$uid > div.inner {				
top: 0;
left: 0;
}";
		} else if ( $this->displayType == 'fullscreen' ) {
			return "
#$uid {	
outline: none;
overflow: hidden;
}
#$uid > div.inner {
top: 0;
left: 0;
width:  100%;
height: 100%;
padding: 0 0;
margin: 0 0;
position: fixed;
overflow: inherit;
}";
		} else if ( $this->displayType == 'stickbox') {
			if ($this->position == 'right') {
				return "
#$uid {
top: 50%;
right: 0;
height: 0;
width:  0;
overflow: visible;
background-color: transparent;
outline: none;
}
#$uid > div.inner {
margin: 0 0;
width: $width;
display: block;
box-shadow: 1px 1px 2px 0 rgba(66,66,66,.6);
}";
			}
						return "
#$uid {
top: 50%;
left: 0;
height: 0;
width:  0;
overflow: visible;
background-color: transparent;
outline: none;
}
#$uid > div.inner {
margin: 0 0;
width: $width;
display: block;
box-shadow: 1px 1px 2px 0 rgba(66,66,66,.6);
}";
		}
		return '';
	}
	protected function generatePopupHTML() {
		$closeBtn = '';
		if ($this->defaultCloseBtn) $closeBtn = '<button class="close">&times;</button> ';
		$html = '<div class="modal-box" id="' . $this->_id . '">';
		$html .= '<div class="';
		if ( 'fullscreen' == $this->displayType ) $html .= 'fullScreenPop ';
		$html .= 'inner">' . $closeBtn . $this->popupContent . '</div></div>';
		return $html;
	}	
	protected function js_openPopup($ignoreShowOnce=false) {
		if (!$ignoreShowOnce) {
			$showOnce = WGlobals::getCookie($this->_id . '_showOnce');
			switch ($this->showOnceType) {
				case 'visit':
					if(!$showOnce)
						WGlobals::setCookie($this->_id . '_showOnce', true, time() + 60*60);
					break;
				case 'user':
					if(!$showOnce)
						WGlobals::setCookie($this->_id . '_showOnce', true, time() + 60*60*24*365);
					break;
			}
		}
		$centerVertStr = '';
		if (
			($this->displayType == 'popup'	&& ($this->position == 'left' || $this->position == 'center' || $this->position == 'right') )  ||
			($this->displayType == 'stickbox'  && ($this->position == 'left' || $this->position == 'right'))
		)
			$centerVertStr = ", centeringVertical:true";
		$js = "jQuery('#$this->_id').modalBox('open',{openAnimationEffect:'$this->animationIn',closeAnimationEffect:'$this->animationOut',openAnimationDuration:$this->duration,closeAnimationDuration:$this->duration $centerVertStr});";
		if ($ignoreShowOnce) {
			return $js;
		} else {
			return $this->js_execOnce($js, 'popup');
		}
	}
	protected function js_addDelay($delay,$js) {
		if($delay)
			return "setTimeout(function(){ $js }, $delay);";
		else
			return $js;
	}
	protected function js_execOnce($js,$execID=null) {
		if (is_null($execID)) {
			$execID = ++ $this->_execOnceID;
		}
		$varName = $this->getID() . "_" . $execID . "_executed_once";
		return "
			if (typeof $varName == 'undefined') {
				$varName = false;
			}
			if (!$varName) {
				$varName = true; 
				$js
			}
		";
	}
	function addClickHandler($selector,$delay=0) {
		if ($selector)  $this->eventHandlers [] = ['type' => 'click', 'delay' => (int)$delay, 'param' => $selector];
	}
	function addScrollHandler($delay=0) {
		$this->eventHandlers [] = ['type' => 'scroll', 'delay' => (int)$delay];
	}
	function addDelayHandler($delay=0) {
		$this->eventHandlers [] = ['type' => 'delay', 'delay' => (int)$delay];
	}
	function addLeaveHandler($delay=0) {
		$this->eventHandlers [] = ['type' => 'leave', 'delay' => (int)$delay];
	}
	function clearHandlers() {
		$this->eventHandlers = array();
	}
	public function setButtonName($name) {
		if ( !empty($name) ) $this->btnName = $name;
	}
	public function setOpenEvent($type,$delay=0) {
		if ( !empty($type) ) $this->openEvent = $type;
		$this->delay = $delay;
	}
	public function getID() {
		return $this->_id;
	}
	public function setID($id) {
		$this->_id = $id;
	}
	public function setDuration($time) {
		if ( $time <= 0 ) return false;
		$this->duration = (int)$time;
		return true;
	}	
	function setSize($width=0,$height=0) {
		if ( $width > 0 ) $this->width = $width;
		if ( $height > 0 ) $this->height = $height;
	}	
	function setAnimation($anim) {
		if( empty($anim) || 'none' == $anim ) return false;
		$this->animationIn = $anim;
		$this->animationOut = strtr($anim, array( 'In' => 'Out', 'Out' => 'In', 'Up' => 'Down', 'Down' => 'Up' ) );
		return true;
	}	
	function setPosition($pos) {
		if (empty($pos))
			return false;
		$this->position = $pos;
		return true;
	}
	function setStyle($style) {
		if ( empty($style) ) return false;
		$this->displayType = $style;
		return true;
	}	
	function setContent($html) {
		$this->popupContent = $html;
		return true;
	}
	function showOnceEvery($type) {
		if (empty($type)) return false;
		$this->showOnceType = $type;
		return true;
	}
	public function removeCloseButton() {
		$this->defaultCloseBtn = false;
	}
}