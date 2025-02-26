<?php
/*
Plugin Name: Arabic Word of the Day
Plugin URI: http://www.declan-software.com/arabic
Description: Adds a daily Arabic Word of the Day (with audio) widget to the WordPress sidebar. 
Author: Declan Software
Version: 1.0
Author URI: http://www.declan-software.com/
Notes:  Adobe Flash required to play the audio
*/

function widget_arabicwotdwidget_init() 
{
	if ( !function_exists('register_sidebar_widget') )
	{
		return;
	}
		
	function widget_arabicwotdwidget($args) 
        {
		extract($args);
			
		echo $before_widget;
		echo $before_title ."Arabic Word of the Day". $after_title;

		$wotd_code = "<script src='http://www.hitsalive.com/arabic_wotd/arabic.php?link=WP' language='javascript' type='text/javascript'></script>";
                             
		echo '<div style="margin-top:5px;text-align:left;">'.$wotd_code.'</div>';
		echo $after_widget;
	}

	
	function widget_arabicwotdwidget_control() 
        {
		echo '<p style="text-align:left;">Brought to you by <b>Declan Software</b> - Language Learning Software for serious students.</p>';
	}

	register_widget_control(array('Arabic Word of the Day', 'widgets'), 'widget_arabicwotdwidget_control', 200, 200);

	register_sidebar_widget(array('Arabic Word of the Day', 'widgets'), 'widget_arabicwotdwidget');
}

add_action('widgets_init', 'widget_arabicwotdwidget_init');

?>