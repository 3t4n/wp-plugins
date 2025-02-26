<?php
/*
Plugin Name: authorSTREAM
Plugin URI:
Description: A plugin WordPress to easily display authorSTREAM presentations
Version: 3.0
Author: authorSTREAM
Author URI: http://www.authorSTREAM.com/
*/

function authorstream_option_menu() {  // install the options menu
	if (function_exists('current_user_can')) {
		if (!current_user_can('manage_options')) return;
	} else {
		global $user_level;
		get_currentuserinfo();
		if ($user_level < 8) return;
	}
} 

// Install the options page
add_action('admin_menu', 'authorstream_option_menu');

// [authorSTREAM id=95880_633597136810937500 pl=player by=authorSTREAM]
function authorstream_Display($atts, $content = null)
 {
   extract(shortcode_atts(array(
		'id' => '.$id.',
		'pl' => 'player', //sets the default values if no attribute is set
                'by' => 'authorSTREAM'
 ), $atts));

$replacement ='<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="481" height="402">
<param name="allowScriptAccess" value="always" /><param name="allowfullscreen" value="true" />
<param name="movie" value="http://www.authorstream.com/'.$pl.'.swf?p='.$id.'"/>
<param name="wmode" value="transparent" />
<embed src="http://www.authorstream.com/'.$pl.'.swf?p='.$id.'" quality="high" type="application/x-shockwave-flash" allowScriptAccess="always" allowFullScreen="true" wmode="transparent" width="481" height="402"></embed>
</object>
<br/><font size="2">Uploaded on authorSTREAM by <a href="http://www.authorstream.com/User-Presentations/'.$by.'/" target="_blank" title="More presentations by '.$by.' on authorSTREAM">'.$by.'</a></font>';

return $replacement;
}
add_shortcode('authorSTREAM', 'authorstream_Display'); //install the shortcode
?>
