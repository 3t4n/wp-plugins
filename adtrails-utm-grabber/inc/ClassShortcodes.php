<?php

/*
 * UtmvGrabber Shortcodes
 * @package UtmvGrabber
 * @since   1.0.0
 */

class UtmvGrabberShortcodes {
    function __construct() {
        /**
         * Shortcode to display the list of utm variables in front end through shortcodes
         * [utm_varibles]
         */		
		//$utmFields = UTMV_GRABBER_UTM_FIELDS;
		$utmFields = UtmvGrabber()->engine->getShortcode(); 
		add_action( 'wpcf7_before_send_mail', array($this, 'addUtmShortcodeMailBody') );		
    }

    /**
     * display utm variables from a provider URLs
     *
     * @return HTML
     */
	 
    private function utmVarShortcodes($utmFields) {
		$cfield = '';
        if(!empty($utmFields)){ 
			foreach ($utmFields as $id=>$utmfield){
				if (isset($_GET[$utmfield]) && $_GET[$utmfield] != '')
					$cfield = htmlspecialchars($_GET[$utmfield],ENT_QUOTES, 'UTF-8');
				elseif(isset($_COOKIE[$utmfield]) && $_COOKIE[$utmfield] != ''){ 
					$cfield = $_COOKIE[$utmfield];
				}else{
					$cfield = '';
				}		
				$_COOKIE[$utmfield] = $cfield;
				add_shortcode($utmfield, function() use ($utmfield) {return urldecode($_COOKIE[$utmfield]);});			
			}
		}
    }

	public function addUtmShortcodeMailBody($contact_form){
		$this->utmVarShortcodes($utmFields);
	}
}
return new UtmvGrabberShortcodes();
?>