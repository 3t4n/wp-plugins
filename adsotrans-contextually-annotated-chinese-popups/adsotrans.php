<?php
/* 
Plugin Name: Adso Chinese Popups
Plugin URI: http://adsotrans.com
Description: A plugin that allows users to click on Chinese text for Adso popups on mouseover.
Author: David Lancashire
Version: 1.0
Author URI: http://adsotrans.com
*/


add_filter('the_content', 'adsotate_popups_the_content');
add_filter('comment_text', 'adsotate_popups_the_content');

function adsotate_popups_the_content($text) { 

        $cspan = 0;

        for ($cont = 1, $i = 0; $text[$i] != ""; $i++) {

                $v = ord($text[$i]);

		if ($text[$i] == "\n") { 
			if ($cspan == 1) { 
				$return_value .= "</span>";
				$cspan = 0;
			}
		}

                if ($v < 128) {
                        if ($cspan == 1) { $return_value .= "</span>"; $cspan = 0; }
                        $return_value .= $text[$i];
                }
                else {
			if ($cspan == 0) { $return_value .= "<span class=\"adso\">"; $cspan = 1; }
                        $return_value .= $text[$i];
		}
        }

        if ($cspan == 1) { $return_value .= "</span>"; }
	return $return_value;


}


?>
